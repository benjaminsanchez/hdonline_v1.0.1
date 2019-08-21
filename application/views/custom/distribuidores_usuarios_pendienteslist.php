<?php $this->load->view('templates/header'); ?>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/pages/scripts/ew.js"></script>
-->

<!-- Start Modal-->

<div class="modal fade container dusuariopreview" id="detalle-movimiento" role="basic" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Solicitud de moderación</h4>
  </div>
  <div class="modal-body"> <img src="<?php echo base_url(); ?>assets/global/img/loading-spinner-grey.gif" alt="" class="loading"> <span> &nbsp;&nbsp;Cargando... </span> </div>
</div>
<!-- End modal -->
<div class="container-fluid">
<div class="page-content white"> 
  <!-- BEGIN BREADCRUMBS -->
  <div class="breadcrumbs">
    <ol class="breadcrumb">
      <li> <a href="<?php echo base_url(); ?>dashboard"><?php echo @$LS["inicio"]; ?></a> </li>
      <li> <a href="javascript:void(0)">Configuraciones</a> </li>
      <li class="active">Usuarios de distribuidores pendientes de moderación</li>
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
              <div class="portlet-title">
                <div class="caption"><span class="caption-subject font-dark sbold">Usuarios de distribuidores pendientes de moderación</span> </div>
                <!-- start: buttons -->
                <div class="actions">
                  <div> </div>
                </div>
                <!-- end: buttons --> 
              </div>
              <div>
                <div> <span class="caption-helper"><?php echo @$LANG["list_help"]; ?></span> </div>
              </div>
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
                          <?php if (count($records["tmp"])>0): ?>
                          <div class="table-scrollable">
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
								
								
								foreach ($records["tmp"] as $id_distribuidor_usuario=>$row): if ($row->nombre != ""):  ?>
                                <!-- Table body -->
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
                                  <td><a href="<?php echo base_url(); ?>list/distribuidores_usuarios_pendientes_detail/<?php echo $id_distribuidor_usuario; ?>" data-target="#detalle-movimiento" data-toggle="modal" class="btn btn-sm blue preview" title=" Ver detalle"><i class="fa fa-search"></i></a></td>
                                </tr>
                                <?php endif; endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                          <?php else: ?>
                          <div class="note note-info note-bordered">
                            <p> <?php echo @$LS['NoRecord']; ?></p>
                          </div>
                          <?php endif; ?>
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