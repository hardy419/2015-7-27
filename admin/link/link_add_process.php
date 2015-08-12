<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

header("Content-Type:text/html;charset=utf-8"); 
// admin checking

require_once("../../php-bin/function.php");


$link_sort = 2;

$link_name = addslashes($_POST["link_name"]);
$link_address = addslashes($_POST["link_address"]);
//$link_logo = addslashes($_POST["link_logo"]); 
$link_remark = addslashes($_POST["link_remark"]); 
$link_type = addslashes($_POST["link_type"]);


$path_pdf = "../../userfiles/upload/";
if(!is_dir($path_pdf)) @mkdir($path_pdf,0777);
$re_name = date("YmdHis");
if($_FILES["link_logo"]["name"]!=""){
			$type = strtolower(strrchr($_FILES["link_logo"]["name"],"."));
			$re_name_pdf =$re_name.$type;
			$allow_type = array('.jpg','.gif','.png','.bmp');
			if(!in_array($type,$allow_type))
			{
				die('請選擇正確的文件類型');
			}
			if (isset($_FILES["link_logo"]["tmp_name"]) && $_FILES["link_logo"]["tmp_name"] != "")
			{
				if (!copy($_FILES["link_logo"]["tmp_name"], $path_pdf.$re_name_pdf))
				{
					echo "Fail to copy doc file - " . $_FILES["link_logo"]["tmp_name"];
					exit();
				}
				else
				{
					$link_logo=$re_name_pdf;
				}
			}

}
// Insert new data

//$add_sql = "INSERT INTO `tbl_link` VALUES ('', '".$_POST["u_name"]."', '".$_POST["u_id"]."', '".$_POST["u_pw"]."', '".$u_edit."', '".$u_admin."');";
$add_sql = "INSERT INTO tbl_link (link_sort,link_name,link_address,link_logo,link_remark,link_type) VALUES ('$link_sort','$link_name','$link_address','$link_logo','$link_remark','$link_type');";
mysql_query("set names utf8");
mysql_query( $add_sql, $link_id);

	$msg = "添加成功";

mysql_close();





header("Location:link.php");



?>