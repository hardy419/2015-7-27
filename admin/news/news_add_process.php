<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><?php   header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");


$u_name = addslashes($_POST['u_name']);
$a_content = addslashes($_POST["a_content"]);
//$u_pw = EncodeHTMLTag($_POST["u_pw"]);
$order =addslashes($_POST["order"]);
$contype =$_POST["contype"];
$add_sql = "INSERT INTO `tbl_news` 
( `a_title`, `a_content`, `order`,`contype` ) 
VALUES ( '$u_name', '$a_content', '$order' ,'$contype');";
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


header("Location:news.php?msg=".$msg);

?>