<?php
error_reporting(1);
error_reporting(E_ALL ^ E_NOTICE);

require_once "./config.php";

if (1) {
	$data = array(); //Initializing the results array

	$query = "select id,SQRT(weekday_ridership*PI())/30 as radius from ridership where borough = 'MNH' order by weekday_ridership DESC limit 8";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$json = json_encode($data);
	echo $json;
}
?>