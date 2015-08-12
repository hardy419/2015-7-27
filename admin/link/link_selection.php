<?php
header("Content-Type:text/html;charset=utf-8"); 

require_once("../../php-bin/function.php");


require_once("../../php-bin/pagedisplay.php");

// Initial variables



$msg = "";

$u_name = "";

$u_type = "";

$u_status = "";

$t_name = EncodeHTMLTag($_GET["t_name"]);

$msg = EncodeHTMLTag($_GET["msg"]);  // GET status message



$orderby = "`order`";

$orderseq = "asc";

$page = 1;

$record_per_page = 10;   // records display each page

if (isset($_GET["page"]))

	$page = $_GET["page"]|0;



if (isset($_GET["orderby"]))

	$orderby = EncodeHTMLTag($_GET["orderby"]);



if (isset($_GET["seq"]))

	$orderseq = EncodeHTMLTag($_GET["seq"]);

$search_arr = array("t_name"=>$t_name);

$sort_arr = array("orderby"=>$orderby,"seq"=>$orderseq);



$class_arr = array("",

	"small border=0 cellpadding=0 cellspacing=0",

	"",

	"\"\" style=\"padding-left:2px;padding-right:2px;\""

);

$get_sql = "Select * FROM tbl_link";


if($t_name != "") $get_sql .= " WHERE link_name LIKE '%".$t_name."%'";


$get_result = mysql_query($get_sql, $link_id);



$total_record = mysql_num_rows($get_result);

$offset = $record_per_page * ($page-1);

$total_page = ceil($total_record/$record_per_page);

$get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);

mysql_close();

?>