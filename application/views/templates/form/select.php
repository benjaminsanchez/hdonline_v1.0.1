<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-3 control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-9">
  <select name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" <?php echo @$required; ?> class="form-control">
  <option value="">Seleccione...</option>
  	<?php
	foreach ($datalist as $value=>$display):
		?>
        <option value="<?php echo $value; ?>" <?php if ($value==@$default): ?> selected <?php endif; ?>><?php echo ucwords($display); ?></option>
        <?php
	endforeach;	
	?>
  </select></div>
</div>
