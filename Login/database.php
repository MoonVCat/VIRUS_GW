<?php 	
$server   = 'localhost:3306';
$username = "root";
$password = "";
$database = "php_login_database";
 

try {
	$conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
} catch (PDOException $e) {
	die("conection failed: ".$e->getMessage());
}


 ?>