window.addEventListener("load", function(){
	var registrar = document.getElementById("register");
	var password1 = document.getElementById("password");
	var password2 = document.getElementById("password2");
	var mail = document.getElementById("mail");
	var fecha = document.getElementById("birthdate");
	var direccion = document.getElementById("address");
	var checkbox = document.getElementById("checkbox");
	var error = document.getElementById("error");
	var regExPassword = /^[_a-z0-9-]{8,}$/;
	var regExMail = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
	var regExFecha = /^\d{2}-\d{2}-\d{4}$/;
	var errorValidacionMail = true;
	var errorValidacionFecha = true;
	var errorValidacionCheckbox = true;

	function validarPassword(){
		if(!regExPassword.test(password1.value.trim())){
			error.innerHTML = "Password incorrecto. Debe tener al menos 8 carácteres";
			errorValidacionPassword = true;
		}
	    else{
	        error.innerHTML = "";
	        errorValidacionPassword = false;
	    }
	}

	function validarMail(){
		if(!regExMail.test(mail.value.trim())){
			error.innerHTML = "Mail incorrecto";
			errorValidacionMail = true;
		}
	    else{
	        error.innerHTML = "";
	        errorValidacionMail = false;
	    }
	}

	function validarFecha(){
		if(!regExFecha.test(fecha.value.trim())){
			error.innerHTML = "El formato para la fecha debe ser dd-mm-aaaa.";
			errorValidacionFecha = true;
		}
		else{
			var arrayFecha = fecha.value.split("-");
			var dia = parseInt(arrayFecha[0]);
			var mes = parseInt(arrayFecha[1] - 1);
			var ano = parseInt(arrayFecha[2]);
			var unaFecha = new Date(ano, mes, dia);
			if(unaFecha.getDate() == dia){
				if(unaFecha.getMonth() == mes){
					if(unaFecha.getFullYear() == ano){
						errorValidacionFecha = false;
						error.innerHTML = "";
					}
				}
			}
			else{
				error.innerHTML = "El formato es correcto pero la fecha no es válida.";
				errorValidacionFecha = true;
			}
		}
	}

	function validarCheckbox(){
		if(!checkbox.checked){
			error.innerHTML = "Debe aceptar las condiciones";
			errorValidacionCheckbox = true;
		}
		else{
			error.innerHTML = "";
			errorValidacionCheckbox = false;
		}
	}

	password2.addEventListener("blur", validarPassword);

	fecha.addEventListener("blur", validarMail);

	direccion.addEventListener("blur", validarFecha);

	checkbox.addEventListener("blur", validarCheckbox);

	registrar.addEventListener("click", function(){
		validarCheckbox();
		validarFecha();
		validarMail();
		validarPassword();
		if(!errorValidacionMail && !errorValidacionFecha && !errorValidacionCheckbox && !errorValidacionPassword){
			registrar.disabled = false;
		}
	});
});