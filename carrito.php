<?php
// * * * * 
session_start();
include("sessionVariables.php");
if ($_SESSION[$is_logged] != true) {
	 header("location: index.php?estado=4");
	 exit();
}

function displayShoppingTrolley(){
	if((!isset($_COOKIE["B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley"])) ||
		(urldecode($_COOKIE["B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley"]) == "[]")) {
		
		echo "<h4>No hay elementos en el carrito. Agrega algunos utilizando <a href=\"catalogo.php\">el cat&aacute;logo</h4>";
	} else {
		include("funciones.php");
		include("variables.php");
		
		$orderList = json_decode(urldecode($_COOKIE["B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley"]));
		
		$totalCompra = 0;
		
		echo "<div class=\"a-box-large\">";
		foreach($orderList as $item){
			echo "";
			
			$sentenciaSQL = "SELECT image, name, price FROM productos WHERE product_id=" . $item->id;
			$product_info = ConsultarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
			
			echo "<img src=" . $product_info[0]["image"] . ">";
                        echo "<ul class=\"list-of-description a-box-small\">";
			echo "<li><label><b>" . $product_info[0]["name"] . "</b></label></li>";
			echo "<li><i>cantidad: " . $item->quantity . " pieza(s)</i></li>";
			echo "<li><i>subtotal: $" . $product_info[0]["price"] * $item->quantity . "</i></li>";
			echo "<li><input type=\"checkbox\" name=\"orderboxes\" value=" . json_encode($item) . "></li>";
			
			$totalCompra = $totalCompra + ($product_info[0]["price"] * $item->quantity);
			
			echo "</ul>";
		}
		echo "</div>";
		
		$totalCompra = $totalCompra + 20;
		
                echo "<div class=\" a-box-large\" ";
		echo "<span id=\"shopping_totals\"><p>Precio de Env&iacute;o: $20</p> <p>Total - $". $totalCompra ."</span>";
		echo "<span class=\"list-of-buttons\" id=\"buttons\"> "
                        . "<input type=\"submit\" class=\"btn\" name=\"comprar\" value=\"Comprar\"> "
                        . "<input type=\"button\" class=\"btn\" name=\"eliminar_seleccionados\" value=\"Eliminar Seleccionados\"> "
                        . "<input class=\"btn\" type=\"button\" name=\"eliminar_todo\" value=\"Vaciar Carrito\"> </span>";
	}       echo "</div>";
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
				
				//displayShoppingTrolley(read_cookie("B41B3C530B5F10A834F8957A96E0052F9FCD09AAshopping_trolley"));
				
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
            <div class="catalog-header">
		<h1>Carrito</h1>
            </div>    
            
		<form name="orderform" action="registerPurchase.php" method="get">
			<?php displayShoppingTrolley()
			?>
		</form>
		<br>
	<a class="btn" href="catalogo.php"> Regresar al Cat&aacute;logo </a>
	</body>

</html>