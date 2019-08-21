<?php $this->load->view('templates/header'); ?>
<?php if (@$usuarioPerfil->acceso_epedidos == "on" && @$token_epedidos == "" && @$token_destruido == ""  ): ?>
<div id="acceso_epedidos" style="display:none">E-PEDIDOS</div>
<?php endif; ?>
<div class="container-fluid">
<!-- BEGIN IMAGEN PRINCIPAL
<div class="dashboard-mainimg" style="background:url('<?php echo base_url(); ?>/assets/custom/img/dashboard/bg01.jpg')">
  <div class="info-box">
    <h1>Full aviso Destacado, configurado en alertas</h1>
    <button type="button" class="btn btn blue btn-lg pad"> VER MÁS </button>
  </div>
</div>
<!-- END IMAGEN PRINCIPAL  -->
<?php if ($slider): $countslide=0;  ?>
<!-- START CAROUSEL -->
<div id="carousel-programs-int" class="carousel slide slide_home" data-ride="carousel"  style="overflow:hidden"> 
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php
		$count1=0; 
		foreach ($slider as $slide): $count1++; ?>
    <li data-target="#carousel-programs-int" data-slide-to="<?php echo $countslide; ?>" <?php if ($count1 == 1): ?> class="active"<?php endif; ?>></li>
    <?php 	$countslide++;
   		 endforeach; ?>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner dashboard" role="listbox" >
    <?php 
	$countslide=0; 
	foreach ($slider as $slide): $countslide++;  ?>
    <!-- item -->
    <?php if ($slide->archivo_nombre != ""): ?>
    <div class="item <?php echo ($countslide == 1)? "active": ""; ?>"> <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/1900x550-1/biblioteca/<?php echo $slide->archivo_nombre; ?>" alt="<?php echo $slide->titulo; ?>">
     <!-- <div class="blacklayer"></div>-->
      <div class="carousel-caption">
        <div class="info-box">
          <h2><?php echo $slide->titulo; ?></h2>
          <?php if ($slide->texto_boton != ""): ?>
          <button type="button" class="btn btn blue" <?php if ($slide->destino != "_blank"): ?>onClick="window.location.href='<?php echo $slide->url; ?>'" <?php else: ?> onClick="window.open('<?php echo $slide->url; ?>');"<?php endif; ?>> <?php echo $slide->texto_boton; ?></button>
          <?php endif; ?>
        </div>
      </div>
          <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
    <div class="slide_home-config">
 
      <div class="btn-group">
        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
        <ul class="dropdown-menu pull-right" role="menu">
          <li> <a href="<?php echo base_url(); ?>edit/slider_home/?id_slider_home=<?php echo $slide->id_slider_home; ?>">Editar</a></li>
         <!-- <li> <a href="javascript:;" data-nombre_accion="Marcar como borrador"  data-accion="borrador" data-table="slider_home" data-key="id_slider_home" data-id="<?php echo $slide->id_slider_home; ?>" class="btn_accion_ajax">Borrador</a></li>-->
          <li> <a href="<?php echo base_url(); ?>delete/slider_home?id_slider_home=<?php echo $slide->id_slider_home; ?>">Eliminar</a></li>
           <li> <a href="<?php echo base_url(); ?>list/slider_home">Ver listado</a></li>
        </ul>
      </div>
    </div> 
    <?php endif; ?>
    </div>

    <?php endif; ?>
    <!-- end item -->
    <?php 
	endforeach; ?>
      <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
    <!-- add-->
    <div class="slide_home-add">
       <a href="<?php echo base_url(); ?>add/slider_home" >
<i class="fa fa-plus-circle"></i>
</a>
</div>
    <!-- end: add-->
    <?php endif; ?>
  </div>
  
  <!-- Controls --> 
  <!--
  <a class="left carousel-control" href="#carousel-programs-int" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-programs-int" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>--> </div>
<?php endif; ?>
<!-- END CAROUSEL -->

<div class="page-content paddingtop dashboard-boxes">
  <?php $this->load->view('templates/dashboard/box_master'); ?>
  <?php /*
  <div class="row">
    <?php $this->load->view('templates/dashboard/box_novedades'); ?>
    <?php  $this->load->view('templates/dashboard/box_eventos'); ?>
  </div>
  <div class="row">
    <?php $this->load->view('templates/dashboard/box_promociones'); ?>
    <?php $this->load->view('templates/dashboard/box_programas'); ?>
  </div>
  <div class="row">
    <?php $this->load->view('templates/dashboard/box_academia'); ?>
    <?php $this->load->view('templates/dashboard/box_documentos'); ?>
  </div>
 */
 ?>
  <div class="row text-center margin-top-20"> &nbsp; </div>
  <!-- END PAGE BASE CONTENT --> 
</div>
<?php $this->load->view('templates/footer'); ?>
<script language="javascript">
$(document).ready(function(e) {

	$('.slider-tab').slick({
	 slidesToShow: 4, 
	  slidesToScroll: 1,
	  arrows: true,
  	  variableWidth: true,
	  infinite: false,
	  focusOnSelect: true
	});
	
	$(".slider-tab li").on('click', function() {
		var id_ul = ($(this).parent().parent().parent().attr("id"));
		$("#"+id_ul+" li").removeClass("active");
	});

});
</script>