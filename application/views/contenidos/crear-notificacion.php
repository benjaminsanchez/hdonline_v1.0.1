<?php $this->load->view('templates/header'); ?>

<div class="container-fluid" id="notificaciones">
    <div class="page-content white"> 
  
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
                <li class="active">Notificaciones</li>
            </ol>
            <h1 class="pull-left">Crear Notificación</h1>
            <!--<button type="button" class="btn submit pull-right">Guardar</button>-->
            <div class="clearfix"></div>
        </div>
        <!-- END BREADCRUMBS --> 
        
        <!-- start: .page-content-container -->
        <div class="page-content-container">
        
            <!-- start: .page-content-row -->
            <div class="page-content-row"> 
            
                <?php //$this->load->view('templates/sidebar'); ?>
                
            	<!-- start: .page-content-col -->
                <div <?php /*?>class="page-content-col"<?php */?>> 
                	<form action="#" method="POST" class="form">
                    	<!-- start: .pasos -->
                    	<div class="pasos mt-element-step">
                            <div class="row step-thin">
                                <div class="col-md-4 bg-grey mt-step-col active" data-paso="paso-1">
                                    <div class="mt-step-number bg-white font-grey">1</div>
                                    <div class="mt-step-title uppercase font-grey-cascade">Configuración</div>
                                </div>
                                <div class="col-md-4 bg-grey mt-step-col" data-paso="paso-2">
                                    <div class="mt-step-number bg-white font-grey">2</div>
                                    <div class="mt-step-title uppercase font-grey-cascade">Contenido</div>
                                </div>
                                <div class="col-md-4 bg-grey mt-step-col" data-paso="paso-3">
                                    <div class="mt-step-number bg-white font-grey">3</div>
                                    <div class="mt-step-title uppercase font-grey-cascade">Finalizar</div>
                                </div>
                            </div>
                        </div>
                        <!-- end: .pasos -->
                        
                        <!-- start: #paso-1 -->
                        <div id="paso-1" class="paso form-horizontal" style="display: block;">
                        
                            <h5 class="form-section bold uppercase">Configuración</h5>
                            
                            <div class="row margin-bottom-40">
                            
                                <div class="col-md-7">   
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 control-label">Nombre</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" name="titulo" class="form-control grey-silver">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-9 col-sm-9 col-md-offset-3 col-sm-offset-3">
                                            <div class="mt-checkbox-inline">
                                                <label class="mt-checkbox mt-checkbox-outline">
                                                    <input type="checkbox" id="inlineCheckbox21" value="option1"> Solo para admins
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-5">   
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 control-label">Sección</label>
                                        <div class="col-md-9 col-sm-9">
                                            <select class="form-control grey-silver">
                                                <option>Todas</option>
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 control-label">URL asociada</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" name="titulo" class="form-control grey-silver" value="http://myhunterdouglas.cl/noticiax">
                                            <span class="help-inline">Asociar URL para cruzar permisos</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="form-section bold uppercase">Tipo</h5>
                            
                            <div class="margin-bottom-40 text-center">
                                <div class="mt-checkbox-inline">
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" id="inlineCheckbox21" value="option1"> Banner push
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" id="inlineCheckbox21" value="option1"> Ventana evento
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" id="inlineCheckbox21" value="option1"> Aceptación obligatorio
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" id="inlineCheckbox21" value="option1"> Ventana texto libre
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" id="inlineCheckbox21" value="option1"> Web push
                                        <span></span>
                                    </label>
                                    <label class="mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" id="inlineCheckbox21" value="option1"> Email
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-actions text-center">
                                <button type="submit" class="btn blue btn-outline">Guardar</button>
                                <button type="button" class="btn blue siguiente-paso" data-paso="paso-2">Continuar</button>
                            </div>
                        
                        </div>
                        <!-- end: #paso-1 -->
                        
                         <!-- start: #paso-2 -->
                        <div id="paso-2" class="paso">
                        
                            <h5 class="form-section bold uppercase">Banner push</h5>
                            
                            <div class="row margin-bottom-40">
                            
                                <div class="col-md-6">   
                                    <div class="form-group">
                                        <label class="control-label">Imagen (123x123)</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                    <div class="form-group">
                                        <a href="" class="btn grey-gallery">
                                            <i class="fa fa-plus"></i>
                                            <span> Abrir Biblioteca </span>
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Texto botón</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">   
                                    <div class="form-group">
                                    	<label class="control-label">&nbsp;</label>
                                        <img src="<?=base_url()?>assets/images/ejemplos/thumb2.jpg" class="img-responsive miniatura">
                                    </div>
                                </div>
                                <div class="col-md-3 previsualizar text-center">   
                                    <div class="form-group">
                                    	<a href="" class="btn grey-gallery">
                                            <i class="fa fa-search"></i>
                                            <span> Previsualizar </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="form-section bold uppercase">Ventana de Evento</h5>
                            
                            <div class="row margin-bottom-40">
                            
                                <div class="col-md-6">   
                                    <div class="form-group">
                                        <label class="control-label">Imagen (123x123)</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                    <div class="form-group">
                                        <a href="" class="btn grey-gallery">
                                            <i class="fa fa-plus"></i>
                                            <span> Abrir Biblioteca </span>
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Texto botón asistir</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">   
                                    <div class="form-group">
                                    	<label class="control-label">&nbsp;</label>
                                        <img src="<?=base_url()?>assets/images/ejemplos/thumb2.jpg" class="img-responsive miniatura">
                                    </div>
                                </div>
                                <div class="col-md-3 previsualizar text-center">   
                                    <div class="form-group">
                                    	<a href="" class="btn grey-gallery">
                                            <i class="fa fa-search"></i>
                                            <span> Previsualizar </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="form-section bold uppercase">Aceptación Obligatorio</h5>
                            
                            <div class="row margin-bottom-40">
                            
                                <div class="col-md-6">   
                                    <div class="form-group">
                                        <label class="control-label">Imagen</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                    <div class="form-group">
                                        <a href="" class="btn grey-gallery">
                                            <i class="fa fa-plus"></i>
                                            <span> Abrir Biblioteca </span>
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Titulo</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Texto</label>
                                        <textarea name="titulo" class="form-control grey-silver" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Texto botón aceptar</label>
                                        <input type="text" name="titulo" class="form-control grey-silver" value="Estoy de acuerdo">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">   
                                    <div class="form-group">
                                    	<label class="control-label">&nbsp;</label>
                                        <img src="<?=base_url()?>assets/images/ejemplos/thumb2.jpg" class="img-responsive miniatura">
                                    </div>
                                </div>
                                <div class="col-md-3 previsualizar text-center">   
                                    <div class="form-group">
                                    	<a href="" class="btn grey-gallery">
                                            <i class="fa fa-search"></i>
                                            <span> Previsualizar </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="form-section bold uppercase">Ventana Texto Libre</h5>
                            
                            <div class="row margin-bottom-40">
                            
                                <div class="col-md-6">   
                                    <div class="form-group">
                                        <label class="control-label">Imagen</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                    <div class="form-group">
                                        <a href="" class="btn grey-gallery">
                                            <i class="fa fa-plus"></i>
                                            <span> Abrir Biblioteca </span>
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Titulo</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="ckeditor form-control" name="editor2" rows="6" data-error-container="#editor2_error"></textarea>
                                        <div id="editor2_error"> </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">   
                                    <div class="form-group">
                                    	<label class="control-label">&nbsp;</label>
                                        <img src="<?=base_url()?>assets/images/ejemplos/thumb2.jpg" class="img-responsive miniatura">
                                    </div>
                                </div>
                                <div class="col-md-3 previsualizar text-center">   
                                    <div class="form-group">
                                    	<a href="" class="btn grey-gallery">
                                            <i class="fa fa-search"></i>
                                            <span> Previsualizar </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="form-section bold uppercase">Web push</h5>
                            
                            <div class="row margin-bottom-40">
                            
                                <div class="col-md-6">   
                                    <div class="form-group">
                                        <label class="control-label">Texto (160 carácteres)</label>
                                        <input type="text" name="titulo" maxlength="160" class="form-control grey-silver">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">URL Asociada</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                        <span class="help-inline">(opcional) Agregue el título de un contenido cargado para asociarlo</span>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">   
                                    <div class="form-group">
                                    	<label class="control-label">&nbsp;</label>
                                        <img src="<?=base_url()?>assets/images/notificaciones.png" class="img-responsive miniatura">
                                    </div>
                                </div>
                                <div class="col-md-3 previsualizar text-center">   
                                    <div class="form-group">
                                    	<a href="" class="btn grey-gallery">
                                            <i class="fa fa-search"></i>
                                            <span> Previsualizar </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="form-section bold uppercase">Email</h5>
                            
                            <div class="row margin-bottom-40">
                            
                                <div class="col-md-6">   
                                    <div class="form-group">
                                        <label class="control-label">Asunto</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">URL Asociada</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                        <span class="help-inline">(opcional) Agregue el título de un contenido cargado para asociarlo</span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Texto Botón</label>
                                        <input type="text" name="titulo" class="form-control grey-silver">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Texto</label>
                                        <textarea name="titulo" class="form-control grey-silver" rows="4"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">   
                                    <div class="form-group">
                                    	<label class="control-label">&nbsp;</label>
                                        <img src="<?=base_url()?>assets/images/notificaciones.png" class="img-responsive miniatura">
                                    </div>
                                </div>
                                <div class="col-md-3 previsualizar text-center">   
                                    <div class="form-group">
                                    	<a href="" class="btn grey-gallery">
                                            <i class="fa fa-search"></i>
                                            <span> Previsualizar </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-actions text-center">
                                <button type="submit" class="btn blue">Guardar</button>
                                <button type="button" class="btn blue btn-outline siguiente-paso" data-paso="paso-3">Continuar</button>
                            </div>
                        
                        </div>
                        <!-- end: #paso-2 -->
                        
                        <!-- start: #paso-3 -->
                        <div id="paso-3" class="paso form-horizontal">
                        
                            <h5 class="form-section bold uppercase">Configuración de envío</h5>
                            
                            <div class="margin-bottom-40 text-center">
                                <div class="mt-checkbox-inline">
                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="config" value="option1" checked> Enviar Ahora
                                        <span></span>
                                    </label>
                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="config" value="option1"> Borrador
                                        <span></span>
                                    </label>
                                    <div class="hidden-md hidden-lg"></div>
                                    <label class="mt-radio mt-radio-outline">
                                        <input type="radio" name="config" value="option1"> Programar
                                        <span></span>
                                    </label>
                                    <span class="help-inline">desde</span>
                                    <input type="text" name="desde" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                    <span class="help-inline">hasta</span>
                                    <input type="text" name="hasta" class="form-control input-inline grey-silver input-small" placeholder="01/08/2016">
                                </div>
                            </div>
                            
                            <div class="form-actions text-center">
                                <button type="submit" class="btn blue">Finalizar</button>
                            </div>
                        
                        </div>
                        <!-- end: #paso-3 -->
                        
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
<script type="text/javascript">
$(window).load(function(){
	$('.pasos .mt-step-col').click(function(){
		if( $(this).hasClass('active') ) return;
		$('.pasos .mt-step-col').removeClass('active');
		var paso = $(this).data('paso');
		$(this).addClass('active');
		$('.paso:visible').stop(true, true).fadeOut(function(){
			$('#'+paso).stop(true, true).fadeIn();
		});
	});
	$('.siguiente-paso').click(function(){
		var paso = $(this).data('paso');
		$('.paso:visible').stop(true, true).fadeOut(function(){
			$('#'+paso).stop(true,true).fadeIn();
			$('.pasos .mt-step-col').removeClass('active');
			$('.pasos .mt-step-col[data-paso="'+paso+'"]').addClass('active');
		});
	});
});
</script>
