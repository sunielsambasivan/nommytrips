<?php
	if (isset($_POST['migrate'])) {
				
		$db_host = $_POST['targethost'];
		$db_user = $_POST['targetuser'];
		$db_pass = $_POST['targetpassword'];
		$db_name = $_POST['targetdbname'];
		$wp_prefix = $_POST['targetprefix'];
		
		$this->setTarget($db_user, $db_pass, $db_name, $db_host, $wp_prefix);

		if (($target->error->errors) > 0) {	
			$message = $target->error->get_error_message();
		} else {
			// remember we're still inside of WPMigrate so we can use "$this".
			$success = $this->migrate($target);
			if ($success) {
				$message = '<strong>Database has been migrated successfully.</strong>';
			} else {
				$message = '<strong>AN ERROR HAS OCCURRED!</strong>. All of your data may not have been transferred. Please check the logs to pinpoint any issues. You may have to update these items manually.';
			}
		}
		
	}
?>
<div class="wrap">
	<form action="" method="post">
		<h2>Migrate Site</h2>
		
		<?php
		if ($message) {
		?>
			<h3>Migration Results</h3>
			
			<div id="results">
				<?php echo $message; ?> <a href="#" id="show-logs">View Logs</a>
				<div id="logs"><?php echo $this->get_logs(); ?></div>
			</div>
		<?php		
		}
		?>
		
		<p>Use the form below to migrate your current WordPress site to another database and/or domain. Your current blog (this site) will not be affected in any way. Click the WordPress "Help" tab in the upper right for help with common problems.</p>
		
		<h3>Target Database</h3>
		
		<p>The "Target Database" is the database you will be using for your migrated site. This will most likely either be a production server. You must hit the "next" button to proceed with other settings and to complete the migration. Your database will not be modified yet.</p>
		
		<p>Depending on your database hosting provider <strong>your database may need to already exist</strong>. If it does not exist, the plugin will attempt to create it when you click "next".</p>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						Host
					</th>
					<td>
						<input type="text" class="regular-text" id="targethost" name="targethost" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						Username
					</th>
					<td>
						<input type="text" class="regular-text" id="targetuser"  name="targetuser" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						Password
					</th>
					<td>
						<input type="text" class="regular-text" id="targetpassword"  name="targetpassword" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						DB Name
					</th>
					<td>
						<input type="text" class="regular-text" id="targetdbname"  name="targetdbname" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						WordPress Table Prefix
					</th>
					<td>
						<input type="text" class="regular-text" id="targetprefix"  name="targetprefix" value="wp_" />
					</td>
				</tr>
				<tr valign="top">
					<td>
					</td>
					<td>
						<input type="submit" class="button" id="test-db" name="test" value="Next &raquo;" />
						<span id="test-results">
						
						</span>
					</td>
				</tr>				
			</tbody>
		</table>
		
		<div id="more-options" style="display:none;">
			<h3>Deployment Options</h3>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<td><input type="checkbox" name="option_urlupdate" value="1" /></td>
						<td>
							Update site domain/URL in target database. This will replace any instance of <strong><?php echo bloginfo('url'); ?></strong> with the new domain entered below (permalinks, content, settings, etc).
						</td>				
					</tr>
					<tr valign="top">
						<td></td>
						<td>http://<input type="text" name="option_newurl" /></td>
					</tr>
					<tr valign="top">
						<td><input type="checkbox" name="option_insert" value="1" /></td>
						<td>Wipe existing information in target database and insert current data. <strong>This will delete any existing WordPress information in your target database!</strong> Use this option if this is the first time you are migrating your site to a new host.</td>				
					</tr>
					
					<tr valign="top">
						<td><input type="checkbox" name="option_memorylimit" value="1" /></td>
						<td>
							Increase server memory limit to <input type="text" name="memorylimit" id="memorylimit" value="32" /> MB. (If you click the "Migrate" button and you are taken to a blank page, increase this value. Feature may not be available on shared hosts.)
						</td>				
					</tr>
				</tbody>		
			</table>
			
			<h3>Table Options <span class="heading-caption">(Advanced Users Only)</span></h3>	
			
			<a href="#" id="show-advanced">
				Show advanced options
			</a>
			
			<table id="advanced-options" class="form-table">
				<tbody>
					<tr valign="top">
						<td><input type="checkbox" name="option_specifictables" value="1" /></td>
						<td>
							Only migrate tables selected below.
						</td>				
					</tr>
					<tr valign="top">
						<td></td>
						<td>
							<select multiple="multiple" size="10" id="option_tables" name="option_tables[]">
								
							</select>	
							<p>
								<a href="#" id="select-all-tables">Select All</a> 
								<a href="#" id="select-no-tables">Select None</a>		
							</p>
						</td>				
					</tr>
				</tbody>
			</table>
		</div>
					
		<p class="submit"><input style="display:none;" type="submit" value="Migrate" id="migrate" name="migrate" class="button-primary"/></p>
	</form>
</div>