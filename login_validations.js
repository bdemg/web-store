function validateLogin(){
	
	if(document.forma.username.value == ""){
		
		alert("El campo de nombre de usuario est� vac�o, favor de llenarlo");
		return false;
	}else if(document.forma.pass.value ==""){
		
		alert("El campo de contrase�a est� vac�o, favor de llenarlo");
		return false
	}
	
	return true;
	
}