<?php
define("DEFAULT_CURRENCY_SYMBOL", "$");
define("DEFAULT_MON_DECIMAL_POINT", ".");
define("DEFAULT_MON_THOUSANDS_SEP", ",");
define("DEFAULT_POSITIVE_SIGN", "");
define("DEFAULT_NEGATIVE_SIGN", "-");
define("DEFAULT_FRAC_DIGITS", 2);
define("DEFAULT_P_CS_PRECEDES", true);
define("DEFAULT_P_SEP_BY_SPACE", false);
define("DEFAULT_N_CS_PRECEDES", true);
define("DEFAULT_N_SEP_BY_SPACE", false);
define("DEFAULT_P_SIGN_POSN", 3);
define("DEFAULT_N_SIGN_POSN", 3);


define("DEFAULT_DATE_FORMAT", "dd-mm-yyyy");
define("EW_DATE_SEPARATOR","-");
 
//KEYMAPS


// fecha larga a normal

// Asignar la letra de la respuesta
function GetLetraRespuesta($numero){
	$LETRAS = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 	
	return substr($LETRAS,intval($numero-1),1);
}
function longDate($date) {
	$fecha = substr($date,8,2)."-".substr($date,5,2)."-".substr($date,0,4). " ".substr($date,11,8);
	return $fecha;
	
}
//-------------------------------------------------------------------------------
// Functions for default date format
// FormatDateTime
/*
Format a timestamp, datetime, date or time field from MySQL
$namedformat:
0 - General Date,
1 - Long Date,
2 - Short Date (Default),
3 - Long Time,
4 - Short Time,
5 - Short Date (yyyy/mm/dd),
6 - Short Date (mm/dd/yyyy),
7 - Short Date (dd/mm/yyyy)
*/

// Convert a date to MySQL format
function ConvertDateToMysqlFormat($dateStr)
{
	@list($datePt, $timePt) = explode(" ", $dateStr);
	$arDatePt = explode(EW_DATE_SEPARATOR, $datePt);
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

function FormatDateTime($ts, $namedformat)
{
  $DefDateFormat = str_replace("yyyy", "%Y", DEFAULT_DATE_FORMAT);
	$DefDateFormat = str_replace("mm", "%m", $DefDateFormat);
	$DefDateFormat = str_replace("dd", "%d", $DefDateFormat);
	if (is_numeric($ts)) // timestamp
	{
		switch (strlen($ts)) {
			case 14:
			    $patt = '/(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/';
			    break;
			case 12:
			    $patt = '/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/';
			    break;
			case 10:
			    $patt = '/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/';
			    break;
			case 8:
			    $patt = '/(\d{4})(\d{2})(\d{2})/';
			    break;
			case 6:
			    $patt = '/(\d{2})(\d{2})(\d{2})/';
			    break;
			case 4:
			    $patt = '/(\d{2})(\d{2})/';
			    break;
			case 2:
			    $patt = '/(\d{2})/';
			    break;
			default:
					return $ts;
		}
		if ((isset($patt))&&(preg_match($patt, $ts, $matches)))
		{
			$year = $matches[1];
			$month = @$matches[2];
			$day = @$matches[3];
			$hour = @$matches[4];
			$min = @$matches[5];
			$sec = @$matches[6];
		}
		if (($namedformat==0)&&(strlen($ts)<10)) $namedformat = 2;
	}
	elseif (is_string($ts))
	{
		if (preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/', $ts, $matches)) // datetime
		{
			$year = $matches[1];
			$month = $matches[2];
			$day = $matches[3];
			$hour = $matches[4];
			$min = $matches[5];
			$sec = $matches[6];
		}
		elseif (preg_match('/(\d{4})-(\d{2})-(\d{2})/', $ts, $matches)) // date
		{
			$year = $matches[1];
			$month = $matches[2];
			$day = $matches[3];
			if ($namedformat==0) $namedformat = 2;
		}
		elseif (preg_match('/(^|\s)(\d{2}):(\d{2}):(\d{2})/', $ts, $matches)) // time
		{
			$hour = $matches[2];
			$min = $matches[3];
			$sec = $matches[4];
			if (($namedformat==0)||($namedformat==1)) $namedformat = 3;
			if ($namedformat==2) $namedformat = 4;
		}
		else
		{
			return $ts;
		}
	}
	else
	{
		return $ts;
	}
	if (!isset($year)) $year = 0; // dummy value for times
	if (!isset($month)) $month = 1;
	if (!isset($day)) $day = 1;
	if (!isset($hour)) $hour = 0;
	if (!isset($min)) $min = 0;
	if (!isset($sec)) $sec = 0;
	$uts = @mktime($hour, $min, $sec, $month, $day, $year);
	if ($uts < 0) { // failed to convert
		$year = substr_replace("0000", $year, -1 * strlen($year));
		$month = substr_replace("00", $month, -1 * strlen($month));
		$day = substr_replace("00", $day, -1 * strlen($day));
		$hour = substr_replace("00", $hour, -1 * strlen($hour));
		$min = substr_replace("00", $min, -1 * strlen($min));
		$sec = substr_replace("00", $sec, -1 * strlen($sec));
		$DefDateFormat = str_replace("yyyy", $year, DEFAULT_DATE_FORMAT);
		$DefDateFormat = str_replace("mm", $month, $DefDateFormat);
		$DefDateFormat = str_replace("dd", $day, $DefDateFormat);
		switch ($namedformat) {
			case 0:
			    return $DefDateFormat." $hour:$min:$sec";
			    break;
			case 1://unsupported, return general date
			    return $DefDateFormat." $hour:$min:$sec";
			    break;
			case 2:
			    return $DefDateFormat;
			    break;
			case 3:
					if (intval($hour)==0)
						return "12:$min:$sec AM";
					elseif (intval($hour)>0 && intval($hour)<12)
						return "$hour:$min:$sec AM";
					elseif (intval($hour)==12)
						return "$hour:$min:$sec PM";
					elseif (intval($hour)>12 && intval($hour)<=23)
						return (intval($hour)-12).":$min:$sec PM";
					else
						return "$hour:$min:$sec";
			    break;
			case 4:
			    return "$hour:$min:$sec";
			    break;
			case 5:
			    return "$year". EW_DATE_SEPARATOR . "$month" . EW_DATE_SEPARATOR . "$day";
			    break;
			case 6:
			    return "$month". EW_DATE_SEPARATOR ."$day" . EW_DATE_SEPARATOR . "$year";
			    break;
			case 7:
			    return "$day" . EW_DATE_SEPARATOR ."$month" . EW_DATE_SEPARATOR . "$year";
			    break;
		}
	} else {
		switch ($namedformat) {
			case 0:
			    return strftime($DefDateFormat." %H:%M:%S", $uts);
			    break;
			case 1:
			    return strftime("%A, %B %d, %Y", $uts);
			    break;
			case 2:
			    return strftime($DefDateFormat, $uts);
			    break;
			case 3:
			    return strftime("%I:%M:%S %p", $uts);
			    break;
			case 4:
			    return strftime("%H:%M:%S", $uts);
			    break;
			case 5:
			    return strftime("%Y" . EW_DATE_SEPARATOR . "%m" . EW_DATE_SEPARATOR . "%d", $uts);
			    break;
			case 6:
			    return strftime("%m" . EW_DATE_SEPARATOR . "%d" . EW_DATE_SEPARATOR . "%Y", $uts);
			    break;
			case 7:
			    return strftime("%d" . EW_DATE_SEPARATOR . "%m" . EW_DATE_SEPARATOR . "%Y", $uts);
			    break;
		}
	}
}
//-------------------------------------------------------------------------------
// Function for debug
function Trace($aMsg)
{
	$ts = fopen ("debug.txt","a+");
	$ts.file_put_contents($aMsg);
	$ts.fclose;
}
?>
<?php
// FormatCurrency
/*
FormatCurrency(Expression[,NumDigitsAfterDecimal [,IncludeLeadingDigit
 [,UseParensForNegativeNumbers [,GroupDigits]]]])
NumDigitsAfterDecimal is the numeric value indicating how many places to the
right of the decimal are displayed
-1 Use Default
The IncludeLeadingDigit, UseParensForNegativeNumbers, and GroupDigits
arguments have the following settings:
-1 True
0 False
-2 Use Default
*/
function FormatCurrency($amount, $NumDigitsAfterDecimal, $IncludeLeadingDigit, $UseParensForNegativeNumbers, $GroupDigits)
{

	// export the values returned by localeconv into the local scope
	if (function_exists("localeconv")) extract(localeconv());

	// set defaults if locale is not set
	if (empty($currency_symbol)) $currency_symbol = DEFAULT_CURRENCY_SYMBOL;
	if (empty($mon_decimal_point)) $mon_decimal_point = DEFAULT_MON_DECIMAL_POINT;
	if (empty($mon_thousands_sep)) $mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	if (empty($positive_sign)) $positive_sign = DEFAULT_POSITIVE_SIGN;
	if (empty($negative_sign)) $negative_sign = DEFAULT_NEGATIVE_SIGN;
	if (empty($frac_digits) || $frac_digits == CHAR_MAX) $frac_digits = DEFAULT_FRAC_DIGITS;
	if (empty($p_cs_precedes) || $p_cs_precedes == CHAR_MAX) $p_cs_precedes = DEFAULT_P_CS_PRECEDES;
	if (empty($p_sep_by_space) || $p_sep_by_space == CHAR_MAX) $p_sep_by_space = DEFAULT_P_SEP_BY_SPACE;
	if (empty($n_cs_precedes) || $n_cs_precedes == CHAR_MAX) $n_cs_precedes = DEFAULT_N_CS_PRECEDES;
	if (empty($n_sep_by_space) || $n_sep_by_space == CHAR_MAX) $n_sep_by_space = DEFAULT_N_SEP_BY_SPACE;
	if (empty($p_sign_posn) || $p_sign_posn == CHAR_MAX) $p_sign_posn = DEFAULT_P_SIGN_POSN;
	if (empty($n_sign_posn) || $n_sign_posn == CHAR_MAX) $n_sign_posn = DEFAULT_N_SIGN_POSN;

	// check $NumDigitsAfterDecimal
	if ($NumDigitsAfterDecimal > -1)
		$frac_digits = $NumDigitsAfterDecimal;

	// check $UseParensForNegativeNumbers
	if ($UseParensForNegativeNumbers == -1) {
		$n_sign_posn = 0;
		if ($p_sign_posn == 0) {
			if (DEFAULT_P_SIGN_POSN != 0)
				$p_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$p_sign_posn = 3;
		}
	} elseif ($UseParensForNegativeNumbers == 0) {
		if ($n_sign_posn == 0)
			if (DEFAULT_P_SIGN_POSN != 0)
				$n_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$n_sign_posn = 3;
	}

	// check $GroupDigits
	if ($GroupDigits == -1) {
		$mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	} elseif ($GroupDigits == 0) {
		$mon_thousands_sep = "";
	}

	// start by formatting the unsigned number
	$number = number_format(abs($amount),
	                        $frac_digits,
	                        $mon_decimal_point,
	                        $mon_thousands_sep);

	// check $IncludeLeadingDigit
	if ($IncludeLeadingDigit == 0) {
		if (substr($number, 0, 2) == "0.")
			$number = substr($number, 1, strlen($number)-1);
	}
	if ($amount < 0) {
		$sign = $negative_sign;

		// "extracts" the boolean value as an integer
		$n_cs_precedes  = intval($n_cs_precedes  == true);
		$n_sep_by_space = intval($n_sep_by_space == true);
		$key = $n_cs_precedes . $n_sep_by_space . $n_sign_posn;
	} else {
		$sign = $positive_sign;
		$p_cs_precedes  = intval($p_cs_precedes  == true);
		$p_sep_by_space = intval($p_sep_by_space == true);
		$key = $p_cs_precedes . $p_sep_by_space . $p_sign_posn;
	}
	$formats = array(

      // currency symbol is after amount

      // no space between amount and sign
      '000' => '(%s' . $currency_symbol . ')',
      '001' => $sign . '%s ' . $currency_symbol,
      '002' => '%s' . $currency_symbol . $sign,
      '003' => '%s' . $sign . $currency_symbol,
      '004' => '%s' . $sign . $currency_symbol,

      // one space between amount and sign
      '010' => '(%s ' . $currency_symbol . ')',
      '011' => $sign . '%s ' . $currency_symbol,
      '012' => '%s ' . $currency_symbol . $sign,
      '013' => '%s ' . $sign . $currency_symbol,
      '014' => '%s ' . $sign . $currency_symbol,

      // currency symbol is before amount

      // no space between amount and sign
      '100' => '(' . $currency_symbol . '%s)',
      '101' => $sign . $currency_symbol . '%s',
      '102' => $currency_symbol . '%s' . $sign,
      '103' => $sign . $currency_symbol . '%s',
      '104' => $currency_symbol . $sign . '%s',

      // one space between amount and sign
      '110' => '(' . $currency_symbol . ' %s)',
      '111' => $sign . $currency_symbol . ' %s',
      '112' => $currency_symbol . ' %s' . $sign,
      '113' => $sign . $currency_symbol . ' %s',
      '114' => $currency_symbol . ' ' . $sign . '%s');

  // lookup the key in the above array
	return sprintf($formats[$key], $number);
}

// FormatNumber
/*
FormatNumber(Expression[,NumDigitsAfterDecimal [,IncludeLeadingDigit
	[,UseParensForNegativeNumbers [,GroupDigits]]]])
NumDigitsAfterDecimal is the numeric value indicating how many places to the
right of the decimal are displayed
-1 Use Default
The IncludeLeadingDigit, UseParensForNegativeNumbers, and GroupDigits
arguments have the following settings:
-1 True
0 False
-2 Use Default
*/
function FormatNumber($amount, $NumDigitsAfterDecimal, $IncludeLeadingDigit, $UseParensForNegativeNumbers, $GroupDigits)
{

  // export the values returned by localeconv into the local scope
  if (function_exists("localeconv")) extract(localeconv());

	// set defaults if locale is not set
	if (empty($currency_symbol)) $currency_symbol = DEFAULT_CURRENCY_SYMBOL;
	if (empty($mon_decimal_point)) $mon_decimal_point = DEFAULT_MON_DECIMAL_POINT;
	if (empty($mon_thousands_sep)) $mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	if (empty($positive_sign)) $positive_sign = DEFAULT_POSITIVE_SIGN;
	if (empty($negative_sign)) $negative_sign = DEFAULT_NEGATIVE_SIGN;
	if (empty($frac_digits) || $frac_digits == CHAR_MAX) $frac_digits = DEFAULT_FRAC_DIGITS;
	if (empty($p_cs_precedes) || $p_cs_precedes == CHAR_MAX) $p_cs_precedes = DEFAULT_P_CS_PRECEDES;
	if (empty($p_sep_by_space) || $p_sep_by_space == CHAR_MAX) $p_sep_by_space = DEFAULT_P_SEP_BY_SPACE;
	if (empty($n_cs_precedes) || $n_cs_precedes == CHAR_MAX) $n_cs_precedes = DEFAULT_N_CS_PRECEDES;
	if (empty($n_sep_by_space) || $n_sep_by_space == CHAR_MAX) $n_sep_by_space = DEFAULT_N_SEP_BY_SPACE;
	if (empty($p_sign_posn) || $p_sign_posn == CHAR_MAX) $p_sign_posn = DEFAULT_P_SIGN_POSN;
	if (empty($n_sign_posn) || $n_sign_posn == CHAR_MAX) $n_sign_posn = DEFAULT_N_SIGN_POSN;

	// check $NumDigitsAfterDecimal
	if ($NumDigitsAfterDecimal > -1)
		$frac_digits = $NumDigitsAfterDecimal;

	// check $UseParensForNegativeNumbers
	if ($UseParensForNegativeNumbers == -1) {
		$n_sign_posn = 0;
		if ($p_sign_posn == 0) {
			if (DEFAULT_P_SIGN_POSN != 0)
				$p_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$p_sign_posn = 3;
		}
	} elseif ($UseParensForNegativeNumbers == 0) {
		if ($n_sign_posn == 0)
			if (DEFAULT_P_SIGN_POSN != 0)
				$n_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$n_sign_posn = 3;
	}

	// check $GroupDigits
	if ($GroupDigits == -1) {
		$mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	} elseif ($GroupDigits == 0) {
		$mon_thousands_sep = "";
	}

  // start by formatting the unsigned number
  $number = number_format(abs($amount),
                          $frac_digits,
                          $mon_decimal_point,
                          $mon_thousands_sep);

	// check $IncludeLeadingDigit
	if ($IncludeLeadingDigit == 0) {
		if (substr($number, 0, 2) == "0.")
			$number = substr($number, 1, strlen($number)-1);
	}
	if ($amount < 0) {
		$sign = $negative_sign;
		$key = $n_sign_posn;
	} else {
		$sign = $positive_sign;
		$key = $p_sign_posn;
	}
	$formats = array(
		'0' => '(%s)',
		'1' => $sign . '%s',
		'2' => $sign . '%s',
		'3' => $sign . '%s',
		'4' => $sign . '%s');

	// lookup the key in the above array
	return sprintf($formats[$key], $number);
}

// FormatPercent
/*
FormatPercent(Expression[,NumDigitsAfterDecimal [,IncludeLeadingDigit
	[,UseParensForNegativeNumbers [,GroupDigits]]]])
NumDigitsAfterDecimal is the numeric value indicating how many places to the
right of the decimal are displayed
-1 Use Default
The IncludeLeadingDigit, UseParensForNegativeNumbers, and GroupDigits
arguments have the following settings:
-1 True
0 False
-2 Use Default
*/
function FormatPercent($amount, $NumDigitsAfterDecimal, $IncludeLeadingDigit, $UseParensForNegativeNumbers, $GroupDigits)
{

  // export the values returned by localeconv into the local scope
  if (function_exists("localeconv")) extract(localeconv());

	// set defaults if locale is not set
	if (empty($currency_symbol)) $currency_symbol = DEFAULT_CURRENCY_SYMBOL;
	if (empty($mon_decimal_point)) $mon_decimal_point = DEFAULT_MON_DECIMAL_POINT;
	if (empty($mon_thousands_sep)) $mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	if (empty($positive_sign)) $positive_sign = DEFAULT_POSITIVE_SIGN;
	if (empty($negative_sign)) $negative_sign = DEFAULT_NEGATIVE_SIGN;
	if (empty($frac_digits) || $frac_digits == CHAR_MAX) $frac_digits = DEFAULT_FRAC_DIGITS;
	if (empty($p_cs_precedes) || $p_cs_precedes == CHAR_MAX) $p_cs_precedes = DEFAULT_P_CS_PRECEDES;
	if (empty($p_sep_by_space) || $p_sep_by_space == CHAR_MAX) $p_sep_by_space = DEFAULT_P_SEP_BY_SPACE;
	if (empty($n_cs_precedes) || $n_cs_precedes == CHAR_MAX) $n_cs_precedes = DEFAULT_N_CS_PRECEDES;
	if (empty($n_sep_by_space) || $n_sep_by_space == CHAR_MAX) $n_sep_by_space = DEFAULT_N_SEP_BY_SPACE;
	if (empty($p_sign_posn) || $p_sign_posn == CHAR_MAX) $p_sign_posn = DEFAULT_P_SIGN_POSN;
	if (empty($n_sign_posn) || $n_sign_posn == CHAR_MAX) $n_sign_posn = DEFAULT_N_SIGN_POSN;

	// check $NumDigitsAfterDecimal
	if ($NumDigitsAfterDecimal > -1)
		$frac_digits = $NumDigitsAfterDecimal;

	// check $UseParensForNegativeNumbers
	if ($UseParensForNegativeNumbers == -1) {
		$n_sign_posn = 0;
		if ($p_sign_posn == 0) {
			if (DEFAULT_P_SIGN_POSN != 0)
				$p_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$p_sign_posn = 3;
		}
	} elseif ($UseParensForNegativeNumbers == 0) {
		if ($n_sign_posn == 0)
			if (DEFAULT_P_SIGN_POSN != 0)
				$n_sign_posn = DEFAULT_P_SIGN_POSN;
			else
				$n_sign_posn = 3;
	}

	// check $GroupDigits
	if ($GroupDigits == -1) {
		$mon_thousands_sep = DEFAULT_MON_THOUSANDS_SEP;
	} elseif ($GroupDigits == 0) {
		$mon_thousands_sep = "";
	}

	// start by formatting the unsigned number
	$number = number_format(abs($amount)*100,
	                        $frac_digits,
	                        $mon_decimal_point,
	                        $mon_thousands_sep);

	// check $IncludeLeadingDigit
	if ($IncludeLeadingDigit == 0) {
		if (substr($number, 0, 2) == "0.")
			$number = substr($number, 1, strlen($number)-1);
	}
	if ($amount < 0) {
		$sign = $negative_sign;
		$key = $n_sign_posn;
	} else {
		$sign = $positive_sign;
		$key = $p_sign_posn;
	}
	$formats = array(
		'0' => '(%s%%)',
		'1' => $sign . '%s%%',
		'2' => $sign . '%s%%',
		'3' => $sign . '%s%%',
		'4' => $sign . '%s%%');

  // lookup the key in the above array
	return sprintf($formats[$key], $number);
}

function ewUploadPath($parm)
{
	global $ffile;


$delim = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? "\\" : "/";

	if ($parm == 0) {
		
		$ewUploadPath = "../uploads/";
	} else {
		/*
		$ewUploadPath = ewScriptFileName();
		$ewUploadPath = str_replace("\\\\","\\",dirname($ewUploadPath));
		$ewUploadPath .= $delim . "../../uploads/";
		$ewUploadPath = str_replace("/", $delim, $ewUploadPath);
		*/
		$ewUploadPath = "../uploads/";
	}

	// Customize the upload path here
	// Check the last delimiter
	if ($parm == 0) {
		if ($ewUploadPath <> "" && substr($ewUploadPath, -1) <> "/") { $ewUploadPath .= "/"; } 
	} else {
		if (substr($ewUploadPath, -1) <> $delim) { $ewUploadPath .= $delim; }
	}

	return $ewUploadPath; 
}
function toName($cadena){
       $tofind = array("-","_",".php");
       $replac = array(" "," ","");
       return(str_replace($tofind,$replac,$cadena));
}

function ewUploadFileName($sFileName,$table='',$campo='',$codigo=''){
	
	$tipo = $table;

	// Amend your logic here
	if ($tipo != "" && $campo != "") {
		$id = intval(getField("AUTO_INCREMENT"," `information_schema`.`TABLES` WHERE `TABLE_NAME`= '".$tipo."'  AND TABLE_SCHEMA = '".DB."' "));
 		if ($id =="" && $codigo =='') {
				$id=intval(getField("COUNT(".$campo.")","".$tipo."")+1);
		}
		if ($codigo !="") {
			$id=$codigo;
		}

		$sOutFileName = $campo."_".$id.substr($sFileName,-4,4);
	} else {
		$sOutFileName = $sFileName;
	}
	//die( $sOutFileName);
	// Return computed output file name
	return $sOutFileName;
}

function ewScriptFileName() {


	$sScriptFileName = @$_ENV["SCRIPT_FILENAME"];
	if (empty($sScriptFileName)) {$sScriptFileName = @$_SERVER["SCRIPT_FILENAME"];}
	if (empty($sScriptFileName)) {$sScriptFileName = @$_ENV["PATH_TRANSLATED"];}
	if (empty($sScriptFileName)) {$sScriptFileName = @$_SERVER["PATH_TRANSLATED"];}
	if (empty($sScriptFileName)) {$sScriptFileName = @$_ENV["ORIG_PATH_TRANSLATED"];}
	if (empty($sScriptFileName)) {$sScriptFileName = @$_SERVER["ORIG_PATH_TRANSLATED"];}
	if (empty($sScriptFileName)) {die("Path of script not found. You can use phpinfo() to find the correct environment/server variable on your server and modify the function ewScriptFileName() in phpmkrfn.php. The variable should return the full path of the script.");}
	return $sScriptFileName;
}
?>
<?php
// Function to Load Email Content from input file name
// - Content Loaded to the following variables
// - Subject: sEmailSubject
// - From: sEmailFrom
// - To: sEmailTo
// - Cc: sEmailCc
// - Bcc: sEmailBcc
// - Format: sEmailFormat
// - Content: sEmailContent
//
function LoadEmail($fn)
{

	global $sEmailSubject;
	global $sEmailFrom;
	global $sEmailTo;
	global $sEmailCc;
	global $sEmailBcc;
	global $sEmailFormat;
	global $sEmailContent;

	$sWrk = LoadTxt($fn); // Load text file content
	if ($sWrk <> "") {
		// Locate Header & Mail Content
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
			$i = strpos($sWrk, "\r\n\r\n");
		}else {
			$i = strpos($sWrk, "\n\n");
			if ($i === false) $i = strpos($sWrk, "\r\n\r\n");
		}
		if ($i > 0) {
			$sHeader = substr($sWrk, 0, $i);
			$sEmailContent = trim(substr($sWrk, $i, strlen($sWrk)));
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
				$arrHeader = explode("\r\n",$sHeader);
			} else {
				$arrHeader = explode("\n",$sHeader);
			}
			for ($j = 0; $j < count($arrHeader); $j++)
			{
				$i = strpos($arrHeader[$j], ":");
				if ($i > 0) {
					$sName = trim(substr($arrHeader[$j], 0, $i));
					$sValue = trim(substr($arrHeader[$j], $i+1, strlen($arrHeader[$j])));
					switch (strtolower($sName))
					{
						case "subject": $sEmailSubject = $sValue;
												break;
						case "from": $sEmailFrom = $sValue;
												break;
						case "to": $sEmailTo = $sValue;
												break;
						case "cc": $sEmailCc = $sValue;
												break;
						case "bcc": $sEmailBcc = $sValue;
												break;
						case "format": $sEmailFormat = $sValue;
												break;
					}
				}
			}
		}
	}

}
 // Borrar directorio
function deleteAll($directory, $empty = false) {
    if(substr($directory,-1) == "/") {
        $directory = substr($directory,0,-1);
    }

    if(!file_exists($directory) || !is_dir($directory)) {
        return false;
    } elseif(!is_readable($directory)) {
        return false;
    } else {
        $directoryHandle = opendir($directory);
       
        while ($contents = readdir($directoryHandle)) {
            if($contents != '.' && $contents != '..') {
                $path = $directory . "/" . $contents;
               
                if(is_dir($path)) {
                    deleteAll($path);
                } else {
                    unlink($path);
                }
            }
        }
       
        closedir($directoryHandle);

        if($empty == false) {
            if(!rmdir($directory)) {
                return false;
            }
        }
       
        return true;
    }
} 
// Function to Load a Text File
function LoadTxt($fn)
{

	$filepath = str_replace("\\\\","\\",dirname(ewScriptFileName()));
	// Get text file content
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		$filepath .= "\\" . $fn;
	} else {
		$filepath .= "/" . $fn;		
	}
	$fobj = fopen ($filepath , "r");
	return fread ($fobj, filesize ($filepath));

}

// Function to Send out Email
function Send_Email ($sFrEmail, $FromName, $ReplyEmail, $ReplyName, $sToEmail, $sCcEmail, $sBccEmail, $sSubject, $sMail, $sFormat = "html") { 
	/* recipients */
	$to  = $sToEmail;

	/* subject */
	$subject = $sSubject;

	$headers = "";

	if ($sFormat == "html") {
		$content_type = "text/html";
	} else {
		$content_type = "text/plain";
	}

	$headers = "Content-type: " . $content_type . "\r\n";

	$message = $sMail;

	/* additional headers */
	$headers .= "From: " . $sFrEmail . "\r\n";
	if ($sCcEmail <> "") {
		$headers .= "Cc: " . $sCcEmail . "\r\n";
	}
	if ($sBccEmail <>"") {
		$headers .= "Bcc: " . $sBccEmail . "\r\n";
	}

	/* and now mail it */
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		ini_set("SMTP","localhost");
		ini_set("smtp_port","25");
	}
	ini_set("sendmail_from",$sFrEmail);
	mail($to, $subject, $message, $headers);

}

// Function to generate Value Separator based on current row count
// rowcnt - zero based row count
//
function ValueSeparator($rowcnt)
{
	return ", "; 
}

// Function to generate View Option Separator based on current row count (Multi-Select / CheckBox)
// rowcnt - zero based row count
//
function ViewOptionSeparator($rowcnt)
{
	return  ", ";
}

// Function to generate Edit Option Separator based on current row count (Radio / CheckBox)
// rowcnt - zero based row count
//
function EditOptionSeparator($rowcnt)
{
	return "&nbsp;";
}

// Function to truncate Memo Field based on specified length, string truncated to nearest space or CrLf
//
function TruncateMemo($str, $ln)
{
	if (strlen($str) > 0 && strlen($str) > $ln) {
		$k = 0;
		while ($k >= 0 && $k < strlen($str)){
			$i = strpos($str, " ", $k);
			$j = strpos($str,chr(10), $k);
			if ($i === false && $j === false) { // Not able to truncate
				return $str;
			} else {
				// Get nearest space or CrLf
				if ($i > 0 && $j > 0) {
					if ($i < $j) {
						$k = $i;
					}else{
						$k = $j;
					}
				}elseif ($i > 0) {
					$k = $i;
				}elseif ($j > 0) {
					$k = $j;
				}
				// Get truncated text
				if ($k >= $ln) {
					return substr($str, 0, $k) . "...";
				} else {
					$k ++;
				}
			}
		}
	} else {
		return $str;
	}
}


// Function escribir log
function LogThis($tabla,$accion,$keyid,$keyname,$fieldList) {
	if ($fieldList && is_array($fieldList)) {
		foreach ($fieldList as $key=>$temp) {
			$detalle .= "$key = ".mysql_escape_string($temp)."*+*";
		}
	} else {
		$detalle = $fieldList;	
	}
	$sql = "INSERT INTO log_sistema (tabla, accion, key_id, key_name, usuario, fecha, detalle) 
				VALUES ( '".$tabla."', '".$accion."', '".$keyid."', '".$keyname."', '".$_SESSION["calafan_User"]."',  CURRENT_TIMESTAMP, '".$detalle."');"; 

	query($sql,$GLOBALS["conn"]);
	
}



// Function get Record From a sql query
// 
function getField($field,$fromwhere) {
	global $conn;
	$rsql = "SELECT ".$field." FROM ".$fromwhere.""; 
//	echo $rsql;
	if ($conn) {
		$query = query($rsql,$conn);// or die($rsql);
		$rs = fetch_array($query);
		$field = $rs[0];
		return $field;
	
	}
}

// Function get IP CLIENTE
// 	
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
// Function SEND MAIL FROM CLASS SMTP.PHPMAILER
// 
//function Send_EmailO($sFrEmail, $FromName, $ReplyEmail, $ReplyName, $sToEmail, $sCcEmail, $sBccEmail, $sSubject, $sMail, $sFormat = "html", $userName="noreply.chile@hdlao.com",$password="1Cambio9",$server = "ssl://smtp.gmail.com"){

function Send_EmailO2($sFrEmail, $FromName, $ReplyEmail, $ReplyName, $sToEmail, $sCcEmail, $sBccEmail, $sSubject, $sMail, $sFormat = "html",  $userName="rec@bigzink.net",$password="sapolio",$server = "mail.bigzink.net"){
		$headers = "";
		$sFormat = "html";
		if ($sFormat == "html") {
			$content_type = "text/html";

		} else {

			$content_type = "text/plain";
		}
		$message = $sMail;
		$shtml=$headers.''.$message.''.$footermail;
		$mail = new PHPMailer();
		$mail->IsSMTP();                                   
		$mail->Host     =$server; 
		$mail->SMTPAuth = true;     
		$mail->Username = $userName;  
		$mail->Password = $password; 
		$mail->From = $sFrEmail;
		$mail->FromName = $FromName;
		$toemail = explode(",",$sToEmail);
		foreach ($toemail as $temp) {
			$mail->AddAddress($temp);
		}
		if ($sCcEmail != "") {
			$ccemail= explode(",",$sCcEmail);
			foreach ($ccemail as $temp) {
				$mail->AddCC($temp);
			}
		}
		if ($sBccEmail != "") {
			$mail->AddBCC ($sBccEmail);
		}

		$mail->AddReplyTo($ReplyEmail,$ReplyName);
		$mail->WordWrap = 50;       
		$mail->IsHTML(true);
		$mail->Subject  =  $sSubject;
		$mail->Body     =  "$shtml";
		$mail->AltBody  =  "";

		if(!$mail->Send()) {
			// multiple recipients
			$to  =  $sToEmail;
			// To send HTML mail, the Content-type header must be set

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			//$headers .= 'To: Paperplaneonline <ces@paperplaneonline.com>' . "\r\n";
			$headers .= 'From:'.$FromName.' <'.$sFrEmail.'>' . "\r\n";
			$headers .= 'Cc: '.$sCcEmail.'' . "\r\n";
			$headers .= 'Bcc: '.$sBccEmail.'' . "\r\n";

			// Mail it

			if (!mail($to,  $sSubject, $sMail, $headers)) {
				return false;
			} else {
				return true;
			}
		}else{
			return true;
		}
	}
// Function generate random code
// 
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

// generar codigo SEO a partir de un STRING

function CodeSEO($string) {
	$string = elimina_acentos($string);
	 $spacer = "-";
	 $string = trim($string);
	 $string = strtolower($string);
	 $string = trim(preg_replace("/[^ A-Za-z0-9_]/", " ", $string)); 
	 $string = preg_replace("/[ \t\n\r]+/", "-", $string);
	 $string = str_replace(" ", $spacer, $string);
	 $string = preg_replace("/[ -]+/", "-", $string);
	 return $string;   
}

function elimina_acentos($cadena){
	$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
	$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
	return(strtr($cadena,$tofind,$replac));
}

function MesNombre($mes) {
	$mes = intval($mes);
	switch($mes) {
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
		
	}
	
	return $nombre;
	
}

////////////////////////////////////////////////////////
// FUNCIONES PARA ORDENAR
////////////////////////////////////////////////////////


// cambiar Orden
function asignarOrden($movimiento,$tabla,$orden,$id,$nombre_clave = "codigo") {
	global $conn;
	//pregunto si alguien tiene ese orden para cambiarlo
	if ($movimiento == "up") {
		$orden_nuevo = intval($orden-1);
	} else {
		$orden_nuevo = intval($orden+1);		
	}
	$id_antiguo = getField($nombre_clave,$tabla." WHERE orden = '".$orden_nuevo."'");
	if ($id_antiguo != "" && $id_antiguo != NULL) {
		$orden_antiguo = $orden;
	}
	// Actualizar nuevo orden

	$sql = "UPDATE ".$tabla." set orden = '".$orden_nuevo."' WHERE ".$nombre_clave." = '".$id."' "; 
	query($sql,$conn);
	
	if ($id_antiguo != "" && $id_antiguo != NULL) {
		// Actualizar orden antiguo
		$sqlb = "UPDATE ".$tabla." set orden = '".$orden_antiguo."' WHERE ".$nombre_clave." = '".$id_antiguo."'  ";
		query($sqlb,$conn);
	}
}
// cambiar Orden
function asignarOrdenLevel2($movimiento,$tabla,$orden,$id,$nombre_clave = "codigo",$nombre_clave2='',$clave2='') {
	global $conn;
	//pregunto si alguien tiene ese orden para cambiarlo
	if ($movimiento == "up") {
		$orden_nuevo = intval($orden-1);
	} else {
		$orden_nuevo = intval($orden+1);		
	}
	$sqlold=$tabla." WHERE orden = '".$orden_nuevo."'  ";
	if ($nombre_clave2 != "") {
		$sqlold.= " AND ".$nombre_clave2."='".$clave2."'";	
	}
	$id_antiguo = getField($nombre_clave,$sqlold);
	if ($id_antiguo != "" && $id_antiguo != NULL) {
		$orden_antiguo = $orden;
	}
	// Actualizar nuevo orden
	$sql = "UPDATE ".$tabla." set orden = '".$orden_nuevo."' WHERE ".$nombre_clave." = '".$id."'  "; 
	if ($nombre_clave2 != "") {
		$sql.= " AND ".$nombre_clave2."='".$clave2."'";	
	}
	
	query($sql,$conn);
	echo $sql."<br>";
	
	if ($id_antiguo != "" && $id_antiguo != NULL) {
		// Actualizar orden antiguo
		$sqlb = "UPDATE ".$tabla." set orden = '".$orden_antiguo."' WHERE ".$nombre_clave." = '".$id_antiguo."'  ";
		if ($nombre_clave2 != "") {
			$sqlb.= " AND ".$nombre_clave2."='".$clave2."'";	
		}
		query($sqlb,$conn);
		echo $sqlb."<br>";
	}
}
// Reordenar toda la tabla desde 0
function asignarOrdenTabla($tabla,$reordenar="no",$where = "", $nombre_clave="id") {
	global $conn;
	$sql = "SELECT * FROM ".$tabla." where 1 "; 
	if ($reordenar == "si") {
		$sql.="  ";
	} 
	if ($where != "") {
		$sql.=" ".$where." ";
	}
	$sql.="order by orden asc ";	
	$query = query($sql,$conn);
	$count=0;
	while ($data = fetch_array($query)) {
		$count++;
		$sqlb = "update $tabla set orden = '$count' where ". $nombre_clave." = '".$data[ $nombre_clave]."'  "; 
		query($sqlb,$conn);

	}	
}

// Obtener nombre de imagenes recortadas
function obtenerNombreImagen($nombre_archivo,$ancho,$alto) {
	$lenstring = intval((strlen($nombre_archivo)-4));
	$nombre_final = substr($nombre_archivo,0,$lenstring)."_".$ancho."x".$alto."_".substr($nombre_archivo,-4,4);
	return $nombre_final;
}
// Cargar Interfaz de Idioma de sistema

function LoadLangSys($tabla,$idioma) {
	global $conn,$LSI; // LSI = Lenguaje de sistema interno
	$LSI[] = '';
	$sql = "SELECT campo, texto FROM idiomas_sistema
				WHERE idioma='".$idioma."' AND tabla = '".$tabla."' "; 
		//		echo $sql;
	$query = query($sql,$conn) or die(mysql_error()."<br><br>".$sql);
	while ($data = fetch_array($query)) {
		$LSI[$data["campo"]] = $data["texto"];
	}	
}

function createOptions($field,$caption,$fromwhere,$default='') {
	global $conn;
	$sql = "SELECT ".$field.",".$caption." FROM ".$fromwhere; 
	$query = query($sql,$conn);
	$select = '';
	while ($data = fetch_array($query)) {
		$select.='<option value="'.$data[$field].'" ';
		if ($data[$field] == $default) {
			$select.=' selected="selected" ';	
		}
		$select.='>'.$data[$caption].'</option>';		
	}	
	return $select;
}







 

// ---------------------------------------------------------------------------------
// ----------------------- EXCLUSIVO ----------------------------
// --------------------------------------------------------------------------------



// Perfiles de usuario

function listarAccesosAdmin($conn,$x_usuario) {
	
	$sqla = "SELECT * FROM administradores_menu 
				WHERE 
				codigo_padre = '0' 
			ORDER BY orden ASC "; 				
	$querya = query($sqla,$conn);
	
	//$PERFILES='<div style="width:350px;padding-left:50px"><input type="checkbox" name="checkbox11" value="checkbox" onClick="ChequearTodos(this);">&nbsp;Marcar todos</div>';
	$PERFILES.='<div style="float:left; width:230px;padding-left:30px;padding-right:15px;border-right:1px solid;">
	<h4>Acceso a secciones del menú:</h4><br>';
	while ($dataa = fetch_array($querya)) {
		$acceso = getField("usuario"," administradores_accesos WHERE codigo_referencial = '".$dataa["codigo"]."' and usuario = '".$x_usuario."' ");
		if ($acceso != "") {
			$checkthis = " checked "; 	
		} else {
			$checkthis = " "; 		
		}
		
		$PERFILES.='<input type="checkbox"  name="x_accesos[]" id="x_accesos[]"  value="'.$dataa["codigo"].'"  '.$checkthis.' > &nbsp; '.$dataa["nombre"].'<br /><br>';
		
	}
	$PERFILES.='</div></div>';
	echo $PERFILES;
}

function NotiMod($referencia,$id_referencia) {
	$sql = "INSERT INTO administradores_notificaciones (id, localizacion, id_distribuidor, distribuidor_usuario, referencia, id_referencia, estado)
				VALUES (NULL, '".$_SESSION["UDealerWCP_localizacion"]."', '".$_SESSION["UDealerWCP_id_distribuidor"] ."', '".$_SESSION["UDealerWCP_User"]."', '".$referencia."', '".$id_referencia."', '0');"; 
	
	query($sql,$GLOBALS["conn"]);
	
	
}

function detalleLog($str,$br) {
	$buscar = array("*+*");
	$reemplazar = array("$br");
	return str_replace($buscar,$reemplazar,strip_tags($str));
		
	
	
}

?>