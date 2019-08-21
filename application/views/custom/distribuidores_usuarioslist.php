<?php $this->load->view('templates/header'); ?>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/pages/scripts/ew.js"></script>
-->

<div class="container-fluid">
<div class="page-content white"> 
  <!-- BEGIN BREADCRUMBS -->
  <div class="breadcrumbs">
    <ol class="breadcrumb">
      <li> <a href="<?php echo base_url(); ?>dashboard"><?php echo @$LS["inicio"]; ?></a> </li>
      <li class="active">Colaboradores </li>
    </ol>
  </div>
  <!-- END BREADCRUMBS --> 
  <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
  <div class="page-content-container">
    <div class="page-content-row"> 
      
      <!-- BEGIN PAGE BASE CONTENT -->
      <div class="row">
        <div class="col-md-12">
          <?php
if (@$ewmsg <> "") {
?>
          <!-- note-success note-warning note-primary note-info note-danger -->
          <div class="note note-info note-shadow">
            <p> <?php echo @$LANG["nota"]; ?> <?php echo $ewmsg; ?> </p>
          </div>
          <?php
}

?>
          
          <!-- Begin: life time stats -->
          <div class="portlet light"> 
            
            <!-- start title-->
            <div class="portlet-title">
              <div class="caption"><span class="caption-subject font-dark sbold">Colaboradores <?php echo $usuarioPerfil->distribuidor_nombre; ?></span> </div>
              <!-- start: buttons -->
              <div class="actions">
                <div> <a href="<?php echo base_url()."add/distribuidores_usuarios_tmp"; ?>" class="btn btn-sm blue"> <?php echo @$LS['AddLink'] ?> <i class="fa fa-plus"></i> </a> </div>
              </div>
              <!-- end: buttons --> 
            </div>
            <!-- end title -->
            
            <div class="portlet-body">
              <div class="tabbable"> 
                
                <!-- START PAGEDETAIL --> 
                <!-- END PAGE DETAIL -->
                <div class="tab-content no-space">
                  <div class="tab-pane active" id="tab_general">
                    <div class="table-container">
                      <div id="datatable_products_wrapper" class="portlet-body form filter-form">
                        <div class="row">
                          <div class="col-md-4 col-sm-12">
                            <div class="table-group-actions pull-right"> <span></span> </div>
                          </div>
                        </div>
                        <div class="table-scrollable"> 
                          <!--- INICIO PEGADO ANTERIOR -->
                         
                          <table class="table table-hover table-striped sortbody" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                            <thead>
                              <tr role="row" class="heading bg-grey-steel">
                                <th> Nombre </th>
                                <th> Perfil </th>
                                <th> Email </th>
                                <th> Estado </th>
                                <th>&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
								
								
								foreach ($records["tmp"] as $id_distribuidor_usuario=>$row): ?>
                              <!-- Table body -->
                              <?php if ($row->perfil_nombre != ""): ?>
                              <tr role="row" class="ewTableAltRow">
                                <td><?php echo $row->nombre; ?></td>
                                <td><?php echo $row->perfil_nombre; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php 
								  
								  $comparar_usuario = comparar_usuarios($records["usuario"][$id_distribuidor_usuario],$records["tmp"][$id_distribuidor_usuario]);
								
								  if (count($comparar_usuario)>0):
								  echo "Cambios pendientes de aprobación";
								  else:
								  echo "Activado";
								  endif;
								   ; ?></td>
                                <td><a href="<?php echo base_url(); ?>edit/distribuidores_usuarios_tmp/?id_distribuidor_usuario=<?php echo $id_distribuidor_usuario; ?>" class="btn btn-sm blue btn-outline" title=" <?php echo @$LS['Edit'] ?>" ><i class="fa fa-pencil"></i>
                                  <?php // echo @$LS['Edit'] ?>
                                  </a> 
<?php //var_dump(@$LS);?>                                  
                                  <a href="<?php echo base_url(); ?>delete/distribuidores_usuarios_tmp/?id_distribuidor_usuario=<?php echo $id_distribuidor_usuario; ?>" class="btn btn-sm grey-cascade btn-outline" title=" <?php echo @$LS['DeleteLink'] ?>" ><i class="fa fa-trash-o"></i>
                                  <?php // echo @$LS['Edit'] ?>
                                  </a> 
                                  </td>
                              </tr>
                              <?php endif; ?>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                          
                          <!-- end tpl preview --> 
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->
<?php $this->load->view('templates/footer'); ?>
<script language="javascript">
  $(document).ready(function(e) {
	$('input.to-down').datepicker({
		orientation: "bottom auto",
		 autoclose: true
	});
	var defaulthtml = $("#detalle-movimiento").html();
	$("#detalle-movimiento").on("hidden", function () {
		$("#detalle-movimiento").html(defaulthtml);
	});
	
	$('form#filterform select').on('change', function(){
		var selected = $(this).find("option:selected").val();
		$('form#filterform').submit();
	});
		
	$('#filterrange').on('apply.daterangepicker', function(ev, picker) {
	  //do something, like clearing an input
	    $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
	 $('form#filterform').submit();
	});
	
	
  $('#filterrange').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });
});
</script>