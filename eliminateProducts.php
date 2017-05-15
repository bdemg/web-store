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

include("variables.php");
include("funciones.php");

if(isset($_REQUEST["eliminations"])){
	
	foreach($_REQUEST["eliminations"] as $id){
		
		$sentenciaSQL = "DELETE FROM productos WHERE product_id=". intval($id);
		echo $sentenciaSQL;
		EjecutarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
	}
}

header("location: administrateProducts.php");
?>