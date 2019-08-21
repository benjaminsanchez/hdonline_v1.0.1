<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
<div class="page-content white">
<?php $this->load->view('templates/breadcrumb_secciones'); ?>
<!-- BEGIN SIDEBAR CONTENT LAYOUT -->
<div class="page-content-container">
  <div class="page-content-row">
    <?php $this->load->view("templates/sidebar_tpl.php"); ?>
    <div class="page-content-col"> 
      <!-- BEGIN PAGE BASE CONTENT -->
      <div class="blog-page blog-content-1"> 
        
        <!-- FILTER -->
        <?php $this->load->view("templates/filters"); ?>
        <!-- END FILTER -->
        
        <div class="col-md-12">
          <div class="breadcrumbs">
            <h1 class="relative"><?php echo $L["promociones_vigentes"]; ?></h1>
          </div>
        </div>
        <?php
			if ($promociones_vigentes):
				foreach ($promociones_vigentes as $prom): ?>
        
        <!-- START ITEM -->
        <div class="col-md-4">
          <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/620x400-2/biblioteca/<?php echo $prom->archivo_nombre; ?>'); height: 15vw;"> 
            <!-- blog config -->
            <div class="blog-config">
              <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
              <div class="btn-group">
                <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li> <a href="<?php echo base_url(); ?>edit/promociones?id_promocion=<?php echo $prom->id_promocion; ?>"><?php echo $L["editar"]; ?></a></li>
                  <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="promociones" data-key="id_promocion" data-id="<?php echo $prom->id_promocion; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                  <li> <a href="<?php echo base_url(); ?>delete/promociones?id_promocion=<?php echo $prom->id_promocion; ?>"><?php echo $L["eliminar"]; ?></a></li>
                </ul>
              </div>
              <?php endif; ?>
            </div>
            <!-- end blog config -->
            
            <div class="blog-data-container no-bg"> <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $prom->id_promocion; ?>/<?php echo $prom->url_titulo; ?>"> 
              <!--  <div class="blog-title">
                    <h4 class="blog-banner-title"><?php echo $prom->titulo; ?></h4>
                    <h5><?php echo fecha($prom->fecha_publicacion); ?></h5>
                </div>--> 
              </a> </div>
          </div>
          </div>
          <!-- END ITEM -->
          <?php
			   	endforeach;
			endif; ?>
          <?php if (count($promociones_pasadas)>0): ?>
          <div class="col-md-12">
            <div class="breadcrumbs">
              <h1 class="relative"><?php echo $L["promociones_pasadas"]; ?></h1>
            </div>
          </div>
          <?php
			if ($promociones_pasadas):
				foreach ($promociones_pasadas as $prom): ?>
          
          <!-- START ITEM -->
          <div class="col-md-4">
            <div class="blog-banner blog-container" style=" height: 15vw;">  <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $prom->id_promocion; ?>/<?php echo $prom->url_titulo; ?>"> <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/620x400-2/biblioteca/<?php echo $prom->archivo_nombre; ?>" width="100%" height="100%" class="img-grayscale"></a>
              <!-- blog config -->
              <div class="blog-config">
                <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                <div class="btn-group">
                  <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li> <a href="<?php echo base_url(); ?>edit/promociones?id_promocion=<?php echo $prom->id_promocion; ?>"><?php echo $L["editar"]; ?></a></li>
                    <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="promociones" data-key="id_promocion" data-id="<?php echo $prom->id_promocion; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                    <li> <a href="<?php echo base_url(); ?>delete/promociones?id_promocion=<?php echo $prom->id_promocion; ?>"><?php echo $L["eliminar"]; ?></a></li>
                  </ul>
                </div>
                <?php endif; ?>
              </div>
              <!-- end blog config -->
              <!--
              <div class="blog-data-container no-bg"> <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $prom->id_promocion; ?>/<?php echo $prom->url_titulo; ?>"> 
                <!--  <div class="blog-title">
                    <h4 class="blog-banner-title"><?php echo $prom->titulo; ?></h4>
                    <h5><?php echo fecha($prom->fecha_publicacion); ?></h5>
              </div>
             
                </a> </div>-->
            </div>
            </div>
            <!-- END ITEM -->
            <?php
			   	endforeach;
			endif; ?>
            <?php endif; // count promociones pasadas ?>
            <div class="row">
              <div class="col-md-12"> 
                <!-- START PAGINATION -->
                <?php $this->load->view('templates/pager'); ?>
                <!-- END PAGINATION --> 
                
              </div>
            </div>
          </div>
          <!-- END PAGE BASE CONTENT --> 
        </div>
      </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT --> 
  </div>
</div>
<?php $this->load->view('templates/footer'); ?>
<script>
$(".blog-data-container").not(".blog-config").on("click", function() {
	var href = $(this).find("a").attr("href");	
	document.location.href = href;

});
</script>