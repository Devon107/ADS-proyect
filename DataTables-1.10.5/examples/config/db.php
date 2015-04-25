<?php
/////////////////////////////////
//http://blog.timersys.com/   //
///////////////////////////////
$GLOBALS['DB_IP'] = 'localhost';
$GLOBALS['DB_USER'] = 'root';
$GLOBALS['DB_PASS'] = '';
$GLOBALS['DB_NAME'] = 'ci';

//
// Database queries
//
function get_db_conn() {
@$conn = mysql_connect($GLOBALS['DB_IP'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);

@mysql_select_db($GLOBALS['DB_NAME'], $conn);
if (!$conn) {
echo "No pudo conectarse a la BD: " . mysql_error();
exit;
}

return $conn;
}

//PARA PROTEGER SQL INJECT
function cleanQuery($string)
{
if(get_magic_quotes_gpc())  // prevents duplicate backslashes
{
$string = stripslashes($string);
}
if (phpversion() >= '4.3.0')
{
$string = mysql_real_escape_string($string);
}
else
{
$string = mysql_escape_string($string);
}
return $string;
}
?>