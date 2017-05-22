<?php
// * * * * 
session_start();
include("sessionVariables.php");
if ($_SESSION[$is_logged] != true) {
	 header("location: index.php?estado=4");
	 exit();
}	
// * * * * 
$product_info;

if( isset($_REQUEST['txtf_search']) ){
	
	include("variables.php");
	include("funciones.php");			
	
	$sentenciaSQL = "SELECT * FROM productos WHERE name LIKE '%".htmlentities($_REQUEST['txtf_search'])."%'";
	$product_info = ConsultarSQL($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);
}

function searchProduct(){
	
	global $product_info;
	
	echo "<div class=\"a-box-large\">";
	for($i = 0; $i < count($product_info); $i++){
		
		echo "<img src='".$product_info[$i]["image"]."'>";
                echo "<ul class=\"list-of-description a-box-small\">";
		echo "<li><label>".$product_info[$i]["name"]."</label></li>";
		
		echo "<li><label>".$product_info[$i]["descripcion"]."</label></li>";
		
		echo "<li><label>Precio: $".$product_info[$i]["price"]."</label></li>";
		
		echo "<li><label>Cantidad:</label><input type='text' name='cantidad' size='10'></li>";
		echo "<li><input type='button' class='btn' name='btn_anadir' value='A&ntilde;adir'></li>";
		echo "<li><input type='hidden' name='id_pan' value='".$product_info[$i]["product_id"]."'></li>";
                echo "</ul>";
	}
	echo "</div>";
}

function generateValidations(){
	
	global $product_info;
	
	if( isset($product_info) ){
		for($i = 0; $i < count($product_info); $i++){
			echo "document.forma.btn_anadir[".$i."].onclick = function(){\n";
			echo "if(validateQuantity(document.forma.cantidad[".$i."])){\n";
			echo "placeOrder(Number(document.forma.id_pan[".$i."].value), Number(document.forma.cantidad[".$i."].value));\n";
			echo "document.forma.cantidad[".$i."].value = \"\";\n";
			echo "updateTrolleyItemCount();\n}\n}\n";
		}
	}
}

?>
<html>

	<head>
		<title>Cat&aacute;logo</title>
		<link href="css/generalStyle.css" rel="stylesheet"/>
		<script language="javascript" src="javascript/placing_orders.js" type="text/javascript"></script>
		<script language="javascript" src="javascript/json-cookie.js" type="text/javascript"></script>
		
		<script>
		<!--
		window.onload = function () {
			
			document.forma.btn_carrito.onclick = function(){
			
				window.location = "carrito.php";
			}
			
			document.forma.btn_viewAll.onclick = function(){
			
				window.location = "catalogo.php?txtf_search=";
			}
			
			<?php generateValidations()?>
			
			updateTrolleyItemCount();
		}

		function validateQuantity(field){
			
			var isPositiveInteger = ( !isNaN(field.value) ) && ( Number(field.value) > 0 ) && ( Number(field.value) % 1 === 0 );
			
			if(!isPositiveInteger){
				
				alert("La cantidad introducida no puede ser procesada, favor de cambiarla");
				field.value = "";
				field.focus();
			}
			
			return isPositiveInteger;
		}
		//-->
		</script>
		
	</head>
	
	<body>
            
		
		<form name="forma" method="get" action="catalogo.php">
			
                    <ul class="list-of-buttons">
                        <li>
                            <h1>Cat&aacute;logo</h1>
                        </li>
                        <li>
                            <input type="button" class="btn" name="btn_carrito" value="Carrito (0)">
                            <a class="btn btn-primary" href="cerrarSesion.php">Cerrar sesi&oacute;n</a>
                        </li>
                        <li>
                            <input type="text" name="txtf_search" size="20">
                            <input class="btn" type="submit" name="btn_search" value="Buscar">
                            <input class="btn" type="button" name="btn_viewAll" value="Ver todo">
                        </li>
                    </ul>
			<?php
				if( isset($_REQUEST["txtf_search"]) ){
					
					searchProduct();
				}
			?>
			
		</form>
		
                <div class="a-box-medium">
                    <p class="an-info-box info-box">&iquest;Tienes preguntas, sugerencias o comentarios? </br> 
                    Escr&iacute;benos <a href="mailto:jacano.sosa@gmail.com;mdoming@uady.mx">a nuestro correo</a></p>
                    <b><a class="btn" href="modificarCuenta.php">Modificar datos de la Cuenta</a></b>
                </div>
	
		<?php if($_SESSION[$admin] == true) {
                        echo "<div class=\"a-box-large end-of-page\">";
			echo "<a class=\"btn\" href=\"administrateProducts.php\">Eliminar productos</a>";
			echo "<a class=\"btn\" href=\"anadirProducto.php\">A&ntilde;adir productos</a>";
                        echo "</div>";
		} ?>
	</body>

</html>