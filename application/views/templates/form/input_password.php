<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-3 control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-3">
    <input type="password" name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="30" pattern=".{6,10}" title="6 caracteres mínimo"  <?php if (@$maxlength>0): ?> maxlength="<?php echo @$maxlength; ?>" <?php endif; ?>  value="<?php // echo htmlspecialchars(@$default) ?>" class="form-control pswd-input1" >
  </div>
    <label class="col-md-3 control-label">Confirmar <?php echo @$LSI[$name]; ?></label>
   <div class="col-md-3">
    <input type="password" name="confirm_<?php echo $field_name; ?>" id="confirm_<?php echo $field_name; ?>" pattern=".{6,10}"   title="6 caracteres mínimo" size="30"  <?php if (@$maxlength>0): ?> maxlength="<?php echo @$maxlength; ?>" <?php endif; ?>  value="<?php // echo htmlspecialchars(@$default) ?>" class="form-control pswd-input2" >
  </div>  
    <label class="col-md-3 control-label">&nbsp;</label>
   <i class="col-md-9 pswd-msg">&nbsp;</i>

</div>