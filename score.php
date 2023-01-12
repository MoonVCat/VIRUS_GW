<!-- <?php   

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
  $result = mysqli_query($nombreConexion, "SELECT * FROM `score` ORDER BY `score`.`puntaje` DESC LIMIT 1, 1");
  while ($consulta = mysqli_fetch_array($result)) {
     $player1 = $consulta["player"];
     $puntaje1 = $consulta["puntaje"];
      
  }

  $result = mysqli_query($nombreConexion, "SELECT * FROM `score` ORDER BY `score`.`puntaje` DESC LIMIT 1, 2");
  while ($consulta = mysqli_fetch_array($result)) {
     $player2 = $consulta["player"];
     $puntaje2 = $consulta["puntaje"];
      
  }
   $result = mysqli_query($nombreConexion, "SELECT * FROM `score` ORDER BY `score`.`puntaje` DESC LIMIT 1, 3");
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

   
    <?php 
    echo"<input type=text name=nombre_player1 value=german>";  
     echo"<input type=text name=puntos_player1 value=001>"; 

     echo"<input type=text name=nombre_player2 value=arturo>";  
     echo"<input type=text name=puntos_player2 value=002>";

     echo"<input type=text name=nombre_player3 value=melissa>";  
     echo"<input type=text name=puntos_player3 value=003>"; 
    ?>
    <audio loop id="musicaFondo">
        <source src="audio/Game Over.ogg" type="audio/ogg">
    </audio>
        <ul id="main-menu"></ul>
        <img id="logo-img" width="400" src="img/virus_logo.png"/>
        <br>
        <br>
        <img id="scoretable-img" width="600" src="img/score_tabla.png"/>
        <br>
        <form Name="" Method="" action="proyecto.html">
            <input class="exit-img" type="image" width="320" src="img/exit.png"/>
        </form>
        
</body>

<script src="js/libs/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    var music = localStorage.getItem("musicaFondo");
if(music == 1){
    var musicBack = document.getElementById("musicaFondo");
    musicBack.play();
}else if (music == 0){

}
</script>

</html>