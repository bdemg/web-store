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

function displayProducts(){
	
	include("variables.php");
	include("funciones.php");
	
	$sentenciaSQL = "SELECT * FROM productos";
	$product_info = ConsultarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
	
	foreach($product_info as $product){
		
		$url = "productDetails.php?name=".urlencode($product["name"])."&image=".urlencode($product["image"])."&descripcion=".urlencode($product["descripcion"])."&price=".urlencode($product["price"]);
		echo "<p><a target=\"_blank\"href=\"".$url."\"><b>".$product["name"]."</b></a> <input type=\"checkbox\" name=\"eliminations[]\" value=\"".$product["product_id"]."\"></p>\n";
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
    <ul class="list-of-buttons" style="margin-top:14px;">
        <li>
            <h1>Productos</h1>
        </li>
    </ul>
        <form name="forma" action="eliminateProducts.php" method="get">
            <div class="a-box-large">
            <?php displayProducts(); ?>
            </div>
            <div class="a-box-medium">
        <input type="submit" class="btn" name="aceptar" value="Eliminar">
        <input type="button" class="btn" name="cancelar" value="Regresar">
            </div>
    </form>
</body>
</html>