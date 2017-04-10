function validateRegistration(){
	
	if(document.forma.email.value == ""){
		
		alert("El campo de email está vacío, favor de llenarlo");
		document.forma.email.focus();
		return false;
	}
	
	if(isEmailValid(document.forma.email)){
		
		return false;
	}
	
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
	
	if(passwordsMatch(document.forma.contrasena, document.forma.contrasena2)){
		
		return false;
	}
	
	return true;
}

function isEmailValid(campo){
		
		regex = /[\w.]+@[a-z]+\.[a-z.]+/;
		isValidEmail = regex.test(campo.value);
		
		if(!isValidEmail){
		
			alert("El email debe escribirse con un formato valido");
			campo.focus();
		}
		
		return isValidEmail;
}

function passwordsMatch(campoUno, campoDos){
		
		if(campoUno.value!=campoDos.value){
			alert("Tienen que estar iguales las contraseñas");
			campoUno.value = "";
			campoDos.value = "";
			campoUno.focus
			return false;
		}
		return true;
	}