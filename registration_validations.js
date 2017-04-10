function validateRegistration(){
	
	if(document.forma.correo.value == ""){
		
		alert("El campo de correo est� vac�o, favor de llenarlo");
		document.forma.correo.focus();
		return false;
	}
	
	if(!isEmailValid(document.forma.correo)){
		
		return false;
	}
	
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
	
	if(!passwordsMatch(document.forma.contrasena, document.forma.conf_contrasena)){
		
		return false;
	}
	
	return true;
}

function isEmailValid(campo){
		
	regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	isValidEmail = regex.test(campo.value);
	
	if(!isValidEmail){
	
		alert("El correo debe escribirse con un formato valido \n(por ejemplo: pan@ejemplo.com)");
		campo.focus();
	}
	
	return isValidEmail;
}

function passwordsMatch(campoUno, campoDos){
		
	if(campoUno.value!=campoDos.value){
		alert("Tienen que estar iguales las contrase�as");
		campoUno.value = "";
		campoDos.value = "";
		campoUno.focus
		return false;
	}
	return true;
}