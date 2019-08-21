<?php $this->load->view('templates/header'); ?>

<div class="container-fluid programs-page-int">
  <div class="page-content white"> 
    <?php $this->load->view('templates/breadcrumb_secciones'); ?>
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
      <div class="page-content-row"> 
        <!-- BEGIN PAGE SIDEBAR -->
        <div class="page-sidebar">
          <nav class="navbar" role="navigation" > 
            <!-- Brand and toggle get grouped for better mobile display --> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav margin-bottom-35" >
            <?php if ($programas): $count = 0; ?>
              <li class="bg-blue-chambray" > <a href="#" class="bg-blue-chambray font-white">PROGRAMAS VIGENTES</a> </li>
           
            <?php foreach ($programas as $prog): $count++; ?>
              <li <?php if ($prog->id_incentivo==$programa->id_incentivo): ?> class="active" <?php endif; ?>> <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $prog->id_incentivo; ?>/<?php echo $prog->url_titulo; ?>"> <?php echo $prog->titulo; ?></a> </li>
           <?php endforeach; ?>
           <?php endif; ?>
             
               <li class="" style="margin-bottom:60px"> &nbsp;</li>
             
              <?php if ($programas_pasados): $count = 0; ?>
              <li class="bg-blue-chambray" > <a href="#" class="bg-blue-chambray font-white">PROGRAMAS PASADOS</a> </li>
           
            <?php foreach ($programas_pasados as $prog): $count++; ?>
              <li <?php if ($prog->id_incentivo==$programa->id_incentivo): ?> class="active" <?php endif; ?>> <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $prog->id_incentivo; ?>/<?php echo $prog->url_titulo; ?>"> <?php echo $prog->titulo; ?></a> </li>
           <?php endforeach; ?>
           <?php endif; ?>
           
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
              <?php
				  if ($programa_imagenes): ?>
                  
                <!-- START CAROUSEL -->
                <div id="carousel-programs-int" class="carousel slide" data-ride="carousel"  style="overflow:hidden"> 
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                   <?php
				    $count=0;
					 foreach ($programa_imagenes as $img):  ;?>
                    <li data-target="#carousel-programs-int" data-slide-to="<?php echo $count; ?>" <?php if ($count == 0): ?>class="active"<?php endif; ?>></li>
                    
                    <?php $count++;
					endforeach; ?>
                  </ol>
                  
                  <!-- Wrapper for slides -->
                  
                  <div class="carousel-inner" role="listbox" >
                  
                  <?php
				   $count=0;
				   foreach ($programa_imagenes as $img): ?>
                    <div class="item <?php if ($count == 0): ?>active<?php endif; ?>"> <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/1600x747-1/biblioteca/<?php echo $img->archivo_nombre; ?>" alt="<?php echo $img->nombre; ?>" >
                      <?php if ($img->nombre != ""): ?>
                      <div class="carousel-caption">
                        <h2><?php echo $img->nombre; ?></h2>
                      </div>
                    	<?php endif; ?>
                    </div>
                  <?php  $count++;
				  endforeach; ?>
                  </div>
                  
                  <!-- Controls --> 
                  <a class="left carousel-control" href="#carousel-programs-int" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-programs-int" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                <!-- END CAROUSEL --> 
                <?php endif; ?>
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
                  <div class="caption"> <span class="caption-subject  bold "><?php echo $programa->contenido_titulo; ?></span> </div>
                </div>
                <div class="portlet-body util-btn-margin-bottom-5">
                 <?php echo $programa->contenido_texto; ?>
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
                      <td>Hasta <?php echo fecha($programa->vigencia_hasta); ?></td>
                    </tr>
                    <?php
					if ($programa_documentos): 
					 ?>
                    <tr>
                    
                      <td colspan="2"><strong>Documentos</strong></td>
                      </tr>
                    <?php foreach ($programa_documentos as $doc): ?>  
                      <tr><td colspan="2"><a href="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $doc->archivo_nombre; ?>" class="descarga"><i class="fa fa-file-pdf-o"> </i> <span><?php echo $doc->nombre; ?></span></a></td> </tr>
                    <?php endforeach; ?>
                   
                    <?php
					endif; ?>
                  </table>
                </div>
              </div>
            </div>
            <!-- END FFF ---> 
            
          </div>
          
          <?php if ($programa->info_ganadores_titulo != ""): ?>
           <!-- START ROW -->
          <div class="row"> 
            
            <!-- START FFF --->
            <div class="col-md-7">
              <div class="portlet light">
                <div class="portlet-title">
                  <div class="caption"> <span class="caption-subject  bold "><?php echo $programa->info_ganadores_titulo; ?></span> </div>
                </div>
                <div class="portlet-body util-btn-margin-bottom-5">
                  <?php echo $programa->info_ganadores_texto; ?>
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
               
                    <?php
					if ($programa_documentos_ganadores): 
					 ?>
                    <tr>
                    
                      <td colspan="2"><strong>Documentos ganadores</strong></td>
                      </tr>
                    <?php foreach ($programa_documentos_ganadores as $doc): ?>  
                      <tr><td colspan="2"><a href="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $doc->archivo_nombre; ?>" class="descarga"><i class="fa fa-file-pdf-o"> </i> <span><?php echo $doc->nombre; ?></span></a></td> </tr>
                    <?php endforeach; ?>
                   
                    <?php
					endif; ?>
                  </table>
                </div>
              </div>
            </div>
            <!-- END FFF ---> 
            
          </div>
        </div>
        
        <!-- END ROW --> 
        <?php endif; ?>
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
