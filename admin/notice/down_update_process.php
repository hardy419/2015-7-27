<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");


$a_id = $_POST["a_id"]|0;
$u_name = addslashes($_POST['u_name']);
$a_type = $_POST['a_type'];
$a_content = addslashes($_POST["a_content"]);
$order = addslashes($_POST["order"]);
$a_id = $_POST['a_id'];
//$u_pw = EncodeHTMLTag($_POST["u_pw"]);
$date_year = ($_POST[date_year]|0);
$date_month = ($_POST[date_month]|0);
$date_day = ($_POST[date_day]|0);
$date = $date_year ."-". $date_month ."-". $date_day;
$order = $_POST["order"]|0;
$add_time = date('Y-m-d H:i:s', time());
$path_pdf = "../../userfiles/pdf/";
$re_name = date("YmdHis");
if($_FILES["a_file"]["name"]!=""){
			$type = strtolower(strrchr($_FILES["a_file"]["name"],"."));
			$re_name_pdf =$re_name.$type;
			$allow_type = array('.rar','.pdf','.doc','.xlsx','.docx','.xls','.jpg','.gif','.png','.bmp');
			if(!in_array($type,$allow_type))
			{
				die('請選擇正確的文件類型(rar/pdf/doc/xls/pic)');
			}
			if (isset($_FILES["a_file"]["tmp_name"]) && $_FILES["a_file"]["tmp_name"] != "")
			{
				if (!copy($_FILES["a_file"]["tmp_name"], $path_pdf.$re_name_pdf))
				{
					echo "Fail to copy doc file - " . $_FILES["a_file"]["tmp_name"];
					exit();
				}
				else
				{
					$a_file=$re_name_pdf;
				}
			}
}
if($a_file==""){
$update_sql = "UPDATE `tbl_notice` SET
`a_title`='$u_name', `a_content`='$a_content', `a_date`='$date', `order`='$order' WHERE `a_id`=".$a_id;
}else{
$update_sql = "UPDATE `tbl_notice` SET
`a_title`='$u_name',`a_content`='$a_content', `a_date`='$date', `order`='$order',`down_file`='$a_file'  WHERE `a_id`=".$a_id;
}
mysql_query("set names utf8");
$run_status = mysql_query( $update_sql, $link_id );

if( ! $run_status )
{
	$msg =4;
}
else
{
	$msg =3;
}


mysql_close();


header("Location:downlist.php?type=".$a_type."&msg=".$msg);

?>