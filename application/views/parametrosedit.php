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
      <h1> Configuraciones</h1>
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
          <div class="portlet light">
            <div class="portlet-title">
              <div class="caption"><span class="caption-subject font-dark sbold">Aspecto Visual</span> </div>
              <div class="actions">
                <div class="btn-group btn-group-devided" data-toggle="buttons"> 
                  <!--
                    <button type="button" name="back" onclick="document.location.href='https://myhd.s1.cl/list/parametros'" class="btn btn-outline grey-salsa"><i class="fa fa-angle-left"></i> Cancelar</button>
                    <button type="submit" name="Action"  value=" Guardar" class="btn blue"><i class="fa fa-check"></i> Guardar</button> --> 
                </div>
              </div>
            </div>
            <!-- END PAGE TITLE --> 
                   <?php
if (@$msg_respuesta <> "") {
?>
            <!-- note-success note-warning note-primary note-info note-danger -->
            <div class="note note-info note-shadow">
              <p> <?php echo @$LANG["nota"]; ?> <?php echo $msg_respuesta; ?> </p>
            </div>
            <?php
}
?>
            <!-- BEGIN PAGE CONTENT-->
            <form name="parametrosedit" class="form-horizontal form-row-seperated" id="parametrosedit" action="<?php echo base_url(); ?>save/visual" method="post">
              
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
                      <input type="hidden" name="a_edit" value="A">
                      <input type="hidden" name="x_back" id="x_back" value="">
                      <div class="form-body">
                      <span class="sbold font-dark">Logo y color</span><hr />
                        <div class="form-group" id="Show_x_id_parametro">
                          <label class="col-md-3 control-label">Logo</label>
                          <div class="col-md-9">
                              <input type="hidden" name="x_logo" id="x_logo" size="20" class="imageinput" value="<?php echo htmlspecialchars(@$config_localizacion->x_logo) ?>"  <?php echo @$required; ?>>   
    
    
    
     <a href="#" data-url="<?php echo base_url(); ?>biblioteca/list?mode=select&field=x_logo&type=images" data-toggle="modal" class="btn blue pull-left biblioteca"><i class="fa fa-search"></i> &nbsp;Examinar</a>
       <div class="preview-biblioteca" id="ShowPreviewx_logo" style="background:#2F373E"></div>

                          </div> 

                        </div>
                        <div class="form-group" id="Show_x_codigo">
                          <label class="col-md-3 control-label">Color</label>
                          <div class="col-md-2">
                            <input type="text" name="x_color" id="x_color" style="background-color:<?php echo $config_localizacion->color; ?>" size="30" class="form-control" maxlength="" value="<?php echo $config_localizacion->color; ?>" required>
                          </div>
                        </div>
                         <span class="sbold font-dark">Textos libres</span><hr />
                        <div class="form-group" id="Show_x_seccion">
                          <label class="col-md-3 control-label">Footer sitio</label>
                          <div class="col-md-9">
                              <textarea class="ckeditor" cols="35" rows="4" id="x_texto_footer" name="x_texto_footer"><?php echo $config_localizacion->texto_footer; ?></textarea>
                          </div>
                        </div>
                        <div class="form-group" id="Show_x_seccion">
                          <label class="col-md-3 control-label">Footer email</label>
                          <div class="col-md-9">
                            <textarea class="ckeditor" cols="35" rows="4" id="x_footer_email" name="x_footer_email"><?php echo $config_localizacion->footer_email; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- start button -->
                  <div class="actions btn-set text-right mt-30">

                    <button type="submit" name="Action" value=" Guardar" class="btn btn-sm blue"><i class="fa fa-check"></i> Guardar</button>
                  </div>
                  <!-- end button --> 
                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->
<?php $this->load->view('templates/footer'); ?>
