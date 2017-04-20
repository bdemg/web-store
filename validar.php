<?php

include("variables.php");

if ($_REQUEST["usuario"] == "") {
	 header("location: index.php?estado=1");
	 exit();
	 }
if (empty($_REQUEST["contrasena"])) {
	header("location: index.php?estado=2&usuario=" . $_REQUEST["usuario"] );
	exit();
}

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
if (!$conexion) {
    die("Fallo: " . mysqli_connect_error());
}

//Evitar inyección SQL
$usuarioF = mysqli_real_escape_string($conexion, $_REQUEST["usuario"]);
$contrasenaF = mysqli_real_escape_string($conexion, $_REQUEST["contrasena"]);

$sql = "SELECT usuario, contrasena FROM usuarios WHERE usuario ='" . $usuarioF . "' AND contrasena ='" . $contrasenaF . "'";

$resultado = mysqli_query($conexion, $sql);
mysqli_close($conexion);

if (mysqli_num_rows($resultado) > 0) {
	//Si hay registro reenviar a la página menu.php
	header("location: catalogo.html");
	
	//session_start();
	//$_SESSION["valido"] = true;	
	
} else {
	//Sino redirigir a la página index.html 
	header("location: index.php?estado=3");
}

?>