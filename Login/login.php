<?php 	

session_start();
	require "database.php";
	
	if (!empty($_POST["email"]) && !empty($_POST["password"])){
		$records = $conn->prepare("SELECT id,nombre,edad,email,password FROM users where email = :email");
		$records->bindParam(":email", $_POST["email"]);
		$records->execute();

		$results = $records->fetch(PDO::FETCH_ASSOC);


		$message = "";
		echo "$results";
 if(is_array($results)){
		  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      $_SESSION["userName"] = $results["nombre"];
      header("Location: /_proyecto_2/proyecto.html");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }else {
  	$message =  "las crendenciales no coinciden, vuelva a intentar";
  	echo "las crendenciales no coinciden, vuelva a intentar";
  }
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	<link rel="stylesheet" href="bootstrap.min.css"/>
	<link rel="stylesheet" href="login.css">
</head>
<body>
<?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
<ul id="main-menu"></ul>
    <img id="logo-img" width="400" src="img/virus_logo.png"/>
        <br>
	<!-- <?php require 'partial/partial.php' ?> <?php if(!empty($message)): ?>  <p> <?= $message ?></p> <?php endif; ?> -->

	<img id="logo-img" width="300" src="img/login.png"/>
	<br><br><br>
		<form action="login.php" method="post"> 
					<input type="text" size="30" name="email" placeholder="enter your email">
					<br><br><br>
					<input type="password" size="30" name="password" placeholder="enter your password">
					<br><br>
					<input  type="image" width="250" value="Submit" src="img/ingresar.png">
					<br><br><br><br><br><br>
		</form>

		<form Name="" Method="" action="signup.php">
			<input class="play-img" type="image" width="340" src="img/notienescuenta.png"/>
		</form>
</body>
</html>