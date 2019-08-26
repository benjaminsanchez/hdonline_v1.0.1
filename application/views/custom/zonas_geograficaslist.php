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
      <li class="active"><?php echo @$LSI["table_name"]; ?> </li>
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
                <div class="caption"><span class="caption-subject font-dark sbold"><?php echo @$LSI["table_name"]; ?></span> </div>
                <!-- start: buttons -->
                <div class="actions">
                  <div> <a href="<?php echo base_url()."add/".$ffile; ?><?php if (@$linkfielda[0] != ""): ?>?<?php echo @$linkfielda[0];?>=<?php echo @$master_record[0]->$linkfielda[0]; ?><?php endif; ?>" class="btn btn-sm blue"> <?php echo @$LS['AddLink'] ?> <i class="fa fa-plus"></i> </a>
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
                        <div id="datatable_products_wrapper" class="no-footer"> 
                    
                          <div class="row">
                            <div class="col-md-8 col-sm-12"> </div>
                            <div class="col-md-4 col-sm-12">
                              <div class="table-group-actions pull-right"> <span></span> </div>
                            </div>
                          </div>
                          <div class="table-scrollable">
                            <form method="post">
                              <?php } // endif export ?>
                              <?php if ($nTotalRecs > 0)  { ?>
                              <table class="table table-hover" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                                <thead>
                                  <tr role="row" class="heading bg-grey-steel"> 
                                    <!-- nombre -->
                                    <th width="80%">Nombre </th>
                                    <th>&nbsp;</th>
                                    <!--  <th>&nbsp;</th>--> 
                                    
                                  </tr>
                                </thead>
                                <?php foreach($records as $zona): 
                                    $n_z= str_replace(" ", "_", $zona["data"]->nombre);
                                    ?>
                                
                                  <tbody >
                                
                                <tr id="data-1" role="row" id="<?php echo $n_z;?>">
                                  <td class="bold handle" > <?php echo $zona["data"]->nombre; ?></td>
                                  <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="<?php echo base_url(); ?>edit/zonas_geograficas/?id_zona_geografica=<?php echo $zona["data"]->id_zona_geografica; ?>" class="btn btn-sm blue btn-outline" title=" Editar"><i class="fa fa-pencil"></i> </a> <a href="<?php echo base_url(); ?>delete/zonas_geograficas/?id_zona_geografica=<?php echo $zona["data"]->id_zona_geografica; ?>" class="btn btn-sm grey-cascade btn-outline" title=" Eliminar"><i class="fa fa-trash-o"></i></a> </td>
                                </tr>
                                
                                <?php if (count($zona["child"])>0):
											?>
                                  <tr>
                                
                                <td colspan="5" class="no-padding sub-seccion">
                                <table class="table table-hover">
                                    <tbody>
                                    <?php
									foreach ($zona["child"] as $zona2): 
									?>
                                      <tr id="data-1"   >
                                        <td class="sub-seccion handlesub" width="40%"><?php echo $zona2["data"]->nombre ?></td>
                                        <td class="ewTableTdOptions" nowrap="nowrap" align="right">
                                        
                                        <a href="<?php echo base_url(); ?>edit/zonas_geograficas/?id_zona_geografica=<?php echo $zona2["data"]->id_zona_geografica; ?>" class="btn btn-sm blue btn-outline" title=" Editar"><i class="fa fa-pencil"></i> </a> <a href="<?php echo base_url(); ?>delete/zonas_geograficas/?id_zona_geografica=<?php echo $zona2["data"]->id_zona_geografica; ?>" class="btn btn-sm grey-cascade btn-outline" title=" Eliminar"><i class="fa fa-trash-o"></i></a>
                                        
                                        </td>
                                      </tr>
                                       <?php if (count($zona2["child"])>0):
											?>
                                  <tr>
                                
                                <td colspan="5" class="no-padding sub-seccion "><table  class="table table-hover">
                                    <tbody >
                                    <?php
									foreach ($zona2["child"] as $zona3): 
									?>
                                      <tr id="data-1"   >
                                        <td class="sub-seccion handlesub" width="40%"><?php echo $zona3["data"]->nombre ?></td>
                                        <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="<?php echo base_url(); ?>edit/zonas_geograficas/?id_zona_geografica=<?php echo $zona3["data"]->id_zona_geografica; ?>" class="btn btn-sm blue btn-outline" title=" Editar"><i class="fa fa-pencil"></i> </a> <a href="<?php echo base_url(); ?>delete/zonas_geograficas/?id_zona_geografica=<?php echo $zona3["data"]->id_zona_geografica; ?>" class="btn btn-sm grey-cascade btn-outline" title=" Eliminar"><i class="fa fa-trash-o"></i></a></td>
                                      </tr>
                                      
                                        <?php if (count($zona3["child"])>0):
											?>
                                  <tr>
                                
                                <td colspan="5" class="no-padding sub-seccion "><table  class="table table-hover">
                                    <tbody>
                                    <?php
									foreach ($zona3["child"] as $zona4): 
									?>
                                      <tr id="data-1"   >
                                        <td class="sub-seccion handlesub" width="40%"><?php echo $zona4["data"]->nombre ?></td>
                                        <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="<?php echo base_url(); ?>edit/zonas_geograficas/?id_zona_geografica=<?php echo $zona4["data"]->id_zona_geografica; ?>" class="btn btn-sm blue btn-outline" title=" Editar"><i class="fa fa-pencil"></i> </a> <a href="<?php echo base_url(); ?>delete/zonas_geograficas/?id_zona_geografica=<?php echo $zona4["data"]->id_zona_geografica; ?>" class="btn btn-sm grey-cascade btn-outline" title=" Eliminar"><i class="fa fa-trash-o"></i></a></td>
                                      </tr>
                                    <?php
									endforeach; ?>
                                      </tbody>
                                    
                                  </table></td>
                                  </tr>
                                  
                                  <?php endif; ?>
                                      
                                    <?php
									endforeach; ?>
                                      </tbody>
                                    
                                  </table></td>
                                  </tr>
                                  
                                  <?php endif; ?>
                                
                                    <?php
									endforeach; ?>
                                      </tbody>
                                    
                                  </table></td>
                                  </tr>
                                  
                                  <?php endif; ?>
                                
                                  </tbody>
                                <?php endforeach; ?>
                              </table>
                             
                              <?php if ($sExport == "") { ?>
                              <input type="hidden" name="fieldkey" id="fieldkey" value="<?php echo @$fieldkey; ?>">
                            </form>
                            <?php } 
				}?>
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
