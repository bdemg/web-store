function validateLogin(){
	
	if(document.forma.usuario.value == ""){
		
		alert("El campo de nombre de usuario est� vac�o, favor de llenarlo");
		document.forma.usuario.focus();
		return false;
	}
	
	if(document.forma.contrasena.value ==""){
		
		alert("El campo de contrase�a est� vac�o, favor de llenarlo");
		document.forma.contrasena.focus();
		return false;
	}
	
	return true;
	
}