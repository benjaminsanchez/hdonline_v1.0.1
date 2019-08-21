<?php $this->load->view('templates/header'); ?>
<?php $arr_video = explode("|",$ext_video);  ?>

<div class="container-fluid">
  <div class="page-content white">
    <?php $this->load->view('templates/breadcrumb_secciones'); ?>
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
      <div class="page-content-row">
        <?php $this->load->view("templates/sidebar_tpl.php"); ?>
        <div class="page-content-col"> 
          <!-- BEGIN PAGE BASE CONTENT -->
          <div class="blog-page blog-content-1" id="start-gallery"> 
            
            <!-- FILTER --> 
            <!-- END FILTER -->
            <div class="row">
              <div class="col-md-8"> 
                <!-- START ITEM -->
                <div class="wrap-event">
                  <h3> <span class="badge badge-roundless bg-blue-oleo"> <?php echo $L["novedad"]; ?> </span><br>
                    <?php echo $novedad->titulo; ?></h3>
                  
                  <!-- star galery -->
                  
                  <div class="slider slider-for">
                  <?php if (count($novedad_imagenes)==0): ?>
                    <div><img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/1024x600-1/biblioteca/<?php echo $novedad->archivo_nombre; ?>" width="100%"></div>
                    <?php endif; ?>
                    <?php if ($novedad_imagenes): ?>
                    <?php foreach ($novedad_imagenes as $img): ?>
                    <div>
                      <?php if (in_array(extension($img->archivo_nombre),$arr_video)): ?>
                       <!-- controlsList="nodownload" -->
                      <video controls  width="100%" style=";width:100%; height: 100%;">
                        <source src="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $img->archivo_nombre; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                        </source>
                      </video>
                      <?php else: ?>
                      <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/1024x600-1/biblioteca/<?php echo $img->archivo_nombre; ?>" width="100%">
                      <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                  <?php if (count($novedad_imagenes)>0): ?>
                  <div class="slider slider-nav">
               
                    <?php if ($novedad_imagenes): ?>
                    <?php foreach ($novedad_imagenes as $img): ?>
                    <div><a href="javascript:void(0)">
                      <?php if (in_array(extension($img->archivo_nombre),$arr_video)): ?>
                       <!-- controlsList="nodownload" -->
                      <video controls width="100%" style="margin: 0px 0px;width:100%; height: 100%;">
                        <source src="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $img->archivo_nombre; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                        </source>
                      </video>
                      <?php else: ?>
                      <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/320x190-1/biblioteca/<?php echo $img->archivo_nombre; ?>" width="100%">
                      <?php endif; ?>
                      </a></div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                  <?php endif; ?>
                  
                  <!-- end gallery -->
                  
                  <div class="blox-text font-blue-oleo"> <?php echo $novedad->texto; ?> </div>
                  <?php 
				  if ($novedad_archivos): ?>
                  <div class="wrap-event-docu border-default"> <span class="badge badge-roundless bg-blue-oleo"> <?php echo $L["documentos_asignados"]; ?> </span>
                    <table class="font-blue-oleo">
                      <?php foreach ($novedad_archivos as $arc): ?>
                      <tr>
                        <td><?php echo $arc->nombre; ?></td>
                        <td align="right"><?php echo peso_archivo($arc->archivo_peso); ?> &nbsp; </td>
                        <td><a href="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $arc->archivo_nombre; ?>" class="font-blue-oleo" target="_blank"><i class="fa fa-download"></i></a></td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                  <?php endif; ?>
                </div>
                
                <!-- END ITEM --> 
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12">
                    <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                    <div class="btn-group pull-left">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li> <a href="<?php echo base_url(); ?>edit/novedades?id_novedad=<?php echo $novedad->id_novedad; ?>"><?php echo $L["editar"]; ?></a></li>
                        <?php if ($novedad->mantener_arriba == "0"): ?>
                        <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["enviar_arriba_listado"]; ?>" data-accion="mantener_arriba" data-table="novedades" data-key="id_novedad" data-id="<?php echo $novedad->id_novedad; ?>" class="btn_accion_ajax"><?php echo $L["enviar_arriba_listado"]; ?> </a></li>
                        <?php endif; ?>
                        <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="novedades" data-key="id_novedad" data-id="<?php echo $novedad->id_novedad; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>delete/novedades?id_novedad=<?php echo $novedad->id_novedad; ?>"><?php echo $L["eliminar"]; ?></a></li>
                      </ul>
                    </div>
                    <?php endif; ?>
                    <button type="button" class="btn blue-oleo pull-right" onClick="window.history.back()"  > <?php echo $L["volver"]; ?> </button>
                  </div>
                </div>
                <?php if ($novedades): ?>
                <div class="wrap-event-submit border-default">
                  <h5 class="font-blue-dark text-left bold"><?php echo $L["entradas_recientes"]; ?></h5>
                  <ul class="font-default">
                    <?php foreach ($novedades as $nov): ?>
                    <?php if ($nov->id_novedad != $novedad->id_novedad): ?>
                    <li><a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $nov->id_novedad; ?>/<?php echo $nov->url_titulo; ?>" class="font-blue"><?php echo $nov->titulo; ?></a></li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <?php endif; ?>
              </div>
            </div>
            
            <!-- END FILTER --> 
            
          </div>
          <!-- END PAGE BASE CONTENT --> 
        </div>
      </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT --> 
  </div>
</div>
<?php $this->load->view('templates/footer'); ?>
<script language="javascript">
$(document).ready(function(e) {
	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
		infinite: false,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: true,
		infinite: false,
	  centerMode: false,
	  focusOnSelect: true
	});
	
	  $("#btn_sesion").on('click', function() {
		  $("#sesiones").toggle(400);
	  }); 
	  $("#btn_asistir").on('click', function() {
		  document.location.href='<?php echo base_url(); ?>events/view/1?inscrito=1';
	  });
});
</script>