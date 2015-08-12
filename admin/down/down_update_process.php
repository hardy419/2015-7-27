<?php

header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
//require_once("z_access_control.php");

$a_id = $_POST["a_id"]|0;
$u_name = addslashes($_POST['u_name']);
$a_content = addslashes($_POST["a_content"]);
$order = addslashes($_POST["order"]);
$a_id = $_POST['a_id'];
//$u_pw = EncodeHTMLTag($_POST["u_pw"]);

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
$update_sql = "UPDATE `tbl_down` SET
`a_title`='$u_name', `a_content`='$a_content', `order`='$order' WHERE `a_id`=".$a_id;
}else{
$update_sql = "UPDATE `tbl_down` SET
`a_title`='$u_name', `a_content`='$a_content', `order`='$order',`down_file`='$a_file'  WHERE `a_id`=".$a_id;
}

$run_status = mysql_query( $update_sql, $link_id );

if( ! $run_status )
{
	$msg = str_replace(" ", "+", "tο~: " . mysql_error($link_id));
}
else
{
	$msg = "update success";
}


mysql_close();


header("Location:aboutus.php?msg=".$msg);

?>