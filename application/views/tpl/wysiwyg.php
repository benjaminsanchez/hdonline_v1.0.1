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
        <!-- FILTER --> 
        <!-- END FILTER -->
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="portlet light portlet-fit">
              <div class="portlet-body font-blue-dark">
                <h4 class="caption-subject bold"><?php echo $seccion->nombre; ?></h4>
                <div class="caption-desc ">
                 <?php echo $seccion->contenido_enriquecido; ?>
                </div>
              </div>
            </div>
          </div>
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