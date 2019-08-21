<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="page-content white"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>dashboard">HunterDouglas</a> </li>
        <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
        <li ><a href="<?php echo base_url(); ?>events/list">Noticias y Eventos</a> </li>
        <li class="active">Lanzamiento de Toldo Proyectante Ombralsun</li>
      </ol>
      <h1>Noticias y Eventos</h1>
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
              <li class="active" > <a href="#"> Todo </a> </li>
              <li> <a href="#"> Productos </a> </li>
              <li> <a href="#"> Motorización </a> </li>
              <li> <a href="#"> Publicidad </a> </li>
              <li > <a href="#"> Lanzamiento </a> </li>
            </ul>
          </nav>
        </div>
        <!-- END PAGE SIDEBAR -->
        <div class="page-content-col"> 
          <!-- BEGIN PAGE BASE CONTENT -->
          <div class="blog-page blog-content-1" id="start-gallery"> 
            
            <!-- FILTER --> 
            <!-- END FILTER -->
            <div class="row">
              <div class="col-md-8"> 
                <!-- START ITEM -->
                <div class="wrap-event"> 
                  
                  <!-- star galery -->
                  <h3> <span class="badge badge-roundless bg-blue-oleo"> Evento </span><br>
                    Lanzamiento de Toldo Proyectante Ombralsun</h3>
                  <div class="slider slider-for">
                    <div><img src="<?php echo base_url(); ?>imgtmp/gallery/1024x600-1/conferencia.jpg" width="100%"></div>
                    <div><img src="<?php echo base_url(); ?>imgtmp/gallery/1024x600-1/03.jpg" width="100%"></div>
                    <div><img src="<?php echo base_url(); ?>imgtmp/gallery/1024x600-1/02.jpg" width="100%"></div>
                    <div><img src="<?php echo base_url(); ?>imgtmp/gallery/1024x600-1/01.jpg" width="100%"></div>
                    <div><img src="<?php echo base_url(); ?>imgtmp/gallery/1024x600-1/05.jpg" width="100%"></div>
                    <div><img src="<?php echo base_url(); ?>imgtmp/gallery/1024x600-1/03.jpg" width="100%"></div>
                    <div><img src="<?php echo base_url(); ?>imgtmp/gallery/1024x600-1/02.jpg" width="100%"></div>
                  </div>
                  <div class="slider slider-nav">
                    <div><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>imgtmp/gallery/320x190-1/conferencia.jpg" width="90%"></a></div>
                    <div><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>imgtmp/gallery/320x190-1/03.jpg" width="90%"></a></div>
                    <div><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>imgtmp/gallery/320x190-1/02.jpg" width="90%"></a></div>
                    <div><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>imgtmp/gallery/320x190-1/01.jpg" width="90%"></a></div>
                    <div><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>imgtmp/gallery/320x190-1/05.jpg" width="90%"></a></div>
                    <div><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>imgtmp/gallery/320x190-1/03.jpg" width="90%"></a></div>
                    <div><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>imgtmp/gallery/320x190-1/02.jpg" width="90%"></a></div>
                  </div>
                  
                  <!-- end gallery -->
                  
                  <div class="blox-text font-blue-oleo">
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere quam at erat pretium egestas. Fusce imperdiet mattis libero, id imperdiet erat facilisis nec. Ut vitae sapien id mauris facilisis elementum. Praesent at arcu ante. Suspendisse potenti. Sed sed elit iaculis, imperdiet nisl quis, mattis neque. Aenean egestas varius elit, vitae lacinia nunc condimentum eget. Suspendisse elementum augue quis mi cursus varius. Aenean nec mattis sapien. Curabitur a varius ligula, eu consequat elit. Nam tristique venenatis ligula non bibendum.</p>
                    <p> Pellentesque eu ipsum mi. Vestibulum tempor porta justo, sed pretium lacus tempus sit amet. Quisque vitae est fermentum, congue ligula quis, venenatis nunc. Donec scelerisque justo turpis, ut feugiat orci porttitor vel. Sed fringilla metus quis nisi tincidunt, dignissim sodales ipsum ultricies. Etiam ipsum nulla, egestas sed vehicula et, finibus eget felis. Nunc convallis dictum bibendum. In gravida mauris id nunc bibendum consectetur.</p>
                  </div>
                  <div class="wrap-event-docu border-default"> <span class="badge badge-roundless bg-blue-oleo"> Documentos Asignados </span>
                    <table class="font-blue-oleo">
                      <tr>
                        <td>Precios Oferta Temporada Persianas de Exterior ALuminio 80mm</td>
                        <td>300Kb</td>
                        <td><a href="#" class="font-blue-oleo"><i class="fa fa-download"></i></a></td>
                      </tr>
                    </table>
                  </div>
                </div>
                
                <!-- END ITEM --> 
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="btn-group pull-left">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li> <a href="javascript:;">Editar</a></li>
                        <li> <a href="javascript:;">Enviar arriba del listado </a></li>
                        <li> <a href="javascript:;">Borrador</a></li>
                        <li> <a href="javascript:;">Eliminar</a></li>
                      </ul>
                    </div>
                    <button type="button" class="btn blue-oleo pull-right" onClick="window.history.back()"  > &lt; VOLVER </button>
                  </div>
                </div>
                <?php if (!isset($_GET["novedad"])): ?>
                <div class="wrap-event-submit margin-top-30"> <img src="https://maps.googleapis.com/maps/api/staticmap?center=-33.421565,-70.5953768&zoom=18&size=622x500&maptype=roadmap
&markers=color:blue%7Clabel:S%7C-33.421565,-70.5953768&key=AIzaSyAmIhV2pyGGGKf_crbBK4B5is4Xab5kqR8" width="100%"> 
                  <!-- <img src="<?php echo base_url(); ?>/assets/custom/img/conferencia-virtual.png" width="100%"  alt=""/>--> 
                  <!-- start cupo -->
                  <div class="ini" ><b>Lanzamiento de Toldo Proyectante Ombralsun</b></div>
                  <div ><i class="fa fa-map-marker"></i> Av San Josemaría Escrivá de Baleguer 5600, Vitacura</div>
                  <div ><i class="fa fa-tags"></i> Evento Gratuito </div>
                  <div ><i class="fa fa-user"></i> Presencial / Online</div>
                  <?php if (!isset($_GET["inscrito"])): ?>
                  <div class="text-center center">
                    <button type="button" class="btn btn-info" id="btn_sesion" >SELECCIONAR SESIÓN (6)</button>
                  </div>
                </div>
                <div class="wrap-event-submit border-default margin-top-10" id="sesiones" style="display:none">
                  <div class="ini" ><b>Sesiones Presenciales</b></div>
                  <div class="mt-radio-inline">
                    <label class="control-label" for="opcion1">
                      <input type="radio" name="opcion1">
                      14/06/2017 - 14:30 hrs</label>
                    <label class="control-label" for="opcion1">
                      <input type="radio" name="opcion1">
                      15/06/2017 - 11:30 hrs</label>
                  </div>
                  <div class="ini" ><b>Sesiones Online</b></div>
                  <div class="mt-radio-inline">
                    <label class="control-label" for="opcion1">
                      <input type="radio" name="opcion1">
                      14/06/2017 - 14:30 hrs</label>
                    <label class="control-label" for="opcion1">
                      <input type="radio" name="opcion1">
                      14/06/2017 - 16:30 hrs</label>
                    <label class="control-label" for="opcion1">
                      <input type="radio" name="opcion1">
                      15/06/2017 - 14:30 hrs</label>
                    <label class="control-label" for="opcion1">
                      <input type="radio" name="opcion1">
                      16/06/2017 - 15:30 hrs</label>
                  </div>
                  <div class="text-center center">
                    <button type="button" class="btn btn-info" id="btn_asistir">ASISTIR<br>
                    (quedan 100 cupos)</button>
                  </div>
                  <?php endif; ?>
                  <?php if (isset($_GET["inscrito"])): ?>
                  <div class="text-center font-white bg-blue-oleo margin-top-10 inscrito"><b>Ya estás inscrito para la sesión 5</b><br>
                    <h4 class="bold"> 14/06/2017 - 14:30Hrs</h4>
                    <hr>
                    Te hemos enviado un email de recordatorio para que agendes el evento en tu calendario.</div>
                  <?php endif; ?>
                  <!-- end cupo --> 
                  
                </div>
                <?php endif; // novedad; ?>
                <?php if (isset($_GET["novedad"])): ?>
                <div class="wrap-event-submit border-default">
                  <h5 class="font-blue-dark text-center bold">ENTRADAS RECIENTES</h5>
                  <ul class="font-default">
                    <li><a href="#" class="font-blue">Regata Barco 20 Hunter douglas WCP</a></li>
                    <li><a href="#" class="font-blue">Descuentos que no se repetirán</a></li>
                    <li><a href="#" class="font-blue">Esta primavera disfruta tus espacios exteriores</a></li>
                    <li><a href="#" class="font-blue">Nuevo Lanzamiento Powerrise</a></li>
                    <li><a href="#" class="font-blue">Cortina roller quantum Q50 con motorización powerrise</a></li>
                  </ul>
                </div>
                <?php endif; ?>
              </div>
            </div>
            
             <!-- END FILTER -->
            
            
            <!-- start eventops relacionados -->
             <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs margin-top-60">
              <h1>OTROS EVENTOS</h1>
            </div>
            <!-- END BREADCRUMBS --> 
            
            <div class="row">
              <div class="col-md-6"> 
                <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>imgtmp/productos_imagenes/964x600-1/romana9.jpg'); height:300px">
                  <div class="blog-data-container">
                    <div class="blog-title"> <span class="badge badge-roundless bg-blue-oleo"> Evento </span>
                      <h4 class="blog-banner-title">Lanzamiento de Toldo Proyectante Ombralsun </h4>
                      <h5 class="blog-address"><i class="icon-pointer"></i> Av San Josemaría Escrivá de Baleguer 5600, Vitacura</h5>
                      <h5 class="blog-date"><i class="fa fa-calendar-check-o"></i> 28/02/2017 <span aria-hidden="true" class="icon-clock"></span> 17:00 hrs</h5>
                    </div>
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
              <div class="col-md-6"> <!-- START ITEM -->
                <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>imgtmp/productos_imagenes/964x600-1/plisadas11.jpg'); height:300px">
                  <div class="blog-data-container">
                   <div class="blog-title"> <span class="badge badge-roundless bg-blue-oleo"> Evento </span>
                      <h4 class="blog-banner-title">Lanzamiento de Toldo Proyectante Ombralsun </h4>
                      <h5 class="blog-address"><i class="icon-pointer"></i> Av San Josemaría Escrivá de Baleguer 5600, Vitacura</h5>
                      <h5 class="blog-date"><i class="fa fa-calendar-check-o"></i> 28/02/2017 <span aria-hidden="true" class="icon-clock"></span> 17:00 hrs</h5>
                    </div>
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
            </div>
            <!-- end eventos relacionados -->
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
						
						  $("#btn_sesion").on('click', function() {
							  $("#sesiones").toggle(400);
						  }); 
						  $("#btn_asistir").on('click', function() {
							  document.location.href='<?php echo base_url(); ?>events/view/1?inscrito=1';
						  });
                    });
					</script>