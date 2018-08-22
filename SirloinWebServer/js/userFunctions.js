/**
 * Este archivo contiene las funciones javascript que realiza cualquier usuario,
 * regustrarse, olvidar password, actualizar datos
 */
$(':required').one('blur keydown', function() {
  console.log('touched', this);
  $(this).addClass('touched');
});
var theForm = document.forms['form1'];
if (!theForm) {
	theForm = document.form1;
}
var restaurante=0;
function __doPostBack(eventTarget) {
	console.debug("---------------------ENTRO A:", eventTarget);
	switch (eventTarget) {
		case "Login_BtnRecover":
			recoverPassword();
			break;
		case "Login_Login_BtnSignIn":
			// ENTRO A HACER LOGIN
			clientLogin();
			break;
		case "Register_BtnSave":
			clientRegister();
			break;
		case "Register_BtnUpdate":
			clientUpdate();
			break;
		case "Send_Contact_Form":
			sendContactForm();
			break;	
	}
	return false;
}
function sendContactForm() {
	var validator = $("#contact-form").validate();
	if (validator.form()) {	
		var progress = $(".loading-progress").progressTimer({
			timeLimit : 10,
			onFinish : function() {
			// alert('completed!');
			}
		});
		$.ajax({
			url : "php/sendContactForm.php",
			type : "POST",
			dataType : "JSON",
			data : {
				store_data : [ {
					nombre : $('#contact_name').val(),
					email : $('#contact_email').val(),
					tarjeta : $('#contact_TbxCardNumber').val(),
					telefono : $('#contact_phone').val(),
					mensaje : $('#contact_message').val()
					
				} ]
			}, // body
			success : function(resultado) {
				console.debug('ajax1 success', resultado);
				if (resultado.success) {
					
					// se le asigno un password temporal
					$('#mensajeModalExito').text(resultado.mensaje);
					$('#ModalSuccess').modal('toggle');
					$('#contact_name').val('');
					$('#contact_email').val('');
					$('#contact_TbxCardNumber').val('');
					$('#contact_phone').val('');
					$('#contact_message').val('');
				} else{
					
					$('#mensajeModalError2').html(resultado.mensaje);
					$('#ModalError').modal('toggle');
				}
			},
			error : function(xhr, ajaxOptions, thrownError) {
				console.log(xhr);
				// alert("Verificar informacion ingresada");
			}
		});

	}	
	
	return false;
}
function aceptaRegistroExitoso() {
	$('#ModalRegistrySuccess').modal('toggle');	
	// QUE HAGA EL LOGIN, LOS DATOS YA ESTAN EN EL FORMULARIO DE LOGIN:
	clientLogin();
}
function recoverPassword() {
	var progress = $(".loading-progress").progressTimer({
		timeLimit : 10,
		onFinish : function() {
		// alert('completed!');
		}
	});
	$.ajax({
		url : "php/forgetPassword.php",
		type : "POST",
		dataType : "JSON",
		data : {
			store_data : [ {
				email : $('#Login_TbxEmail').val()
			} ]
		}, // body
		success : function(resultado) {
			console.debug('ajax1 success', resultado);
			if (resultado.success) {
				$('#ModalRecoverPass').modal('toggle');
				// se le asigno un password temporal
				$('#mensajeModalExito').text(resultado.mensaje);
				$('#ModalSuccess').modal('toggle');
			} else{
				$('#ModalRecoverPass').modal('toggle');
				$('#mensajeModalError2').html(resultado.mensaje);
				$('#ModalError').modal('toggle');
			}
		},
		error : function(xhr, ajaxOptions, thrownError) {
			console.log(xhr);
			// alert("Verificar informacion ingresada");
		}
	});
	return false;
}
function clientLogin() {
	$.ajax({
		url : "php/loginValidate.php",
		type : "POST",
		// contentType: "application/json; charset=utf-8",
		dataType : "JSON",
		data : {
			store_data : [ {
				username : $('#Login_Login_UserName').val(),
				password : $('#Login_Login_Password').val()
			} ]
		}, // body
		success : function(resultado) {
			console.debug('ajax1 success', resultado);
			if (resultado.success) {
				sessionStorage.setItem("iduser", resultado.iduser);
				sessionStorage.setItem("tipoUser", resultado.tipoUser);
				sessionStorage.setItem("userName", resultado.userName);
				sessionStorage.setItem("permisos", resultado.permisos);
				sessionStorage.setItem("restaurantes", resultado.restaurantes);
				sessionStorage.setItem("logueado", true);
				// dependiendo del tipo de usuario se ira a determinado home
				if (resultado.tipoUser == "2")
					location.replace("estado_cuenta.php");
				else
					location.replace("home_admin.php");
			} else
				$('#ModalLoginError').modal('toggle');
		},
		error : function(xhr, ajaxOptions, thrownError) {
			console.log(xhr);
			// alert("Verificar informacion ingresada");
		}
	});
	return false;
}
function clientRegister() {
	$("#btnSubmitRegistro").prop('disabled', true);	
	$("#btnSubmitRegistro").css('background', "url('images/loader.gif') no-repeat top center").css('padding', '2px 8px').css('background-size', '50px 50px').css('border', 'none').css('width', '50px').css('height', '50px').val("");

	$.ajax({
		url : "php/saveFormUserRegistry.php",
		type : "POST",
		// contentType: "application/json; charset=utf-8",
		dataType : "JSON",
		data : {
			store_data : [ {
				user : $('#Register_TbxCardNumber').val(),
				nombre : $('#Register_TbxName').val(),
				a_paterno : $('#Register_TbxLastName').val(),
				a_materno : $('#Register_TbxFirstName').val(),
				genero : $('#Register_RdoBtnLstGender_F').is(":checked"),
				dia_nac : $('#Register_ddlDay').val(),
				mes_nac : $('#Register_ddlMonth').val(),
				year_nac : $('#Register_ddlAnio').val(),
				email : $('#Register_TbxEmail').val(),
				telefono : $('#Register_TbxPhone').val(),
				cp : $('#Register_TbxPostalCode').val(),
				password : $('#Register_TbxPassword').val()
			} ]
		}, // body
		success : function(resultado) {
			console.debug('ajax1 success', resultado);
			if (resultado.success) {
				restaurante = resultado.id_rest;
				// MOSTRAMOS LA VENTANA DE EXITO DEL REGISTRO:
				$('#ModalRegistrySuccess').modal('toggle');
				// QUE INVOQUE EL WS DE SINCRONIZACION DE FACTURAS:
				$.ajax({
					url : "php/callWSTarjetasVIPOneRestaurant.php?id_rest="+restaurante,
					type : "GET",
					// contentType: "application/json; charset=utf-8",
					dataType : "JSON",
					success : function(resultado) {
						console.debug('ajax1 success', resultado);
					},
					error : function(xhr, ajaxOptions, thrownError) {
						console.log(xhr);
						// alert("Verificar informacion ingresada");
					}
				});
				
				// PASAMOS LOS DATOS DEL USER Y PWD AL FORMULARIO DEL LOGIN:
				$('#Login_Login_UserName').val($('#Register_TbxEmail').val());
				$('#Login_Login_Password').val($('#Register_TbxConfirmPassword').val());
				// BORRAMOS LOS DATOS CAPTURADOS DEL FORMULARIO DE REGISTRO:
				$('#Register_TbxCardNumber').val('');
				$('#Register_TbxName').val('');
				$('#Register_TbxLastName').val('');
				$('#Register_TbxFirstName').val('');
				$('#Register_ddlDay').val('-1');
				$('#Register_ddlMonth').val('-1');
				$('#Register_ddlAnio').val('-1');
				$('#Register_TbxEmail').val('');
				$('#Register_TbxConfirmEmail').val('');
				$('#Register_TbxPhone').val('');
				$('#Register_TbxPostalCode').val('');
				$('#Register_TbxPassword').val('');
				$('#Register_TbxConfirmPassword').val('');
				$("#btnSubmitRegistro").prop('disabled', false);
				$("#btnSubmitRegistro").css('background', "#ff1744").css('padding', '8px 25px').css('border', '1px solid #ff1744').css('width', '100%').css('height', '42px').val("Enviar datos de registro");
			} else {
				$('#mensajeModalError').text(resultado.mensaje);
				$('#ModalRegistryError').modal('toggle');
				$("#btnSubmitRegistro").prop('disabled', false);
				$("#btnSubmitRegistro").css('background', "#ff1744").css('padding', '8px 25px').css('border', '1px solid #ff1744').css('width', '100%').css('height', '42px').val("Enviar datos de registro");
			}
		},
		error : function(xhr, ajaxOptions, thrownError) {
			console.log(xhr);
			// alert("Verificar informacion ingresada");
		}
	});
	return false;
}
function clientUpdate() {
	$.ajax({
		url : "php/saveFormUserUpdate.php",
		type : "POST",
		// contentType: "application/json; charset=utf-8",
		dataType : "JSON",
		data : {
			store_data : [ {
				user : $('#Register_TbxCardNumber').val(),
				nombre : $('#Register_TbxName').val(),
				a_paterno : $('#Register_TbxLastName').val(),
				a_materno : $('#Register_TbxFirstName').val(),
				genero : $('#Register_RdoBtnLstGender_F').is(":checked"),
				dia_nac : $('#Register_ddlDay').val(),
				mes_nac : $('#Register_ddlMonth').val(),
				year_nac : $('#Register_ddlAnio').val(),
				email : $('#Register_TbxEmail').val(),
				telefono : $('#Register_TbxPhone').val(),
				cp : $('#Register_TbxPostalCode').val(),
				password : $('#Register_TbxPassword').val()
			} ]
		}, // body
		success : function(resultado) {
			console.debug('ajax1 success', resultado);
			if (resultado.success) {
				// MOSTRAMOS LA VENTANA DE EXITO DEL REGISTRO:
				// alert(resultado.mensaje);
				$('#mensajeModalExito').text(resultado.mensaje);
				$('#ModalSuccess').modal('toggle');
			} else {
				$('#mensajeModalError').text(resultado.mensaje);
				$('#ModalError').modal('toggle');
			}
		},
		error : function(xhr, ajaxOptions, thrownError) {
			console.log(xhr);
			// alert("Verificar informacion ingresada");
		}
	});
	return false;
}
function ejecutaWSFact() {
	$.ajax({
		url : "php/callWSFacturasAllRestaurants.php",
		type : "GET",
		// contentType: "application/json; charset=utf-8",
		dataType : "JSON",
		success : function(resultado) {
			console.debug('ajax1 success', resultado);
		},
		error : function(xhr, ajaxOptions, thrownError) {
			console.log(xhr);
			// alert("Verificar informacion ingresada");
		}
	});
}
var mail = document.getElementById("Register_TbxEmail"), confirm_mail = document.getElementById("Register_TbxConfirmEmail");
function validateMail() {
	if (mail.value != confirm_mail.value) {
		confirm_mail.setCustomValidity("Los correos introducidos no coinciden");
	} else {
		confirm_mail.setCustomValidity('');
	}
}
mail.onchange = validateMail;
confirm_mail.onkeyup = validateMail;




var password = document.getElementById("Register_TbxPassword")
, confirm_password = document.getElementById("Register_TbxConfirmPassword");

function validatePassword(){
if(password.value != confirm_password.value) {
  confirm_password.setCustomValidity("Los passwords no coinciden");
} else {
  confirm_password.setCustomValidity('');
}
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;


//VALIDACIONES DE TIPOS DE DATOS EN ALGUNOS CONTROLES:

$(document).on('keydown', '.numeric-input', function(event) {
    var dot_split = $(this).val().split('.');
    if ($.inArray(event.keyCode,[46,8,9,27,13]) !== -1 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39) && dot_split.length <= 2) {
        // let it happen, don't do anything
        return;
    }else{
        // Ensure that it is a number and stop the keypress
        if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
            event.preventDefault(); 
        }   
    }
})

$(document).on('keydown', '.alpha-input', function(event) {

	 var k= event.keyCode;
//     console.debug(k);
    return($.inArray(event.keyCode,[46,8,9,27,13,192,32]) !== -1 || (k>64 && k<91)||(k>96 && k<123)||k==0);
    

})

