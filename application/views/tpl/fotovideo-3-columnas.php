<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="page-content white"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
       <li> <a href="<?php echo base_url(); ?>dashboard">HunterDouglas</a> </li>
        <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
        <li class="active">Promociones </li>
      </ol>
      <h1>PROMOCIONES</h1>
    </div>
    <!-- END BREADCRUMBS --> 
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
 
            <div class="row">
              <div class="col-md-4"> 
                <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url(); ?>assets/custom/img/gallery/01.jpg); height:300px">
               <img src="<?php echo base_url(); ?>assets/custom/img/play.png" class="play">
                  <div class="blog-data-container">
                    <h3 class="blog-title blog-banner-title">Texto video </h3>
                    <!-- blog config -->
                    <div class="blog-config">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;">Editar</a></li>
                          <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                          <li> <a href="javascript:;">Borrador</a></li>
                          <li> <a href="javascript:;">Eliminar</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end blog config -->
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                  </div>
                </div>
                <!-- END ITEM --> </div>
              <div class="col-md-4"> <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url(); ?>assets/custom/img/gallery/04.jpg); height:300px">
                  <div class="blog-data-container">
                    <h3 class="blog-title blog-banner-title">Texto imagen</h3>
                    <!-- blog config -->
                    <div class="blog-config">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;">Editar</a></li>
                          <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                          <li> <a href="javascript:;">Borrador</a></li>
                          <li> <a href="javascript:;">Eliminar</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end blog config -->
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                  </div>
                </div>
                <!-- END ITEM --></div>
                <div class="col-md-4"> 
                <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url(); ?>assets/custom/img/gallery/02.jpg); height:300px">
                  <div class="blog-data-container">
                    <h3 class="blog-title blog-banner-title">Texto imagen </h3>
                    <!-- blog config -->
                    <div class="blog-config">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;">Editar</a></li>
                          <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                          <li> <a href="javascript:;">Borrador</a></li>
                          <li> <a href="javascript:;">Eliminar</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end blog config -->
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                  </div>
                </div>
                <!-- END ITEM --> </div>
            </div>
            
            
            
            <div class="row">
              <div class="col-md-4"> 
                <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url(); ?>assets/custom/img/gallery/02.jpg); height:300px">
              
                  <div class="blog-data-container">
                    <h3 class="blog-title blog-banner-title">Texto imagen </h3>
                    <!-- blog config -->
                    <div class="blog-config">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;">Editar</a></li>
                          <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                          <li> <a href="javascript:;">Borrador</a></li>
                          <li> <a href="javascript:;">Eliminar</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end blog config -->
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                  </div>
                </div>
                <!-- END ITEM --> </div>
              <div class="col-md-4"> <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url(); ?>assets/custom/img/gallery/01.jpg); height:300px">
                 <img src="<?php echo base_url(); ?>assets/custom/img/play.png" class="play">
                  <div class="blog-data-container">
                    <h3 class="blog-title blog-banner-title">Texto Video</h3>
                    <!-- blog config -->
                    <div class="blog-config">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;">Editar</a></li>
                          <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                          <li> <a href="javascript:;">Borrador</a></li>
                          <li> <a href="javascript:;">Eliminar</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end blog config -->
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                  </div>
                </div>
                <!-- END ITEM --></div>
                <div class="col-md-4"> 
                <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url(); ?>assets/custom/img/gallery/05.jpg); height:300px">
                  <div class="blog-data-container">
                    <h3 class="blog-title blog-banner-title">Texto imagen </h3>
                    <!-- blog config -->
                    <div class="blog-config">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;">Editar</a></li>
                          <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                          <li> <a href="javascript:;">Borrador</a></li>
                          <li> <a href="javascript:;">Eliminar</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end blog config -->
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                  </div>
                </div>
                <!-- END ITEM --> </div>
            </div>
            
            
            
            <div class="row">
              <div class="col-md-4"> 
                <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url(); ?>assets/custom/img/gallery/05.jpg); height:300px">
               
                  <div class="blog-data-container">
                    <h3 class="blog-title blog-banner-title">Texto Imagen </h3>
                    <!-- blog config -->
                    <div class="blog-config">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;">Editar</a></li>
                          <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                          <li> <a href="javascript:;">Borrador</a></li>
                          <li> <a href="javascript:;">Eliminar</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end blog config -->
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                  </div>
                </div>
                <!-- END ITEM --> </div>
              <div class="col-md-4"> <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url(); ?>assets/custom/img/gallery/03.jpg); height:300px">
                  <div class="blog-data-container">
                    <h3 class="blog-title blog-banner-title">Texto imagen</h3>
                    <!-- blog config -->
                    <div class="blog-config">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;">Editar</a></li>
                          <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                          <li> <a href="javascript:;">Borrador</a></li>
                          <li> <a href="javascript:;">Eliminar</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end blog config -->
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                  </div>
                </div>
                <!-- END ITEM --></div>
                <div class="col-md-4"> 
                <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url(<?php echo base_url(); ?>assets/custom/img/gallery/01.jpg); height:300px">
                <img src="<?php echo base_url(); ?>assets/custom/img/play.png" class="play">
                  <div class="blog-data-container">
                    <h3 class="blog-title blog-banner-title">Texto Video </h3>
                    <!-- blog config -->
                    <div class="blog-config">
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;">Editar</a></li>
                          <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                          <li> <a href="javascript:;">Borrador</a></li>
                          <li> <a href="javascript:;">Eliminar</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- end blog config -->
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                  </div>
                </div>
                <!-- END ITEM --> </div>
            </div>
            <div class="row">
              <div class="col-md-12"> 
                <!-- START PAGINATION -->
                <?php $this->load->view("templates/pagination"); ?>
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
