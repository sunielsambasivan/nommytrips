<?php
/**
 * Test database connection. Intentionally not using json_encode for
 * maximum server compatibility
 *
 * This file is still within WPMigrate so "$this" may be used.
 */
$db_host = $_POST['dbhost'];
$db_user = $_POST['dbuser'];
$db_pass = $_POST['dbpass'];
$db_name = $_POST['dbname'];
$wp_prefix = $_POST['wp_prefix'];

$this->setTarget($db_user, $db_pass, $db_name, $db_host, $wp_prefix);

$tables = '[]';
$status = '';
$message = '';
if (($this->target->error->errors) > 0) {	
	// no version - either incompatible database
	// or incorrect settings
	$status = 'failure';
	$message = str_replace("\n", "<br />", 
					str_replace('"', '&#039;', $this->target->error->get_error_message())
				);
} else {
	// retrieve table names
	$found_tables = $this->_get_table_list();

	$num_tables = sizeof($found_tables);
	$tables = '[';
	for($i=0; $i<$num_tables; $i++) {
		$tables .= "'" . $found_tables[$i] . "'";
		if ($i != $num_tables) $tables .= ',';
	}
	$tables = substr($tables, 0, strlen($tables)-1);
	$tables .= ']';
	
	$status = 'success';
	$message = 'Connected successfully.';
}
$resp = new stdClass();
$resp->tables = $tables;
$resp->status = $status;
$resp->message = $message;
echo json_encode($resp);