<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <label class="col-md-3 control-label"><?php echo @$LSI[$name]; ?></label>
  <div class="col-md-9">
    <div class="mt-radio-inline">
      <label class="mt-radio">
        <input type="radio" name="x_id_template" value="1"  <?php if (@$default==1): ?>checked <?php endif; ?>>
        <?php echo icotpl('fotovideo'); ?><span></span><a href="#" data-target="#multimedia" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a> </label>
      <label class="mt-radio">
        <input type="radio" name="x_id_template" value="2" <?php if (@$default==2): ?>checked <?php endif; ?>>
        <?php echo icotpl('incentivo'); ?><span></span><a href="#" data-target="#programas" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a></label>
      <label class="mt-radio">
        <input type="radio" name="x_id_template" value="3"  <?php if (@$default==3): ?>checked <?php endif; ?>>
        <?php echo icotpl('eventos'); ?><span></span><a href="#" data-target="#noticias-eventos" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a> </label>
      <label class="mt-radio">
        <input type="radio" name="x_id_template" value="4"  <?php if (@$default==4): ?>checked <?php endif; ?>>
        <?php echo icotpl('video'); ?><span></span><a href="#" data-target="#videos" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a></label>
      <label class="mt-radio">
        <input type="radio" name="x_id_template" value="5"  <?php if (@$default==5): ?>checked <?php endif; ?>>
        <?php echo icotpl('enlaces'); ?><span></span> </label>
      <label class="mt-radio">
        <input type="radio" name="x_id_template" value="6"  <?php if (@$default==6): ?>checked <?php endif; ?>>
        <?php echo icotpl('descargas'); ?> <span></span><a href="#" data-target="#descargas" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a></label>
      <label class="mt-radio">
        <input type="radio" name="x_id_template" value="7"  <?php if (@$default==7): ?>checked <?php endif; ?>>
        <?php echo icotpl('novedades'); ?><span></span><a href="#" data-target="#noticias-eventos" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a> </label>
        
      <label class="mt-radio">
        <input type="radio" name="x_id_template" value="8"  <?php if (@$default==8): ?>checked <?php endif; ?>>
        <?php echo icotpl('calendario'); ?> <span></span><a href="#" data-target="#calendario" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a></label>
        
     <label class="mt-radio">
        <input type="radio" name="x_id_template" value="9"  <?php if (@$default==9): ?>checked <?php endif; ?>>
        <?php echo icotpl('wysiwyg'); ?><span></span><a href="#" data-target="#wysiwyg" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a> </label>
    </div>
  </div>
</div>
 <?php
				 $arraytpl = array( "descargas" => "Descarga de documentos",
				 					"multimedia" => "Foto o video",
									"noticias-eventos" => "Noticias y eventos",
									"noticias-eventos2" => "Noticias y eventos",
									"programas" => "Programas de incentivo",
									"videos" => "Videos",
									"calendario" => "Listado Calendario",
									"wysiwyg" => "Editor enriquecido");
				 foreach ($arraytpl as $clavetpl=>$tpl): 
				 ?>
                              <!-- imagen banner -->
                              <div id="<?php echo $clavetpl; ?>" class="modal container fade tplpreview" tabindex="-1">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                  <h4 class="modal-title">Template <?php echo $tpl; ?></h4>
                                </div>
                                <div class="modal-body"> <img src="<?php echo base_url(); ?>imgtmp/templates_preview/898x0-1/<?php echo $clavetpl; ?>.png" width="100%" > </div>
                                <div class="modal-footer">
                                  <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cerrar</button>
                                </div>
                              </div>
                              <!-- end tpl preview -->
                              <?php
				endforeach;
				 ?>