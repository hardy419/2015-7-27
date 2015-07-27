<html>
<head>
<title>學生管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><?
// admin checking
require_once("../../php-bin/admin_check.php");
    // Connect Database
    require("../../php-bin/function.php");

$update_status = true;
	$this_year = date("Y");
	
	$get_sql = "SELECT * FROM `tbl_class` where year  = '6'";
	$get_result = mysql_query($get_sql, $link_id);
	while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){
		$update_sql = "update `tbl_class` set class_name = '$this_year $get_rows[class_name] (畢業班)' , year = '$this_year' where class_id  = '$get_rows[class_id]'";
		$run_status = mysql_query($update_sql);
	}
	

foreach ($_POST[class_name] as $key => $value) {
	$year = substr($key , (strlen($key)-1), (strlen($key)));
	$id = substr($key , 0, (strlen($key)-2));

	$update_sql = "update `tbl_class` set class_name = '$value' , year = '" . $_POST["year".$year] . "' where class_id = '$id'";
	$run_status = mysql_query($update_sql);

}
$msg = "班別新增完成";
$msg = urlencode($msg);
header("Location:index.php?msg=$msg");
?>
