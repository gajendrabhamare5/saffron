<?php
exit();
define("BACKUP_PATH", "");
define("DB_HOST", "localhost");
define("DB_USER", "diamonde_ex9usr");
define("DB_PASSWORD", "HLmFR8fKCv90");
define("DATABASE_NAME", "diamonde_exchdb9");



backup_db();

function backup_db(){ 

	$server_name   = DB_HOST;
	$username      = DB_USER;
	$password      = DB_PASSWORD;
	$database_name = DATABASE_NAME;
	$date_string   = date("Ymd");

	$cmd = "mysqldump --routines -h {$server_name} -u {$username} -p{$password} {$database_name} > " . BACKUP_PATH . "{$date_string}_{$database_name}.sql";

exec($cmd);

}

function restore_db(){

	$restore_file  = BACKUP_PATH."20140306_world_copy.sql";
	$server_name   = DB_HOST;
	$username      = DB_USER;
	$password      = DB_PASSWORD;
	$database_name = DATABASE_NAME;

	$cmd = "mysql -h {$server_name} -u {$username} -p{$password} {$database_name} < $restore_file";
	exec($cmd);
}
?>