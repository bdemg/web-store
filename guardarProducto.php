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

if (empty($_REQUEST["nombreProducto"])) {
	header("location: anadirProducto.php?eror=noname");
	exit();
}

if (empty($_REQUEST["precio"])) {
	header("location: anadirProducto.php?eror=noprice");
	exit();
}

if (empty($_REQUEST["descripcion"])) {
	header("location: anadirProducto.php?eror=nodes");
	exit();
}

if (empty($_FILES["fileToUpload"])) {
	header("location: anadirProducto.php?eror=nofile");
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
    header("location: anadirProducto.php?estado=4");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        header("location: anadirProducto.php?error=writeerror");
		exit();
    }
}

include("variables.php");
include("funciones.php");
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basedatos);
if (!$conexion) {
    die("Fallo: " . mysqli_connect_error());
}

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

//header("location: catalogo.php");
echo "<html>
<head>
	<title>Registrar nuevo producto</title>
	<script>
		alert(\"Nuevo producto registrado.\");
		window.location.href = \"catalogo.php\";
	</script>
</head>
</html>";

?>
