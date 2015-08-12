<?php

// admin checking
require_once("../../admin.inc.php");

// access control checking
require_once("z_access_control.php");

// Connect Database
require_once("../../php-bin/function.php");





$class_name = EncodeHTMLTag($_POST[class_name]);
$class_year = $_POST[class_year]|0;




if (isset($_POST[Submit]))
{

	// Insert new data
	$add_sql = "INSERT INTO tbl_class (class_id ,class_name,year) VALUES ('', '$class_name', '$class_year')";      

	$run_status = mysql_query($add_sql);

	if (!$run_status)
	{
		if (mysql_errno($link_id)==1062)
			$msg = 'Duplication class name has been found.';
		else
			$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));
	}
	else
		$msg = "The record has been added successfully.";

	mysql_close();


	$msg = urlencode($msg);
	header("Location:index.php?msg=$msg");

}

?>
