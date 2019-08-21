<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="page-content white"> 
    
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs relative">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
        <li class="active">Novedades</li>
      </ol>
      <h1 class="pull-left relative">AGREGAR NOVEDADES</h1>
      <div class="clearfix"></div>
    </div>
    <!-- END BREADCRUMBS --> 
    
    <!-- start: .page-content-container -->
    <div class="page-content-container"> 
      
      <!-- start: .page-content-row -->
      <div class="page-content-row">
        <?php $this->load->view('templates/sidebar'); ?>
        
        <!-- start: .page-content-col -->
        <div class="page-content-col">
          <div class="portlet light">
          
            <form action="#" method="POST" class="form form-horizontal">
              <h5 class="form-section bold uppercase margin-top-10">Información general</h5>
              <div class="row">
                <div class="col-md-9 col-sm-9 light">
          
                  <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Título</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" name="titulo" class="form-control grey-silver">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Imagen Principal</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" name="titulo" class="form-control grey-silver">
                    </div>
                  </div>
                  <div class="form-group margin-bottom-40">
                    <div class="col-md-9 col-sm-9 col-md-offset-3 col-sm-offset-3"> <a href="#" data-url="<?php echo base_url(); ?>biblioteca/list" data-toggle="modal" class="btn blue pull-left biblioteca"><i class="fa fa-search"></i> &nbsp;Examinar</a>
                      <label class="mt-checkbox mt-checkbox-outline pull-right"> Mantener arriba en listado
                        <input type="checkbox" value="1" name="mantener" />
                        <span></span> </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Programar</label>
                    <div class="col-md-9"> <span class="help-inline">desde</span>
                      <input type="text" name="desde" class="form-control input-inline grey-silver input-small date-picker" placeholder="01/08/2016">
                      <span class="help-inline">hasta</span>
                      <input type="text" name="hasta" class="form-control input-inline grey-silver input-small date-picker" placeholder="01/08/2016">
                      <label class="mt-checkbox mt-checkbox-outline"> Borrador
                        <input type="checkbox" value="1" name="borrador" class="input-inline" />
                        <span></span> </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3"> <img src="https://myhd.s1.cl/imgtmp/promociones/212x100-2/promocion-toldos2017.png" width="100%" height="100" style="background: #999; margin-top: 50px;"> </div>
              </div>
              <h5 class="form-section bold uppercase">Detalle</h5>
              <div class="form-group">
                <div class="col-md-12">
                  <textarea class="ckeditor form-control" name="editor2" rows="6" data-error-container="#editor2_error"></textarea>
                  <div id="editor2_error"> </div>
                </div>
              </div>
              <div class="form-group">
             
                <div class="fileupload-buttonbar col-md-12">
                  <div class=""> 
                   <h5 class="form-section bold uppercase">Archivos</h5>
                    <!-- The fileinput-button span is used to style the file input field as button 
                    <span class="btn grey-gallery fileinput-button"> <i class="fa fa-plus"></i> <span> Añadir archivos... </span>
                    <input type="file" name="files[]" multiple> 
                    </span> --><a href="javascript:void(0)" class="btn blue biblioteca"  data-url="<?php echo base_url(); ?>biblioteca/list" data-toggle="modal"> <i class="fa fa-plus"></i> <span> Abrir Biblioteca </span> </a> 
                  
                  </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped clearfix">
                  <tbody class="files">
                  </tbody>
                </table>
              </div>
              <h5 class="form-section bold uppercase">Imágenes</h5>
              <a href="javascript:void(0)" class="btn blue biblioteca"  data-url="<?php echo base_url(); ?>biblioteca/list" data-toggle="modal"> <i class="fa fa-plus"></i> <span> Abrir Biblioteca </span> </a> 
        <?php /*
              <div class="fileupload-buttonbar text-center">
                <div class=""> 
                  <!-- The fileinput-button span is used to style the file input field as button --> 
                  
                  <span class="btn grey-gallery fileinput-button"> <i class="fa fa-plus"></i> <span> Añadir archivos... </span>
                  <input type="file" name="files[]" multiple>
                  </span>
                  <button type="submit" class="btn grey-gallery start"> <i class="fa fa-upload"></i> <span> Iniciar carga </span> </button>
                  <button type="reset" class="btn warning cancel"> <i class="fa fa-ban-circle"></i> <span> Cancelar carga </span> </button>
                  <button type="button" class="btn grey-gallery delete"> <i class="fa fa-trash"></i> <span> Borrar </span> </button>
                  <input type="checkbox" class="toggle">
                  <!-- The global file processing state --> 
                  <span class="fileupload-process"> </span> </div>
                <!-- The global progress information -->
                <div class="col-lg-5 fileupload-progress fade"> 
                  <!-- The global progress bar -->
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"> </div>
                  </div>
                  <!-- The extended global progress information -->
                  <div class="progress-extended"> &nbsp; </div>
                </div>
              </div>
			  
			  */ ?>
              <!-- The table listing the files available for upload/download 
              <table role="presentation" class="table table-striped clearfix">
                <thead>
                <tr><th>Archivos</th></tr></thead>
                <tbody class="files">
                <tr>
                <td>Archivo 1                </td></tr>
                 <tr>
                <td>Archivo 1                </td></tr> <tr>
                <td>Archivo 1                </td></tr>
                 <tr>
                <td>Archivo 1                </td></tr>
                </tbody>
                </tbody>
              </table>
              -->
              <div class="form-actions text-center margin-top-20">
                <button type="button" class="btn blue btn-outline">Cancelar</button>
                <button type="button" class="btn blue">Guardar</button>
              </div>
            </form>
          </div>
          <!-- end: .page-content-col --> 
          
        </div>
        <!-- start: .page-content-row --> 
      </div>
    </div>
    <!-- end .page-content-container --> 
    
  </div>
</div>
<?php $this->load->view('templates/footer'); ?>
