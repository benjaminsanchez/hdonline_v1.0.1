<!DOCTYPE html>
<html>
<head>
<title>Biblioteca</title>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- tags -->
<script src="<?php echo base_url(); ?>/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<!-- tags -->
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />
<!-- end tags -->
<!-- chosen -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/chosen/chosen.jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/chosen/chosen.css"/>
<!-- end chosen -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom/js/dropzone/dropzone.min.css">
<script src="<?php echo base_url(); ?>assets/custom/js/dropzone/dropzone.min.js"></script>

<link href="<?php echo base_url(); ?>assets/global/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/global/plugins/jstree/dist/jstree.min.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/custom/js/ui-tree-bibliotecaedit.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 


<script src="<?php echo base_url(); ?>assets/custom/js/custom.js?v=<?php echo date("Ymhi"); ?>"></script>
<link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom/css/biblioteca.css?v=<?php echo date("Ymhi"); ?>">
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- start Datepicker -->
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />


<style>
.label-info {
background-color:<?php echo $hexcolor;
?>
}
.btn.blue-hoki:not(.btn-outline), .btn.blue-hoki:not(.btn-outline):active:hover, .btn.blue-hoki:not(.btn-outline):hover, .btn.btn-outline.blue-hoki.active, .btn.btn-outline.blue-hoki:active, .btn.btn-outline.blue-hoki:active:focus, .btn.btn-outline.blue-hoki:active:hover, .btn.btn-outline.blue-hoki:focus, .btn.btn-outline.blue-hoki:hover, .btn.btn-outline.blue.active, .btn.btn-outline.blue:active, .btn.btn-outline.blue:active:focus, .btn.btn-outline.blue:active:hover, .btn.btn-outline.blue:focus, .btn.btn-outline.blue:hover {
 background-color: <?php echo $extradarkcolor;
?>;
 border-color: <?php echo $extradarkcolor;
?>;
}
.btn.blue:not(.btn-outline), .btn-primary, .btn-info {
 background-color:<?php echo $hexcolor;
?>;
 border-color: <?php echo $darkcolor;
?>;
}
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
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<!-- end datepicker -->
<script type="text/javascript">
$(document).ready(function(e) {
	$(".chzn-select").chosen();    
	$('.date-picker2').datepicker({
		dateFormat: '<?php echo DEFAULT_DATE_FORMAT; ?>',
		orientation: "left",
		autoclose: true
	});
	
    $('.popovers').popover(); 

});

</script>
</head>
<body class="biblioteca">
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
<!-- MultiStep Form -->
<div class="row ShowUpload">
  <div class="scrollbar" id="style-1">
    <div class="col-md-12">
      <form id="msform"   action="<?php echo base_url(); ?>biblioteca/save_edit"  method="post" >
        <input type="hidden" name="ids_biblioteca" id="ids_biblioteca"  value="<?php echo $ids_biblioteca; ?>">
        <!-- fieldsets -->
        
        <fieldset class="configuracion">
          <?php if (count($bibliotecas)>0): ?>
          <?php foreach ($bibliotecas as $bib): ?>
          <!-- Start Archivo Base -->
          <div class="row" id="archivo-<?php echo $bib->id_biblioteca; ?>"          >
            <div class="col-md-1" > </div>
            <div class="col-md-7" >
              <div class="form-group text-left"> <strong>Archivo <?php echo $bib->archivo_original; ?></strong> </div>
              <div class="form-group">
                <input type="text" name="<?php echo $bib->id_biblioteca; ?>_nombre" class="form-control" size="30" placeholder="Nombre" value="<?php echo $bib->nombre; ?>" required style="">
              </div>
              <div class="form-group">
                <input type="text" name="<?php echo $bib->id_biblioteca; ?>_etiquetas" class="form-control etitags" size="30" placeholder="Agregar etiquetas para mejorar búsqueda" value="<?php
				// print_r($bib->etiquetas);
				if (count($bib->etiquetas)>0):
					foreach ($bib->etiquetas as $eti): 
						echo $eti->etiqueta." ";
					endforeach; 
				endif;
                
				
				?>" >
              </div>
              <div class="form-group">
                <textarea cols="35" rows="4" name="<?php echo $bib->id_biblioteca; ?>_comentario"  class="form-control" placeholder="Comentario"><?php echo $bib->comentario; ?></textarea>
              </div>
              <!-- START FECHAS -->
              
              <div class="row text-left accionlote">
                <label class="col-md-3 control-label">Vigencia <i class="fa fa-question-circle popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Establece el rango de fechas que el archivo se mostrará como vigente" data-original-title="Fecha de Vigencia"></i></label>
                <div class="col-md-3">
                  <input type="text" name="<?php echo $bib->id_biblioteca; ?>_vigencia_desde" class="form-control date-picker2" size="30" placeholder="Desde" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>' value="<?php echo ($bib->vigencia_desde != "0000-00-00" && $bib->vigencia_desde != "")?fecha($bib->vigencia_desde):""; ?>" >
                </div>
                <div class="col-md-3">
                  <input type="text" name="<?php echo $bib->id_biblioteca; ?>_vigencia_hasta" class="form-control date-picker2" size="30" placeholder="Hasta" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>' value="<?php echo  ($bib->vigencia_hasta != "0000-00-00" && $bib->vigencia_hasta != "")?fecha($bib->vigencia_hasta):""; ?>" >
                </div>
                <div class="col-md-3">
                  <label class="mt-checkbox mt-checkbox-outline" style="font-size:12px">
                    <input type="checkbox" name="<?php echo $bib->id_biblioteca; ?>_mantener_arriba" <?php if ($bib->mantener_arriba == 1): echo ' checked'; endif; ?>>
                    Mantener arriba en el listado <span></span> </label>
                </div>
              </div>
              <div class="row text-left margin-top-20 accionlote">
                <label class="col-md-3 control-label">Programar <i class="fa fa-question-circle popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Establece el rango de fechas que el archivo estará disponible en el sistema" data-original-title="Fecha de Programación"></i></label>
                <div class="col-md-3">
                  <input type="text" name="<?php echo $bib->id_biblioteca; ?>_programar_desde" class="form-control date-picker2" size="30" placeholder="Desde" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>' value="<?php echo ($bib->programar_desde != "0000-00-00" && $bib->programar_desde != "")?fecha($bib->programar_desde):""; ?>">
                </div>
                <div class="col-md-3">
                  <input type="text" name="<?php echo $bib->id_biblioteca; ?>_programar_hasta" class="form-control date-picker2" size="30" placeholder="Hasta" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>' value="<?php echo ($bib->programar_hasta != "0000-00-00" && $bib->programar_hasta != "")?fecha($bib->programar_hasta):""; ?>">
                </div>
                <div class="col-md-3"> </div>
              </div>
              <!-- END FECHAS --> 
            </div>
            <div class="col-md-3" >
            
            
           <div class="form-group text-left accionlote"> Categorías de contenido </div>
            
             <input type="hidden" name="categoriasv2_<?php echo $bib->id_biblioteca; ?>" id="categoriasv2_<?php echo $bib->id_biblioteca; ?>"> 
      <div class="tree_biblioteca tree-demo" data-id="<?php echo $bib->id_biblioteca; ?>"> <?php echo $esquema_arboledit_html[$bib->id_biblioteca]; ?> </div> 
         
            
          <?php /*
            
            
              <div class="form-group text-left accionlote"> Categorías de contenido </div>
              <?php

	foreach ($cat as $value=>$display):

	
	?>
              <div class="form-group accionlote">
                <select multiple name="<?php echo $bib->id_biblioteca; ?>_cat_<?php echo $display["nivel"]; ?>[]"  class="form-control chosen-postload cat_nivel_<?php echo $display["nivel"]; ?>" style="height:200px; width:285px"  data-placeholder="<?php echo $display["tipo_nombre"];  ?>">
                  <option><!-- Empty option goes here. -->
                  <option>
                  <?php foreach ($display as $disp): if (@$disp->id_categoria != ""): ?>
                  <option value="<?php echo @$disp->id_categoria; ?>" <?php if (@in_array(@$disp->id_categoria,@$bib->categorias)): ?> selected <?php endif; ?>><?php echo ucwords(@$disp->nombre); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                
                </select>
              </div>
              <?php
	endforeach;	
	?>
	
	<?php */ ?>
              <div class="form-group text-left accionlote"> Tipos de contenido </div>
              <div class="form-group accionlote">
                <select multiple name="<?php echo $bib->id_biblioteca; ?>_tipos_contenidos[]" id="<?php echo $bib->id_biblioteca; ?>_tipos_contenidos"  class="form-control chosen-postload" style="height:200px; width:285px"  data-placeholder="Tipos de contenido">
                  <option><!-- Empty option goes here. -->
                  <option>
                  <?php foreach ($tipos_contenidos as $tc): ?>
                  <option value="<?php echo @$tc->id_tipo_contenido; ?>" <?php if (@in_array(@$tc->id_tipo_contenido,@$bib->tipos_contenido)): ?> selected <?php endif; ?>><?php echo ucwords(@$tc->nombre); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-1" > </div>
            <div class="col-md-12 margin-top-20" >
              <hr>
            </div>
          </div>
          <!-- End: Archivo Base -->
          
          <?php
		  endforeach; 
		  endif;
		  ?>
          <div class="row" id="archivo-final"> 
            
            <!-- START FECHAS -->
            
            <div class="col-md-12 margin-top-30 margin-bottom-30" >
              <button type="button" name="previous" value=" Cancelar" class="btn btn-lm btn-outline blue <?php if (!isset($_GET["open"])): ?>previous<?php endif; ?>" onClick="<?php if (isset($_GET["open"])): ?>parent.$('#ajax-modal').modal('hide');<?php else: ?>window.location.href='<?php echo base_url(); ?>biblioteca/list'<?php endif; ?>">Cancelar</button>
              <button type="submit" value=" Guardar" class="btn btn-lm blue">Guardar</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>
<!-- /.MultiStep Form --> 

<!--

  <div class="row">
    <div class="col-md-12">
      <h2>PHP - Multiple Image upload using dropzone.js</h2>
      <form action="upload.php" enctype="multipart/form-data" class="dropzone" id="image-upload">
        <div>
          <h3>Upload Multiple Image By Click On Box</h3>
          <h2> revisar acá http://itsolutionstuff.com/post/php-multiple-file-uploading-dropzone-js-exampleexample.html </h2>
        </div>
      </form>
    </div>
  </div>
  --> 
<script type="text/javascript">


var archivos = [];
var data = [];
var countfiles = 0;

var categorias = [];
<?php
foreach ($cat as $id_categoria_tipo=>$display):?>
	
	categorias[<?php echo $id_categoria_tipo; ?>] = [];
	categorias[<?php echo $id_categoria_tipo; ?>]['nivel'] = '<?php echo $display["nivel"];  ?>';	 
	categorias[<?php echo $id_categoria_tipo; ?>]['tipo_nombre'] = '<?php echo $display["tipo_nombre"];  ?>';	 
<?php foreach ($display as $disp):
			if (@$disp->id_categoria != ""): ?>
				categorias[<?php echo $id_categoria_tipo; ?>][<?php echo @$disp->id_categoria; ?>]=[];
				categorias[<?php echo $id_categoria_tipo; ?>][<?php echo @$disp->id_categoria; ?>]["sub"]= [];
				categorias[<?php echo $id_categoria_tipo; ?>][<?php echo @$disp->id_categoria; ?>]["rel"]= [];
				categorias[<?php echo $id_categoria_tipo; ?>][<?php echo @$disp->id_categoria; ?>]['nombre'] = '<?php echo ucwords(@$disp->nombre); ?>';
			<?php	if (count(@$disp->sub)>0): 
						foreach ($disp->sub as $sub): ?>
						categorias[<?php echo $id_categoria_tipo; ?>][<?php echo @$disp->id_categoria; ?>]['sub'][<?php echo $sub->id_categoria; ?>] = '<?php echo $sub->nombre; ?>'; 
						<?php 
						endforeach; 
					endif; 
					
					if (count(@$disp->rel)>0):?>
					<?php
						$countrel = 0; 
						foreach ($disp->rel as $rel): $countrel++; ?>
						<?php if ($countrel==1): ?>
						 categorias[<?php echo $id_categoria_tipo; ?>][<?php echo @$disp->id_categoria; ?>]["rel"][<?php echo $rel->nivel; ?>] = [];
						<?php endif; ?>
						categorias[<?php echo $id_categoria_tipo; ?>][<?php echo @$disp->id_categoria; ?>]["rel"][<?php echo $rel->nivel; ?>][<?php echo $rel->id_categoria; ?>] = '<?php echo $rel->nombre; ?>'; 
						<?php 
						endforeach; 
					endif; 
			endif; 
			
			
	endforeach; 
endforeach;	
?>
function objToString (obj) {
    var str = '';
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            str += obj[p]+"," ;
        }
    }
    return str;
}
function actualizarCategorias(name,id){
	var id = id+'';
	var array_id = id.split(",");
	var cantidad_niveles = <?php echo $max_nivel_categorias; ?>; 
	
	var array_name = name.split("_");
	var cur_nivel= parseInt(array_name[2]);
	var nivel_actualizar = cur_nivel+1
	var countfile = array_name[0];


	// Start configurar relacionados
	// consultar por todos las categorias
	var valores_seleccionados = []; 
	for (i=1;i<=cantidad_niveles;i++) {
		// console.log($("select[name='final_cat_"+i+"[]']").val());
		var valor = objToString($("select[name='"+countfile+"_cat_"+i+"[]']").val());
		if (valor != "") {
			// console.log(valor);
		
			valores_seleccionados[i] = valor.split(",");
			
			// Considerar para cada categoria
			if (typeof valores_seleccionados[i] !== 'undefined' && valores_seleccionados[i].length > 0) {
			  // do stuff
				var arrayLength = valores_seleccionados[i].length;
				for (var z = 0; z < arrayLength; z++) {
					if (valores_seleccionados[i][z] != "") {
						// alert(valores_seleccionados[i][z]);
						
						//Do something
					}
				}
			}
		}
	}
	// End configurar los relacionados
	
	if (cur_nivel>=cantidad_niveles) {
		return false;
	} else {
		if (cur_nivel+2<=cantidad_niveles) {
			for (i=cur_nivel+2;i<=cantidad_niveles;i++) {
				$("#archivo-"+countfile+" select[name='"+countfile+"_cat_"+i+"[]']").html('');
				$("#archivo-"+countfile+" select[name='"+countfile+"_cat_"+i+"[]']").trigger('liszt:updated');
			}
		}
		 
	}
	var $select_actualizar = $("#archivo-"+countfile+" select[name='"+countfile+"_cat_"+nivel_actualizar+"[]']");
	console.log("actualizando:"+"#archivo-"+countfile+" select[name='"+countfile+"_cat_"+nivel_actualizar+"[]']");
	
	
	var options_actualizar = [];
	var relacionados = [];
	categorias.forEach(function(item,index){
		//console.log("Index" + index);
		console.log("nivel");console.log(item['nivel']);
	
		item.forEach(function(sub1item,id_categoria){
			//console.log("id_categoria" + id_categoria);
			//console.log(sub1item["sub"]);
			if (sub1item["rel"].length>0) {
				sub1item["rel"].forEach(function(relArray,relNivel){
					/*
					console.log("relArray");
					console.log(relArray);
					console.log("relNivel");
					console.log(relNivel);
					console.log("typeof relacionados"+relNivel);
					console.log(typeof relacionados[relNivel]);
				
					console.log("-- valores id_categoria"+id_categoria);
					console.log(valores_seleccionados[item['nivel']]);
					console.log("endvalores");
					console.log(Object.values(valores_seleccionados[item['nivel']]));
						*/
					if (typeof valores_seleccionados[item['nivel']] !=="undefined") {
						if (Object.values(valores_seleccionados[item['nivel']]).indexOf(id_categoria.toString()) > -1) {
							
							if (typeof relacionados[relNivel] !== "undefined") {
								relacionados[relNivel] = relacionados[relNivel].concat(relArray);;
							} else {
								relacionados[relNivel] = relArray;	
							}
							console.log("***consolidado relacionados"+relNivel);
							console.log(relacionados[relNivel]);
							console.log("end consolidado");
						}
					}
					
				});
				/*
				console.log("relacionados:");
				console.log(sub1item["rel"]);
				console.log("endrelacionados");
				if (typeof sub1item["rel"][item['nivel']] !== "undefined") {
					if ((sub1item["rel"][item['nivel']].length)>0) {
						
					}
				}
				*/
			}
			if (array_id.includes(id_categoria+'')) {
		
				
				sub1item["sub"].forEach(function(hijo_nombre,hijo_id_categoria){
					//console.log("SubIndex" + sub1index);
					console.log("final relacionados nivel"+item['nivel']);
					console.log(typeof relacionados[parseInt(item['nivel'])+1]);
					console.log("end final relacionados");
					if (typeof relacionados[parseInt(item['nivel'])+1] !== "undefined") {
						if (Object.keys(relacionados[parseInt(item['nivel'])+1]).length>0) {
							console.log(hijo_id_categoria+":"+hijo_nombre);	
							if (Object.values(relacionados[parseInt(item['nivel'])+1]).indexOf(hijo_nombre.toString()) > -1) {	
								options_actualizar[hijo_id_categoria]=hijo_nombre		
							}
						}
					} else {
						
						options_actualizar[hijo_id_categoria]=hijo_nombre		
					}
				});
			}
		});
	});
	
	$select_actualizar.html('');
	options_actualizar.forEach(function(nombre,id){
		$select_actualizar.append('<option value="'+id+'" >'+nombre+'</option>');	
	});
	$select_actualizar.trigger('liszt:updated');
	console.log(options_actualizar);
	

}

function procesarArchivo(archivo){
	if (archivos.includes(archivo.client_name)) {
		return false;
	} else {
		
		archivos.push(archivo.client_name);
		data.push(archivo);
		
		
		
		var $base = $('#archivo-0').clone().addClass("duplicado").removeAttr("id");
		$('#archivo-'+countfiles).after($base);
		countfiles++;
		
		// Duplicado base
		$(".duplicado").attr("id","archivo-"+countfiles).removeClass("duplicado").fadeIn(0);
		
		// Asignación de valores a campos
		$("#archivo-"+countfiles+" input[name='nombre[]']").val(nombreArchivo(archivo.client_name));
		$("#archivo-"+countfiles+" input[name='seleccion_multiple[]']").after(archivo.client_name);
		$("#archivo-"+countfiles+" input[name='archivo_nombre[]']").val(archivo.file_name);
		$("#archivo-"+countfiles+" input[name='numero_correlativo[]']").val(countfiles);
		$("#archivo-"+countfiles+" input[name='archivo_original[]']").val(archivo.client_name);
		$("#archivo-"+countfiles+" input[name='archivo_peso[]']").val(archivo.file_size);
		$("#archivo-"+countfiles+" input[name='archivo_extension[]']").val(archivo.file_ext);
		$("#archivo-"+countfiles+" input[name='archivo_imagen[]']").val(archivo.is_image);
		$("#archivo-"+countfiles+" input[name='archivo_imagen_ancho[]']").val(archivo.image_width);
		$("#archivo-"+countfiles+" input[name='archivo_imagen_alto[]']").val(archivo.image_height);
		$("#archivo-"+countfiles+" input[name='archivo_imagen_tipo[]']").val(archivo.image_type);
		$("#archivo-"+countfiles+" input[name='seleccion_multiple[]']").val(countfiles);
		// Chosen
		$("#archivo-"+countfiles+" select.chosen-postload").each(function(index, element) {
        	$(this).attr("name",countfiles+"_"+$(this).attr("name"));
			$(this).chosen().change(function(){
				var id = $(this).val();
				var name = $(this).attr('name');
				actualizarCategorias(name,id);
				
			});;    
        });
		
		
		// ojo las categorias se deben renombrar por cada archivo
		
		
		// Tags
		$("#archivo-"+countfiles+" input[name='etiquetas[]']").tagsinput();
		
		// Preview
		//$("#archivo-"+countfiles+" a.preview").data("archivo",archivo.file_name);
		$("#archivo-"+countfiles+" a.preview").on('click',function() {
			//var archivo = $(this).data("archivo");
			$("#stack1 .modal-body iframe").fadeOut();
			$("#stack1 .modal-body iframe").attr('src','<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/'+archivo.file_name);
			$("#stack1").modal('show');	
			$("#stack1 h4.modal-title").html(archivo.client_name);
			setTimeout(function() {$("#stack1 .modal-body iframe").fadeIn("fast")},1000);
				
		});
		
		// popovers
		$("#archivo-"+countfiles+" .popovers").popover(); 
		
		// Datepicker
		$("#archivo-"+countfiles+" input[name='programar_desde[]'],	#archivo-"+countfiles+" input[name='programar_hasta[]'], #archivo-"+countfiles+" input[name='vigencia_desde[]'], #archivo-"+countfiles+" input[name='vigencia_hasta[]']").datepicker({
		orientation: "left",
		format:'d-m-y',
 		autoclose: true
	});
		
	
		
		// Reload events
		$("input.checkable").change(function() {
			if(this.checked) {
				$("#archivo-"+$(this).val()+" .accionlote").fadeOut();	
			} else {
				$("#archivo-"+$(this).val()+" .accionlote").fadeIn();	
			}        
		});

	}
	// console.log(data);
}
	
	
</script> 
<script type="text/javascript">

$("#seleccionar").on('click', function() {
	var checkboxes = $(this).closest('form').find('.checkable:checkbox');
    checkboxes.each(function (index, element) {
    	$(this).prop('checked', true);
		var id = $(this).val();	
		$("#archivo-"+id+" .accionlote").fadeOut();
	});
});



$(document).ready(function(e) {
    	$("select.chosen-postload").each(function(index, element) {
			$(this).chosen().change(function(){
				var id = $(this).val();
				var name = $(this).attr('name');
				actualizarCategorias(name,id);
				
			});;    
        });
		// Precargar categorias seleccionadas
		var ids_biblioteca = $("#ids_biblioteca").val();
		var myarr_biblioteca = ids_biblioteca.split(",");
		var cantidad_niveles = <?php echo $max_nivel_categorias; ?>; 
		var flag = 0; // flag para detener el bucle
		var arrayLength = myarr_biblioteca.length;
		for (var i = 0; i < arrayLength; i++) {
			if (myarr_biblioteca[i] != "") {
				for (var z=cantidad_niveles;z>0;z--) {
					$("select[name='"+myarr_biblioteca[i]+"_cat_"+z+"[]']").each(function(index, element) {
						var id = $(this).val();					
						if (id != "" && id != null) {
							var name = $(this).attr('name');
							actualizarCategorias(name,id);
							flag = 1;
							return false;
						}
					});	
					if (flag == 1) { flag = 0; 	break;	}
				}
				
			}
		}
		
		
		
		
		// End precargar categorias seleccionadas
		$(".etitags").tagsinput();
	
});

$("#deseleccionar").on('click', function() {
	 var checkboxes = $(this).closest('form').find('.checkable:checkbox');
	
    checkboxes.each(function (index, element) {
    	$(this).prop('checked', false);
		var id = $(this).val();	
		$("#archivo-"+id+" .accionlote").fadeIn();
	});
});

	
$("#archivo-final select.chosen-postload").chosen().change(function(){
	var id = $(this).val();
	var name = $(this).attr('name');
	actualizarCategorias(name,id);
	
});;    



//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent().parent().parent();
	next_fs = $(this).parent().parent().parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent().parent().parent();
	previous_fs = $(this).parent().parent().parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
$(document).ready(function(e) {
    $("#msform").on('submit', function(e) {
		<?php if (count($bibliotecas)>0): ?>
			<?php foreach ($bibliotecas as $bib): ?>
				var tipos_contenidos = $("#<?php echo $bib->id_biblioteca; ?>_tipos_contenidos").val();
			
				if (tipos_contenidos == "" || tipos_contenidos == null|| typeof tipos_contenidos == "null" || typeof tipos_contenidos == null ){
					alert("Debe seleccionar al menos un tipo de contenido");
					return false;	
				}
				
				if (($("#categoriasv2_<?php echo $bib->id_biblioteca; ?>").val() == "" || $("#categoriasv2_<?php echo $bib->id_biblioteca; ?>").val() == ",")) {
					var archivo_nombre = "<?php echo $bib->nombre; ?>";
					alert("debe seleccionar al menos una categoría para el "+archivo_nombre);
					return false;
					//e.preventDefault();
					
				} 
				
				
				
			<?php endforeach; ?>
		<?php endif; ?>
	});
});



</script>
</body>
</html>