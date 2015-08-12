<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><?php   header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");


$u_name = addslashes($_POST['u_name']);
$a_type = $_POST["a_type"];
$a_content = addslashes($_POST["a_content"]);
//$u_pw = EncodeHTMLTag($_POST["u_pw"]);
$order =addslashes($_POST["order"]);
$add_time = date('Y-m-d H:i:s', time());
$date_year = ($_POST[date_year]|0);
$date_month = ($_POST[date_month]|0);
$date_day = ($_POST[date_day]|0);
$date = $date_year ."-". $date_month ."-". $date_day;
$path_pdf = "../../userfiles/pdf/";
$re_name = date("YmdHis");
if(!is_dir($path_pdf)) @mkdir($path_pdf);
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

$add_sql = "INSERT INTO `tbl_down` 
( `a_title`, `a_type` ,  `a_content`, `order`, `down_file`,`a_date` ) 
VALUES ( '$u_name', '$a_type' , '$a_content', '$order', '$a_file','$date' );";
mysql_query("set names utf8");
$run_status = mysql_query( $add_sql, $link_id );

if( ! $run_status )
{
	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
}
else
{	
	// End Upload Photo
	$msg = "新增成功";
}

mysql_close();


header("Location:down.php?msg=".$msg);

?>