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
            <div class="row novedades-contenedor">
            <?php
			if ($novedades):
				foreach ($novedades as $nov): ?>
            
            <!-- START ITEM -->
            <div class="col-md-6 <?php echo "arriba-$nov->mantener_arriba"?>">
              <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/700x376-1/biblioteca/<?php echo $nov->archivo_nombre; ?>'); height:300px">
               <!-- blog config -->
                  <div class="blog-config">
                    <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                    <div class="btn-group">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li> <a href="<?php echo base_url(); ?>edit/novedades?id_novedad=<?php echo $nov->id_novedad; ?>"><?php echo $L["editar"]; ?></a></li>
                        <?php if ($nov->mantener_arriba == "1"): 
                            $arr=1;
                            
                            ?>
                        <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["enviar_arriba_listado"]; ?>" data-accion="mantener_arriba" data-table="novedades" data-key="id_novedad" data-id="<?php echo $nov->id_novedad; ?>" class="btn_accion_ajax"><?php echo $L["enviar_arriba_listado"]; ?> </a></li>
                        <?php endif; ?>
                        <li> 
                            <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="novedades" data-key="id_novedad" data-id="<?php echo $nov->id_novedad; ?>" class="btn_accion_ajax">
                            <?php echo $L["borrador"]; ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>delete/novedades?id_novedad=<?php echo $nov->id_novedad; ?>"><?php echo $L["eliminar"]; ?></a></li>
                      </ul>
                    </div>
                    <?php endif; ?>
                  </div>
                  <!-- end blog config --> 
                  
                <div class="blog-data-container"> <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $nov->id_novedad; ?>/<?php echo $nov->url_titulo; ?>">
                  <div class="blog-title">
                    <h4 class="blog-banner-title"><?php echo $nov->titulo; ?></h4>
                    <h5><?php echo fecha($nov->fecha_publicacion); ?></h5>
                  </div>
                  </a> 
                  
                </div>
              </div>
            </div>
            <!-- END ITEM -->

                <?php
			   	endforeach;
			endif; ?>
                      </div>
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
//Bsanchez     
jQuery(".novedades-contenedor").prepend(jQuery(".arriba-1"));
    
$(".blog-data-container").not(".blog-config").on("click", function() {
	var href = $(this).find("a").attr("href");	
	document.location.href = href;

});
</script>