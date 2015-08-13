<?php
require_once(dirname(dirname(__FILE__))."/config.inc.php");
require_once("lib_config.php");
ob_start();
if( ! session_id() )
	session_start();
//ini_set('date.timezone','Asia/Shanghai');
function connect_mysql() {
	global $link_id, $config;
	$link_id = @mysql_connect($config["db_server"]['host'], $config["db_server"]['user'], $config["db_server"]['pass']);
	mysql_query( 'SET CHARACTER SET utf8', $link_id );
}
function close_mysql() {
	global $link_id;
	mysql_close($link_id);
}
function loadsqlkey($array_s, $array_v){
	$str_key = "";
    	for ($i=0;$i<count($array_s);$i++){
    		$str_key .= "&" . $array_s[$i] . "=" . urlencode($array_v[$i]);
    	}
	return $str_key;	
}
connect_mysql();
if (!$link_id) {
	die("The Server is now very busy! Please try again later!");
}
mysql_select_db($config["db_server"]['db']);
mysql_query( 'SET CHARACTER SET utf8', $link_id );
function EncodeHTMLTag( $str )
{
	return str_replace("&amp;", "&", htmlspecialchars( trim($str), ENT_QUOTES ) );
	//return str_replace(",", "&#044", $newcode);
}
function DecodeHTMLTag( $str )
{
	return str_replace("&amp;", "&", $str);
}
if (!function_exists('htmlspecialchars_decode')) {
       function htmlspecialchars_decode($str, $options="") {
               $trans = get_html_translation_table(HTML_SPECIALCHARS, $options);
               $decode = ARRAY();
               foreach ($trans AS $char=>$entity) {
                       $decode[$entity] = $char;
               }
               $str = strtr($str, $decode);
               return $str;
       }
}

function CutStr( $str, $cut_length=15, $attStr='...')
{
	if( strlen($str)>$cut_length )
		return substr($str, 0, $cut_length-1).$attStr;
	return $str;
}

/*消息提醒*/
function Msg($status){
	switch ($status){
		case 1:
			$msg='增加成功!';
			break;
		case 2:
			$msg='增加失敗';
			break;
		case 3:
			$msg='更新成功!';
			break;
		case 4:
			$msg='更新失敗';
			break;
		case 5:
			$msg='刪除成功！';
			break;
		case 6:
			$msg='刪除失敗';
			break;
		default:
			$msg="操作失誤";
	}

	return $msg;
}
?>