<?php 
// * * * * 
session_start();
include("sessionVariables.php");
if ($_SESSION[$is_logged] != true) {
	 header("location: index.php?estado=4");
	 exit();
}
if ($_SESSION[$admin] != true){
	header("location: index.php?estado=6");
	exit();
}
// * * * *

if(isset($_REQUEST["price"])){
	
	include("variables.php");
	include("funciones.php");
	$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
	if (!$conexion) {
		die("Fallo: " . mysqli_connect_error());
	}
	
	$precioF = mysqli_real_escape_string($conexion, $_REQUEST["price"]);
	$precioF = htmlentities($precioF, ENT_QUOTES);
	$precioF = strip_tags($precioF);
	
	$sentenciaSQL = "UPDATE productos SET price=".$precioF." WHERE name=\"".htmlentities($_REQUEST["name"], ENT_QUOTES)."\"";
	EjecutarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
	
	echo "<html>
<head>
	<title>Actualizar Precio</title>
	<script>
		alert(\"Precio actualizado.\");
		window.close();
	</script>
</head>
</html>";
}else{
	
	echo "<html>
<head>
	<title>Actualizar Precio</title>
	<script>
		alert(\"El precio no pudo ser actualizado.\");
		history.back();
	</script>
</head>
</html>";
}
?>