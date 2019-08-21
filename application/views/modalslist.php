<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="page-content white"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
       <li> <a href="<?php echo base_url(); ?>dashboard">HunterDouglas</a> </li>
        <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
        <li class="active">Prueba de ventanas emergentes </li>
      </ol>
      <h1>TEST MODALS</h1>
    </div>
    <!-- END BREADCRUMBS --> 
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
      <div class="page-content-row"> 
        <!-- BEGIN PAGE SIDEBAR --> 
        
        <!-- END PAGE SIDEBAR -->
        <div class="page-content-col"> 
          <!-- BEGIN PAGE BASE CONTENT -->
          <div class="row">
            <div class="col-md-12">
              <div class="portlet-body">
                <table class="table table-hover table-striped table-bordered">
                  <tr>
                    <td> Evento </td>
                    <td><a class="btn btn-outline dark" data-target="#evento" data-toggle="modal"> Ver Demo </a></td>
                  </tr>
                  <tr>
                    <td> Imagen </td>
                    <td><a class="btn btn-outline dark" data-target="#imagen" data-toggle="modal"> Ver Demo </a></td>
                  </tr>
                  <tr>
                    <td> Noticias </td>
                    <td><a class="btn btn-outline dark" data-target="#noticia" data-toggle="modal"> Ver Demo </a></td>
                  </tr>
                  <tr>
                    <td> Modal obligatoria </td>
                    <td><a class="btn btn-outline dark" data-target="#bloqueo" data-toggle="modal"> Ver Demo </a></td>
                  </tr>
                  <tr>
                    <td> Descarga de imagen </td>
                    <td><a class="btn btn-outline dark" data-target="#descarga" data-toggle="modal"> Ver Demo </a></td>
                  </tr>
              
                </table>
                
                <!-- ajax -->
                <div id="ajax-modal" class="modal fade" tabindex="-1"> </div>
                
                <!-- full width -->
                <div id="full-width" class="modal container fade" tabindex="-1">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Full Width</h4>
                  </div>
                  <div class="modal-body">
                    <p> This modal will resize itself to the same dimensions as the container class. </p>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sollicitudin ipsum ac ante fermentum suscipit. In ac augue non purus accumsan lobortis id sed nibh. Nunc egestas hendrerit ipsum, et
                      porttitor augue volutpat non. Aliquam erat volutpat. Vestibulum scelerisque lobortis pulvinar. Aenean hendrerit risus neque, eget tincidunt leo. Vestibulum est tortor, commodo nec cursus nec,
                      vestibulum vel nibh. Morbi elit magna, ornare placerat euismod semper, dignissim vel odio. Phasellus elementum quam eu ipsum euismod pretium. </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                  </div>
                </div>
                
                <!-- evento -->
                <div id="evento" class="modal container fade" tabindex="-1">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Evento</h4>
                  </div>
                  <div class="modal-body">
                    <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>imgtmp/gallery/1024x500-1/04.jpg'); background-size:cover; height:400px">
                      <div class="blog-data-container">
                        <div class="blog-title"><span class="badge badge-roundless bg-blue-oleo"> Evento </span>
                          <h3 class="blog-banner-title">Lanzamiento de Toldo Proyectante Ombralsun </h3>
                          <h4 class="blog-address"><i class="icon-pointer"></i> Av San Josemaría Escrivá de Baleguer 5600, Vitacura</h4>
                          <h4 class="blog-date"><i class="fa fa-calendar-check-o"></i> 28/02/2017 <span aria-hidden="true" class="icon-clock"></span> 17:00 hrs</h4>
                           </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cerrar</button>
                    <button type="button" class="btn blue">Más información</button>
                  </div>
                </div>
                
                <!-- imagen banner -->
                <div id="imagen" class="modal container fade" tabindex="-1">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Banner test</h4>
                  </div>
                  <div class="modal-body">
                    <img src="<?php echo base_url(); ?>imgtmp/gallery/1024x400-1/02.jpg" width="100%">
                  </div>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cerrar</button>
                    <button type="button" class="btn blue">Más información</button>
                  </div>
                </div>
                
                <!-- noticia -->
                <div id="noticia" class="modal container fade" tabindex="-1">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Noticia</h4>
                  </div>
                  <div class="modal-body">
                    <div class=""><img src="<?php echo base_url(); ?>imgtmp/gallery/1024x300-1/03.jpg" width="100%"></div>
                    <div class="">
                      <h3>Lanzamiento Powerrise Latam</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a nisi vitae tortor rhoncus lacinia a sit amet dolor. Curabitur <strong>congue pharetra elit</strong>, ut mattis ligula aliquam ut. Sed finibus quam ac tortor euismod tristique. Suspendisse potenti.</p>
                      <p> Aliquam felis augue, convallis sit amet lacinia ut, vulputate suscipit neque. Vestibulum sit amet augue eros. Donec cursus turpis arcu. Morbi tincidunt condimentum nunc, bibendum bibendum enim ultricies vitae. Sed id neque vitae lorem aliquet varius.</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cerrar</button>
                    <button type="button" class="btn blue">Más información</button>
                  </div>
                </div>
                
                <!-- bloqueo -->
                <div id="bloqueo" class="modal container fade" tabindex="-1">
                  <div class="modal-header">
                    <h4 class="modal-title">Ventana obligatoria</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-5"><img src="<?php echo base_url(); ?>imgtmp/gallery/424x400-1/01.jpg" width="100%"></div>
                      <div class="col-md-7">
                        <h3>Lanzamiento Powerrise Latam</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris a nisi vitae tortor rhoncus lacinia a sit amet dolor. Curabitur <strong>congue pharetra elit</strong>, ut mattis ligula aliquam ut. Sed finibus quam ac tortor euismod tristique. Suspendisse potenti. Integer ac augue nec tellus semper aliquet sed ac diam. Quisque hendrerit risus velit, a euismod mauris dignissim ac.</p>
                        <p> Aliquam felis augue, convallis sit amet lacinia ut, vulputate suscipit neque. Vestibulum sit amet augue eros. Donec cursus turpis arcu. Morbi tincidunt condimentum nunc, bibendum bibendum enim ultricies vitae. Sed id neque vitae lorem aliquet varius.</p>
                        <p>Integer ultricies, ligula ut pulvinar bibendum, elit est porttitor urna, sed vehicula ex tellus ut nunc. Maecenas non pharetra lorem. <strong>Aliquam erat magna, semper at vulputate in, feugiat id urna. Quisque volutpat odio id velit fringilla hendrerit. Aenean aliquam arcu metus, quis efficitur metus accumsan sit amet. Proin mollis ex turpis, eget mattis odio imperdiet vitae.</strong></p>
                        <p class="font-blue"> Ut varius pretium ante in sollicitudin. Etiam ornare nibh ut tristique condimentum. Fusce at condimentum lorem, eget consectetur ligula. Quisque non ligula ut metus scelerisque pretium quis ut ante. Quisque egestas eget nisl eget egestas. Vivamus vestibulum tellus metus, eget pulvinar augue pulvinar id. Phasellus sed pretium erat, ac mollis eros. Sed posuere velit a mauris bibendum tristique.</p>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button"  data-dismiss="modal" class="btn blue">ACEPTAR</button>
                  </div>
                </div>
                <!-- noticia -->
                <div id="descarga" class="modal container fade" tabindex="-1">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                  </div>
                  <div class="modal-body">
                   
                   <div class="row">
                      <div class="col-md-3"><img src="<?php echo base_url(); ?>imgtmp/gallery/800x500-1/05.jpg" width="100%"></div>
                      <div class="col-md-9">
                        <h2>Descarga de Imagen</h2>
                        <div class="margin-top-30">
                        <h4>Seleccione tipo de descarga</h4>
                        <button type="button" class="btn blue"><i class="fa fa-download font-default"></i> Descarga imagen en tamaño original 1366x768px</button>
                         <button type="button" class="btn blue"><i class="fa fa-envelope-o"></i> Solicitar imagen en alta resolución</button>
                         </div>
                      </div>
                    </div>
                   
                  </div>
                   
                </div>
                <!-- long modals -->
                <div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">A Fairly Long Modal</h4>
                  </div>
                  <div class="modal-body"> <img style="height: 800px" src="http://i.imgur.com/KwPYo.jpg"> </div>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- END PORTLET--> 
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
