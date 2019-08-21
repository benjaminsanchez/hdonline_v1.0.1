<?php $sizerow = explode(",",$size);?>
<?php if (@$sizerow[2] != "close"): ?>

<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <?php else:?>
  <span  id="Show_<?php echo $field_name; ?>">
  <?php endif; ?>
  <label class="col-md-<?php echo $sizerow[0]; ?> control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-<?php echo $sizerow[1]; ?>">
    <div class="input-group">
      <input type="time" class="form-control" name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>"   value="<?php echo htmlspecialchars(@$default) ?>"  <?php if (@$maxlength>0): ?> maxlength="<?php echo @$maxlength; ?>" <?php endif; ?> <?php echo @$required; ?>  >
    <!--
      <span class="input-group-addon" id="Show<?php echo $field_name; ?>">   <a href="javascript:void(0)" onClick="MostrarHora<?php echo $field_name; ?>()"><i class="fa fa-lock"></i> Usar hora actual</a> </span>--></div>
  </div>
  <?php if (@$sizerow[2] != "open"): ?>
  <?php if (@$sizerow[2] != "close"): ?>
</div>
<?php else:?>
</span>
</div>
<?php endif; ?>
<?php endif; ?>

<script language="javascript">
function MostrarHora<?php echo $field_name; ?>() {
		var currentdate = new Date(); 
		var hora = currentdate.getHours();
		if(hora.toString().length == 1) {
        	var hora = '0'+hora;
    	} 
		var minute = currentdate.getMinutes();
		if(minute.toString().length == 1) {
        	var minute = '0'+minute;
    	} 
		document.getElementById('<?php echo $field_name; ?>').value = hora+":"+minute;
}
	
</script>