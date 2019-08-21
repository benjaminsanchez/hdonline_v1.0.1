<?php $sizerow = explode(",",$size);?>

<?php if (@$sizerow[2] != "close"): ?>
<div class="form-group" id="Show_<?php echo $field_name; ?>">
<?php else:?>
<span  id="Show_<?php echo $field_name; ?>">
<?php endif; ?>

  <label class="col-md-<?php echo $sizerow[0]; ?> control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-<?php echo $sizerow[1]; ?>">
  <?php if ($default == "0000-00-00") $default=''; ?>
    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
      <input type="text" name="<?php echo $field_name; ?>" id="<?php echo $field_name ; ?>" <?php if (@$maxlength>0): ?> maxlength="<?php echo @$maxlength; ?>" <?php endif; ?> value="<?php echo htmlspecialchars(@$default) ?>" class="form-control"  <?php echo @$required; ?> readonly>
      <span class="input-group-btn">
      <button class="btn default" type="button"> <i class="fa fa-calendar"></i> </button>
      </span> </div>
  </div>



 
<?php if (@$sizerow[2] != "open"): ?>
	<?php if (@$sizerow[2] != "close"): ?>
    </div>
    <?php else:?>
    </span>
    </div>
    <?php endif; ?>
<?php endif; ?>
