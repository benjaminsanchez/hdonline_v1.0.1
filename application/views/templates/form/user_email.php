<?php $sizerow = explode(",",$size);?>

<?php if (@$sizerow[2] != "close"): ?>
<div class="form-group" id="Show_<?php echo $field_name; ?>">
<?php else:?>
<span  id="Show_<?php echo $field_name; ?>">
<?php endif; ?>



  <label class="col-md-<?php echo $sizerow[0]; ?> control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-<?php echo $sizerow[1]; ?>">
    <input type="email" name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" class="form-control" size="30" autocomplete="off"  <?php if (@$maxlength>0): ?> maxlength="<?php echo @$maxlength; ?>" <?php endif; ?>  value="<?php echo htmlspecialchars(@$default) ?>" <?php echo @$required; ?>><i id="<?php echo $field_name; ?>_msg" class="msg_field"></i>
    
     <input type="hidden" name="validate_user" id="validate_user"value="<?php echo htmlspecialchars(@$default) ?>" >
    
  </div>
  
  
<?php if (@$sizerow[2] != "open"): ?>
	<?php if (@$sizerow[2] != "close"): ?>
    </div>
    <?php else:?>
    </span>
    </div>
    <?php endif; ?>
<?php endif; ?>