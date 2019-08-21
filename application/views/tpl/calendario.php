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
              
              <?php if ($eventos["futuros"]): ?>
              <!-- BEGIN BREADCRUMBS -->
              <div class="breadcrumbs">
                <h1 class="relative"><?php echo $L["proximos"]; ?></h1>
              </div>
              <!-- END BREADCRUMBS --> 
              <!-- BEGIN BORDERED TABLE PORTLET-->
              <div class="portlet-body search-page events2">
                <div class="table-scrollable">
                  <table class="table table-hover table-striped table-hover font-grey-gallery">
                    <tbody>
                    <?php foreach ($eventos["futuros"] as $evento): ?>
                      <tr>
                        <td><span class="month-number"><?php echo substr($evento->vigencia_desde,8,2); ?></span><br>
                          <span class="month-text"><?php echo mes_nombre(substr($evento->vigencia_desde,5,2)); ?></span><br>
                          <!--<span class="hour"><i class="fa fa-clock-o"></i>14:00</span>-->
                          </td>
                        <td><h4><?php echo $evento->titulo; ?></h4>
                          <span class="under"><?php echo $evento->texto_resumen; ?></span></td>
                        <td align="center"><a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $evento->id_evento; ?>/<?php echo $evento->url_titulo; ?>" class="btn grey-mint btn-outline sbold uppercase">VER MÁS</a></td>
                        <td align="center">
                          <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
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
                          </td>
                      </tr>
                      <?php endforeach; ?>
                    
                    </tbody>
                  </table>
                </div>
                </div>
                
                <?php endif; ?>
                <?php if ($eventos["pasados"]): ?>
                <div class="breadcrumbs margin-top-30">
                  <h1 class="relative"><?php echo $L["pasados"]; ?></h1>
                </div>
                <!-- END BREADCRUMBS --> 
                <!-- BEGIN BORDERED TABLE PORTLET-->
                <div class="portlet-body search-page events2">
                  <div class="table-scrollable">
                    <table class="table table-hover table-striped table-hover font-grey-gallery">
                      <tbody>
                        <?php foreach ($eventos["pasados"] as $evento): ?>
                      <tr>
                        <td><span class="month-number"><?php echo substr($evento->vigencia_desde,8,2); ?></span><br>
                          <span class="month-text"><?php echo mes_nombre(substr($evento->vigencia_desde,5,2)); ?></span><br>
                          <!--<span class="hour"><i class="fa fa-clock-o"></i>14:00</span>-->
                          </td>
                        <td><h4><?php echo $evento->titulo; ?></h4>
                          <span class="under"><?php echo $evento->texto_resumen; ?></span></td>
                        <td align="center"><a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $evento->id_evento; ?>/<?php echo $evento->url_titulo; ?>" class="btn grey-mint btn-outline sbold uppercase">VER MÁS</a></td>
                        <td align="center">
                          <?php if (@$usuario_administrador == 1  && $usuarioPerfil->admin_colaborador == "on"): ?>
                        <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
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
                          </td>
                      </tr>
                      <?php endforeach; ?>
   
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php endif; ?>
                <!-- START PAGINATION -->
                <?php //  $this->load->view("templates/pagination"); ?>
                <!-- END PAGINATION --> 
                
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
