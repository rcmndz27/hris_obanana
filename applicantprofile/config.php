<?php

    $servername = "192.168.201.8\sql2008";
	$username = "abc";
	$password = "Pm1@p@55w0rd!";
	$dbname = "test_hris";

    $dbConnectionString = "sqlsrv:Server=$servername;Database=$dbname";

    try {
		$conn = new PDO($dbConnectionString, $username, $password);

		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	    // echo "Connected successfully"; 
	}
	catch(PDOException $e){
	    echo "Connection failed: " . $e->getMessage();
	}

?>