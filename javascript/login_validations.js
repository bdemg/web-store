function validateLogin(){
	
	if(document.forma.usuario.value == ""){
		
		alert("El campo de nombre de usuario está vacío, favor de llenarlo");
		document.forma.usuario.focus();
		return false;
	}
	
	if(document.forma.contrasena.value ==""){
		
		alert("El campo de contraseña está vacío, favor de llenarlo");
		document.forma.contrasena.focus();
		return false;
	}
	
	return true;
	
}