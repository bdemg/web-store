<?php
// * * * * 
session_start();
if ($_SESSION["valido"] != true) {
	 header("location: index.php?estado=4");
	 exit();
}	
// * * * * 

if(!isset($_COOKIE["shopping_trolley"])) {
    header("location: carrito.php");
} else {
    include("funciones.php");
	include("variables.php");
	
	$orderList = json_decode(urldecode($_COOKIE["shopping_trolley"]));
	
	foreach($orderList as $item){
		
		$sentenciaSQL = "INSERT INTO ordenes (item_id, quantity) VALUES ('" . $item->id . "', '" . $item->quantity . "')";
		//EjecutarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
	}
	
	unset($_COOKIE["shopping_trolley"]);
	setcookie("shopping_trolley", null, -1, '/');
	header("location: catalogo.php");
}
?>