<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-3 control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-3">
    <input type="password" name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="30" <?php if (@$maxlength>0): ?> maxlength="<?php echo @$maxlength; ?>" <?php endif; ?>  value="<?php // echo htmlspecialchars(@$default) ?>" > <i>&nbsp;</i>
  </div>
  
  <label class="col-md-2 control-label">Enviar clave</label>
  <div class="col-md-4">  <div class="mt-radio-inline">
  
        <label class="mt-radio">
    <input type="radio" name="sendpassword" value="sendpassword" checked>Si enviar <span></span></label>
    
        <label class="mt-radio">
        <input type="radio" name="sendpassword" value="nosendpassword">No enviar<span></span>
        </label>
        </div>
  </div>
</div>
 