<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-3 control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-9">
    <input type="hidden" name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="30" <?php if (@$maxlength>0): ?> maxlength="<?php echo @$maxlength; ?>" <?php endif; ?>  value="<?php echo htmlspecialchars(@$default) ?>"> <span class="form-control border-white"><?php echo htmlspecialchars(@$default_display) ?></span>
  </div>
</div>
