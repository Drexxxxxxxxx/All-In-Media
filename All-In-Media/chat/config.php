<?php
	$dbhost = "localhost";
	$dbname = "all-in-media";
	$dbuser = "root";
	$dbpass = '';
	try{
		$db = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", "$dbuser", "$dbpass");
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	
?>