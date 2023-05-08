<!-- <?php   

$hostname = 'localhost:3306';
$nombreUsuario = 'root';
$contraseña = '';
$database = 'php_login_database';
$table = "score";
$player1;
$player2;
$player3;
$puntaje1;
$puntaje2;
$puntaje3;




  session_start();
    if (isset($_SESSION['userName'])) {
        //asignar a variable
        $usernameSesion = $_SESSION['userName'];
        //asegurar que no tenga "", <, > o &
        $username = htmlspecialchars($usernameSesion);       

       
    }

try {
$nombreConexion = mysqli_connect($hostname , $nombreUsuario ,$contraseña,$database);
  $phpVar2 = $_GET["w2"];
  $name = $_SESSION["userName"];
  $result = mysqli_query($nombreConexion, "INSERT INTO `score` (`id`, `player`, `puntaje`) VALUES (NULL, '$name', '$phpVar2');");

  $nombreConexion = mysqli_connect($hostname , $nombreUsuario ,$contraseña,$database);
  $result = mysqli_query($nombreConexion, "SELECT * FROM `score` ORDER BY `score`.`puntaje` DESC LIMIT 0,1");
  while ($consulta = mysqli_fetch_array($result)) {
     $player1 = $consulta["player"];
     $puntaje1 = $consulta["puntaje"];
      
  }

  $result = mysqli_query($nombreConexion, "SELECT * FROM `score` ORDER BY `score`.`puntaje` DESC LIMIT 0,2");
  while ($consulta = mysqli_fetch_array($result)) {
     $player2 = $consulta["player"];
     $puntaje2 = $consulta["puntaje"];
      
  }
   $result = mysqli_query($nombreConexion, "SELECT * FROM `score` ORDER BY `score`.`puntaje` DESC LIMIT 0, 3");
  while ($consulta = mysqli_fetch_array($result)) {
     $player3 = $consulta["player"];
     $puntaje3 = $consulta["puntaje"];
      
  }

      

 mysqli_close($nombreConexion);
 
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());

}





 ?> -->

<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Virus</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/gamemenu.css"/>

    </head>
<body>

    <audio loop id="musica">
        <source src="audio/Game Over.ogg" type="audio/ogg">
    </audio>
        <ul id="main-menu"></ul>
        <img id="logo-img" width="400" src="img/virus_logo.png"/>
        <br>
        <br>
        <img id="scoretable-img" width="600" src="img/score_tabla.png"/>
        <br>

        <img id="scoretable-img" width="600" src="img/score_tabla_cont.png"/>
        <h2 class = "nombre_player1" style="color:black;"> <?php  echo "$player1"  ?></h2>
        <h2 class = "puntos_player1" style="color:black;"><?php   echo "$puntaje1"   ?></h2>
        <br>
        <img id="scoretable-img" width="600" src="img/score_tabla_cont.png"/>
        <h2 class = "nombre_player2" style="color:black;"> <?php  echo"$player2"   ?></h2>
        <h2 class = "puntos_player2" style="color:black;"> <?php echo "$puntaje2" ?></h2>
        <br>
        <img id="scoretable-img" width="600" src="img/score_tabla_cont.png"/>
        <h2 class = "nombre_player3" style="color:black;"> <?php echo "$player3" ?></h2>
        <h2 class = "puntos_player3" style="color:black;"><?php   echo "$puntaje3"   ?></h2>
        <br>


        <form Name="" Method="" action="proyecto.html">
            <input class="exit-img" type="image" width="320" src="img/exit_img.png"/>
        </form>
      
</body>

<script src="js/libs/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
     var sound = document.getElementById("musica");
                    var musicFX = localStorage.getItem("musicaFondo");
                    if(musicFX == 1){
                    sound.play();

                    } else {

                    }
</script>

</html>