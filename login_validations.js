function validateLogin(){
	
	if(document.forma.username.value == ""){
		
		alert("El campo de nombre de usuario está vacío, favor de llenarlo");
		return false;
	}else if(document.forma.pass.value ==""){
		
		alert("El campo de contraseña está vacío, favor de llenarlo");
		return false
	}
	
	return true;
	
}