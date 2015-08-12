<?php

// admin checking
require_once("../../admin.inc.php");

// access control checking
require_once("z_access_control.php");

// Connect Database
require_once("../../php-bin/function.php");















if($_POST['submit']=='重設')
{
	$get_sql = 'SELECT * FROM `tbl_class` where old_year <> ""';
	$get_result = mysql_query($get_sql, $link_id);

	while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH))
	{
		$update_sql = "update tbl_class set class_name = '$get_rows[old_class_name]' , year = '$get_rows[old_year]' , old_class_name = '' , old_year = '' where class_id  = '$get_rows[class_id]'";
		$run_status = mysql_query($update_sql);
	}

	$msg = "The record has been reset successfully.";
	$msg = urlencode($msg);
	header("Location:index.php?msg=$msg");


}
else
{
	$update_status = true;
	$this_year = date("Y");

	$get_sql0 = "SELECT * FROM `tbl_class` where class_name like '%(畢業班)%'";
	$get_result0 = mysql_query($get_sql0, $link_id);

	while($get_rows0=mysql_fetch_array($get_result0,MYSQL_BOTH))
	{
		$update_sql0 = "update `tbl_class` set old_class_name = '$get_rows0[class_name]' , old_year = '$get_rows0[year]'  where class_id  = '$get_rows0[class_id]'";
		$run_status0 = mysql_query($update_sql0);
	}



	$get_sql = "SELECT * FROM `tbl_class` where year  = '7'";
	$get_result = mysql_query($get_sql, $link_id);

	while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH))
	{
		$update_sql = "update `tbl_class` set old_class_name = '$get_rows[class_name]' , old_year = '7' , class_name = '(畢業班) $this_year $get_rows[class_name]' , year = '$this_year' where class_id  = '$get_rows[class_id]'";
		$run_status = mysql_query($update_sql);
	}





	foreach ($_POST[class_name] as $key => $value)
	{
		$year = substr($key , (strlen($key)-1), (strlen($key)));
		$id = substr($key , 0, (strlen($key)-2));

		$select_sql = "select * from tbl_class where class_id = '$id'";
		$select_status = mysql_query($select_sql) or die(mysql_error());
		$row_select = mysql_fetch_assoc($select_status);

		$update_sql = "update `tbl_class` set old_class_name = '$row_select[class_name]' , old_year = '$row_select[year]' , class_name = '$value' , year = '" . $_POST["year".$year] . "' where class_id = '$id'";
		$run_status = mysql_query($update_sql);
	}

	$msg = "The record has been updated successfully.";
	$msg = urlencode($msg);
	header("Location:index.php?msg=$msg");

}




mysql_close();

?>