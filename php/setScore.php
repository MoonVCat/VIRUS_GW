<?php 	
 session_start();
 require 'database.php';

$records = $conn->prepare('SELECT * FROM score;');
$records->bindParam(':puntaje', $_POST['puntaje']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
 ?>