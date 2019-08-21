<?php $this->load->view('templates/header'); ?>
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
  <div class="page-content"> 
    <!-- BEGIN PAGE HEADER--> 
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head"> 
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1> <?php echo @$LS['Edit'] ?> <?php echo @$LSI["table_name"]; ?></h1>
      </div>
      <!-- END PAGE TITLE --> 
    </div>
    <!-- END PAGE HEAD --> 
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
      <li> <a href="index.php"><?php echo @$LS["inicio"]; ?></a> <i class="fa fa-circle"></i> </li>
      <li> <a href="<?php echo base_url(); ?>list/<?php echo $ffile; ?>"><?php echo @$LSI["table_name"]; ?></a> <i class="fa fa-circle"></i> </li>
      <li> <a href="#"> <?php echo @$LS['Edit'] ?> <?php echo @$LSI["table_name"]; ?></a> </li>
    </ul>
    <!-- END PAGE BREADCRUMB --> 
    <!-- END PAGE HEADER--> 
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
      <div class="col-md-12"> <?php echo $errors; ?>
        <form name="<?php echo $ffile; ?>edit" class="form-horizontal form-row-seperated" id="<?php echo $ffile; ?>edit" action="<?php echo base_url(); ?><?php echo $actionform; ?>" method="post">
          <div class="portlet light">
          <div class="portlet-title">
            <div class="caption"> <i class="font-green-sharp"></i> <span class="caption-subject font-green-sharp bold uppercase"> <?php echo @$LS['Edit'] ?> <?php echo @$LSI["table_name"]; ?> </span> <span class="caption-helper"></span> </div>
            <div class="actions btn-set">
              <button type="button" name="back" onclick="document.location.href='<?php echo base_url(); ?>list/<?php echo $ffile; ?>'" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> <?php echo @$LS['Cancel'] ?></button>
              <button type="submit" name="Action"  value=" <?php echo @$LS['EditBtn'] ?>" class="btn green-haze btn-circle"><i class="fa fa-check"></i> <?php echo @$LS['EditBtn'] ?></button>
            </div>
          </div>
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
                 
					  <input type="hidden" name="x_master_<?php echo $val; ?>" id="x_master_<?php echo $val; ?>" value="<?php echo $row->$val; ?>">
		
                      <?php
						endforeach;				
					endforeach; endif ?>
                    
               <!-- END MASTER TABLE -->
              <div class="tab-content no-space">
                <div class="tab-pane active" id="tab_general"> 
                  <!-- FIN NUEVO TEMPLATE -->
                  <input type="hidden" name="a_edit" value="<?php echo $curAction; ?>">
                  <input type="hidden" name="x_back" id="x_back" value="" />
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
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- END PAGE CONTENT--> 
  </div>
</div>
<!-- END CONTENT -->
<?php $this->load->view('templates/footer'); ?>
