<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php header("Content-Type:text/html;charset=utf-8"); 

	// Connect Database
	require_once("../../php-bin/function.php");

	if($_GET["aciton"]='update'){

	$link_id = $_POST["id"];

	$link_name = addslashes($_POST["link_name"]);

	$link_sort = 2;
	$link_type = addslashes($_POST["link_type"]);
	$link_address = addslashes($_POST["link_address"]);
	//$link_logo = addslashes($_POST["link_logo"]);
	$link_remark = addslashes($_POST["link_remark"]);


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
if($link_logo==""){
$sql="UPDATE tbl_link set link_name='$link_name',link_type='$link_type',link_sort='$link_sort',link_address='$link_address',link_remark='$link_remark' where link_id = '$link_id'";
}else{
$sql="UPDATE tbl_link set link_name='$link_name',link_type='$link_type',link_sort='$link_sort',link_address='$link_address',link_logo='$link_logo',link_remark='$link_remark' where link_id = '$link_id'";
}
mysql_query("set names utf8");
	mysql_query($sql);
 }
	mysql_close();
	header("Location:link.php?msg=$msg&t_name=".$u_name);

?>