<!DOCTYPE html>

<html>

<head>
    <title>Example 01.02 - First Scene</title>
    <script type="text/javascript" src="Jquery.js"></script>
    <script type="text/javascript" src="three.js"></script>
    <script type="text/javascript" src="GLTFLoader.js"></script>
    <script type="text/javascript" src="MTLLoader.js"></script>
    <script type="text/javascript" src="FBXLoader.js"></script>
    <script type="text/javascript" src="OBJLoader.js"></script>
    <script type="text/javascript" src="inflate.min.js"></script>
    <script type="text/javascript" src="OrbitControls.js"></script>
    <script type="text/javascript" src="libs/min.js"></script>
    <script type="text/javascript" src="Herramientas/ControlesDeOrbita.js"></script>
    <link rel="stylesheet" href="pausa2.css"/>

<script type="text/javascript">

    //powerUps
    var powerUp1Bool = false;
    var powerUp2Bool = false;
    var speedUp = new THREE.Clock();
    var speed = 1;
    var powerUp1R;
    var powerUp2R;
    var PowerUpVida;
    var powerUpEscudo;
    var escudo = false;
    var vidas = 3;
    var PowerUp2V;
    var PowerUp21V;
// pausa
 var pausa = false;

// ia

var playerPos;
var meshG1;
var meshG2;
var meshG3;
var meshG4;
var meshG5;
var meshG6;
var chase1 = false;
var chase2 = false;
var chase3 = false;
var chase4 = false;
var chase5 = false;
var chase6 = false;


    var clock = new THREE.Clock();
    var clockIA = new THREE.Clock();
    clockIA.start();
    var j = 0;
    var enemigoR;
    var enemigoR2;
    var enemigoR3;
    var enemigoR4;
    var enemigoR5;
    var enemigoR6;
    var arregloDoc=[];
    var arregloDoc2=[];
    var arregloDoc3=[]; 
    var arregloDoc4=[];
    var arregloDoc5=[]; 
    var arregloDoc6=[];
    var mixerDocWalk;
    var mixerDocWalk2;
    var mixerDocWalk3;
    var mixerDocWalk4;
    var mixerDocWalk5;
    var mixerDocWalk6;
    var mixerDocWalkAttack;
    var attackMesh;
    var enemigoAttack;
    var AnclaE1 = new THREE.Object3D();
    var enemigo;
    var enemigo2;
    var enemigo3;
    var enemigo4;
    var enemigo5;
    var enemigo6;
    var player2Mat;
    var puntaje = 0;
    var objetosConColision = [];
    var escenarioColisiones = [];
    var escenarioColisionesDer = [];
    var escenarioColisionesIzq = [];
    var escenarioColisionesUp = [];
    var escenarioColisionesDown = [];
    var doctoresColisiones = [];
    var campoDeVision = [];

var frenoEnW = false;
var frenoEnA = false;
var frenoEnD = false;
var frenoEnS = false;



// colisionesDoctoresBanderas

var choque1 = false;
var choque2 = false;
var choque3 = false;
var choque4 = false;
var choque5 = false;
var choque6 = false;
var choque7 = false;

var raycaster;
var rayos = [
        new THREE.Vector3(0, 0, 1),
        new THREE.Vector3(0, 0, -1),
        new THREE.Vector3(1, 0, 0),
        new THREE.Vector3(-1, 0, 0)
    ];

var keys = {};



var vectorTemp;


function QuitarPausaFunc(){
    pausa = false;
}
    

    $(document).ready(function(){
  
    clock = new THREE.Clock();

    // load models



    


  console.log("ready");



    
  });
</script>





    <style>


        body {
            /* set margin to 0 and overflow to hidden, to go fullscreen */
            margin: 0;
            overflow: hidden;


        }
    </style>
</head>


<body>

    <!-- <a href="score.php" id="score">Ver puntuaciones: </a> -->
    
    <audio id="gOver">
        <source src="audio/gameOver.wav" type="audio/wav">
    </audio>

    <audio id="powerUp">
        <source src="audio/powerUp.wav" type="audio/wav">
    </audio>

    <audio id="monedaFX" >
        <source src="audio/monedaFX.mp3" type="audio/mpeg">
    </audio>

    
    <div id="HUD">
        <div class = "vidas"> 
            <img src="graficasWeb/corazonPixel.png" width="70" height="70" id="life1">
            <img src="graficasWeb/corazonPixel.png" width="70" height="70" id="life2">
            <img src="graficasWeb/corazonPixel.png" width="70" height="70" id="life3">
            <img src="graficasWeb/corazonVacio.png" width="70" height="70" id="life4">
            <img src="graficasWeb/corazonVacio.png" width="70" height="70" id="life5">
        </div>
        
        
        <div class = "menu">
        <img class="pausemenu" src="graficasWeb/pausa_menu.png" width="1" , height="1" id="pausaPanel">
        
        </div>

        <div id ="element"  style= "visibility: hidden;">
            <form Name="" Method="" action="score.php"> 
                 <input type="image" class = "gameO" width="0.1" , height="0.1" id="gameOvermenu" src="img/gameOver2.png">
            </form>
            
        </div>
    </div>

   
<audio loop id="musicaFondo"> 
        <source src="audio/sand.mp3" type="audio/mpeg"> 
    </audio> 
    

    <!-- <audio autoplay loop>
        <source src="audio/sand.mp3" type="audio/mpeg">
    </audio> -->

    
    

<!-- Div which will hold the Output -->
<div id="WebGL-output">
</div>




<!-- Javascript code that runs our Three.js examples -->
<script type="text/javascript">


var music = localStorage.getItem("musicaFondo");
if(music == 1){
    var musicBack = document.getElementById("musicaFondo");
    musicBack.play();
}else if (music == 0){

}

    var arregloVirus =[]   
   

var mixerVirus;   

var material2;
var matLevel

let hemiLight,spotLight;


var coin1;
var coin2;
var coin3;
var coin4;
var coin5;
var coin6;
var coin7;
var coin8;
var coin9;
var coin10;
var coin11;
var coin12;
var coin13;
var coin14;
var coin15;
var coin16;
var coin17;
var coin18;
var coin19;
var coin20;


var playerObj;
var levelObj;





    // once everything is loaded, we run our Three.js stuff.
    function init() {

document.addEventListener('keydown', onKeyDown);


        document.addEventListener('keyup', onKeyUp);    



        
        const escenarioMat = new THREE.MeshLambertMaterial({color: 0xE05E42});
       
        var scene = new THREE.Scene();
        // const loader2 = new THREE.CubeTextureLoader();
        // loader2.setSize.setScalar(0.05);
        // loader2.setPath("texturas/escenario/")
        // const textureCube = loader2.load([
        //     "sand.png",
        //     "sand.png",
        //     "sand.png",
        //     "sand.png",
        //     "sand.png",
        //     "sand.png"

        // ]);

        // scene.background = textureCube;

        var loader = new THREE.TextureLoader();
var bgTexture = loader.load('texturas/escenario/sand.png');
scene.background = bgTexture;

        var camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
        
       spotLight = new THREE.SpotLight(0xffa95c,.05);
        
        spot3 = new THREE.SpotLight(0xffa95c,2);
        spot3.position.set(-100,100,-60);
        scene.add(spot3);
        spot4 = new THREE.SpotLight(0xffa95c,2);
        spot4.position.set(-80,100,60);
        scene.add(spot4);
        spot5 = new THREE.SpotLight(0xffa95c,2);
        spot5.position.set(45,100,60);
        scene.add(spot5);
        spot6 = new THREE.SpotLight(0xffa95c,2);
        spot6.position.set(45,100,-55);
        scene.add(spot6);
        spotLight.castShadow = true;
        spotLight.shadow.bias = -0.0001;
        spotLight.shadow.mapSize.width = 1024*4;
        spotLight.shadow.mapSize.height = 1024*4;
        scene.add(spotLight);

        hemiLight = new THREE.HemisphereLight(0xffeeb1,0x080820,4)
        scene.add(hemiLight);

    
        var renderer = new THREE.WebGLRenderer();
     
        var controls = initControles(camera,renderer);
        controls.update();
  
       
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.toneMapping = THREE.ReinhardToneMapping;
        renderer.toneMappingExposure = 2.3;
        document.getElementById("WebGL-output").appendChild(renderer.domElement);
       

        // show axes in the screen


        camera.position.x = 10;
        camera.position.y = 70;
        camera.position.z = 0;
        camera.lookAt(scene.position);


raycaster = new THREE.Raycaster();


// matLevel = new THREE.MeshLambertMaterial({color: 0x08b8c7a })
// // OBJLoader("modelos/escenario/levelGraficas.obj",matLevel);
// objLoader = new THREE.OBJLoader();
// objLoader.load("modelos/escenario/levelGraficas.obj",function(model){
//     model.traverse(function(child){
//         child.receiveShadow = true;
//         child.castShadow = true;
//         child.material = matLevel;

//         });
   
//     model.scale.setScalar(1.5);
//     model.name = "escenario";
//     scene.add(model);
// objetosConColision.push(model);
//  });

playerMat = new THREE.MeshLambertMaterial({color: 0x02d572c});
player2Mat = new THREE.MeshPhongMaterial({color:  0x0E84B2C , specular:0x0FAC4AA});
coinMat = new THREE.MeshPhongMaterial({color:     0x0F7D011 , specular:0x08b8c7a});


      var texture = new THREE.TextureLoader();
            var baseMap = texture.load("texturas/escenario/sand/Terracotta_Tiles_006_SD/Terracotta_Tiles_006_basecolor.jpg");
            var heightMap = texture.load("texturas/escenario/sand/Terracotta_Tiles_006_SD/Terracotta_Tiles_006_height.png");
            var oclusionMap = texture.load("texturas/escenario/sand/Terracotta_Tiles_006_SD/Terracotta_Tiles_006_ambientOcclusion.jpg");

            var roughnessMapTxt = texture.load("texturas/escenario/sand/Terracotta_Tiles_006_SD/Terracotta_Tiles_006_roughness.jpg");

            var normalMapTxt = texture.load("texturas/escenario/sand/Terracotta_Tiles_006_SD/Terracotta_Tiles_006_normal.jpg");

            cubeMat = new THREE.MeshStandardMaterial(
                {map: baseMap,
                    normalMap : normalMapTxt,
                    displacementMap: heightMap,
                    displacementScale: 0.05,
                    roughnessMap: roughnessMapTxt,
                    roughness: 0.5,
                    aoMap: oclusionMap});

            loader = new THREE.FBXLoader();
            loader.load( "modelos/cubee2.fbx", function ( personaje ) {
            
           
            personaje.position.x = 0;
            personaje.position.y = 0;
            personaje.position.z = 0;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(2.15);
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
       
            personaje.name ="escenario";
            
            //fondo 22...
            x = -20;
            y = 0;
            z = 26;


const textureLoader2 = new THREE.TextureLoader();

const baseMap2 = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_basecolor.jpg");
const normalMapTxt2 = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_normal.jpg");
const oclusionMap2 = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_ambientOcclusion.jpg");
const heightMap2 = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_height.png");
const metalMap = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_metallic.jpg");


secondCubeMat = new THREE.MeshStandardMaterial(
                {map: baseMap2,
                    normalMap : normalMapTxt2,
                    displacementMap: heightMap2,
                    displacementScale: 0.05,
                    aoMap: oclusionMap2,
                    metalnessMap : metalMap, 
                    metalness : 0.195}
                     );


            
       


                for (var i = 0; i < 50 ; i++) {
                    personaje.traverse(function(child) {
                        child.material = secondCubeMat;

                    });
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-3);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-4);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

             for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-5);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-6);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
             for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-7);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-8);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

             for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-9);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-10);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

              for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-11);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-12);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-13);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-14);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

             for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-15);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-16);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
 for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-17);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-18);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

              for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-19);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-20);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-21);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

             for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-22);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-23);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-24);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }


             for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-25);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-26);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-27);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }


            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-28);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-29);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-30);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-31);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }


            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-32);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);
                objetosConColision.push(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-33);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-34);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }


            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-35);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }


            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-36);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-37);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-38);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

             for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-39);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }


            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-40);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-41);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-42);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);


            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-43);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }


            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-44);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-45);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-46);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-47);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-48);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-49);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

             for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-50);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }
                for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-51);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-52);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

            for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-2);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }

             for (var i = 0; i < 45 ; i++) {
                var cubeTemp = personaje.clone();
                cubeTemp.position.set(x+i,y-5,z-1);
                cubeTemp.name = "escenario";
                scene.add(cubeTemp);

            }


   })




// muros derecho

loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.01);
            personaje.position.x = 0;
            personaje.position.y = 0;
            personaje.position.z = 15;
            personaje.rotation.y  = 0;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroArriba";
            scene.add(personaje);
            escenarioColisionesDown.push(personaje);

        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.01);
            personaje.position.x = 8;
            personaje.position.y = 0;
            personaje.position.z = 15;
            personaje.rotation.y  = 0;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroAbajo";
            scene.add(personaje);
            escenarioColisionesUp.push(personaje);

        })


            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.01);
            personaje.position.x = 0;
            personaje.position.y = 0;
            personaje.position.z = 15;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesDer.push(personaje);
        })





                 
// muros izquierdos

loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.01);
            personaje.position.x = 0;
            personaje.position.y = 0;
            personaje.position.z = -23;
            personaje.rotation.y  = 0;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroArriba";
            scene.add(personaje);
            escenarioColisionesDown.push(personaje);

        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.01);
            personaje.position.x = 8;
            personaje.position.y = 0;
            personaje.position.z = -23;
            personaje.rotation.y  = 0;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroAbajo";
            scene.add(personaje);
            escenarioColisionesUp.push(personaje);

        })


            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.01);
            personaje.position.x = 0;
            personaje.position.y = 0;
            personaje.position.z = -15;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesIzq.push(personaje);
        })

// arriba 


            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = -14;
            personaje.position.y = 0;
            personaje.position.z = -12;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesIzq.push(personaje);
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = -14;
            personaje.position.y = 0;
            personaje.position.z = -13;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesDer.push(personaje);
        })


             loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = -14;
            personaje.position.y = 0;
            personaje.position.z = 12;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesDer.push(personaje);
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = -14;
            personaje.position.y = 0;
            personaje.position.z = -13;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesIzq.push(personaje);
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = -14;
            personaje.position.y = 0;
            personaje.position.z = 13;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesIzq.push(personaje);
        })


    loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = 19;
            personaje.position.y = 0;
            personaje.position.z = -12;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesDer.push(personaje);
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = 19;
            personaje.position.y = 0;
            personaje.position.z = 11;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesDer.push(personaje);
        })


            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = 19;
            personaje.position.y = 0;
            personaje.position.z = 12;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesIzq.push(personaje);
        })


             loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = 19;
            personaje.position.y = 0;
            personaje.position.z = -11;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesIzq.push(personaje);
        })


            loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/muro1.fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.0075);
            personaje.position.x = 19;
            personaje.position.y = 0;
            personaje.position.z = -12;
            personaje.rotation.y  = 1.60;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         }
     });
            
           


            personaje.name = "muroDer";
            scene.add(personaje);
            escenarioColisionesDer.push(personaje);
        })




            



        
        









      








// personajes
      
loader = new THREE.FBXLoader();
            loader.load( "modelos/Corona Virus (LOW).fbx", function ( personaje ) {
            
            personaje.scale.setScalar(0.040);
            personaje.position.x = 0;
            personaje.position.y = 0;
            personaje.position.z = 0;
            personaje.rotation.y  = 0;
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
         }
     });
            
           


            personaje.name = "player";
            scene.add(personaje);
            playerObj = personaje;
            
       

          
         
        })





loader = new THREE.FBXLoader();
            loader.load( "modelos/escenario/coin.fbx", function ( personaje ) {
        
           
            personaje.position.x = 0;
            personaje.position.y = 0;
            personaje.position.z = 0;
            personaje.rotation.y = 0;
            personaje.rotation.x = 1;
            
         
            personaje.traverse(function (child){
         if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
         }
     });
            
           
           
           personaje.name = "coin1";
            personaje.scale.setScalar(0.0030);
            coin1 = personaje;
            coin2 = coin1.clone();
            coin3 = coin1.clone();
            coin4 = coin1.clone();
            coin5 = coin1.clone();
            coin6 = coin1.clone();
            coin7 = coin1.clone();
            coin8 = coin1.clone();
             coin9 = coin1.clone();
            coin10 = coin1.clone();
            coin11 = coin1.clone();
            coin12 = coin1.clone();

            coin1.name = "coin1";
            coin2.name = "coin2";
            coin3.name = "coin3";
            coin4.name = "coin4";
            coin5.name = "coin5";
            coin6.name = "coin6";
           
            coin7.name = "coin7";
            coin8.name = "coin8";

            coin9.name = "coin9";
            coin10.name = "coin10";
            coin11.name = "coin11";
            coin12.name = "coin12";
            

            coin1.position.set(-12.75,0,15.375);
            
            coin2.position.set(-9.50,0,5.0);
            coin3.position.set(-9.50,0,-5.0);
            
            coin4.position.set(-12.75,0,-15.375);
            
            coin5.position.set(7.75,0,7.375);
            coin6.position.set(7.75,0,-7.375);
            
            coin7.position.set(1.50,0,-10.375);
            coin8.position.set(1.50,0,10.375);

//parte baja
            coin9.position.set(15.75,0,7.375);
            coin10.position.set(15.75,0,-7.375);
            coin11.position.set(15.50,0,-15.375);
            coin12.position.set(15.50,0,15.375);
            
            scene.add(coin1);
            scene.add(coin2);
            scene.add(coin3);
            scene.add(coin4);

            scene.add(coin5);
            scene.add(coin6);
            scene.add(coin7);

            scene.add(coin8);

            scene.add(coin9);
            scene.add(coin10);
            scene.add(coin11);

            scene.add(coin12);
            
            objetosConColision.push(coin1);
            objetosConColision.push(coin2);
            objetosConColision.push(coin3);
            objetosConColision.push(coin4);

            objetosConColision.push(coin5);
            objetosConColision.push(coin6);
            objetosConColision.push(coin7);
            objetosConColision.push(coin8);

            objetosConColision.push(coin9);
            objetosConColision.push(coin10);
            objetosConColision.push(coin11);
            objetosConColision.push(coin12);



            
       
            
            

            

          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/doctores/animacionesExportadas/docAllAnimattack.fbx", function ( personaje ) {
            mixerDocWalkAttack = new THREE.AnimationMixer(personaje);
            arregloDoc.push(mixerDocWalkAttack);
            const clips = personaje.animations;
            const clip = THREE.AnimationClip.findByName(clips,"attack");
            
            const action = mixerDocWalkAttack.clipAction(clip);

            action.play();
           
            personaje.scale.setScalar(0.023);
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
         }
     });
        
        

            enemigoAttack = personaje;
            console.log(enemigoAttack);
            attackMesh = enemigoAttack;
            
       

          
         
        })

            const textureLoader2 = new THREE.TextureLoader();

const baseMap2 = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_basecolor.jpg");
const normalMapTxt2 = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_normal.jpg");
const oclusionMap2 = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_ambientOcclusion.jpg");
const heightMap2 = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_height.png");
const metalMap = textureLoader2.load("texturas/escenario/sand/Metal_Locker_001_SD/Metal_Locker_001_metallic.jpg");


secondCubeMat = new THREE.MeshStandardMaterial(
                {map: baseMap2,
                    normalMap : normalMapTxt2,
                    displacementMap: heightMap2,
                    displacementScale: 0.05,
                    aoMap: oclusionMap2,
                    metalnessMap : metalMap, 
                    metalness : 0.195}
                     );


// powerUps
  const powerUp1 = new THREE.TextureLoader();

const baseMapP = powerUp1.load("texturas/powerUps/Plastic_001_SD/Plastic_001_COLOR.jpg");
const rog = powerUp1.load("texturas/powerUps/Plastic_001_SD/Plastic_001_ROUGH.jpg");


powerMat1 = new THREE.MeshStandardMaterial(
                {map: baseMapP,
                    roughnessMap: rog,
                    roughness: 0.31,
                    metallic: 0.80
                });


  

loader = new THREE.FBXLoader();
            loader.load( "modelos/star.fbx", function ( personaje ) {
            
           
            personaje.position.x = -5;
            personaje.position.y = 0;
            personaje.position.z = 10;
            personaje.rotation.x  = 10;
            personaje.scale.setScalar(0.009);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = powerMat1;
         
     });
            
          



            personaje.name = "powerUp1";
            powerUp1R = personaje;
            scene.add(personaje);
            objetosConColision.push(personaje);

            
       

          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/star.fbx", function ( personaje ) {
            
           
            personaje.position.x = -5;
            personaje.position.y = 0;
            personaje.position.z = -10;
            personaje.rotation.y  = 0;
            personaje.rotation.x  = 10;

            personaje.scale.setScalar(0.009);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = powerMat1;
         
     });
            
          



            personaje.name = "powerUp12";
            powerUp2R = personaje;
            scene.add(personaje);
            objetosConColision.push(personaje);

            
       

          
         
        })

//powerUpVida
const loader12 = new THREE.TextureLoader();
const color1 = loader12.load("texturas/powerUps/Abstract_Organic_002_SD/Abstract_Organic_002_COLOR.jpg");
const rog3 = loader12.load("texturas/powerUps/Abstract_Organic_002_SD/Abstract_Organic_002_ROUGH.jpg");
const aoM = loader12.load("texturas/powerUps/Abstract_Organic_002_SD/Abstract_Organic_002_OCC.jpg");
const N = loader12.load("texturas/powerUps/Abstract_Organic_002_SD/Abstract_Organic_002_NORM.jpg")

         powerMat2 = new THREE.MeshStandardMaterial({
            map: color1,
            roughnessMap: rog3,
            roughness: 0.31,
            aoMap: aoM,
            metallic: 0.80
         });



                  loader = new THREE.FBXLoader();
            loader.load( "modelos/star.fbx", function ( personaje ) {
            
           
            personaje.position.x = 13;
            personaje.position.y = 0;
            personaje.position.z = -20;
            personaje.rotation.y  = 0;
            personaje.rotation.x  = 10;

            personaje.scale.setScalar(0.009);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = powerMat2;
         
     });
            

            personaje.name = "powerUp2";
            PowerUp2V = personaje;
            scene.add(personaje);
            objetosConColision.push(personaje);
         
        })


            loader = new THREE.FBXLoader();
            loader.load( "modelos/star.fbx", function ( personaje ) {
            
           
            personaje.position.x = 13;
            personaje.position.y = 0;
            personaje.position.z = 20;
            personaje.rotation.y  = 0;
            personaje.rotation.x  = 10;

            personaje.scale.setScalar(0.009);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = powerMat2;
         
     });
            

            personaje.name = "powerUp21";
            PowerUp21V = personaje;
            scene.add(personaje);
            objetosConColision.push(personaje);
         
        })

        const escudoMat = new THREE.MeshPhysicalMaterial({transparent: true,opacity:0.25,color: 0x00067AC});
        const loader3 = new THREE.TextureLoader();
        const color = loader3.load("texturas/powerUps/Glass_Window_004_SD/Glass_Window_004_basecolor.jpg"); 
        const normalM = loader3.load("texturas/powerUps/Glass_Window_004_SD/Glass_Window_004_normal.jpg");
        const meta = loader3.load("texturas/powerUps/Glass_Window_004_SD/Glass_Window_004_metallic.jpg")
        const rog2 = loader3.load("texturas/powerUps/Glass_Window_004_SD/Glass_Window_004_roughness.jpg") 
        const o = loader3.load("texturas/powerUps/Glass_Window_004_SD/Glass_Window_004_opacity.jpg");
        const oclus = loader3.load("texturas/powerUps/Glass_Window_004_SD/Glass_Window_004_ambientOcclusion.jpg")
        const h = loader3.load("texturas/powerUps/Glass_Window_004_SD/Glass_Window_004_height.png")
        const powerUpMat3 = new THREE.MeshStandardMaterial({
            map: color,
            normalMap: normalM,
            metalnessMap: meta,
            metalness: 0.80,
            roughnessMap: rog2,
            roughness: 0.30,
            aoMap: oclus,
            displacementMap: h,
            displacementScale: 0.1,
            metallic: 0.80


        });



            loader = new THREE.FBXLoader();
            loader.load( "modelos/star.fbx", function ( personaje ) {
            
           
            personaje.position.x = 22;
            personaje.position.y = 0;
            personaje.position.z = 0;
            personaje.rotation.y  = 0;
            personaje.rotation.x  = 10;

            personaje.scale.setScalar(0.009);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = powerUpMat3;
         
     });
            

            personaje.name = "powerUpEscudo";
            scene.add(personaje);
            powerUpEscudo = personaje;
            objetosConColision.push(personaje);
         
        })

            loadOBJWithMTL("modelos/sand/", "sand_piso.obj", "sand_piso.mtl", (objetoCargado) => {

                objetoCargado.scale.setScalar(4);
                objetoCargado.rotation.y = 0;
                objetoCargado.position.x = -20;
                objetoCargado.position.z = -6;
                objetoCargado.position.y = -15;
                scene.add(objetoCargado);

            });

            loadOBJWithMTL("modelos/sand/", "parawas.obj", "parawas.mtl", (objetoCargado) => {

                objetoCargado.scale.setScalar(1);
                objetoCargado.rotation.y = 0;
                objetoCargado.rotation.z = .5;
                objetoCargado.position.x = -20;
                objetoCargado.position.z = -40;
                objetoCargado.position.y = -5;
                scene.add(objetoCargado);

                var objetoCargado1 = objetoCargado.clone();
                objetoCargado1.scale.setScalar(1);
                objetoCargado1.rotation.y = 0;
                objetoCargado1.rotation.z = .6;
                objetoCargado1.position.x = 0;
                objetoCargado1.position.z = 40;
                objetoCargado1.position.y = -5;
                scene.add(objetoCargado1);

            });

            loadOBJWithMTL("modelos/sand/", "cubetas2.obj", "cubetas2.mtl", (objetoCargado) => {

                objetoCargado.scale.setScalar(2);
                objetoCargado.rotation.y = 0;
                objetoCargado.rotation.z = .5;
                objetoCargado.position.x = 10;
                objetoCargado.position.z = -30;
                objetoCargado.position.y = 7;
                scene.add(objetoCargado);

            });

            loadOBJWithMTL("modelos/sand/", "cofre.obj", "cofre.mtl", (objetoCargado) => {

                objetoCargado.scale.setScalar(2);
                objetoCargado.rotation.y = 0;
                objetoCargado.rotation.z = .5;
                objetoCargado.position.x = 0;
                objetoCargado.position.z = -25;
                objetoCargado.position.y = 7;
                scene.add(objetoCargado);

            });

            loadOBJWithMTL("modelos/sand/", "palmera.obj", "palmera.mtl", (objetoCargado) => {

                objetoCargado.scale.setScalar(2);
                objetoCargado.rotation.y = 0;
                objetoCargado.rotation.z = .5;
                objetoCargado.position.x = -18;
                objetoCargado.position.z = -25;
                objetoCargado.position.y = 7;
                scene.add(objetoCargado);

                var objetoCargado1 = objetoCargado.clone();
                objetoCargado1.scale.setScalar(2);
                objetoCargado1.rotation.y = 0;
                objetoCargado1.rotation.z = .5;
                objetoCargado1.position.x = -20;
                objetoCargado1.position.z = -15;
                objetoCargado1.position.y = 7;
                scene.add(objetoCargado1);

                var objetoCargado2 = objetoCargado.clone();
                objetoCargado2.scale.setScalar(2);
                objetoCargado2.rotation.y = 0;
                objetoCargado2.rotation.z = .5;
                objetoCargado2.position.x = -15;
                objetoCargado2.position.z = 30;
                objetoCargado2.position.y = 7;
                scene.add(objetoCargado2);

                var objetoCargado3 = objetoCargado.clone();
                objetoCargado3.scale.setScalar(2);
                objetoCargado3.rotation.y = 0;
                objetoCargado3.rotation.z = .5;
                objetoCargado3.position.x = -12;
                objetoCargado3.position.z = 45;
                objetoCargado3.position.y = 5;
                scene.add(objetoCargado3);

                var objetoCargado4 = objetoCargado.clone();
                objetoCargado4.scale.setScalar(2);
                objetoCargado4.rotation.y = 0;
                objetoCargado4.rotation.z = .5;
                objetoCargado4.position.x = 25;
                objetoCargado4.position.z = 35;
                objetoCargado4.position.y = 7;
                scene.add(objetoCargado4);


            });


            loadOBJWithMTL("modelos/sand/", "cajas2.obj", "cajas2.mtl", (objetoCargado) => {

                objetoCargado.scale.setScalar(.09);
                objetoCargado.rotation.y = 0;
                objetoCargado.rotation.z = .5;
                objetoCargado.position.x = -50;
                objetoCargado.position.z = -55;
                objetoCargado.position.y = -30;
                scene.add(objetoCargado);

                var objetoCargado1 = objetoCargado.clone();
                objetoCargado1.scale.setScalar(.09);
                objetoCargado1.rotation.y = 0;
                objetoCargado1.rotation.z = .6;
                objetoCargado.position.x = -35;
                objetoCargado.position.z = 55;
                objetoCargado1.position.y = -30;
                scene.add(objetoCargado1);

            });


            loadOBJWithMTL("modelos/sand/", "roca2.obj", "roca2.mtl", (objetoCargado) => {

                objetoCargado.scale.setScalar(2);
                objetoCargado.rotation.y = 0;
                objetoCargado.rotation.z = .5;
                objetoCargado.position.x = 20;
                objetoCargado.position.z = -5;
                objetoCargado.position.y = 0;
                scene.add(objetoCargado);

            });

            

            loadOBJWithMTL("modelos/sand/", "pelota.obj", "pelota.mtl", (objetoCargado) => {

                objetoCargado.scale.setScalar(1.5);
                objetoCargado.rotation.y = 0;
                objetoCargado.rotation.z = .5;
                objetoCargado.position.x = 20;
                objetoCargado.position.z = 35;
                objetoCargado.position.y = -5;
                scene.add(objetoCargado);

                var objetoCargado1 = objetoCargado.clone();
                objetoCargado1.scale.setScalar(1.5);
                objetoCargado1.rotation.y = 0;
                objetoCargado1.rotation.z = .5;
                objetoCargado1.position.x = 0;
                objetoCargado1.position.z = -30;
                objetoCargado1.position.y = -5;
                scene.add(objetoCargado1);

            });


            function loadOBJWithMTL(path, objFile, mtlFile, onLoadCallback) {
        
            var mtlLoader = new THREE.MTLLoader();
                mtlLoader.setPath(path);
                mtlLoader.load(mtlFile, (materialCargado) => {
                // Este bloque se llama solo cuando se termine de cargar el material

                var objLoader = new THREE.OBJLoader();
                objLoader.setPath(path);
                objLoader.setMaterials( materialCargado );
                
                objLoader.load(objFile, (objetoCargado) => {
                    // Este bloque se llama solo cuando se termine de cargar el obj

                    onLoadCallback(objetoCargado);
                    });
                });
            }

loader = new THREE.FBXLoader();
            loader.load( "modelos/redondel.fbx", function ( personaje ) {
            
           
            personaje.position.x = -21;
            personaje.position.y = 0;
            personaje.position.z = 25;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenarioDer";
            scene.add(personaje);
            escenarioColisionesDer.push(personaje);

            
       

          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/redondel.fbx", function ( personaje ) {
            
           
            personaje.position.x = -5;
            personaje.position.y = 0;
            personaje.position.z = 25;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenarioIzq";
            scene.add(personaje);
            escenarioColisionesDer.push(personaje);

            
       

          
         
        })


            loader = new THREE.FBXLoader();
            loader.load( "modelos/redondel.fbx", function ( personaje ) {
            
           
            personaje.position.x = 10;
            personaje.position.y = 0;
            personaje.position.z = 25;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesDer.push(personaje);

            
       

          
         
        })


            loader = new THREE.FBXLoader();
            loader.load( "modelos/redondel.fbx", function ( personaje ) {
            
           
            personaje.position.x = -21;
            personaje.position.y = 0;
            personaje.position.z = -25;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesIzq.push(personaje);

            
       

          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/redondel.fbx", function ( personaje ) {
            
           
            personaje.position.x = -5;
            personaje.position.y = 0;
            personaje.position.z = -25;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesIzq.push(personaje);

            
       

          
         
        })


            loader = new THREE.FBXLoader();
            loader.load( "modelos/redondel.fbx", function ( personaje ) {
            
           
            personaje.position.x = 10;
            personaje.position.y = 0;
            personaje.position.z = -25;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesIzq.push(personaje);

            
       

          
         
        })




            loader = new THREE.FBXLoader();
            loader.load( "modelos/redondelArriba.fbx", function ( personaje ) {
            
           
            personaje.position.x = -21;
            personaje.position.y = 0;
            personaje.position.z = 25;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesUp.push(personaje);

            
       

          
         
        })

             loader = new THREE.FBXLoader();
            loader.load( "modelos/redondelArriba.fbx", function ( personaje ) {
            
           
            personaje.position.x = -20.9;
            personaje.position.y = 0;
            personaje.position.z = 8;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesUp.push(personaje);

            
       

          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/redondelArriba.fbx", function ( personaje ) {
            
           
            personaje.position.x = -20.8;
            personaje.position.y = 0;
            personaje.position.z = -9;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesUp.push(personaje);

            
       

          
         
        })



            loader = new THREE.FBXLoader();
            loader.load( "modelos/redondelArriba.fbx", function ( personaje ) {
            
           
            personaje.position.x = 25.5;
            personaje.position.y = 0;
            personaje.position.z = 25;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesDown.push(personaje);

            
       

          
         
        })

             loader = new THREE.FBXLoader();
            loader.load( "modelos/redondelArriba.fbx", function ( personaje ) {
            
           
            personaje.position.x = 25.5;
            personaje.position.y = 0;
            personaje.position.z = 8;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesDown.push(personaje);

            
       

          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/redondelArriba.fbx", function ( personaje ) {
            
           
            personaje.position.x = 25.5;
            personaje.position.y = 0;
            personaje.position.z = -9;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.011);
            personaje.traverse(function (child){
             child.castShadow = true;
             child.receiveShadow = true;
             child.material = cubeMat;
         
     });
            
          



            personaje.name = "escenario";
            scene.add(personaje);
            escenarioColisionesDown.push(personaje);

            
       

          
         
        })



            


            var sphGeo = new THREE.SphereGeometry(15.5);
            var sphMat = new THREE.MeshLambertMaterial({color: 0x0F99D08} );
            var meshG = new THREE.Mesh( sphGeo, sphMat);


loader = new THREE.FBXLoader();
            loader.load( "modelos/doctores/animacionesExportadas/walkwalk.fbx", function ( personaje ) {
            mixerDocWalk = new THREE.AnimationMixer(personaje);
            arregloDoc.push(mixerDocWalk);
            const clips = personaje.animations;
            const clip = THREE.AnimationClip.findByName(clips,"walk");
            
            const action = mixerDocWalk.clipAction(clip);

            action.play();
           
            personaje.position.x = 10;
            personaje.position.y = 0;
            personaje.position.z = 19;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.023);
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
         }
     });
            


            
            enemigo = personaje;
            enemigo.name = "enemigo1";

            doctoresColisiones.push(personaje);

            

            
            meshG1 = meshG.clone();
            meshG1.position.set(enemigo.position.x,enemigo.position.y ,enemigo.position.z);
            meshG1.name = "boxIACol";
            
           
            campoDeVision.push(meshG1);
            scene.add(enemigo);
 
            
       

          
         
        })

      


// var mtlLoader = new THREE.MTLLoader();
//         mtlLoader.setPath("modelos/");
//         mtlLoader.load("cubeeObj.mtl", (materialCargado) => {
//             // Este bloque se llama solo cuando se termine de cargar el material

//             var objLoader = new THREE.OBJLoader();
//             objLoader.setPath("modelos/");
//             objLoader.setMaterials( materialCargado );
            
//             objLoader.load("cubeeObj.obj", (objetoCargado) => {
//                 // Este bloque se llama solo cuando se termine de cargar el obj
// scene.add(objetoCargado);
//             });

//         });


            
           
           






            loader = new THREE.FBXLoader();
            loader.load( "modelos/doctores/animacionesExportadas/walkwalk.fbx", function ( personaje ) {
            mixerDocWalk2 = new THREE.AnimationMixer(personaje);
            arregloDoc2.push(mixerDocWalk2);
            const clips = personaje.animations;
            const clip = THREE.AnimationClip.findByName(clips,"walk");
            
            const action = mixerDocWalk2.clipAction(clip);

            action.play();
           
            personaje.position.x = 18;
            personaje.position.y = 0;
            personaje.position.z = 5;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.023);
            personaje.traverse(function (child){
         if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
         }
     });
            
           
            enemigo2 = personaje;
            enemigo2.name = "enemigo2";
            scene.add(enemigo2);
            doctoresColisiones.push(personaje);


            meshG2 = meshG.clone();
            meshG2.position.set(enemigo2.position.x,enemigo2.position.y ,enemigo2.position.z);
            meshG2.name = "boxIACol2";
            
           
            campoDeVision.push(meshG2);

          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/doctores/animacionesExportadas/walkwalk.fbx", function ( personaje ) {
            mixerDocWalk3 = new THREE.AnimationMixer(personaje);
            arregloDoc3.push(mixerDocWalk3);
            const clips = personaje.animations;
            const clip = THREE.AnimationClip.findByName(clips,"walk");
            
            const action = mixerDocWalk3.clipAction(clip);

            action.play();
           
            personaje.position.x = -18;
            personaje.position.y = 0;
            personaje.position.z = 14;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.023);
            personaje.traverse(function (child){
         if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
         }
     });
            
           
            enemigo3 = personaje;
            enemigo3.name = "enemigo3";
            scene.add(enemigo3);
            doctoresColisiones.push(personaje);


            meshG3 = meshG.clone();
            meshG3.position.set(enemigo3.position.x,enemigo3.position.y ,enemigo3.position.z);
            meshG3.name = "boxIACol3";
            
            campoDeVision.push(meshG3);

           
          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/doctores/animacionesExportadas/walkwalk.fbx", function ( personaje ) {
            mixerDocWalk4 = new THREE.AnimationMixer(personaje);
            arregloDoc4.push(mixerDocWalk4);
            const clips = personaje.animations;
            const clip = THREE.AnimationClip.findByName(clips,"walk");
            
            const action = mixerDocWalk4.clipAction(clip);

            action.play();
           
            personaje.position.x = -18;
            personaje.position.y = 0;
            personaje.position.z = -14;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.023);
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
         }
     });
            
           
            enemigo4 = personaje;
            enemigo4.name = "enemigo4";




            
            scene.add(enemigo4);
            doctoresColisiones.push(personaje);

            meshG4 = meshG.clone();
            meshG4.position.set(enemigo4.position.x,enemigo4.position.y ,enemigo4.position.z);
            meshG4.name = "boxIACol4";
            
            campoDeVision.push(meshG4);

            
       

          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/doctores/animacionesExportadas/walkwalk.fbx", function ( personaje ) {
            mixerDocWalk5 = new THREE.AnimationMixer(personaje);
            arregloDoc5.push(mixerDocWalk5);
            const clips = personaje.animations;
            const clip = THREE.AnimationClip.findByName(clips,"walk");
            
            const action = mixerDocWalk5.clipAction(clip);

            action.play();
           
            personaje.position.x = 10;
            personaje.position.y = 0;
            personaje.position.z = 0;
            personaje.rotation.y  = 15;
            personaje.scale.setScalar(0.023);
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
         }
     });
            
           
            enemigo5 = personaje;
            enemigo5.name = "enemigo5";
            doctoresColisiones.push(personaje);



            
            scene.add(enemigo5);

            meshG5 = meshG.clone();
            meshG5.position.set(enemigo5.position.x,enemigo5.position.y ,enemigo5.position.z);
            meshG5.name = "boxIACol5";
            
            campoDeVision.push(meshG5);
            
       

          
         
        })

            loader = new THREE.FBXLoader();
            loader.load( "modelos/doctores/animacionesExportadas/walkwalk.fbx", function ( personaje ) {
            mixerDocWalk6 = new THREE.AnimationMixer(personaje);
            arregloDoc6.push(mixerDocWalk6);
            const clips = personaje.animations;
            const clip = THREE.AnimationClip.findByName(clips,"walk");
            
            const action = mixerDocWalk6.clipAction(clip);

            action.play();
           
            personaje.position.x = 10;
            personaje.position.y = 0;
            personaje.position.z = -15;
            personaje.rotation.y  = 0;
            personaje.scale.setScalar(0.023);
            personaje.traverse(function (child){
            if(child.isMesh){
             child.castShadow = true;
             child.receiveShadow = true;
         }
     });
            
           
            enemigo6 = personaje;
            enemigo6.name = "enemigo6";
            doctoresColisiones.push(personaje);


            meshG6 = meshG.clone();
            meshG6.position.set(enemigo6.position.x,enemigo6.position.y ,enemigo6.position.z);
            meshG6.name = "boxIACol6";
            
            campoDeVision.push(meshG6);
            
            scene.add(enemigo6);
            
       

          
         
        })








// modelMat = new THREE.MTLLoader();
// modelMat.load('modelos/doctores/doctorObj.mtl',function(material){
//     material.preload();
//     loader = new THREE.FBXLoader();
//     loader.load("modelos/doctores/caminar.fbx",function(personaje){
//         personaje.position.x = 0;
//         personaje.position.y = 0;
//         personaje.position.z = 0;
//         personaje.scale.setScalar(0.021);

//         personaje.traverse(function(child){
//             child.castShadow = true;
//             child.receiveShadow = true;
//             child.material = material
//         })
//         scene.add(personaje);
//     });
// });
// loaderFBX = new THREE.FBXLoader()
// loaderFBX.load("modelos/doctores/animacionesExportadas/doctorFBX.fbx",function(personaje){
//     personaje.scale.setScalar(0.058);
    
//     scene.add(personaje);
// })


// loader = new THREE.FBXLoader();
// loader.load( "modelos/doctores/animacionesExportadas/docAllAnimattack.fbx", function ( personaje ) {
//      mixer = new THREE.AnimationMixer(personaje);
//      mixers.push(mixer);
//      const clips = personaje.animations;
//      const clip = THREE.AnimationClip.findByName(clips,"attack");
//      console.log(clip);
//     const action = mixer.clipAction(clip);
//     action.play();
//     console.log(action);
//     personaje.position.x = 0;
//      personaje.position.y = 0;
//      personaje.position.z = 0;
//      personaje.rotation.y  = 0;
//      personaje.scale.setScalar(0.058);
// personaje.traverse(function (child){
//          if(child.isMesh){
//              child.castShadow = true;
//              child.receiveShadow = true;
             

            
//          }
//      });
// scene.add( personaje );

//  });




























                                             // carga de modelos



     //        loader = new THREE.FBXLoader();
     //        loader.load( "modelos/doctores/animacionesExportadas/docAllAnimwalk.fbx", function ( personaje ) {
     //        mixerDocWalk2 = new THREE.AnimationMixer(personaje);
     //        arregloDoc2.push(mixerDocWalk2);
     //        const clips = personaje.animations;
     //        const clip = THREE.AnimationClip.findByName(clips,"walk");
            
     //        const action = mixerDocWalk2.clipAction(clip);

     //        action.play();
           
     //        personaje.position.x = 0;
     //        personaje.position.y = 0;
     //        personaje.position.z = 10;
     //        personaje.rotation.y  = 0;
     //        personaje.scale.setScalar(0.023);
     //        personaje.traverse(function (child){
     //     if(child.isMesh){
     //         child.castShadow = true;
     //         child.receiveShadow = true;
     //     }
     // });
            
     //        scene.add( personaje );
     //        enemigo2 = personaje;

           
     //    })



            



            





                                            // colisiones




// IA Manager
function randomFunc(){
     var random = (0, 4) 
    random = Math.floor(Math.random() * (4 - 0)) + 0;
    return random;
}


   function r(random){
    // var random = (0, 5) 
    // random = Math.floor(Math.random() * (5 - 0)) + 0;
    // return random
        // function getRandomRotation(){
       
    // enemigoR = random;
    // enemigoR2 = random;

        switch(random){
        case 0:
        var rotation = 0;
        break;
        case 1:
        var rotation = 1.5;
        break;
        case 2:
        var rotation = 3.3;
        break;
        case 3:
        var rotation = 4.79;
        break;
    

}


    return rotation
}


function Avanzar(pRandom,pEnemigo, pVel , pBox){
    var random = pRandom;

    switch(random){
        case 0:
        pEnemigo.position.x += 0.041 * pVel;
        pBox.position.x += 0.041 * pVel;
        break;

        case 1:
        pEnemigo.position.z -=0.041 * pVel;
        pBox.position.z -=0.041 * pVel;
        break;

        case 2:
        pEnemigo.position.x -=0.041 * pVel;
        pBox.position.x -=0.041 * pVel;
        break;

        case 3:
        pEnemigo.position.z +=0.041 *pVel;
        pBox.position.z +=0.041 *pVel;
        break;

            

    }



}

function Perseguir(pPlayer , pEnemigo ){
    var positionX = pPlayer.position.x - pEnemigo.position.x;
    var positionZ = pPlayer.position.z  - pEnemigo.position.z;
    
    if(positionZ > 0){
        pEnemigo.position.z += 0.041;
    }else {
        pEnemigo.position.z -= 0.041;
    }

     if(positionX > 0){
        pEnemigo.position.x += 0.041;
    }else {
        pEnemigo.position.x -= 0.041;
    }

    pEnemigo.lookAt(pPlayer.position);





}





function onKeyDown(event) {
    keys[String.fromCharCode(event.keyCode)] = true;
}


function onKeyUp(event) {
    keys[String.fromCharCode(event.keyCode)] = false;
}


 

     var enemigo = scene.getObjectByName("enemigo1");
     var enemigo2 = scene.getObjectByName("enemigo2");
     var enemigo3 = scene.getObjectByName("enemigo3");
     var enemigo4 = scene.getObjectByName("enemigo4");
     var enemigo5 = scene.getObjectByName("enemigo5");
     var enemigo6 = scene.getObjectByName("enemigo6");
     
     var enemigoAttack = scene.getObjectByName("enemigoAttack");
     var playerObj = scene.getObjectByName("player");
     
     var coin1 = scene.getObjectByName("coin1");
     var coin2 = scene.getObjectByName("coin2");
    var coin3 = scene.getObjectByName("coin3");
     var coin4 = scene.getObjectByName("coin4");

     var pared = scene.getObjectByName("escenario");
     var powerUp1R = scene.getObjectByName("powerUp1");
     var powerUp2R = scene.getObjectByName("powerUp12");
     var powerUpEscudo = scene.getObjectByName("powerUpEscudo");
     var PowerUp2V = scene.getObjectByName("powerUp2");
     var PowerUp21V = scene.getObjectByName("powerUp21");
   

    var geo = new THREE.SphereGeometry(2);
    var mesh = new THREE.Mesh( geo, escudoMat);

    // IA
    var meshG1 =  scene.getObjectByName("boxIACol");
    var meshG2 =  scene.getObjectByName("boxIACol2");
    var meshG3 =  scene.getObjectByName("boxIACol3");
    var meshG4 =  scene.getObjectByName("boxIACol4");
    var meshG5 =  scene.getObjectByName("boxIACol5");
    var meshG6 =  scene.getObjectByName("boxIACol6");




     
        // render the scene
        function render() {
           


            if(keys["P"] && pausa == false){
                console.log("pausa");
                $("#HUD").find("#pausaPanel").attr("height","600");
                $("#HUD").find("#pausaPanel").attr("width","800");  
                pausa = true;

            }
            if(keys["L"] && pausa == true){
                $("#HUD").find("#pausaPanel").attr("height","1");
                $("#HUD").find("#pausaPanel").attr("width","1");  
                pausa = false;
            }

        
           requestAnimationFrame(render);
        
       
        tiempoDelta = clock.getDelta();
        // console.log(playerObj.position);

     

        if (keys["A"] && pausa == false) {
    
            if(frenoEnA == false){
                playerObj.position.z += 0.125 * speed;
                mesh.position.z += 0.125 * speed;

                frenoEnW = false;
                frenoEnD = false;
                frenoEnS = false;
            }else {
                
            }
            
        } else if (keys["D"] && pausa == false) {
            if(frenoEnD == false){
                playerObj.position.z -= 0.125 * speed;
                mesh.position.z -= 0.125 * speed;
                frenoEnW = false;
                frenoEnA = false;
                frenoEnS = false;

            }else {
                

            }

            
        }
        if (keys["W"] && pausa == false) {
            if(frenoEnW == false){
            playerObj.position.x -= 0.125 * speed;
            mesh.position.x -= 0.125 * speed;
                frenoEnA = false;
                frenoEnD = false;
                frenoEnS = false;


            }else {
              
            }

           
        } else if (keys["S"] && pausa == false) {
            if(frenoEnS == false){
            playerObj.position.x += 0.125 * speed;
            mesh.position.x += 0.125 * speed;
            frenoEnW = false;
            frenoEnA = false;
            frenoEnD = false;


            }else {
               
            }

            

           
        }
        

            

                
                spotLight.position.set(
                    camera.position.x + 10,
                    camera.position.y +10,
                    camera.position.z + 10);
                if (arregloDoc6.length > 0 && pausa == false){
                mixerDocWalk.update(2.2 * tiempoDelta);
                 mixerDocWalk2.update(2.2 * tiempoDelta);
                 mixerDocWalk3.update(2.2 * tiempoDelta);
                 mixerDocWalk4.update(2.2 * tiempoDelta);
                  mixerDocWalk5.update(2.2 * tiempoDelta);
                 mixerDocWalk6.update(2.2 * tiempoDelta);
                 mixerDocWalkAttack.update(1.70 * tiempoDelta);
                 playerObj.rotation.y += THREE.Math.degToRad(20 * tiempoDelta);
                 playerObj.rotation.x += THREE.Math.degToRad(28 * tiempoDelta);
                 playerObj.rotation.z += THREE.Math.degToRad(30 * tiempoDelta);



        //         if (playerObj.position.y < 10 ){
        //     i = +2
        //     }
        //     else if(playerObj.position.y > -5){
        //         i = -2
        //     }
        

        // playerObj.position.y += i * tiempoDelta;

        // powerUps
        powerUp1R.rotation.y += THREE.Math.degToRad(450 * tiempoDelta);
        powerUp2R.rotation.y -= THREE.Math.degToRad(450 * tiempoDelta);
        powerUpEscudo.rotation.y += THREE.Math.degToRad(450 * tiempoDelta);
        PowerUp2V.rotation.y -= THREE.Math.degToRad(450 * tiempoDelta);
        PowerUp21V.rotation.y += THREE.Math.degToRad(450 * tiempoDelta);

        // coins

 playerPos = playerObj.position;

                coin1.rotation.z += THREE.Math.degToRad(850 * tiempoDelta);
                coin2.rotation.z -= THREE.Math.degToRad(850 * tiempoDelta);
                coin3.rotation.z += THREE.Math.degToRad(850 * tiempoDelta);
                coin4.rotation.z -= THREE.Math.degToRad(850 * tiempoDelta);

                coin5.rotation.z += THREE.Math.degToRad(850 * tiempoDelta);
                coin6.rotation.z -= THREE.Math.degToRad(850 * tiempoDelta);
                coin7.rotation.z += THREE.Math.degToRad(850 * tiempoDelta);
                coin8.rotation.z -= THREE.Math.degToRad(850 * tiempoDelta);

                coin9.rotation.z += THREE.Math.degToRad(850 * tiempoDelta);
                coin10.rotation.z -= THREE.Math.degToRad(850 * tiempoDelta);
                coin11.rotation.z += THREE.Math.degToRad(850 * tiempoDelta);
                coin12.rotation.z -= THREE.Math.degToRad(850 * tiempoDelta);
                

                for (var i = 0; i < rayos.length; i++) {

                var rayo = rayos[i];

                raycaster.set(playerObj.position, rayo);


                var colision = raycaster.intersectObjects(objetosConColision, true);


                if (colision.length > 0 && colision[0].distance < 2) {
                    if(colision[0].object.parent.name == "coin1"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                    var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {

                    }
                    scene.remove(delCoin);

                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin1"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;
                        


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }
                if(colision[0].object.parent.name == "coin2"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                     var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin2"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }
                if(colision[0].object.parent.name == "coin3"){
                    var delCoin = colision[0].object.parent;
                     var sound = document.getElementById("monedaFX");
                      var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                   
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin3"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }
               if(colision[0].object.parent.name == "coin4"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                      var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin4"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }

                if(colision[0].object.parent.name == "coin5"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                     var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin5"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }

                if(colision[0].object.parent.name == "coin6"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                  var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin6"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }

                if(colision[0].object.parent.name == "coin7"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                   var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin7"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }

                if(colision[0].object.parent.name == "coin8"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                     var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin8"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }
                if(colision[0].object.parent.name == "coin9"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                       var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin9"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }
                if(colision[0].object.parent.name == "coin10"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                       var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin10"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }
                if(colision[0].object.parent.name == "coin11"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                       var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin11"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }
                if(colision[0].object.parent.name == "coin12"){
                    var delCoin = colision[0].object.parent;
                    var sound = document.getElementById("monedaFX");
                       var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    sound.play();

                    } else {
                        
                    }
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "coin12"){
                        objetosConColision.splice(i, 1);
                        puntaje += 1;


                        }

                        
                        
                    }
                    console.log("chocamos con moneda terminamos colision con moneda");
                    console.log("puntaje " + puntaje);
                }

                if(puntaje >= 2){
                    alert("has ganado");
                    window.location.href = window.location.href + "pausa.php" + "?w1=" + puntaje;


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


if (isset($_GET["w1"])){
    // asignar w1 y w2 a dos variables
    $var = $_GET["w1"];
 
    // mostrar $phpVar1 y $phpVar2
    echo "$var";
} else {
    echo "<p>No parameters</p>";
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




 ?>




                    
                }


                if(colision[0].object.parent.name == "powerUp1"){
                    var delCoin = colision[0].object.parent;
                    scene.remove(delCoin);
                    var pUp = document.getElementById('powerUp');
                      var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    pUp.play();

                    } else {
                        
                    }
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "powerUp1"){
                        objetosConColision.splice(i, 1);
                        console.log("ya tenemos powerUp");
                    speedUp.start();
                    powerUp1Bool = true;
                    speed = speed * 3;
                    

                        }

                        
                        
                    }
                    
                }


                if(colision[0].object.parent.name == "powerUp12"){
                    var delCoin = colision[0].object.parent;
                    scene.remove(delCoin);
                    var pUp = document.getElementById('powerUp');
                        var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    pUp.play();

                    } else {
                        
                    }
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "powerUp12"){
                        objetosConColision.splice(i, 1);

                    speedUp.start();
                    powerUp2Bool = true;
                    speed = speed * 3;
                    

                        }

                        
                        
                    }
                    
                }



                if(colision[0].object.parent.name == "powerUp2"){
                    var delCoin = colision[0].object.parent;
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "powerUp2"){
                        objetosConColision.splice(i, 1);

                        vidas = vidas +1;
                        console.log(vidas);
                        var pUp = document.getElementById('powerUp');
                        var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    pUp.play();

                    } else {
                        
                    }

                         if(vidas == 5){
                        $("#HUD").find("#life5").attr("src","graficasWeb/corazonPixel.png");   
                        }
                        else if(vidas == 4){
                        $("#HUD").find("#life4").attr("src","graficasWeb/corazonPixel.png");   
                        }
                        else if(vidas == 3){
                        $("#HUD").find("#life3").attr("src","graficasWeb/corazonPixel.png");            
                        }else if(vidas == 2){
                        $("#HUD").find("#life2").attr("src","graficasWeb/corazonPixel.png");   
                        }else if(vidas == 1){
                        $("#HUD").find("#life1").attr("src","graficasWeb/corazonPixel.png");   
                        }

                        }

                        
                        
                    }
                    
                }

                 if(colision[0].object.parent.name == "powerUpEscudo"){
                    var delCoin = colision[0].object.parent;
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "powerUpEscudo"){
                        objetosConColision.splice(i, 1);

                       
                        console.log("tomamos escudo");
                        
                        mesh.position.set(playerObj.position.x,playerObj.position.y,playerObj.position.z);
                        playerObj.add(mesh);
                        scene.add(mesh);
                        escudo = true;
                        var pUp = document.getElementById('powerUp');
                        var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    pUp.play();

                    } else {
                        
                    }

                        }

                        
                        
                    }
                    
                }


                if(colision[0].object.parent.name == "powerUp21"){
                    var delCoin = colision[0].object.parent;
                    scene.remove(delCoin);
                    for (var i = 0;  i < objetosConColision.length; i++) {
                        if(objetosConColision[i].name == "powerUp21"){
                        objetosConColision.splice(i, 1);

                        vidas = vidas +1;
                        console.log(vidas);
                        var pUp = document.getElementById('powerUp');
                       var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                    pUp.play();

                    } else {
                        
                    }

                        if(vidas == 5){
                        $("#HUD").find("#life5").attr("src","graficasWeb/corazonPixel.png");   
                        }
                        else if(vidas == 4){
                        $("#HUD").find("#life4").attr("src","graficasWeb/corazonPixel.png");   
                        }
                        else if(vidas == 3){
                        $("#HUD").find("#life3").attr("src","graficasWeb/corazonPixel.png");            
                        }else if(vidas == 2){
                        $("#HUD").find("#life2").attr("src","graficasWeb/corazonPixel.png");   
                        }else if(vidas == 1){
                        $("#HUD").find("#life1").attr("src","graficasWeb/corazonPixel.png");   
                        }


                        
                        }
                        
                    }
                    
                }




                //D
                if(colision[0].object.parent.name == "escenarioIzq" && rayo.z == -1){
                    frenoEnW = false;
                    frenoEnA = false;
                    frenoEnS = false;
                    frenoEnD = true;
                    
                    vectorTemp = rayo;
                }else if(rayo != vectorTemp){
                    frenoEnW = false;
                    frenoEnA = false;
                    frenoEnS = false;
                    frenoEnD = false;
                    vectorTemp = rayo;
                }
                //A
                if(colision[0].object.parent.name == "escenario" && rayo.z == 1){
                    frenoEnW = false;
                    frenoEnA = true;
                    frenoEnS = false;
                    frenoEnD = false;
                    vectorTemp = rayo;
                }else if(rayo != vectorTemp){
                    frenoEnW = false;
                    frenoEnA = false;
                    frenoEnS = false;
                    frenoEnD = false;
                    vectorTemp = rayo;
                    
                }
                if(colision[0].object.parent.name == "escenario" && rayo.x == -1){
                    frenoEnW = true;
                    frenoEnA = false;
                    frenoEnS = false;
                    frenoEnD = false;
                    vectorTemp = rayo;
                }else if(rayo != vectorTemp){
                    frenoEnW = false;
                    frenoEnA = false;
                    frenoEnS = false;
                    frenoEnD = false;
                    vectorTemp = rayo;
                    
                }
                 if(colision[0].object.parent.name == "escenario" && rayo.x == 1){
                    frenoEnW = false;
                    frenoEnA = false;
                    frenoEnS = true;
                    frenoEnD = false;
                    vectorTemp = rayo;
                }else if(rayo != vectorTemp){
                    frenoEnW = false;
                    frenoEnA = false;
                    frenoEnS = false;
                    frenoEnD = false;
                    vectorTemp = rayo;
                    
                }
                
              

            
            }
        }


        // powerUpTimers:

        if (powerUp1Bool || powerUp2Bool){
            if(speedUp.getElapsedTime() < 8.5){
        }else {
            powerUp1Bool = false;
            speed = 1;
        }
    }

        if (powerUp1Bool && powerUp2Bool){
            if(speedUp.getElapsedTime() < 8.5){
        }else {
            powerUp2Bool = false;
            speed = 1;
        }
    }




// colisionesDoctores


for (var i = 0; i < escenarioColisionesDer.length; i++) {
    var cajaMapa = new THREE.Box3().setFromObject(escenarioColisionesDer[i]);
    var docC1 = new THREE.Box3().setFromObject(enemigo);
    var docC2 = new THREE.Box3().setFromObject(enemigo2);
    var docC3 = new THREE.Box3().setFromObject(enemigo3);
     var docC4 = new THREE.Box3().setFromObject(enemigo4);
    var docC5 = new THREE.Box3().setFromObject(enemigo5);
    var docC6 = new THREE.Box3().setFromObject(enemigo6);
    var playerC = new THREE.Box3().setFromObject(playerObj);
    
    var colisiones1 = cajaMapa.intersectsBox(docC1);
     var colisiones2 = cajaMapa.intersectsBox(docC2);
      var colisiones3 = cajaMapa.intersectsBox(docC3);
      var colisiones4 = cajaMapa.intersectsBox(docC4);
     var colisiones5 = cajaMapa.intersectsBox(docC5);
      var colisiones6 = cajaMapa.intersectsBox(docC6);
      var colisiones7 = cajaMapa.intersectsBox(playerC);
    
    if (colisiones1 && choque1 == false){
        enemigoR = 1;
        enemigo.rotation.y = r(enemigoR);
        Avanzar(enemigoR,enemigo,1,meshG1);

        choque1 = true;
        choque1 = Nocolision();             

        
    }

    if (colisiones2 && choque2 == false){
        enemigoR2 = 1;
        enemigo2.rotation.y = r(enemigoR2);
        Avanzar(enemigoR2,enemigo2,1,meshG2);

        choque2 = true;
        choque2 = Nocolision();        

        
    }

    if (colisiones3 && choque3 == false){
        enemigoR3 = 1;
        enemigo3.rotation.y = r(enemigoR3);
        Avanzar(enemigoR3,enemigo3,1,meshG3);

        choque3 = true;
        choque3 = Nocolision();       

        
    }

    if (colisiones4 && choque4 == false){
        enemigoR4 = 1;
        enemigo4.rotation.y = r(enemigoR4);
        Avanzar(enemigoR4,enemigo4,1,meshG4);

        choque4 = true;
        choque4 = Nocolision();       

        
    }
    if (colisiones5 && choque5 == false){
        enemigoR5 = 1;
        enemigo5.rotation.y = r(enemigoR5);
        Avanzar(enemigoR5,enemigo4,1,meshG5);

        choque5 = true;
        choque5 = Nocolision();       

        
    }

    if (colisiones6 && choque6 == false){
        enemigoR6 = 1;
        enemigo6.rotation.y = r(enemigoR6);
        Avanzar(enemigoR6,enemigo6,1,meshG6);

        choque6 = true;
        choque6 = Nocolision();       

        
    }

    if (colisiones7 && choque7 == false){
        playerObj.position.z -= 3.5;
        mesh.position.z -= 3.5; 
 
        choque7 =true;
        choque7 = NocolisionPlayer(); 
        

        
    }
}

    for (var i = 0; i < escenarioColisionesIzq.length; i++) {
    var cajaMapa = new THREE.Box3().setFromObject(escenarioColisionesIzq[i]);
    var docC1 = new THREE.Box3().setFromObject(enemigo);
    var docC2 = new THREE.Box3().setFromObject(enemigo2);
    var docC3 = new THREE.Box3().setFromObject(enemigo3);
    var docC4 = new THREE.Box3().setFromObject(enemigo4);
    var docC5 = new THREE.Box3().setFromObject(enemigo5);
    var docC6 = new THREE.Box3().setFromObject(enemigo6);
    
      var colisiones1 = cajaMapa.intersectsBox(docC1);
      var colisiones2 = cajaMapa.intersectsBox(docC2);
      var colisiones3 = cajaMapa.intersectsBox(docC3);
      var colisiones4 = cajaMapa.intersectsBox(docC4);
      var colisiones5 = cajaMapa.intersectsBox(docC5);
      var colisiones6 = cajaMapa.intersectsBox(docC6);

 var playerC = new THREE.Box3().setFromObject(playerObj);
 var colisiones7 = cajaMapa.intersectsBox(playerC);
    
    if (colisiones1 && choque1 == false){
        enemigoR = 3;
        enemigo.rotation.y = r(enemigoR);
        Avanzar(enemigoR,enemigo,1,meshG1);

        choque1 = true;
        choque1 = Nocolision();        

        
    }

    if (colisiones2 && choque2 == false){
        enemigoR2 = 3;
        enemigo2.rotation.y = r(enemigoR2);
        Avanzar(enemigoR2,enemigo2,1,meshG2);

        choque2 = true;
        choque2 = Nocolision();


        
    }

    if (colisiones3 && choque3 == false){
        enemigoR3 = 3;
        enemigo3.rotation.y = r(enemigoR3);
        Avanzar(enemigoR3,enemigo3,1,meshG3);

        choque3 = true;
        choque3 = Nocolision();        

        
    }

     if (colisiones4 && choque4 == false){
        enemigoR4 = 3;
        enemigo4.rotation.y = r(enemigoR4);
        Avanzar(enemigoR4,enemigo4,1,meshG4);

        choque4 = true;
        choque4 = Nocolision();        

        
    }

    if (colisiones5 && choque5 == false){
        enemigoR5 = 3;
        enemigo5.rotation.y = r(enemigoR5);
        Avanzar(enemigoR5,enemigo5,1,meshG5);

        choque5 = true;
        choque5 = Nocolision();        

        
    }

    if (colisiones6 && choque6 == false){
        enemigoR6 = 3;
        enemigo6.rotation.y = r(enemigoR6);
        Avanzar(enemigoR6,enemigo6,1,meshG6);

        choque6 = true;
        choque6 = Nocolision();        

        
    }

    if (colisiones7 && choque7 == false){
        playerObj.position.z += 3.5;
        mesh.position.z += 3.5; 
        choque7 =true;
        choque7 = NocolisionPlayer(); 
        

        
    }


}


for (var i = 0; i < escenarioColisionesUp.length; i++) {
    var cajaMapa = new THREE.Box3().setFromObject(escenarioColisionesUp[i]);
    var docC1 = new THREE.Box3().setFromObject(enemigo);
    var docC2 = new THREE.Box3().setFromObject(enemigo2);
    var docC3 = new THREE.Box3().setFromObject(enemigo3);
    var docC4 = new THREE.Box3().setFromObject(enemigo4);
    var docC5 = new THREE.Box3().setFromObject(enemigo5);
    var docC6 = new THREE.Box3().setFromObject(enemigo6);
    var playerC = new THREE.Box3().setFromObject(playerObj);
    
    var colisiones1 = cajaMapa.intersectsBox(docC1);
     var colisiones2 = cajaMapa.intersectsBox(docC2);
      var colisiones3 = cajaMapa.intersectsBox(docC3);
      var colisiones4 = cajaMapa.intersectsBox(docC4);
     var colisiones5 = cajaMapa.intersectsBox(docC5);
      var colisiones6 = cajaMapa.intersectsBox(docC6);
      var colisiones7 = cajaMapa.intersectsBox(playerC);
    
    if (colisiones1 && choque1 == false){
        enemigoR = 0;
        enemigo.rotation.y = r(enemigoR);
        Avanzar(enemigoR,enemigo,1,meshG1);

        choque1 = true;
        choque1 = Nocolision();        

        
    }

    if (colisiones2 && choque2 == false){
        enemigoR2 = 0;
        enemigo2.rotation.y = r(enemigoR2);
        Avanzar(enemigoR2,enemigo2,1,meshG2);

        choque2 = true;
        choque2 = Nocolision();


        
    }

    if (colisiones3 && choque3 == false){
        enemigoR3 = 0;
        enemigo3.rotation.y = r(enemigoR3);
        Avanzar(enemigoR3,enemigo3,1,meshG3);

        choque3 = true;
        choque3 = Nocolision();        

        
    }

    if (colisiones4 && choque4 == false){
        enemigoR4 = 0;
        enemigo4.rotation.y = r(enemigoR4);
        Avanzar(enemigoR4,enemigo4,1,meshG4);

        choque4 = true;
        choque4 = Nocolision();        

        
    }
    if (colisiones5 && choque5 == false){
        enemigoR5 = 0;
        enemigo5.rotation.y = r(enemigoR5);
        Avanzar(enemigoR5,enemigo5,1,meshG5);

        choque5 = true;
        choque5 = Nocolision();        

        
    }
    if (colisiones6 && choque6 == false){
        enemigoR6 = 0;
        enemigo6.rotation.y = r(enemigoR6);
        Avanzar(enemigoR6,enemigo6,1,meshG6);

        choque6 = true;
        choque6 = Nocolision();        

        
    }

    if (colisiones7 && choque7 == false){
        playerObj.position.x += 3.5;
        mesh.position.x += 3.5; 

        choque7 = true;
        choque7 = NocolisionPlayer(); 
        

        
    }


}


for (var i = 0; i < escenarioColisionesDown.length; i++) {
    var cajaMapa = new THREE.Box3().setFromObject(escenarioColisionesDown[i]);
    var docC1 = new THREE.Box3().setFromObject(enemigo);
    var docC2 = new THREE.Box3().setFromObject(enemigo2);
    var docC3 = new THREE.Box3().setFromObject(enemigo3);
    var docC4 = new THREE.Box3().setFromObject(enemigo4);
    var docC5 = new THREE.Box3().setFromObject(enemigo5);
    var docC6 = new THREE.Box3().setFromObject(enemigo6);
    var playerC = new THREE.Box3().setFromObject(playerObj);

    var colisiones1 = cajaMapa.intersectsBox(docC1);
     var colisiones2 = cajaMapa.intersectsBox(docC2);
      var colisiones3 = cajaMapa.intersectsBox(docC3);
      var colisiones4 = cajaMapa.intersectsBox(docC4);
     var colisiones5 = cajaMapa.intersectsBox(docC5);
      var colisiones6 = cajaMapa.intersectsBox(docC6);
      var colisiones7 = cajaMapa.intersectsBox(playerC);
    
    if (colisiones1 && choque1 == false){
        enemigoR = 2;
        enemigo.rotation.y = r(enemigoR);
        Avanzar(enemigoR,enemigo,1,meshG1);

        choque1 = true;
        choque1 = Nocolision();        

        
    }

    if (colisiones2 && choque2 == false){
        enemigoR2 = 2;
        enemigo2.rotation.y = r(enemigoR2);
        Avanzar(enemigoR2,enemigo2,1,meshG2);

        choque2 = true;
        choque2 = Nocolision();


        
    }

    if (colisiones3 && choque3 == false){
        enemigoR3 = 2;
        enemigo3.rotation.y = r(enemigoR3);
        Avanzar(enemigoR3,enemigo3,1,meshG3);

        choque3 = true;
        choque3 = Nocolision();        

        
    }

    if (colisiones4 && choque4 == false){
        enemigoR4 = 2;
        enemigo4.rotation.y = r(enemigoR4);
        Avanzar(enemigoR4,enemigo4,1,meshG4);

        choque4 = true;
        choque4 = Nocolision();        

        
    }
    if (colisiones5 && choque5 == false){
        enemigoR5 = 2;
        enemigo5.rotation.y = r(enemigoR5);
        Avanzar(enemigoR5,enemigo5,1,meshG5);

        choque5 = true;
        choque5 = Nocolision();        

        
    }

    if (colisiones6 && choque6 == false){
        enemigoR6 = 2;
        enemigo6.rotation.y = r(enemigoR6);
        Avanzar(enemigoR6,enemigo6,1,meshG6);

        choque6 = true;
        choque6 = Nocolision();      

        
    }

    if (colisiones7 && choque7 == false){
        playerObj.position.x -= 3.5;
        mesh.position.x -= 3.5; 
 
        choque7 = true;
        choque7 = NocolisionPlayer(); 
        

        
    }


}

//colisionesPlayer

for (var i = 0; i < doctoresColisiones.length; i++) {
    var doctor = new THREE.Box3().setFromObject(doctoresColisiones[i]);
    var playerC = new THREE.Box3().setFromObject(playerObj);
    var colision = playerC.intersectsBox(doctor)
    
    if(colision){
        scene.remove(doctoresColisiones[i]);
        console.log("choque doc");
        doctoresColisiones.splice(i,1);

        if(escudo == false){
        vidas = vidas -1;
       if (vidas == 4){
            $("#HUD").find("#life5").attr("src","graficasWeb/corazonVacio.png");
        }else if (vidas == 3){
            $("#HUD").find("#life4").attr("src","graficasWeb/corazonVacio.png");
        }else  if (vidas == 2){
            $("#HUD").find("#life3").attr("src","graficasWeb/corazonVacio.png");
        }else if (vidas == 1){
            $("#HUD").find("#life2").attr("src","graficasWeb/corazonVacio.png");
        }
                    


        if(vidas <= 0 ){
            $("#HUD").find("#life1").attr("src","graficasWeb/corazonVacio.png");            
            console.log("GAME OVER");
            console.log("HAS RECOLECTADO :" + puntaje);
            var gOver = document.getElementById('gOver');
            var mFondo = localStorage.getItem("musicaFondo");
            if(mFondo == 1){
            var musicaFondoo = document.getElementById("musicaFondo");
            musicaFondoo.pause();

            }
           var musicFX = localStorage.getItem("musicaFondoFX");
                    if(musicFX == 1){
                        var pUp = document.getElementById("powerUp");
                    pUp.play();

                    } else {
                        
                    }
            pausa = true;



        document.getElementById("element").style.visibility = 'visible';
            $("#HUD").find("#gameOvermenu").attr("width","0.2");  
            $("#HUD").find("#gameOvermenu").attr("height","0.2");     

            var scoree = document.getElementById("score");


            /*window.location.href = "score.html";*/

        //     var win = window.open("score.html");
        // // Cambiar el foco al nuevo tab (punto opcional)
        // win.focus();

            }
        }else {
            escudo = false;
            console.log("perdimos escudo");
            console.log(vidas);
            scene.remove(mesh);

        }
    }   
}


// colisionesDoctoresIA

for (var i = 0; i < campoDeVision.length; i++) {
     var box1 = new THREE.Box3().setFromObject(meshG1);
     var box2 = new THREE.Box3().setFromObject(meshG2);
     var box3 = new THREE.Box3().setFromObject(meshG3);
     var box4 = new THREE.Box3().setFromObject(meshG4);
     var box5 = new THREE.Box3().setFromObject(meshG5);
     var box6 = new THREE.Box3().setFromObject(meshG6);

     var player = new THREE.Box3().setFromObject(playerObj);   

     var colision = box1.intersectsBox(player);
     if ( colision){
        chase1 = true;
     }else {
        chase1 = false;
     }

     var colision2 = box2.intersectsBox(player);
     if ( colision2){
        chase2 = true;
     }else {
        chase2 = false;
     }

     var colision3 = box3.intersectsBox(player);
     if ( colision3){
        chase3 = true;
     }else {
        chase3 = false;
     }

     var colision4 = box4.intersectsBox(player);
     if ( colision4){
        chase4 = true;
     }else {
        chase4 = false;
     }

     var colision5 = box5.intersectsBox(player);
     if ( colision5){
        chase5 = true;
     }else {
        chase5 = false;
     }

     var colision6 = box6.intersectsBox(player);
     if ( colision6){
        chase6 = true;
     }else {
        chase6 = false;
     }
}

    

                 

                
                // mixerDocWalk3.update(2.2 * tiempoDelta);
                if (clockIA.getElapsedTime() > j){
                   enemigoR = randomFunc();
                    enemigoR2 = randomFunc();

                    enemigoR3 = randomFunc();
                    enemigoR4 = randomFunc();

                    enemigoR5 = randomFunc();
                    enemigoR6 = randomFunc();
// original
                    enemigo.rotation.y = r(enemigoR);
                    enemigo2.rotation.y = r(enemigoR2);

                    enemigo3.rotation.y = r(enemigoR3);
                    enemigo4.rotation.y = r(enemigoR4);

                    enemigo5.rotation.y = r(enemigoR5);
                    enemigo6.rotation.y = r(enemigoR6);
                    

                    // enemigo3.rotation.y = r();
                    
                    j = j + 4;
                    
            }else{


                if(chase1 == false){
                  Avanzar(enemigoR,enemigo,1,meshG1);
                }else if(chase1 == true){

                    Perseguir(playerObj,enemigo);
                    enemigo.rotation.y += 1.5;
                }

                if(chase2 == false){
                  Avanzar(enemigoR2,enemigo2,1,meshG2);
                }else if(chase2 == true){

                    Perseguir(playerObj,enemigo2);
                    enemigo2.rotation.y += 1.5;
                }

                if(chase3 == false){
                  Avanzar(enemigoR3,enemigo3,1,meshG3);
                }else if(chase3 == true){

                    Perseguir(playerObj,enemigo3);
                    enemigo3.rotation.y += 1.5;
                }

                if(chase4 == false){
                  Avanzar(enemigoR4,enemigo4,1,meshG4);
                }else if(chase4 == true){

                    Perseguir(playerObj,enemigo4);
                    enemigo4.rotation.y += 1.5;
                }

                if(chase5 == false){
                  Avanzar(enemigoR5,enemigo5,1,meshG5);
                }else if(chase5 == true){

                    Perseguir(playerObj,enemigo5);
                    enemigo5.rotation.y += 1.5;
                }

                if(chase6 == false){
                  Avanzar(enemigoR6,enemigo6,1,meshG6);
                }else if(chase6 == true){

                    Perseguir(playerObj,enemigo6);
                    enemigo6.rotation.y += 1.5;
                }
                //  Avanzar(enemigoR2,enemigo2,1);
                // Avanzar(enemigoR3,enemigo3,1);
                //  Avanzar(enemigoR4,enemigo4,1);
                //  Avanzar(enemigoR5,enemigo5,1);
                // Avanzar(enemigoR6,enemigo6,1);
            }
              


            }

           



 renderer.render(scene, camera);

              
               
                
            
               
       
}
     render();
        



// document.addEventListener("keydown", onDocumentKeyDown, false);
// function onDocumentKeyDown(event) {
//     var keyCode = event.which;
//     if (keyCode == 87) {
//         playerObj.position.x -= 0.3;

//         console.log("w");
        
        
//     } else if (keyCode == 83) {
//         console.log("s");
        
        
//          playerObj.position.x += 0.3;
//     } else if (keyCode == 65 && frenoEnA == false) {
//         console.log("a");
//         playerObj.position.z += 0.3; 
//     } else if (keyCode == 68 && frenoEnZ == false) {
//         console.log("d");
//         playerObj.position.z -= 0.3;
//     } else if (keyCode == 32) {
        
//     }
// };









        // crear objetos de juego.



        function OBJLoader(path,material){
objLoader = new THREE.OBJLoader();
objLoader.load(path.toString(),function(model){
    model.traverse(function(child){
        child.receiveShadow = true;
        child.castShadow = true;
        child.material = material;

        
    });
    model.scale.setScalar(1.5);
    model.name = "escenario";
    scene.add(model);
        

});

            }
        function player(x,y,z){
            var playerGeo = new THREE.BoxGeometry(0.5,0.5,0.5);
        var playerMat = new THREE.MeshLambertMaterial({color: 0x0E7ED11});
       var player = new THREE.Mesh( playerGeo, playerMat);

        player.position.x = x;
        player.position.y = y;
        player.position.z = z;

        scene.add(player);
        return player;
        }

       function Nocolision(col){
        col = false;

        return col;
       }

       function NocolisionPlayer(col){
        col = false;
        return col;
       }
       


        function moneda(x,y,z){

       //  var coinGeo = new THREE.BoxGeometry(this.pA1,this.pA2,this.pA3);
       // var coinMat = new THREE.MeshLambertMaterial({color: 0x01083F9});
       // var coin = new THREE.Mesh( coinGeo, coinMat);

       // coin.position.x = this.x;
       // coin.position.y = this.y;
       // coin.position.z = this.z;


       var coinGeo = new THREE.BoxGeometry(0.5,0.5,0.5);
        var coinMat = new THREE.MeshLambertMaterial({color: 0x01083F9});
       var coin = new THREE.Mesh( coinGeo, coinMat);

        coin.position.x = x;
        coin.position.y = y;
        coin.position.z = z;

      scene.add(coin);
        }


        // import FBX





//         function ImportAnimation(path,name,mixer,arreglo,x,y,z){
//             loader = new THREE.FBXLoader();
//             loader.load( path.toString(), function ( personaje ) {
//             mixer = new THREE.AnimationMixer(personaje);
//             arreglo.push(mixer);
//             const clips = personaje.animations;
//             const clip = THREE.AnimationClip.findByName(clips,name.toString());
//             console.log(clip);
//             const action = mixer.clipAction(clip);
//             action.play();
//             console.log(action);
//             personaje.position.x = x;
//             personaje.position.y = y;
//             personaje.position.z = z;
//             personaje.rotation.y  = 0;
//             personaje.scale.setScalar(0.058);
//             personaje.traverse(function (child){
//          if(child.isMesh){
//              child.castShadow = true;
//              child.receiveShadow = true;
//          }
//      });
// scene.add( personaje );

//  });


//     }
}





    window.onload = init;


</script>


</body>
</html>