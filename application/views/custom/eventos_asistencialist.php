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
        <li> <a href="javascript:void(0)">Contenidos</a> </li>
        <li class="active"><?php echo @$LSI["table_name"]; ?> </li>
      </ol>
      <h1> Contenidos</h1>
    </div>
    <!-- END BREADCRUMBS --> 
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
      <div class="page-content-row"> 
        <!-- BEGIN PAGE SIDEBAR -->
        <?php $this->load->view('templates/sidebar_admin_contenidos'); ?>
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
                  <div class="caption"><span class="caption-subject font-dark sbold">Sesiones</span> </div>
                  <!-- start: buttons -->
                  <div class="actions">
                    <div>
                      <div class="btn-group btn-group-devided" data-toggle="buttons">
                        <button type="button" name="back" onclick="document.location.href='<?php echo base_url(); ?>list/eventos'" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-angle-left"></i> Volver</button>
                   </div>
                   
                        <div class="btn-group"> <a class="btn blue btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <?php echo @$LS["export"]; ?> <i class="fa fa-angle-down"></i> </a>
                          <ul class="dropdown-menu pull-right">
                            <li> <a href="<?php echo base_url()."list/".$ffile."/export-excel?".$_SERVER['QUERY_STRING']; ?>" target="_blank"> <?php echo @$LS['ExportToExcel'] ?></a> </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end: buttons --> 
                  
                </div>
                <div>
                  <div> <span class="caption-helper"></span> </div>
                </div>
                <div class="portlet-body">
                  <div class="tabbable"> 
                    <!-- START MASTER DETAILS -->
                    <ul class="nav nav-tabs">
                      <li> <a href="<?php echo base_url(); ?>edit/eventos?id_evento=<?php echo $evento->id_evento; ?>"> Datos generales </a> </li>
                      <li > <a href="<?php echo base_url(); ?>list/eventos_sesiones/?id_evento=<?php echo $evento->id_evento; ?>"> Sesiones </a></li>
                      <li class="active"> <a href="javascript:void(0)"> Listado de inscritos </a></li>
                    </ul>
                    <!-- END: MASTER DETAILS --> 
                    
                    <!-- START PAGEDETAIL --> 
                    <!-- END PAGE DETAIL -->
                    <div class="tab-content no-space">
                      <div class="tab-pane active" id="tab_general">
                        <div class="table-container">
                          <div id="datatable_products_wrapper" class="no-footer"> 
                            <!-- Start Filtros -->
                            <div class="row">
                              <div class="col-md-12 col-sm-12">
                                <div> </div>
                              </div>
                            </div>
                            <!-- End filtros --->
                            
                            <div class="row">
                              <div class="col-md-8 col-sm-12"> </div>
                              <div class="col-md-4 col-sm-12">
                                <div class="table-group-actions pull-right"> <span></span> </div>
                              </div>
                            </div>
                            <div class="table-scrollable">
                              <form method="post">
                                <!-- START MASTER DETAILS -->
                                <?php } // <?php if ($sExport == "") { ?>
                                <table class="table table-hover table-striped" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                                  <thead>
                                    <tr role="row" class="heading bg-grey-steel"> 
                                      <!-- titulo -->
                                      <th>Título Evento </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr role="row" class="odd"> 
                                      <!-- Table body --> 
                                    </tr>
                                    <tr role="row">
                                      <td><?php echo $evento->titulo; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <br>
                                
                                <!-- END MASTER DETAILS-->
                                
                                <table class="table table-hover table-striped" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                                  <thead>
                                    <tr role="row" class="heading bg-grey-steel">
                                      <th>Fecha inscripción </th>
                                      <th>Tipo Sesión </th>
                                      <th>Costo </th>
                                      <th>Fecha hora </th>
                                      <th>Tipo usuario </th>
                                      <th>Nombre usuario </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($records as $asi): ?>
                                    <tr id="data-4" role="row">
                                      <td><?php echo fecha($asi->fecha_inscripcion); ?></td>
                                      <td><?php echo ucwords($asi->tipo_sesion); ?></td>
                                      <td><?php echo $asi->costo_evento; ?></td>
                                      <td><?php echo fecha($asi->fecha); ?> <?php echo hora($asi->hora); ?></td>
                                      <td><?php echo $asi->tipo_usuario; ?></td>
                                      <td><?php echo $asi->adm_nombre.$asi->us_nombre.$asi->du_nombre; ?> <?php echo ($asi->dis_nombre!="")?$asi->dis_nombre:""; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
                                <?php if ($sExport == "") { ?>
                                <input type="hidden" name="fieldkey" id="fieldkey" value="id_evento_sesion">
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
</div>
<!-- END CONTENT -->
<?php } // <?php if ($sExport == "") { ?>
<?php $this->load->view('templates/footer'); ?>
