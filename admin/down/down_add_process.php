<?php   header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
//require_once("z_access_control.php");


$u_name = addslashes($_POST['u_name']);
$a_content = addslashes($_POST["a_content"]);
//$u_pw = EncodeHTMLTag($_POST["u_pw"]);
$order =addslashes($_POST["order"]);
$add_time = date('Y-m-d H:i:s', time());
$path_pdf = "../../userfiles/pdf/";
$re_name = date("YmdHis");
if($_FILES["a_file"]["name"]!=""){
			$type = strtolower(strrchr($_FILES["a_file"]["name"],"."));
			$re_name_pdf =$re_name.$type;
			$allow_type = array('.rar','.pdf','.doc','.xlsx','.docx','.xls','.jpg','.gif','.png','.bmp');
			if(!in_array($type,$allow_type))
			{
				die('Ո�x����_���ļ����(rar/pdf/doc/xls/pic)');
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

$add_sql = "INSERT INTO `tbl_down` 
( `a_title`, `a_content`, `order`, `down_file` ) 
VALUES ( '$u_name', '$a_content', '$order', '$a_file' );";

$run_status = mysql_query( $add_sql, $link_id );

if( ! $run_status )
{
	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
}
else
{	
	// End Upload Photo
	$msg = "�����ɹ�";
}

mysql_close();


header("Location:aboutus.php?msg=".$msg);

?>