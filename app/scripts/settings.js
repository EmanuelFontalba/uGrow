window.addEventListener("load", function(){

	function captureEditElements(){
		var registrar = document.getElementById("register");
		var password1 = document.getElementById("password");
		var password2 = document.getElementById("password2");
		var mail = document.getElementById("mail");
		var date = document.getElementById("birthdate");
		var address = document.getElementById("address");
		var error = document.getElementById("error");
		var regExPassword = /^[_a-z0-9-]{8,}$/;
		var regExMail = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/;
		var regExDate = /^\d{2}-\d{2}-\d{4}$/;
		var errorValidatePassword = true;
		var errorValidateMail = true;
		var errorValidateDate = true;
	}

	function captureSiembraElements(){
		var publishSiembra = document.getElementById("publish");
		var dateSiembra = document.getElementById("date");
		var error = document.getElementById("error");
		var regExSiembra = /^\d{2}-\d{2}-\d{4}$/;
		var errorValidateSiembra = true;
	}
	

	function validatePassword(){
		if(!regExPassword.test(password1.value.trim())){
			error.innerHTML = "Password incorrecto. Debe tener al menos 8 carácteres";
			errorValidatePassword = true;
		}
	    else{
	        error.innerHTML = "";
	        errorValidatePassword = false;
	    }
	}

	function validateMail(){
		if(!regExMail.test(mail.value.trim())){
			error.innerHTML = "Mail incorrecto";
			errorValidateMail = true;
		}
	    else{
	        error.innerHTML = "";
	        errorValidateMail = false;
	    }
	}

	function validateDate(){
		if(!regExFecha.test(date.value.trim())){
			error.innerHTML = "El formato para la fecha debe ser dd-mm-aaaa.";
			errorValidateDate = true;
		}
		else{
			var arrayDate = date.value.split("-");
			var day = parseInt(arrayDate[0]);
			var month = parseInt(arrayDate[1] - 1);
			var year = parseInt(arrayDate[2]);
			var aDate = new Date(year, month, day);
			if(aDate.getDate() == day){
				if(aDate.getMonth() == month){
					if(aDate.getFullYear() == year){
						errorValidateDate = false;
						error.innerHTML = "";
					}
				}
			}
			else{
				error.innerHTML = "El formato es correcto pero la fecha no es válida.";
				errorValidateDate = true;
			}
		}
	}

	function validateFutureSiembra(){
		if(!regExSiembra.test(dateSiembra.value.trim())){
			error.innerHTML = "El formato para la fecha debe ser dd-mm-aaaa.";
			errorValidateSiembra = true;
		}
		else{
			var arrayDate = dateSiembra.value.split("-");
			var day = parseInt(arrayDate[0]);
			var month = parseInt(arrayDate[1] - 1);
			var year = parseInt(arrayDate[2]);
			var aDate = new Date(year, month, day);
			if(aDate.getDate() == day){
				if(aDate.getMonth() == month){
					if(aDate.getFullYear() == year){
						errorValidateSiembra = false;
						error.innerHTML = "";
					}
				}
			}
			else{
				error.innerHTML = "El formato es correcto pero la fecha no es válida.";
				errorValidateSiembra = true;
			}
		}
	}

	function validateInfo(){
		captureEditElements();
		password2.addEventListener("blur", validatePassword);
		date.addEventListener("blur", validateMail);
		address.addEventListener("blur", validateDate);
		register.addEventListener("click", function(){
			validateDate();
			validateMail();
			validatePassword();
			if(!errorValidateMail && !errorValidateDate && !errorValidatePassword){
				register.disabled = false;
			}
		});
	}

	function validateSiembra(){
		captureSiembraElements;
		publishSiembra.addEventListener("click", function(){
			validateFutureSiembra();
			if(!errorValidateSiembra){
				publishSiembra.disabled = false;
			}
		});
	}

	// ZONA QUE TRABAJA LA OCULTAR/MOSTRAR DE CADA SECTION EN FUNCIÓN DE LA PESTAÑA PULSADA

	function hideSections(){
		infoSection.style.display = 'none';
		imageSection.style.display = 'none';
		publishSection.style.display = 'none';
		tipSection.style.display = 'none';
		closeSection.style.display = 'none';
	}

	function showSelectedSection(section){
		hideSections();
		section.style.display = 'inline-block';
	}

	var infoTabSm = document.getElementById("info-tab-sm");
	var imageTabSm = document.getElementById("image-tab-sm");
	var publishTabSm = document.getElementById("publish-tab-sm");
	var tipTabSm = document.getElementById("tip-tab-sm");
	var closeTabSm = document.getElementById("close-tab-sm");
	var infoTabLg = document.getElementById("info-tab-lg");
	var imageTabLg = document.getElementById("image-tab-lg");
	var publishTabLg = document.getElementById("publish-tab-lg");
	var tipTabLg = document.getElementById("tip-tab-lg");
	var closeTabLg = document.getElementById("close-tab-lg");
	var infoSection = document.getElementById("info");
	var imageSection = document.getElementById("image");
	var tipSection = document.getElementById("tip");
	var publishSection = document.getElementById("publish");
	var closeSection = document.getElementById("close");

	console.log(infoTabSm);

	infoTabLg.addEventListener("click", function(){
		showSelectedSection(infoSection);
	});

	infoTabSm.addEventListener("click", function(){
		showSelectedSection(infoSection);
	});

	imageTabLg.addEventListener("click", function(){
		showSelectedSection(imageSection);
	});

	imageTabSm.addEventListener("click", function(){
		showSelectedSection(imageSection);
	});

	publishTabLg.addEventListener("click", function(){
		showSelectedSection(publishSection);
	});

	publishTabSm.addEventListener("click", function(){
		showSelectedSection(publishSection);
	});

	tipTabLg.addEventListener("click", function(){
		showSelectedSection(tipSection);
	});

	tipTabSm.addEventListener("click", function(){
		showSelectedSection(tipSection);
	});

	closeTabLg.addEventListener("click", function(){
		showSelectedSection(closeSection);
	});

	closeTabSm.addEventListener("click", function(){
		showSelectedSection(closeSection);
	});

});