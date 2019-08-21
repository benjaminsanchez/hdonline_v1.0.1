<?php $this->load->view('templates/header'); ?>
<?php $arr_video = explode("|",$ext_video); ?>

<div class="container-fluid">
<div class="page-content white">
  <?php $this->load->view('templates/breadcrumb_secciones'); ?>
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
          
          <?php
		
		
		if (count($secciones_tipos_contenidos)>0):
			if ($secciones_tipos_contenidos):  
				$precount = 0;
				foreach ($secciones_tipos_contenidos as $tc): 
					$counttipo = @count($biblioteca[$tc->id_tipo_contenido]);
					
					if ($counttipo>0): 
					
				$precount++;
					?>
          
          <!-- BEGIN BREADCRUMBS -->
          
          <div class="row">
            <div class="col-md-12">
              <?php if (in_array("categoria",$secciones_campos)) : ?>
              <h4 class="relative bold text-bold uppercase text-uppercase"> <?php echo ($tc->tipo_contenido_nombre); ?></h4>
              <?php endif; ?>
              <?php $count = 0;$counttotal=0;   foreach ($biblioteca[$tc->id_tipo_contenido] as $bib):  $count++; 	$counttotal++;?>
              <?php if ($count==1): ?>
              <div class="row">
                <?php endif; ?>
                <?php 	if ($seccion->columnas == 2): ?>
                <div class="col-md-6">
                  <?php endif; ?>
                  <?php 	if ($seccion->columnas == 3): ?>
                  <div class="col-md-4">
                    <?php endif; ?>
                    
                    <!-- START ITEM -->
                    
                    <div class="blog-banner blog-container"  style="<?php if (!in_array(substr($bib->archivo_extension,1,3),$arr_video)): ?>background-color:#39424A;background-image:url('<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/620x400-2/biblioteca/<?php echo @$bib->archivo_nombre; ?>'); background-size: cover; background-repeat: no-repeat;background-position: center center; <?php endif; ?>width:100%; <?php if ($seccion->columnas == 3): ?> height: 15vw;<?php elseif ($seccion->columnas == 2): ?>height: 22vw;<?php endif; ?> ">
                      <div class="blog-data-container">
                        <?php if (in_array(substr($bib->archivo_extension,1,3),$arr_video)): ?>
                        <!-- controlsList="nodownload" -->
                        <video controls  width="100%" style="margin: 7px 0px;width:100%; <?php 	if ($seccion->columnas == 3): ?> height: 15vw;<?php elseif ($seccion->columnas == 2): ?>height: 22vw;<?php endif; ?>">
                          <source src="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $bib->archivo_nombre; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                          </source>
                        </video>
                        <?php endif; ?>
                        <?php if (in_array("titulo",$secciones_campos)) : ?>
                        <article class="blog-title blog-banner-title">
                          <h4 class=""><?php echo @$bib->nombre; ?></h4>
                          <?php if (in_array("descripcion",$secciones_campos)) : ?>
                          <p><?php echo @$bib->comentario; ?></p>
                          <?php endif; ?>
                          <?php if (in_array("fecha",$secciones_campos)) : ?>
                          <p><?php echo fecha(@$bib->fecha_modificacion); ?></p>
                          <?php endif; ?>
                        </article>
                        <?php endif; ?>
                        
                        <!-- blog config -->
                        <div class="blog-config">
                          <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                          <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li> <a href="javascript:;" class="biblioteca" data-url="<?php echo base_url(); ?>biblioteca/edit/<?php echo $bib->id_biblioteca; ?>?open=fotovideo"><?php echo $L["editar"]; ?></a></li>
                              <?php if ($bib->mantener_arriba == "0"): ?>
                              <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["enviar_arriba_listado"]; ?>" data-accion="mantener_arriba" data-table="biblioteca" data-key="id_biblioteca" data-id="<?php echo $bib->id_biblioteca; ?>" class="btn_accion_ajax"><?php echo $L["enviar_arriba_listado"]; ?> </a></li>
                              <?php endif; ?>
                            </ul>
                          </div>
                          <?php endif; ?>
                        </div>
                        <!-- end blog config -->
                        <div class="blog-download">
                          <?php if (in_array(substr($bib->archivo_extension,1,3),$arr_image)): ?>
                          <a class="btn btn-outline btn-descarga-img" data-target="#descarga" data-toggle="modal" data-archivonombre="<?php echo $bib->archivo_nombre; ?>" data-ancho="<?php echo $bib->archivo_imagen_ancho; ?>"  data-idbiblioteca="<?php echo $bib->id_biblioteca; ?>" data-alto="<?php echo $bib->archivo_imagen_alto; ?>"  data-baseurl="<?php echo base_url(); ?>" data-localizacion="<?php echo $localizacion; ?>"> <i class="fa fa-download font-default"></i> </a>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                    <?php 	if ($seccion->columnas == 2): 
		   				if ($count==2): 
							$count = 0;
							echo '</div>';
						elseif ($counttotal == $counttipo):
							echo '</div>';
						endif;
		   
		   ?>
                  </div>
                  <?php endif; ?>
                  <?php 	if ($seccion->columnas == 3):
							if ($count==3): 
								$count = 0;
								echo '</div>';
							elseif ($counttotal == $counttipo):
								echo '</div>';
							endif;
			 ?>
                </div>
                <?php else: ?>
                <div class="note note-info note-bordered">
                  <p> <?php echo $L["sin_resultados"]; ?></p>
                </div>
                <?php endif; ?>
                <!-- END ITEM -->
                <?php endforeach; ?>
                
                       <?php 	
				   			if ($seccion->columnas == 3):
				   				if ($count==1) echo '</div></div>';
				   				if ($count==2) echo '</div>';
				   			endif;
							
							if ($seccion->columnas == 2):
								if ($count==1) echo '</div>';
							endif; ?>
                
                         <?php $this->load->view('templates/pager'); ?>
                
                
                
                
                
              </div>
            </div>
            <?php else: ?>
            <div class="note note-info note-bordered">
              <p> <?php echo $L["sin_resultados"]; ?></p>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            
        
            <?php endif; ?>
            <?php else: ?>
            <div class="note note-info note-bordered">
              <p>  <?php echo $L["sin_resultados"]; ?></p>
            </div>
            <?php endif; ?>
          </div>
          <!-- END PAGE BASE CONTENT --> 
        </div>
      </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT --> 
  </div>
</div>
<?php $this->load->view('templates/modal/descarga-imagen'); ?>
<?php $this->load->view('templates/footer'); ?>
