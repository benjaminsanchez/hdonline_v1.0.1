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
                          <!-- Start Filtros -->
                          <div class="row">
                            <div class="col-md-12 col-sm-12"> 
                              <!-- FILTER --> 
                              <!-- Start filters -->
                              
                              <div class="portlet-body form filter-form"> 
                                <!-- BEGIN FORM-->
                                <form action="<?php echo base_url(); ?>list/secciones" id="filterform" class="form-horizontal form-row-seperated">
                                  <div class="row fadeInOnReady">
                                    <div class="col-md-5">
                                      <div class="input-group">
                                        <select class="bs-select form-control" data-style="grey-steel" id="s_id_categoria">
                                        <?php
										if (count($categorias)>0): 
										$count=0;
											foreach ($categorias as $cat):
												if ($cat->nivel == 1): 
													$count++;
													if ($count==1) $restablecercat = $cat->id_categoria;
												?>
                                          <option value="<?php echo $cat->id_categoria; ?>" <?php if ($cat->id_categoria == @$s_id_marca) echo ' selected="selected"';  ?>><?php echo $cat->nombre; ?></option>
                                        <?php 
												endif;
											endforeach;
										endif; ?>
                                        </select>
                                        
                                        <span class="input-group-btn">
                                        <button class="btn blue-hoki uppercase bold" type="submit"><i class="fa fa-search"></i></button>
                                        </span> </div>
                                    </div>
                                    <div class="col-md-3 pull-right text-right"><a href="#" onClick="document.location.href='<?php echo base_url(); ?>list/secciones/<?php echo @$restablecercat ; ?>'" class="btn btn-xs blue-hoki btn-outline"><i class="fa fa-refresh"></i> &nbsp; Reestablecer filtros</a></div>
                                  </div>
                                </form>
                              </div>
                              
                              <!-- end filters --> 
                              <!-- END FILTER -->
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
                              <?php } // endif export ?>
                              <?php if ($nTotalRecs > 0)  { ?>
                              <table class="table table-hover table-striped sortbody" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                                <thead>
                                  <tr role="row" class="heading bg-grey-steel"> 
                                    <!-- nombre -->
                                    <th width="40%">Sección </th>
                                    <!-- id_template -->
                                    <th width="20%">Template </th>
                                    <!-- menu -->
                                    <th width="10%">Menu </th>
                                    <!-- estado -->
                                    <th>Estado </th>
                                    <th>&nbsp;</th>
                                    <!--  <th>&nbsp;</th>--> 
                                    
                                  </tr>
                                </thead>
                                <tbody class="disable-sort" >
                                  <!-- Table body -->
                                  <tr role="row">
                                    <td>Mi Escritorio</td>
                                    <td>Dashboard</td>
                                    <td>Si</td>
                                    <td>Activo</td>
                                    <td class="ewTableTdOptions" nowrap="nowrap" align="right"></td>
                                  </tr>
                                </tbody>
                                <?php if (count($secciones)>0): ?>
                                <?php foreach ($secciones as $seccion): ?>
                                <tbody class="itemsort" id="data-<?php echo $seccion->id_seccion; ?>" >
                                  <tr role="row">
                                    <td class="bold handle" ><?php echo $seccion->nombre; ?></td>
                                    <td ><?php echo icotpl($seccion->template_codigo); ?></td>
                                    <td><?php echo @$LS["secciones"]["x_menu"][$seccion->menu]; ?></td>
                                    <td><?php echo @$LS["secciones"]["x_estado"][$seccion->estado]; ?></td>
                                    <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="<?php echo base_url(); ?>edit/secciones/?id_seccion=<?php echo $seccion->id_seccion; ?>" class="btn btn-sm blue btn-outline" title=" Editar"><i class="fa fa-pencil"></i> </a> <a href="<?php echo base_url(); ?>delete/secciones/?id_seccion=<?php echo $seccion->id_seccion; ?>" class="btn btn-sm grey-cascade btn-outline" title=" Eliminar"><i class="fa fa-trash-o"></i></a> <a href="#" data-target="#<?php echo $seccion->template_codigo; ?>" data-toggle="modal" class="btn btn-sm blue preview" title=" Previsualizar"><i class="fa fa-search"></i></a></td>
                                  </tr>
                                  <?php if (count($subsecciones[$seccion->id_seccion]>0)): ?>
                                  <tr>
                                    <td colspan="5" class="no-padding"><table  class="table table-hover table-striped">
                                        <tbody class="sortbodysub">
                                          <?php foreach ($subsecciones[$seccion->id_seccion] as $subseccion): ?>
                                          <tr id="data-<?php echo $subseccion->id_seccion; ?>"   >
                                            <td class="sub-seccion handlesub" width="40%"><?php echo $subseccion->nombre; ?></td>
                                            <td width="20%"><?php echo icotpl($subseccion->template_codigo); ?></td>
                                            <td  width="10%"><?php echo @$LS["secciones"]["x_menu"][$subseccion->menu]; ?></td>
                                            <td><?php echo @$LS["secciones"]["x_estado"][$subseccion->estado]; ?></td>
                                            <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="<?php echo base_url(); ?>edit/secciones/?id_seccion=<?php echo $subseccion->id_seccion; ?>" class="btn btn-sm blue btn-outline" title=" Editar"><i class="fa fa-pencil"></i> </a> <a href="<?php echo base_url(); ?>delete/secciones/?id_seccion=<?php echo $subseccion->id_seccion; ?>" class="btn btn-sm grey-cascade btn-outline" title=" Eliminar"><i class="fa fa-trash-o"></i></a> <a href="#" data-target="#<?php echo $subseccion->template_codigo; ?>" data-toggle="modal" class="btn btn-sm blue preview" title=" Previsualizar"><i class="fa fa-search"></i></a></td>
                                          </tr>
                                          <?php endforeach; ?>
                                        </tbody>
                                      </table></td>
                                  </tr>
                                  <?php endif; ?>
                                </tbody>
                                <?php endforeach; // secciones ?>
                                <?php endif; ?>
                              </table>
                              <?php
			/*	 $arraytpl = array( "descargas" => "Descarga de documentos",
				 					"multimedia" => "Foto o video",
									"noticias-eventos" => "Noticias y eventos",
									"noticias-eventos2" => "Noticias y eventos",
									"programas" => "Programas de incentivo",
									"videos" => "Videos",
									"calendario" => "Listado Calendario",
									"wysiwyg" => "Editor enriquecido");
				 foreach ($arraytpl as $clavetpl=>$tpl): */
				 foreach ($templates as $tpl): 
				 ?>
                              <!-- imagen banner -->
                              <div id="<?php echo $tpl->codigo; ?>" class="modal container fade tplpreview" tabindex="-1">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                  <h4 class="modal-title">Template <?php echo $tpl->nombre; ?></h4>
                                </div>
                                <div class="modal-body"> <img src="<?php echo base_url(); ?>imgtmp/templates_preview/898x0-1/<?php echo $tpl->codigo; ?>.png" width="100%" > </div>
                                <div class="modal-footer">
                                  <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cerrar</button>
                                </div>
                              </div>
                              <!-- end tpl preview -->
                              <?php
				endforeach;
				 ?>
                              <?php if ($sExport == "") { ?>
                              <input type="hidden" name="fieldkey" id="fieldkey" value="id_seccion">
                            </form>
                            <?php } 
				}?>
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
jQuery("form#filterform").on('submit', function() {
	var id_categoria = jQuery("#s_id_categoria").val();
	document.location.href='<?php echo base_url(); ?>list/secciones/'+id_categoria;
	return false;
});
</script>
