<?php 

// * * * * 
session_start();
if ($_SESSION["valido"] != true) {
	 header("location: index.php?estado=4");
	 exit();
}	
// * * * * 

session_start();
$_SESSION = array();
session_destroy();
header("location: index.php?estado=5");

?>