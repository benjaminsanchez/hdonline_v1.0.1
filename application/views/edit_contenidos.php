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
    
    <form name="<?php echo $ffile; ?>edit" class="form-horizontal form-row-seperated editform" id="<?php echo $ffile; ?>edit" action="<?php echo base_url(); ?><?php echo $actionform; ?>" method="post">
      <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
      
      <div class="page-content-container">
      <div class="page-content-row">
      <!-- BEGIN PAGE SIDEBAR -->
      <?php $this->load->view('templates/sidebar'); ?>
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
              <div class="btn-group btn-group-devided" data-toggle="buttons"> 
                <!--
                    <button type="button" name="back" onclick="document.location.href='<?php echo base_url(); ?>list/<?php echo $ffile; ?>'" class="btn btn-outline grey-salsa"><i class="fa fa-angle-left"></i> <?php echo @$LS['Cancel'] ?></button>
                    <button type="submit" name="Action"  value=" <?php echo @$LS['EditBtn'] ?>" class="btn blue"><i class="fa fa-check"></i> <?php echo @$LS['EditBtn'] ?></button> --> 
              </div>
            </div>
          </div>
          <!-- END PAGE TITLE --> 
          
          <!-- BEGIN PAGE CONTENT--> 
          <?php echo $errors; ?> 
          
          <!-- BEGIN PAGE HEADER--> 
          <!-- BEGIN PAGE HEAD --> 
          <!-- BEGIN PAGE TITLE --> 
          
          <!-- END PAGE HEAD --> 
          <!-- END PAGE HEADER-->
          
          <div class="portlet-body">
            <div class="tabbable">
              <?php if (@$configcrud->config->childtable): ?>
              <!-- START CHILD TABLE -->
              <ul class="nav nav-tabs">
                <li class="active"> <a href="#tab_general" data-toggle="tab"> Datos generales</span></a></li>
                <?php foreach ($configcrud->config->childtable as $table=>$linkfield):
	  	$linkfield = explode(",",$linkfield);
	   ?>
                <li onClick="guardaCambios('<?php echo base_url(); ?>list/<?php echo $table; ?>?<?php echo $sufix_action; ?>')" > <a href="#" > &nbsp; <?php echo  @$LSI["table_".$table]; ?></a> </li>
                <?php endforeach; ?>
              </ul>
              
              <!-- END: CHILDTABLE -->
              <?php endif; ?>
              <!-- START MASTER TABLE -->
              <?php
                   
                    if (@$master_record): foreach ($master_record as $row):
                	   		   foreach ($master_fields as $key => $val):				
                    ?>
              <input type="hidden" name="x_master_<?php echo $val; ?>" id="x_master_<?php echo $val; ?>" value="<?php echo @$row->$val; ?>">
              <?php
						endforeach;				
					endforeach; endif ?>
              
              <!-- END MASTER TABLE -->
              <div class="tab-content no-space">
                <div class="tab-pane active" id="tab_general"> 
                  <!-- FIN NUEVO TEMPLATE -->
                  <input type="hidden" name="a_edit" value="<?php echo $curAction; ?>">
                  <input type="hidden" name="x_back" id="x_back" value="<?php if (@$configcrud->config->backpage == "referer"): echo $_SERVER['HTTP_REFERER']; elseif (@$configcrud->config->backpage!="" && @$configcrud->config->backpage != "referer"): echo base_url().$configcrud->config->backpage; endif; ?>" />
                  <div class="form-body"> 
                    <!-- textos de validacion -->
                    <div class="alert alert-danger display-hide">
                      <button class="close" data-close="alert"></button>
                      Tiene algunos errores, revise los campos marcados en rojo</div>
                    
                    <!-- end textos de validacion -->
                    <?php 
				  if ($load_form):
				  	foreach ($load_form as $row):
						echo $row;
					endforeach;
				  endif;
				   ?>
                    <!-- textos de validacion -->
                    <div class="alert alert-success display-hide">
                      <button class="close" data-close="alert"></button>
                      Formulario validado correctamente </div>
                    <!-- end textos de validacion --> 
                  </div>
                </div>
              </div>
              
              <!-- start button -->
              <div class="actions btn-set text-right mt-30">
                <button type="button" name="back" onclick="document.location.href='<?php if (@$configcrud->config->backpage == "referer"): echo $_SERVER['HTTP_REFERER']; elseif (@$configcrud->config->backpage!="" && @$configcrud->config->backpage != "referer"):  echo base_url().$configcrud->config->backpage; else: echo (@$configcrud->config->backpage != "") ? base_url().$configcrud->config->backpage: base_url().'list/'.$ffile; endif; ?>'" class="btn btn-outline btn-sm grey-salsa"><i class="fa fa-angle-left"></i> <?php echo @$LS['Cancel'] ?></button>
                <button type="submit" name="Action"  value=" <?php echo @$LS['EditBtn'] ?>" class="btn btn-sm blue"><i class="fa fa-check"></i> <?php echo @$LS['EditBtn'] ?></button>
              </div>
              <!-- end button --> 
              
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- END PAGE CONTENT--> 
  </div>
</div>
</div>
</div>
</div>
<!-- END CONTENT -->
<?php $this->load->view('templates/footer'); ?>
<script src="<?php echo base_url(); ?>assets/global/plugins/jstree/dist/jstree.min.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>assets/custom/js/ui-tree.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 