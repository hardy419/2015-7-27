<?php
define("SITE_ROOT", dirname(dirname(__FILE__))."/");

#===========================================================
# �t?��?���N��?

/*
 *  @function: ����?$_POST?�e��??�}?��?�z
 */
function my_addslashes($string, $force = 0) {
    if (!get_magic_quotes_gpc() || $force) {
        if (is_array($string)) {
            foreach($string as $key => $val) {
                $string[$key] = my_addslashes($val, $force);
            }
        } else {
            $string = addslashes($string);
        }
    }
    return $string;
}

function my_htmlspecialchars($string)
{
    return is_array($string) ? array_map('my_htmlspecialchars', $string) : htmlspecialchars($string,ENT_QUOTES);
}
function fck_editor($editor_name,$type,$value = '')
{
	global $config;
	load("fckeditor.php", "", "fckeditor", 0);
    $editor = new FCKeditor($editor_name);
    $editor->BasePath   = $config["base_url"].'fckeditor/';
    $editor->ToolbarSet = $type;
    $editor->Width      = '100%';
    $editor->Height     = '320';
    $editor->Value      = $value;
    $FCKeditor = $editor->CreateHtml();
	return $FCKeditor;
}

/*
 *  @function: ����?$_POST?�e��??�}?��?�z
 */
function my_post()
{
    return my_addslashes($_POST);
}

/*
 *  @function: ����?$_GET?�e��??�}?��?�z
 */
function my_get()
{
    return my_addslashes($_GET);
}

/*
 *  @function: ����?$_REQUEST?�e��??�}?��?�z
 */
function my_request($data='')
{
	$data = $data? $data: $_REQUEST;
	$request = array();
	foreach($data as $key => $vtmp) {
		if(is_array($vtmp))
		{
			$request[$key] = my_post($vtmp);

		} else {
			$request[$key] = fieldsclean($vtmp);
		}
	}
	return $request;
}

/*
 *  @function: ��������??$HTTP_RAW_POST_DATA
 */
function my_global_post($data=''){
	$data = $data? $data: $HTTP_RAW_POST_DATA;
	return $data;
}

/*
 *  @function: ����$_SESSION����?�u
 */
function get_session($symbol = "")
{
	global $config;
	$session = empty($symbol) ? $_SESSION : $_SESSION[$config['sess_cookie_name']][$symbol];
	return $session;
}

/*
 *  @function: ?�m$_SESSION����?�u
 */
function set_session($fields, $value)
{
	global $config;
    $_SESSION[$config['sess_cookie_name']][$fields] = $value;
}
/*
 *  @function: ����$_COOKIE����?�u
 */
function get_cookie()
{
	$cookie = $_COOKIE;
	return $cookie;
}
/*
 *  @function: ?�m$_COOKIE����?�u
 */
function set_cookie($fields, $value)
{
   setcookie($fields,$value, time() + 3600*30*24);
}
#===========================================================

function order_url($key,$name){
	global $img_order;
	$get=$_GET;
	$base_url = base_order_url();
	if ($get["sort"]==$key && $get["order"]=="asc"){
		$url = $base_url."&sort=".$key."&order=desc";
		$img = $img_order["asc"];
	}elseif ($get["sort"]==$key && $get["order"]=="desc"){
		$url = $base_url."&sort=".$key."&order=asc";
		$img = $img_order["desc"];
	}else{
		$url = $base_url."&sort=".$key."&order=desc";
		$img = "";
	}
	$link_url = "<a href='$url' class='left_1'>".$name.$img."</a>" ;
	return $link_url;
}


function order_cond($cond=false){
	$sort=@$_GET["sort"];
	$order=@$_GET["order"];
	if (@$sort){
		$str = "  $sort $order   ";
	}elseif ($cond){
		$str = $cond;
	}
	return $str;
}

/**
 * ?����?
 *
 * @param String $url
 */
function redirect($url,$type="") {
	if($type=="top") {
		echo "<script>top.location.href='".$url."'</script>";
	}else{
		if($url=="close") {
			echo '<script>window.close();</script>';
		}elseif($url=="back") {
			echo '<script>history.back(-1);</script>';
		}else{
			echo "<script language='javascript'>"
				."window.location.replace('".$url."');"
				."</script>";
		}
	}

	die();
}

/**
 * ?�X??��
 *
 * @param String $msg
 */
function showmsg($msg) {
	echo "<script language='javascript'>alert('".$msg."')</script>";

}
//����?�I??��
function get_sub_string($string,$limit=12,$str="..."){
//	global $config;
//	if($charset == "" && $config["charset"]!=""){
//		$charset = $config["charset"];
//	}else{
//		$charset = "UTF-8";
//	}
	$charset = "UTF-8";
	if(mb_strlen($string,$charset)*2>$limit){
		return mb_strcut($string,0,$limit, $charset).$str;
	}else{
		return $string;
	}
}

/**
 * ���J���/��l����
 */
function load($file, $module='', $dir = '', $isinit = 1)
{
	$path=dirname(dirname(__FILE__)).($module?$module.'/':'/').($dir ? $dir.'/' : 'include/').$file;
	if(!(@include_once $path)) return false;
	if($isinit && strpos($file, '.class.php') !== false)
	{
		$classname = substr($file, 0, -10);
		if(is_object($classname)) {
			return true;
		} else {
			return new $classname();
		}
	}
	return true;
}
function base_order_url(){
	$get=$_GET;
	$str = "?";
	$i=0;
	foreach($get as $key => $row){

		if ($key != "order" && $key != "sort"  && $key != "page"  && $key != "get_data"  ){
			if ($i!=0)	$str .="&";
			$str.= $key."=".@urlencode($row);
		}
		$i++;
	}
	return $str;

}
if(function_exists('date_default_timezone_set')) {
	date_default_timezone_set('Hongkong');// PHP5.1.
}

if(!function_exists('json_encode'))
{
	function json_encode($string)
	{
		require_once 'json.class.php';
		$json = new json();
		return $json->encode($string);
	}
}

if(!function_exists('json_decode'))
{
	function json_decode($string,$type = 1)
	{
		require_once 'json.class.php';
		$json = new json();
		return $json->decode($string,$type);
	}
}

function user_meta_data(){
	return array(
		'f1'	=>	'�Ш|�H��',
		'f2'	=>	'�y�k��',
		'f3'	=>	'�Ǿ�',
		'f4'	=>	'�Ү�',
		'f6'	=>	'�M�~�o�i / �ե~¾��',
		'f7'	=>	'�оǸg��',
		'f8'	=>	'���a��ǥͰѥ[���ɦ���o����',
		'f9'	=>	'�Ѯv��o������a',
		'f10'	=>	'�M��'
	);
}
?>