<?php 	

session_start();
	require "database.php";

	if (!empty($_POST["email"]) && !empty($_POST["password"])){
		$records = $conn->prepare("SELECT id, nombre,email, password FROM users where email = :email");
		$records->bindParam(":email", $_POST["email"]);
		$records->execute();

		$results = $records->fetch(PDO::FETCH_ASSOC);


		$message = "";

		  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      $_SESSION["userName"] = $results["nombre"];
      header("Location: /_proyecto/proyecto.html");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
	 <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php require 'partial/partial.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

	<h1>Login</h1>
<form action="login.php" method="post"> 
<input type="text" name="email" placeholder="enter your email">
<input type="password" name="password" placeholder="enter your password">
<input type="submit" value="Submit">
</form>
</body>
</html>