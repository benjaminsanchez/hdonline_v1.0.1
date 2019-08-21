<?php $this->load->view('templates/header'); ?>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/pages/scripts/ew.js"></script>
-->

<div class="container-fluid">
  <div class="page-content white"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="index.php"><?php echo @$LS["inicio"]; ?></a> </li>
        <li> <a href="<?php echo base_url(); ?>list/<?php echo $ffile; ?>"><?php echo @$LSI["table_name"]; ?></a> </li>
        <li> <a href="#"> <?php echo @$LS['Edit'] ?> <?php echo @$LSI["table_name"]; ?></a> </li>
      </ol>
      <h1> <?php echo @$LS['Edit'] ?> <?php echo @$LSI["table_name"]; ?></h1>
    </div>
    <!-- END BREADCRUMBS --> 
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
      <div class="page-content-row"> 
        <!-- BEGIN PAGE SIDEBAR -->
        <?php $this->load->view('templates/sidebar_admin'); ?>
        <!-- END PAGE SIDEBAR -->
        <div class="page-content-col"> 
          <script type="text/javascript" language="javascript">
function guardaCambios(volver) {
		document.getElementById("x_back").value=volver;
//		if (EW_checkMyForm(document.textosedit)) { 
			document.<?php echo $ffile; ?>edit.submit();
	/*	} else {
			alert("<?php echo @$LS['MsgTabChange'] ?>");	
			return false;
		}
		*/
} 
</script> 
          <!-- INICIO NUEVO TEMPLATE --> 
          <!-- BEGIN CONTENT -->
          
          <div class="page-content-wrapper">
            <div class="portlet light">
              <div class="portlet-title">
                <div class="caption"><span class="caption-subject font-dark sbold"><?php echo @$LS['Edit'] ?> <?php echo @$LSI["table_name"]; ?></span> </div>
                <div class="actions">
                  <div class="btn-group btn-group-devided" data-toggle="buttons"> </div>
                </div>
              </div>
              <!-- END PAGE TITLE --> 
              
              <!-- BEGIN PAGE CONTENT--> 
              <?php echo $errors; ?>
              <form name="<?php echo $ffile; ?>edit" class="form-horizontal form-row-seperated" id="<?php echo $ffile; ?>edit" action="<?php echo base_url(); ?><?php echo $actionform; ?>" method="post">
                
                <!-- BEGIN PAGE HEADER--> 
                <!-- BEGIN PAGE HEAD --> 
                <!-- BEGIN PAGE TITLE --> 
                
                <!-- END PAGE HEAD --> 
                <!-- END PAGE HEADER-->
                
                <div class="portlet-body">
                  <div class="tabbable">
                    <div class="tab-content no-space">
                      <div class="tab-pane active" id="tab_general"> 
                        <!-- FIN NUEVO TEMPLATE -->
                        <input type="hidden" name="a_edit" value="<?php echo $curAction; ?>">
                      <input type="hidden" name="x_id_tipo_contenido" id="x_id_tipo_contenido" value="<?php echo $id_tipo_contenido; ?>"> 
                        <input type="hidden" name="x_back" id="x_back" value="<?php if (@$configcrud->config->backpage == "referer"): echo $_SERVER['HTTP_REFERER']; elseif (@$configcrud->config->backpage!="" && @$configcrud->config->backpage != "referer"):  echo base_url().$configcrud->config->backpage; endif; ?>" />
                        <div class="form-body">
                          <?php if ($count_contenido_relacionado>0): ?>
                          <div class="alert alert-danger no-margin margin-top-10">
                            <p><i class="fa fa-warning"></i> <b><?php echo $count_contenido_relacionado; ?> Archivos relacionados para el tipo de contenido <b>"<?php echo $load->nombre; ?>"</b></b></p><p> Para eliminar este ITEM, es necesario desvincular todos los archivos relacionados desde la biblioteca. </p>
</div>
                          
                          <!-- start button -->
                          <div class="actions btn-set text-right mt-30">
                            <button type="button" name="back" onclick="document.location.href='<?php if (@$configcrud->config->backpage == "referer"): echo $_SERVER['HTTP_REFERER']; elseif (@$configcrud->config->backpage!="" && @$configcrud->config->backpage != "referer"):  echo base_url().$configcrud->config->backpage; else: echo (@$configcrud->config->backpage != "") ? base_url().$configcrud->config->backpage: base_url().'list/'.$ffile; endif; ?>'" class="btn btn-outline btn-sm grey-salsa"><i class="fa fa-angle-left"></i> <?php echo @$LS['Cancel'] ?></button>
                        <a href="javascript:;" class="btn btn-sm blue biblioteca" data-url="<?php echo base_url(); ?>biblioteca/list?nombre_tag=&fechas=&tipo_contenido=<?php echo $id_tipo_contenido; ?>&cat_1=&cat_2=&cat_3=&cat_4="><i class="fa fa-folder-open-o"></i> Abrir Biblioteca (filtrado por <b><?php echo $load->nombre; ?></b>)</a> 
                          </div>
                          <!-- end button -->
                           
                          <?php else: ?>
                          
                          
                           <div class="alert alert-success no-margin margin-top-10">
                            <p><i class="fa fa-check-circle"></i> <b>Sin Archivos relacionados para el tipo de contenido <b>"<?php echo $load->nombre; ?>"</b></b></p><p> No se encontraron archivos vinculados a este ITEM, confirmar para eliminar. </p>
</div>
                          
                          <!-- start button -->
                          <div class="actions btn-set text-right mt-30">
                            <button type="button" name="back" onclick="document.location.href='<?php if (@$configcrud->config->backpage == "referer"): echo $_SERVER['HTTP_REFERER']; elseif (@$configcrud->config->backpage!="" && @$configcrud->config->backpage != "referer"):  echo base_url().$configcrud->config->backpage; else: echo (@$configcrud->config->backpage != "") ? base_url().$configcrud->config->backpage: base_url().'list/'.$ffile; endif; ?>'" class="btn btn-outline btn-sm grey-salsa"><i class="fa fa-angle-left"></i> <?php echo @$LS['Cancel'] ?></button>
                            <button type="submit" name="Action"  value=" <?php echo @$LS['EditBtn'] ?>" class="btn btn-sm blue"><i class="fa fa-check"></i> <?php echo @$LS['EditBtn'] ?></button>
                          </div>
                          <!-- end button -->
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- END PAGE CONTENT--> 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->
<?php $this->load->view('templates/footer'); ?>
</script>