function validateLogin(){
	
	if(document.forma.usuario.value == ""){
		
		alert("El campo de nombre de usuario est� vac�o, favor de llenarlo");
		return false;
	}else if(document.forma.contrasena.value ==""){
		
		alert("El campo de contrase�a est� vac�o, favor de llenarlo");
		return false
	}
	
	return true;
	
}