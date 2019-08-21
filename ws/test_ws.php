<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache"); // HTTP/1.0 
ini_set("soap.wsdl_cache_enabled", "0"); // Disable Cache SOAP
ini_set('display_errors', 'On'); error_reporting(E_ALL);


$client = new SoapClient("http://64.76.139.7:8086/wsingreso.asmx?wsdl");
var_dump($client);
var_dump($client->__getFunctions()); 
var_dump($client->__getTypes()); 

$soaparray["paramCodigo"] = "72.10.50.35";
$soaparray["paramUsuario"] = "oqo";
$soaparray["paramClave"] = "oqo2598";

$soaparray["paramIdCliente"] = "prueba";
$soaparray["paramEmail"] = "prueba@oqo.cl";
$soaparray["paramIdUsuario"] = "1";
$soaparray["paramPassword"] = "prueba12012";
$soaparray["paramNombreUsuario"] = "prueba1";
$soaparray["paramIdPerfil"] = "1";
$soaparray["paramActivo"] = "1"; 

//$result = $client->__soapCall('IngresaUsuario', array($soaparray));
$result = $client->IngresaUsuario($soaparray);
print_r($result);
/*
$client = new SoapClient("http://64.76.139.7:8086/wsingreso.asmx?wsdl");
			print_r($client->__getFunctions()); 
//print_r($client->__getTypes()); 
//			print_r($client);
			
$soaparray["paramCodigo"] = "72.10.50.35";
$soaparray["paramUsuario"] = "oqo";
$soaparray["paramClave"] = "oqo2598";


// "72.10.50.35", "oqo", "oqo2598"

$soapobj = new stdClass();
$soapobj->paramCodigo = "72.10.50.35";
$soapobj->paramUsuario = "oqo";
$soapobj->paramClave = "oqo2598";

$soapstr = array("72.10.50.35", "oqo", "oqo2598");

//$result = $client->GetListaUsuariosDS($soapobj);
	
$result = $client->__soapCall("GetListaUsuariosDS",($soapstr));
print_r($result);
//$xml = $client->__getLastRequest();
//	print_r($xml);
*/
	
	/*
	
	"72.10.50.35", "oqo", "oqo2598"
	$soapmsg["paramCodigo"] = "72.10.50.35";
$soapmsg["paramUsuario"] = "oqo";
$soapmsg["paramClave"] = "oqo2598";
	
try {
    $client = new SoapClient('http://64.76.139.7:8086/wsingreso.asmx?wsdl', array('trace'=> 1, 'exceptions' =>1));
    $result = $client->__soapCall("GetListaUsuariosDS", $soapmsg);
} catch (SoapFault $e) {
   $result = array(
       'erro' => $e->faultstring
   );
}

/**
 * Example of using the ServiceClient class
 * 
 * does a request to the ExampleServer
 * 
 * @author Kristian Lunde
 */
/*
require_once('ServiceClient.php');

class ExampleClient extends ServiceClient
{
	
	public function __construct()
	{
		$this->GetListaUsuariosDS("72.10.50.35","oqo","oqo2598");
		//$this->getCounty('Bath');
	}
	
	public function GetListaUsuariosDS($paramCodigo,$paramUsuario,$paramClave)
	{
		$params = 'paramCodigo=' . $paramCodigo. '&paramUsuario='.$paramUsuario.'&paramClave='.$paramClave;
		$url = 'https://64.76.139.7:8086/wsingreso.asmx?wsdl';
		print_r($this->doPostRequest($url,$params));
		exit();
	}
	
	
	//$this->doGetRequest($url);
	
	
	
}



$obj = new ExampleClient();


*/		