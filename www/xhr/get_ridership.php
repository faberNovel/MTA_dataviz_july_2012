<?php
error_reporting(1);
error_reporting(E_ALL ^ E_NOTICE);

require_once "./config.php";

if ($_GET['s'] == 'number_of_stations') {
	
	$data = array(); //Initializing the results array

	$query = "select count(annual_ridership) as nb1 from ridership where borough = 'MNH'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select count(annual_ridership) as nb2 from ridership where borough = 'BK'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select count(annual_ridership) as nb3 from ridership where borough = 'QNS'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select count(annual_ridership) as nb4 from ridership where borough = 'BX'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$json = json_encode($data);
	echo $json;
}

if ($_GET['s'] == 'annual_ridership') {
	
	$query = "select sum(annual_ridership) as total_annual_ridership from ridership";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        $total_annual_ridership = $row['total_annual_ridership'];
	}
	//echo $total_annual_ridership;
	
	$data = array(); //Initializing the results array

	$query = "select sum(annual_ridership*100)/$total_annual_ridership as nb1 from ridership where borough = 'MNH'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select sum(annual_ridership*100)/$total_annual_ridership as nb2 from ridership where borough = 'BK'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select sum(annual_ridership*100)/$total_annual_ridership as nb3 from ridership where borough = 'QNS'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select sum(annual_ridership*100)/$total_annual_ridership as nb4 from ridership where borough = 'BX'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$json = json_encode($data);
	echo $json;
}


if ($_GET['s'] == 'weekdays_ridership') {
	
	$data = array(); //Initializing the results array

	$query = "select sum(weekday_ridership)/100000 as nb1 from ridership where borough = 'MNH'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select sum(weekday_ridership)/100000 as nb2 from ridership where borough = 'BK'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select sum(weekday_ridership)/100000 as nb3 from ridership where borough = 'QNS'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select sum(weekday_ridership)/100000 as nb4 from ridership where borough = 'BX'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$json = json_encode($data);
	echo $json;
}

if ($_GET['s'] == 'weekend_ridership') {
	
	$data = array(); //Initializing the results array

	$query = "select sum(weekend_ridership)/100000 as nb1 from ridership where borough = 'MNH'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select sum(weekend_ridership)/100000 as nb2 from ridership where borough = 'BK'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select sum(weekend_ridership)/100000 as nb3 from ridership where borough = 'QNS'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$query = "select sum(weekend_ridership)/100000 as nb4 from ridership where borough = 'BX'";
	$result = mysql_query($query);
	while ($row = mysql_fetch_assoc($result)){
	        array_push($data, $row);
	}

	$json = json_encode($data);
	echo $json;
}
?>