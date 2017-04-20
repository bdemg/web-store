<?php

/* 
session_start();
if ($_SESSION["valido"] != true) {
	 header("location: index.php?estado=4");
	 exit();
}	
*/ 

include("variables.php");

include("funciones.php");

if (empty($_REQUEST["usuario"])) {
	header("location: registro.php");
	exit();
}

if (empty($_REQUEST["contrasena"])) {
	header("location: registro.php");
	exit();
}

if (empty($_REQUEST["correo"])) {
	header("location: registro.php");
	exit();
}

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
if (!$conexion) {
    die("Fallo: " . mysqli_connect_error());
}

//Evitar inyección SQL - sustituir caraceres para que no se interprete
$usuarioF = mysqli_real_escape_string($conexion, $_REQUEST["usuario"]);
$contrasenaF = mysqli_real_escape_string($conexion, $_REQUEST["contrasena"]);
$emailF = mysqli_real_escape_string($conexion, $_REQUEST["correo"]);

//echo $usuarioF . " " . $contrasenaF . " " . emailF . "<br>";

//Evitar cross scripting - sustituir caraceres por equivalentes en HTML
$usuarioF = htmlentities($usuarioF, ENT_QUOTES);
$contrasenaF = htmlentities($contrasenaF, ENT_QUOTES);
$emailF = htmlentities($emailF, ENT_QUOTES);

//echo $usuarioF . " " . $contrasenaF . " " . emailF . "<br>";

//Evitar cross scripting - eliminar etiquetas HTML
$usuarioF = strip_tags($usuarioF);
$contrasenaF = strip_tags($contrasenaF);
$emailF = strip_tags($emailF);

//echo $usuarioF . " " . $contrasenaF . " " . emailF . "<br>";
 
$sentenciaSQL = "INSERT INTO usuarios (usuario, contrasena, email) VALUES ('" . $usuarioF . "', '" . $contrasenaF . "', '" . $emailF . "')";

//Guardar el nombre de usuario, contraseña y nombre en la tabla de usuarios
EjecutarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

header("location: index.php");

?>