<?php $this->load->view('templates/header'); ?>
<!-- modal preview -->
<div id="stack1" class="modal fade"  data-keyboard="false" data-backdrop="static" tabindex="-1" data-width="800">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title"> </h4>
      </div>
      <div class="modal-body text-center">
        <iframe src="" width="100%" height="330" scrolling="auto"></iframe>
      <a class="btn blue btn_descarga margin-top-15 margin-bottom-15" href=""><?php echo $L["descargar"]; ?></a>
      </div>
    </div>
</div>
<!-- end modal preview -->
<div class="container-fluid promo-page-int">
  <div class="page-content white">
    <?php $this->load->view('templates/breadcrumb_secciones'); ?>
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->

         <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
         <div class="row">
                    <div class="btn-group pull-right config">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                      <ul class="dropdown-menu pull-right" role="menu">
                        <li> <a href="<?php echo base_url(); ?>edit/promociones?id_promocion=<?php echo $promocion->id_promocion; ?>"><?php echo $L["editar"]; ?></a></li>
                        <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="promociones" data-key="id_promocion" data-id="<?php echo $promocion->id_promocion; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                        <li> <a href="<?php echo base_url(); ?>delete/promociones?id_promocion=<?php echo $promocion->id_promocion; ?>"><?php echo $L["eliminar"]; ?></a></li>
                      </ul>
                    </div>
                    </div>
                    <?php endif; ?>
   
    
    <div class="page-content-container">
      <div class="page-content-row">
        <div class="page-content-col"> 
          <!-- BEGIN PAGE BASE CONTENT -->
          <div class="blog-content-1 program-page"> 
            <!-- START ROW -->
            <div class="row">
            
              <div class="col-md-12" > 
              
         
                
                <!-- Wrapper for slides -->
                
                <?php if (@$pdf_interior->archivo_nombre != ""):  ?>
                <iframe src="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo @$pdf_interior->archivo_nombre; ?>" width="100%"  style="height: 40vw; border:2px solid #525659" scrolling="auto"></iframe>
                <?php else: ?>
                <div class="item <?php if ($count == 0): ?>active<?php endif; ?>"> <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/1600x0-1/biblioteca/<?php echo $promocion->archivo_nombre; ?>" alt="<?php echo $promocion->nombre; ?>" width="100%" >
                  <?php if ($promocion->nombre != ""): ?>
                  <div class="carousel-caption">
                    <h2><?php echo $promocion->nombre; ?></h2>
                  </div>
                  <?php endif; ?>
                </div>
                <?php endif;   ?>
                
                <!-- END CAROUSEL --> 
              </div>
            </div>
          </div>
          <!-- END ROW--> 
          
          <!-- START ROW -->
          <div class="row"> 
          
          <?php if ($promocion->titulo_inferior != "" && $count_promocion_documentos >0): ?>
            
            <h3><?php echo $promocion->titulo_inferior; ?></h3>
          <?php endif; ?>
          
          <?php foreach ($promocion_documentos as $bib): ?>
          <div class="col-md-4">
          <a  class="item-docu preview" data-filename="<?php echo $bib->archivo_nombre; ?>" data-client_name="<?php echo $bib->archivo_original; ?>" ><i class="fa <?php echo icon_file($bib->archivo_extension); ?>"></i>
          <?php /* <a  href="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $bib->archivo_nombre; ?>" download="<?php echo $bib->archivo_nombre; ?>" */ ?>
          <?php echo $bib->nombre; ?>
          </a>
          </div>
          <?php endforeach; ?>
          </div>
          
      </div>
      <!-- END PAGE BASE CONTENT --> 
    </div>
  </div>
</div>
<!-- END SIDEBAR CONTENT LAYOUT -->
</div>
</div>
<?php $this->load->view('templates/footer'); ?>
<script language="javascript">
// Preview
//$("#archivo-"+countfiles+" a.preview").data("archivo",archivo.file_name);
$("a.preview").on('click',function() {
	//var archivo = $(this).data("archivo");
	$("#stack1 .modal-body iframe").fadeOut();
	var filename = $(this).data("filename")
	var client_name = $(this).data("client_name");
	var fullpathfile = '<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/'+filename;
	$("#stack1 .modal-body iframe").attr('src',fullpathfile);
	
	
	$("#stack1").modal('show');	
	$("#stack1 h4.modal-title").html(client_name);
	$("#stack1 a.btn_descarga").attr("href",fullpathfile);
	$("#stack1 a.btn_descarga").attr("download",filename);
	
	 

	
	setTimeout(function() {
		$("#stack1 .modal-body iframe").fadeIn("fast");
		
		var head = jQuery("#stack1 .modal-body iframe").contents().find("head");
		
		/*var css = '<style type="text/css">' +
		'video::-internal-media-controls-download-button {    display:none;} video::-webkit-media-controls-enclosure { overflow:hidden;} video::-webkit-media-controls-panel {   width: calc(100% + 30px); } ' +
		'</style>';
		jQuery(head).append(css);
		
		
		jQuery("#stack1 .modal-body iframe").contents().find("video").attr("controlsList","nodownload");
		*/
		
	},1000);
		
});

$("#stack1 .close, .modal-backdrop").on('click', function () {
	$(".modal-body iframe").attr('src','');
});
$(".modal-scrollable").on('click', function () {
	
	$(".modal-body iframe").attr('src','');
});

$('#carousel-programs').carousel({
 interval: 5000
})
$(".carousel-inner").height($(".carousel-inner .item img").height());
</script> 
