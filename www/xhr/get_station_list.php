<?php
require_once "config.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select station from ridership where station LIKE '%$q%'";
//echo $sql;
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['station'];
	echo "$cname\n";
}
?>