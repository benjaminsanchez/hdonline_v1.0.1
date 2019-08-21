<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-3 control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-9">
  <div style="display:none"></div>
      <input type="hidden" name="categoriasv2" id="categoriasv2" value="<?php 
  $countdefault = count($default);
  if ($countdefault>0): 
  		$countcat=0; 
		foreach($default as $tmpcat): 
			if ($countcat>0 && $countdefault!=$countcat): echo ","; endif; 
			echo $tmpcat; 
			$countcat++; 
		endforeach; 
	endif; ?>">
      <div id="tree_2" class="tree-demo"> <?php echo $esquema_arboledit_html; ?> </div>
  </div>
  <?php /* ?>
  <?php 
  
  foreach ($datalist as $row):
  		$cat[$row->id_categoria_tipo][$row->id_categoria] = $row;
 		$cat[$row->id_categoria_tipo]["tipo_nombre"] = $row->tipo_nombre; 
  endforeach;  
  ?>
  <?php

	foreach ($cat as $value=>$display):?>
  <div class="col-md-2">
    <div class="caption sbold font-dark col-md-12"><?php echo $display["tipo_nombre"];  ?>  <?php if ($value==1): echo ' (Obligatorio) '; endif; ?> </div>
    <select multiple name="<?php echo $field_name; ?>[]" id="cat<?php echo $value; ?>" <?php if ($value==1): echo ' required '; endif; ?> <?php echo @$required; ?> class="form-control chzn-select" style="height:200px">
      <?php foreach ($display as $disp): if (@$disp->id_categoria != ""): ?>
      <option value="<?php echo @$disp->id_categoria; ?>" <?php if (@in_array(@$disp->id_categoria,@$default)): ?> selected <?php endif; ?>><?php echo ucwords(@$disp->nombre); ?></option>
      <?php endif; ?>
      <?php endforeach; ?> 
    </select>
    <a href="javascript:void(0)" class="todas_categorias">Seleccionar todo</a>
  </div>
  <?php
	endforeach;	
	?>
	<?php */ ?>
</div>



