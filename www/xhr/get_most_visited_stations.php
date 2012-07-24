<?php
error_reporting(1);
error_reporting(E_ALL ^ E_NOTICE);

require_once "./config.php";
$data = array(); //Initializing the results array

$field = $_GET['field'];
$borough = $_GET['borough'];
$start = $_GET['start'];

$query = "select id,station,$field as nb,SQRT($field*PI())/30 as radius from ridership where borough = '$borough' order by $field DESC limit $start,8";
//echo $query;
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)){
        array_push($data, $row);
}
$json = json_encode($data);
echo $json;
?>