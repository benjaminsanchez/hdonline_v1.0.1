<!-- BEGIN SIDEBAR -->
<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->

<div class="page-sidebar">
  <nav class="navbar" role="navigation"> 
    <!-- BEGIN SIDEBAR MENU --> 
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) --> 
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode --> 
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode --> 
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing --> 
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded --> 
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu nav navbar-nav margin-bottom-35 " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
      <!--   <li class="start "> <a href="<?php echo base_url(); ?>"> <i class="fa fa-signal"></i> <span class="title">Dashboard</span> </a> </li>-->
      <?php	foreach ($MenuContenidos as $menu):
			if ($menu->codigo == @$current_menu_padre || $menu->codigo == $ffile):
				$class= "active open";
			else:
				$class = "";
			endif;
	  		  ?>
      <li class="<?php echo $class; ?>"> <a href="<?php if ($menu->onclick!= "#"){ echo base_url().$menu->onclick; } else{ echo "#"; } ?>" <?php if (strpos($menu->onclick,"assets")!==FALSE) { echo ' target="_blank"'; } ?>> <i class="<?php echo $menu->imagen; ?>"> </i> <span class="title"> <?php echo $menu->nombre; ?></span>
        <?php		if (@count($SubMenuContenidos[$menu->codigo])>0 ): ?>
        <span class="arrow <?php if (($menu->codigo == @$current_menu_padre->codigo)): ?>open<?php endif; ?>"></span> </a>
        <ul class="sub-menu">
          <?php	
		  $arreglo = explode("_",$ffile);
		  foreach ($SubMenuContenidos[$menu->codigo] as $smenu): 
		  
					if ($smenu->codigo == $ffile || $smenu->codigo==$arreglo[0]):
						$classb = "active";
					else:
						$classb = "";
					endif;?>
                    <?php if ($smenu->nombre != ""): ?>
          <li class="<?php echo $classb; ?>"> <a href="<?php echo base_url().$smenu->onclick; ?>"><?php echo $smenu->nombre; ?></a></li>
          <?php endif; ?>
          <?php			endforeach;    ?>
        </ul>
        <?php		else: ?>
        </a>
        <?php		endif; ?>
      </li>
      <?php	endforeach; ?>
    </ul>
    <!-- END SIDEBAR MENU --> 
  </nav>
</div>
<!-- END SIDEBAR -->
<?php /*
<div class="page-sidebar">
  <nav class="navbar" role="navigation"> 
    <!-- Brand and toggle get grouped for better mobile display --> 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <ul class="nav navbar-nav margin-bottom-35">
      
      
      
      <?php	foreach ($Menu as $menu):
			if ($menu->codigo == @$current_menu_padre || $menu->codigo == $ffile):
				$class= "active open";
			else:
				$class = "";
			endif;
	  		  ?>
			<li class="<?php echo $class; ?>"> <a href="<?php if ($menu->onclick!= "#"){ echo base_url().$menu->onclick; } else{ echo "#"; } ?>" <?php if (strpos($menu->onclick,"assets")!==FALSE) { echo ' target="_blank"'; } ?>> <i class="<?php echo $menu->imagen; ?>"> </i> <span class="title"> <?php echo $menu->nombre; ?></span>  
                  
<?php		if (count($SubMenu[$menu->codigo])>0 ): ?>

		<span class="arrow <?php if (($menu->codigo == @$current_menu_padre->codigo)): ?>open<?php endif; ?>"></span>
        
 </a>
 <ul class="sub-menu">

<?php	foreach ($SubMenu[$menu->codigo] as $smenu): 
					if ($smenu->codigo == $ffile):
						$classb = "active";
					else:
						$classb = "";
					endif;?>
        <li class="<?php echo $classb; ?>"> <a href="<?php echo base_url().$smenu->onclick; ?>"><?php echo $smenu->nombre; ?></a></li>
<?php			endforeach;    ?>  
</ul>   
<?php		else: ?>
		 </a>
<?php		endif; ?>
        
       </li>
<?php	endforeach; ?>
    </ul>
  </nav>
</div>


*/?>
