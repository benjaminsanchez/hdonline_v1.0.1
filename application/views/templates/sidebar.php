<!-- start: .page-sidebar -->

<div id="sidebar" class="page-sidebar ">
  <?php if ($sidebar_cat == 1): ?>
  <!-- start: .portlet -->
  <div class="portlet light">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject"><?php echo $LG["categorias_contenido"]; ?></span> </div>
    </div>
    <div class="portlet-body">
      <input type="hidden" name="categoriasv2" id="categoriasv2" value="<?php 
  $countdefault = count($categorias);
  if ($countdefault>0): 
  		$countcat=0; 
		foreach($categorias as $tmpcat): 
			if ($countcat>0 && $countdefault!=$countcat): echo ","; endif; 
			echo $tmpcat; 
			$countcat++; 
		endforeach; 
	endif; ?>">
      <div id="tree_2" class="tree-demo"> <?php echo $esquema_arboledit_html; ?> </div>
      <?php
/*

	foreach ($cat as $value=>$display):

	
	?>
              <div class="form-group">
                <select multiple name="final_cat_<?php echo $display["nivel"]; ?>[]"  class="form-control chosen-categorias-sidebar" style="width:240px"  data-placeholder="<?php echo $display["tipo_nombre"];  ?>">
                  <option><!-- Empty option goes here. --><option>
                  <?php foreach ($display as $disp): if (@$disp->id_categoria != ""): ?>
                  <option value="<?php echo @$disp->id_categoria; ?>" <?php if (@in_array(@$disp->id_categoria,@$categorias)): ?> selected <?php endif; ?>><?php echo ucwords(@$disp->nombre); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <?php
	endforeach;	
	*/
	?>
    </div>
  </div>
  <!-- end: .portlet -->
  <?php endif; ?>
  <?php if ($sidebar_dis == 1): ?>
  <!-- start: .portlet -->
  <div class="portlet light" style="padding-bottom: 220px;">
    <div class="portlet-title">
      <div class="caption"> <span class="caption-subject"><?php echo $LG["perfil_usuario"]; ?></span> </div>
    </div>
    <div class="portlet-body">
      <div class="form-group">
        <?php

	foreach ($cat as $value=>$display):
		if (intval($display["nivel"]) == 1) :  

	
	?>
        <select multiple name="permisos_categoria[]"  class="form-control chosen-permisos-sidebar" style="width:240px"  data-placeholder="<?php echo $display["tipo_nombre"];  ?>">
          <option><!-- Empty option goes here. -->
          <option>
          <?php foreach ($display as $disp): if (@$disp->id_categoria != ""): ?>
          <option value="<?php echo @$disp->id_categoria; ?>" <?php if (@in_array(@$disp->id_categoria,@$x_categorias)): ?> selected <?php endif; ?>><?php echo ucwords(@$disp->nombre); ?></option>
          <?php endif; ?>
          <?php endforeach; ?>
        </select>
        <?php
			  break;
		endif;
	endforeach;	
	?>
      </div>
    </div>
    <div class="portlet-body">
      <div class="form-group">
        <select multiple name="permisos_perfil[]" class="form-control chosen-permisos-sidebar"  style="width:240px"  data-placeholder="Perfil de usuario">
          <?php foreach ($perfiles as $perfil): ?>
          <option value="<?php echo $perfil->id_perfil; ?>" <?php if (@in_array(@$perfil->id_perfil,@$x_perfiles)): ?> selected <?php endif; ?>><?php echo $perfil->nombre; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <select  multiple name="permisos_zona_geografica[]" class="form-control chosen-permisos-sidebar"  style="width:240px"  data-placeholder="Zona geográfica">
          <?php foreach ($zonas_geograficas as $zona): ?>
          <option value="<?php echo $zona->id_zona_geografica; ?>" <?php if (@in_array(@$zona->id_zona_geografica,@$x_zonas_geograficas)): ?> selected <?php endif; ?>><?php echo $zona->nombre; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group" id="ShowAlcanceDistribuidor">
        <select multiple name="permisos_distribuidor[]" class="form-control chosen-permisos-sidebar"  style="width:240px"  data-placeholder="Distribuidores">
          <?php foreach ($distribuidores as $distribuidor): ?>
          <option value="<?php echo $distribuidor->id_distribuidor; ?>" <?php if (@in_array(@$distribuidor->id_distribuidor,@$x_distribuidores)): ?> selected <?php endif; ?>><?php echo $distribuidor->nombre; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group" id="ShowAlcanceUsuarios"> 
        <!--<div class="scroller" style="height:150px" data-always-visible="1" data-rail-visible="1" data-rail-color="gray" data-handle-color="#3598dc">  </div>-->
        <select multiple name="permisos_usuario[]" class="form-control chosen-permisos-sidebar"  style="width:240px"  data-placeholder="Usuarios">
          <?php foreach ($usuarios as $usuario): ?>
          <option value="<?php echo $usuario->id_usuario; ?>" <?php if (@in_array(@$usuario->id_usuario,@$x_usuarios)): ?> selected <?php endif; ?>><?php echo $usuario->nombre; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  </div>
  <!-- end: .portlet -->
  <?php endif; ?>
</div>
<!-- end: .page-sidebar --> 

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
		var valor = objToString($("select[name='final_cat_"+i+"[]']").val());
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
				$("select[name='"+countfile+"_cat_"+i+"[]']").html('');
				$("select[name='"+countfile+"_cat_"+i+"[]']").trigger('liszt:updated');
			}
		}
		 
	}
	var $select_actualizar = $("select[name='"+countfile+"_cat_"+nivel_actualizar+"[]']");
	
	
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
window.onload = function() {
    

};
	
    

</script>