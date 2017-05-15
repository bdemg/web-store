<?php 

// * * * * 
session_start();
include("sessionVariables.php");
if ($_SESSION[$is_logged] != true) {
	 header("location: index.php?estado=4");
	 exit();
}	
// * * * * 

session_start();
$_SESSION = array();
session_destroy();
header("location: index.php?estado=5");

?>