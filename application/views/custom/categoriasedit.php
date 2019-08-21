<?php $this->load->view('templates/header'); ?>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/pages/scripts/ew.js"></script>
-->

<div class="container-fluid">
  <div class="page-content white"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="index.php"><?php echo @$LS["inicio"]; ?></a> </li>
        <li> <a href="<?php echo base_url(); ?>list/<?php echo $ffile; ?>"> <?php echo @$categoria_tipo_nombre; ?></a> </li>
        <li> <a href="#"><?php echo ($actionform=="U")?@$LS['Edit']:@$LS['Add']; ?> <?php echo @$categoria_tipo_nombre; ?> <?php echo @$LSI["table_name"]; ?></a> </li>
      </ol>
      <h1> <?php echo ($actionform=="U")?@$LS['Edit']:@$LS['Add']; ?> <?php echo @$categoria_tipo_nombre; ?></h1>
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
                <div class="caption"><span class="caption-subject font-dark sbold"><?php echo ($actionform=="U")?@$LS['Edit']:@$LS['Add']; ?> <?php echo @$categoria_tipo_nombre; ?></span> </div>
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
              <form name="<?php echo $ffile; ?>edit" class="form-horizontal form-row-seperated" id="<?php echo $ffile; ?>edit" action="<?php echo base_url(); ?>save/categorias" method="post">
                
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
                        <input type="hidden" name="a_edit" value="<?php echo $actionform; ?>">
                        <input type="hidden" name="x_back" id="x_back" value="<?php echo base_url(); ?>list/categorias/?">
                        <div class="form-body">
                          <div class="form-group" style="display:none" id="Show_x_id_categoria">
                            <label class="col-md-3 control-label">Id categoria</label>
                            <div class="col-md-9">
                              <input type="hidden" name="x_id_categoria" id="x_id_categoria" size="30" maxlength="" value="<?php echo @$categoria->id_categoria; ?>"> <input type="hidden" name="x_id_categoria_tipo" value="<?php echo (@$categoria->id_categoria_tipo!="")?$categoria->id_categoria_tipo:$categoria_tipo->id_categoria_tipo; ?>">
                            </div>
                          </div>
                    <?php if ($actionform == "U"): 
					?>
                    
                      <div class="form-group" id="Show_x_id_categoria_sub">
                            <label class="col-md-3 control-label"><b> <?php foreach ($categorias_relacionadas as $catrel): echo $catrel->descripcion; break; endforeach; ?></b></label>
                              <input type="hidden" name="x_id_categoria_top[]" id="x_id_categoria_top[]" class="form-control" value="<?php foreach ($categorias_relacionadas as $catrel): echo $catrel->id_categoria; break; endforeach; ?>" >
                          
                            <div class="col-md-9"><p class="form-control-static"><?php foreach ($categorias_relacionadas as $catrel): echo $catrel->nombre; break; endforeach; ?></p></div>
                            
                              
                              
                            </div>
                            
                    <?php /*
                    <?php print_r($categorias_relacionadas); ?>
                           <div class="form-group" id="Show_x_id_categoria_sub" >
                            <label class="col-md-3 control-label">Categorías Padre asociadas</label>
                            <div class="col-md-9">
                              <select multiple  name="x_id_categoria_top[]" id="x_id_categoria_top[]" class="form-control" >
                              
                              <?php
							 // echo $options_categorias_padre;
							 foreach ($categorias_padre as $cat): ?>
                                  <option value="<?php echo $cat->id_categoria; ?>" <?php if (@in_array($cat->id_categoria,@$categorias_relacionadas)): echo 'selected'; endif; ?> ><?php echo $cat->nombre; ?></option>
                              <?php 
							  endforeach; 
							  
							
							  ?>
                              </select>
                            </div>
                          </div>
                        <?PHP
						*/
						endif;
                        ?>
                           <?php if ($actionform == "A"): ?>
                           <div class="form-group" id="Show_x_id_categoria_sub">
                            <label class="col-md-3 control-label"><b> <?php echo ($categoria_padre->descripcion); ?></b></label>
                              <input type="hidden" name="x_id_categoria_top[]" id="x_id_categoria_top[]" class="form-control" value="<?php echo $id_categoria_padre; ?>" >
                          
                            <div class="col-md-9"><p class="form-control-static"><?php echo ($categoria_padre->nombre); ?></p></div>
                            
                              
                              
                            </div>
                            <?php endif; ?>
                          </div>
                          
                          
                          
                          
                          
                          <div class="form-group" id="Show_x_nombre">
                            <label class="col-md-3 control-label">Nombre</label>
                            <div class="col-md-9">
                              <input type="text" name="x_nombre" id="x_nombre" class="form-control" size="30" maxlength="" value="<?php echo @$categoria->nombre; ?>" required>
                            </div>
                          </div>
                         
                       
                        </div>
                      </div>
                    </div>
                    
                    <!-- start button -->
                    <div class="actions btn-set text-right mt-30">
                      <button type="button" name="back" onclick="document.location.href='<?php echo (@$configcrud->config->backpage != "") ? base_url().$configcrud->config->backpage: base_url().'list/'.$ffile; ?>'" class="btn btn-outline btn-sm grey-salsa"><i class="fa fa-angle-left"></i> <?php echo @$LS['Cancel'] ?></button>
                      <button type="submit" name="Action"  value="<?php echo ($actionform=="U")?@$LS['EditBtn']:@$LS['AddBtn']; ?> <?php echo @$categoria_tipo_nombre; ?>" class="btn btn-sm blue"><i class="fa fa-check"></i> <?php echo ($actionform=="U")?@$LS['EditBtn']:@$LS['AddBtn']; ?> <?php echo @$categoria_tipo_nombre; ?></button>
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
