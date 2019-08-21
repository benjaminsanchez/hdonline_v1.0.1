<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-3 control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-9">
    <textarea cols="35" rows="4" id="<?php echo $field_name; ?>" name="<?php echo $field_name; ?>" <?php echo @$required; ?>><?php echo @$default; ?></textarea>
  </div>
</div>
<div id="MAPA_CONTENT"  class="form-group" >
  <label class="col-md-3 control-label">Posici&oacute;n Geogr&aacute;fica</label>
  <div class="col-md-9">
    </p>
    <input type="button" value="Ubicar coordenadas en el mapa &nbsp; &darr;" class="boton_ver" id="btn_ver_<?php echo $field_name; ?>">
    <br />
    <input type="hidden" size="1" name="zoom" id="zoom" value=15 />
    </p>
    <div id="map_<?php echo $field_name; ?>" class="mapzone"></div>
  </div>
</div>
