// JavaScript Document
$('#correo').change(function(){/*Inicio principal*/
			$.post('ajax_validacion_correo.php',{/*Inicio post*/
					  correo:$('#correo').val(),
		
					  beforeSend: function(){/*Inicio before*/
						  $('.validacion').html("Espere un momento por favor..");
					  }/*Fin before*/
	
					  },/*Fin post*/ 
						  function(respuesta){/*Inicio respuesta*/
							  $('.validacion').html(respuesta);
						  });/*Fin respuesta*/  
	});/*Fin principal*/
	$('#btn_guardar').hide();
	$('#pass2').change(function(event){/*Inicia principal*/
		if($('#pass1').val() == $('#pass2').val()){
			swal('Bien hecho...','Las contraseñas coinciden','success');
			$('#btn_guardar').show();
		}else{
			swal('Oppss...','Las contraseñas no coinciden','error');
			$('#btn_guardar').hide();
		}
	});/*Fin principal*/
	
	$('.form').keypress(function(e){/*Inicia principal*/
		if(e.which == 13){
			return false;
		}
	});/*Fin principal*/