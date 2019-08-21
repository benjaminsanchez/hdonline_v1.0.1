<?php if (@$sExport != ""): ?>

</body>
</html>
<?php else: ?>

<!-- BEGIN FOOTER -->

<div class="footer-hd text-center font-grey-cascade"> <?php echo @$config_localizacion->texto_footer; ?> </div>
<!-- END FOOTER -->
</div>
</div>
<!-- END CONTAINER --> 
<!-- BEGIN QUICK SIDEBAR --> 
<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a> 

<!-- END QUICK SIDEBAR --> 

<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]--> 

<!-- BEGIN CORE PLUGINS --> 
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script> 
</script> 
<!-- END PAGE LEVEL PLUGINS --> 

<!-- start datepicker --> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> 

<!-- end date picker--> 
<!-- BEGIN THEME GLOBAL SCRIPTS --> 
<script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script> 
<!-- END THEME GLOBAL SCRIPTS --> 

<script src="<?php echo base_url(); ?>assets/custom/js/components-date-time-pickers.min.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 

<!-- BEGIN THEME LAYOUT SCRIPTS --> 
<script src="<?php echo base_url(); ?>assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script> 
<!-- END THEME LAYOUT SCRIPTS --> 

<!--DOCS --> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/slick/slick.min.js"></script> 

<!-- END DOCS --> 

<!-- MODALS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/custom/js/ui-extended-modals.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 
<!-- END PAGE LEVEL PLUGINS --> 

<!-- ADICIONALES --> 
<script src="<?php echo base_url(); ?>assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script> 

<!-- noticias --> 
<script src="<?php echo base_url(); ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/custom/js/validate.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 
<!-- ADICIONALES --> 
<script language="javascript">
$(document).ready(function(e) {
	$(".fadeInOnReady").slideDown("slow");
		
	
});
		
		</script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/fancybox/source/jquery.fancybox.pack.js"></script> 
<!-- chosen --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/chosen/chosen.jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/chosen/chosen.css"/>
<!-- end chosen --> 
<script src="<?php echo base_url(); ?>assets/custom/js/sidebar.custom.js"></script> 
<script language="javascript">
$(document).ready(function(e) {

	$('.make-switch.dashboard').on('switchChange.bootstrapSwitch', function () {
		var estado_orig = $(this).bootstrapSwitch('state');
		var id_seccion = $(this).data("id_seccion"); 
		//alert($(this).bootstrapSwitch('state')+id_seccion);
		if (estado_orig) {			
			var estado = 1;
		} else {
			var estado = 0; 
		}
		 
		var oData = "estado="+estado+"&id_seccion="+id_seccion;
		$.ajax({
			data: oData,
			type: 'POST',
			url: '<?php echo base_url(); ?>ajax_actualizar_estado_bloque_dashboard',
			success: function(msg) {
				console.log(msg);
				//location.reload();
				// alert(msg);
			}
		});		
	});
	
<?php 
if ($alertas):  
	foreach ($alertas as $alerta): ?>
		$('#alerta-<?php echo $alerta->id_alerta_enviada; ?>').modal({
			<?php if ($alerta->tipo == "obligatorio"): ?>
			backdrop: 'static',
			keyboard: false
			<?php endif; ?>
		});
		<?php if ($alerta->tipo == "obligatorio"): ?>
		$('#alerta-<?php echo $alerta->id_alerta_enviada; ?> a.btn-alerta-obligatorio').on('click', function(event) {
			event.preventDefault();
			var varhref = $(this).attr("href");
			var info = ["<?php echo $alerta->id_alerta_enviada; ?>"];
			$.ajax({
			   type: "POST", data: {ids:info},  url: "/ajax_actualizar_alertas_leidas",
			   success: function(msg){window.location.href=varhref;   }
			});
		});
		<?php else: ?>
		var info = ["<?php echo $alerta->id_alerta_enviada; ?>"];
		marcar_alertas_leidas(info);
		<?php endif; ?>

<?php	endforeach; 
endif; 
 ?>

});

</script> 
<script type="text/javascript" src="//maps.google.com/maps/api/js?language=es&amp;key=<?php echo $GMAPKEY; ?>"></script> 
<!-- END PAGE LEVEL SCRIPTS --> 
<script>
var $_returnvalue = false;
function updateImage(currentArray, currentIndex, currentOpts) {

	
}
jQuery(function ($) {
	$(".chzn-select").chosen(); 
	$(".chosen-categorias-sidebar").chosen();
	$(".chosen-categorias-sidebar").chosen().change(function(){
		var id = $(this).val();
		var name = $(this).attr('name');
		actualizarCategorias(name,id);
	
	});
	
	$(".chosen-permisos-sidebar").chosen();
});



jQuery(document).ready(function() {
	$("a.btn_accion_ajax").on('click', function() {
		var id = $(this).data("id"); 
		var key = $(this).data("key"); 
		var table = $(this).data("table"); 
		var accion = $(this).data("accion");
		var nombre_accion = $(this).data("nombre_accion"); 
			var oData = "table="+table+"&id="+id+"&accion="+accion+"&key="+key;
		if (confirm("¿Confirma que desea "+nombre_accion+" este registro?")) {
			$.ajax({
				data: oData,
				type: 'POST',
				url: '<?php echo base_url(); ?>ajax_actualizar_estado',
				success: function(msg) {
					console.log(msg);
					location.reload();
					// alert(msg);
				}
			});
		}
	
   });
   
   $("a.btn_borrador").on('click', function() {
		var id_biblioteca = $(this).data("id"); 
		if (confirm("¿Confirma que desea eliminar este archivo?")) {
			document.location.href='<?php echo base_url(); ?>biblioteca/delete/'+id_biblioteca;
		}
   });
			
	
	
	
	$('.iframe-btn').fancybox({
			'width': 880,
			'height': 570,
			'type': 'iframe',
			fitToView: false,
			autoSize: false,
			beforeClose : function (currentArray, currentIndex, currentOpts) {
					updateImage(currentArray, currentIndex, currentOpts);
        	}
	});
	
	$('.crop-btn').fancybox({
			'width': 1260,
			'height': 600,
			'type': 'iframe',
			fitToView: false,
			autoSize: false,  
			beforeClose : function (currentArray, currentIndex, currentOpts) {
 
      			 var imagen = $(".fancybox-iframe").contents().find('input[name=imagen]');
				 var origen = $(".fancybox-iframe").contents().find('input[name=origen]');
				 $("#"+origen.val()).val(imagen.val());
   			//	 alert("hola"+imagen.val());
        	}
	});
	
	$("button.cleanFilter").click(function(e){
		e.preventDefault();
		$("#filterform").trigger("reset");
		$("#filterform").find('input:text, input:password, input:file, select, textarea, input:radio').val('');
		$("#filterform").submit();
		return false;
	}); 

	
	$('.preview-modo').fancybox({
		'type': 'iframe',
		fitToView: true,
		autoSize: true
	});
	//
	// Handles message from ResponsiveFilemanager
	// sortable begin
	
	$('.sortbody').sortable({
		cursor: 'pointer',
		axis: 'y',
		handle: ".handle",
		items: "tbody.itemsort:not(.disable-sort)",
		stop: function(event, ui) {
				var data = $(this).sortable('toArray');
				var recperpage = 1000; //$("select[name=RecPerPage]").val();
				var pageno = 1;// $("input[name=pageno]").val();
				var table = '<?php echo @$ffile; ?>';
				var fieldkey = $("input[name=fieldkey]").val();
				var oData = "table="+table+"&newsort="+data+"&recperpage="+recperpage+"&fieldkey="+fieldkey+"&pageno="+pageno;
				//alert(oData);
				$.ajax({
					data: oData,
					type: 'POST',
					url: 'sort_table',
					success: function(msg) {
						location.reload();
						// alert(msg);
					}
				});
			}
	
	});
	$('.sortbodysub').sortable({
		cursor: 'pointer',
		axis: 'y',
		handle: ".handlesub",
		stop: function(event, ui) {
				var data = $(this).sortable('toArray');
				var recperpage = $("select[name=RecPerPage]").val();
				var pageno = $("input[name=pageno]").val();
				var table = '<?php echo @$ffile; ?>';
				var fieldkey = $("input[name=fieldkey]").val();
				var oData = "table="+table+"&newsort="+data+"&recperpage="+recperpage+"&fieldkey="+fieldkey+"&pageno="+pageno;
				//alert(oData);
				$.ajax({
					data: oData,
					type: 'POST',
					url: 'sort_table',
					success: function(msg) {
						// alert(msg);
					}
				});
			}
	
	});
	$('.sort').sortable({
		cursor: 'move',
		axis: 'y',
		
		items: "tr:not(.sub-level)",
		stop: function(event, ui) {
				var data = $(this).sortable('toArray');
				var recperpage = $("select[name=RecPerPage]").val();
				var pageno = $("input[name=pageno]").val();
				var table = '<?php echo @$ffile; ?>';
				var fieldkey = $("input[name=fieldkey]").val();
				var oData = "table="+table+"&newsort="+data+"&recperpage="+recperpage+"&fieldkey="+fieldkey+"&pageno="+pageno;
				//alert(oData);
				$.ajax({
					data: oData,
					type: 'POST',
					url: 'sort_table',
					success: function(msg) {
						// alert(msg);
					}
				});
			}
			/*
			update: function(e, ui) {
				var data = $(this).sortable('serialize');
				href = '/common_ajax.php';
				$(this).sortable("refresh");
				alert(data);
				/*
				$.ajax({
					type:   'POST',
					url:    href,
					data:   sorted,
					success: function(msg) {
						//do something with the sorted data
					}
				});
			}
			*/
	});
});

function getFileExtension1(filename) {
  return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
}

function ShowPreviewBiblioteca(selected_items, field, type) {
	$('#ShowPreview'+field).html('');
	var extension = ''; 
	$.ajax({ 
		type: 'POST', 
		url: '<?php echo base_url(); ?>biblioteca/ajax_query', 
		data: { 'selected_items': selected_items,
				'field': field
		}, 
		dataType: 'json',
		success: function (data) { 
			$.each(data, function(idx, obj) {
				if (obj !== null) {
					extension = getFileExtension1(obj.archivo_nombre);
					if (type == "images") {
						var img = $('<div class="wrap"><img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/0x200-1/biblioteca/'+obj.archivo_nombre+'" alt="'+obj.nombre+'" /><span class="cerrar fa fa-close" data-id_biblioteca="'+obj.id_biblioteca+'" data-field="'+field+'"><span></div>');
						img.appendTo($('#ShowPreview'+field));
					} else if (type == "images_videos") {
						if (extension == "mp4" || extension == "mov") {
							// controlsList="nodownload" 
							var video = $('<div class="wrap"><video controls width="320" style="margin: 0px 0px; width: 320px; height: 180px;    float: left;float: left;"><source src="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/'+obj.archivo_nombre+'" type="video/mp4; codecs="avc1.42E01E, mp4a.40.2"></source></video><span class="cerrar fa fa-close" data-id_biblioteca="'+obj.id_biblioteca+'" data-field="'+field+'"><span></div>');
							video.appendTo($('#ShowPreview'+field));
						} else {
							var img = $('<div class="wrap"><img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/0x200-1/biblioteca/'+obj.archivo_nombre+'" alt="'+obj.nombre+'" /><span class="cerrar fa fa-close" data-id_biblioteca="'+obj.id_biblioteca+'" data-field="'+field+'"><span></div>');
							img.appendTo($('#ShowPreview'+field));
						}
					} else if (type == "archivos") {
						var archivo = $('<div class="wrap archivos">'+obj.archivo_nombre+'<span class="cerrar fa fa-close" data-id_biblioteca="'+obj.id_biblioteca+'" data-field="'+field+'"><span> </div>');
						archivo.appendTo($('#ShowPreview'+field));
						
					} else if (type == "todos") {
						var archivo = $('<div class="wrap archivos">'+obj.archivo_nombre+'<span class="cerrar fa fa-close" data-id_biblioteca="'+obj.id_biblioteca+'" data-field="'+field+'" style="margin-left:0px"><span> </div>');
						archivo.appendTo($('#ShowPreview'+field));
						
					}
				}
				activarEventosPreview();
			});
		}
	});
}

function activarEventosPreview() {
	$(".wrap .cerrar").on('click', function() {
		var id_biblioteca = $(this).data("id_biblioteca");
		var field = $(this).data("field");
		var strtactual = $("#"+field).val();
		var res = strtactual.replace( id_biblioteca+",", "");
		$("#"+field).val(res);
		$(this).closest("div.wrap").remove();
	});
	
}
</script> 
<script src="<?php echo base_url(); ?>assets/custom/js/custom.js?v=<?php echo date("Hmis"); ?>"></script> 
<script src="<?php echo base_url(); ?>assets/global/plugins/ckeditor/ckeditor.js"></script> 
<script>
<?php echo @$js_acumulado; ?>
</script>
</body></html><?php endif; ?>