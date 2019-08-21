<?php
$alto_bloque = "410";
$total_secciones = count($secciones);
if ($total_secciones>0):
	$countr= 0; 
	$countrsecciones = 0;
	foreach ($secciones as $mseccion): 
		if  ($mseccion->estado_dashboard == "1" || @$usuario_administrador == 1 ) {
		$countrsecciones++;

	$countr++;?>
<?php if ($countr == 1): ?>

<div class="row">
  <?php endif; ?>
  <div class="col-lg-6 col-xs-12 col-sm-12 custom-box">
    <div class="portlet light bordered" style="height:525px">
      <div class="portlet-title">
        <div class="caption"> <i class="icon-share font-dark hide"></i>
          <h3 > <span class="font-dark"> <?php echo $mseccion->nombre; ?></span></h3>
          
          <?php if (@$usuario_administrador == 1): ?>  
          <div class="pull-right">
            <div class="btn-group">
              <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-yellow-gold"></i> </button>
              <ul class="dropdown-menu pull-right" role="menu">
                <li> <a href="<?php echo base_url(); ?>edit/secciones/?id_seccion=<?php echo $mseccion->id_seccion; ?>">Editar</a></li>
                <li> <a href="<?php echo base_url(); ?>delete/secciones/?id_seccion=<?php echo $mseccion->id_seccion; ?>">Eliminar</a></li>
              </ul>
            </div>
            <input type="checkbox" class="make-switch dashboard" data-id_seccion="<?php echo $mseccion->id_seccion; ?>" data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF" <?php if ($mseccion->estado_dashboard == "1"): ?>checked<?php endif; ?>>
          </div>
        <?php endif; ?>
        
        </div>
        <div class="clear-fix"></div>
      </div>
      <div class="tabbable-line">
        <?php 
	
	if (count(@$subseccion[@$mseccion->id_seccion])>0): $alto_bloque = "350"; ?>
        <ul class="nav nav-tabs slider-tab" id="master-tab<?php echo $mseccion->id_seccion; ?>">
          <li class="active"> <a href="#<?php echo $mseccion->url."-".$mseccion->id_seccion; ?>" data-toggle="tab" class="bold"> <?php echo $mseccion->nombre; ?></a> </li>
          <?php foreach ($subseccion[$mseccion->id_seccion] as $ss): ?>
          <li> <a href="#<?php echo $ss->url."-".$ss->id_seccion; ?>" data-toggle="tab" > <?php echo $ss->nombre; ?></a> </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="portlet-body">
          <div class="tab-content"> 
            
            <!-- START: TAB CONTENT -->
            <div class="tab-pane active boxes" id="<?php echo $mseccion->url."-".$mseccion->id_seccion; ?>" >
              <div class="mt-actions scroller" style="height: <?php echo $alto_bloque; ?>px;" >
                <?php  $this->load->view("templates/dashboard/boxes/".$mseccion->template_codigo, array("seccion"=>$mseccion)); ?>
              </div>
            </div>
            <!-- END TAB CONTENT -->
            
            <?php
		  if (count(@$subseccion[@$mseccion->id_seccion])>0): ?>
            <?php foreach ($subseccion[$mseccion->id_seccion] as $ss):  
		   
	
		   ?>
            
            <!-- START: TAB CONTENT -->
            <div class="tab-pane boxes" id="<?php echo $ss->url."-".$ss->id_seccion; ?>" >
              <div class="mt-actions scroller" style="height: <?php echo $alto_bloque; ?>px;" >
                <?php $this->load->view("templates/dashboard/boxes/".$ss->template_codigo, array("seccion"=>$ss)); ?>
              </div>
            </div>
            <!-- END TAB CONTENT -->
            <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($countr == 2 ): $countr = 0; ?>
</div>
<?php endif; ?>
<?php
		}
	endforeach;
endif; ?>
