<!-- Modal descarga imagen -->

<div id="descarga" class="modal fade" tabindex="-1" data-focus-on="input:first">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Descargar</h4>
  </div>
  <div class="modal-body">
    <div class="portlet-body form"> 
      <!-- BEGIN FORM-->
      <form action="#" id="descarga-imagen" class="horizontal-form">
        <input type="hidden" name="alto" value="">
        <input type="hidden" name="ancho" value="">
        <input type="hidden" name="localizacion" value="">
        <input type="hidden" name="urlbase" value="">
        <input type="hidden" name="archivo_nombre" value="">
        <input type="hidden" name="id_biblioteca" value="">
        <div class="form-group">
          <label class="control-label text-center col-md-12">Seleccionar tamaño a descargar</label>
        </div>
        <div class="form-body">
          <div class="row">
            <div class="col-md-12"> 
              <!-- start radio list-->
              
              <div class="form-group">
                <label class="control-label col-md-4">&nbsp;</label>
                <div class="col-md-8">
                  <div class="radio-list">
                    <label class="radio tipo300">
                      <input type="radio" name="tipoimg" value="300">
                      Pequeño (Ancho 300px)</label>
                    <label class="radio tipo1024">
                      <input type="radio" name="tipoimg" value="1024">
                      Mediano (Ancho 1024px)</label>
                    <label class="radio default">
                      <input type="radio" name="tipoimg" value="default">
                      <span id="defaultxt"></span> </label>
                    <label class="radio">
                      <input type="radio" name="tipoimg" value="max">
                      Resolución alta (solicitud)</label>
                  </div>
                </div>
              </div>
              <!-- end radio list --> 
            </div>
          </div>
          <div class="form-group solicitar-img" >
            <label class="control-label text-center">¿Con qué fines necesitas utilizar esta imagen?</label>
            <textarea class="form-control" name="comentario" placeholder="Comentario:"></textarea>
            <label class="control-label text-center col-md-12"><i class="small">Solicitud <?php echo $usuarioPerfil->nombre; ?></i></label>
          </div>
            <p class="text-center font-red" id="ShowMsgDescarga"></p>
          <div class="form-group text-center"> <a class="btn blue margin-top-20" href="#" id="btndescarga" download=""  >Descargar</a> </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- MOdal-->