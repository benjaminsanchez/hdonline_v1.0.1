<?php
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 900);
ini_set('default_socket_timeout', 15);


$soaparray["paramCodigo"] = "72.10.50.35";
$soaparray["paramUsuario"] = "oqo";
$soaparray["paramClave"] = "oqo2598";

$soaparray["paramIdCliente"] = "21000000-3";
$soaparray["paramEmail"] = "prueba@oqo2.cl";
$soaparray["paramIdUsuario"] = "1";
$soaparray["paramPassword"] = "prueba12012";
$soaparray["paramNombreUsuario"] = "prueba1";
$soaparray["paramIdPerfil"] = 1;
$soaparray["paramActivo"] = 1; 


$wsdl = 'http://64.76.139.7:8086/wsingreso.asmx?WSDL';

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
  
var_dump($data);
die;

?>