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
</head>
<body style="text-align: center">
<h1><?php echo $_REQUEST["name"]; ?></h1>
<img src=<?php echo " \"".$_REQUEST["image"]."\" "; ?> width="150" height="150" border="1" alt="" name="pan0"><br/>
<p><?php echo $_REQUEST["descripcion"]; ?></p>
<p>$<?php echo $_REQUEST["price"]; ?> c/u</p>
</body>
</html>