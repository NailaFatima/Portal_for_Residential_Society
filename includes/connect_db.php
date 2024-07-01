<?php
	include_once("config.php");
	$dblink =mysqli_connect(SERVER,DB_USER,PASSWORD,DB_NAME);
	if(!$dblink)
	{
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	exit;
	}
	// {
	// 	echo "connected";
	// }

?>