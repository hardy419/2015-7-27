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
$a_type =$_POST["a_type"];

$add_sql = "INSERT INTO `tbl_stuteacher` 
( `a_title`, `a_content`, `order`,a_type ) 
VALUES ( '$u_name', '$a_content', '$order','$a_type' );";

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


header("Location:aboutus.php?msg=".$msg);

?>