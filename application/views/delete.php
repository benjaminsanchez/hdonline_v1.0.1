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
        <li> <a href="#"> <?php echo @$LS['Delete'] ?> <?php echo @$LSI["table_name"]; ?></a> </li>
      </ol>
      <h1> <?php echo @$LS['Delete'] ?> <?php echo @$LSI["table_name"]; ?></h1>
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
                <div class="caption"><span class="caption-subject font-dark sbold"><?php echo @$LS['Delete'] ?> <?php echo @$LSI["table_name"]; ?></span> </div>
                <div class="actions">
                  <div class="btn-group btn-group-devided" data-toggle="buttons">
                  <!--
                    <button type="button" name="back" onclick="document.location.href='<?php echo base_url(); ?>list/<?php echo $ffile; ?>'" class="btn btn-outline grey-salsa"><i class="fa fa-angle-left"></i> <?php echo @$LS['Cancel'] ?></button>
                    <button type="submit" name="Action"  value=" <?php echo @$LS['DeleteBtn'] ?>" class="btn blue"><i class="fa fa-check"></i> <?php echo @$LS['DeleteBtn'] ?></button> -->
                  </div>
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
       
                    <!-- START MASTER TABLE -->
        
                    
                    <!-- END MASTER TABLE -->
                    <div class="tab-content no-space">
                      <div class="tab-pane active" id="tab_general"> 
                        <!-- FIN NUEVO TEMPLATE -->
                        <input type="hidden" name="a_edit" value="<?php echo $curAction; ?>">
                        <input type="hidden" name="x_back" id="x_back" value="<?php if (@$configcrud->config->backpage == "referer"): echo $_SERVER['HTTP_REFERER']; elseif (@$configcrud->config->backpage!="" && @$configcrud->config->backpage != "referer"):  echo base_url().$configcrud->config->backpage; endif; ?>" />
                        <div class="form-body">
                      
                          <?php 
				  if ($load_form):
				  	foreach ($load_form as $row):
					
						echo $row;
					endforeach;
				  endif;
				   ?>
                        </div>
                      </div>
                    </div>
                    
                    
                    <!-- start button -->
                    <div class="actions btn-set text-right mt-30">
                     
                    <button type="button" name="back" onclick="document.location.href='<?php if (@$configcrud->config->backpage == "referer"): echo $_SERVER['HTTP_REFERER']; elseif (@$configcrud->config->backpage!="" && @$configcrud->config->backpage != "referer"):  echo base_url().$configcrud->config->backpage; else: echo (@$configcrud->config->backpage != "") ? base_url().$configcrud->config->backpage: base_url().'list/'.$ffile; endif; ?>'" class="btn btn-outline btn-sm grey-salsa"><i class="fa fa-angle-left"></i> <?php echo @$LS['Cancel'] ?></button>
                    <button type="submit" name="Action"  value=" <?php echo @$LS['DeleteBtn'] ?>" class="btn btn-sm blue"><i class="fa fa-check"></i> <?php echo @$LS['DeleteBtn'] ?></button>
                    </div>
                    <!-- end button --> 
                    
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