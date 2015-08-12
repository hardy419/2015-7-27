<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// Connect Database

require_once("../../php-bin/function.php");



// access control checking

require_once("z_access_control.php");







$id = $_GET["id"];











if( $id != 0 )

{

	// Delete data

	$del_sql = "DELETE

	FROM `tbl_w_content`

	WHERE w_id='$id';";



	$run_status = mysql_query($del_sql);







	mysql_close();

	header("Location: w_search.php?msg=$msg");







}







?>