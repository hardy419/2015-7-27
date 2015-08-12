<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../admin.inc.php");



// Connect Database

require_once("../../php-bin/function.php");



// access control checking

require_once("z_access_control.php");







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











/* pagedisplay function's arrays



* $search_arr : The searching arguments array, format likes :

*               array("name1"=>"value1",

*                     "name2"=>"value2");

* $sort_arr : The sorting arguments array, format likes :

*             array("orderby"=>"order_by_name1",

*                   "seq"=>"asc/desc",

*                   "orderby"=>"order_by_name2",

*                   "seq"=>"asc/desc");



* $class_arr : The style class of font,table,table row and table cell, format likes :

*              array("font_class_name",

*                    "table_class_name",

*                    "tr_class_name",

*                    "td_class_name");  */







$search_arr = array("t_name"=>$t_name);

$sort_arr = array("orderby"=>$orderby,"seq"=>$orderseq);



$class_arr = array("",

	"small border=0 cellpadding=0 cellspacing=0",

	"",

	"\"\" style=\"padding-left:2px;padding-right:2px;\""

);











// Get User's Information



// $get_sql = "Select * FROM `tbl_notice` WHERE 1 ";

$get_sql = "Select * FROM `tbl_notice`  LEFT JOIN  tbl_notice_type ON ( tbl_notice.type_id=tbl_notice_type.id )   WHERE 1 ";





if($t_name != "")

	$get_sql .= " and a_title LIKE '%" . $t_name. "%'";





if($orderby!="")

	$get_sql .= " ORDER BY tbl_notice.".$orderby." ".$orderseq;









$get_result = mysql_query($get_sql, $link_id);

$total_record = mysql_num_rows($get_result);

$offset = $record_per_page * ($page-1);

$total_page = ceil($total_record/$record_per_page);

$get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);

mysql_close();



?>