<!-- BEGIN PAGE SIDEBAR -->
<div class="page-sidebar">
  
  
  <nav class="navbar" role="navigation"> 
    <!-- Brand and toggle get grouped for better mobile display --> 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <ul class="nav navbar-nav margin-bottom-35">
    <li class="<?php echo (@$seccion->tipo == "seccion" && @$seccion->id_seccion == @$current_id_seccion)?"active":""; ?>"  ><a href="<?php echo base_url(); ?>seccion/<?php echo (@$seccion->tipo == "seccion")? $seccion->id_seccion : @$seccion->id_seccion_padre; ?>/<?php echo (@$seccion->tipo == "seccion")? $seccion->url : @$seccion->ss_url;; ?>"><?php echo (@$seccion->tipo == "seccion")? $seccion->nombre : @$seccion->seccion_padre_nombre; ?></a></li> 
    
    
    <?php if (count(@$sidebar_secciones)>0): ?> 
    <?php foreach (@$sidebar_secciones as $sseccion): ?>
      <li class="<?php echo (@$sseccion->id_seccion == @$current_id_seccion)? 'active': ''; ?>" > <a href="<?php if (@$sseccion->template_codigo == "enlaces"): ?><?php echo $sseccion->url_externa; ?><?php else: ?><?php echo base_url(); ?>seccion/<?php echo $sseccion->id_seccion; ?>/<?php echo $sseccion->url; ?><?php endif; ?>"  <?php if (@$sseccion->template_codigo == "enlaces"): ?>target="<?php echo $sseccion->destino; ?>"<?php endif; ?> ><?php echo $sseccion->nombre; ?> </a> </li>
    <?php endforeach; ?>
    <?php endif; ?>
    </ul>
  </nav>
  
</div> 
<!-- END PAGE SIDEBAR -->