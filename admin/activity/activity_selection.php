<?php

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");

require_once("../../php-bin/pagedisplay.php");

// Used to match type_id in WHERE clause in this selection
$type = mysql_escape_string ($_GET['type']);


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


if (isset($_GET["page"]))
	$page = $_GET["page"]|0;


if (isset($_GET["orderby"]))
	$orderby = EncodeHTMLTag($_GET["orderby"]);


if (isset($_GET["seq"]))
	$orderseq = EncodeHTMLTag($_GET["seq"]);


$search_arr = array("t_name"=>$t_name,"type_id"=>$type_ID,'type'=>$type);
$sort_arr = array("orderby"=>$orderby,
  "seq"=>$orderseq);
$class_arr = array("",
   "small border=0 cellpadding=0 cellspacing=0",
   "",
   "\"\" style=\"padding-left:2px;padding-right:2px;\"");

// Get User's Information
$get_sql = "Select * FROM `tbl_activity` AS ta   LEFT JOIN    tbl_activity_type  AS tt  ON (ta.type_id=tt.type_id)  WHERE ta.`type_id`=".$type;



if ($_GET[t_name] != "")
	$get_sql .= " and ta.name LIKE '%$t_name%' "; 

if ($orderby!="")
	$get_sql .= " ORDER BY ta.".$orderby." ".$orderseq;
else
	$get_sql .= " ORDER BY ta.date  DESC,  ta.type_id ASC ";




$get_result = mysql_query($get_sql, $link_id);
if (false !== $get_result) {
    $total_record = mysql_num_rows($get_result);
    $offset = $record_per_page * ($page-1);
    $total_page = ceil($total_record/$record_per_page);
    $get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);
}
else {
    $total_record = 0;
    $offset = 0;
    $total_page = 0;
    $get_result = null;
}

mysql_close();

?>