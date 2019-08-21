<?php $this->load->view('templates/header'); ?>

<div class="container-fluid programs-page-int">
  <div class="page-content white"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>dashboard">HunterDouglas</a> </li>
        <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
        <li > <a href="<?php echo base_url(); ?>programs/list"> Programas de incentivo</a> </li>
        <li class="active">Nombre del programa</li>
      </ol>
      <h1>PROGRAMA DE INCENTIVO</h1>
    </div>
    <!-- END BREADCRUMBS --> 
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
      <div class="page-content-row"> 
        <!-- BEGIN PAGE SIDEBAR -->
        <div class="page-sidebar">
          <nav class="navbar" role="navigation" > 
            <!-- Brand and toggle get grouped for better mobile display --> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav margin-bottom-35" >
              <li class="bg-blue-chambray" > <a href="#" class="bg-blue-chambray font-white">PROGRAMAS VIGENTES</a> </li>
              <li class="active"> <a href="#"> Ventana al paraíso </a> </li>
              <li> <a href="#"> Lorem ipsum A </a> </li>
              <li> <a href="#"> Lorem ipsum B </a> </li>
            </ul>
          </nav>
          <nav class="navbar" role="navigation" > 
            <!-- Brand and toggle get grouped for better mobile display --> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav margin-bottom-35" >
              <li> <a href="#" class="bg-blue-chambray font-white">PROGRAMAS PASADOS</a> </li>
              <li> <a href="#"> Lorem ipsum A </a> </li>
              <li> <a href="#"> Lorem ipsum B </a> </li>
              <li> <a href="#"> Lorem ipsum C </a> </li>
              <li> <a href="#"> Lorem ipsum D </a> </li>
            </ul>
          </nav>
        </div>
        <!-- END PAGE SIDEBAR -->
        <div class="page-content-col"> 
          <!-- BEGIN PAGE BASE CONTENT -->
          <div class="blog-page blog-content-1 program-page"> 
            <!-- START ROW -->
            <div class="row">
              <div class="col-md-12" > 
                <!-- START CAROUSEL -->
                <div id="carousel-programs-int" class="carousel slide" data-ride="carousel"  style="overflow:hidden"> 
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-programs-int" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-programs-int" data-slide-to="1"></li>
                    <li data-target="#carousel-programs-int" data-slide-to="2"></li>
                  </ol>
                  
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox" >
                    <div class="item active"> <img src="<?php echo base_url(); ?>imgtmp/programs/1600x700-1/05.jpg" alt="..." >
                      <div class="carousel-caption">
                        <h2>Ventana al paraíso</h2>
                      </div>
                    </div>
                    <div class="item"> <img src="<?php echo base_url(); ?>imgtmp/programs/1600x700-1/01.jpg" alt="..." >
                      <div class="carousel-caption">
                        <h2>Ventana al paraíso</h2>
                      </div>
                    </div>
                    <div class="item"> <img src="<?php echo base_url(); ?>imgtmp/programs/1600x700-1/03.jpg" alt="..." >
                      <div class="carousel-caption">
                        <h2>Ventana al paraíso</h2>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Controls --> 
                  <a class="left carousel-control" href="#carousel-programs-int" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-programs-int" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                <!-- END CAROUSEL --> 
              </div>
            </div>
          </div>
          <!-- END ROW--> 
          <!-- START ROW -->
          <div class="row">
            <div class="col-md-12">
              <div class="wrap-box-border"> 
                <!-- START TABMAIN CONTENT -->
                <div class="tabbable-line">
                  <ul class="nav nav-tabs" style="border-bottom: 1px solid #F2F3F3">
                    <li class="active"> <a href="#documentos_1" data-toggle="tab" class="bold"> Meta 1 </a> </li>
                    <li> <a href="#documentos_2" data-toggle="tab" class="bold"> Meta 2 </a> </li>
                  </ul>
                  <div class="portlet-body">
                    <div class="tab-content"> 
                      
                      <!-- START: TAB CONTENT -->
                      <div class="tab-pane active" id="documentos_1" >
                        <div class="program-meta">$19.849.214</div>
                        <div class="program-pending">Falta para la meta 1 <span class="bold">$14.140.676</span></div>
                        <div class="program-status">
                          <div class="percent bold">48%</div>
                          <div class="bar" >
                            <div class="fullbar"></div>
                          </div>
                        </div>
                        <div class="clear">&nbsp;</div>
                        <div class="program-info">Compra acumulada al 15 de diciembre del 2016</div>
                      </div>
                      <!-- END TAB CONTENT --> 
                      <!-- START: TAB CONTENT -->
                      <div class="tab-pane" id="documentos_2" >
                        <div class="program-meta">$23.223.110</div>
                        <div class="program-pending">Falta para la meta 1 <span class="bold">$10.140.222</span></div>
                        <div class="program-status">
                          <div class="percent bold">70%</div>
                          <div class="bar" >
                            <div class="fullbar" style="width:70%"></div>
                          </div>
                        </div>
                        <div class="clear">&nbsp;</div>
                        <div class="program-info">Compra acumulada al 15 de diciembre del 2016</div>
                      </div>
                      <!-- END TAB CONTENT --> 
                      
                    </div>
                  </div>
                </div>
                <!-- END TABMAIN CONTENT --> 
              </div>
            </div>
          </div>
          <!-- END ROW --> 
          
          <!-- START ROW -->
          <div class="row"> 
            
            <!-- START FFF --->
            <div class="col-md-7">
              <div class="portlet light">
                <div class="portlet-title">
                  <div class="caption"> <span class="caption-subject  bold ">VENTANA AL PARAÍSO</span> </div>
                </div>
                <div class="portlet-body util-btn-margin-bottom-5">
                  <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim nibh at tincidunt consectetur. Proin pulvinar tellus a neque semper lacinia. Nullam quam enim, pharetra a fringilla id, sagittis eget nisi. Praesent tortor ex, aliquet sed pretium id, laoreet eu dui. Sed suscipit metus sit amet sollicitudin ornare. Nulla facilisi. Aliquam non magna a nisl tempor fermentum id non dolor.</p>
                  <P> Ut ac lobortis ipsum, non suscipit mauris. Praesent dignissim urna non sem tincidunt, vel congue neque varius. Vestibulum eleifend magna urna, ac ultrices tellus egestas vel. Proin rutrum tellus et leo imperdiet tincidunt. Nam vel massa in neque rhoncus blandit quis et metus.</p>
                </div>
              </div>
            </div>
            <!-- END FFF ---> 
            
            <!-- START FFF --->
            <div class="col-md-5">
              <div class="portlet light">
                <div class="portlet-title">
                  <div class="caption"> <span class="caption-subject  bold ">DETALLE DEL PROGRAMA</span> </div>
                </div>
                <div class="portlet-body util-btn-margin-bottom-5 bordered">
                  <table class="detail">
                    <tr >
                      <td>Vigencia</td>
                      <td>Hasta 25 de septiembre 2017</td>
                    </tr>
                    <tr>
                      <td>Bases</td>
                      <td><a href="#" class="descarga"><i class="fa fa-file-pdf-o"></i></a></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- END FFF ---> 
            
          </div>
          
           <!-- START ROW -->
          <div class="row"> 
            
            <!-- START FFF --->
            <div class="col-md-7">
              <div class="portlet light">
                <div class="portlet-title">
                  <div class="caption"> <span class="caption-subject  bold ">GANADORES DEL PROGRAMA</span> </div>
                </div>
                <div class="portlet-body util-btn-margin-bottom-5">
                  <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim nibh at tincidunt consectetur. Proin pulvinar tellus a neque semper lacinia. Nullam quam enim, pharetra a fringilla id, sagittis eget nisi. Praesent tortor ex, aliquet sed pretium id, laoreet eu dui. Sed suscipit metus sit amet sollicitudin ornare. Nulla facilisi. Aliquam non magna a nisl tempor fermentum id non dolor.</p>
                </div>
              </div>
            </div>
            <!-- END FFF ---> 
            
            <!-- START FFF --->
            <div class="col-md-5">
              <div class="portlet light">
                <div class="portlet-title">
                  <div class="caption"> <span class="caption-subject  bold ">ESPECIFICACIONES</span> </div>
                </div>
                <div class="portlet-body util-btn-margin-bottom-5 bordered">
                  <table class="detail">
                    <tr >
                      <td>Consultas</td>
                      <td>562 2 2555 7777</td>
                    </tr>
                    <tr>
                      <td>Ficha</td>
                      <td><a href="#" class="descarga"><i class="fa fa-file-pdf-o"></i></a></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- END FFF ---> 
            
          </div>
        </div>
        
        <!-- END ROW --> 
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
		$('#carousel-programs').carousel({
		 interval: 5000
		})
		$(".carousel-inner").height($(".carousel-inner .item img").height());
		</script> 
