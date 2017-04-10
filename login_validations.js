function validateLogin(){
	
	if(document.forma.usuario.value == ""){
		
		alert("El campo de nombre de usuario está vacío, favor de llenarlo");
		return false;
	}else if(document.forma.contrasena.value ==""){
		
		alert("El campo de contraseña está vacío, favor de llenarlo");
		return false
	}
	
	return true;
	
}