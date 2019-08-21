<!DOCTYPE html>
<!--[if IE 8]> <html lang="<?php echo @$idioma; ?>" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="<?php echo @$idioma; ?>" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo @$idioma; ?>">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8" />
<?php if (@$sExport != ""): ?>
</head>
<body>
<?php else: ?>
<title><?php echo $titleadmin; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN LAYOUT FIRST STYLES -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
<!-- END LAYOUT FIRST STYLES --> 
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES --> 
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS --> 
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?php echo base_url(); ?>assets/layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css" />

<!-- DOCS -->
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

<!-- >
          <!-- START GALLERY-->
<link href="<?php echo base_url(); ?>assets/pages/css/blog.min.css" rel="stylesheet" type="text/css" />
<!-- END GALLERY -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/slick/slick-theme.css">

<!-- BEGIN MODALS -->
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS --> 

<!-- ADICIONALES -->
<link href="<?php echo base_url(); ?>assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet" type="text/css" />

<!-- tags -->

<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />
<!-- noticias -->
<link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<!--<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />--> 
<!-- ADICIONALES --> 

<!-- END THEME LAYOUT STYLES -->
<link href="<?php echo base_url(); ?>assets/custom/css/custom.css?v=<?php echo mt_rand(10,99).date("dmHs"); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/custom/css/custom2.css?v=<?php echo mt_rand(10,99).date("dmHs"); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/custom/css/sidebar.custom.css?v=<?php echo mt_rand(10,99).date("dmHs"); ?>" rel="stylesheet" type="text/css" />
<style>

.btn.blue:not(.btn-outline),.btn-primary, .btn-info,  .btn-info:active {    
	background-color:<?php echo $hexcolor; ?>;
    border-color: <?php echo $darkcolor; ?>;
}
.btn.blue:not(.btn-outline):active:hover,.btn.blue:not(.btn-outline):hover,.btn-primary:active:hover, .btn-info:hover, .btn-info:active:hover, .page-content-row .page-sidebar .navbar-nav li>ul.sub-menu>li>a:hover, .page-content-row .page-sidebar .navbar-nav li>ul.sub-menu>li.active>a, .btn.blue:not(.btn-outline):active  { 
	background-color:<?php echo $darkcolor; ?>;
	border-color: <?php echo ($hexcolor); ?>;
}
.page-content-row .page-sidebar .navbar-nav>li>a:hover { 
	background:<?php echo $darkcolor; ?>;
}
.page-header .navbar .navbar-nav>li:hover>a, .page-content-row .page-sidebar .navbar-nav li.active>a, .bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-success,.page-header .navbar .topbar-actions .btn-group-notification .btn {
	background:<?php echo $hexcolor; ?>;
}
.page-header .navbar .navbar-nav>li:hover>a, .page-header .navbar .navbar-nav li.selected>a, .page-header .navbar .navbar-nav li.selected>a { border-color:<?php echo $hexcolor; ?>; }
.page-header .navbar .navbar-nav>li.selected:hover>a { border-color:<?php echo $darkcolor; ?>;}
.btn.blue-hoki:not(.btn-outline),  .btn.blue-hoki:not(.btn-outline):active:hover, .btn.blue-hoki:not(.btn-outline):hover, .btn.btn-outline.blue-hoki.active, .btn.btn-outline.blue-hoki:active, .btn.btn-outline.blue-hoki:active:focus, .btn.btn-outline.blue-hoki:active:hover, .btn.btn-outline.blue-hoki:focus, .btn.btn-outline.blue-hoki:hover,.btn.btn-outline.blue.active, .btn.btn-outline.blue:active, .btn.btn-outline.blue:active:focus, .btn.btn-outline.blue:active:hover, .btn.btn-outline.blue:focus, .btn.btn-outline.blue:hover,.btn.blue:not(.btn-outline):focus{

    background-color: <?php echo $extradarkcolor; ?>;
    border-color: <?php echo $extradarkcolor; ?>;
}
.page-header .navbar .topbar-actions .btn-group-img .btn>span, .breadcrumbs .breadcrumb li.active, .dropdown-menu-v2>li>a:hover, .breadcrumbs .breadcrumb>li>a:hover{ 
color:<?php echo $lightcolor; ?> 
}
 a:hover {color:<?php echo $darkcolor; ?> }

.btn.btn-outline.blue-hoki { border-color:<?php echo $extradarkcolor; ?>; color:<?php echo $extradarkcolor; ?> ; }
a{ color:<?php echo $lightcolor; ?>; }
.daterangepicker .ranges li.active, .daterangepicker .ranges li:hover {
    background:<?php echo $hexcolor; ?>!important;
    border: 1px solid <?php echo $hexcolor; ?>!important;

}
.note.note-mantener_arriba,  .tabbable-line .nav-tabs li:hover { border-color:<?php echo $extralightcolor; ?> }
.dashboard-boxes .tabbable-line .nav-tabs li.active { border-color:<?php echo $hexcolor; ?>; }
.dashboard-boxes .tabbable-line .nav-tabs li.active {
    border-bottom: 4px solid <?php echo $hexcolor; ?>;
}
.font-blue, .profile-usertitle-job, .font-blue-madison { color:<?php echo $hexcolor; ?> !important; }
.bg-blue-opacity { background:<?php echo $extralightcolor; ?>D9 !important } /* https://gist.github.com/lopspower/03fb1cc0ac9f32ef38f4 */

.font-blue-sharp { color:<?php echo $lightcolor; ?> !important; }
.program-status .bar .fullbar { background:<?php echo $extralightcolor; ?>; }
.program-meta,.daterangepicker .ranges li { color:<?php echo $hexcolor; ?>; }
.btn.btn-outline.blue:hover,.btn.btn-outline.blue:active,button.biblioteca:hover { background-color:<?php echo $lightcolor; ?>; }
.btn.btn-outline.blue, .btn.btn-outline.blue:active{ border-color: <?php echo $hexcolor; ?>; color: <?php echo $hexcolor; ?>; }
.btn.btn-outline.blue:hover {  border-color: <?php echo $hexcolor; ?>; }
 .programs-page-int #carousel-programs-int .carousel-indicators li.active, .programs-page #carousel-programs .carousel-indicators li.active { background:<?php echo $lightcolor; ?>; }
</style>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/custom/img/favicon.ico" />
<script>
function r(f){/in/.test(document.readyState)?setTimeout('r('+f+')',9):f()}
</script>
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo">
<!-- modal biblioteca -->
<div id="ajax-modal" class="modal fade modal-scroll container modal-biblioteca" tabindex="-1">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><?php echo $LG["biblioteca"]; ?></h4>
  </div>
  <div class="modal-body"> </div>
  <!--
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cerrar</button>
  </div>
  --> 
</div>
<!-- /. modal biblioteca -->

<?php if ($alertas):  foreach ($alertas as $alerta): ?>
<!--  modal alertas DOC: Aplly "modal-cached" class after "modal" class to enable ajax content caching-->
<div  id="alerta-<?php echo $alerta->id_alerta_enviada; ?>" class="modal container fade modal-scroll modal-alerta-<?php echo $alerta->tipo; ?>" tabindex="-1" role="basic" aria-hidden="true">
  <?php $this->load->view('templates/modal/ajax_modal_alerta-'.$alerta->tipo,array("alerta"=>$alerta)); ?>
</div>
<!-- /.modal -->

<?php endforeach; endif;  ?>

<!-- BEGIN CONTAINER -->
<div class="wrapper">
<!-- BEGIN HEADER -->
<header class="page-header">
  <nav class="navbar mega-menu" role="navigation">
    <div class="container-fluid">
      <div class="clearfix navbar-fixed-top"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse"> <span class="sr-only">Toggle navigation</span> <span class="toggle-icon"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </span> </button>
        <!-- End Toggle Button --> 
        <!-- BEGIN LOGO --> 
        <a id="index" class="page-logo" href="<?php echo base_url(); ?>"> <img src="<?php echo $logoadmin; ?>" alt="Logo"> </a> 
        <!-- END LOGO --> 
        
        <!-- BEGIN TOPBAR ACTIONS -->
        <div class="topbar-actions col-md-2 category-head" >
          <?php if (@$show_cat1 == true): ?>
          <!-- BEGIN MARCA -->
          
          <select class="bs-select form-control input-md select_filtercat" id="f_cat1" name="f_cat1" data-urlbase="<?php echo base_url(); ?>" data-style="dark" style="background:#2a3239" title="<?php echo $LG["seleccionar_marca"]; ?>">
            <?php foreach ($f_categoria[1] as $categoria): ?>
            <option value="<?php echo $categoria->id_categoria; ?>" <?php if ($f_cat1 ==  $categoria->id_categoria) echo ' selected'; ?>><?php echo $categoria->nombre; ?></option>
            <?php endforeach; ?>
          </select>
          <!-- END MARCA -->
          <?php endif; ?>
        </div>
        
        <!-- BEGIN TOPBAR ACTIONS -->
        <div class="topbar-actions"> 
          <!-- BEGIN MARCA --> 
          
          <!-- END MARCA -->
          
          <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
          
          <!-- start biblioteca -->
          <div class="btn-group">
            <button type="button" class="btn btn-lg font-white biblioteca" data-url="<?php echo base_url(); ?>biblioteca" data-toggle="modal"><i class="fa fa-folder-open-o"></i> <span class="" style=""> <?php echo $LG["biblioteca"]; ?> </span></button>
          </div>
          <!-- end biblioteca -->
          <?php endif; ?>
          
          <!-- BEGIN GROUP NOTIFICATION -->
          <?php /*
          <?php 
		  
		  $count_notificaciones_no_leidas = count(@$notificaciones[1]); 
		  $count_notificaciones_leidas = count(@$notificaciones[2]); 
		  ?>
          <div class="btn-group-notification btn-group" id="header_notification_bar">
            <button type="button" id="btn_notificaciones" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="icon-bell"></i> <span class="badge"><?php echo $count_notificaciones_no_leidas ; ?></span> </button>
            <ul class="dropdown-menu-v2">
              <?php if ($count_notificaciones_no_leidas >0 || $count_notificaciones_leidas>0 ): ?>
              <li>
                <ul class="dropdown-menu-list scroller" style="height: 150px; padding: 0;" data-handle-color="#637283">
                  <?php if ($count_notificaciones_no_leidas>0): foreach ($notificaciones[1] as $notificacion): ?>
                  <li class="noleidas" data-id="<?php echo $notificacion->id_alerta_enviada; ?>"> <span class="details"> <span class="label label-sm label-icon bg-blue-chambray md-skip"> <i class="fa fa-commenting"></i> </span> <?php echo $notificacion->texto_notificacion; ?></span> </li>
                  <?php endforeach; endif; ?>
                  <?php 
				if ( $count_notificaciones_leidas>0): 
					foreach ($notificaciones[2] as $notificacion): ?>
                  <li data-id="<?php echo $notificacion->id_alerta_enviada; ?>"> <span class="details"> <span class="label label-sm label-icon bg-blue-chambray md-skip"> <i class="fa fa-commenting"></i> </span> <?php echo $notificacion->texto_notificacion; ?></span> </li>
                  <?php endforeach;
				endif;
				 ?>
                </ul>
              </li>
              <?php else: ?>
              <li class="external">
                <h3> <span class="bold"><?php echo $LG["sin_notificaciones"]; ?></span></h3>
              </li>
              <?php endif; ?>
            </ul>
          </div>
		   */ ?>
          <!-- END GROUP NOTIFICATION --> 
          
          <!-- BEGIN USER PROFILE -->
          <div class="btn-group-img btn-group">
            <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="cursor:pointer; margin-left:10px;     height: 50px;
    text-align: left; background:#2A3239; "> <span><span class="font-white bold">
            <?php 
	if (@$usuario_administrador == 1)	 echo $LG["administrador"]; 
	elseif(@$usuario_normal == 1)		 echo $usuarioPerfil->perfil_nombre; 
	elseif (@$usuario_distribuidor == 1) echo $usuarioPerfil->distribuidor_nombre; ?>
            </span><br>
            <?php 
	if (@$usuario_administrador == 1)	 echo $usuarioPerfil->nombre;
	elseif(@$usuario_normal == 1)		 echo $usuarioPerfil->nombre; 
	elseif (@$usuario_distribuidor == 1) echo $usuarioPerfil->nombre; ?>
            </span> <span style="background:#22292F; height:50px; padding-top:20px; color:#FFF"><i class="fa fa-angle-down"></i></span> </button>
            <ul class="dropdown-menu-v2" role="menu">
              <li> <a href="<?php echo base_url(); ?>profile"> <i class="fa fa-user"></i> <?php echo $LG["mis_datos"]; ?> </a> </li>
             
             
              <?php if ($usuario_distribuidor == 1 && $usuarioPerfil->crear_usuarios == 1):  ?>
               <li> <a href="<?php echo base_url(); ?>listc/distribuidores_usuarios"> <i class="fa fa-gear"></i> <?php echo $LG["crear_usuarios"]; ?></a> </li>
              <?php endif; ?>
              
              
              <?php if (@$usuario_administrador == 1 && ($usuarioPerfil->rol == "admin" || $usuarioPerfil->rol == "personalizado")): ?>
				  <?php if (in_array('secciones',$usuarioPerfil->accesos)):	?>
                  <li> <a href="<?php echo base_url(); ?>list/secciones"> <i class="fa fa-gear"></i> <?php echo $LG["acceso_admin"]; ?></a> </li>
                  <?php elseif (in_array('categorias_de_contenidos',$usuarioPerfil->accesos)):	?>
                  <li> <a href="<?php echo base_url(); ?>list/categorias"> <i class="fa fa-gear"></i> <?php echo $LG["acceso_admin"]; ?></a> </li>
                  <?php  elseif (in_array('distribuidores_y_usuarios',$usuarioPerfil->accesos)): ?>
                  <li> <a href="<?php echo base_url(); ?>list/distribuidores"> <i class="fa fa-gear"></i> <?php echo $LG["acceso_admin"]; ?></a> </li>
                  <?php  elseif (in_array('estadisticas_todas',$usuarioPerfil->accesos)): ?>
                  <li> <a href="<?php echo base_url(); ?>list/estadisticas"> <i class="fa fa-gear"></i> <?php echo $LG["acceso_admin"]; ?></a> </li>
                  <?php  elseif (in_array('etiquetado_sitio',$usuarioPerfil->accesos)): ?>
                  <li> <a href="<?php echo base_url(); ?>list/idiomas_sitio"> <i class="fa fa-gear"></i> <?php echo $LG["acceso_admin"]; ?></a> </li>
                   <?php  elseif (in_array('parametros',$usuarioPerfil->accesos)): ?>
                  <li> <a href="<?php echo base_url(); ?>/edit_custom/parametros"> <i class="fa fa-gear"></i> <?php echo $LG["acceso_admin"]; ?></a> </li>
                  <?php endif; ?>
              <?php endif; ?>
              <li class="divider"> </li>
              <li> <a href="<?php echo base_url(); ?>logout"> <i class="icon-key"></i> <?php echo $LG["cerrar_sesion"]; ?></a> </li>
            </ul>
          </div>
          <!-- END USER PROFILE --> 
          <!-- BEGIN QUICK SIDEBAR TOGGLER
                                <button type="button" class="quick-sidebar-toggler md-skip" data-toggle="collapse">
                                    <span class="sr-only">Toggle Quick Sidebar</span>
                                    <i class="icon-logout"></i>
                                </button>
                                <!-- END QUICK SIDEBAR TOGGLER --> 
          
        </div>
        <!-- END TOPBAR ACTIONS --> 
        <!-- BEGIN HEADER MENU -->
        <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
          <?php // print_r($secciones); ?>
          <ul class="nav navbar-nav">
            <li class="<?php echo (@$active == "dashboard")? 'active selected': ''; ?>"> <a href="<?php echo base_url(); ?>" class=""> <i class="icon-home"></i> <?php echo $LG["mi_escritorio"]; ?></a> </li>
            <?php
			if (count($secciones_menu)>0):
				foreach ($secciones_menu as $mseccion): ?>
            <li class="<?php echo (@$mseccion->id_seccion == @$current_id_seccion || @$mseccion->id_seccion_padre == @$current_id_seccion || @$seccion->id_seccion_padre == $mseccion->id_seccion )? 'active selected': ''; ?>"> 
            
            <a href="<?php 			
			if (@$mseccion->template_codigo == "enlaces"): 
				if ($mseccion->nombre == "E-Pedidos"):
					if (@$token_epedidos != "" && @$token_destruido == ""):
						echo "http://pedidosax.hdlao.com/Login.aspx?t=".$token_epedidos;
					elseif (@$token_destruido == "on"):
						echo "http://pedidosax.hdlao.com/inicio.aspx";
					else:
						echo $mseccion->url_externa; 
					endif;
				else: 
					echo $mseccion->url_externa; 
				endif; 
			else: 
				echo base_url().'seccion/'.$mseccion->id_seccion.'/'.$mseccion->url;
			 endif; ?>" <?php if (@$mseccion->template_codigo == "enlaces"): ?>target="<?php echo $mseccion->destino; ?>"<?php endif; ?> class=""><?php echo $mseccion->nombre; ?></a> </li>
            <?php
            	endforeach;			
			endif;
			?>
          </ul>
        </div>
        <!-- END HEADER MENU --> 
      </div>
      <!-- header menú antes de sticky  ---> 
    </div>
    <!--/container--> 
  </nav>
</header>
<!-- END HEADER -->

<?php if (@$add_active != "" && $usuarioPerfil->admin_colaborador == "on" ): ?>
<a href="<?php echo $add_active; ?>" class="add_active"> <i class="fa fa-plus-circle"></i> </a>
<?php endif; ?>
<?php endif; ?>
