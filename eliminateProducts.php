<?php 
// * * * * 
session_start();
if ($_SESSION["valido"] != true) {
	 header("location: index.php?estado=4");
	 exit();
}
if ($_SESSION["privilegiosAdmin"] != true){
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