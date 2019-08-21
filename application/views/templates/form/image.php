<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-2 control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-10">
    <input type="text" name="<?php echo $field_name; ?>" id="<?php echo $field_name; ?>" size="20" class="imageinput" value="<?php echo htmlspecialchars(@$default) ?>"  <?php echo @$required; ?>>
    <a href="<?php echo base_url(); ?>assets/global/plugins/filemanager/dialog.php?type=1&amp;field_id=<?php echo $field_name; ?>&amp;fldr=<?php echo $ffile; ?>" class="btn iframe-btn" type="button">Seleccione</a> </div>
</div>
