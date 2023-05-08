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
			header("Location: /_proyecto_2/Login/login.php");

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
	<link rel="stylesheet" href="bootstrap.min.css"/>
	 <link rel="stylesheet" href="login.css">
</head>
<body>

<?php if(!empty($message)): ?>

<p><? = $message ?></p>

<?php 	endif; ?>

<ul id="main-menu"></ul>
    <img id="logo-img" width="400" src="img/virus_logo.png"/>
        <br>
	
	
<img id="logo-img" width="300" src="img/signup.png"/>
<form action="signup.php" method="post">
	<br><br><br><br>
<input type="text" name="nombre" placeholder="ingresa tu nombre">
<br><br>
<input type="text" name="edad" placeholder="ingresa tu edad"> 
<br><br>
<input type="text" name="email" placeholder="ingresa tu email">
<br><br>
<input type="password" name="password" placeholder="ingresa tu password">
<br><br><br><br>
<input  type="image" width="250" value="Submit" src="img/ingresar.png">
</form>
</body>
</html>