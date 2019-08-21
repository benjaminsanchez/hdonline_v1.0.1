<?php $sizerow = explode(",",$size);?>

<?php if (@$sizerow[2] != "close"): ?> 
<div class="form-group" id="Show_<?php echo $field_name; ?>">
<?php else:?>
<span  id="Show_<?php echo $field_name; ?>">
<?php endif; ?>


  <label class="col-md-<?php echo $sizerow[0]; ?> control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-<?php echo $sizerow[1]; ?>">
  <div class="mt-radio-inline">
    <?php
	
	foreach ($datalist as $value=>$display):
		?>
        <label class="mt-radio">
    <input type="radio" name="<?php echo $field_name; ?>" <?php if (@$x_estado == "1") { ?> checked<?php } ?> value="<?php echo $value; ?>" <?php if ($value==@$default): ?> checked <?php endif; ?>>
    <?php echo (@$LS[$ffile][$field_name][$display] !="") ? @$LS[$ffile][$field_name][$display] : '$lang["'.$ffile.'"]["'.$field_name.'"]["'.$display.'"] = "";'; ?> 
      <span></span> </label>
    <?php
	endforeach;	 
	?>
  </div>
  </div>
<?php if (@$sizerow[2] != "open"): ?>
	<?php if (@$sizerow[2] != "close"): ?>
    </div>
    <?php else:?>
    </span>
    </div>
    <?php endif; ?>
<?php endif; ?>


