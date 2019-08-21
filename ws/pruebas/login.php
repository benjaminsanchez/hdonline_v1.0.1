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
if (@$_SESSION["SML_LOGIN"] == "login"):
	header("location:form_consulta.php");
	ob_end_clean();
	exit();
endif;
$respuesta = "NO";

if (isset($_POST["usuario"]) && isset($_POST["clave"]) && (trim(@$_POST["usuario"]) != "" && trim(@$_POST["usuario"]) != "") && (trim(@$_POST["clave"]) != "" && trim(@$_POST["clave"]) != "")):
	
	if (trim(@$_POST["usuario"]) == "OQOTEST" && trim(@$_POST["clave"]) == "B98AK71"):
		$respuesta = "OK";
	endif;

	// print_r($result);

	
	switch ($respuesta):
		case "OK":
			$_SESSION["WS1_LOGIN"] = "login";
			$_SESSION["WS1_usuario"] = @$_POST["usuario"];
			$_SESSION["WS1_clave"] = @$_POST["clave"];
			header("location:form_consulta.php");
			ob_end_clean();
			exit();
		default:
			$msg_error = "Usuario no válido";
	endswitch;
endif;


	
	
	
	?><html>
<head>
<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso12.css" />

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>
.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form {
	font-family: Arial, Helvetica, sans-serif;
	color: #474747
}
.bootstrap-iso form button, .bootstrap-iso form button:hover {
	color: white !important;
}
.asteriskField {
	color: red;
}
</style>
</head>
<body>
<!-- HTML Form (wrapped in a .bootstrap-iso div) -->

  <div class="bootstrap-iso">
    <div class="container-fluid">
      <div class="row">
       <div class="col-md-4 col-sm-4 col-xs-12">
       &nbsp;
       </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="formden_header">
            <h2> Acceso de usuario WS </h2>
            <p> Ingrese usuario y clave proporcionada para el consumo de WS </p>
            <p style="color:red"><?php echo $msg_error; ?></p>
          </div>
          <form class="form-horizontal" method="post">
            <div class="form-group form-group-sm">
              <label class="control-label col-sm-2" for="usuario"> Usuario </label>
              <div class="col-sm-10">
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-user"> </i> </div>
                  <input class="form-control" id="usuario" name="usuario" type="text" required/>
                </div>
              </div>
            </div>
            <div class="form-group form-group-sm">
              <label class="control-label col-sm-2" for="clave"> Clave </label>
              <div class="col-sm-10">
                <div class="input-group">
                  <div class="input-group-addon"> <i class="fa fa-asterisk"> </i> </div>
                  <input class="form-control" id="clave" name="clave" type="password" required/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2">
                <button class="btn btn-primary " name="submit" type="submit"> Acceder </button>
              </div>
            </div>
          </form>
        </div>
         <div class="col-md-4 col-sm-4 col-xs-12">
       &nbsp;
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
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
