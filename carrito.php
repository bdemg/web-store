<?php
// * * * * 
session_start();
if ($_SESSION["valido"] != true) {
	 header("location: index.php?estado=4");
	 exit();
}	
// * * * * 
?>

<html>
	<head>
	<title>Carrito</title>
        <link href="css/generalStyle.css" rel="stylesheet"/>
		<script language="javascript" src="javascript/shopping_trolley.js" type="text/javascript"></script>
		<script language="javascript" src="javascript/json-cookie.js" type="text/javascript"></script>
		
		<script>
			<!--
			window.onload = function () {
				
				displayShoppingTrolley(read_cookie("shopping_trolley"));
				
				document.orderform.comprar.onclick = comprarCarrito;
				document.orderform.eliminar_todo.onclick = vaciarCarrito;
				document.orderform.eliminar_seleccionados.onclick = remove;
			}
			
			//-->
		</script>
	</head>
	
	<body>
		<h1>Carrito</h1>

		<form name="orderform">
			<table id="shopping_trolley">
				
			</table>
			<span id="shopping_totals"></span>
			<span id="buttons"></span>
		</form>
		<br>
	<a href="catalogo.html"> Regresar al Cat&aacute;logo </a>
	</body>

</html>