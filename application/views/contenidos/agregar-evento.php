<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="page-content white"> 
    
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs relative">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
        <li class="active">Eventos</li>
      </ol>
      <h1 class="pull-left relative">AGREGAR EVENTO</h1>
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
                <div class="col-md-3 col-sm-3"> <img src="https://myhd.s1.cl/imgtmp/promociones/354x187-2/promocion-toldos2017.png" width="100%" height="100%" style="background: #999; margin-top: 50px;"> </div>
              </div>
              <h5 class="form-section bold uppercase margin-top-10">Configuración evento</h5>
              <!-- start session -->
              <div class="sesion ses-1">
                <div class="col-md-12 col-sm-12 light">
                  <h5 class="bold">Sesión principal</h5>
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 control-label margin-top-15">Tipo de sesión</label>
                    <div class="col-md-10 col-sm-10 margin-top-20">
                      <div class="mt-radio-list">
                        <label class="mt-radio mt-radio-outline">
                          <input type="radio" name="tipo_1" class="tipo-evento" value="presencial" checked>
                          Sesión de evento presencial <span></span> </label>
                        <label class="mt-radio mt-radio-outline">
                          <input type="radio" name="tipo_1" class="tipo-evento" value="virtual">
                          Sesión de evento en línea <span></span> </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 light">
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 control-label">Costo evento</label>
                    <div class="col-md-6 col-sm-6">
                      <input type="number" name="costo" placeholder="Texto abierto" class="form-control grey-silver">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 light evento-virtual">
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 control-label">Video del evento</label>
                    <div class="col-md-10 col-sm-10">
                      <input type="url" name="titulo" class="form-control grey-silver" placeholder="https://">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 light evento-fisico">
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 control-label">Dónde</label>
                    <div class="col-md-10 col-sm-10">
                      <input type="text" name="titulo" placeholder="Dirección, comuna" class="form-control grey-silver">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 light evento-fisico">
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 control-label">Coordenadas</label>
                    <div class="col-md-6 col-sm-6">
                      <input type="text" name="titulo" class="form-control grey-silver">
                    </div>
                    <div class="col-md-4 col-sm-4"> <a href="#" class="btn blue btn-outline"><i class="fa fa-map-o"></i> Abrir mapa</a> </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 light">
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 control-label">Fecha</label>
                    <div class="col-md-4 col-sm-4">
                      <input type="text" name="desde" class="form-control input-inline grey-silver input-small date-picker" placeholder="01/08/2016">
                    </div>
                    <label class="col-md-2 col-sm-2 control-label">Hora</label>
                    <div class="col-md-4 col-sm-4">
                      <input type="time" name="desde" class="form-control input-inline grey-silver input-small">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 light">
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 control-label">Cupos</label>
                    <div class="col-md-4 col-sm-4">
                      <input type="number" name="titulo" class="form-control grey-silver input-small">
                    </div>
                  </div>
                </div>
              </div>
              <!-- end session -->
              
              <div class="col-md-12 col-sm-12 light row-bordered">
                <div class="form-group"> <a href="javascript:void(0)" class="btn blue btn-outline pull-right btnsesionadd" ><i class="fa fa-plus-circle"></i> Añadir sesión</a> </div>
              </div>
              
              <div class="col-md-12 col-sm-12 light margin-top-30"></div>
              <h5 class="form-section bold uppercase">Confirmación</h5>
              <div class="col-md-12 col-sm-12 light">
                <div class="form-group">
                  <div class="col-md-12 col-sm-12">
                  <input type="text" name="titulo" class="form-control grey-silver" placeholder="Titulo de la confirmación" value="Título predefinido de confirmación">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12 margin-top-20">
                  <textarea class="form-control" name="editor|" rows="3" placeholder="Texto de la confirmación">Texto/descripción predefinida de confirmación</textarea>
                  </div>
                </div>
              </div>
              
              
              <div class="col-md-12 col-sm-12 light margin-top-30"></div>
              <h5 class="form-section bold uppercase">Detalle</h5>
              <div class="col-md-12 col-sm-12 light">
                <div class="form-group">
                  <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" name="editor|" rows="3" data-error-container="#editor2_error" placeholder="Texto resumen del evento"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12 margin-top-20">
                    <textarea class="ckeditor form-control" name="editor2" rows="6" data-error-container="#editor2_error"></textarea>
                    <div id="editor2_error"> </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="fileupload-buttonbar col-md-12">
                  <div class="">
                    <h5 class="form-section bold uppercase">Archivos</h5>
                    <!-- The fileinput-button span is used to style the file input field as button 
                    <span class="btn grey-gallery fileinput-button"> <i class="fa fa-plus"></i> <span> Añadir archivos... </span>
                    <input type="file" name="files[]" multiple> 
                    </span> --><a href="javascript:void(0)" class="btn blue biblioteca"  data-url="<?php echo base_url(); ?>biblioteca/list" data-toggle="modal"> <i class="fa fa-plus"></i> <span> Abrir Biblioteca </span> </a> </div>
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
<script>
  jQuery(document).ready(function(e) {
	  
	  // Tipo de evento
	  
	   function setTipoEvento() {
			jQuery("input[type=radio].tipo-evento").each(function(index, element) {
				jQuery(this).on('change',function() {
				var nombre = jQuery(this).attr("name");
				var fcount = parseInt(nombre.substr(5, 4));
					setFieldsEvent(fcount,jQuery(".sesion.ses-"+fcount +" input[type=radio].tipo-evento:checked").val());
				});   
            });
			
	   }
	   setTipoEvento();
	  
	   function setFieldsEvent(count, type) {
		   
			console.log("setFieldsEvent("+count+", "+type+")");
		  switch (type){
			  case "fisico":
			  	$(".sesion.ses-"+count +" .evento-fisico").fadeIn(0);
				$(".sesion.ses-"+count +" .evento-virtual").fadeOut(0);				
			  break;
			  case "virtual":
			 	$(".sesion.ses-"+count +" .evento-virtual").fadeIn(0);
				$(".sesion.ses-"+count +" .evento-fisico").fadeOut(0);		
			  break;
		  }
	   }
	    
		var count = 1;
	    setFieldsEvent(count,jQuery("input[type=radio].tipo-evento:checked").val());
	   
	   // Agregar sesion
	  
		jQuery(".btnsesionadd").on('click', function() {
			count++;
			var htmlseccion = $(".ses-1").html();	
			htmlseccion = htmlseccion.replace(/tipo_1/g, "tipo_"+count);
			jQuery('<div class="sesion ses-'+count+'">'+htmlseccion+'</div>').insertAfter(".ses-"+parseInt(count-1));
			jQuery(".ses-"+count+" h5").html("Sesión "+count);
			var scrollto = parseInt(count*340);
			//jQuery(".sesion.ses-"+count +" input[type=radio].tipo-evento").attr("name","tipo_"+count);
			jQuery(".sesion.ses-"+count +" input[name='tipo_1']").attr("name","tipo_"+count);
			jQuery(".sesion.ses-"+count).fadeIn("slow");
			
			jQuery("html, body").animate({ scrollTop: scrollto }, 1000);
			//setFieldsEvent(count,jQuery("input[type=radio].tipo-evento:checked").val());
			setTipoEvento();
		});
  });
 

</script>