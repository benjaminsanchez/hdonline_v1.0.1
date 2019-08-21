<?php $this->load->view('templates/header'); ?>

<div class="container-fluid programs-page">
  <div class="page-content white">
    <?php $this->load->view('templates/breadcrumb_secciones'); ?>
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container"> 
      <!-- BEGIN PAGE BASE CONTENT -->
      <div class="blog-page blog-content-1"> 
        
        <!-- FILTER -->
        <?php // $this->load->view("templates/filters"); ?>
        <!-- END FILTER -->
        
        <?php
		
			if ($programas):
				
				 ?>
        <!-- START CAROUSEL -->
        <div class="row">
          <div id="carousel-programs" class="carousel slide" data-ride="carousel" style=" position:relative">
            <?php if (count($programas)>1): ?>
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php   
				$count = 0;
				foreach ($programas as $prog): $count++; ?>
              <li data-target="#carousel-programs" data-slide-to="0" class="<?php if ($count==1): echo "active"; endif; ?>"></li>
              <?php endforeach; ?>
            </ol>
            <?php endif; ?>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="">
              <?php
		   		  $count = 0; 
		   		  foreach ($programas as $prog): $count++; ?>
              <!-- item -->
              <div class="item <?php if ($count==1): echo "active"; endif; ?>">
                <div class="col-md-12 subitem">
                  <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                  <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                      <li> <a href="<?php echo base_url(); ?>edit/incentivos?id_incentivo=<?php echo $prog->id_incentivo; ?>"><?php echo $L["editar"]; ?></a></li>
                      <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="incentivos" data-key="id_incentivo" data-id="<?php echo $prog->id_incentivo; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                      <li> <a href="<?php echo base_url(); ?>delete/incentivos?id_incentivo=<?php echo $prog->id_incentivo; ?>"><?php echo $L["eliminar"]; ?></a></li>
                    </ul>
                  </div>
                  <?php endif; ?>
                  <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $prog->id_incentivo; ?>/<?php echo $prog->url_titulo; ?>"> <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/1900x822-1/biblioteca/<?php echo $prog->archivo_nombre; ?>">
                  <div class="carousel-caption">
                    <h2> <?php echo $prog->titulo; ?></h2>
                    Finaliza <?php echo fecha($prog->vigencia_hasta); ?> </div>
                  </a> </div>
              </div>
              <!-- item -->
              <?php endforeach; ?>
            </div>
            <?php if (count($programas)>1): ?>
            <!-- Controls --> 
            <a class="left carousel-control" href="#carousel-programs" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-programs" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
        <div class="row margin-top-20">
          <div class="col-md-12">&nbsp;</div>
        </div>
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
          <h1 class="relative">PROGRAMAS FINALIZADOS</h1>
        </div>
        <!-- END BREADCRUMBS --> 
        <!-- END CAROUSEL -->
        <div class="row older">
          <div class="col-md-6"> 
            <!-- START ITEM -->
            <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/1900x822-1/biblioteca/<?php echo $programas_pasados[0]->archivo_nombre; ?>');  width: 100%;height: 23vw;">
              <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
              <div class="btn-group">
                <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li> <a href="<?php echo base_url(); ?>edit/incentivos?id_incentivo=<?php echo $programas_pasados[0]->id_incentivo; ?>"><?php echo $L["editar"]; ?></a></li>
                  <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="incentivos" data-key="id_incentivo" data-id="<?php echo $programas_pasados[0]->id_incentivo; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                  <li> <a href="<?php echo base_url(); ?>delete/incentivos?id_incentivo=<?php echo $programas_pasados[0]->id_incentivo; ?>"><?php echo $L["eliminar"]; ?></a></li>
                </ul>
              </div>
              <?php endif; ?>
              <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $programas_pasados[0]->id_incentivo; ?>/<?php echo $programas_pasados[0]->url_titulo; ?>">
              <div class="blog-data-container">
                <h4 class="blog-title blog-banner-title"><?php echo $programas_pasados[0]->titulo; ?><br>
                  <span>Finalizó <?php echo fecha($programas_pasados[0]->vigencia_hasta); ?> </span> </h4>
              </div>
              </a> </div>
            <!-- END ITEM --> 
          </div>
          <div class="col-md-6"> 
            <!-- START ITEM -->
            <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/1900x822-1/biblioteca/<?php echo $programas_pasados[1]->archivo_nombre; ?>');width: 100%;height: 23vw;">
              <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
              <div class="btn-group">
                <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li> <a href="<?php echo base_url(); ?>edit/incentivos?id_incentivo=<?php echo $programas_pasados[1]->id_incentivo; ?>"><?php echo $L["editar"]; ?></a></li>
                  <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="incentivos" data-key="id_incentivo" data-id="<?php echo $programas_pasados[1]->id_incentivo; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                  <li> <a href="<?php echo base_url(); ?>delete/incentivos?id_incentivo=<?php echo $programas_pasados[1]->id_incentivo; ?>"><?php echo $L["eliminar"]; ?></a></li>
                </ul>
              </div>
              <?php endif; ?>
              <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $programas_pasados[1]->id_incentivo; ?>/<?php echo $programas_pasados[1]->url_titulo; ?>">
              <div class="blog-data-container">
                <h4 class="blog-title blog-banner-title"><?php echo $programas_pasados[1]->titulo; ?><br>
                  <span>Finalizó <?php echo fecha($programas_pasados[1]->vigencia_hasta); ?></span> </h4>
              </div>
              </a> </div>
            <!-- END ITEM --> 
          </div>
        </div>
      </div>
      <!-- END PAGE BASE CONTENT --> 
      
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT --> 
  </div>
</div>
<?php $this->load->view('templates/footer'); ?>
<script language="javascript">
		
		</script> 