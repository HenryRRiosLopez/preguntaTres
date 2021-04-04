<?php
$usu = $_POST['usu'];
$pass = $_POST['pass'];
session_start();
$_SESSION['usuario']=$usu;

include "conneccion.inc.php";

$consulta="SELECT ci from usuario where usuario like '$usu' and password like '$pass'";

$resultado=mysqli_query($con,$consulta);
#print_r($resultado);
echo "</br>";
$fila=mysqli_fetch_array($resultado);
#print_r($fila);
#echo "</br>";
#echo $fila["ci"];
#echo "</br>";
if ($fila){

    $ci = $fila["ci"];
    /*header("location:home.php");*/
    $consult="SELECT p.nombre_com from usuario u,persona p where u.usuario like '$usu' AND u.ci like p.ci";
    $resultado=mysqli_query($con,$consult);
    /*print_r ($resultado);*/
    $fil=mysqli_fetch_array($resultado);
    echo "</br>";
    $nom=$fil["nombre_com"];
    #print_r($fil);
    echo "<h1>BIENVENIDO ".$nom."</h1>";
    echo "<div>";
    echo "<a href=home.php?ci=".$ci."&color=d60502&nombre=".$nom.">";
    echo "<button>Continual</button>";
    echo "</a>";
    echo "<style>";
    echo "  body {background-color:".$color.";}";
    echo "</style";
    #include "menuUsu.inc.php";
    

}else{
    ?>
    <?php 
    include("index.php");
    ?>
    <h1>ERROR DE AUTENTIFICACION</h1>
    <?php
}


