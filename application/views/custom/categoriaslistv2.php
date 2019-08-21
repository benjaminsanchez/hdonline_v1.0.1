<?php $this->load->view('templates/header'); ?>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/pages/scripts/ew.js"></script>
-->

<div class="container-fluid">
  <div class="page-content white"> 
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>dashboard"><?php echo @$LS["inicio"]; ?></a> </li>
        <li> <a href="javascript:void(0)">Configuraciones</a> </li>
        <li class="active">Jerarquías</li>
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
                  <div class="caption"><span class="caption-subject font-dark sbold">Jerarquías</span> </div>
                  <!-- start: buttons -->
                  <div class="actions">
                    <div> </div>
                  </div>
                  <!-- end: buttons --> 
                </div>
                <div>
                  <div> <span class="caption-helper"><?php echo @$LANG["list_help"]; ?> </span> </div>
                </div>
                <div class="portlet-body">
                  <div class="tabbable"> 
                    
                    <!-- START PAGEDETAIL --> 
                    <!-- END PAGE DETAIL -->
                    <div class="tab-content no-space">
                      <div class="tab-pane active" id="tab_general">
                        <div class="table-container">
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                <?php 
 
   // print_r($cat);
  foreach ($datalist as $row):
  		$cat[$row->id_categoria_tipo][$row->id_categoria] = $row;
 		$cat[$row->id_categoria_tipo]["tipo_nombre"] = $row->tipo_nombre; 
		$cat[$row->id_categoria_tipo]["id_categoria_tipo"] = $row->id_categoria_tipo; 
  endforeach;  
 
  ?>
                                <div class="col-md-12">
                                  <div class="portlet light bordered">
                                    <div class="portlet-title">
                                      <div class="caption"> <span class="caption-subject font-blue sbold"><?php echo $display["tipo_nombre"];  ?> </span> </div>
                                      <div class="portlet-body">
                                      
                                      
                                      
                                             <!-- start pruebas arbol -->
                       <div id="tree_1" class="tree-demo">
                              <?php
							  
						echo $esquema_arbol_html;
							  ?>
                         </div>
                              
                              
                              <!-- end pruebas arbol -->
                                        
                                        
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                      
                     <?php         
						//print_r($arbol);
							  
/*
	foreach ($cat as $value=>$display):?>
                              <div class="col-md-3"> 
                                
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                  <div class="portlet-title">
                                    <div class="caption"> <span class="caption-subject font-blue sbold"><?php echo $display["tipo_nombre"];  ?></span> </div>
                                    <div class="actions"> <a href="<?php echo base_url()."add/".$ffile; ?>?filter=1&id_categoria_tipo=<?php echo $display["id_categoria_tipo"]; ?>" class="btn blue btn-xs"> <i class="fa fa-plus"></i> </a> </div>
                                  </div>
                                  <div class="portlet-body">
                                    <table class="table table-hover table-light table-categorias">
                                      <tbody>
                                        <?php foreach ($display as $disp): if (@$disp->id_categoria != ""): ?>
                                        <tr >
                                          <td width="100%"><?php echo ucwords(strtolower(@$disp->nombre)); ?></td>
                                          <td><div class="btn-group">
                                              <button type="button" class="btn btn-xs dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
                                              <ul class="dropdown-menu pull-right" role="menu">
                                                <li> <a href="<?php echo base_url()."edit/".$ffile."/?id_categoria=".$disp->id_categoria; ?>" title="<?php echo @$LS['Edit'] ?>" ><i class="fa fa-pencil"></i> <?php echo @$LS['Edit'] ?> </a></li>
                                                <li> <a href="<?php echo base_url()."delete/".$ffile."/?id_categoria=".$disp->id_categoria; ?>"  title=" <?php echo $LS['DeleteLink'] ?>"  ><i class="fa fa-trash-o"></i><?php echo $LS['DeleteLink'] ?></a></li>
                                              </ul>
                                            </div></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET--> 
                                
                              </div>
                              <?php
	endforeach;
	*/	
	?>
                            </div>
                          </div>
                        </div>
                        <div class="table-scrollable"> </div>
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
<script src="<?php echo base_url(); ?>assets/global/plugins/jstree/dist/jstree.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 

<script src="<?php echo base_url(); ?>assets/custom/js/ui-tree-categoriaslistv2.js?v=<?php echo @date("His"); ?>" type="text/javascript"></script> 
<script>

$(function($){
	
	$("a.catbtn").on('click', function(){
	
		window.location.href=$(this).attr("href");	
		return false;
	});
})



</script>
