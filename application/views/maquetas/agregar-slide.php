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
            <form action="#" method="POST" class="form form-horizontal">
              <h5 class="form-section bold uppercase">Agregar Slide</h5>
              <div class="row margin-bottom-40">
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
                    <label class="col-md-3 col-sm-3 control-label">Texto Botón</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" name="texto" placeholder="Ej: Ver más" class="form-control grey-silver">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Url (Opcional)</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" name="url" placeholder="http://" class="form-control grey-silver">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">N° de orden</label>
                    <div class="col-md-9 col-sm-9">
                      <input type="number" name="orden" class="form-control grey-silver" style="width:80px">
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
                <div class="col-md-3 col-sm-3"> <img src="https://myhd.s1.cl/imgtmp/productos_imagenes/499x306-1/CountryWoods4.jpg" width="100%" height="100%" style="background: #999;"> </div>
              </div>
              <div class="form-actions text-center">
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
