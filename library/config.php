

<?php

	session_start();

	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "library";



	try {
		$con = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);


	} catch (Exception $e) {
		
		echo "Somthing went wrong! Server not conected! ".$e;
	} 

?>
 
