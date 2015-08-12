<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><?php   header("Content-Type:text/html;charset=utf-8"); 
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
$contype =$_POST["a_type"];
$date_year = ($_POST[date_year]|0);
$date_month = ($_POST[date_month]|0);
$date_day = ($_POST[date_day]|0);
$date = $date_year ."-". $date_month ."-". $date_day;
$add_sql = "INSERT INTO `tbl_contest` 
( `a_title`, `a_content`, `order`,`a_type`,`a_date`,`add_time`) 
VALUES ( '$u_name', '$a_content', '$order' ,'$contype','$date',now())";
mysql_query("set names utf8");
$run_status = mysql_query( $add_sql, $link_id );

if(! $run_status )
	$msg =2;
else
	$msg =1;
mysql_close();
header("Location:contestlist.php?id=".$contype."&msg=".$msg);

?>