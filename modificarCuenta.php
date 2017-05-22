<?php
// * * * * 
session_start();
include("sessionVariables.php");
if ($_SESSION[$is_logged] != true) {
	 header("location: index.php?estado=4");
	 exit();
}	
// * * * * 

include("variables.php");
include("funciones.php");

$sentenciaSQL = "SELECT usuario, contrasena, email FROM usuarios WHERE id_usuario =" . $_SESSION[$user_id];
$registros = ConsultarSQL ($servidor, $usuario, $contrasena, $basedatos, $sentenciaSQL);

if($registros) {
	$usuarioF = $registros[0]["usuario"];
	$contrasenaF = $registros[0]["contrasena"];
	$correoF = $registros[0]["email"];
}

?>
<html>

	<head>
		<title>Registrar usuario</title>
        <link rel="stylesheet" href="css/generalStyle.css">
		
		<script language="javascript" src="javascript/registration_validations.js" type="text/javascript"></script>
		<script>
		<!--
		window.onload = function () {
			
			document.forma.usuario.value = "<?php echo $usuarioF; ?>";
			document.forma.usuario.disabled = true;
			document.forma.contrasena.value = "<?php echo $contrasenaF; ?>";
			document.forma.conf_contrasena.value = "<?php echo $contrasenaF; ?>";
			document.forma.correo.value = "<?php echo $correoF; ?>";
		
			document.forma.btn_cancelar.onclick = function(){
			
				history.back();
			}
			
			document.forma.onsubmit = function(){
				
				return validateRegistration();
			}
		}
		
		//-->
		</script>
		
		
	</head>
	
    <body>
        <div class="a-box-large">
                <div class="registry-header">
                    <h1>Modificar informaci&oacute;n de la cuenta</h1>
                </div>
            <form action="actualizarCuenta.php" method="post" name="forma" class="registry-body" >
                <dl class="registry-group">
                    <dt>
                        <label>Correo electr&oacute;nico:</label>
                    </dt>
                    <dd>
                        <input type="text" class="form-format input-block" name="correo" size="20">
                        <p class="note">Confirme el correo electr&oacute;nico al que est&aacute; asociada su cuenta.</p>
                    </dd>
                </dl>
                <dl class="registry-group">
                    <dt>
                        <label>Usuario:</label>
                    </dt>
                    <dd>
                        <input type="text" class="form-format input-block" name="usuario" size="20">
                        <p class="note">Escriba su nombre de usuario. Solo para asegurarnos.</p>
                    </dd>
                </dl>
                <dl class="registry-group">
                    <dt>
                        <label>Contrase&ntilde;a:</label>
                    </dt>
                    <dd>
                        <input type="password" class="form-format input-block" name="contrasena" size="20">
                        <p class="note">Escriba su nueva contrase&ntilde;a.</p>
                    </dd>
                </dl>
                <dl class="registry-group">
                    <dt>
                        <label>Confirmar contrase&ntilde;a:</label>
                    </dt>
                    <dd>
                        <input type="password" class="form-format input-block" name="conf_contrasena" size="20">
                        <p class="note">Confirme su nueva contrase&ntilde;a.</p>
                    </dd>
                </dl>
                    <input type="submit" class="btn btn-primary" name="btn_registrar" value="Actualizar datos">
                    <input type="button" class="btn" name="btn_cancelar" value="Cancelar">
            </form>
        </div>
    </body>
</html>