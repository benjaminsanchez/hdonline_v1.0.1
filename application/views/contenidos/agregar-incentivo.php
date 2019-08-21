<?php $this->load->view('templates/header'); ?>

<div class="container-fluid" id="incentivos">
    <div class="page-content white"> 
  
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
                <li class="active">Incentivos</li>
            </ol>
            <h1 class="pull-left relative">AGREGAR INCENTIVO</h1>
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
                    	<h5 class="form-section bold uppercase">Configuración Portada</h5>
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 control-label">Título</label>
                                    <div class="col-md-9 col-sm-9">
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 col-sm-3 control-label">Imagen</label>
                                    <div class="col-md-9 col-sm-9">
                                      <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group margin-bottom-40">
                                    <div class="col-md-9 col-sm-9 col-md-offset-3 col-sm-offset-3"> <a href="#" data-url="<?php echo base_url(); ?>biblioteca/list" data-toggle="modal" class="btn blue pull-left biblioteca"><i class="fa fa-search"></i> &nbsp;Examinar</a> </div>
                                  </div>
                                    
                               <div class="form-group">
                    <label class="col-md-3 control-label">Vigencia</label>
                    <div class="col-md-9"> <span class="help-inline">desde</span>
                      <input type="text" name="desde" class="form-control input-inline grey-silver input-small date-picker" placeholder="01/08/2016">
                      <span class="help-inline">hasta</span>
                      <input type="text" name="hasta" class="form-control input-inline grey-silver input-small date-picker" placeholder="01/08/2016">
                    </div>
                  </div>
                  
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Programar</label>
                                    <div class="col-md-9"> <span class="help-inline">desde</span>
                                      <input type="text" name="desde" class="form-control input-inline grey-silver input-small date-picker" placeholder="01/08/2016">
                                      <span class="help-inline">hasta</span>
                                      <input type="text" name="hasta" class="form-control input-inline grey-silver input-small date-picker" placeholder="01/08/2016">
                                    </div>
                                  </div>
                                  
                            
                            </div>
                            
                            <div class="col-md-3 col-sm-3 margin-top-40">
                            	<img src="https://myhd.s1.cl/imgtmp/programs/0x300-2/st_barth_2015-1.jpg" width="100%" height="100%" style="background: #999;" class="margin-top-10"><hr>
                                <div class="margin-top-30 text-center">
                                    <a href="#" class="btn blue"><i class="fa fa-plus"></i> &nbsp;Subir Puntos</a><br>
                                    <div class="help-inline" style="font-size: 10px;">Última carga 30 de Julio 2017</div>
                                </div>   
                            </div>
                        </div>
                        
                        <h5 class="form-section bold uppercase">Contenido</h5>
                        
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 control-label">Título</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" name="titulo" class="form-control grey-silver">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="form-group">
                        	<div class="col-md-12">
                                <textarea class="ckeditor form-control" name="editor2" rows="6" data-error-container="#editor2_error"></textarea>
                                <div id="editor2_error"> </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="fileupload-buttonbar col-md-12">
                                <div class="">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                              
                                    <a href="#" data-url="<?php echo base_url(); ?>biblioteca/list" data-toggle="modal" class="btn blue pull-left biblioteca">
                                        <i class="fa fa-plus"></i>
                                        <span>  Añadir Documentos Adjuntos... </span>
                                    </a>
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"> </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- start: .listado-archivos -->
                        <div class="listado-archivos clearfix">
                            <!-- start: .item -->
                        	<div class="item clearfix margin-bottom-25">
                            	
                                <div class="col-md-2 text-center">
                                    <div class="icon margin-bottom-5">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-9">
                                    <div class="form-group">
                                    <label class="form-control">Bases Ventana al Paraíso</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                	<div class="form-group text-right">
                                        <a class="btn btn-circle btn-icon-only blue btn-outline" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end: .item -->
                            <!-- start: .item -->
                        	<div class="item clearfix margin-bottom-25">
                            	
                                <div class="col-md-2 text-center">
                                    <div class="icon margin-bottom-5">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-9">
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control grey-silver" value="Bases Ventana al Paraíso">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                	<div class="form-group text-right">
                                        <a class="btn btn-circle btn-icon-only blue btn-outline" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end: .item -->
                        </div>
                        <!-- end: .listado-archivos -->
                        
                        <h5 class="form-section bold uppercase">Información Ganadores</h5>
                        
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 control-label">Título</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" name="titulo" class="form-control grey-silver">
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="form-group">
                        	<div class="col-md-12">
                                <textarea class="ckeditor form-control" name="editor2" rows="6" data-error-container="#editor2_error"></textarea>
                                <div id="editor2_error"> </div>
                            </div>
                        </div>
                        
                            <div class="form-group">
                            <div class="fileupload-buttonbar col-md-12">
                                <div class="">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                              
                                    <a href="#" data-url="<?php echo base_url(); ?>biblioteca/list" data-toggle="modal" class="btn blue pull-left biblioteca">
                                        <i class="fa fa-plus"></i>
                                        <span>  Añadir Documentos Adjuntos... </span>
                                    </a>
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"> </span>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- start: .listado-archivos -->
                        <div class="listado-archivos clearfix">
                            <!-- start: .item -->
                        	<div class="item clearfix margin-bottom-25">
                            	
                                <div class="col-md-2 text-center">
                                    <div class="icon margin-bottom-5">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-9">
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control grey-silver" value="Bases Ventana al Paraíso">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                	<div class="form-group text-right">
                                        <a class="btn btn-circle btn-icon-only blue btn-outline" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end: .item -->
                            <!-- start: .item -->
                        	<div class="item clearfix margin-bottom-25">
                            	
                                <div class="col-md-2 text-center">
                                    <div class="icon margin-bottom-5">

                                        <i class="fa fa-file-pdf-o"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-9">
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control grey-silver" value="Bases Ventana al Paraíso">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                	<div class="form-group text-right">
                                        <a class="btn btn-circle btn-icon-only blue btn-outline" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end: .item -->
                        </div>
                        <!-- end: .listado-archivos -->

                        <h5 class="form-section bold uppercase">Imágenes</h5>
                          <a href="javascript:void(0)" class="btn blue biblioteca"  data-url="<?php echo base_url(); ?>biblioteca/list" data-toggle="modal"> <i class="fa fa-plus"></i> <span> Abrir Biblioteca </span> </a> 
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" class="table table-striped clearfix">
                            <tbody class="files"> </tbody>
                        </table>
                        <div class="form-actions text-center margin-top-40">
                             <button type="button" class="btn blue btn-outline">Cancelar</button>
                            <button type="button" class="btn blue">Guardar</button>
                        </div>
                    </form>
                    </div>
                </div>
                <!-- end: .page-content-col -->
                
            </div>
            <!-- start: .page-content-row -->
        </div>
        <!-- end .page-content-container -->
        
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>
