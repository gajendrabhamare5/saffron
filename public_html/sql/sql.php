<?php
include("../include/conn.php");
ini_set('memory_limit', '4024M');
ini_set('max_execution_time', 300000);
date_default_timezone_set('Asia/Kolkata');
backup_tables($DB_host, $DB_user, $DB_pass, $DB_name,$sitename_backup, 'accounts');
backup_tables($DB_host, $DB_user, $DB_pass, $DB_name,$sitename_backup, 'accounts_temp');
backup_tables($DB_host, $DB_user, $DB_pass, $DB_name,$sitename_backup, 'bet_details');
backup_tables($DB_host, $DB_user, $DB_pass, $DB_name,$sitename_backup, 'bet_teen_details');
backup_tables($DB_host, $DB_user, $DB_pass, $DB_name,$sitename_backup, 'commission_master');
backup_tables($DB_host, $DB_user, $DB_pass, $DB_name,$sitename_backup, 'user_login_master');
backup_tables($DB_host, $DB_user, $DB_pass, $DB_name,$sitename_backup, 'user_master');


function backup_tables($DB_host, $DB_user, $DB_pass, $DB_name,$sitename_backup, $table = '')
{

	$server_name   = $DB_host;
	$username      = $DB_user;
	$password      = $DB_pass;
	$database_name = $DB_name;

	$website = $sitename_backup;
	$file_name = $website;

	if (!empty($table)) {
		$table_new = $table;
		if ($table == "5_table") {
			$table = "bet_details bet_teen_details commission_master user_login_master user_master";
		}
		$file_name .= "_" . $table_new;
	}
	$source_file = date("D") . '_' . $file_name . '.sql.gz';

	/* $cmd = "mysqldump --routines -h {$server_name} -u {$username} -p{$password} {$database_name} {$table} | gzip -9 >  {$source_file}"; */
	$cmd = "mysqldump -u {$username} -p{$password} {$database_name} {$table} | gzip > {$source_file}";

	exec($cmd);

	echo "Database backup has been successfully.";
	$ftp_server = "vyana.me";

	$ftp_user = "mehul@vyana.me";

	$ftp_password = "Backup@@321.";

	$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");

	$login = ftp_login($ftp_conn, $ftp_user, $ftp_password);



	$new_dir = "/backup_all_software_sql/" . $website;
	if (ftp_nlist($ftp_conn, $new_dir) == false) {
		ftp_mkdir($ftp_conn, $new_dir);
	}
	if (ftp_put($ftp_conn, $new_dir . "/" . $source_file, $source_file, FTP_BINARY)) {

		echo "Successfully uploaded $file.";

		mail("parikh.rushika@gmail.com", "$website  backup Successfully at $date", "http://vyana.me/backup_all_software_sql/$website/" . $source_file);
	} else {

		echo "Error uploading $file.";

		mail("parikh.rushika@gmail.com", "$website backup Upload Failed at $date", "Failed");
	}





	ftp_close($ftp_conn);
}
