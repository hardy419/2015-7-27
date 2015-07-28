<?php
session_start();
error_reporting(0);
require_once('get_back.php');
require_once('post_mail.php');
function connect_mysql() { 
	global $link_id;
	$link_id = @mysql_connect("localhost", "root", "");
	mysql_set_charset('utf8', $link_id); 
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
$db_name = "cpcydss_db";
mysql_select_db($db_name);
//字符串截取功能
function get_sub_string($string,$limit=12,$str="..."){
	$charset = "UTF-8";
	if(mb_strlen($string,$charset)*2>$limit){
		return mb_strcut($string,0,$limit, $charset).$str;
	}else{
		return $string;
	}
}
function checkLogin(){
	if(isset($_SESSION['UID']) && !empty($_SESSION['UID']) && isset($_SESSION['UTPYE']) && !empty($_SESSION['UTPYE'])){
	
		if($_SESSION['UTPYE'] == 'T'){
		
			$sql_checkLG = "SELECT * from tbl_teacher where `teacher_id` = '".$_SESSION['UID']."';";
			
		}else if($_SESSION['UTPYE'] == 'S'){
		
			$sql_checkLG = "SELECT * from tbl_student where `student_id` = '".$_SESSION['UID']."';";
			
		}else if($_SESSION['UTPYE'] == 'P'){
			$sql_checkLG = "SELECT * from tbl_parent where `id` = '".$_SESSION['UID']."';";
		}
		
		$get_CheckLG_result = mysql_query($sql_checkLG);
		if(mysql_num_rows($get_CheckLG_result) == 1){
			return true;
			
		}else{
			return false;
			
		}
		
	}else{
		return false;
	}
}
?>