<?php
	require "database.php";


	$message = "";

	if(!empty($_POST['email']) && !empty($_POST['password'])){
		$sql = "INSERT INTO users (nombre,edad,email,password) VALUES (:nombre,:edad, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':edad', $_POST['edad']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

		if($stmt-> execute()){
			$message = "se creo un usuario";
			header("Location: /_proyecto/login/login.php");

		}else {
			$message = "error al crear usuario";
		}

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	 <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php if(!empty($message)): ?>

<p><? = $message ?></p>

<?php 	endif; ?>

	
	
	<h1>Sing Up</h1>
<form action="signup.php" method="post">
<input type="text" name="nombre" placeholder="ingresa tu nombre">
<input type="text" name="edad" placeholder="ingresa tu edad"> 
<input type="text" name="email" placeholder="ingresa tu email">
<input type="password" name="password" placeholder="ingresa tu password">
<input type="submit" value="Submit">
</form>
</body>
</html>