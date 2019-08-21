<div class="form-group" id="Show_<?php echo $field_name; ?>">
  <div class="row">
    <label class="col-md-3 control-label"><?php echo @$LSI[$name]; ?></label>
    <div class="col-md-9">&nbsp;</div>
  </div>
  <div class="row">
    <label class="col-md-3 control-label margin-top-10">&nbsp;</label>
    <div class="col-md-9 margin-bottom-20 margin-top-15 text-left"> Template <i>(Los templates pueden ser reutilizados en distintas secciones y subsecciones).</i></div>
  </div>
  <div class="row">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-9">
      <div class="mt-radio-inline">
        <div class="row row-tpl">
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="1"  <?php if (@$default==1): ?>checked <?php endif; ?>>
          <?php echo icotpl('fotovideo'); ?> <span></span><!--<a href="#" data-target="#multimedia" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura de 2 y 3 columnas para listar imágenes.</div>
          </label>
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="4"  <?php if (@$default==4): ?>checked <?php endif; ?>>
          <?php echo icotpl('video'); ?><span></span><!--<a href="#" data-target="#videos" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura de 4 columnas para listar videos.</div>
          </label>
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="6"  <?php if (@$default==6): ?>checked <?php endif; ?>>
          <?php echo icotpl('descargas'); ?> <span></span><!--<a href="#" data-target="#descargas" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura de tabla para cargar archivos.</div>
          </label>
        </div>
        <div class="row row-tpl">
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="9"  <?php if (@$default==9): ?>checked <?php endif; ?>>
          <?php echo icotpl('wysiwyg'); ?><span></span><!--<a href="#" data-target="#wysiwyg" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura con editor enriquecido.</div>
          </label>
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="5"  <?php if (@$default==5): ?>checked <?php endif; ?>>
          <?php echo icotpl('enlaces'); ?><span></span>
          <div class="tpl-description small">Opción para agregar enlace.</div>
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <label class="col-md-3 control-label margin-top-10">&nbsp;</label>
    <div class="col-md-9 margin-bottom-20 margin-top-15 text-left"> Módulo <i>(Los módulos son estructuras más complejas que se pueden utilizar solo una vez).</i></div>
  </div>
  <div class="row">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-9">
      <div class="mt-radio-inline">
        <div class="row row-tpl">
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="7"  <?php if (@$default==7): ?>checked <?php endif; ?>>
          <?php echo icotpl('novedades'); ?><span></span><!--<a href="#" data-target="#noticias-eventos" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura de 2 y 3 columnas para cargar novedades.</div>
          </label>
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="3"  <?php if (@$default==3): ?>checked <?php endif; ?>>
          <?php echo icotpl('eventos'); ?><span></span><!--<a href="#" data-target="#noticias-eventos" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura de 2 y 3 columnas para eventos con detalles e invitación</div>
          </label>
          <label class="mt-radio col-md-4" data-container="body" data-trigger="hover" data-placement="top" data-content="Este módulo ya está en uso">
          <input type="radio" name="x_id_template"  value="8"  <?php if (@$default==8): ?>checked <?php endif; ?>>
          <?php echo icotpl('calendario'); ?> <span></span><!--<a href="#" data-target="#calendario" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura de listado de eventos sin detalle.</div>
          </label>
        </div>
        <div class="row row-tpl">
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="2" <?php if (@$default==2): ?>checked <?php endif; ?>>
          <?php echo icotpl('incentivo'); ?><span></span><!--<a href="#" data-target="#programas" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura para programas de incentivo.</div>
          </label>
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="11"  <?php if (@$default==11): ?>checked <?php endif; ?>>
          <?php echo icotpl('pop'); ?><span></span><!--<a href="#" data-target="#pop" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura mini tienda para productos corporativos.</div>
          </label>
          <label class="mt-radio col-md-4">
          <input type="radio" name="x_id_template" value="10"  <?php if (@$default==10): ?>checked <?php endif; ?>>
          <?php echo icotpl('promociones'); ?><span></span><!--<a href="#" data-target="#promociones" data-toggle="modal" class="preview" title=" Previsualizar"><i class="fa fa-search"></i></a>-->
          <div class="tpl-description small">Estructura para cargar Promociones y documentación.</div>
          </label>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
				 $arraytpl = array( "descargas" => "Descarga de documentos",
				 					"fotovideo" => "Foto o video",
									"noticias-eventos" => "Noticias y eventos",
									"noticias-eventos2" => "Noticias y eventos",
									"programas" => "Programas de incentivo",
									"videos" => "Template Videos",
									"calendario" => "Listado Calendario",
									"wysiwyg" => "Editor enriquecido",
									"promociones" => "Promociones");
				 foreach ($arraytpl as $clavetpl=>$tpl): 
				 ?>
<!-- imagen banner -->
<div id="<?php echo $clavetpl; ?>" class="modal container fade tplpreview" tabindex="-1">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"> <?php echo $tpl; ?></h4>
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
