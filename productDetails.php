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

?>

<html>
<head>
	<title><?php echo $_REQUEST["name"]; ?></title>
    <link rel="stylesheet" href="css/generalStyle.css">
	<script>
	<!--
	window.onload = function () {
		
		document.forma.onsubmit = function() {
			if(document.forma.price.value==""){
				alert("Es necesario introducir un precio para el producto");
				document.forma.price.focus();
				return false;
			}
			if(!isPositiveNumber(document.forma.price)){
				return false;
			}
			
			return true;
		}
		
	function isPositiveNumber(field){

		var isPositiveNumber = ( !isNaN(field.value) ) && ( Number(field.value) > 0 );
		
		if(!isPositiveNumber){
			
			alert("El precio introducido no puede ser procesado, favor de cambiarlo");
			field.value = "";
			field.focus();
		}
		
		return isPositiveNumber;
	}
	//-->
	</script>
</head>

<body style="text-align: center">
<h1><?php echo $_REQUEST["name"]; ?></h1>
<img src=<?php echo " \"".$_REQUEST["image"]."\" "; ?> width="150" height="150" border="1" alt="" name="pan0"><br/>
<p><?php echo $_REQUEST["descripcion"]; ?></p>
<form name="forma" action="updatePrice.php" method="post">
<p>$<input type="text" name="price" size="5" value=<?php echo "\"".$_REQUEST["price"]."\""; ?>> c/u</p>
<input type="hidden" name="name" value=<?php echo "\"".$_REQUEST["name"]."\""; ?>>
<p><input type="submit" name="cambiarPrecio" value="Cambiar precio"></p>
</form>
</body>
</html>