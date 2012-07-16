<?php
error_reporting(1);
error_reporting(E_ALL ^ E_NOTICE);

require_once "./config.php";

$query = "SELECT * FROM   students where id = '" . mysql_real_escape_string($_GET['id']) . "'";
//$query = "SELECT * FROM   students limit 1";
//echo $query;
$result = mysql_query($query);

$data = array(); //Initializing the results array
while ($row = mysql_fetch_assoc($result)){
        array_push($data, $row);
}
$json = json_encode($data);
echo $json;

//select SUM(annual_ridership)  from ridership where borough = 'MNH';
//select SUM(weekday_ridership)  from ridership where borough = 'MNH';
//select SUM(weekend_ridership)  from ridership where borough = 'MNH';

//pour chaque borough

//1 point == 10 000 000

//select station,weekday_ridership  from ridership where borough = 'MNH' order  by weekday_ridership  DESC  limit 8;

//select station,weekend_ridership  from ridership where borough = 'MNH' order  by weekend_ridership  DESC  limit 8;






?>