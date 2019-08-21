<?php $this->load->view('templates/header'); ?>

<div class="container-fluid programs-page">
  <div class="page-content white"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>dashboard">HunterDouglas</a> </li>
        <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
        <li class="active">Programas de incentivo </li>
      </ol>
      
    </div>
    <!-- END BREADCRUMBS --> 
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container"> 
      <!-- BEGIN PAGE BASE CONTENT -->
      <div class="blog-page blog-content-1"> 
        
        <!-- FILTER -->
        <?php // $this->load->view("templates/filters"); ?>
        <!-- END FILTER -->
         <div class="breadcrumbs">
        
        <h1 class="relative">PROGRAMAS DE INCENTIVO</h1>
      
        </div>
        <!-- START CAROUSEL -->
        <div class="row">
          <div id="carousel-programs" class="carousel slide" data-ride="carousel" style=" position:relative"> 
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-programs" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-programs" data-slide-to="1"></li>
              <li data-target="#carousel-programs" data-slide-to="2"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox"> 
      
              
              <!-- item -->
              <div class="item">
                <div class="col-md-12 subitem"> <img src="<?php echo base_url(); ?>imgtmp/programs/1600x650-1/05.jpg">
                  <div class="carousel-caption"> <h2>Ventana al paraíso</h2>Finaliza 31/12/2017 </div>
                </div>
              </div>
              <!-- item --> 
                   
              <!-- item -->
              <div class="item">
               
                <div class="col-md-12 subitem"> <img src="<?php echo base_url(); ?>imgtmp/programs/1600x650-1/01.jpg">
                  <div class="carousel-caption"> <h2>Ventana al paraíso</h2>Finaliza 31/12/2017</div>
                </div>
              </div>
              <!-- item -->     <!-- item -->
              <div class="item active">
                <div class="col-md-12 subitem"> <img src="<?php echo base_url(); ?>imgtmp/programs/1600x650-1/03.jpg">
                  <div class="carousel-caption"> <h2>Ventana al paraíso</h2>Finaliza 31/12/2017 </div>
                </div>
              </div>
              <!-- item -->
            </div>
            
            <!-- Controls --> 
            <a class="left carousel-control" href="#carousel-programs" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-programs" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
        <div class="row margin-top-20">
          <div class="col-md-12">&nbsp;</div>
        </div>
          <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs">
        
        <h1>PROGRAMAS FINALIZADOS</h1>
      
        </div>
        <!-- END BREADCRUMBS --> 
        <!-- END CAROUSEL --> 
        <div class="row">
          <div class="col-md-6"> 
            <!-- START ITEM -->
            <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>imgtmp/programs/0x300-2/cuzco_2014.jpg'); height:300px"><a href="<?php echo base_url(); ?>programs/view/1">
              <div class="blog-data-container">
                <h4 class="blog-title blog-banner-title">Flexalum te invita<br>
                  <span>Finalizó 28/02/2017 </span> </h4>
              </div>
              </a> </div>
            <!-- END ITEM --> 
          </div>
          <div class="col-md-6"> 
            <!-- START ITEM -->
            <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>imgtmp/programs/0x300-2/st_barth_2015-1.jpg'); height:300px"> <a href="<?php echo base_url(); ?>programs/view/1">
              <div class="blog-data-container">
                <h4 class="blog-title blog-banner-title">Desafío Venta a Venta<br>
                  <span>Finalizó 28/02/2017 </span> </h4>
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