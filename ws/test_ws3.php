<?php
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 900);
ini_set('default_socket_timeout', 15);


$soaparray["customerId"] = "503";
$soaparray["userName"] = "aperez1982@gmail.com";
$soaparray["password"] = "()*+,-"; // <-- password encriptado 123456



// $wsdl = 'http://10.20.14.128/PedidosWebService_Prueba/Authentication.asmx?WSDL'; // PRuebas anterior

// $wsdl = 'http://pedidoscl.hdlao.com/WebService/Authentication.asmx?WSDL'; // Produccion

// $wsdl = 'http://64.76.175.186/PedidosWebService_Prueba/Authentication.asmx?WSDL'; // Pruebas actual 15/03 (FUNCIONANDO)

$wsdl = 'http://pedidoscl.hdlao.com/WebService/Authentication.asmx?WSDL'; // Produccion

// enlace final http://pedidosax.hdlao.com/Login.aspx?t=97b24b84-77fd-40be-9711-e532c5e3e70f

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
	$data = $soap->GetToken($soaparray);
}
catch(Exception $e) {
	echo "catch:";
	die($e->getMessage());
}
  
var_dump($data);
die;

?>