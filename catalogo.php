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
		
		document.forma.btn_anadir[0].onclick = function(){
			
			if(validateQuantity(document.forma.cantidad[0])){
				
				placeOrder(Number(document.forma.id_pan[0].value), Number(document.forma.cantidad[0].value));
				document.forma.cantidad[0].value = "";
				updateTrolleyItemCount();
			}
		}
		
		document.forma.btn_anadir[1].onclick = function(){
			
			if(validateQuantity(document.forma.cantidad[1])){
				
				placeOrder(Number(document.forma.id_pan[1].value), Number(document.forma.cantidad[1].value));
				document.forma.cantidad[1].value = "";
				updateTrolleyItemCount();
			}
		}
		
		document.forma.btn_anadir[2].onclick = function(){
			
			if(validateQuantity(document.forma.cantidad[2])){
				
				placeOrder(Number(document.forma.id_pan[2].value), Number(document.forma.cantidad[2].value));
				document.forma.cantidad[2].value = "";
				updateTrolleyItemCount();
			}
		}
		
		document.forma.btn_anadir[3].onclick = function(){
			
			if(validateQuantity(document.forma.cantidad[3])){
				
				placeOrder(Number(document.forma.id_pan[3].value), Number(document.forma.cantidad[3].value));
				document.forma.cantidad[3].value = "";
				updateTrolleyItemCount();
			}
		}
		
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
	
		<h1>Cat&aacute;logo</h1>
		
		<form name="forma">
		
			<input type="button" name="btn_carrito" value="Carrito (0)"> <br/>
			<a href="cerrarSesion.php">Cerrar sesi&oacute;n</a>
		
			<table align="center">
			
				<tr>
					<td rowspan="4"><img src="imagenes/bolitas_de_nuez.png" width="150" height="150" border="1" alt="" name="pan0"></td>
					<td>Bolitas de nuez</td>
				</tr>
				
				<tr>
					<td>Descripci&oacute;n</td>
				</tr>
				
				<tr>
					<td>Precio: $12.00</td>
				</tr>
				
				<tr>
					<td>Cantidad:</td>
					<td><input type="text" name="cantidad" size="10"></td>
					<td><input type="button" class="btn" name="btn_anadir" value="A&ntilde;adir"></td>
					<td><input type="hidden" name="id_pan" value="0"></td>
				</tr>
				
				<!-- Otro pan, separador -->
				<tr>
					<td><br/></td>
				</tr>
				
				<tr>
					<td rowspan="4"><img src="imagenes/brownie.jpg" width="150" height="150" border="1" alt="" name="pan1"></td>
					<td>Brownie</td>
				</tr>
				
				<tr>
					<td>Descripci&oacute;n</td>
				</tr>
				
				<tr>
					<td>Precio: $25.00</td>
				</tr>
				
				<tr>
					<td>Cantidad:</td>
					<td><input type="text" name="cantidad" size="10"></td>
					<td><input type="button" class="btn" name="btn_anadir" value="A&ntilde;adir"></td>
					<td><input type="hidden" name="id_pan" value="1"></td>
				</tr>
				
				<!-- Otro pan, separador -->
				<tr>
					<td><br/></td>
				</tr>
				
				<tr>
					<td rowspan="4"><img src="imagenes/cupcake.jpg" width="150" height="150" border="1" alt="" name="pan2"></td>
					<td>Cupcake</td>
				</tr>
				
				<tr>
					<td>Descripci&oacute;n</td>
				</tr>
				
				<tr>
					<td>Precio: $20.00</td>
				</tr>
				
				<tr>
					<td>Cantidad:</td>
					<td><input type="text" name="cantidad" size="10"></td>
					<td><input type="button" class="btn" name="btn_anadir" value="A&ntilde;adir"></td>
					<td><input type="hidden" name="id_pan" value="2"></td>
				</tr>
				
				<!-- Otro pan, separador -->
				<tr>
					<td><br/></td>
				</tr>
				
				<tr>
					<td rowspan="4"><img src="imagenes/pay_limon.jpg" width="150" height="150" border="1" alt="" name="pan3"></td>
					<td>Pay de lim&oacute;n</td>
				</tr>
				
				<tr>
					<td>Descripci&oacute;n</td>
				</tr>
				
				<tr>
					<td>Precio: $10.00</td>
				</tr>
				
				<tr>
					<td>Cantidad:</td>
					<td><input type="text" name="cantidad" size="10"></td>
					<td><input type="button" class="btn" name="btn_anadir" value="A&ntilde;adir"></td>
					<td><input type="hidden" name="id_pan" value="3"></td>
				</tr>
			
			</table>
		
		</form>
	
	</body>

</html>