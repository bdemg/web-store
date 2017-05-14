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

if (empty($_REQUEST["nombreProducto"])) {
	header("location: registroProducto.php");
	exit();
}

if (empty($_REQUEST["precio"])) {
	header("location: registroProducto.php");
	exit();
}

if (empty($_REQUEST["descripcion"])) {
	header("location: registroProducto.php");
	exit();
}

if (empty($_FILES["fileToUpload"])) {
	header("location: registroProducto.php");
	exit();
}

$target_dir = "imagenes/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Allow certain file formats
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header("location: registroProducto.php?estado=4");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        header("location: registroProducto.php");
		exit();
    }
}

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
if (!$conexion) {
    die("Fallo: " . mysqli_connect_error());
}

include("variables.php");
include("funciones.php");

//Evitar inyección SQL - sustituir caraceres para que no se interprete
$nombreProductoF = mysqli_real_escape_string($conexion, $_REQUEST["nombreProducto"]);
$precioF = mysqli_real_escape_string($conexion, $_REQUEST["precio"]);
$descripcionF = mysqli_real_escape_string($conexion, $_REQUEST["descripcion"]);


//Evitar cross scripting - sustituir caraceres por equivalentes en HTML
$nombreProductoF = htmlentities($nombreProductoF, ENT_QUOTES);
$precioF = htmlentities($precioF, ENT_QUOTES);
$descripcionF = htmlentities($descripcionF, ENT_QUOTES);

//Evitar cross scripting - eliminar etiquetas HTML
$nombreProductoF = strip_tags($nombreProductoF);
$precioF = strip_tags($precioF);
$descripcionF = strip_tags($descripcionF);

$sentenciaSQL = "INSERT INTO productos (image, name, price, descripcion) VALUES ('" . $target_file . "', '" . $nombreProductoF . "', " . $precioF . ", '" . $descripcionF . "')";
EjecutarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

header("location: catalogo.php");
?>