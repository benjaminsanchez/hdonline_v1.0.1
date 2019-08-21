<?php $this->load->view('templates/header'); ?>
<?php if ($sExport == "") { ?>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/pages/scripts/ew.js"></script>
-->

<div class="container-fluid">
<div class="page-content white"> 
  <!-- BEGIN BREADCRUMBS -->
  <div class="breadcrumbs">
    <ol class="breadcrumb">
      <li> <a href="<?php echo base_url(); ?>dashboard"><?php echo @$LS["inicio"]; ?></a> </li>
      <li> <a href="javascript:void(0)">Configuraciones</a> </li>
      <li class="active">Estadísticas </li>
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
                <div class="caption"><span class="caption-subject font-dark sbold">Estadísticas <i class="fa fa-angle-double-right"></i> Usuarios</span> </div>
                <!-- start: buttons -->
                <div class="actions">
                  <div>
                    <?php 
  
 	$exports = array("excel");
?>
                    <div class="btn-group"> <a class="btn blue btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <?php echo @$LS["export"]; ?> <i class="fa fa-angle-down"></i> </a>
                      <ul class="dropdown-menu pull-right">
                        <?php foreach ($exports as $export): ?>
                        <li> <a href="<?php echo base_url()."list/".$ffile."/export-".$export."?".$_SERVER['QUERY_STRING']; ?>" target="_blank"> <?php echo @$LS['ExportToExcel'] ?></a> </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
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
                          <?php } ?>
                          <!-- Start filters -->

<div class="portlet-body form filter-form"> 
  <!-- BEGIN FORM-->
  <form action="index.html" class="form-horizontal form-row-seperated">
    <div class="row fadeInOnReady">
       <div class="col-md-4">
        <div id="reportrange" class="btn grey-steel"> <i class="fa fa-calendar"></i> &nbsp; <span> </span> <b class="fa fa-angle-down"></b> </div>
      </div>
      <div class="col-md-4">
        <select class="bs-select form-control" data-style="grey-steel">
        
          <option>Distribuidor</option>
          <option value="ss1">Fabrics</option>
          <option value="ss1">Ecohome</option>
          <option value="ss1">Persianas Vitacura</option>
          <option value="ss1">Contanza Madrid</option>
          <option value="ss1">Expositora</option>
          <option value="ss1">Alfombras Winter</option>
        </select>
      </div>
      
       <div class="col-md-4">
        <select class="bs-select form-control show-tick" data-style="grey-steel" data-live-search="true"  data-dropup-auto="false" data-size="6">
         <optgroup label="Perfiles">
           <option value="ss1" >Decorador </option>
    <option value="ss2" >Instalador</option>
     <option value="ss2">Vendedor</option>
     <option value="ss2">Jefe de tienda</option>
     <option value="ss2">Dueño</option>
         </optgroup>
        <optgroup label="Usuarios">
    <option value="ss1" data-subtext="Fabrics">Fernando Tapia</option>
    <option value="ss2" data-subtext="Usuario externo">Álvaro Fernandez</option>
     <option value="ss2" data-subtext="Budnik">Martín Wood</option>
     
     </optgroup>
        </select>
      </div>
     
      <div class="col-md-3 pull-right text-right"><a href="#" class="btn btn-xs blue-hoki btn-outline"><i class="fa fa-refresh"></i> &nbsp; Reestablecer filtros</a></div>
    </div>
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
                              <table class="table table-hover table-striped" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                                <thead>
                                  <tr role="row" class="heading bg-grey-steel"> 
                                    <!-- nombre -->
                                    <th width="30%">Usuario</br><span class="th-subtitle" >Perfil/Distribuidor</span></th>
                                    <th width="10%" class="text-center">Visitas</th>
                                    <th width="10%" class="text-center">Asistencias</th>
                                    <th width="10%" class="text-center">Play</th>
                                    <th width="10%" class="text-center"> Imágenes vistas</th>
                                    <th width="10%" class="text-center">Descargas</th>
                                    <th width="10%" class="text-center">Búsquedas</th>
                                    <!-- id_template --> <!-- menu --> 
                                    <!-- estado -->
                                    <th width="10%">&nbsp;</th>
                                    <!--  <th>&nbsp;</th>--> 
                                    
                                  </tr>
                                </thead>
                                <tbody  >
                                  <!-- Table body -->
                                
                                <tr id="data-1" role="row">
                                  <td class="bold handle" >Miguel Salazar <span class="th-subtitle" >Vendedor / Fabrics</span></td>
                                  <td class="text-center">354</td>
                                  <td class="text-center">657</td>
                                  <td class="text-center">67 </td>
                                  <td class="text-center">567</td>
                                  <td class="text-center">576</td>
                                  <td class="text-center">465</td>
                                  <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="#" data-target="#detalle-movimiento" data-toggle="modal" class="btn btn-sm blue preview" title=" Ver detalle"><i class="fa fa-search"></i></a></td>
                                </tr>
                                
                                <!-- Table body -->
                                <tr id="data-2" role="row">
                                  <td class="bold handle">Claudio Cerpa <span class="th-subtitle" >Instalador / Persianas Vitacura</span></td>
                                  <td class="text-center">1.323</td>
                                  <td class="text-center"> 521 </td>
                                  <td class="text-center">12</td>
                                  <td class="text-center">1.244</td>
                                  <td class="text-center">23</td>
                                  <td class="text-center">728</td>
                                  <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="#" data-target="#detalle-movimiento" data-toggle="modal" class="btn btn-sm blue preview" title=" Ver detalle"><i class="fa fa-search"></i></a></td>
                                </tr>
                                  </tr>
                                
                                 
                                  <!-- Table body -->
                                  <tr id="data-3" role="row">
                                    <td class="bold handle">Karina Rivera <span class="th-subtitle" >Operador / HunterDouglas</span></td>
                                    <td class="text-center">23</td>
                                    <td class="text-center"> 521 </td>
                                    <td class="text-center"> 2.321</td>
                                    <td class="text-center">1.244</td>
                                    <td class="text-center">23</td>
                                    <td class="text-center">728</td>
                                    <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="#" data-target="#detalle-movimiento" data-toggle="modal" class="btn btn-sm blue preview" title=" Ver detalle"><i class="fa fa-search"></i></a></td>
                                  </tr>
                                    </tr>
                                  
                                 
                                  <tr id="data-4" role="row">
                                    <td class="bold handle">Jorge Salgado<span class="th-subtitle" >Instalador / DecoHome</span></td>
                                    <td class="text-center">1.323</td>
                                    <td class="text-center"> 521 </td>
                                    <td class="text-center"> 2.321</td>
                                    <td class="text-center">1.244</td>
                                    <td class="text-center">23</td>
                                    <td class="text-center">728</td>
                                    <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="#" data-target="#detalle-movimiento" data-toggle="modal" class="btn btn-sm blue preview" title=" Ver detalle"><i class="fa fa-search"></i></a></td>
                                  </tr>
                                 
                                  <!-- Table body -->
                                  <tr id="data-5" role="row">
                                    <td class="bold handle">Martina Tastets <span class="th-subtitle" >Vendedor / Constanza Madrid</span></td>
                                    <td class="text-center">1.323</td>
                                    <td class="text-center"> 521 </td>
                                    <td class="text-center"> 2.321</td>
                                    <td class="text-center">1.244</td>
                                    <td class="text-center">23</td>
                                    <td class="text-center">728</td>
                                    <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="#" data-target="#detalle-movimiento" data-toggle="modal" class="btn btn-sm blue preview" title=" Ver detalle"><i class="fa fa-search"></i></a></td>
                                  </tr>
                                
                                  <!-- Table body -->
                                  <tr id="data-6" role="row">
                                    <td class="bold handle">Jhon Smith <span class="th-subtitle" >Decorador / Expositora</span></td>
                                    <td class="text-center">1.323</td>
                                    <td class="text-center"> 521 </td>
                                    <td class="text-center"> 2.321</td>
                                    <td class="text-center">1.244</td>
                                    <td class="text-center">23</td>
                                    <td class="text-center">728</td>
                                    <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="#" data-target="#detalle-movimiento" data-toggle="modal" class="btn btn-sm blue preview" title=" Ver detalle"><i class="fa fa-search"></i></a></td>
                                  </tr>
                               
                                  <!-- Table body -->
                                  <tr id="data-7" role="row">
                                    <td class="bold handle">Rafael Martinez <span class="th-subtitle" >Vendedor / EcoHome</span></td>
                                    <td class="text-center">1.323</td>
                                    <td class="text-center"> No </td>
                                    <td class="text-center">12</td>
                                    <td class="text-center">1.244</td>
                                    <td class="text-center">23</td>
                                    <td class="text-center">728</td>
                                    <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="#" data-target="#detalle-movimiento" data-toggle="modal" class="btn btn-sm blue preview" title=" Ver detalle"><i class="fa fa-search"></i></a></td>
                                  </tr>
                                
                                  <!-- Table body --> <!-- Table body -->
                                </tbody>
                              </table>
                              
                              <!-- imagen banner -->
                              <div id="detalle-movimiento" class="modal container fade tplpreview" tabindex="-1">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                  <h4 class="modal-title">Detalle movimientos de usuario</h4>
                                </div>
                                <div class="modal-body">
                                  <table class="table table-striped table-bordered table-hover dataTable no-footer">
                                    <tbody>
                                      <tr>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">IP</th>
                                        <th class="text-center">Rango Fechas</th>
                                      </tr>
                                      <tr>
                                        <td class="text-center">Miguel Salazar</td>
                                        <td class="text-center">190.196.28.176</td>
                                         <td class="text-center">22-10-2017  al 25-10-2017 </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <h5>Movimientos</h5>
                                  <table class="table table-striped table-bordered table-hover dataTable no-footer">
                                   <thead>
                                      <tr>
                                        <th>Fecha</th><th>Acción</th><th>Contenido</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     <tr>
                                        <td class="text-center">25-10-2017 10:24</td><td>Play</td><td>Video Instalacion Powerview</td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">25-10-2017 09:24</td><td>Click</td><td>Alerta de ofertas diciembre</td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">25-10-2017 08:24</td><td>Asistir</td><td>Evento Lanzamiento Powerview</td>
                                      </tr>
                                      <tr>
                                        <td class="text-center">24-10-2017 07:24</td><td>Descarga de documento.pdf</td><td>Evento Lanzamiento Powerview</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cerrar</button>
                                </div>
                              </div>
                              <!-- end tpl preview -->
                            </form>
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
</div>
<!-- END CONTENT -->
<?php $this->load->view('templates/footer'); ?>
<script language="javascript">
  $(document).ready(function(e) {
	$('input.to-down').datepicker({
		orientation: "bottom auto",
		 autoclose: true
	});
});
</script>