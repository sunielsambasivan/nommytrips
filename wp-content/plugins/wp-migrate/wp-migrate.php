<?php
/*
Plugin Name: WP Migrate
Plugin URI: http://www.theriddlebrothers.com/our-services/wordpress-plugins/wp-migrate
Description: Creates a settings page that allows you to migrate a WordPress site to another domain/database and replace old domain/URLs.
Author: Joshua Riddle
Version: 0.1.6
Stable tag: 0.1.6
Author URI: http://www.theriddlebrothers.com/
*/

/*  Copyright 2009  Joshua Riddle  (email : josh@theriddlebrothers.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!class_exists('WPMigrate')) {

	// timeout limit in MINUTES
	define('WPM_TIMEOUT', 10);
	
	class WPMigrate {
		
		public $target = null;
		private $_db_name = null;
		private $_wp_prefix = null;
		private $_errors = array();
		private $_logs = array();
		private $_old_url = null;
		private $_migrate_urls = false;
		private $_new_url = null;
		private $_queries = array();
		private $_specific_tables = false;
		private $_tables = array();
		private $_update_url = false;
		private $_version = '0.1';
		
		public function WPMigrate() {
			$this->_old_url = get_bloginfo('url');
			if (is_admin()) add_action('init', array($this, 'init'));
		}
	
		/**
		 * Build queries to wipe out old data and insert new data
		 * @param	array		$table_info		Table names/field info
		 */
		private function _build_inserts() {
			global $wpdb;
			$this->_logs[] = 'Generated insert queries...';
			
			// loop through local tables and generate
			// INSERT statements for target database
			$tables = $this->_get_tables();
			
			foreach($tables as $tbl) {
				$no_prefix = str_replace($this->_wp_prefix, '', $tbl);
				$target_table = $this->_wp_prefix . $no_prefix;
				
				// create statement
				$sql = "SHOW CREATE TABLE $tbl";
				$result = $wpdb->get_row($sql, ARRAY_N);
				$create_statement = $result[1];
				$create_statement = str_replace("CREATE TABLE", 
												"CREATE TABLE IF NOT EXISTS",
												$create_statement);
												
				$create_statement = str_replace($tbl, 
												$target_table,
												$create_statement);
				
				$this->_queries[] = $create_statement . '; ';
								
				// truncate statement (if already existed)
				$sql = "TRUNCATE " . $target_table . "; ";
				$this->_queries[] = $sql;
				
				// retrieve data
				$sql = "SELECT * FROM $tbl";
				$local_data = $wpdb->get_results($sql);
				
				foreach($local_data as $row) {
					// insert data
					$sql = "INSERT INTO " . $target_table . "(";
					foreach($row as $key=>$value) {
						$sql .= $key . ",";
					}
					// remove last comma
					$sql = substr($sql, 0, strlen($sql)-1);
					$sql .= ") VALUES (";
					foreach($row as $key=>$value) {
						$insert_value = $value;
						
						// if we're updating the URL do so now
						// which reduces the load on the target SQL server
						// later on
						if ($this->_update_url) {
							$insert_value = $this->object_replace($this->_old_url, 
																	$this->_new_url,
																	$insert_value);
						}
						$sql .= "'" . str_replace("'", "''", $wpdb->prepare($insert_value)) . "',";
					}
					$sql = substr($sql, 0, strlen($sql)-1);
					$sql .= "); ";
					$this->_queries[] = $sql;
				}			
			}
			
			
			$this->_logs[] = 'Insert queries generation complete.';
		}
		
		
		
		/**
		 * Build queries to update instances of old URLs in database.
		 *
		 * Revised to pull information down from server in order to
		 * unserialize data, and re-serialize it for replacement.
		 *
		 * @param	array		$table_info		Table names/field info
		 */
		private function _build_url_updates() {
			global $wpdb;
			
			$this->_logs[] = 'Generation URL migration queries...';
			
			// loop through remote tables and generate
			// UPDATE statements for target database
			$tables = $this->_get_tables();
			
			$old_url = $this->_old_url;
			$new_url = $this->_new_url;
			
			foreach($tables as $tbl) {
				$no_prefix = str_replace($wpdb->prefix, "", $tbl);
				$target_table = $this->_wp_prefix . $no_prefix;
				
				// retrieve target table
				$rows = $this->target->get_results("SELECT * FROM " . $target_table);
				foreach($rows as $row) {
					$index = 0;
					$primary_key = '';
					$primary_value = '';
					
					// build update statement for target table
					$sql = "UPDATE " . $target_table . " SET ";
					foreach($row as $key=>$val) {
						if ($index == 0) {
							$primary_key = $key;
							$primary_value = $val;
						} else {
							$new_value = $this->object_replace($old_url, $new_url, $val);
							$sql .= $key . " = '" . $new_value . "', ";
						}
						$index++;
					}
					// remove final comma/space
					$sql = substr($sql, 0, strlen($sql) - 2);
					$sql .= " WHERE " . $primary_key . " = '" . $primary_value . "'; ";
					$this->_queries[] = $sql;
				}		
			}
			
			$this->_logs[] = 'URL migration queries complete.';
		}
		
		/**
		 * Display contextual help
		 */
		public function conextualHelp($text) {
			ob_start();
			$text = include('help.php');
			ob_end_flush();
		}
		
		
		/**
		 * Display migration page
		 */
		public function displaySettingsPage() {
			ob_start();
			include('settings.php');
			ob_end_flush();
		}
		
		/**
		 * Retrieve log messages as an HTML list
		 */
		public function get_logs() {
			$ret = '<ul>';
			foreach($this->_logs as $log) {
				$ret .= '<li>' . $log . '</li>';
			}
			$ret .= '</ul>';
			return $ret;
		}
		
		
		/**
		 * Retrieve a list of tables that will be updated.
		 *
		 * If user has selected only specific tables, they will
		 * only be used for migration
		 *
		 * @return	array		List of table names
		 */
		private function _get_tables() {
			if ($this->_specific_tables) {
				$tables = $this->_tables;
			} else {
				$tables = $this->_get_table_list();
			}
			return $tables;
		}
		
		/**
		 * Retrieve a list of tables from current database
		 * @return	array			Array of table names
		 */
		private function _get_table_list() {
			
			global $wpdb;
			
			$results = $wpdb->get_results("SHOW TABLES FROM " . DB_NAME);
	
			$found_tables = array();
			foreach($results as $row) {
				$found_tables[] = $row->{'Tables_in_' . DB_NAME};
			}
			return $found_tables;
		}
		
		
		/**
		 * Initialize plugin and add WordPress hooks
		 */
		public function init() {
		
			if (isset($_GET['testdb'])) {
				require('test-db.php');
				exit();
			}
			
			add_action('admin_menu', array($this, 'initAdminMenus'));
			
			wp_enqueue_style('wpmigrate', 
							WP_PLUGIN_URL . '/wp-migrate/admin.css', 
							null,
							$this->_version,
							'screen');
							
			wp_enqueue_script('wpmigrate', 
							WP_PLUGIN_URL . '/wp-migrate/admin.js', 
							'jquery',
							$this->_version);
							
			// contextual help
			add_action( 'contextual_help', array($this, 'conextualHelp') );
		}
		
		/**
		 * Add migration page to WordPress admin menus
		 */
		public function initAdminMenus() {
			add_submenu_page('options-general.php', 'Migrate Site', 
								'Migrate Site', 8, __FILE__, 
								array($this, 'displaySettingsPage'));	
		}
		/**
		 * Begin data migration and run queries.
		 *
		 * Wrapper function created due to the
		 * requirement that the functions below MUST be 
		 * run in order for migration to run properly.
		 */
		private function _init_migrate() {
		
			$this->_logs[] = 'Initiating migration...';
			
			// if inserting data, there is no need to run an URL migration
			// script on the target as it is completed while inserting the data
			if ($this->_insert_data) $this->_build_inserts();
			elseif ($this->_update_url) $this->_build_url_updates();
			
			// now that we've collected all queries that must run,
			// start running them.
			$this->run_queries();
			
			$this->_logs[] = 'Migration complete.';
		}
		
				
		
		/**
		 * Primary migration function
		 * @param	WPDB		$target		Target database to update
		 * @return	boolean					True if no errors, false if errors
		 */
		public function migrate($target) {
			
			// may take a while
			set_time_limit(WPM_TIMEOUT * 60);
			
			// set memory limit
			if (isset($_POST['option_memorylimit'])) {
				$limit = $_POST['memorylimit'];
				if (intval($limit)) {
					$this->_logs[] = "Setting memory limit to " . $limit . "MB.";
					ini_set("memory_limit", $limit . "M");
					
					$new_limit = ini_get('memory_limit');
					if ($new_limit != $limit . 'M') {
						$this->_logs[] = 'Unable to set memory limit. May not be supported by hosting provider.';
					}
				}
			}
			
			// migrate specific tables?
			$specific_tables = isset($_POST['option_specifictables']);
			$this->_specific_tables = $specific_tables;
						
			// table names
			$table_names = $_POST['option_tables'];
			$this->_tables = $table_names;
			
			// update ur?
			$update_url = isset($_POST['option_urlupdate']);
			$this->_update_url = $update_url;
			
			// new url
			$new_url = $_POST['option_newurl'];
			$this->_new_url = 'http://' . $new_url;
						
			// insert data?
			$insert_data = isset($_POST['option_insert']);
			$this->_insert_data = $insert_data;
			
			
			$this->_init_migrate();
			
			return (sizeof($this->_errors) == 0);
		}
		
		/**
		 * Recursive loop through an object and replace instances of
		 * a specified string.
		 *
		 * This is used to update serialized information that is stored
		 * in the WordPress database meta tables
		 *
		 * @param	string		$search		String to search for
		 * @param	string		$replace	String to replace with
		 * @param	string		$object		Serialized object to search within
		 * @return	mixed					Replaced object in original form
		 */
		public function object_replace($search, $replace, $object) {			
			$ret = $object;
			$x = false;
			// if object is a serialized string
			if (is_serialized($ret)) {
				$serialized = unserialize($ret);
				if (is_object($serialized) || is_array($serialized)) {
					if (is_object($serialized)) {
						// loop through object
						foreach($serialized as $key=>$val) {
							//$serialized->$key = str_replace($search, $replace, $val);
							$serialized->$key = $this->object_replace($search, $replace, $val);
						}
					} elseif(is_array($serialized)) {
						// loop through array
						foreach($serialized as $key=>$val) {
							//$serialized[$key] = str_replace($search, $replace, $val);
							$serialized[$key] = $this->object_replace($search, $replace, $val);
						}
					}
				}
							
				$ret = serialize($serialized);
			} elseif(!is_object($ret) && !is_array($ret)) {
				// object is a string, simple search and replace
				$ret = str_replace($search, $replace, $ret);
			} elseif(is_array($ret)) {
				// object is an array, loop through and replace
				foreach($ret as $key=>$val) {
					$ret[$key] = $this->object_replace($search, $replace, $val);
				}
			} elseif(is_object($ret)) {
				// object is a class/object, loop through and replace
				foreach($ret as $key=>$val) {
					$ret->$key = $this->object_replace($search, $replace, $val);
				}
			}
			return $ret;
		}
		
		/**
		 * Run all queries on target database
		 */
		public function run_queries() {
			$this->_logs[] = 'Running database queries...';
			
			if ($this->_queries == null) return;
			
			
			// if logs folder is writeable, store queries we will be running
			// for future reference
			$log_folder = dirname(__FILE__) . '/logs/';
			$log_file = $log_folder . date("Y-m-d-H-i-s") . ".log";
			$fh = null;
			
			if (is_writable($log_folder)) {
				$this->_logs[] = 'Opening log file: ' . $log_file;
				$fh = fopen($log_file, 'w');
			}
						
			foreach($this->_queries as $query) {
				$this->target->query($query);
				if ($fh) fwrite($fh, $query . "\n");
			}
			
			// clear out query queue
			$this->_queries = array();
		
			if ($fh) fclose($fh);
			
			$this->_logs[] = 'Queries complete.';
		}
		
		/**
		 * Set target database to migrate to.
		 * @param	string		$db_user		Database username
		 * @param	string		$db_pass		Database password
		 * @param	string		$db_name		Database name
		 * @param	string		$db_host		Database host
		 */
		public function setTarget($db_user, $db_pass, $db_name, $db_host, $wp_prefix) {
			$this->target = new WPDB($db_user, $db_pass, $db_name, $db_host);
			
			// if database does not exist, attempt to create it
			if (isset($this->target->error->errors['db_select_fail'])) {
				$this->target->ready = true;
				$this->target->last_error = null;
				$this->target->query("CREATE DATABASE " . $db_name);
				if (!$this->target->last_error) {
					// no errors, creation was successfull
					$this->target = new WPDB($db_user, $db_pass, $db_name, $db_host);
				}				
			}
			$this->_db_name = $db_name;
			$this->_wp_prefix = $wp_prefix;
		}
	}
	
	$WPMigrate = new WPMigrate();
}