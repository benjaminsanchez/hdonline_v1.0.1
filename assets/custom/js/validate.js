

$(document).ready(function() {
	
	var form = $( "form.editform" );
	var error1 = $('.alert-danger', form);
    var success1 = $('.alert-success', form);
	
	form.validate({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input
	
		invalidHandler: function (event, validator) { //display error alert on form submit              
			success1.hide();
			error1.show();
			App.scrollTo(error1, -200);
		},

	

		highlight: function (element) { // hightlight error inputs

			//$(element).closest('.form-group').addClass('has-error'); // set error class to the control group
			$(element).parent().addClass('has-error'); 
		},

		unhighlight: function (element) { // revert the change done by hightlight
			$(element)
				.closest('.form-group').removeClass('has-error'); // set error class to the control group
		},

		success: function (label) {
			label
				.closest('.form-group').removeClass('has-error'); // set success class to the control group
		},

		submitHandler: function (form) {
			success1.show();
			$(':input[type="submit"]').prop('disabled', true);
			error1.hide();
			
			var x_submit = 1;
			// validate pswd
			if ($("i.pswd-msg").length) {				
				var valor2 = $("input.pswd-input2").val();
				var valor1 = $("input.pswd-input1").val();
				if (valor2 != valor1) {
					success1.hide();
					$(':input[type="submit"]').prop('disabled', false);
					error1.show();
					x_submit = 0;
					return false;
				} else {
					x_submit = 1;
				}
				var a_edit = $("input[name='a_edit']").val();
				if (a_edit == "U") {
					
				} else {
					if ($("input.pswd-input1").val() == "" || $("input.pswd-input2").val() == "" ) {
						success1.hide();
						$(':input[type="submit"]').prop('disabled', false);
						error1.show();
						x_submit = 0;
						return false;
					} else {
						x_submit = 1;
					}
				}
			}
			
			if ($("#validate_user").length) {
				if ($("#validate_user")=="") {
					success1.hide();
					$(':input[type="submit"]').prop('disabled', false);
					x_submit = 0;					
					return false;
				} else {
					x_submit = 1;
				}
			}
			
			
			// end validate pswd
			if (x_submit == 1) {
				form.submit();
			}
		}
	});

	jQuery.extend(jQuery.validator.messages, {
	  required: "Este campo es obligatorio.",
	  remote: "Por favor, rellena este campo.",
	  email: "Por favor, escribe una dirección de correo válida",
	  url: "Por favor, escribe una URL válida.",
	  date: "Por favor, escribe una fecha válida.",
	  dateISO: "Por favor, escribe una fecha (ISO) válida.",
	  number: "Por favor, escribe un número entero válido.",
	  digits: "Por favor, escribe sólo dígitos.",
	  creditcard: "Por favor, escribe un número de tarjeta válido.",
	  equalTo: "Por favor, escribe el mismo valor de nuevo.",
	  accept: "Por favor, escribe un valor con una extensión aceptada.",
	  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
	  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
	  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
	  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
	  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
	  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
	});
});