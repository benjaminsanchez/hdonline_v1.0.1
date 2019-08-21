<?php

function name_system() {
	return "Hunter Douglas Online"; 	
}


function logo($modo='logo') {
	switch($modo) :
		case "logo":	$archivo = "logo.png";	break;; 
	endswitch;
	//return base_url()."uploads/".localizacion()."/logos/".$archivo;	
	return base_url()."assets/custom/img/".$archivo;
}
function localizacion() {
	
	$dominio = $_SERVER["HTTP_HOST"];
	
	switch ($dominio):
		case "myhd.s1.cl": 		$localizacion = 'cl'; break;
		case "hunterdouglasonline.cl": 		$localizacion = 'cl'; break;
                case "hdonline.com.co": 		$localizacion = 'co'; break;
                case "hunterdouglasonline.com.ar": 		$localizacion = 'ar'; break;
                
		default:					$localizacion = 'cl'; break;
	endswitch;
	
	return $localizacion;
}


// Funciones de conexion WS EPedidos
function ingresarUsuarioEpedidos($data) {	
	@ini_set('soap.wsdl_cache_enabled', 0);
	@ini_set('soap.wsdl_cache_ttl', 900);
	@ini_set('default_socket_timeout', 15);
	
	$soaparray["paramCodigo"] = "72.10.50.35";
	$soaparray["paramUsuario"] = "oqo";
	$soaparray["paramClave"] = "oqo2598";
	
	$soaparray["paramIdCliente"] = @$data["paramIdCliente"]; // rut cliente
	$soaparray["paramEmail"] = @$data["paramEmail"]; // email usuario
	$soaparray["paramIdUsuario"] = @$data["paramIdUsuario"]; // email usuario
	$soaparray["paramPassword"] = @$data["paramPassword"]; // password max 10 digitos
	$soaparray["paramNombreUsuario"] = @$data["paramNombreUsuario"]; // nombre usuario
	$soaparray["paramIdPerfil"] = @$data["paramIdPerfil"]; // id perfil de epedidos
	$soaparray["paramActivo"] = @$data["paramActivo"];  // 1 activo 0 desactivo o eliminado
	 
	
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
	return $data;
  	
}

function getTokenEpedidos($data) {
	@ini_set('soap.wsdl_cache_enabled', 0);
	@ini_set('soap.wsdl_cache_ttl', 900);
	@ini_set('default_socket_timeout', 15);
	
	
	$soaparray["customerId"] = $data["customerId"]; // "503";
	$soaparray["userName"] = $data["userName"]; //"aponce3";
	$soaparray["password"] = $data["password"]; //  urlencode($data["password"]); 
	
	//as object
	/*
	$soapobject = new stdClass();
	$soapobject->customerId = $data["customerId"];
	$soapobject->userName = $data["userName"];
	$soapobject->password =  $data["password"];
	*/
	//print_r($soaparray);
	// $wsdl = 'http://10.20.14.128/PedidosWebService_Prueba/Authentication.asmx?WSDL'; // PRuebas anterior
	
	
	//	$wsdl = 'http://64.76.175.186/PedidosWebService_Prueba/Authentication.asmx?WSDL'; // Pruebas actual 15/03 (FUNCIONANDO)
	$wsdl = 'http://pedidoscl.hdlao.com/WebService/Authentication.asmx?WSDL'; // Produccion

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
		echo "Error:";
		$data = ($e->getMessage());
	}
	//  echo "REQUEST:\n" . $soap->__getLastRequest() . "\n";
	return ($data);	
}
function limpiarCodigoClienteEpedidos($codigo) {
	$arrcode = explode("-",$codigo);
	$buscar = array(".",",");
	$reemplazar = array("","");
	$code = str_replace($buscar,$reemplazar,$arrcode[0]);
	return $code;
}



// End: funciones de conexion E-Pedidos
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) 
        && preg_match('/@.+\./', $email);
}
function extension($str) {	
	$array = explode('.',$str);
	$extension = end($array);
	return $extension;
}
function cortarTexto($text, $length = 100, $options = array()) {
	$default = array(
		'ending' => '...', 'exact' => true, 'html' => false
	);
	$options = array_merge($default, $options);
	extract($options);

	if ($html) {
	if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
		return $text;
	}
	$totalLength = mb_strlen(strip_tags($ending));
	$openTags = array();
	$truncate = '';

	preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
	foreach ($tags as $tag) {
		if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
		if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
			array_unshift($openTags, $tag[2]);
		} else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
			$pos = array_search($closeTag[1], $openTags);
			if ($pos !== false) {
			array_splice($openTags, $pos, 1);
			}
		}
		}
		$truncate .= $tag[1];

		$contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));
		if ($contentLength + $totalLength > $length) {
		$left = $length - $totalLength;
		$entitiesLength = 0;
		if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
			foreach ($entities[0] as $entity) {
			if ($entity[1] + 1 - $entitiesLength <= $left) {
				$left--;
				$entitiesLength += mb_strlen($entity[0]);
			} else {
				break;
			}
			}
		}

		$truncate .= mb_substr($tag[3], 0 , $left + $entitiesLength);
		break;
		} else {
		$truncate .= $tag[3];
		$totalLength += $contentLength;
		}
		if ($totalLength >= $length) {
		break;
		}
	}
	} else {
	if (mb_strlen($text) <= $length) {
		return $text;
	} else {
		$truncate = mb_substr($text, 0, $length - mb_strlen($ending));
	}
	}
	if (!$exact) {
	$spacepos = mb_strrpos($truncate, ' ');
	if (isset($spacepos)) {
		if ($html) {
		$bits = mb_substr($truncate, $spacepos);
		preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
		if (!empty($droppedTags)) {
			foreach ($droppedTags as $closingTag) {
			if (!in_array($closingTag[1], $openTags)) {
				array_unshift($openTags, $closingTag[1]);
			}
			}
		}
		}
		$truncate = mb_substr($truncate, 0, $spacepos);
	}
	}
	$truncate .= $ending;

	if ($html) {
	foreach ($openTags as $tag) {
		$truncate .= '</'.$tag.'>';
	}
	}

	return $truncate;


}

function limitStrlen($input, $length, $ellipses = true, $strip_html = true, $skip_html = false) 
{
    // strip tags, if desired
    if ($strip_html || !$skip_html) 
    {
        $input = strip_tags($input);

        // no need to trim, already shorter than trim length
        if (strlen($input) <= $length) 
        {
            return $input;
        }

        //find last space within length
        $last_space = strrpos(substr($input, 0, $length), ' ');
        if($last_space !== false) 
        {
            $trimmed_text = substr($input, 0, $last_space);
        } 
        else 
        {
            $trimmed_text = substr($input, 0, $length);
        }
    } 
    else 
    {
        if (strlen(strip_tags($input)) <= $length) 
        {
            return $input;
        }

        $trimmed_text = $input;

        $last_space = $length + 1;

        while(true)
        {
            $last_space = strrpos($trimmed_text, ' ');

            if($last_space !== false) 
            {
                $trimmed_text = substr($trimmed_text, 0, $last_space);

                if (strlen(strip_tags($trimmed_text)) <= $length) 
                {
                    break;
                }
            } 
            else 
            {
                $trimmed_text = substr($trimmed_text, 0, $length);
                break;
            }
        }

        // close unclosed tags.
        $doc = new DOMDocument();
        $doc->loadHTML($trimmed_text);
        $trimmed_text = $doc->saveHTML();
    }

    // add ellipses (...)
    if ($ellipses) 
    {
        $trimmed_text .= '...';
    }

    return $trimmed_text;
}

function only_number($string) {
	return preg_replace( '/[^0-9]/', '', $string );
}
function checkVigencia($desde='',$hasta='') {
	/*$vigencia = false;
	if ((@$desde==''&& @$hasta=='') || (@$desde=='0000-00-00'&& @$hasta=='0000-00-00')):
		$vigencia = true;
	else:
		$tt_now = time();
		$tt_desde = strtotime($desde);
		$tt_hasta = strtotime($hasta);
		// echo "consultando:".$tt_desde.":::".$tt_hasta.":::".$tt_now;
		$diff_desde = $tt_now - $tt_desde;
		$diff_hasta = $tt_hasta-$tt_now;
		if ( $diff_desde > 0 ) {
			$vigencia = true;
		} else {
			$vigencia = false;
		}
		if ($vigencia==true):
			if ( $diff_hasta > 0 ) {
				$vigencia = true;
			} else {
				$vigencia = false;
			}
		endif;
		
	endif;
	*/
	$desde = ($desde != "")?$desde." 00:00:00":"";
	$hasta = ($hasta != "")?$hasta." 23:59:59":"";
	$now = strtotime("now");
	$vigencia_desde = strtotime($desde);
	$vigencia_hasta = strtotime($hasta);
	$vigencia = false;
	//echo $desde."(".$vigencia_desde.")".$hasta."(".$vigencia_hasta.")-".$now."";
	if ((@$desde==''&& @$hasta=='') || (@$desde=='0000-00-00 00:00:00'&& @$hasta=='0000-00-00 23:59:59')):
		$vigencia = false;
		
	else:
		if ($desde != "0000-00-00 00:00:00" && $desde != "") 
			if ($now>=$vigencia_desde) { $vigencia = true; } else { $vigencia=false; }
		if ($hasta != "0000-00-00 23:59:59" && $hasta != "")
			if ($now<=$vigencia_hasta) { $vigencia = true; }  else { $vigencia=false; }
	endif;
	return $vigencia;
}


function comparar_usuarios($usuario,$temp) { // var as Object->field
	$campos = array("nombre","celular","telefono","direccion","id_perfil_usuario","genero","acceso_epedidos","email"); 
	
	$distintos = array();
	foreach ($campos as $campo):
		if ($usuario->$campo != $temp->$campo):
				$distintos[] = $campo;
		endif;
	endforeach;
	
	return $distintos;
	
}

function pais() {
	$localizacion = localizacion();
	switch ($localizacion) {
		case "ar": $gacode = "Argentina"; break;
		case "cl": $gacode = "Chile"; break;  
		case "co": $gacode = "Colombia"; break;  
		case "ec": $gacode = "Ecuador"; break;  
		case "mx": $gacode = "México"; break;  
		case "pa": $gacode = "Panamá"; break;  
		case "pe": $gacode = "Perú"; break;  
		case "ve": $gacode = "Venezuela"; break;  
		case "uy": $gacode = "Uruguay"; break;	  
		case "br": $gacode = "Brasil"; break;		
	}
	return $gacode;
}

function mes_nombre($mes) {
	$mes = intval($mes);
	switch ($mes):
		case 1: $nombre = "Enero"; break;
		case 2: $nombre = "Febrero"; break;
		case 3: $nombre = "Marzo"; break;
		case 4: $nombre = "Abril"; break;
		case 5: $nombre = "Mayo"; break;
		case 6: $nombre = "Junio"; break;
		case 7: $nombre = "Julio"; break;
		case 8: $nombre = "Agosto"; break;
		case 9: $nombre = "Septiembre"; break;
		case 10: $nombre = "Octubre"; break;
		case 11: $nombre = "Noviembre"; break;
		case 12: $nombre = "Diciembre"; break;
	endswitch;	
	return $nombre; 
} 

function idioma() {
	$localizacion = localizacion();
	switch ($localizacion) {  
		case "br": $gacode = "pt"; break;	
		default:  $gacode = "es"; break;
	}
	return $gacode;
}
function locale() {
	$localizacion = localizacion();
	switch ($localizacion) {  
		case "br": $gacode = "pt_".strtoupper($localizacion); break;	
		default:  $gacode = "es_".strtoupper($localizacion); break;
	}
	return $gacode;
}

function peso_archivo($bytes, $decimals= 2) {
	$bytes = intval($bytes*1024);
    $size = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . " ". @$size[$factor];
}

function fecha($fecha,$tipo="normal") {
	// 0123-56-89
	switch($tipo):
		case "normal": $modo = "d-m-Y"; break;
		case "total": $modo = "d-m-Y H:i"; break;
		case "mysql_date": $modo = "Y-m-d"; break;
		case "mysql_datetime": $modo = "Y-m-d H:i:s"; break;
	endswitch;
	$fecha = ($fecha != "" && $fecha != "0000-00-00" && $fecha != "0000-00-00 00:00:00" && $fecha != NULL) ? date($modo,strtotime($fecha)) : "";
	return $fecha;
	
}

function hora ($hora) {
	return substr($hora,0,5);	
}

function currency($number) {
		return "$".number_format($number,0,',','.');
	
}
function generarCodigoTransaccional($length=35,$uc=TRUE,$n=TRUE,$sc=FALSE,$min=TRUE)	{
		if($min==1)  $source  = 'abcdefghijklmnopqrstuvwxyz'; 
		 if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		 if($n==1)  $source .= '1234567890';
		 if($sc==1) $source .= '-';
		 if($length>0)			 {
			 $rstr = "";
			 $source = str_split($source,1);
			 for($i=1; $i<=$length; $i++)				 {
				mt_srand((double)microtime() * 100000000);
				 $num  = mt_rand(1,count($source));
				$rstr .= $source[$num-1];
			 }
		}
		return $rstr;
}


function ConvertDateToMysqlFormat($dateStr){
	@list($datePt, $timePt) = explode(" ", $dateStr);
	$arDatePt = explode(EW_DATE_SEPARATOR, $datePt);
	if ($dateStr == ''): return '0000'.EW_DATE_SEPARATOR.'00'.EW_DATE_SEPARATOR.'00'; endif;
	if (count($arDatePt) == 3) {
		switch (DEFAULT_DATE_FORMAT) {
		case "yyyy" . EW_DATE_SEPARATOR . "mm" . EW_DATE_SEPARATOR . "dd":
		    list($year, $month, $day) = $arDatePt;
		    break;
		case "mm" . EW_DATE_SEPARATOR . "dd" . EW_DATE_SEPARATOR . "yyyy":
		    list($month, $day, $year) = $arDatePt;
		    break;
		case "dd" . EW_DATE_SEPARATOR . "mm" . EW_DATE_SEPARATOR . "yyyy":
		    list($day, $month, $year) = $arDatePt;
		    break;
		}
		return trim($year . "-" . $month . "-" . $day . " " . $timePt);
	} else {
		return $dateStr;
	}
}
function icon_file($ext) {
	$ext = strtolower($ext);
	
	if (in_array($ext, array(".jpg",".png",".jpeg",".gif",".tiff",".bmp"))):
		$tipo = "image";
	elseif(in_array($ext,array(".mp4",".mpg",".avi",".mpeg",".ogg",".mov"))) :
		$tipo = "video";
	elseif(in_array($ext,array(".doc",".docx",".ppt",".pptx",".txt"))): 
		$tipo = "text";
	elseif(in_array($ext,array(".xls",".xlsx"))):
		$tipo = "excel";
	else: 
		$tipo = $ext;
	endif;
	
	
	switch ($tipo):
		case ".pdf": $ico = "fa-file-pdf-o"; break;
		case "image": $ico = "fa-file-image-o"; break;
		case "video": $ico = "fa-file-video-o"; break;
		case "text": $ico = "fa-file-text-o"; break;
		case "excel": $ico = "fa-file-excel-o"; break;
		default: $ico = "fa-file-pdf-o";
	endswitch;
	return $ico;
	
}

function getIP() {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif (isset($_SERVER['HTTP_VIA'])) {
       $ip = $_SERVER['HTTP_VIA'];
    }
    elseif (isset($_SERVER['REMOTE_ADDR'])) {
       $ip = $_SERVER['REMOTE_ADDR'];
    }
    else {
       $ip = "unknown";
    }
   
    return $ip;
}

function get_template($tipo = "modulos") {
	
	$array["modulos"] = array(7,3,8,2,11,10);
	$array["templates"] = array(1,4,5,6,9);	
	return $array[$tipo];
	
}
function icotpl($tipo) {
	switch ($tipo):
	
		// --- Templates
		case "fotovideo": // 1
			$ico = '<div class="tpl '.$tipo.' popovers" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura de 2 y 3 columnas para listar imágenes." data-original-title="Template Foto o Video"></div>  ';
		break;
		
		case "video": // 4
			$ico = '<div class="tpl '.$tipo.' popovers" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura de 4 columnas para listar videos." data-original-title="Template Video con detalle"></div>  ';
		break;
		case "enlaces": // 5
			$ico = '<div class="tpl '.$tipo.' popovers" data-container="body" data-trigger="hover" data-placement="right" data-content="Opción para agregar enlace." data-original-title="Template Enlaces"></div>  ';
		break;		
		case "descargas": // 6
			$ico = '<div class="tpl '.$tipo.' popovers" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura de tabla para cargar archivos." data-original-title="Template Descargas"></div>  ';
		break;
			
		case "wysiwyg": // 9
			$ico = '<div class="tpl '.$tipo.' popovers" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura con editor enriquecido." data-original-title="Template Libre"></div>  ';
		break;
		
		// --- Modulos
		case "novedades": // 7
			$ico = '<div class="tpl '.$tipo.' popovers" data-html="true" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura de 2 y 3 columnas para cargar novedades." data-original-title="Módulo Novedades"></div>  ';
		break;
	
		case "eventos": // 3
			$ico = '<div class="tpl '.$tipo.' popovers" data-html="true" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura de 2 y 3 columnas para eventos con detalles e invitación" data-original-title="Módulo Eventos"></div>  ';
		break;	
		case "calendario":// 8
			$ico = '<div class="tpl '.$tipo.' popovers" data-html="true" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura de listado de eventos sin detalle." data-original-title="Módulo listado calendario"></div>  ';
		break;	
		
		case "incentivo": // 2
			$ico = '<div class="tpl '.$tipo.' popovers" data-html="true" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura para programas de incentivo" data-original-title="Módulo Programas de incentivo"></div>  ';
		break;	
		
		case "pop": // 11
			$ico = '<div class="tpl '.$tipo.' popovers" data-html="true" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura mini tienda para productos corporativos" data-original-title="Módulo Material POP"></div>  ';
		break;
		
		case "promociones": //10
			$ico = '<div class="tpl '.$tipo.' popovers" data-html="true" data-container="body" data-trigger="hover" data-placement="right" data-content="Estructura para cargar Promociones y documentación." data-original-title="Módulo Promociones"></div>  ';
		break;
		
		
	endswitch;	
	return $ico;
	
}
/**
 * adjust brightness of a colour
 * not the best way to do it but works well enough here
 *
 * @param type $hex
 * @param type $steps
 * @return type
 */
	 
 
function bm_sanitize_hex_color( $color ) {

	if ( '' === $color ) {
		return '';
	}

	// make sure the color starts with a hash
	$color = '#' . ltrim( $color, '#' );

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return null;

}

function bm_adjust_colour_brightness( $hex, $steps ) {

	$steps = max( -255, min( 255, $steps ) );

	$hex = str_replace( '#', '', $hex );
	if ( strlen( $hex ) == 3 ) {
		$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1), 2 );
	}

	$color_parts = str_split( $hex, 2 );
	$return = '#';

	foreach ( $color_parts as $color ) {
		$color = hexdec( $color );
		$color = max( 0, min( 255, $color + $steps ) );
		$return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT );
	}

	return bm_sanitize_hex_color( $return );

}

/**
 * Calculate whether black or white is best for readability based upon the brightness of specified colour
 *
 * @param type $hex
 */
function bm_readable_colour( $hex ) {

	$hex = str_replace( '#', '', $hex );
	if ( strlen( $hex ) == 3 ) {
		$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1), 2 );
	}

	$color_parts = str_split( $hex, 2 );

	$brightness = ( hexdec( $color_parts[0] ) * 0.299 ) + ( hexdec( $color_parts[1] ) * 0.587 ) + ( hexdec( $color_parts[2] ) * 0.114 );

	if ( $brightness > 128 ) {
		return '#000';
	} else {
		return '#fff';
	}

}




?>