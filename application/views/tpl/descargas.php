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
          <div class="row">
            <div class="col-md-12">
              <!-- FILTER -->
              <?php $this->load->view("templates/filters"); ?>
              <!-- END FILTER -->
              
              <!-- BEGIN BORDERED TABLE PORTLET-->
              <div class="portlet light bordered">
                <div class="portlet-body search-page">
                  <?php if (count($biblioteca)>0): ?>
                  <div class="table-scrollable">
                    <table class="table table-hover table-striped table-hover">
                      <thead>
                        <tr class="bold">
                          <th> <?php echo $L["titulo"]; ?> </th>
                          <?php if (in_array("fecha",$secciones_campos)) : ?>
                          <th class="text-center"> <?php echo $L["publicacion"]; ?> </th>
                          <?php endif; ?>
                           <?php if (in_array("tipo_contenido",$secciones_campos)) : ?>
                          <th class="text-center"> <?php echo $L["tipos_contenidos"]; ?>  </th>
                          <?php endif; ?>
                           <?php if (in_array("formato",$secciones_campos)) : ?>
                          <th class="text-center"> <?php echo $L["formato"]; ?> </th>
                          <?php endif; ?>
                            <?php if (in_array("peso",$secciones_campos)) : ?>
                          <th class="text-center"><?php echo $L["peso"]; ?> </th>
                            <?php endif; ?>
                          <th class="text-center" ><?php echo $L["descargar"]; ?>  </th>
                          <th> </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($biblioteca as $archivo): 
					  			
					  
					  ?>
                        <tr class="note <?php if ($archivo->mantener_arriba == 1): ?>note-mantener_arriba<?php endif; ?>">
                          <td ><?php 
						  $vigente = checkVigencia($archivo->vigencia_desde,$archivo->vigencia_hasta);
						  
						   if ($vigente): ?>
                            <span class="label label-sm label-default label-box "><?php echo $L["vigente"]; ?>  </span><br>
                            <?php endif; ?>
                            <span class="<?php if ($archivo->mantener_arriba == 1): ?>bold<?php endif; ?>"><?php echo $archivo->nombre; ?></span><span class="small"><?php echo ($archivo->comentario!="")?"<br>".$archivo->comentario:"";?></span></td>
                        <?php if (in_array("fecha",$secciones_campos)) : ?>
                           <td align="center"><?php echo fecha($archivo->fecha_subida); ?></td>
                           <?php endif; ?>
                           
                            <?php if (in_array("tipo_contenido",$secciones_campos)) : ?>
                        <td align="center"><?php 
						if (@count($archivo->tipos_contenidos)>0): 
							$counttc=0;
							foreach ($archivo->tipos_contenidos as $tc):
								if ($counttc>0) echo ", ";
								echo $tc->nombre;
								$counttc++;
							endforeach;
						endif;
						?></td> 
                          <?php endif; ?>
                          
                            <?php if (in_array("formato",$secciones_campos)) : ?>
                          <td align="center"><?php echo  strtoupper(substr($archivo->archivo_extension,1,strlen($archivo->archivo_extension))); ?></td>
                           <?php endif; ?>
                            <?php if (in_array("peso",$secciones_campos)) : ?>
                          <td align="right"><?php echo $archivo->archivo_peso; ?>Kb </td>
                          <?php endif; ?>
                          <td align="center"><a class="btn dropdown-toggle bg-transparent" href="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $archivo->archivo_nombre; ?>" download="<?php echo $archivo->archivo_nombre; ?>" > <i class="fa fa-download"></i></td>
                          <td align="center"><?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                            <div class="btn-group">
                              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                              <ul class="dropdown-menu pull-right" role="menu">
                                <li> <a href="javascript:;" class="biblioteca" data-url="<?php echo base_url(); ?>biblioteca/edit/<?php echo $archivo->id_biblioteca; ?>?open=descargas"><?php echo $L["editar"]; ?></a></li>
                                <?php if ($archivo->mantener_arriba == "0"): ?>
                                <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["enviar_arriba_listado"]; ?>" data-accion="mantener_arriba" data-table="biblioteca" data-key="id_biblioteca" data-id="<?php echo $archivo->id_biblioteca; ?>" class="btn_accion_ajax"><?php echo $L["enviar_arriba_listado"]; ?> </a></li>
                                <?php endif; ?>
                              </ul>
                            </div>
                            <?php endif; ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                    <?php $this->load->view('templates/pager'); ?>
                  <?php else: ?>
                  <div class="note note-info note-bordered">
                    <p> <?php echo $L["sin_resultados"]; ?></p>
                  </div>
                  <?php endif; ?>
                  
                  <!-- START PAGINATION -->
                  <?php /* $this->load->view("templates/pagination");  */ ?>
                  <!-- END PAGINATION --> 
                </div>
              </div>
              <!-- END BORDERED TABLE PORTLET--> 
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
