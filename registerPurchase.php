<?php
// * * * * 
session_start();
include("sessionVariables.php");
if ($_SESSION[$is_logged] != true) {
	 header("location: index.php?estado=4");
	 exit();
}	
// * * * * 

if(!isset($_COOKIE["B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley"])) {
    header("location: carrito.php");
} else {
    include("funciones.php");
	include("variables.php");
	
	$orderList = json_decode(urldecode($_COOKIE["B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley"]));
	
	foreach($orderList as $item){
		
		$sentenciaSQL = "INSERT INTO ordenes (product_id, id_usuario, quantity) VALUES (" . $item->id . ", " . $_SESSION[$user_id] . ", '" . $item->quantity . "')";
		EjecutarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
	}
	
	unset($_COOKIE["B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley"]);
	setcookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley", null, -1, '/');
	//header("location: catalogo.php");
	
	echo "<html>
	<head>
		<title>Registrar Orden</title>
		<script>
			alert(\"Orden registrada.\");
			window.location.href = \"catalogo.php\";
		</script>
	</head>
	</html>";
}
?>