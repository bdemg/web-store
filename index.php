<?php

$cadena = getIfSet($_REQUEST["estado"]);

if($cadena!=null){
	switch ($_REQUEST["estado"]) {
		case 1:
			$cadena = "Debe proporcionar tu nombre de usuario.";
			break;
		case 2:
			$cadena = "Debe proporcionar su contrase&ntilde;a.";
			break;
		case 3:
			$cadena = "El nombre de usuario o la contrase&ntilde;a son incorrectos.";
			break;
		case 4:
			$cadena = "Debes iniciar sesi&oacute;n para utilizar el sistema.";
			break;
		default:
			$cadena = "";
	}
}

function getIfSet(&$value, $default = null){
    return isset($value) ? $value : $default;
}
?>

<html>

	<head>
		<title>Panader&iacute;a Web</title>
        <link rel="stylesheet" href="css/generalStyle.css">
		
		<script language="javascript" src="javascript/login_validations.js" type="text/javascript"></script>
		<script>
		<!--
		window.onload = function () {
			
			document.forma.onsubmit = function(){
				
				return validateLogin();
			}
		}
		
		//-->
		</script>
		
		
	</head>
	
	<body>
            <div class="a-box-medium">
                <form action="validar.php" method="post" name="forma">
                    <div class="form-header">
                        <h1>Iniciar sesi&oacute;n</h1>
                    </div>
                        <div class="form-body">
                                        <label>Usuario: </label>
                                        <input type="text" class="form-format input-block" name="usuario" size="20">

                                        <label>Contrase&ntilde;a: </label>
                                        <input type="password" class="form-format input-block" name="contrasena" size="20">

                                        <input type="submit" class="btn btn-primary btn-block" name="boton" value="Acceder">
                        </div>
                </form>
                
                <p class="registration-link-box mt-medium">
                    ¿Nuevo aqu&iacute;? 
                    <a href="registro.html">Reg&iacute;strate</a>
                    .
                </p>
            </div>
			
			<?php 
			echo "<p>" . $cadena . "</p>";
			?>
            
	</body>

</html>