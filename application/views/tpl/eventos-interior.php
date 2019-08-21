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
                  <h3> <span class="badge badge-roundless bg-blue-oleo"><?php echo $L["evento"]; ?>  </span><br>
                    <?php echo $evento->titulo; ?></h3>
                  
                  <!-- star galery -->
                  
                  <div class="slider slider-for">
                  <?php if (count($evento_imagenes) == 0): ?>
                    <div><img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/1024x600-1/biblioteca/<?php echo $evento->archivo_nombre; ?>" width="100%"></div>
                    <?php endif; ?>
                    <?php if ($evento_imagenes): ?>
                    <?php foreach ($evento_imagenes as $img): ?>
                    <div>
                      <?php if (in_array(extension($img->archivo_nombre),$arr_video)): ?>
                      <!--  controlsList="nodownload"  -->
                      <video controls width="100%" style=";width:100%; height: 100%;">
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
                  <?php if (count($evento_imagenes)>0): ?>
                  <div class="slider slider-nav">
                  
                    <?php if ($evento_imagenes): ?>
                    <?php foreach ($evento_imagenes as $img): ?>
                    <div><a href="javascript:void(0)">
                      <?php if (in_array(extension($img->archivo_nombre),$arr_video)): ?>
                      <!-- controlsList="nodownload"  -->
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
                  
                  <div class="blox-text font-blue-oleo"> <?php echo $evento->texto; ?> </div>
                  <?php 
				  if ($evento_documentos): ?>
                  <div class="wrap-event-docu border-default"> <span class="badge badge-roundless bg-blue-oleo"> <?php echo $L["documentos_asignados"]; ?> </span>
                    <table class="font-blue-oleo">
                      <?php foreach ($evento_documentos as $arc): ?>
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
                        <li> <a href="<?php echo base_url(); ?>edit/eventos?id_evento=<?php echo $evento->id_evento; ?>"><?php echo $L["editar"]; ?></a></li>
                        <?php if ($evento->mantener_arriba == "0"): ?>
                        <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["enviar_arriba_listado"]; ?>" data-accion="mantener_arriba" data-table="eventos" data-key="id_evento" data-id="<?php echo $evento->id_evento; ?>" class="btn_accion_ajax"><?php echo $L["enviar_arriba_listado"]; ?> </a></li>
                        <?php endif; ?>
                        <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="eventos" data-key="id_evento" data-id="<?php echo $evento->id_evento; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>delete/eventos?id_evento=<?php echo $evento->id_evento; ?>"><?php echo $L["eliminar"]; ?></a></li>
                      </ul>
                    </div>
                    <?php endif; ?>
                    <button type="button" class="btn blue-oleo pull-right" onClick="window.history.back()"  > <?php echo $L["volver"]; ?>  </button>
                  </div>
                </div>
                <div class="wrap-event-submit margin-top-30">
                  <?php if ($count_sesiones_presenciales): ?>
                  <?php foreach ($sesiones_presenciales  as $sesion): ?>
                  <a href="https://www.google.com/maps?ll=<?php echo $sesion->coordenadas; ?>&z=16&t=m&mapclient=embed&q=<?php echo urlencode($sesion->ubicacion); ?>" target="_blank"> <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $sesion->coordenadas; ?>&zoom=18&size=622x500&maptype=roadmap
&markers=color:blue%7Clabel:S%7C<?php echo $sesion->coordenadas; ?>&key=<?php echo $GMAPKEY; ?>" width="100%" alt="<?php echo $sesion->ubicacion; ?>" title="<?php echo $sesion->ubicacion; ?>"> </a>
                  <?php break; endforeach; ?>
                  <?php endif; ?>
                  
                  <!-- <img src="<?php echo base_url(); ?>/assets/custom/img/conferencia-virtual.png" width="100%"  alt=""/>--> 
                  <!-- start cupo -->
                  <div class="ini" ><b><?php echo $evento->titulo; ?></b></div>
                  <?php if ($count_sesiones_presenciales): ?>
                  <?php foreach ($sesiones_presenciales as $sesion): ?>
                  <div > <a href="https://www.google.com/maps?ll=<?php echo $sesion->coordenadas; ?>&z=16&t=m&mapclient=embed&q=<?php echo urlencode($sesion->ubicacion); ?>" target="_blank"><i class="fa fa-map-marker"></i><?php echo ($sesion->ubicacion); ?></a></div>
                  <div ><i class="fa fa-tags"></i>
                    <?php if ($sesion->costo_evento >0): echo currency($sesion->costo_evento);  else: ?>
                    Evento Gratuito
                    <?php endif; ?>
                  </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  <div ><i class="fa fa-user"></i> <?php echo ($count_sesiones_presenciales>0) ? "Presencial ": ""; ?><?php echo ($count_sesiones_online>0) ? " / Online": ""; ?></div>
                  <?php if ($count_inscripcion == 0): // si no estoy inscrito ?>
                  <div class="text-center center">
                    <button type="button" class="btn btn-info" id="btn_sesion" ><?php echo $L["seleccionar_sesion"]; ?> (<?php echo intval($count_sesiones_online+$count_sesiones_presenciales); ?>)</button>
                  </div>
                </div>
                <div class="wrap-event-submit border-default margin-top-10" id="sesiones" style="display:none">
                  <form id="SesionesAsistir" method="post" action="<?php echo base_url(uri_string()); ?>">
                    <?php
				  if ($count_sesiones_presenciales >0): ?>
                    <div class="ini" ><b><?php echo $L["sesiones_presenciales"]; ?></b></div>
                    <div class="mt-radio-inline">
                      <?php foreach ($sesiones_presenciales as $sesion): 
					
				  			$cupos = intval($sesion->cupos-$sesion->inscritos); 
							?>
                      <?php if ($cupos>0): ?>
                      <label class="control-label" for="sesion_<?php echo $sesion->id_evento_sesion; ?>">
                        <input type="radio" name="sesion" id="sesion_<?php echo $sesion->id_evento_sesion; ?>" data-cupos="<?php echo $cupos; ?>"  value="<?php echo $sesion->id_evento_sesion; ?>">
                        <?php echo fecha($sesion->fecha); ?> - <?php echo hora($sesion->hora); ?> hrs</label>
                      <?php else: ?>
                      <label class="control-label" for="sesion_<?php echo $sesion->id_evento_sesion; ?>"> (Sin cupos) <?php echo fecha($sesion->fecha); ?> - <?php echo hora($sesion->hora); ?> hrs</label>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                    <?php
				  endif; ?>
                    <?php
				  if ($count_sesiones_online >0): ?>
                    <div class="ini" ><b><?php echo $L["sesiones_online"]; ?></b></div>
                    <div class="mt-radio-inline">
                      <?php foreach ($sesiones_online as $sesion): 
                   		$cupos = intval($sesion->cupos-$sesion->inscritos); 
					
							?>
                      <?php if ($cupos>0): ?>
                      <label class="control-label" for="sesion_<?php echo $sesion->id_evento_sesion; ?>">
                        <input type="radio" name="sesion" id="sesion_<?php echo $sesion->id_evento_sesion; ?>" data-cupos="<?php echo $cupos; ?>" value="<?php echo $sesion->id_evento_sesion; ?>">
                        <?php echo fecha($sesion->fecha); ?> - <?php echo hora($sesion->hora); ?> hrs</label>
                      <?php else: ?>
                      <label class="control-label" for="sesion_<?php echo $sesion->id_evento_sesion; ?>"> (Sin cupos) <?php echo fecha($sesion->fecha); ?> - <?php echo hora($sesion->hora); ?> hrs</label>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                    <?php
				  endif; ?>
                    <div class="text-center center">
                      <button type="submit" class="btn btn-info" id="btn_asistir" style="display:none"><?php echo $L["asistir"]; ?><br>
                      (quedan xx cupos)</button>
                    </div>
                  </form>
                  <?php endif; ?>
                  
                  <?php if ($count_inscripcion>0): ?>
                  <div class="text-center font-white bg-blue-oleo margin-top-10 inscrito"><b><?php echo $L["ya_estas_inscrito"]; ?></b><br>
                  <?php foreach ($inscripcion as $sesion): ?>
                    <h4 class="bold"><?php echo fecha($sesion->fecha); ?> - <?php echo hora($sesion->hora); ?>Hrs</h4>
                  <?php endforeach; ?>
                    <hr>
                    <?php echo $L["ya_estas_inscrito2"]; ?></div>
                  <?php endif; ?>
                  <!-- end cupo --> 
                  
                </div>
              </div>
            </div>
            
            <!-- END FILTER --> 
            
            <!-- start eventops relacionados --> 
            <!-- BEGIN BREADCRUMBS -->
            <div class="breadcrumbs margin-top-60">
              <h1> <?php echo $L["otros_eventos"]; ?></h1>
            </div>
            <!-- END BREADCRUMBS -->
            
            <div class="row">
              <?php
			if ($eventos): 
			$count=0;
			foreach ($eventos as $ev): if ($ev->id_evento != $evento->id_evento):  $count++; ?>
              <div class="col-md-6"> 
                <!-- START ITEM -->
                <div class="blog-banner blog-container proyectos-relacionados" style="background-image:url('<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/700x400-1/biblioteca/<?php echo $ev->archivo_nombre; ?>'); height:300px">
                  <div class="blog-data-container proyectos-relacionados"  data-url="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $ev->id_evento; ?>/<?php echo $ev->url_titulo; ?>">
                    <div class="blog-title"> <span class="badge badge-roundless bg-blue-oleo"> <?php echo $L["evento"]; ?> </span>
                      <h4 class="blog-banner-title"><?php echo $ev->titulo; ?> </h4>
                      <!-- <h5 class="blog-address"><i class="icon-pointer"></i> Av San Josemaría Escrivá de Baleguer 5600, Vitacura</h5>-->
                      <h5 class="blog-date"><i class="fa fa-calendar-check-o"></i> <?php echo fecha($evento->vigencia_desde); ?> <!--<span aria-hidden="true" class="icon-clock"></span> 17:00 hrs--></h5>
                    </div>
                   
                    
                  </div>
                  
                  
                  
                   <!-- blog config -->
                    <div class="blog-config">
                      <?php if (@$usuario_administrador == 1): ?>
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="<?php echo base_url(); ?>edit/eventos?id_evento=<?php echo $ev->id_evento; ?>"><?php echo $L["editar"]; ?></a></li>
                          <?php if ($ev->mantener_arriba == "0"): ?>
                          <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["enviar_arriba_listado"]; ?>" data-accion="mantener_arriba" data-table="eventos" data-key="id_evento" data-id="<?php echo $ev->id_evento; ?>" class="btn_accion_ajax"><?php echo $L["enviar_arriba_listado"]; ?> </a></li>
                          <?php endif; ?>
                          <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="eventos" data-key="id_evento" data-id="<?php echo $ev->id_evento; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                          <li> <a href="<?php echo base_url(); ?>delete/eventos?id_evento=<?php echo $ev->id_evento; ?>"><?php echo $L["eliminar"]; ?></a></li>
                        </ul>
                      </div>
                      <?php endif; ?>
                    </div>
                    <!-- end blog config --> 
                  
                </div>
                <!-- END ITEM --> 
              </div>
              <?php
			   	endif; if ($count == 2) break;  
			   	endforeach; 
			   endif; ?>
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
	$('input[type=radio][name=sesion]').change(function() {
		var idsesion = this.value 
		var cupos = parseInt($(this).data("cupos"));
		$("#btn_asistir").fadeIn("fast");
		$("#btn_asistir").html("ASISTIR<br>(quedan "+cupos+" cupos)");
	});
	  $("#btn_sesion").on('click', function() {
		  $("#sesiones").toggle(400);
	  }); 
	  
	  $("#SesionesAsistir").on('submit', function () {
		if (!confirm("¿Confirma que desea asistir al evento seleccionado?")) {
			return false;
		}  
	  });
	  $(".blog-data-container.proyectos-relacionados").on('click', function () {
		 document.location.href = $(this).data("url");  
		  
	  });
	  /*
	  $("#btn_asistir").on('click', function() {
		 var id_sesion = $("#SesionesAsistir input[type='radio']:checked").val();
		
		 return false;
		  document.location.href='<?php echo current_url(); ?>?inscrito=1';
	  });
	  */
});
</script>