<!DOCTYPE html>
<html>
<head>
<title>Biblioteca</title>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/custom/js/components-date-time-pickers.min.js?v=<?php echo date("Ymhi"); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom/css/biblioteca.css?v=<?php echo date("Ymhi"); ?>">
<style>
.btn.blue:not(.btn-outline), .btn-primary, .btn-info {
 background-color:<?php echo $hexcolor;
?>;
 border-color: <?php echo $darkcolor;
?>;
}
.btn.blue:not(.btn-outline):active:hover, .btn.blue:not(.btn-outline):hover, .btn-primary:active:hover, .btn-info:hover {
 background-color:<?php echo $darkcolor;
?>;
 border-color: <?php echo ($hexcolor);
?>;
}
.page-content-row .page-sidebar .navbar-nav>li>a:hover {
 background:<?php echo $darkcolor;
?>;
}
.page-header .navbar .navbar-nav>li:hover>a, .page-content-row .page-sidebar .navbar-nav li.active>a, .bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-success, .page-header .navbar .topbar-actions .btn-group-notification .btn {
 background:<?php echo $hexcolor;
?>;
}
.page-header .navbar .navbar-nav>li:hover>a, .page-header .navbar .navbar-nav li.selected>a, .page-header .navbar .navbar-nav li.selected>a {
border-color:<?php echo $hexcolor;
?>;
}
.page-header .navbar .navbar-nav>li.selected:hover>a {
border-color:<?php echo $darkcolor;
?>;
}
.btn.blue-hoki:not(.btn-outline), .btn.blue-hoki:not(.btn-outline):active:hover, .btn.blue-hoki:not(.btn-outline):hover, .btn.btn-outline.blue-hoki.active, .btn.btn-outline.blue-hoki:active, .btn.btn-outline.blue-hoki:active:focus, .btn.btn-outline.blue-hoki:active:hover, .btn.btn-outline.blue-hoki:focus, .btn.btn-outline.blue-hoki:hover, .btn.btn-outline.blue.active, .btn.btn-outline.blue:active, .btn.btn-outline.blue:active:focus, .btn.btn-outline.blue:active:hover, .btn.btn-outline.blue:focus, .btn.btn-outline.blue:hover {
 background-color: <?php echo $extradarkcolor;
?>;
 border-color: <?php echo $extradarkcolor;
?>;
}
.page-header .navbar .topbar-actions .btn-group-img .btn>span, .breadcrumbs .breadcrumb li.active, .dropdown-menu-v2>li>a:hover, .breadcrumbs .breadcrumb>li>a:hover {
color:<?php echo $lightcolor;
?>
}
.btn.btn-outline.blue-hoki {
border-color:<?php echo $extradarkcolor;
?>;
color:<?php echo $extradarkcolor;
?>;
}
a {
color:<?php echo $lightcolor;
?>;
}
.daterangepicker .ranges li.active, .daterangepicker .ranges li:hover {
 background:<?php echo $hexcolor;
?>!important;
 border: 1px solid <?php echo $hexcolor;
?>!important;
}
.note.note-mantener_arriba, .tabbable-line>.nav-tabs>li:hover {
border-color:<?php echo $extralightcolor;
?>
}
.tabbable-line>.nav-tabs>li.active {
border-color:<?php echo $hexcolor;
?>;
}
.font-blue {
color:<?php echo $hexcolor;
?> !important;
}
.bg-blue-opacity {
background:<?php echo $extralightcolor;
?>D9 !important
} /* https://gist.github.com/lopspower/03fb1cc0ac9f32ef38f4 */
.font-blue-sharp {
color:<?php echo $lightcolor;
?> !important;
}
.program-status .bar .fullbar {
background:<?php echo $extralightcolor;
?>;
}
.program-meta, .daterangepicker .ranges li {
color:<?php echo $hexcolor;
?>;
}
.btn.btn-outline.blue:hover, .btn.btn-outline.blue:active, button.biblioteca:hover {
background-color:<?php echo $lightcolor;
?>;
}
.btn.btn-outline.blue, .btn.btn-outline.blue:active {
border-color: <?php echo $hexcolor;
?>;
color: <?php echo $hexcolor;
?>;
}
.btn.btn-outline.blue:hover {
border-color: <?php echo $hexcolor;
?>;
}
 #style-1::-webkit-scrollbar-thumb {
 background-color:  <?php echo $hexcolor;
?>;
}
-webkit-box-shadow {
inset 0 0 6px background:<?php echo $extralightcolor;
?>D9 !important;
}
#style-1::-webkit-scrollbar-track {
 -webkit-box-shadow: inset 0 0 6px <?php echo $extralightcolor;
?>D9 !important;
 border-radius: 10px;
 background-color: #FFF;
}
</style>
<script>
$(function() {
	$(".fadeInOnReady").slideDown("fast");
	$('form#filtro select').on('change', function(){
		var selected = $(this).find("option:selected").val();
		switch ($(this).attr("name")) {
			case "cat_1": $("select[name=cat_2],select[name=cat_3],select[name=cat_4]").val(""); break;
			case "cat_2": $("select[name=cat_3],select[name=cat_4]").val(""); break;
			case "cat_3":  $("select[name=cat_4]").val(""); break;
			
			
		}
		
		$('form#filtro').submit();
	});
		
	$('#rangebiblioteca').on('apply.daterangepicker', function(ev, picker) {
	  //do something, like clearing an input
	    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
	 $('form#filtro').submit();
	});
	
	
  $('#rangebiblioteca').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });
	
	$("#seleccionar_archivo").on('click', function() {
		<?php if ($mode == "select_multiple"):  ?>
		
		var selected_items = parent.$('input[name="<?php echo @$field; ?>"]').val();
		<?php else: ?>
		var selected_items = '';
		
		<?php endif; ?>
			
		
		$('input[name="check"]:checked').each(function(index, element) {
			selected_items = selected_items+$(this).val()+","; 	
		});
		
		if (window.localStorage) {		
			localStorage.setItem("biblioteca_field", '<?php echo $field; ?>');
			localStorage.setItem("biblioteca_select", selected_items);
		} else {
			throw new Error('Tu Browser no soporta LocalStorage!');
		}
		
		
		parent.$('input[name="<?php echo @$field; ?>"]').val(selected_items);
		parent.$('#ajax-modal').modal('hide');
		parent.ShowPreviewBiblioteca(selected_items,'<?php echo @$field; ?>','<?php echo @$type; ?>');
	});
	
	
	$("#btn_editar_lote").on('click', function() {
		var selected_items = '';
		$('input[name="check"]:checked').each(function(index, element) {
			selected_items = selected_items+$(this).val()+","; 	
		});
		if (selected_items != "") {
			window.location.href='<?php echo base_url(); ?>biblioteca/edit/'+selected_items;
		} else {
			alert("Debe seleccionar registros");	
		}
	});
	
	$("#btn_enviar_arriba_lote").on('click', function() {
		var selected_items = '';
		$('input[name="check"]:checked').each(function(index, element) {
			selected_items = selected_items+$(this).val()+","; 	
		});
		if (selected_items != "") {
			window.location.href='<?php echo base_url(); ?>biblioteca/enviar_arriba_multiple/'+selected_items;
		} else {
			alert("Debe seleccionar registros");	
		}
	});
	
	$("#btn_eliminar_lote").on('click', function() {
		var selected_items = '';
		var countdel = 0;
		$('input[name="check"]:checked').each(function(index, element) {
			selected_items = selected_items+$(this).val()+",";
			countdel++; 	
		});
		if (selected_items != "") {
			if (confirm("Usted está borrando "+countdel+" archivos, ¿está seguro que desea eliminarlos?")){
				window.location.href='<?php echo base_url(); ?>biblioteca/delete_multiple/'+selected_items;
			}
		} else {
			alert("Debe seleccionar registros");	
		}
	});
	
	$("#btn_quitar_vigencia_lote").on('click', function() {
		var selected_items = '';
		$('input[name="check"]:checked').each(function(index, element) {
			selected_items = selected_items+$(this).val()+","; 	
		});
		if (selected_items != "") {
			window.location.href='<?php echo base_url(); ?>biblioteca/quitar_vigencia_multiple/'+selected_items;
		} else {
			alert("Debe seleccionar registros");	
		}
	});

	
	// Preview
	//$("#archivo-"+countfiles+" a.preview").data("archivo",archivo.file_name);
	$("a.preview").on('click',function() {
		//var archivo = $(this).data("archivo");
		$("#stack1 .modal-body iframe").fadeOut();
		var filename = $(this).data("filename")
		var client_name = $(this).data("client_name");
		$("#stack1 .modal-body iframe").attr('src','<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/'+filename);
		$("#stack1").modal('show');	
		$("#stack1 h4.modal-title").html(client_name);
		setTimeout(function() {$("#stack1 .modal-body iframe").fadeIn("fast")},1000);
			
	});
	
	
	$("#btn_deseleccionar_lote").on('click',function() {
		$('input[name="check"]:checked').each(function(index, element) {
			$(this).removeAttr("checked");
		});
	});
	
	$("#btn_seleccionar_lote").on('click',function() {
		$('input[name="check"]').each(function(index, element) {
			$(this).prop("checked", true);
		});
	});
	
	$("a.btn_copiar_portapapeles").on('click', function() {
		var enlace = $(this).data("enlace"); 
		if (copyToClipboard(enlace)){
			alert("Enlace copiado al portapapeles");
		}
	});
	
   $("a.btn_quitar_vigencia").on('click', function() {
		var id_biblioteca = $(this).data("id"); 
		if (confirm("¿Confirma que desea quitar la vigencia de este archivo?")) {
			document.location.href='<?php echo base_url(); ?>biblioteca/quitar_vigencia/'+id_biblioteca;
		}
   });
   
	
   $("a.btn_enviar_arriba").on('click', function() {
		var id_biblioteca = $(this).data("id"); 
		if (confirm("¿Confirma que desea mantener arriba del listado este archivo?")) {
			document.location.href='<?php echo base_url(); ?>biblioteca/enviar_arriba/'+id_biblioteca;
		}
   });
   
   $("a.btn_eliminar").on('click', function() {
		var id_biblioteca = $(this).data("id"); 
		if (confirm("¿Confirma que desea eliminar este archivo?")) {
			document.location.href='<?php echo base_url(); ?>biblioteca/delete/'+id_biblioteca;
		}
   });
		
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
  <?php if (@$cannot_delete->archivo_nombre != ""): ?>
  <?php if (count(@$contador)>0): ?>
  <?php 
  		$det = '';
		$counter=0;
  		foreach ($contador as $key=>$val): 
  			if (intval($val)>0): 
				$counter++;
				if ($counter>1) $det.=" - ";
				$det.= $key."(".$val.")"; 	
			endif;
  		endforeach; ?>
<?php endif; ?>
$(document).ready(function(e) {
    alert("No es posible eliminar el archivo <?php echo $cannot_delete->archivo_nombre; ?>, mientras esté asociado a contenidos: <?php echo $det; ?>");
});
  
  <?php endif; ?>
});
</script>
</head>
<body class="biblioteca list">
<!-- modal preview -->
<div id="stack1" class="modal fade" tabindex="-1" data-width="400">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title"> </h4>
      </div>
      <div class="modal-body">
        <iframe src="" width="100%" height="330" scrolling="auto"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn blue btn-outline">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal preview -->
<div class="row">
  <div class="col-md-12"> 
    <!-- Begin: life time stats -->
    <div class="portlet light">
      <div class="portlet-body"> 
        <!-- END PAGE SIDEBAR --> 
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
          <div class="col-md-12"> 
            <!-- Start filters --> 
            
            <!-- BEGIN FORM-->
            <form action="<?php echo base_url(); ?>biblioteca/list" id="filtro" class="form-horizontal form-row-seperated" method="get">
              <div class="row">
                <div class="col-md-5">
                  <?php // if (@$mode ==""): ?>
                  <a href="<?php echo base_url(); ?>biblioteca/upload<?php echo (@$mode !="")?"?mode=".$mode:""; ?>" class="btn btn-sm blue text-right"> SUBIR ARCHIVOS <i class="fa fa-cloud-upload"></i> </a>
                  <?php //  endif; ?>
                </div>
                <div class="col-md-5">
                  <div class="input-group">
                    <input type="text" class="form-control bg-grey-steel" name="nombre_tag" placeholder="Buscar por título de archivo o etiqueta..." value="<?php echo @$f_nombre_tag; ?>">
                    <span class="input-group-btn">
                    <button class="btn blue-hoki uppercase bold" type="submit"><i class="fa fa-search"></i></button>
                    </span> </div>
                </div>
                <div class="col-md-2 pull-right text-right"><a href="<?php echo base_url(); ?>biblioteca/list?cmd=reset" class="btn btn-xs blue-hoki btn-outline"><i class="fa fa-refresh"></i> &nbsp; Reestablecer filtros</a></div>
              </div>
              <div class="row margin-bottom-5 margin-top-10 fadeInOnReady">
                <div class="col-md-3">
                  <div class="input-group">
                    <input type="text" class="form-control bg-grey-steel" id="rangebiblioteca" name="fechas" placeholder="Fechas de publicación" autocomplete="off" value="<?php echo @$f_fechas; ?>" onKeyDown="return false" onKeyUp="return false" >
                    <span class="input-group-btn">
                    <button class="btn blue-hoki uppercase bold" type="button"><i class="fa fa-calendar"></i></button>
                    </span> </div>
                </div>
                <div class="col-md-2 text-right">
                  <select class="bs-select form-control input-small" data-style="grey-steel" name="tipo_contenido">
                    <option value="">Tipo Contenido</option>
                    <?php foreach ($tipos_contenidos as $tc): ?>
                    <option value="<?php echo $tc->id_tipo_contenido; ?>" <?php if ($tc->id_tipo_contenido == @$f_tipo_contenido): ?>selected <?php endif; ?>> <?php echo $tc->nombre; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-7 "> 
                  <!-- inicio nueva integracion -->
                  <?php foreach ($cat as $value=>$display): ?>
                  <?php // echo @$f_cat[$display["nivel"]] ; ?>
					  <?php if (count($f_categoria[$display["nivel"]])>0): ?>
                      <select class="bs-select form-control input-small select_filter" name="cat_<?php echo $display["nivel"]; ?>" data-style="grey-steel"  <?php if ($display["nivel"] != 1 && @$f_cat[$display["nivel"]-1] == "") echo " disabled "; ?>>
                        <option value=""><?php echo $catnivel_nombre[$display["nivel"]]; ?></option>
                        <?php foreach ($f_categoria[$display["nivel"]] as $categoria): ?>
                        <option value="<?php echo $categoria->id_categoria; ?>" <?php if ( @$f_cat[$display["nivel"]] ==  $categoria->id_categoria) echo ' selected'; ?>><?php echo $categoria->nombre; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?php endif; ?>
                  <?php endforeach;	?>
                  <!-- fin nueva integracion -->
                  
                  <?php
				  /*
	foreach ($cat as $value=>$display):

	echo @$f_cat[$display["nivel"]]
	?>
                  <select name="cat_<?php echo $display["nivel"]; ?>"  class="bs-select form-control input-small" data-style="grey-steel" style="height:200px; width:285px"  data-placeholder="<?php echo $display["tipo_nombre"];  ?>" <?php if ($display["nivel"] != 1 && @$f_cat[$display["nivel"]-1] == "") echo " disabled "; ?> >
                    <option value=""><?php echo $display["tipo_nombre"];  ?></option>
                    <?php foreach ($display as $disp): if (@$disp->id_categoria != ""): ?>
                    <option value="<?php echo @$disp->id_categoria; ?>" <?php if (@$disp->id_categoria== @$f_cat[$display["nivel"]]): ?> selected <?php endif; ?>><?php echo ucwords(@$disp->nombre); ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                  <?php
	endforeach;	
	*/
	?>
                </div>
              </div>
            </form>
            
            <!-- end filters --> 
          </div>
        </div>
        <?php if (@count(@$biblioteca)>0): ?>
        <div class="table-container" >
        <table class="table table-striped table-bordered table-hover dataTable no-footer text-center" aria-describedby="datatable_products_info" role="grid" id="biblioteca_table">
          <thead>
            <tr role="row" class="heading">
              <th class="text-center" width="5%"> <?php if (@$mode ==""): ?>
                <div class="input-group">
                  <div class="input-group-btn">
                    <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                    <ul class="dropdown-menu">
                      <li> <a href="javascript:;" id="btn_seleccionar_lote"> Seleccionar todos</a> </li>
                      <li> <a href="javascript:;" id="btn_deseleccionar_lote"> Deseleccionar todos</a> </li>
                      <li class="divider"> </li>
                      <li> <a href="javascript:;" id="btn_editar_lote">Editar</a></li>
                      <li> <a href="javascript:;"  id="btn_enviar_arriba_lote">Enviar arriba del listado </a></li>
                      <li> <a href="javascript:;"  id="btn_quitar_vigencia_lote">Borrador</a></li>
                      <li> <a href="javascript:;"  id="btn_eliminar_lote">Eliminar</a></li>
                    </ul>
                  </div>
                  
                  <!-- /btn-group --> </div>
                
                <!-- /input-group --> 
            </div>
          
          <?php endif; ?>
            </th>
          
          
            <th width="10%" class="text-center">Ver </th>
            <th width="35%">Título Archivo</th>
            <th width="15%" class="text-center">Dimensión </th>
            <th width="10%" class="text-center">Tamaño </th>
            <th width="10%" class="text-center">Publicación </th>
            <th width="10%" class="text-center">Modificación</th>
            <?php if (@$mode ==""): ?>
            <th width="5%" class="text-center">Acción</th>
            <?php endif; ?>
          </tr>
            </thead>
          
        </table>
        <?php endif; ?>
        <?php if (@count(@$biblioteca)>0): ?>
        <div class="table-scrollable" style="height:314px;">
          <div class="scrollbar" id="style-1">
            <table class="table table-striped table-bordered table-hover dataTable no-footer text-center" aria-describedby="datatable_products_info" role="grid" >
              <tbody>
                <?php foreach ($biblioteca as $bib): 
						$vigente = checkVigencia($bib->vigencia_desde,$bib->vigencia_hasta);
						
			  
			  ?>
                <tr role="row" class="odd">
                  <td class="text-center" width="5%"><?php 
				  
				  $type_check = (@$mode == "select")?"radio":"checkbox" ?>
                    <div class="mt-<?php echo $type_check; ?>-list">
                      <label class="mt-<?php echo $type_check; ?>">
                        <input type="<?php echo $type_check; ?>" value="<?php echo $bib->id_biblioteca; ?>" name="check"  />
                        <span></span> </label>
                    </div></td>
                  <td width="10%" class="formato"><a href="#" class="preview" data-filename="<?php echo $bib->archivo_nombre; ?>" data-client_name="<?php echo $bib->archivo_original; ?>"><i class="fa <?php echo icon_file($bib->archivo_extension); ?>"></i></a></td>
                  <td width="35%" class="text-left"><?php if ($vigente): ?>
                    <span class="label label-sm label-default label-box ">Vigente</span>
                    <?php endif; ?>
                    &nbsp; <?php echo $bib->nombre; ?>
                    <p class="small"><?php echo nl2br($bib->comentario); ?></p></td>
                  <td width="15%"><?php if ($bib->archivo_imagen_ancho>0): echo $bib->archivo_imagen_ancho."x".$bib->archivo_imagen_alto."px"; endif; ?></td>
                  <td width="10%"><?php echo peso_archivo($bib->archivo_peso); ?></td>
                  <td width="10%"><?php echo fecha($bib->fecha_subida); ?></td>
                  <td width="10%"><?php echo fecha($bib->fecha_modificacion); ?></td>
                  <?php if (@$mode ==""): ?>
                  <td width="5%"><div class="btn-group">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li> <a href="<?php echo base_url(); ?>biblioteca/edit/<?php echo $bib->id_biblioteca; ?>" class="">Editar</a></li>
                        <?php if ($vigente): ?>
                        <li> <a href="javascript:;" class="btn_quitar_vigencia" data-id="<?php echo $bib->id_biblioteca; ?>">Quitar Vigencia</a></li>
                        <?php endif; ?>
                        <li> <a href="javascript:;" class="btn_enviar_arriba" data-id="<?php echo $bib->id_biblioteca; ?>">Enviar arriba del listado </a></li>
                        <li> <a href="javascript:;" class="btn_eliminar" data-id="<?php echo $bib->id_biblioteca; ?>">Eliminar</a></li>
                        <li> <a href="javascript:void(0)" class="btn_copiar_portapapeles" data-enlace="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $bib->archivo_nombre; ?>">Copiar enlace directo</a></li>
                      </ul>
                    </div></td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="pull-right">
          <?php $this->load->view('templates/pager'); ?>
        </div>
        <div class="pull-left" style="">
          <?php if (@$mode !=""): ?>
          <a href="#" class="btn btn-sm blue text-right" id="seleccionar_archivo"> SELECCIONAR ARCHIVO </a>
          <?php endif; ?>
          <?php else: ?>
          <div class="note note-info note-bordered margin-top-10">
            <p>No hay resultados para los criterios de búsqueda aplicados.</p>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>