<?php
error_reporting(E_ALL ^ E_NOTICE);

function is_dev() {
	if (strstr($_SERVER['HTTP_HOST'],'.dev')) return 1;
}

function is_prod() {
	if (strstr($_SERVER['HTTP_HOST'],'.dev')) return 0;
}

if (strstr($_SERVER['HTTP_HOST'],'.dev')) {
	$db_user = 'root';
	$db_pass = 'root';
	$db_name = 'mta_2012';
	//echo "hgds";
}
else {
	$db_user = 'data';
	$db_pass = 'noo9iegh';
	$db_name = 'data';
}

$db = mysql_connect('localhost', $db_user, $db_pass);
mysql_select_db($db_name, $db);
?>