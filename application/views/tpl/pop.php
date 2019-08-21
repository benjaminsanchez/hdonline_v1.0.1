<?php $this->load->view('templates/header'); ?>
<?php $arr_video = explode("|",$ext_video); ?>

<div class="container-fluid">
<div class="page-content white">
  <?php $this->load->view('templates/breadcrumb_secciones'); ?>
  <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
  <div class="page-content-container">
    <div class="page-content-row">
      <?php $this->load->view("templates/sidebar_tpl.php"); ?>
      <div class="page-content-col"> 
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="pop-page"> 
          
          <!-- FILTER -->
          <?php $this->load->view("templates/filters_pop"); ?>
          <!-- END FILTER -->
          <div class="row">
            <div class="col-md-12">
              <?php if ($count_material_pop_destacados>0): ?>
              <!-- start slider -->
              <div class="slider slider-for">
                <?php foreach ($material_pop_destacados as $pop): ?>
                <!-- start: item -->
                <div class="pop-box">
                  <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                  <!-- start: btn-->
                  <div class="btn-wrap">
                    <div class="btn-group">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-dark"></i> </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li> <a href="<?php echo base_url(); ?>edit/material_pop?id_material_pop=<?php echo $pop->id_material_pop; ?>"><?php echo $L["editar"]; ?></a></li>
                        <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="material_pop" data-key="id_material_pop" data-id="<?php echo $pop->id_material_pop; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>delete/material_pop?id_material_pop=<?php echo $pop->id_material_pop; ?>"><?php echo $L["eliminar"]; ?></a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- end: btn -->
                  <?php endif; ?>
                  <div class="img-container"> <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/0x250-1/biblioteca/<?php echo $pop->archivo_nombre; ?>" alt="<?php echo ($pop->titulo != "")? $pop->titulo:""; ?>" ></div>
                  <div class="caption"> <span class="label label-sm label-default label-box "><?php echo $pop->etiqueta; ?> </span>
                    <?php if ($pop->codigo != ""): ?>
                    <div class="txt-code"><?php echo $L["codigo"]; ?> <?php echo $pop->codigo; ?></div>
                    <?php endif; ?>
                    <?php if ( $pop->set_package != ""): ?>
                    <div class="txt-set"><?php echo $L["set"]; ?> <?php echo $pop->set_package; ?></div>
                    <?php endif; ?>
                    <?php if ( $pop->titulo != ""): ?>
                    <h4 class="text-uppercase"><?php echo $pop->titulo; ?></h4>
                    <?php endif; ?>
                    <div class="txt-costo"><?php echo $L["costo_final_distribuidor"]; ?> <?php echo $pop->simbolo_moneda.($pop->costo_distribuidor); ?> <i class="fa fa-info-circle fa-lg font-blue" data-toggle="tooltip" data-html="true"  data-placement="right" title="<?php echo $L["precio_con_bonificacion"]; ?> <b> <?php echo $pop->simbolo_moneda.($pop->precio_bonificacion); ?></b><br><?php echo $L["total_bonificacion"]; ?>  <b><?php echo $pop->simbolo_moneda.($pop->bonificacion); ?></b>"></i> </div>
                  </div>
                </div>
                <!-- end: item -->
                <?php endforeach; ?>
              </div>
            </div>
            
            <!-- end slider --->
            <?php endif; ?>
          </div>
          <?php if ($count_material_pop>0): ?>
          <!-- start: no destacados -->
          <div class="row">
            <?php foreach ($material_pop as $pop): ?>
            <!-- start: item -->
            <div class="col-md-6">
              <div class="pop-box">
                <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                <!-- start: btn-->
                <div class="btn-wrap">
                  <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-dark"></i> </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                      <li> <a href="<?php echo base_url(); ?>edit/material_pop?id_material_pop=<?php echo $pop->id_material_pop; ?>"><?php echo $L["editar"]; ?></a></li>
                      <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="material_pop" data-key="id_material_pop" data-id="<?php echo $pop->id_material_pop; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                      <li> <a href="<?php echo base_url(); ?>delete/material_pop?id_material_pop=<?php echo $pop->id_material_pop; ?>"><?php echo $L["eliminar"]; ?></a></li>
                    </ul>
                  </div>
                </div>
                <!-- end: btn --> 
                <?php endif; ?>
                <div class="img-container"> <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/0x200-1/biblioteca/<?php echo $pop->archivo_nombre; ?>" ></div>
                <div class="caption"> <span class="label label-sm label-default label-box "> <?php echo $pop->etiqueta; ?> </span>
                  <?php if ( $pop->titulo != ""): ?>
                  <h4 class="text-uppercase"><?php echo $pop->titulo; ?></h4>
                  <?php endif; ?>
                  <?php if ($pop->codigo != ""): ?>
                  <div class="txt-code"><?php echo $L["codigo"]; ?> <?php echo $pop->codigo; ?></div>
                  <?php endif; ?>
                  <?php if ( $pop->set_package != ""): ?>
                  <div class="txt-set"><?php echo $L["set"]; ?> <?php echo $pop->set_package; ?></div>
                  <?php endif; ?>
                  <div class="txt-costo"><?php echo $L["costo_final_distribuidor"]; ?> <?php echo $pop->simbolo_moneda.($pop->costo_distribuidor); ?> <i class="fa fa-info-circle fa-lg font-blue" data-toggle="tooltip" data-html="true"  data-placement="top" title="<?php echo $L["precio_con_bonificacion"]; ?>  <b> <?php echo $pop->simbolo_moneda.($pop->precio_bonificacion); ?></b><br><?php echo $L["total_bonificacion"]; ?> <b><?php echo $pop->simbolo_moneda.($pop->bonificacion); ?></b>"></i> </div>
                </div>
              </div>
            </div>
            
            <!-- end: item -->
            <?php endforeach; ?>
          </div>
          <!-- end: no destacados -->
          <?php endif; ?>
          
          
        </div>
                         <?php $this->load->view('templates/pager'); ?>
        
      </div>
      
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT --> 
  </div>
</div>
<?php $this->load->view('templates/footer'); ?>
<script language="javascript">
$(document).ready(function(e) {
	$('.slider-for').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		nextArrow: '<i class="fa fa-angle-right"></i>',
		prevArrow: '<i class="fa fa-angle-left"></i>',
		dots: true
	});
	$('[data-toggle="tooltip"]').tooltip()
});
</script> 
