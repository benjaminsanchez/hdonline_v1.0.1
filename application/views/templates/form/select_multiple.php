<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-3 control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-9">
  <select multiple name="<?php echo $field_name; ?>[]" id="<?php echo $field_name; ?>" <?php echo @$required; ?> class="chzn-select form-control" style="min-width:600px; width:100%">
  	<?php
	// print_r($default);
	foreach ($datalist as $value=>$display):
		?>
        <option value="<?php echo $value; ?>" <?php if (@in_array($value,@$default)): ?> selected <?php endif; ?>><?php echo ucwords($display); ?></option>
        <?php
	endforeach;	
	?>
  </select></div>
</div>
