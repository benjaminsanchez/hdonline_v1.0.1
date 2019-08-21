<?php $this->load->view('templates/header'); ?>
<?php if ($sExport == "") { ?>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/pages/scripts/ew.js"></script>
-->

<!-- Start Modal-->

<div class="modal fade container tplpreview" id="detalle-movimiento" role="basic" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Detalle movimiento</h4>
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
      <li class="active">Log de actividades </li>
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
                <div class="caption"><span class="caption-subject font-dark sbold">Log de Actividades</span> </div>
                <!-- start: buttons -->
                <div class="actions">
                  <div>
                    <?php 
  
if (@$configcrud->config->export != ""): 
 	$exports = explode(",",$configcrud->config->export);
?>
                    <div class="btn-group"> <a class="btn blue btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <?php echo @$LS["export"]; ?> <i class="fa fa-angle-down"></i> </a>
                      <ul class="dropdown-menu pull-right">
                        <?php foreach ($exports as $export): ?>
                        <li> <a href="<?php echo base_url()."list/".$ffile."/export-".$export."?".$_SERVER['QUERY_STRING']; ?>" target="_blank"> <?php echo @$LS['ExportToExcel'] ?></a> </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                    <?php endif; ?>
                  </div>
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
                          <!-- Start Filtros -->
                          <div class="row">
                            <form id="filterform" method="get">
                              <?php } ?>
                              <div class="col-md-4">Rango de fechas<br>
                                 <div class="input-group">
                    <input type="text" class="form-control bg-grey-steel" id="filterrange" name="fechas" placeholder="Buscar por fechas" autocomplete="off" value="<?php echo @$fechas; ?>" onKeyDown="return false" onKeyUp="return false" >
                    <span class="input-group-btn">
                    <button class="btn blue-hoki uppercase bold" type="button"><i class="fa fa-calendar"></i></button>
                    </span> </div>
                              </div>
                              <div class="col-md-3">Usuario
                                <select name="usuario" class="bs-select form-control" data-style="grey-steel">
                                  <option value="">Todos</option>
                                  <?php foreach ($administradores as $adm): ?>
                                  <option value="<?php echo $adm->usuario; ?>" <?php if ($usuario==$adm->usuario) echo ' selected'; ?>><?php echo $adm->nombre; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                             
                              <div class="col-md-3 pull-left">Tipo Movimiento
                                <select name="tipo_mov"  class="bs-select form-control" data-style="grey-steel">
                                  <option value="">Todos</option>
                                  <?php foreach ($tipos_movimientos as  $tmov): ?>
                                  <option value="<?php echo $tmov->tipo_mov; ?>" <?php if ($tipo_mov==$tmov->tipo_mov) echo ' selected'; ?>><?php echo $LS["log_movimientos"]["tipo_mov"][$tmov->tipo_mov]; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-md-2 pull-left">Sección
                                <select name="tabla_nombre"  class="bs-select form-control" data-style="grey-steel">
                                  <option value="">Todas</option>
                                  <?php foreach ($secciones as $sec): ?>
                                  <option value="<?php echo $sec->tabla_nombre; ?>" <?php if ($tabla_nombre==$sec->tabla_nombre) echo ' selected'; ?>><?php echo $LS["log_movimientos"]["tabla_nombre"][$sec->tabla_nombre]; ?></option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                               
                              <div class="col-md-3 pull-right text-right"><button class="btn btn-xs blue-hoki btn-outline cleanFilter"><i class="fa fa-refresh"></i> &nbsp; Reestablecer filtros</button> </div>
                            </form>
                          </div>
                          <!-- End filtros --->
                          <div class="row">
                            <div class="col-md-4 col-sm-12">
                              <div class="table-group-actions pull-right"> <span></span> </div>
                            </div>
                          </div>
                          <div class="table-scrollable"> 
                            <!--- INICIO PEGADO ANTERIOR -->
                            <form method="post">
                              <table class="table table-hover table-striped sortbody" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                                <thead>
                                  <tr role="row" class="heading bg-grey-steel">
                                    <th> Usuario </th>
                                    <th> Fecha </th>
                                    <th> Tipo de movimiento </th>
                                    <th> Sección </th>
                                    <th>Detalle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($records as $row): ?>
                                  <!-- Table body -->
                                  <tr role="row" class="ewTableAltRow"> 
                                    <!-- IP -->
                                    <td><b>
                                      <?php
                                   switch ($row->tipo_usuario):
										case "administrador": 	echo $row->adm_nombre; break;
										case "distribuidor":	echo $row->dus_nombre; break;
										case "usuario":			echo $row->usu_nombre;  break;
								   endswitch; 
								   
								   ?>
                                      </b></td>
                                    <!-- fecha -->
                                    <td><?php echo fecha($row->fecha,"total"); ?></td>
                                    <!-- administrador -->
                                    <td><?php echo $LS["log_movimientos"]["tipo_mov"][$row->tipo_mov]; ?></td>
                                    <!-- archivo -->
                                    <td><?php echo $LS["log_movimientos"]["tabla_nombre"][$row->tabla_nombre]; ?></td>
                                    <!-- titulo -->
                                    <td class="ewTableTdOptions" nowrap="nowrap"><a href="<?php echo base_url(); ?>list/log_actividades_detalle/<?php echo $row->id_movimiento; ?>" data-target="#detalle-movimiento" data-toggle="modal" class="btn btn-sm blue preview" title=" Ver detalle"><i class="fa fa-search"></i></a></td>
                                  </tr>
                                  <?php endforeach; ?>
                                </tbody>
                              </table>
                              
                              <!-- end tpl preview -->
                            </form>
                          </div>
                           <?php $this->load->view('templates/pager'); ?>
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