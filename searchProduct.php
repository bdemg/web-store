<?php

include("variables.php");

include("funciones.php");

if( !isset($_POST["txtf_search"]) ){
	header("location: searchView.php");
	exit();
}

$sentenciaSQL = "SELECT * FROM productos WHERE name LIKE '%".$_POST['txtf_search']."%'";

$product_info = ConsultarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

?>

<html>

	<head>
		<title>B&uacute;squeda de Producto</title>
		
		<script>
		<!--
		
		//-->
		</script>
		
	</head>
	
	<body>
		<p>Resultados</p>
		<?php
			for($i = 0; $i < count($product_info); $i++){
				echo "<p>".$product_info[$i]["name"]."</p>";
			}
		?>
	</body>

</html>