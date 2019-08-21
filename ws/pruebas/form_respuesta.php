<?php
session_start();
ob_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache"); // HTTP/1.0 
if (@$_SESSION["WS1_LOGIN"] != "login"):
	header("location:login.php");
	ob_end_clean();
	exit();
endif;
ini_set('display_errors', 'On'); 
error_reporting(E_ALL); // Display all errors and warning


ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 900);
ini_set('default_socket_timeout', 15);

if (@$_POST["paramIdCliente"] != ""):
$soaparray["paramCodigo"] = "72.10.50.35";
$soaparray["paramUsuario"] = "oqo";
$soaparray["paramClave"] = "oqo2598";

$soaparray["paramIdCliente"] = @$_POST["paramIdCliente"];
$soaparray["paramEmail"] = @$_POST["paramEmail"];
$soaparray["paramIdUsuario"] = @$_POST["paramIdUsuario"];
$soaparray["paramPassword"] = @$_POST["paramPassword"];
$soaparray["paramNombreUsuario"] = @$_POST["paramNombreUsuario"];
$soaparray["paramIdPerfil"] = @$_POST["paramIdPerfil"];
$soaparray["paramActivo"] = @$_POST["paramActivo"]; 


// $wsdl = 'http://64.76.139.7:8086/wsingreso.asmx?WSDL'; // pruebas

$wsdl = 'http://64.76.139.7:8086/wsingreso.asmx?WSDL';  // productivo




$options = array(
		'uri'=>'http://schemas.xmlsoap.org/soap/envelope/',
		'style'=>SOAP_RPC,
		'use'=>SOAP_ENCODED,
		'soap_version'=>SOAP_1_1,
		'cache_wsdl'=>WSDL_CACHE_NONE,
		'connection_timeout'=>15,
		'trace'=>true,
		'encoding'=>'UTF-8',
		'exceptions'=>true,
	);
try {
	$soap = new SoapClient($wsdl, $options);
	$data = $soap->IngresaUsuario($soaparray);
}
catch(Exception $e) {
	echo "catch:";
	die($e->getMessage());
}
  


?>
<html>
<head>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
/*

var myList=<?php echo $json; ?>;

// Builds the HTML Table out of myList json data from Ivy restful service.
 function buildHtmlTable() {
     var columns = addAllColumnHeaders(myList);
 
     for (var i = 0 ; i < myList.length ; i++) {
         var row$ = $('<tr/>');
         for (var colIndex = 0 ; colIndex < columns.length ; colIndex++) {
             var cellValue = myList[i][columns[colIndex]];
 
             if (cellValue == null) { cellValue = ""; }
 
             row$.append($('<td/>').html(cellValue));
         }
         $("#excelDataTable").append(row$);
     }
 }
 
 // Adds a header row to the table and returns the set of columns.
 // Need to do union of keys from all records as some records may not contain
 // all records
 function addAllColumnHeaders(myList)
 {
     var columnSet = [];
     var headerTr$ = $('<tr/>');
 
     for (var i = 0 ; i < myList.length ; i++) {
         var rowHash = myList[i];
         for (var key in rowHash) {
             if ($.inArray(key, columnSet) == -1){
                 columnSet.push(key);
                 headerTr$.append($('<th/>').html(key));
             }
         }
     }
     $("#excelDataTable").append(headerTr$);
 
     return columnSet;
 }
 */
 </script>
<style>
td,th{font-size:12px;line-height:1.4;font-weight:unset;border:1px solid #e3e3e3;color:grey;background:#F0F0F0;padding:5px}body{font-family:Arial,Helvetica,sans-serif;color:#474747}table{width:100%;background-color:#fff}th{padding:10px;color:#fff;text-transform:uppercase;background-color:#337AB7;font-weight:700}tr:hover td{background-color:#FFF;color:#000}
</style>
</head>
<body >
   
    <h4>Resultado WS m&eacute;todo IngresaUsuario:</h4>
    <pre>
    <?php var_dump($data); ?>
    </pre>
    
    <h4>Parámetros enviados:</h4>
    <pre>
    <?php print_r($soaparray); ?>
    </pre>
    
    <h4>Opciones SOAP utilizadas:</h4>
    <pre>
    <?php echo "WSDL:<b>".$wsdl."</b><br><br>Options:"; ?>
    <?php print_r($options); ?>
    </pre>
</body>
</html>
<?php endif; ?>