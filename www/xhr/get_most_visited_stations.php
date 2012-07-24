<?php
error_reporting(1);
error_reporting(E_ALL ^ E_NOTICE);

require_once "./config.php";
$data = array(); //Initializing the results array

$field = $_GET['field'];
$borough = $_GET['borough'];

$query = "select id,SQRT($field*PI())/30 as radius from ridership where borough = '$borough' order by $field DESC limit 8";
//echo $query;
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)){
        array_push($data, $row);
}
$json = json_encode($data);
echo $json;
?>