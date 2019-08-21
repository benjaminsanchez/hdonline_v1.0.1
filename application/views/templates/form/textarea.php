<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-3 control-label" for="<?php echo $field_name; ?>"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-9">
    <textarea cols="35" rows="4" id="<?php echo $field_name; ?>" name="<?php echo $field_name; ?>" <?php echo @$required; ?> class="form-control" style="max-width:100%;"><?php echo @$default; ?></textarea>
  </div>
</div>
 