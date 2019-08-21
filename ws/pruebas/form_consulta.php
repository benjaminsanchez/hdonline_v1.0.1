<?php
session_start();
ob_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache"); // HTTP/1.0 
ini_set("soap.wsdl_cache_enabled", "0"); // Disable Cache SOAP
ini_set('display_errors', 'On'); 
error_reporting(E_ALL);
$msg_error = '';
if (@$_SESSION["WS1_LOGIN"] != "login"):
	header("location:login.php");
	ob_end_clean();
	exit();
endif;
?>
<html>
<head>
</head>
<body>
<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso12.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>
.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: #474747}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}
</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="formden_header">
          <h2> Demo Consumo de WS </h2>
          <p> Formulario de ejemplo para consumo de WS.</br>
            Ingrese los parámetros para ejecutar el m&eacute;todo IngresaUsuario </p>
          <p><a href="logout.php">Cerrar sesión</a></p>
        </div>
        <!-- Form send POST to iframe[name=resultado] -->
        <form class="form-horizontal" method="post" target="resultado" action="form_respuesta.php">
        
          <div class="form-group form-group-sm">
            <label class="control-label col-sm-2" for="paramIdCliente"> paramIdCliente </label>
            <div class="col-sm-4">
              <input class="form-control" id="paramIdCliente" name="paramIdCliente" type="text" required/>
              <span class="help-block" > </span> </div>
            <label class="control-label col-sm-2" for="paramEmail"> paramEmail </label>
            <div class="col-sm-4">
              <input class="form-control" id="paramEmail" name="paramEmail" type="email" required/>
              <span class="help-block"></span> </div>
          </div>
          
           <div class="form-group form-group-sm">
            <label class="control-label col-sm-2" for="paramIdUsuario"> paramIdUsuario </label>
            <div class="col-sm-4">
              <input class="form-control" id="paramIdUsuario" name="paramIdUsuario" type="text" required/>
              <span class="help-block" > </span> </div>
            <label class="control-label col-sm-2" for="paramPassword"> paramPassword </label>
            <div class="col-sm-4">
              <input class="form-control" id="paramPassword" name="paramPassword" type="text" required/>
              <span class="help-block"></span> </div>
          </div>
          
          
           <div class="form-group form-group-sm">
            <label class="control-label col-sm-2" for="paramNombreUsuario"> paramNombreUsuario </label>
            <div class="col-sm-4">
              <input class="form-control" id="paramNombreUsuario" name="paramNombreUsuario" type="text" required/>
              <span class="help-block" > </span> </div>
            <label class="control-label col-sm-2" for="paramIdPerfil"> paramIdPerfil </label>
            <div class="col-sm-4">
              <input class="form-control" id="paramIdPerfil" name="paramIdPerfil" type="number" required/>
              <span class="help-block"></span> </div>
          </div>
          
           <div class="form-group form-group-sm">
             <label class="control-label col-sm-2" for="paramActivo"> paramActivo </label>
            <div class="col-sm-4">
              <select name="paramActivo" id="paramActivo" class="select form-control" required>
               <option value="0">Usuario Inactivo (0)</option>
               <option value="1" selected>Usuario Activo (1)</option>
              </select></div>
        
          </div>
          
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <button class="btn btn-primary " name="submit" type="submit"> Mostrar resultados de WS->IngresaUsuario </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <iframe src="form_respuesta.php" name="resultado" id="resultado" width="100%" height="100%"></iframe>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
	$(document).ready(function(){
		var date_input=$('input.datepicker'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
