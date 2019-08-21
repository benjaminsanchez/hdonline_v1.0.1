<?php $sizerow = explode(",",$size);?>
<?php if (@$sizerow[2] != "close"): ?>

<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <?php else:?>
  <span  id="Show_<?php echo $field_name; ?>">
  <?php endif; ?>
  
  
  
  <label class="col-md-<?php echo $sizerow[0]; ?> control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-<?php echo $sizerow[1]; ?>">
    <input type="hidden" name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="20" class="imageinput" value="<?php echo htmlspecialchars(@$default) ?>"  <?php echo @$required; ?>>   
     
    
    
     <a href="#" data-url="<?php echo base_url(); ?>biblioteca/list?mode=select_multiple&field=<?php echo $field_name; ?>&type=<?php echo @$extra; ?>" data-toggle="modal" class="btn blue pull-left biblioteca"><i class="fa fa-search"></i> &nbsp;Examinar</a>
    <div class="preview-biblioteca-multiple" id="ShowPreview<?php echo $field_name; ?>">
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
<?php if (@$default != ""): ?>
<script language="javascript">
r(function(){
	ShowPreviewBiblioteca('<?php echo @$default; ?>','<?php echo @$field_name; ?>','<?php echo @$extra; ?>');
});
  
</script>
<?php endif; 