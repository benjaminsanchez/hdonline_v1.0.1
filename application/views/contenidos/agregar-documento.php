<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
    <div class="page-content white"> 
  
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
                <li class="active">Documentación</li>
            </ol>
            <h1>AGREGAR DOCUMENTACIÓN</h1>
        </div>
        <!-- END BREADCRUMBS --> 
        
        <!-- start: .page-content-container -->
        <div class="page-content-container">
        
            <!-- start: .page-content-row -->
            <div class="page-content-row"> 
            
                <?php $this->load->view('templates/sidebar'); ?>
                
            	<!-- start: .page-content-col -->
                <div class="page-content-col"> 
                	<form id="fileupload" action="../assets/global/plugins/jquery-file-upload/server/php/" method="POST" enctype="multipart/form-data">
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="fileupload-buttonbar text-center">
                            <div class="">
                                <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn grey-gallery fileinput-button">
                                    <i class="fa fa-plus"></i>
                                    <span> Añadir archivos... </span>
                                    <input type="file" name="files[]" multiple>
                                </span>
                                <button type="submit" class="btn grey-gallery start">
                                    <i class="fa fa-upload"></i>
                                    <span> Iniciar carga </span>
                                </button>
                                <button type="reset" class="btn warning cancel">
                                    <i class="fa fa-ban-circle"></i>
                                    <span> Cancelar carga </span>
                                </button>
                                <button type="button" class="btn grey-silver delete">
                                    <i class="fa fa-trash"></i>
                                    <span> Borrar </span>
                                </button>
                                <input type="checkbox" class="toggle">
                                <!-- The global file processing state -->
                                <span class="fileupload-process"> </span>
                            </div>
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
                        <!-- The table listing the files available for upload/download -->
                        <table role="presentation" class="table table-striped clearfix">
                            <tbody class="files"> </tbody>
                        </table>
                        <!-- start: .listado-archivos -->
                        <div class="listado-archivos margin-bottom-25">
                        	<!-- start: .item -->
                        	<div class="item clearfix margin-bottom-25">
                            	
                                <div class="col-md-2 text-center">
                                    <label class="check-primario mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="1" name="item" />
                                        <span></span>
                                        <div class="icon margin-bottom-5">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </div>
                                        <a class="underline grey btn-sm" href="javascript:;" data-toggle="dropdown"  data-hover="dropdown" data-close-others="true" aria-expanded="false"> Reemplazar <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li class="text-center"><a href="javascript:;">Subir</a></li>
                                            <li class="text-center"><a href="javascript:;">Abrir Biblioteca</a></li>
                                        </ul>
                                    </label>
                                </div>
                                <div class="col-md-8 col-sm-9">
                                	<div class="form-group">
                                    	<div class="row">
                                            <div class="col-md-10 col-sm-10">xcab1_2pagespeeddic-II.jpg</div>
                                            <div class="col-md-2 col-sm-2 text-right">
                                                <a class="btn btn-circle btn-icon-only blue btn-outline" href="javascript:;">
                                                    <i class="icon-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control grey-silver" value="Nuevo Manual de Mantención Duette">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="etiquetas" class="form-control grey-silver" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                	<div class="form-group text-right">
                                        <a class="btn btn-circle btn-icon-only blue btn-outline" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                	<div class="form-group">
                                        <label class="mt-checkbox mt-checkbox-outline"> Mantener arriba en listado
                                            <input type="checkbox" value="1" name="mantener" checked />
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 col-sm-9 col-md-offset-2 form-horizontal">
                                	<div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Vigencia</label>
                                        <div class="col-md-10 col-sm-10">
                                            <span class="help-inline">desde</span>
                                            <input type="text" name="desde" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                            <span class="help-inline">hasta</span>
                                            <input type="text" name="hasta" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Programar</label>
                                        <div class="col-md-10 col-sm-10">
                                            <span class="help-inline">desde</span>
                                            <input type="text" name="desde" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                            <span class="help-inline">hasta</span>
                                            <input type="text" name="hasta" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label class="mt-checkbox mt-checkbox-outline"> Borrador
                                        <input type="checkbox" value="1" name="borrador" class="input-inline" />
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <!-- end: .item -->
                            <!-- start: .item -->
                        	<div class="item clearfix margin-bottom-25">
                            	
                                <div class="col-md-2 text-center">
                                    <label class="check-primario mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" value="1" name="item" />
                                        <span></span>
                                        <div class="icon margin-bottom-5">
                                            <i class="fa fa-file-pdf-o"></i>
                                        </div>
                                        <a class="underline grey btn-sm" href="javascript:;" data-toggle="dropdown"  data-hover="dropdown" data-close-others="true" aria-expanded="false"> Reemplazar <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li class="text-center"><a href="javascript:;">Subir</a></li>
                                            <li class="text-center"><a href="javascript:;">Abrir Biblioteca</a></li>
                                        </ul>
                                    </label>
                                </div>
                                <div class="col-md-8 col-sm-9">
                                	<div class="form-group">
                                    	<div class="row">
                                            <div class="col-md-10 col-sm-10">xcab1_2pagespeeddic-II.jpg</div>
                                            <div class="col-md-2 col-sm-2 text-right">
                                                <a class="btn btn-circle btn-icon-only blue btn-outline" href="javascript:;">
                                                    <i class="icon-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control grey-silver" value="Nuevo Manual de Mantención Duette">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="etiquetas" class="form-control grey-silver" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                	<div class="form-group text-right">
                                        <a class="btn btn-circle btn-icon-only blue btn-outline" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                	<div class="form-group">
                                        <label class="mt-checkbox mt-checkbox-outline"> Mantener arriba en listado
                                            <input type="checkbox" value="1" name="mantener" checked />
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-8 col-sm-9 col-md-offset-2 form-horizontal">
                                	<div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Vigencia</label>
                                        <div class="col-md-10 col-sm-10">
                                            <span class="help-inline">desde</span>
                                            <input type="text" name="desde" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                            <span class="help-inline">hasta</span>
                                            <input type="text" name="hasta" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Programar</label>
                                        <div class="col-md-10 col-sm-10">
                                            <span class="help-inline">desde</span>
                                            <input type="text" name="desde" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                            <span class="help-inline">hasta</span>
                                            <input type="text" name="hasta" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3">
                                    <label class="mt-checkbox mt-checkbox-outline"> Borrador
                                        <input type="checkbox" value="1" name="borrador" class="input-inline" />
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <!-- end: .item -->
                        </div>
                        <!-- end: .listado-archivos -->
                        <div class="margin-bottom-15">
                            <a href="#" class="btn blue btn-outline btn-sm"><i class="fa fa-arrows-v"></i> Seleccionar Todo</a> / 
                            <a href="#" class="btn blue btn-outline btn-sm"><i class="fa fa-times"></i> Deseleccionar Todo</a>
                        </div>
                        <div class="clearfix"></div>
                        <!-- start: .acciones-globales -->
                        <div class="acciones-globales clearfix margin-bottom-25">
                        	
                        	<div class="mt-checkbox-inline col-md-4">
                                <label class="mt-checkbox mt-checkbox-outline"> Mantener arriba en listado
                                    <input type="checkbox" value="1" name="mantener_global" />
                                    <span></span>
                                </label>
                                <div class="clearfix"></div>
                                <label class="mt-checkbox mt-checkbox-outline"> Borrador
                                    <input type="checkbox" value="1" name="mantener_global" />
                                    <span></span>
                                </label>
                            </div>
                            <div class="col-md-8 form-horizontal">
                            	<div class="form-group">
                                    <label class="col-md-2 control-label">Vigencia</label>
                                    <div class="col-md-10">
                                        <span class="help-inline">desde</span>
                                        <input type="text" name="desde" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                        <span class="help-inline">hasta</span>
                                        <input type="text" name="hasta" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Programar</label>
                                    <div class="col-md-10">
                                        <span class="help-inline">desde</span>
                                        <input type="text" name="desde" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                        <span class="help-inline">hasta</span>
                                        <input type="text" name="hasta" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: .acciones-globales -->
                        <div class="text-center">
                         <button type="button" class="btn blue btn-outline">Cancelar</button>
                            <button type="button" class="btn blue">Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- end: .page-content-col -->
                
            </div>
            <!-- start: .page-content-row -->
        </div>
        <!-- end .page-content-container -->
        
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>
