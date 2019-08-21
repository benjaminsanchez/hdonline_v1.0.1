<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
<div class="page-content white"> 
  <!-- BEGIN BREADCRUMBS -->
  <div class="breadcrumbs">
    <ol class="breadcrumb">
      <li> <a href="<?php echo base_url(); ?>dashboard">HunterDouglas</a> </li>
      <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
      <li class="active">Promociones</li>
    </ol>
    <h1>Promociones</h1>
  </div>
  <!-- END BREADCRUMBS --> 
  <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
  <div class="page-content-container">
    <div class="page-content-row"> 
      <!-- BEGIN PAGE SIDEBAR -->
      <div class="page-sidebar">
        <nav class="navbar" role="navigation"> 
          <!-- Brand and toggle get grouped for better mobile display --> 
          <!-- Collect the nav links, forms, and other content for toggling -->
          <ul class="nav navbar-nav margin-bottom-35">
            <li class="active" > <a href="#"> Inicio </a> </li>
            <li> <a href="#"> Catálogo de Oportunidades </a> </li>
            <li> <a href="#"> Promociones </a> </li>
          </ul>
        </nav>
      </div>
      <!-- END PAGE SIDEBAR -->
      <div class="page-content-col"> 
        <!-- BEGIN PAGE BASE CONTENT --> 
        <!-- FILTER --> 
        <!-- END FILTER -->
        <div class="row">
          <div class="col-md-7 col-xs-12">
            <div class="portlet light portlet-fit">
              <div class="portlet-body font-blue-dark">
                
                <h4 class="caption-subject bold">Bienvenido a promociones</h4>
                <div class="caption-desc ">
                  <p>En esta sección encontrarás simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum. </p>
                </div>
              </div>
            </div>
            
          </div><div class="col-md-5"> <div class="portlet light portlet-fit">
              <div class="portlet-body font-blue-dark"> <br><br> <img src="<?php echo base_url(); ?>assets/custom/img/gallery/promo1.png" width="312" height="260"  alt=""/></div></div></div>
        </div>
        <!-- END PAGE BASE CONTENT --> 
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
						  asNavFor: '.slider-nav'
						});
						$('.slider-nav').slick({
						  slidesToShow: 4,
						  slidesToScroll: 1,
						  asNavFor: '.slider-for',
						  dots: false,
						  centerMode: true,
						  focusOnSelect: true
						});
						
						
                    });
					</script>