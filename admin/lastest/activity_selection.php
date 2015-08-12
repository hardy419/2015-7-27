<?php

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");

require_once("../../php-bin/pagedisplay.php");


$type_ID = $_GET["type_id"]|0;
$t_name = EncodeHTMLTag($_GET["t_name"]);

// Initial variables
$msg = "";
$u_name = "";
$u_type = "";
$u_status = "";

if (isset($_GET["msg"]))  // GET status message
	$msg = EncodeHTMLTag($_GET["msg"]);


$orderby = "";
$orderseq = "asc";
$page = 1;
$record_per_page = 10;   // records display each page

$class_arr = array("",
   "small border=0 cellpadding=0 cellspacing=0",
   "",
   "\"\" style=\"padding-left:2px;padding-right:2px;\"");
if ( isset( $_GET["page"] ) )

	$page = $_GET["page"]|0;

// Get User's Information
$get_sql = "Select * FROM `tbl_lastest`";

$get_result = mysql_query($get_sql, $link_id);
$total_record = mysql_num_rows($get_result);
$offset = $record_per_page * ($page-1);
$total_page = ceil($total_record/$record_per_page);
$get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);

mysql_close();

?>