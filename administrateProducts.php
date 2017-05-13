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

function displayProducts(){
	
	include("variables.php");
	include("funciones.php");
	
	$sentenciaSQL = "SELECT name, product_id FROM productos";
	$product_info = ConsultarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
	
	foreach($product_info as $product){
		
		echo "<p><b>".$product["name"]."</b> <input type=\"checkbox\" name=\"eliminations[]\" value=\"".$product["product_id"]."\"></p>";
	}
}
?>
<html>
<head>
	<title>Panader&iacute;a Web</title>
    <link rel="stylesheet" href="css/generalStyle.css">
	
	<script>
			<!--
			window.onload = function () {
				
				document.forma.cancelar.onclick = function(){
				
					history.back();
				}
			}
			//-->
	</script>
</head>

<body>
<h1>Productos</h1>
<form name="forma" action="eliminateProducts.php" method="get">
<?php displayProducts(); ?>
<input type="submit" name="aceptar" value="Eliminar"> <input type="button" name="cancelar" value="Cancelar">
</form>
</body>
</html>