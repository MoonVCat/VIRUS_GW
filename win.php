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
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/gamemenu.css"/>

</head>
<script type="text/javascript">
    window.miVariableEnJavasctipt = <?php  echo "$phpVar1" ?>;
    console.log(window.miVariableEnJavasctipt);
</script>

<script type="text/javascript">
    window.fbAsyncInit = function() {
    FB.init({
      appId      : '477059136921512',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v2.9'           // Use this Graph API version for this call.
    });
    FB.AppEvents.logPageView();
};

(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
function share(){
    FB.ui({
        method: "share",
        href: "https://google.com",
        hastag: "#virus_game",
        quote: "Estoy jugando Virus en el navegador mi puntaje fue de: " + window.miVariableEnJavasctipt
    }, function (response){});

}




</script>

<script type="text/javascript">

    function Share(){
        share();
    }
</script>
        
<body>
    
    <audio id="musica" loop src="audio/win.mp3"></audio>


    <img id="logo-img" width="300" src="img/virus_logo.png"/>

    <br>
    <img id="score" width="900" src="img/score_tabla.png"/>
    <div class="contenido">
         <img id="score" width="900" src="img/score_tabla_cont.png"/>
         <h1 class = "textoUsername" style="color:black;"> <?php echo $name ?></h1>
         <h1 class = "textoPuntaje" style="color:black;"> <?php echo $phpVar1 ?></h1>
    </div>

    <input  class="share" type="image" onclick="Share()" width="380" src="img/share.png">
   
    <form Name="" Method="" action="proyecto.html">
            <input class="salir_win" type="image" width="320" src="img/exit_img.png"/>
        </form>

</body>

</html>
<script type="text/javascript">
     var sound = document.getElementById("musica");
                    var musicFX = localStorage.getItem("musicaFondo");
                    if(musicFX == 1){
                    sound.play();

                    } else {

                    }
</script>   