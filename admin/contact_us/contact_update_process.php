<?php  header("Content-Type:text/html;charset=utf-8"); 

	// admin checking

	require_once("../../php-bin/admin_check.php");



	// Connect Database

	require_once("../../php-bin/function.php");

	// access control checking

	require_once("z_access_control.php");

	if($_GET["aciton"]='update'){

	$contact_id = $_POST["id"];

	$contact_name = $_POST["contact_name"];

	$contact_tel = $_POST["contact_tel"];

	$contact_mail = $_POST["contact_mail"];

	$contact_text = $_POST["contact_text"];

	$sql="UPDATE tbl_contact  set contact_name='$contact_name',contact_tel='$contact_tel',contact_mail='$contact_mail',contact_text='$contact_text' where contact_id = '$contact_id'"; 

	mysql_query($sql);

 }

	$msg = "更新完成";

	mysql_close();

	header("Location:contact_us.php?msg=$msg");

?>