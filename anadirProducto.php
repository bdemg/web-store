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
	<title>Panader&iacute;a Web</title>
    <link rel="stylesheet" href="css/generalStyle.css">
	
	<script>
	<!--
	window.onload = function () {
		
		document.forma.cancelar.onclick = function(){
		
			history.back();
		}
		
		document.forma.onsubmit = function() {
			
			if(document.forma.nombreProducto.value==""){
				alert("Es necesario introducir un nombre para el producto");
				document.forma.nombreProducto.focus();
				return false;
			}
			if(document.forma.descripcion.value==""){
				alert("Es necesario introducir una descripcion para el producto");
				document.forma.descripcion.focus();
				return false;
			}
			if(document.forma.precio.value==""){
				alert("Es necesario introducir un precio para el producto");
				document.forma.precio.focus();
				return false;
			}
			if(!isPositiveNumber(document.forma.precio)){
				return false;
			}
			if(document.forma.fileToUpload.value=="" || document.forma.fileToUpload.files.length!=1){
				alert("Es necesario introducir una imagen para el producto");
				return false;
			}
			if(!isValidFileExtension(document.forma.fileToUpload.value)){
				alert("Las imagenes deben tener la extension .jpg, .jpeg, .gif o .png");
				return false;
			}
			
			return true;
		}
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
	
	function isValidFileExtension(file){
		
		var _validFileExtensions = [".jpg", ".jpeg", ".gif", ".png"];
		
		var blnValid = false;
        for (var j = 0; j < _validFileExtensions.length; j++) {
			
            var sCurExtension = _validFileExtensions[j];
            if (file.substr(file.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                blnValid = true;
                break;
            }
        }
		
		return blnValid;
	}
	//-->
	</script>
</head>
<body>
    <div class="form-header">
        <h1>Registrar Nuevo Producto</h1>
    </div>
        <form name="forma" action="guardarProducto.php" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <label>Nombre del producto:</label>
                    <input type="text" name="nombreProducto" size="50"/>
                <label>Descripci&oacute;n del producto: </label>
                    <textarea rows="5" cols="50" name="descripcion"></textarea>
                <label>Precio:</label>
                    <input type="text" name="precio" size="50"/>
                <label>Imagen:</label>
                    <input type="file" name="fileToUpload">
                <input type="submit" class="btn" name="aceptar" value="Aceptar">
                <input type="button" class="btn" name="cancelar" value="Cancelar">
            </div>
        </form>
</body>
</html>