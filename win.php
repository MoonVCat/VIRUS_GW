<!-- <?php

    //Inicializar la sesión
    session_start();
    if (isset($_SESSION['userName'])) {
        //asignar a variable
        $usernameSesion = $_SESSION['userName'];
        //asegurar que no tenga "", <, > o &
        $username = htmlspecialchars($usernameSesion);       

        //usarla donde quieras
        echo "<p>¡Hola $username!</p>";
    }
?> -->

<!-- <?php   
session_start();

if (isset($_SESSION['userName'])) {
        //asignar a variable
        $usernameSesion = $_SESSION['userName'];
        //asegurar que no tenga "", <, > o &
        $username = htmlspecialchars($usernameSesion);       

        //usarla donde quieras
        echo "<p>¡Hola $username!</p>";
    }
$hostname = 'localhost:3306';
$nombreUsuario = 'root';
$contraseña = '';
$database = 'php_login_database';
$table = "score";
$player1= "";
$player2;
$player3;
$puntaje1="";
$puntaje2;
$puntaje3;

try {
  $nombreConexion = mysqli_connect($hostname , $nombreUsuario ,$contraseña,$database);
  $phpVar1 = $_GET["w1"];
  $name = $_SESSION["userName"];
  $result = mysqli_query($nombreConexion, "INSERT INTO `score` (`id`, `player`, `puntaje`) VALUES (NULL, '$name', '$phpVar1');");
  

  

      

 mysqli_close($nombreConexion);
 
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());

}




 ?> --> -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Has Ganado</title>
</head>
<body>


	<p>Has ganado tu puntaje fue de ...</p>

</body>
</html>