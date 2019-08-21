<?php
function db_connect($HOST,$USER,$PASS,$DB,$PORT)
{
	$conn = mysql_connect($HOST . ":" . $PORT , $USER, $PASS);
	mysql_select_db($DB);
	mysql_query("SET NAMES utf8"); 
	return $conn;
}
function db_close($conn)
{
	mysql_close($conn); 
}
function query($strsql,$conn)
{
	$rs = mysql_query($strsql,$conn); // or die("Falló la ejecución de la consulta : " . error() . '<br>SQL: ' . $strsql);
	return $rs;
}
function num_rows($rs)
{
	return @mysql_num_rows($rs); 
}
function fetch_object($rs)
{
	return mysql_fetch_object($rs);
}
function fetch_array($rs)
{
	return mysql_fetch_array($rs);
}
function free_result($rs)
{
	@mysql_free_result($rs);
}
function data_seek($rs,$cnt) 
{
	@mysql_data_seek($rs, $cnt);
}
function error()
{
	return mysql_error();  
}

// prevent
function phpmkr_db_connect($HOST,$USER,$PASS,$DB,$PORT)
{
	$conn = mysql_connect($HOST . ":" . $PORT , $USER, $PASS);
	mysql_select_db($DB);
	return $conn;
}
function phpmkr_db_close($conn)
{
	mysql_close($conn);
}
function phpmkr_query($strsql,$conn)
{
	$rs = mysql_query($strsql,$conn);// or die("<h1>SQL:".$strsql."</h1>");

	return $rs;
}
function phpmkr_num_rows($rs)
{
	return @mysql_num_rows($rs); 
}
function phpmkr_fetch_array($rs)
{
	return mysql_fetch_array($rs);
}
function phpmkr_free_result($rs)
{
	@mysql_free_result($rs);
}
function phpmkr_data_seek($rs,$cnt)
{
	@mysql_data_seek($rs, $cnt);
}
function phpmkr_error()
{
	return mysql_error();
}
?>
<?php
define("HOST", "localhost");
define("PORT", 3306);
define("USER", "softon5_apps");
define("PASS", "S6W9w4mnsUbZkkeT");
define("DB", "softon5_myhd");  
define("ROOT", "http://".$_SERVER["HTTP_HOST"]."");
ini_set( "default_charset", "utf-8" ); 
ini_set( 'date.timezone', 'America/Santiago' );
?>