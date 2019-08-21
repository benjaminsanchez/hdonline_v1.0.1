/**

Custom module for you to write your own javascript functions

**/

$(document).ready(function(e) {

// START : MYHD	


if ($("div.page-content-container > div > div.page-sidebar > nav").length) {
	var alto_footer = parseInt($("div.footer-hd").height())+120;
	var alto_pantalla = parseInt($(document).height());
	var alto_visualizacion =  parseInt($(window).height());
	$(window).scroll(function(){
		var alto_sidebar = parseInt($("div.page-content-container > div > div.page-sidebar > nav.navbar").height());
		var scrolltop = parseInt($(this).scrollTop());
	// 	console.log("scrolltop"+scrolltop+" alto_footer"+alto_footer+" alto_sidebar"+alto_sidebar+" alto_pantalla"+alto_pantalla);
		var max_espacio = parseInt(scrolltop+alto_footer+alto_visualizacion);
		if (max_espacio >alto_pantalla) {
			var resta = max_espacio-alto_pantalla;
			//console.log("te pasaste resta"+resta );
			//console.log("scrolltop"+scrolltop+" alto_footer"+alto_footer+" alto_sidebar"+alto_sidebar+" alto_pantalla"+alto_pantalla);
			$("div.page-sidebar nav.navbar").css("margin-top","-"+resta+"px");
			$(".breadcrumbs h1:not(.relative)").css("position","relative");
		} else {
			$("div.page-sidebar nav.navbar").css("margin-top","18px");
			$(".breadcrumbs h1:not(.relative)").css("position","fixed");
		}
		
		
	});

}

	/* ACCESO E-PEDIDOS */
	if ($("#acceso_epedidos").length) {
		//    data: {ids:info},
		$.ajax({
		   type: "POST",  
		   url: "/ajax_login_epedidos",
		   success: function(msg){
			   // alert(msg.length);
			   if (msg.length == 36){
				   $( "ul.navbar-nav li a:contains('E-Pedidos')" ).css( "text-decoration", "underline" );
				   $( "ul.navbar-nav li a:contains('E-Pedidos')" ).attr("href","http://pedidosax.hdlao.com/Login.aspx?t="+msg);
				  
				   $( "ul.navbar-nav li a:contains('E-Pedidos')" ).on('click', function() {
						
						$.ajax({
							type: "POST",  
							url: "/ajax_destruir_token_epedidos",
							success: function(msg){
								$( "ul.navbar-nav li a:contains('E-Pedidos')" ).attr("href","http://pedidosax.hdlao.com/inicio.aspx");
							}
						});
					});
					
				   
			   }
			 console.log(msg);
		   }
		});
	}
	
	/* END ACCESO EPEDIDOS */
	

	/* Modal descarga de imagen */
	if ($('form#descarga-imagen').length) {
		$("a.btn-descarga-img").on('click', function() {
			var urlbase = $(this).data("baseurl");
			var localizacion = $(this).data("localizacion");
			var archivo_nombre = $(this).data("archivonombre");
			var ancho = parseInt($(this).data("ancho"));
			var alto = parseInt($(this).data("alto"));
			var id_biblioteca =  $(this).data("idbiblioteca");
			$("form#descarga-imagen input[name='alto']").val(alto);
			$("form#descarga-imagen input[name='ancho']").val(ancho);
			$("form#descarga-imagen input[name='urlbase']").val(urlbase);
			$("form#descarga-imagen input[name='localizacion']").val(localizacion);
			$("form#descarga-imagen input[name='archivo_nombre']").val(archivo_nombre);
			$("form#descarga-imagen input[name='id_biblioteca']").val(id_biblioteca);
			$('#descarga-imagen #defaultxt').html("Original ("+ancho+"x"+alto+" px)");
			
			if (ancho<=1024) { $("label.radio.tipo1024").fadeOut(0);	} else {$("label.radio.tipo1024").fadeIn(0);	}
			if (ancho<=300) { $("label.radio.tipo300").fadeOut(0);	} else {$("label.radio.tipo300").fadeIn(0);	}
			$('form#descarga-imagen input[type=radio][name=tipoimg]').prop('checked', false);
			$('.solicitar-img').fadeOut(0);
			//alert("Descarga open modal"+archivo_nombre);	
		});
				
		$('form#descarga-imagen input[type=radio][name=tipoimg]').change(function() {		
			var tipoimg = this.value;	
			var btnhref='';
			var btndownload = ''; 
			var zoom = 2;
			var urlbase = $("form#descarga-imagen input[name='urlbase']").val();
			var localizacion = $("form#descarga-imagen input[name='localizacion']").val();
			var archivo_nombre = $("form#descarga-imagen input[name='archivo_nombre']").val();
			var ancho = parseInt($("form#descarga-imagen input[name='ancho']").val());
			var alto = parseInt($("form#descarga-imagen input[name='alto']").val());
			
			switch (tipoimg) {
				
				case '300':
					$("#btndescarga").attr('download','300_'+archivo_nombre);
					btnhref = urlbase+'img/'+localizacion+'/300x0-'+zoom+'/biblioteca/'+archivo_nombre;
					btndownload = 'Descargar'; 
					$('.solicitar-img').fadeOut(0);
				break;
				case '1024':
					$("#btndescarga").attr('download','1024_'+archivo_nombre);
					btnhref =  urlbase+'img/'+localizacion+'/1024x0-'+zoom+'/biblioteca/'+archivo_nombre;
					btndownload = 'Descargar'; 
					$('.solicitar-img').fadeOut(0);
				break;	
				case 'default':
					$("#btndescarga").attr('download',archivo_nombre);
					btnhref =  urlbase+'img/'+localizacion+'/'+ancho+'x'+alto+'-'+zoom+'/biblioteca/'+archivo_nombre;
					btndownload = 'Descargar'; 
					$('.solicitar-img').fadeOut(0);
					
				break;
				case 'max':
					btndownload = 'Solicitar'; 
					$("#btndescarga").attr('download','');
					$('.solicitar-img').fadeIn(0);		
					btnhref = 'javascript:$("form#descarga-imagen").submit();';		
					$("form#descarga-imagen textarea[name='comentario']").focus();
				break;
				
			}
			
			$("#btndescarga").attr('href',btnhref);		
			$("#btndescarga").html(btndownload);
		});
		
		$("form#descarga-imagen textarea[name='comentario']").on('keyup', function() {
			$("#ShowMsgDescarga").html("");
		});
			
		$('form#descarga-imagen').on('submit', function() {	
			var comentario =  $("form#descarga-imagen textarea[name='comentario']").val();
			if 	(comentario ==""){
				$("#ShowMsgDescarga").html("Debe ingresar un comentario");
				$("form#descarga-imagen textarea[name='comentario']").focus();
				return false;
			} else {
				$("#btndescarga").fadeOut(0);
				$("#ShowMsgDescarga").html("Enviando solicitud...");
				var postForm = { 
					'id_biblioteca' : $("form#descarga-imagen input[name='id_biblioteca']").val(),
					'comentario':comentario
				};		
				$.ajax({
					url: "/ajax_solicitar_imagen_alta",
					type: "post",
					data: postForm ,
					success: function (response) {
						var respuesta = response.split("*");
						if (respuesta[0]=="OK") {
							$("#ShowMsgDescarga").html(respuesta[1]);
							$('form#descarga-imagen')[0].reset();
							$('.solicitar-img').fadeOut(0);
							setTimeout(function() {$("#ShowMsgDescarga").html('')},5000);
							setTimeout(function() {	$("#btndescarga").fadeIn(0); $("#btndescarga").html('Descargar'); $("#btndescarga").attr('href','javascript:alert(\'Debe seleccionar una opción\')'); $("#btndescarga").attr('download','');	 },5000);
						}			
					},
					error: function(jqXHR, textStatus, errorThrown) {
					   console.log(textStatus, errorThrown);
					}
				});
				
				return false;
			}
		});
	
	}

	/* Editar distribuidor */
	if ($('form#distribuidoresedit').length) {
		$("select").chosen();
		
		$("a.todas_categorias").on('click', function () {
			var idselector = $(this).parent().find("select").attr("id");
			$("#"+idselector+" option").each(function()	{
				if (typeof $(this).attr("selected") == "undefined") {
					$(this).attr("selected",true);
				}
			});
			
			$("#"+idselector).trigger('liszt:updated');
		});
		
		
		$('form#distribuidoresedit button[type=submit]').on('click', function(e){
  
			// validation code here
			if ($("#categoriasv2").val() == "" || 	$("#categoriasv2").val() == ",") {
				alert("debe seleccionar al menos una categoría");
				 e.preventDefault();
				return false;
			}	
   			
		}); 
	}
	
	
	/* Alertas */
	if ($('form#alertasedit').length) {
		var a_edit = $("input[name='a_edit']").val();
		
		// Clear for setup
		$("#Show_x_titulo,#Show_x_imagen,#Show_x_tipo_enlace,#Show_x_id_evento,#Show_x_texto_boton,#Show_x_asunto,#Show_x_texto_abajo_nombre,#Show_x_texto,#Show_x_id_seccion,#Show_x_enlace_personalizado,#Show_x_texto_notificacion").fadeOut(0);
		
		
		// Tipos
		if (a_edit == "U") {
			// tipo alerta
			var valor = $("#x_tipo").val();
			if (valor != null && valor != "") {
				var i = 0;
				for (i = 0; i < valor.length; i++) {
					show_alertas_fields(valor[i]);	
				}
			}
		
			
			// estado
			
			
			
		} 
		
		
		
		var estado = $('input[name=x_estado]:checked', '#alertasedit').val();
		show_estado(estado);
		
		$('input[type=radio][name=x_tipo_enlace]').change(function() {
			var tipo_enlace = $(this).val();
			show_tipo_enlace(tipo_enlace);
		});
		
		$('input[type=radio][name=x_estado]').change(function() {
			var estado = $(this).val();
			show_estado(estado);
		});
		
		$("#x_tipo").on('change', function() {
			$("#Show_x_id_seccion,#Show_x_enlace_personalizado,#Show_x_titulo,#Show_x_imagen,#Show_x_tipo_enlace,#Show_x_texto_boton,#Show_x_asunto,#Show_x_texto_abajo_nombre,#Show_x_texto,#Show_x_texto_notificacion").fadeOut(0);
			var valor = $(this).val();
			
			if (valor != null && valor != "") {
				var i = 0;
				for (i = 0; i < valor.length; i++) {
					show_alertas_fields(valor[i]);	
				}
			}
			
		});
		
		function show_estado(estado) {
			switch (estado) {
				case "programado": $("#Show_x_fecha_programacion,#Show_x_hora_programacion").fadeIn(300); break;
				default:  $("#Show_x_fecha_programacion,#Show_x_hora_programacion").fadeOut(0);  break;				
			}
		}
		
		function show_tipo_enlace(tipo_enlace) {
			switch (tipo_enlace) {
				case "seccion": $("#Show_x_id_seccion").fadeIn(300); $("#Show_x_enlace_personalizado").fadeOut(0); break;
				case "externo": $("#Show_x_enlace_personalizado").fadeIn(300); $("#Show_x_id_seccion").fadeOut(0); break;				
			}
		}
		
		
		
		function show_alertas_fields(tipo) {
			var tipo_enlace = $('input[name=x_tipo_enlace]:checked', '#alertasedit').val();
			var estado = $('input[name=x_estado]:checked', '#alertasedit').val();
		
			switch (tipo) {
				case "banner":
					$("#Show_x_imagen,#Show_x_tipo_enlace,#Show_x_texto_boton").fadeIn(0);		show_tipo_enlace(tipo_enlace);	show_estado(estado);	break;				
				case "evento":
					$("#Show_x_id_evento,#Show_x_tipo_enlace,#Show_x_texto_boton").fadeIn(0);	show_estado(estado);show_tipo_enlace(tipo_enlace);	break;				
				case "email":
					$("#Show_x_asunto,#Show_x_texto_abajo_nombre,#Show_x_texto,#Show_x_tipo_enlace,#Show_x_texto_boton").fadeIn(0); 	show_tipo_enlace(tipo_enlace);	show_estado(estado);	break;
				case "notificacion":
					$("#Show_x_texto_notificacion").fadeIn(0);				break;
				case "obligatorio":
					$("#Show_x_imagen,#Show_x_titulo,#Show_x_texto,#Show_x_tipo_enlace,#Show_x_texto_boton").fadeIn(0);	show_tipo_enlace(tipo_enlace);	show_estado(estado);	break;
				case "libre":
					$("#Show_x_imagen,#Show_x_titulo,#Show_x_texto,#Show_x_tipo_enlace,#Show_x_texto_boton").fadeIn(0);		show_tipo_enlace(tipo_enlace);	show_estado(estado);break;			
			}				
		}
		
		// End tipos
		
		
	}// End alertas
	
	
	
	
	if ($('form#usuariosedit').length) {
		//$("select").chosen();
		
		$("a.todas_categorias").on('click', function () {
			var idselector = $(this).parent().find("select").attr("id");
			$("#"+idselector+" option").each(function()	{
				if (typeof $(this).attr("selected") == "undefined") {
					$(this).attr("selected",true);
				}
			});
			
			$("#"+idselector).trigger('liszt:updated');
		}); 
		
		$('form#usuariosedit button[type=submit]').on('click', function(e){
  
			// validation code here
			if ($("#categoriasv2").val() == "" || 	$("#categoriasv2").val() == ",") {
				alert("debe seleccionar al menos una categoría");
				 e.preventDefault();
				return false;
			}	
   			
		});
			
		
		
		
		
	}
	
	if ($('form#distribuidores_usuariosedit').length) {
		
		// Comprobar username
		$("#x_email").on('keyup', function () {
			$("#x_email_msg").html();
			
		});
		
		$("#x_email").on('blur', function() {
			var usuario = $(this).val();
			var id = $("#x_id_distribuidor_usuario").val();
			var a_edit = $("input[name='a_edit']").val(); 
			var mode = 'distribuidores_usuarios'
			var campoid = "x_email";
			if (usuario != "") {
				comprobar_usuario(mode,a_edit,usuario,id,campoid);
			}
		});
		
		
		
		
	}
	
	
	if ($('form#distribuidores_usuarios_tmpedit').length) {
		
		// Comprobar username
		$("#x_email").on('keyup', function () {
			$("#x_email_msg").html();
			
		});
		
		$("#x_email").on('blur', function() {
			var usuario = $(this).val();
			var id = $("#x_id_distribuidor_usuario").val();
			var a_edit = $("input[name='a_edit']").val(); 
			var mode = 'distribuidores_usuarios'
			var campoid = "x_email";
			if (usuario != "") {
				comprobar_usuario(mode,a_edit,usuario,id,campoid);
			}
		});
		
		
		var usuario = $(this).val();
		var id = $("#x_id_distribuidor_usuario").val();
		var a_edit = $("input[name='a_edit']").val(); 
		var mode = 'distribuidores_usuarios'
		var campoid = "x_email";
		if (usuario != "") {
			comprobar_usuario(mode,a_edit,usuario,id,campoid);
		}
		
		
		
	}
	
	
	
	if ($('form#usuariosedit').length) {
		
		// Comprobar username
		$("#x_email").on('keyup', function () {
			$("#x_email_msg").html();
			
		});
		
		$("#x_email").on('blur', function() {
			var usuario = $(this).val();
			var id = $("#x_id_usuario").val();
			var a_edit = $("input[name='a_edit']").val(); 
			var mode = 'usuarios'
			var campoid = "x_email";
			if (usuario != "") {
				comprobar_usuario(mode,a_edit,usuario,id,campoid);
			}
		});
		
		
	}
	
	
	if ($('form#administradoresedit').length) {
		
		// Comprobar username
		$("#x_usuario").on('keyup', function () {
			$("#x_usuario_msg").html();
			
		});
		
		$("#x_usuario").on('blur', function() {
			var usuario = $(this).val();
			var id = $("#x_usuario").val();
			var a_edit = $("input[name='a_edit']").val(); 
			var mode = 'usuarios'
			var campoid = "x_usuario";
			if (usuario != "") {
				comprobar_usuario(mode,a_edit,usuario,id,campoid);
			}
		});
		
		
		jQuery("input[name='x_rol']").on('change',function() {
			var $element = jQuery("input[type=radio][name='x_rol']:checked");
			setFieldsRoles($element.val(),$element.attr("data-description"));
		});   
		
		var $rol = jQuery("input[type=radio][name='x_rol']:checked");
		setFieldsRoles($rol.val(),$rol.attr("data-description"));
		
		
		function setFieldsRoles(valor,description) {
		
			$("#ShowDescription").html(description);
			switch (valor) {
				case "admin":
					$('#Show_x_codigo_administradores_accesos,#Show_x_admin_colaborador').fadeOut(0);
					$("input[type=radio][name='x_admin_colaborador'][value='on']").prop('checked', 'checked');
					$("#x_codigo_administradores_accesos option").each(function() {
						$(this).prop('selected',true);
					});
					$('#x_codigo_administradores_accesos').trigger("liszt:updated");
					update_selector();
				break;
				case "colaborador":
					$('#Show_x_codigo_administradores_accesos,#Show_x_admin_colaborador').fadeOut(0);
					$("input[type=radio][name='x_admin_colaborador'][value='on']").prop('checked', 'checked');
					$("#x_codigo_administradores_accesos option").each(function() {
						$(this).prop('selected',false);
					});
					$('#x_codigo_administradores_accesos').trigger("liszt:updated");
					update_selector();
				break;	
				case "personalizado":
					$('#Show_x_codigo_administradores_accesos,#Show_x_admin_colaborador').fadeIn(0);
					//$("input[type=radio][name='x_admin_colaborador'][value='off']").prop('checked', 'checked'); ;
				break;
			}
		}
		

		function update_selector() {
			var countsecciones =0;	
			var countsecciones_seleccionadas=0;
			$("#x_codigo_administradores_accesos option").each(function() {
				countsecciones++;
				if ($(this).prop('selected')==true) {
					countsecciones_seleccionadas++;
				}
			});
			
			if (countsecciones_seleccionadas == countsecciones) {
				$(".btn_quitar_todos,.btn_todos").remove();
				$( "<a href='javascript:void(0)' class='btn_quitar_todos'>Deseleccionar todas</a>" ).insertAfter( "#x_codigo_administradores_accesos" );
				activarbtn_quitar();
			} else {
				$(".btn_quitar_todos,.btn_todos").remove();
				$( "<a href='javascript:void(0)' class='btn_todos'>Seleccionar todas</a>" ).insertAfter( "#x_codigo_administradores_accesos" );
				activarbtn_seleccionar();
			}
		}
		
		update_selector();
		
		function activarbtn_seleccionar() {
			$(".btn_todos").on('click', function() {
				$("#x_codigo_administradores_accesos option").each(function() {
					 $(this).prop('selected', true);
				
				});
				
				$("#x_codigo_administradores_accesos").removeClass("chzn-done");
				$("#x_codigo_administradores_accesos_chzn").remove();
				// $el.chosen('destroy');  
				$("#x_codigo_administradores_accesos").chosen();
				$(".btn_todos").remove();
				$( "<a href='javascript:void(0)' class='btn_quitar_todos'>Deseleccionar todas</a>" ).insertAfter( "#x_codigo_administradores_accesos" );
				activarbtn_quitar();
			});
		}
		
		function activarbtn_quitar() {
			$(".btn_quitar_todos").on('click', function() {
				$("#x_codigo_administradores_accesos option").each(function() {
					 $(this).prop('selected', false);
				
				});
				
				$("#x_codigo_administradores_accesos").removeClass("chzn-done");
				$("#x_codigo_administradores_accesos_chzn").remove();
				// $el.chosen('destroy');  
				$("#x_codigo_administradores_accesos").chosen();
				$(".btn_quitar_todos").remove();
				$( "<a href='javascript:void(0)' class='btn_todos'>Seleccionar todas</a>" ).insertAfter( "#x_codigo_administradores_accesos" );
				activarbtn_seleccionar();
			});
		}
		
	}
	
	if ($('form#eventos_sesionesedit').length) {
		
		jQuery("input[name='x_tipo_sesion']").on('change',function() {
			setFieldsEvent(jQuery("input[type=radio][name='x_tipo_sesion']:checked").val());
		});   
		setFieldsEvent(jQuery("input[type=radio][name='x_tipo_sesion']:checked").val());
		function setFieldsEvent(valor) {
			
			switch (valor) {
				case "online":
					//$(online).fadeIn();
					$('#Show_x_ubicacion,#MAPA_CONTENT,#Show_x_coordenadas').fadeOut();
				break;
				case "presencial":
					$('#Show_x_ubicacion,#MAPA_CONTENT,#Show_x_coordenadas').fadeIn();
					// $(online).fadeOut();
				break;	
				
			}
		}
		
		$(document).ready(function(e) {
			if ($("#x_ubicacion").val()!="" && coordenadas == "-33.449776583118435,-70.67321419715881") {
         	  $("#btn_ver_x_ubicacion").trigger('click');
			}
        });
		var map;
		var markersArray = [];
		var geocoder = null;
		var marker;
		var coordenadas = $("#x_coordenadas").val();
		var arrayCoordenadas = new Array();
			
		if (coordenadas != ""){
			var xzoom = 15
			
		} else {
			if ($("#x_direccion").val()!="") {
				coordenadas = '-33.449776583118435,-70.67321419715881'; // coordenadas por defecto
				var xzoom = 10;
				$("#x_coordenadas").val(coordenadas);
				
			} else{
				coordenadas = '-33.449776583118435,-70.67321419715881'; // coordenadas por defecto
				var xzoom = 10;
				$("#x_coordenadas").val(coordenadas);
			}
		}
		arrayCoordenadas = coordenadas.split(",");
		function InicializarMapa() {
			console.log("Inicializar coordenadas:"+arrayCoordenadas[0]);
			var options = {
				zoom: xzoom
				, center: new google.maps.LatLng(arrayCoordenadas[0],arrayCoordenadas[1])
				, mapTypeId: google.maps.MapTypeId.ROADMAP
			};
	 
			map = new google.maps.Map(document.getElementById('map_x_ubicacion'), options);
			geocoder = new google.maps.Geocoder();
			google.maps.event.addListener(map, 'click', function(e) {
				$("#x_coordenadas").val(e.latLng.lat()+","+e.latLng.lng());
				clearOverlays();	
				addMarker(e.latLng);
			});
			addMarker(map.getCenter());
				
		}
		
	
		function addMarker(location) {
		  marker = new google.maps.Marker({
			position: location
			 , icon: '../../assets/custom/img/pointer.png'
			,   map: map
			
		  });
		  var location = location;
		  markersArray.push(marker);
		}
		
		
		function clearOverlays() {
			marker.setMap(null);
		}
		var alerta = 0;
		//funcion que traduce la direccion en coordenadas
		function codeAddress() {
			
			var address = $("#x_ubicacion").val()+ "";
			console.log("Buscando:"+address);
			
			geocoder.geocode( { 'address': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					var result = results[0].geometry.location;
					var coordenada = result.toString().split(",");		
					var latitud = coordenada[0].replace("(", "");
					var longitud = coordenada[1].replace(")", "");
					
					
					$("#x_coordenadas").val(latitud+","+longitud);
					map.setCenter(results[0].geometry.location);
					map.setZoom(15);
					marker.setPosition(results[0].geometry.location);		 
					google.maps.event.addListener(marker, 'dragend', function(){
				  
					});
					// modo auto
					/*if ($("#x_localizacion").val() == "ar" && $("#x_direccion").val() != "" && $("#x_coordenadas").val() != "-33.449776583118435,-70.67321419715881" && alerta ==0) {
					$('form#distribuidoresedit').submit();
					}*/
				  } else {
					 
					  //si no es OK devuelvo error
					
					 alerta = 1;
					  alert("Google Maps, no encuentra las coordenadas para: '"+address+"' \n\nIntente nuevamente con una direccion mas exacta, moviendo los complementos de dirección como \"local 12\" o \"piso 8\" o \"al costado de supermercado\", estos datos deben ir en el campo info adicional,\n\nluego presione ubicar coordenadas nuevamente \n\nERROR: " + status);
				  }
			});
		}
		
		$("input#btn_ver_x_ubicacion").click(function() { codeAddress(); });
		InicializarMapa(); 
		
	}
	
	
	if ($('form#seccionesedit').length) {
		
		// Start: REVISAR SI UN MÓDULO YA ESTÁ SIENDO UTILIZADO
		revisar_modulo_utilizado();
		
		
		function revisar_modulo_utilizado() {
			
			var a_edit = $("input[name='a_edit']").val();
			var id_seccion = $("#x_id_seccion").val();
			var id_categoria = $("#x_id_categoria").val();
			var id_template = $('input[name=x_id_template]:checked', '#seccionesedit').val()
			$.getJSON( '/ajax_modulos_utilizados/'+a_edit+'/'+id_seccion+'/'+id_template+'/'+id_categoria, function(data){
				console.log(data);
				$.each(data, function (i, item) {
					
					var  $selector = $("input[type=radio][name=x_id_template][value="+item.id_template+"]");
					$selector.parent().addClass("mt-radio-disabled popovers");
					$selector.attr("disabled","disabled");
					$selector.next().attr("data-content",$selector.next().attr("data-content")+"<br><span class='font-red' >*Este módulo está siendo utilizado</span>");
				/*	if (item.id_seccion == x_id_seccion_padre ) {
						$('#x_id_seccion_padre').append($('<option>', { 
							value: item.id_seccion,
							text : item.nombre,
							selected : true
						}));
					} else {
						$('#x_id_seccion_padre').append($('<option>', { 
							value: item.id_seccion,
							text : item.nombre 
						}));
					}*/
				});
				//$('#x_materiales').trigger("liszt:updated");
			});
		}
		
		$("#x_id_categoria").on('change', function() {
			revisar_modulo_utilizado();
		});
		
		
		// End: REVISAR SI UN MÓDULO YA ESTÁ SIENDO UTILIZADO
		
		// Obtener secciones padre en categoria
		
		obtener_secciones_padre_en_categoria($("#x_id_categoria").val());
		
		$("#x_id_categoria").on("change", function() {
			obtener_secciones_padre_en_categoria($(this).val());
		});
		
		// SECCIONES PADRE POR CATEGORIA
		function obtener_secciones_padre_en_categoria(id_categoria) {
			var x_id_seccion_padre = $("#x_id_seccion_padre").val();	
			
			$('#x_id_seccion_padre').empty();			
			$.getJSON( '/ajax_secciones_padre_en_categoria/'+id_categoria, function(data){
				$('#x_id_seccion_padre').append($('<option>', { 
						value: '',
						text : 'Selecciones' 
					}));				
				
				$.each(data, function (i, item) {
					if (item.id_seccion == x_id_seccion_padre ) {
						$('#x_id_seccion_padre').append($('<option>', { 
							value: item.id_seccion,
							text : item.nombre,
							selected : true
						}));
					} else {
						$('#x_id_seccion_padre').append($('<option>', { 
							value: item.id_seccion,
							text : item.nombre 
						}));
					}
				});
				//$('#x_materiales').trigger("liszt:updated");
			});
		}
		
		
		
		// Tipo seccion / subseccion
		$('form#seccionesedit input[type=radio][name=x_tipo]').change(function() {
			toggleElementTipo(this.value);
		});
		
		function toggleElementTipo(value) {
			switch (value){
				case "seccion":
					$("#Show_x_id_seccion_padre").fadeOut(0); 
					$("#Show_x_menu").fadeIn(0);
					$("#Show_x_estado_dashboard").fadeIn(0);
					break;
				case "subseccion":
					$("#Show_x_id_seccion_padre").fadeIn(0); 
					$("#Show_x_menu").fadeIn(0);
					$("#Show_x_estado_dashboard").fadeOut(0);
					break;			
			}
		}
		
		// Orden de contenido, si es alfabetico mostrar opciones 
		$('form#seccionesedit input[type=radio][name=x_orden_de_contenido]').change(function() {
			toggleElementOrdenContenido(this.value);
		});
		
		function toggleElementOrdenContenido(value) {
			switch (value) {
				case "sort_alpha":
					$("#Show_x_orden_alfabetico_criterio").fadeIn(0);
				break;
				default:
					$("#Show_x_orden_alfabetico_criterio").fadeOut(0);
				break;	
			}
		}
		
		// Template
		$('form#seccionesedit input[type=radio][name=x_id_template]').change(function() {
			toggleElementTemplate(this.value);
		});
		
		function toggleElementTemplate(value) {
			var allElements = '#Show_x_agrupar,#Show_x_agrupar_id_categoria_tipo, #Show_x_contenido_enriquecido, #Show_x_columnas, #Show_x_destino, #Show_x_mostrar_filtro, #Show_x_id_secciones_agrupar_tipo_contenido, #Show_x_mostrar_listado, #Show_x_orden_alfabetico_criterio, #Show_x_orden_de_contenido, #Show_x_url_externa';
			switch (value){
				case "1": // fotovideo
					$(allElements).fadeOut(0); 
					$("#Show_x_agrupar,#Show_x_agrupar_id_categoria_tipo, #Show_x_id_secciones_agrupar_tipo_contenido, #Show_x_columnas, #Show_x_mostrar_filtro, #Show_x_mostrar_listado, #Show_x_orden_de_contenido").fadeIn(0);
					updateMostrarListado('fotovideo');
					break;
				case "2": // incentivo
					$(allElements).fadeOut(0); 
					$("").fadeIn(0);
					break;
				case "3": // eventos
					$(allElements).fadeOut(0); 
					$("#Show_x_columnas, #Show_x_mostrar_filtro, #Show_x_mostrar_listado, #Show_x_orden_de_contenido").fadeIn(0);
					updateMostrarListado('eventos');
					break;
				case "4": // video
					$(allElements).fadeOut(0); 
					$("#Show_x_mostrar_filtro, #Show_x_mostrar_listado, #Show_x_orden_de_contenido, #Show_x_agrupar,#Show_x_agrupar_id_categoria_tipo, #Show_x_id_secciones_agrupar_tipo_contenido").fadeIn(0);
					updateMostrarListado('video');
					break;				
				case "5": // enlaces
					$(allElements).fadeOut(0); 
					$("#Show_x_url_externa,#Show_x_destino").fadeIn(0); 
					break;
				case "6": // descargas
					$(allElements).fadeOut(0); 
					$("#Show_x_mostrar_filtro, #Show_x_mostrar_listado, #Show_x_orden_de_contenido, #Show_x_agrupar,#Show_x_agrupar_id_categoria_tipo, #Show_x_id_secciones_agrupar_tipo_contenido").fadeIn(0);
					updateMostrarListado('descargas');
					break;
				case "7": // novedades
					$(allElements).fadeOut(0); 
					$("#Show_x_columnas, #Show_x_mostrar_filtro, #Show_x_mostrar_listado, #Show_x_orden_de_contenido").fadeIn(0);
					break;
				case "8": // calendario
					$(allElements).fadeOut(0); 
					$("#Show_x_mostrar_filtro").fadeIn(0);
					break;
				case "9": // wysiwyg
					$(allElements).fadeOut(0); 
					$("#Show_x_contenido_enriquecido").fadeIn(0);
					break;	
				case "10": // promociones
					$(allElements).fadeOut(0); 
					$("#Show_x_mostrar_filtro, #Show_x_orden_de_contenido").fadeIn(0);
			
					break;	
				case "11": // POP
					$(allElements).fadeOut(0); 
					$("#Show_x_mostrar_filtro, #Show_x_orden_de_contenido").fadeIn(0);
			
					break;			
			}
		}
		
		
		
		function updateMostrarListado(template) {
			var a_edit = $("input[name='a_edit']").val();
		
				switch (template) {
					case "fotovideo":
						var newOptions = {"categoria":"Categoría","titulo":"Título","descripcion":"Descripción", "fecha":"Fecha"};
					break;
					case "eventos":
						var newOptions = {"titulo":"Título","fecha":"Fecha y hora","ubicacion":"Ubicación"};
					break;
					case "descargas":
						var newOptions = {"fecha":"Fecha publicación","tipo_contenido":"Tipos de contenido","formato":"Formato de archivo","peso":"Peso de archivo"};
					break;
					case "video":
						var newOptions = {"categoria":"Categoría", "titulo":"Título","descripcion":"Descripción"};
					break;
						
				}
			
				var $el = $("#x_mostrar_listado");
				if (a_edit == "U") {
					var curvalues_array= $el.val();
					console.log(curvalues_array);
					// var curvalues_array = curvalues.split(","); 
				}
				$el.empty(); // remove old options
				$.each(newOptions, function(key,value) {
				  if (a_edit == "A") {
				 	 $el.append($("<option></option>").attr("value", key).attr("selected", true).text(value));
				  } else if (a_edit == "U") {
					  if (in_array(key, curvalues_array)) {
						   $el.append($("<option></option>").attr("value", key).attr("selected", true).text(value));
					  }else {
						   $el.append($("<option></option>").attr("value", key).attr("selected", false).text(value));
					  }
					  
				  }
				});
				$("#x_mostrar_listado").removeClass("chzn-done");
				$("#x_mostrar_listado_chzn").remove();
				// $el.chosen('destroy');  
				$el.chosen();
			
		}
		toggleElementTemplate($('form#seccionesedit input[type=radio][name=x_id_template]:checked').val());
		toggleElementTipo($('form#seccionesedit input[type=radio][name=x_tipo]:checked').val());
		toggleElementOrdenContenido($('form#seccionesedit input[type=radio][name=x_orden_de_contenido]:checked').val());
	}
	

	
	
// END :  MYHD
	
	


	function SEOCode(cadena){
		var texto='';
		
		texto = cadena.toLowerCase();
		texto=texto.replace(/[™]/gi,'');
		texto=texto.replace(/(À|Á|Â|Ã|Ä|Å|Æ)/gi,'a');
		texto=texto.replace(/(È|É|Ê|Ë)/gi,'e'); 
		texto=texto.replace(/(Ì|Í|Î|Ï)/gi,'i');
		texto=texto.replace(/(Ò|Ó|Ô|Ö|õ)/gi,'o');
		texto=texto.replace(/(Ù|Ú|Û|Ü)/gi,'u');
		texto=texto.replace(/(Ñ)/gi,'n'); 
		texto=texto.replace(/( )/gi,'-');
		texto=texto.replace(/(©|®|!|¡|´|,|%|“|”|™)/gi,'');
		texto=texto.replace(/(ç)/gi,'c');
		texto=texto.replace(/[?]+/,'');
		texto=texto.replace(/[¿]+/,'');
		texto=texto.replace(/[(<sup>)]+/,'');
		texto=texto.replace(/<\/sup>/gi,''); 
		texto=texto.replace("™",''); 
		
		var a = texto;
		var b = a.replace(/[^a-z0-9\-_]/gi,'');
		return (((b)));
	}
	
	

	
	/*
	Uso General
	*/
	$(".btn-alerta-obligatorio").on('click', function() {
		congelarPantalla();
	});
	
	
	$("#btn_notificaciones").on('click', function() {
		var info = [];
		var count = 0;
		$("#header_notification_bar ul.dropdown-menu-v2 li.noleidas").each(function(index, element) {
            info[count] = $(this).data("id");
			count++;
        });
		marcar_notificaciones_leidas(info);
	});
	
	$("select.select_filter").on('change', function() {
		var url      = getAbsolutePath();
		var name = $(this).attr("name");
		window.location.href=(url+name+"="+$(this).val());	
	});
	
	
	$("select.select_filtercat").on('change', function() {
		var url      = $(this).data("urlbase");
		var name = $(this).attr("name");
		window.location.href=(url+"?"+name+"="+$(this).val());	
	});
	
	
	// Fix fecha
	$("input.date-picker").each(function(index, element) {
        var valor = $(this).val();
		var clean = valor.replace("-","").replace(" 00:00:00.000","").replace("-","");
		$(this).val(clean);
    });
	
	// Password
	if ($("i.pswd-msg").length) {
		var a_edit = $("input[name='a_edit']").val();
		if (a_edit == "U") {
			$("i.pswd-msg").html("Dejar en blanco para mantener clave actual");
		} else {
			$("input.pswd-input1").prop('required',true);
			$("input.pswd-input2").prop('required',true);
		}
		$("input.pswd-input1").on('keyup', function(){
			if ($(this).val() != "") {
				$(this).prop('required',true);
				$("input.pswd-input2").prop('required',true);
			} else {
				$(this).prop('required',false);	
				$("input.pswd-input2").prop('required',false);
			}
		});
		$("input.pswd-input2").on('keyup', function(){
			var valor2 = $(this).val();
			var valor1 = $("input.pswd-input1").val();
			if (valor2 != valor1) {
				$("i.pswd-msg").html("Claves no coinciden");
				$("i.pswd-msg").css('color','red');
				$("form.editform").submit(function(e){
					return false;
				})
			} else {
				$("i.pswd-msg").html("Claves ingresadas correctamente");
				$("i.pswd-msg").css('color','green');
				
				setTimeout(function () {$("i.pswd-msg").html("");},5000);
				$("form.editform").submit(function(e){
					return true;
				})
			}
		});
	}
	
	
});
function marcar_notificaciones_leidas(info) {
	
	$.ajax({
		   type: "POST",  
		   data: {ids:info},
		      url: "/ajax_actualizar_alertas_leidas",
		   success: function(msg){
			 $("#btn_notificaciones span.badge").html("0");
			 setTimeout(function () {$("#header_notification_bar ul.dropdown-menu-v2 li.noleidas").removeClass("noleidas")},5000);
		   }
		});
}

function marcar_alertas_leidas(info) {
	
	$.ajax({
		   type: "POST",  
		   data: {ids:info},
		      url: "/ajax_actualizar_alertas_leidas",
		   success: function(msg){
			
		   }
		});
}
function comprobar_usuario(mode,a_edit,usuario,id,campoid) {
		var postForm = { 
			'mode' : mode,
			'a_edit' : a_edit,
			'usuario' : usuario,
			'id':id
		};
		$("#"+campoid+"_msg").html("comprobando usuario");
		$.ajax({
			url: "/ajax_consulta_user_disponible",
			type: "post",
			data: postForm ,
			success: function (response) {
				var respuesta = response.split("*");
				if (respuesta[0]=="OK") {
					$("#"+campoid+"_msg").html('Usuario OK');
					$("#validate_user").val("ok");
					setTimeout(function () {$("#"+campoid+"_msg").html('');},3000);
					
					
				}else if(respuesta[0]=="EXISTE") {
					$("#"+campoid).val('');
					$("#"+campoid).focus();
					$("#"+campoid+"_msg").html(respuesta[1]);
					$("#"+campoid).select();
					$("#validate_user").val("");
					setTimeout(function () {$("#"+campoid+"_msg").html('');},5000);
				} else if (respuesta[0]=="ERROR") {
					$("#"+campoid).focus();
					$("#"+campoid+"_msg").html(respuesta[1]);
					$("#validate_user").val("");
					setTimeout(function () {$("#"+campoid+"_msg").html('');},5000);
				}			
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
		});
		
}
	


function getAbsolutePath() {
	var string = window.location.href, substring = "?";	var sufix = '';
	if (string.indexOf(substring) !== -1) 	sufix = "&"; else 	sufix = "?";
	var cur_url = window.location.href;
	var final_url = cur_url.replace(/start-[0-9]+/, "start-1");
	// alert(final_url);
	return final_url+''+sufix; // location.protocol + '//' + location.host + location.pathname + sufix;
}

function nombreArchivo(cadena){
	var texto=cadena;
	if (texto) {
		texto=texto.replace(/[+]/gi,' ');
		texto=texto.replace(/(-)/gi,' ');
		texto=texto.replace(/(_)/gi,' ');
		
		
		var a = texto;
		var b = a.replace(/[^a-zA-Z0-9\- _.]/gi,'');
		b = b.substring(0, b.length - 4)
		return b.charAt(0).toUpperCase() + b.slice(1);
	} else {
		return false;
	}
}

function in_array(needle, haystack) {
	if (haystack != null){
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
	}
    return false;
}
function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // IE specific code path to prevent textarea being shown while dialog is visible.
        return clipboardData.setData("Text", text); 

    } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        } catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        } finally {
            document.body.removeChild(textarea);
        }
    }
}
