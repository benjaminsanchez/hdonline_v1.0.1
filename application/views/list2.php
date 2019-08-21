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
                  <div>
                    <?php if(@$master_configcrud->config->childtable): 
				   $mastertable = array_keys((array)$configcrud->config->mastertable);
				    ?>
                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                      <button type="button" name="back" onclick="document.location.href='<?php echo base_url(); ?>list/<?php echo $mastertable[0]; ?>'" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-angle-left"></i> <?php echo @$LS['Cancel'] ?></button>
                      <button type="button" name="Action"  value=" <?php echo @$LS['EditBtn'] ?>" class="btn btn-sm blue" onclick="document.location.href='<?php echo base_url(); ?>list/<?php echo $mastertable[0]; ?>'"><i class="fa fa-check"></i> <?php echo @$LS['EditBtn'] ?></button>
                    </div>
                    <?php endif; ?>
                    <?php if(!isset($master_configcrud->config->childtable)): ?>
                           <?php if (@$configcrud->config->add != "denied"): ?> 
                    <a href="<?php echo base_url()."add/".$ffile; ?><?php if (@$linkfielda[0] != ""): ?>?<?php echo @$linkfielda[0];?>=<?php echo @$master_record[0]->$linkfielda[0]; ?><?php endif; ?>" class="btn btn-sm blue"> <?php echo @$LS['AddLink'] ?> <i class="fa fa-plus"></i> </a>
                    <?php endif; ?>
                    <?php endif; ?>
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
                  <?php if(@$master_configcrud->config->childtable): ?>
                  <!-- START MASTER DETAILS -->
                  <ul class="nav nav-tabs">
                    <?php foreach ($configcrud->config->mastertable as $table=>$linkfielda):
	  	$linkfielda = explode(",",$linkfielda);
	   ?>
                    <li > <a href="<?php echo base_url(); ?>edit/<?php echo $master_ffile; ?>?<?php echo $linkfielda[0];?>=<?php echo @$master_record[0]->$linkfielda[0]; ?>" > Datos generales </a> </li>
                    <?php endforeach; ?>
                    <?php foreach ($master_configcrud->config->childtable as $table=>$linkfield):
	 	$linkfield = explode(",",$linkfield); ?>
                    <li <?php if ($ffile==$table): ?> class="active" <?php endif; ?>> <a <?php if ($ffile==$table): ?>href="javascript:void(0)" <?php else: ?>href="<?php echo base_url()."list/".$table."/?".@$linkfield["0"]."=".@$master_record[0]->$linkfield[0]; ?>"<?php endif; ?>>
                      <?php   echo ($ffile==$table)? @$LSI["table_name"]: @$LSI["table_".$table]; ?>
                      </span></a></li>
                    <?php endforeach; ?>
                  </ul>
                  <!-- END: MASTER DETAILS -->
                  <?php endif; ?>
                  
                  <!-- START PAGEDETAIL --> 
                  <!-- END PAGE DETAIL -->
                  <div class="tab-content no-space">
                    <div class="tab-pane active" id="tab_general">
                      <div class="table-container">
                        <div id="datatable_products_wrapper" class="no-footer"> 
                          <!-- Start Filtros -->
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <div>
                                <?php 
				  if(@$configcrud->config->filterfields): 
				  	$TotalFilters = $configcrud->config->filterfields; 
				  	$countfilters = count($TotalFilters); 
				  ?>
                                <form id="filterform" method="get" action="<?php echo base_url(); ?>list/<?php echo $ffile; ?>">
                                  <input type="hidden" name="filter" value="1">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr role="row" class="heading">
                                        <td colspan="3"><span class="caption-subject font-dark bold">Filtrar por</span></td>
                                      </tr>
                                      <tr role="row">
                                        <?php 
				  if ($filter_form):
				  	foreach ($filter_form as $row):
						echo ' <td>'.$row.'</td>';
					endforeach;
				  endif;?>
                                        <td align="right"><div class="margin-bottom-5">
                                            <button class="btn btn-sm blue btn-outline table-group-action-submit"><i class="fa fa-search"></i> Buscar</button>
                                            <button class="btn btn-sm blue btn-outline table-group-action-submit cleanFilter"><i class="fa fa-times"></i> Limpiar filtro</button>
                                          </div></td>
                                      </tr>
                                    </thead>
                                  </table>
                                </form>
                                <?php endif; ?>
                              </div>
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
                              <?php if(@$master_configcrud->config->childtable): ?>
                              <!-- START MASTER DETAILS -->
                              <table class="table table-hover table-striped" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                                <thead>
                                  <tr role="row" class="heading bg-grey-steel">
                                    <?php                     
							foreach ($master_fields as $key => $val):
							?>
                                    <!-- <?php echo $val; ?> -->
                                    <th><?php echo $LSI["master"][$val]; ?> </th>
                                    <?php
							endforeach;
                        ?>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr role="row" class="odd">
                                    <?php
                   
                    foreach ($master_record as $row):
                		   $sItemRowClass = ''; 
                    ?>
                                    <!-- Table body -->
                                  <tr role="row" <?php echo $sItemRowClass; ?>>
                                    <?php
									
               		   foreach ($master_fields as $key => $val):				
                    ?>
                                    <td><input type="hidden" name="x_master_<?php echo $val; ?>" id="x_master_<?php echo $val; ?>" value="<?php echo @$row->$val; ?>">
                                      <?php if (@$master_configcrud->fields->$val->ftype == "image"): ?>
                                      <?php if (@trim(@$row->$val) != ""): ?>
                                      <img src="<?php echo base_url(); ?>../img/<?php echo $localizacion; ?>/0x70-1/<?php echo $row->$val; ?>" height="70">
                                      <?php endif; ?>
                                      <?php else: ?>
                                      <?php echo @$row->$val; ?>
                                      <?php endif; ?></td>
                                    <?php
						endforeach;				
					?>
                                  </tr>
                                  <?php
                    endforeach; ?>
                                    </tr>
                                  
                                </tbody>
                              </table>
                              <br>
                              
                              <!-- END MASTER DETAILS-->
                              <?php if (@$configcrud->config->add != "denied"): ?> 
                              <div class="addDetail">
                                <div class="dataTables_length"> <a href="<?php echo base_url()."add/".$ffile; ?><?php if (@$linkfielda[0] != ""): ?>?<?php echo @$linkfielda[0];?>=<?php echo @$master_record[0]->$linkfielda[0]; ?><?php endif; ?>" class="btn btn-sm blue"> <?php echo @$LS['AddLink'] ?> <i class="fa fa-plus"></i> </a> </div>
                                <div class="clear">&nbsp;</div>
                              </div>
                              <?php endif; ?>
                              <?php endif; ?>
                              <?php } // endif export ?>
                              <?php if ($nTotalRecs > 0)  { ?>
                              <table class="table table-hover table-striped" id="datatable_products" aria-describedby="datatable_products_info" role="grid">
                                <thead>
                                  <tr role="row" class="heading bg-grey-steel">
                                    <?php                      
							foreach ($fields as $key => $val):
							?>
                                    <!-- <?php echo $val; ?> -->
                                    <th>
                                    
                                    
                                    <!-- start orden -->
                                     <?php if (@$configcrud->fields->$val->sortfield != "none" && @$configcrud->fields->$val && ($sExport == "")): ?>
					  <a href="<?php echo base_url(); ?>list/<?php echo $ffile; ?>/sort-<?php echo $val; ?>" title="Ordenar por  <?php echo $LSI[$val]; ?> " alt="Ordenar por <?php echo $LSI[$val]; ?> ">
                      <?php endif; ?>
                     
					  <?php echo $LSI[$val]; ?>  <?php if (@$sortfield== $val): echo '<i class="fa fa-sort-'.strtolower(@$sortfieldmode).'"></i>'; endif; ?> 
                        <?php if (@$configcrud->fields->$val->sortfield != "none" && @$configcrud->fields->$val && ($sExport == "")): ?>
                      </a>
                      <?php endif; ?>
                      
                      <?php if (@$sortfield== $val): ?>                      
                      <a href="<?php echo base_url(); ?>list/<?php echo $ffile; ?>/sort-clear" class="pull-right" title="Cancelar orden" alt="Cancelar orden"><i class="fa fa-times-circle-o font-red-pink"></i></a>
                      <?php endif; ?>
                                    <!-- end: orden -->
                                    
                                    
                                     </th>
                                    <?php
							endforeach;
                        ?>
                                    <?php if ($sExport == "") { ?>
                                    <th>&nbsp;</th>
                                    <!--  <th>&nbsp;</th>-->
                                    <?php
					  if (@$configcrud->config->childtable): 
					  	foreach ($configcrud->config->childtable as $table=>$linkfield): ?>
                                    <!--  <th></th>-->
                                    <?php
					  	endforeach;
					  endif; ?>
                                    <?php } ?>
                                  </tr>
                                </thead>
                                <tbody <?php if (@$configcrud->config->sortdrag == "enabled"): ?> class="sort" <?php endif; ?>>
                                  <?php
                    
                    foreach ($records as $row):
                		   $sItemRowClass = ''; 
						   
						   // KEYLINK
						   $count=0; $fieldkey=''; $rowlink = '';
						   foreach ($keys as $key): 
								$fieldkey.= ($count==0)? "" : "-";
								$fieldkey.= $key; 
								$rowlink.= ($count==0)? "" : "-";
								$rowlink.= $row->$key; 
								$count++;
						   endforeach;
						    
                    ?>
                                  <!-- Table body -->
                                  <tr  id="data-<?php echo $rowlink; ?>"  role="row" <?php echo $sItemRowClass; ?>>
                                    <?php
               		   foreach ($fields as $key => $val):				
                    ?>
                                    <td><?php if (@$configcrud->fields->$val->ftype == "image"): ?>
                                      <?php if (@trim(@$row->$val) != ""): ?>
                                      <img src="<?php echo base_url(); ?>../img/<?php echo $localizacion; ?>/0x70-1/<?php echo $row->$val; ?>" height="70">
                                      <?php endif; ?>
                                      <?php elseif (@$configcrud->fields->$val->ftype == "input_radio" || @$configcrud->fields->$val->ftype == "input_radio_rol"): ?>
                                      <?php  echo @$LS[$ffile]["x_".$val][$row->$val];  //echo '@$LS['.$ffile.']['.$val.']['.$row->$val.']';?>
                                      <?php else: ?>
                                      <?php echo $row->$val; ?>
                                      <?php endif; ?></td>
                                    <?php
						endforeach;
					
					?>
                                    <?php if ($sExport == "") { ?>
                                    <td class="ewTableTdOptions" nowrap="nowrap" align="right"><a href="<?php 
						$count=0; $keylink='';
						foreach ($keys as $key): 
							$keylink.= ($count==0)? "?" : "&";
							$keylink.= $key."=".$row->$key; 
							$count++;
						endforeach; 
						$baseeditlink =  base_url()."edit/".$ffile."/"; 
						
						echo $baseeditlink.$keylink;
					  
					  
					  ?>" class="btn btn-sm blue btn-outline" title=" <?php echo @$LS['Edit'] ?>" ><i class="fa fa-pencil"></i>
                                      <?php // echo @$LS['Edit'] ?>
                                      </a>  <?php if (@$configcrud->config->delete != "denied"): ?><a href="<?php 
					  $basedeletelink =  base_url()."delete/".$ffile."/"; 
					  echo $basedeletelink.$keylink; ?>" class="btn btn-sm grey-cascade btn-outline" title=" <?php echo $LS['DeleteLink'] ?>" ><i class="fa fa-trash-o"></i></a><?php endif; ?></td>
                                    <!--  <td class="ewTableTdOptions" nowrap="nowrap"><a href="<?php 
					  $basedeletelink =  base_url()."delete/".$ffile."/"; 
					  echo $basedeletelink.$keylink; ?>" class="btn btn-xs grey btn-editable" title=" <?php echo $LS['DeleteLink'] ?>" ><i class="fa fa-trash-o"></i> <?php echo $LS['DeleteLink'] ?></a></td>-->
                                    <?php } ?>
                                    <?php
					// 	print_r($configcrud); 
					  if (@$configcrud->config->childtable): 
					  	foreach ($configcrud->config->childtable as $table=>$linkfield): 
							$linkfield = explode(",",$linkfield);?>
                                    <!--     <td><a href="<?php echo base_url()."list/".$table."/?".$linkfield["0"]."=".$row->$linkfield[0]; ?>" class="btn btn-xs grey btn-editable" title=" <?php echo  $table ?>" ><i class="fa fa-sitemap"></i> <?php echo $table ?></a>
                        </td>-->
                                    <?php
					  	endforeach;
					  endif; ?>
                                  </tr>
                                  <?php
	endforeach;
?>
                                </tbody>
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
