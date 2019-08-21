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
<script src="<?php echo base_url(); ?>assets/custom/js/jquery.easing.min.js"></script>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom/js/dropzone/dropzone.min.css">
<script src="<?php echo base_url(); ?>assets/custom/js/dropzone/dropzone.min.js?v=<?php echo date("Ymhi"); ?>"></script>

<link href="<?php echo base_url(); ?>assets/global/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/global/plugins/jstree/dist/jstree.min.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/custom/js/ui-tree-bibliotecaadd.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 



<script src="<?php echo base_url(); ?>assets/custom/js/custom.js?v=<?php echo date("Ymhi"); ?>"></script>
<link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/custom/css/biblioteca.css?v=<?php echo date("Ymhi"); ?>">
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- start Datepicker -->
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<style>
.btn.blue:not(.btn-outline), .btn-primary, .btn-info, .btn.btn-outline.blue.active, .btn.btn-outline.blue:active, .btn.btn-outline.blue:active:focus, .btn.btn-outline.blue:active:hover, .btn.btn-outline.blue:focus, .btn.btn-outline.blue:hover, .btn.blue:not(.btn-outline):active:focus, .btn.blue:not(.btn-outline):active:hover {
 background-color:<?php echo $hexcolor;
?>;
 border-color: <?php echo $darkcolor;
?>;
}
.btn.blue:not(.btn-outline):hover, .btn.blue:not(.btn-outline):active, .btn.blue:not(.btn-outline):focus {
background-color:<?php echo $lightcolor;
?>;
 border-color: <?php echo $hexcolor;
?>;
}
.btn.btn-outline.blue {
border-color:<?php echo $hexcolor;
?>;
}
.btn.btn-outline.blue {
color:<?php echo $hexcolor;
?>;
}
.btn.blue:not(.btn-outline):active:hover {
background-color:<?php echo $darkcolor;
?>;
}
.biblioteca #progressbar li.active {
color:<?php echo $lightcolor;
?>;
}
.biblioteca #progressbar li.active:before, #progressbar li.active:after {
	background: #FFF;
 border: 1px solid <?php echo $lightcolor;
?>;
 color: <?php echo $lightcolor;
?>;
}
.biblioteca #uploadme {
border-color:<?php echo $lightcolor;
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
a {
color:<?php echo $lightcolor;
?>;
}
</style>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<!-- end datepicker -->
<script type="text/javascript">
$(document).ready(function(e) {
	$(".chzn-select").chosen();    
	$('.date-picker').datepicker({
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
      <form id="msform"   action="<?php echo base_url(); ?>biblioteca/save_end" enctype="multipart/form-data" method="post" >
        <!-- progressbar -->
        <ul id="progressbar">
          <li class="active">
            <h3>Seleccionar</h3>
            Tipo de contenido</li>
          <li>
            <h3>Subir Archivos</h3>
            imágenes, videos y documentos</li>
          <li>
            <h3>Finalizar</h3>
            Configuración de archivos</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
          <div class="form-group col-md-12">
            <?php 
			$counttc = 0;
			$countotaltc = 0;
			$totaltc = count($tipos_contenidos);
			foreach ($tipos_contenidos as $tc): ?>
            <?php if ($counttc == 0): ?>
            <div class="col-md-3">
              <div class="mt-checkbox-list text-left">
                <?php endif; ?>
                <label class="mt-checkbox mt-checkbox-outline">
                  <input type="checkbox" name="tipos_contenidos[]" value="<?php echo $tc->id_tipo_contenido; ?>">
               <?php echo $tc->nombre; ?><span></span> </label>
                <?php $counttc++; $countotaltc++; ?>
                <?php if ($counttc == 10 || $totaltc == $countotaltc): $counttc=0; ?>
              </div>
            </div>
            <?php endif; ?>
            <?php
				
			endforeach; ?>
            <div class="col-md-12">
              <button type="button" name="previous" value=" Anterior" class="btn btn-lm btn-outline blue" onClick="window.history.back()">Anterior</button>
              <button type="button" name="next" value=" Siguiente" class="btn btn-lm blue next step-1">Siguiente</button>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <div class="row">
            <div class="col-md-3" ></div>
            <div class="col-md-6" >
              <div id="uploadme" class="fallback">
                <input name="userfile" type="file" multiple />
                <h3 class="">Arrastra tus archivos y suéltalos aquí</h3>
                <span class="bajada"> O has click para buscarlo en tu dispositivo</span> </div>
            </div>
 
            <div class="col-md-3" ></div>
            <div class="col-md-12" >
              <button type="button" name="previous" value=" Anterior" class="btn btn-lm btn-outline blue previous">Anterior</button>
              <button type="button" name="next" value=" Siguiente" class="btn btn-lm blue next step-2">Siguiente</button>
            </div>
          </div>
        </fieldset>
        <fieldset class="configuracion">
          <!-- Start Archivo Base -->
          <div class="row" id="archivo-0" style="display:none">
            <input type="hidden" name="numero_correlativo[]">
            <input type="hidden" name="archivo_nombre[]">
            <input type="hidden" name="archivo_original[]">
            <input type="hidden" name="archivo_peso[]">
            <input type="hidden" name="archivo_extension[]">
            <input type="hidden" name="archivo_imagen[]">
            <input type="hidden" name="archivo_imagen_ancho[]">
            <input type="hidden" name="archivo_imagen_alto[]">
            <input type="hidden" name="archivo_imagen_tipo[]">
            <div class="col-md-1" > </div>
            <div class="col-md-7" >
              <div class="form-group text-left">
                <label class="mt-checkbox mt-checkbox-outline bold">
                  <input type="checkbox"  class="checkable" value="1" name="seleccion_multiple[]" >
                  <span class="nombre_original"></span> <a href="#" data-target="#stack1" class="preview btn btn-sm blue btn-outline preview" title=" Previsualizar"><i class="fa fa-search"></i></a><span></span> </label>
              </div>
              <div class="form-group">
                <input type="text" name="nombre[]" class="form-control" size="30" placeholder="Nombre" value="demo" required style="">
              </div>
              <div class="form-group">
                <input type="text" name="etiquetas[]" class="form-control" size="30" placeholder="Agregar etiquetas para mejorar búsqueda" >
              </div>
              <div class="form-group">
                <textarea cols="35" rows="4" name="comentario[]"  class="form-control" placeholder="Comentario"></textarea>
              </div>
              <!-- START FECHAS -->
              
              <div class="row text-left accionlote">
                <label class="col-md-3 control-label">Vigencia <i class="fa fa-question-circle popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Establece el rango de fechas que el archivo se mostrará como vigente" data-original-title="Fecha de Vigencia"></i></label>
                <div class="col-md-3">
                  <input type="text" name="vigencia_desde[]" class="form-control date-picker" size="30" placeholder="Desde" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>' >
                </div>
                <div class="col-md-3">
                  <input type="text" name="vigencia_hasta[]" class="form-control date-picker" size="30" placeholder="Hasta" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>'>
                </div>
                <div class="col-md-3">
                  <label class="mt-checkbox mt-checkbox-outline" style="font-size:12px">
                    <input type="checkbox" name="mantener_arriba[]">
                    Mantener arriba en el listado <span></span> </label>
                </div>
              </div>
              <div class="row text-left margin-top-20 accionlote">
                <label class="col-md-3 control-label">Programar <i class="fa fa-question-circle popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Establece el rango de fechas que el archivo estará disponible en el sistema" data-original-title="Fecha de Programación"></i></label>
                <div class="col-md-3">
                  <input type="text" name="programar_desde[]" class="form-control date-picker" size="30" placeholder="Desde" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>'>
                </div>
                <div class="col-md-3">
                  <input type="text" name="programar_hasta[]" class="form-control date-picker" size="30" placeholder="Hasta" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>'>
                </div>
                <div class="col-md-3"> </div>
              </div>
              <!-- END FECHAS --> 
            </div>
            <div class="col-md-3" >
            
            
           
          
           <div class="form-group text-left accionlote"> Categorías de contenido</div>
            
            <div class="accionlote">
             <input type="hidden" name="categoriasv2[]" id="categoriasv2_"> 
      <div class="tree_biblioteca tree-demo" data-id=""> <?php echo $esquema_arboledit_html; ?> </div> 
         </div>
     
            
            <?PHP
			/*
              <div class="form-group text-left accionlote"> Categorías de contenido </div>
              <?php

	foreach ($cat as $value=>$display):

	
	?>
              <div class="form-group accionlote">
                <select multiple name="cat_<?php echo $display["nivel"]; ?>[]"  class="form-control chosen-postload" style="height:200px; width:285px"  data-placeholder="<?php echo ($display["genero"]=="f")?"Todas las":"Todos los"; ?> <?php echo $display["tipo_nombre"];  ?>">
                  <option><!-- Empty option goes here. -->
                  <option>
                  <?php if ($display["nivel"] == "1"): ?>
                  <?php foreach ($display as $disp): if (@$disp->id_categoria != ""): ?>
                  <option value="<?php echo @$disp->id_categoria; ?>" <?php if (@in_array(@$disp->id_categoria,@$default)): ?> selected <?php endif; ?>><?php echo ucwords(@$disp->nombre); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
              <?php
	endforeach;	
	?>
	<?php */ ?>
            </div>
            <div class="col-md-1" > </div>
            <div class="col-md-12 margin-top-20" >
              <hr>
            </div>
          </div>
          <!-- End: Archivo Base -->
          
          <div class="row  margin-top-40" id="archivo-final">
            <div class="col-md-12">
              <div class="form-group text-center"> <a href="javascript:void(0)" id="seleccionar"> Seleccionar Todo</a> / <a href="javascript:void(0)"  id="deseleccionar">Deseleccionar Todo</a> </div>
            </div>
            <div class="col-md-1" > </div>
            <div class="col-md-7" >
              <div class="margin-top-40"></div>
              
              <!-- START FECHAS -->
              
              <div class="row text-left">
                <label class="col-md-3 control-label">Vigencia <i class="fa fa-question-circle popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Establece el rango de fechas que el archivo se mostrará como vigente" data-original-title="Fecha de Vigencia"></i></label>
                <div class="col-md-3">
                  <input type="text" name="vigencia_desde[]" class="form-control date-picker" size="30" placeholder="Desde" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>' >
                </div>
                <div class="col-md-3">
                  <input type="text" name="vigencia_hasta[]" class="form-control date-picker" size="30" placeholder="Hasta" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>' >
                </div>
                <div class="col-md-3">
                  <label class="mt-checkbox mt-checkbox-outline" style="font-size:12px">
                    <input type="checkbox" name="mantener_arriba_todos">
                    Mantener arriba en el listado <span></span> </label>
                </div>
              </div>
              <div class="row text-left margin-top-20">
                <label class="col-md-3 control-label">Programar <i class="fa fa-question-circle popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="Establece el rango de fechas que el archivo estará disponible en el sistema" data-original-title="Fecha de Programación"></i></label>
                <div class="col-md-3">
                  <input type="text" name="programar_desde[]" class="form-control date-picker" size="30" placeholder="Desde" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>' >
                </div>
                <div class="col-md-3">
                  <input type="text" name="programar_hasta[]" class="form-control date-picker" size="30" placeholder="Hasta" data-date-format='<?php echo DEFAULT_DATE_FORMAT; ?>'>
                </div>
                <div class="col-md-3"> </div>
              </div>
              <!-- END FECHAS --> 
            </div>
            <div class="col-md-3" >
    
          
           <div class="form-group text-left accionlote"> Categorías de contenido</div>
            
             <input type="hidden" name="categoriasv2[]" id="categoriasv2_multiple"> 
      <div id="cat_seleccion_multiple" class="tree_biblioteca tree-demo" data-id=""> <?php echo $esquema_arboledit_html; ?> </div> 
         
         <?php /*
              <div class="form-group text-left"> Categorías de contenido </div>
              <?php

	foreach ($cat as $value=>$display):

	
	?>
              <div class="form-group">
                <select multiple name="final_cat_<?php echo $display["nivel"]; ?>[]"  class="form-control chosen-postload" style="height:200px; width:285px"  data-placeholder="<?php echo ($display["genero"]=="f")?"Todas las":"Todos los"; ?> <?php echo $display["tipo_nombre"];  ?>">
                  <option><!-- Empty option goes here. -->
                  <option>
                  <?php if ($display["nivel"] == "1"): ?>
                  <?php foreach ($display as $disp): if (@$disp->id_categoria != ""): ?>
                  <option value="<?php echo @$disp->id_categoria; ?>" <?php if (@in_array(@$disp->id_categoria,@$default)): ?> selected <?php endif; ?>><?php echo ucwords(@$disp->nombre); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
              <?php
	endforeach;	
	?>
	<?php */ ?>
            </div>
            <div class="col-md-1" > </div>
          </div>
          <div class="col-md-12 margin-top-30 margin-bottom-30" >
            <button type="button" name="previous" value=" Anterior" class="btn btn-lm btn-outline blue" onClick="location.reload();">Anterior</button>
            <button type="submit" value=" Siguiente" class="btn btn-lm blue">Finalizar</button>
            
      <!-- <button type="button" id="testbtn" name="previous" value="TESTBTN" class="btn btn-lm btn-outline blue">TESTBTN</button> -->
             
            
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



/*
	Dropzone.options.imageUpload = {
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
		 paramName: 'photos',
		url: 'upload.php',
		dictDefaultMessage: "Arrastre los archivos",
		clickable: true,
		enqueueForUpload: true,
		maxFilesize: 1,
		uploadMultiple: false,
		addRemoveLinks: true
    };
	*/

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
		// Revisar esta sección PARA SELECCIÓN MULTIPLE var valor = objToString($("#archivo-"+countfile+" select[name='final_cat_"+i+"[]']").val());
		var valor = objToString($("#archivo-"+countfile+" select[name='"+countfile+"_cat_"+i+"[]']").val());
		
		console.log("valoraqui"+i+""+$("select[name='"+countfile+"_cat_"+i+"[]']").val());
		if (valor != "") {
			
		
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

function cargar_arbol(countfiles) {
	$('#archivo-'+countfiles+' #categoriasv2_').attr("id","categoriasv2_"+countfiles);
	
	$('#archivo-'+countfiles+' .tree_biblioteca').each(function(index, element) {
		$(this).jstree({
			'plugins': ["wholerow","html_data", "checkbox", "types"],
			"checkbox" : {
			  "keep_selected_style" : false,
			  "three_state":true
			},
			'core': {
				"themes" : {
					"responsive": false,
					 "icons": false
				}
			},
			"types" : {
				"default" : {
					"icon" : "fa fa-folder icon-state-warning icon-lg"
				},
				"file" : {
					"icon" : "fa fa-file icon-state-warning icon-lg"
				}
			}
		});
	});

	
	$('#archivo-'+countfiles+' .tree_biblioteca').each(function(index, elementtree) {
		var id_current = countfiles;
		
		$(this).on('changed.jstree', function (e, data) {
		
				var i, j, r = [];
				for (i = 0, j = data.selected.length; i < j; i++) {
					//console.log(data.instance.get_node(data.selected[i]).data.cat);
					r.push(data.instance.get_node(data.selected[i]).data.cat);
				}
		
			   
			   // nodos adicionales
			   var checked_ids = [];
			   setTimeout(function() {
				$(elementtree).find(".jstree-undetermined").each(function (i, element) {
				//	alert($(element).closest('.jstree-node').attr("data-cat"));
					if ( !( $(element).closest('.jstree-node').attr("data-cat") in checked_ids ) ) {
						checked_ids.push( $(element).closest('.jstree-node').attr("data-cat"));
					}
					
				});
				$("#categoriasv2_"+id_current).val(r.join(',')+","+checked_ids.join(','));
			   },300);
			

		});
	});
		
	$('#archivo-'+countfiles+' .tree_biblioteca').each(function(index, element) {
		$(this).jstree(true).open_all();
	});
	var nodeids = Array();
	var nodeids_uncheck = Array();
	$('#archivo-'+countfiles+' .tree_biblioteca li').each(function() {
	//	console.log($(this).data("checkstate")+'::'+$(this).attr("id"));
		if ($(this).data("checkstate") == "checked") {
				nodeids.push($(this).attr("id"));
		}
	});
	 $('#archivo-'+countfiles+' .tree_biblioteca').each(function(index, element) {
		$(this).jstree(true).close_all();
	});
	
	
	// other way
	//var nodeids = ["01", "02"];
	$('#archivo-'+countfiles+' .tree_biblioteca').each(function(index, element) {
		$(this).jstree(true).check_node(nodeids);
	});

	
	var selected=$(".tree_biblioteca").jstree('get_selected');
	console.log(selected);
	
}

function actualizar_eventos_upload() {
	$(".dz-remove").on('click', function () {
		var archivo_counter = $(this).attr("data-counter");	
		$("#archivo-"+archivo_counter).remove();
	});		
}

function accion_eliminar_archivo(archivo_counter) {
	console.log("intentando eliminar el "+archivo_counter);
$(".dz-counter"+archivo_counter).remove();
	
	
}

function procesarArchivo(archivo){
	if (archivos.includes(archivo.client_name)) {
		return false;
	} else {
		var procesar = 1;
		
		if (archivo.orig_name != archivo.file_name) {
			
			// 2da verificacion en base de datos
			var postForm = { 	'archivo':archivo.orig_name	};		
			$.ajax({
				url: "/biblioteca/ajax_verifica_archivo",
				type: "post",
				data: postForm ,
				success: function (response) {				
					if (response=="SI") {
						alert("Existe un archivo previamente cargado con el nombre \n\n"+archivo.orig_name+"\n\nSi desea omitir esta carga presione 'Quitar archivo', de lo contrario ambos archivos se conservarán en el sistema");
					}			
				},
				error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});
			
			
			
		} 
		if (procesar == 1) {
			
		
			archivos.push(archivo.client_name);
			data.push(archivo);
			
			
			
			
			
	
			console.log(archivo);
			
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
			$("#archivo-"+countfiles+" input[name='mantener_arriba[]']").val(countfiles);
			// Chosen
			$("#archivo-"+countfiles+" select.chosen-postload").each(function(index, element) {
				$(this).attr("name",countfiles+"_"+$(this).attr("name"));
				$(this).chosen().change(function(){
					var id = $(this).val();
					var name = $(this).attr('name');
					actualizarCategorias(name,id);
					
				});;    
			});
			
			// actualizar eventos
			actualizar_eventos_upload();
			
			// V2
			 cargar_arbol(countfiles);
			
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
			/*format:'d-m-y',*/
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
		
		if (countfiles>1) {
			$("#archivo-final").fadeIn(0);
		} else {
			$("#archivo-final").fadeOut(0);
		}
	}

	// console.log(data);
}



Dropzone.autoDiscover = false;
$("#uploadme").dropzone({
	paramName: 'userfile',
	url: '<?php echo base_url(); ?>biblioteca/save',
	dictDefaultMessage: "Drag your simages",
	clickable: true,
	enqueueForUpload: false,
	maxFilesize: 50,
	uploadMultiple: true,
	addRemoveLinks: true,
	init: function () {
		var totalFiles = 0,
			completeFiles = 0;
		this.on("addedfile", function (file) {
			totalFiles += 1;
		});
		this.on("removed file", function (file) {
			totalFiles -= 1;
		});
		this.on("complete", function (file) {
			completeFiles += 1;
			if (completeFiles === totalFiles) {
				//alert("finaliza");
			}
		});
		this.on("queuecomplete", function(file, res) {
		
		  if (Dropzone.SUCCESS == "success") {
			
		  } else {
			//  alert('error');
			
	
		  }
		});
	},
	success: function(file, response){
		 if (Dropzone.SUCCESS == "success") {
			// console.log(response);
			obj = JSON.parse(response);  
			$.each( obj, function( key, value ) {
				procesarArchivo(value);	
			});
		  } else {
			//  alert('error');
		  }			
	}
});
			
	
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
	
	// Validate
	// Step 1
	if ($(this).hasClass("step-1")) {
		var contador_tipos = 0;
		$('input[name="tipos_contenidos[]"]:checked').each(function(index, element) {
			contador_tipos++;
		});
		if (contador_tipos == 0) {
			alert("Debe seleccionar al menos un tipo de contenidos");
			return false;
		}
	}
	
	if ($(this).hasClass("step-2")) {
		
		if (step2 == 0 || step2 == "0") {
			alert("Cargando archivos, por favor espere");
			return false;	
		}
		
	}
	
	
	
	
	
	
	
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
	$("#uploadme h3, #uploadme span.bajada").on('click', function() {
		$("#uploadme").trigger('click');
	});
});


$('form#msform button[type=submit]').on('click', function(e){
//$('#testbtn').on('click', function(e){
	var revisar_multiple = 0;
	for (var i=0;i<=countfiles;i++) { 
		console.log("revisando i="+i);
		console.log($('#archivo-'+i+' .checkable').prop('checked'));
		if (($("#categoriasv2_"+i).val() == "" || 	$("#categoriasv2_"+i).val() == ",") && $('#archivo-'+i+' .checkable').prop('checked')== false) {
			var archivo_nombre = $("#archivo-"+i+" input[name='nombre[]']").val();
			alert("debe seleccionar al menos una categoría para el "+archivo_nombre);
			e.preventDefault();
			return false;
		} else if ($('#archivo-'+i+' .checkable').prop('checked')==true) {
			revisar_multiple = 1;	
		}
	}
	if (revisar_multiple == 1) {
		if (($("#categoriasv2_multiple").val() == "" ||	$("#categoriasv2_multiple").val() == ",")) {
			alert("debe seleccionar al menos una categoría para la selección múltiple ");
			e.preventDefault();
			return false;
		}
	}
	// validation code here
	
});


</script>
</body>
</html>