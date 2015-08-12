<?php
$lifeTime =3600;  // 保存一天 
session_set_cookie_params($lifeTime); 
session_start();
//error reporting level
error_reporting(E_ERROR | E_WARNING | E_PARSE);
// automatic 
set_magic_quotes_runtime(0);
//prevent Cross Site Scripting
if (!defined('IN_CUHK'))
{
    die('Access Denied');
}

if(preg_replace("/https?:\/\/([^\/]+).*/i", "\\1", $HTTP_SERVER_VARS['HTTP_REFERER']) != $HTTP_SERVER_VARS['HTTP_HOST']) {
die("Access Denied");
}

//Prevent SQL injection
function addslashes_deep($value)
{
	return is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);
}
if(!get_magic_quotes_gpc())
{
	$_POST   = addslashes_deep($_POST);
	$_GET    = addslashes_deep($_GET);
	$_COOKIE = addslashes_deep($_COOKIE);
}
//check if login

if( ($_SESSION["admin_login"]|0)<=0&&$_SESSION["user_login"]=="")
{
    echo "<script language='javascript'>window.parent.location.href='../index.php';</script>";
	exit;
}

?>