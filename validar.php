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

$sql = "SELECT * FROM usuarios WHERE usuario ='" . $usuarioF . "' AND contrasena ='" . $contrasenaF . "'";

$resultado = mysqli_query($conexion, $sql);
mysqli_close($conexion);

if (mysqli_num_rows($resultado) > 0) {
	
	for ($registros = array (); $fila = mysqli_fetch_assoc($resultado); $registros[] = $fila);	
	
	session_start();
	include("sessionVariables.php");
	$_SESSION[$is_logged] = true;	
	$_SESSION[$user_id] = $registros[0]["id_usuario"];
	$_SESSION[$admin] = $registros[0]["admin"];
	
	header("location: catalogo.php");
	
} else {
	//Sino redirigir a la página index.html 
	header("location: index.php?estado=3");
}

?>