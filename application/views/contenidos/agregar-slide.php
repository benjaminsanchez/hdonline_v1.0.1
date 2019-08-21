<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="page-content white"> 
    
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>dashboard">Mi escritorio</a> </li>
        <li class="active">Slide Mi Escritorio</li>
      </ol>
      <h1 class="pull-left relative">Slide Mi Escritorio</h1>
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
            <form action="<?php echo base_url(); ?>contenidos/guardar-slide" method="POST" class="form form-horizontal">
              <h5 class="form-section bold uppercase">Agregar Slide</h5>
              <?php print_r($load_form); ?>
              <div class="row margin-bottom-40">
                <div class="col-md-9 col-sm-9">
                  <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Título</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" name="x_titulo" class="form-control grey-silver">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Imagen</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" name="x_id_biblioteca" class="form-control grey-silver">
                    </div>
                  </div>
                  <div class="form-group margin-bottom-40">
                    <div class="col-md-9 col-sm-9 col-md-offset-3 col-sm-offset-3"> <a href="#" data-url="<?php echo base_url(); ?>biblioteca/list?mode=select&field=x_id_biblioteca&type=images" data-toggle="modal" class="btn blue pull-left biblioteca"><i class="fa fa-search"></i> &nbsp;Examinar</a> </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Texto Botón</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" name="x_texto_boton" placeholder="Ej: Ver más" class="form-control grey-silver">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Url (Opcional)</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" name="x_url" placeholder="http://" class="form-control grey-silver">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">N° de orden</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="number" name="x_orden" class="form-control grey-silver" style="width:80px">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-md-3 control-label">Programar</label>
                    <div class="col-md-9"> <span class="help-inline">desde</span>
                      <input type="text" name="x_programar_desde" class="form-control input-inline grey-silver input-small date-picker" placeholder="01/08/2016">
                      <span class="help-inline">hasta</span>
                      <input type="text" name="x_programar_hasta" class="form-control input-inline grey-silver input-small date-picker" placeholder="01/08/2016">
                      <label class="mt-checkbox mt-checkbox-outline"> Borrador
                        <input type="checkbox" value="0" name="x_estado" class="input-inline" />
                        <span></span> </label>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-3 col-sm-3"> <img src="https://myhd.s1.cl/imgtmp/productos_imagenes/499x306-1/CountryWoods4.jpg" width="100%" height="100%" style="background: #999;"> </div>
              </div>
              <div class="form-actions text-center">
                <button type="button" onclick="document.location.href='<?php echo (@$configcrud->config->backpage != "") ? base_url().$configcrud->config->backpage: base_url().'list/'.$ffile; ?>'"  class="btn btn-outline blue">Cancelar</button>
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
