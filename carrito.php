<?php
// * * * * 
session_start();
include("sessionVariables.php");
if ($_SESSION[$is_logged] != true) {
	 header("location: index.php?estado=4");
	 exit();
}

function displayShoppingTrolley(){
	if((!isset($_COOKIE["shopping_trolley"])) ||
		(urldecode($_COOKIE["shopping_trolley"]) == "[]")) {
		
		echo "<h4>No hay elementos en el carrito. Agrega algunos utilizando <a href=\"catalogo.php\">el cat&aacute;logo</h4>";
	} else {
		include("funciones.php");
		include("variables.php");
		
		$orderList = json_decode(urldecode($_COOKIE["shopping_trolley"]));
		
		$totalCompra = 0;
		
		echo "<table id=\"shopping_trolley\"> <tbody>";
		foreach($orderList as $item){
			echo "<tr>";
			
			$sentenciaSQL = "SELECT image, name, price FROM productos WHERE product_id=" . $item->id;
			$product_info = ConsultarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
			
			echo "<td> <img src=" . $product_info[0]["image"] . " width=\"50\" height=\"50\" border=\"1\"> </td>";
			echo "<td> <b>" . $product_info[0]["name"] . "</b> </td>";
			echo "<td> <i>cantidad: " . $item->quantity . " pieza(s)</i> </td>";
			echo "<td> <i>subtotal: $" . $product_info[0]["price"] * $item->quantity . "</i> </td>";
			echo "<td> <input type=\"checkbox\" name=\"orderboxes\" value=" . json_encode($item) . "> </td>";
			
			$totalCompra = $totalCompra + ($product_info[0]["price"] * $item->quantity);
			
			echo "</tr>";
		}
		echo "</tbody></table>";
		
		$totalCompra = $totalCompra + 20;
		
		echo "<span id=\"shopping_totals\"><p>Precio de Env&iacute;o: $20</p> <p>Total - $". $totalCompra ."</span>";
		echo "<span id=\"buttons\"><p><input type=\"submit\" name=\"comprar\" value=\"Comprar\"> &nbsp; <input type=\"button\" name=\"eliminar_seleccionados\" value=\"Eliminar Seleccionados\"> &nbsp; <input type=\"button\" name=\"eliminar_todo\" value=\"Vaciar Carrito\"> </p></span>";
	}
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
				
				//displayShoppingTrolley(read_cookie("shopping_trolley"));
				
				document.orderform.onsubmit = function(){
					
					return confirm("¿Estás seguro que deseas comprar todos los productos del carrito?");
				};
				
				document.orderform.eliminar_todo.onclick = function(){
					
					if(confirm("¿Estás seguro que deseas eliminar todos los productos del carrito?")){
						vaciarCarrito();
					}
				}
				
				document.orderform.eliminar_seleccionados.onclick = function(){
					
					if(confirm("¿Estás seguro que deseas eliminar los productos seleccionados del carrito?")){
						remove();
					}
				}
			}
			
			//-->
		</script>
	</head>
	
	<body>
		<h1>Carrito</h1>

		<form name="orderform" action="registerPurchase.php" method="get">
			<?php displayShoppingTrolley()
			?>
		</form>
		<br>
	<a href="catalogo.php"> Regresar al Cat&aacute;logo </a>
	</body>

</html>