<?php 
	$config = array(
		"mysql_server" => "localhost",
		"mysql_user" => "root",
		"mysql_password" => "",
		"mysql_db" => "gardening"
	);		
	
	$user = "root";
	$pass = ""; //PC
	$url = "localhost";
	$db = "gardening";
	
	$link = mysqli_connect($url, $user, $pass, $db);
?>