<?php if (@$seccion->mostrar_filtro == "si"): ?>
<!-- Start filters -->
<div id="filtro_superior" class="portlet-body form filter-form"> 
  <!-- BEGIN FORM-->
  <form action="<?php echo preg_replace('/start-[0-9]+/', 'start-1', base_url(uri_string())); ?>" class="form-horizontal form-row-seperated" method="get" id="filtro">
    <div class="row fadeInOnReady">
      <div class="col-md-2">
        <div class="input-group">
          <input type="text" class="form-control bg-grey-steel" name="f_txt" placeholder="<?php echo $L["filtro_buscar"]; ?>" value="<?php echo @$f_txt; ?>" >
          <span class="input-group-btn">
          <button class="btn blue-hoki uppercase bold" type="submit"><i class="fa fa-search"></i></button>
          </span> </div>
      </div>
      <div class="col-md-2">
        <?php if (count($f_categoria[3])>0): ?>
        <select class="bs-select form-control input-small select_filter" name="f_cat3" data-style="grey-steel">
          <option value=""><?php echo $catnivel_nombre[3]; ?></option>
          <?php foreach ($f_categoria[3] as $categoria): ?>
          <option value="<?php echo $categoria->id_categoria; ?>" <?php if ($f_cat3 ==  $categoria->id_categoria) echo ' selected'; ?>><?php echo $categoria->nombre; ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?>
      </div>
      <div class="col-md-2">
        <?php if (count($f_categoria[4])>0 && $f_cat3 != ""): ?>
        <select class="bs-select form-control input-small select_filter" name="f_cat4" data-style="grey-steel">
          <option value=""><?php echo $catnivel_nombre[4]; ?></option>
          <?php foreach ($f_categoria[4] as $categoria): ?>
          <option value="<?php echo $categoria->id_categoria; ?>" <?php if ($f_cat4 ==  $categoria->id_categoria) echo ' selected'; ?>><?php echo $categoria->nombre; ?></option>
          <?php endforeach; ?>
        </select>
        <?php endif; ?>
      </div>
      <div class="col-md-4">
        <div class="input-group">
          <input type="text" class="form-control bg-grey-steel" id="reportrange" name="f_fechas" placeholder="<?php echo $L["filtro_fechas"]; ?>" autocomplete="off" value="<?php echo @$f_fechas; ?>" onKeyDown="return false" onKeyUp="return false" >
          <span class="input-group-btn">
          <button class="btn blue-hoki uppercase bold" type="button"><i class="fa fa-calendar"></i></button>
          </span> </div>
      </div>
      <div class="col-md-2">
        <select class="bs-select form-control select_filter" name="f_sort" data-style="grey-steel">
          <option value=""><?php echo $L["filtro_ordenar_por"]; ?></option>
          <option value="top" <?php if (@$f_sort == "top") echo ' selected '; ?>><?php echo $L["filtro_mas_relev"]; ?></option>
          <option value="z-a" <?php if (@$f_sort == "z-a") echo ' selected '; ?>><?php echo $L["filtro_orden_abcA_Z"]; ?></option>
          <option value="a-z" <?php if (@$f_sort == "a-z") echo ' selected '; ?>><?php echo $L["filtro_orden_abcZ_A"]; ?></option>
        </select>
      </div>
      <div class="col-md-3 pull-right text-right"><a href="<?php echo base_url(uri_string());?>?cmd=resetall" class="btn btn-xs blue-hoki btn-outline"><i class="fa fa-refresh"></i><?php echo $L["filtro_reestablecer"]; ?> </a></div>
    </div>
  </form>
</div>
<!-- end filters -->
<?php endif; ?>