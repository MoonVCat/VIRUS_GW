<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<script type="text/javascript">
  
  <?php   
    echo "var puntaje = localStorage.getItem("sesionPuntaje");";
   ?>
</script>
<body>

</body>
</html>

 <?php   
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
  $result = mysqli_query($nombreConexion, "INSERT INTO `score` (`id`, `player`, `puntaje`) VALUES (NULL, 'german', '5');");
  

  

      

 mysqli_close($nombreConexion);
 
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());

}




 ?> -->
