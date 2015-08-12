<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");



require_once("../../php-bin/pagedisplay.php");













// Initial variables

$msg = "";

if (isset($_GET["msg"]))  // GET status message

	$msg = $_GET["msg"];





$page = 1;

$record_per_page = 20;   // records display each page

if (isset($_GET["page"]))

	$page = $_GET["page"]|0;





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

*                    "td_class_name");  

*/





$id = $_GET["id"]|0;







// check the ID of tbl_web_sub_content exist or not 

$check_result = mysql_query( "SELECT  *   FROM   tbl_web_sub_content_item AS tsci 

LEFT JOIN    tbl_web_sub_content AS tsc    ON(tsci.web_sub_content_id=tsc.web_sub_content_id) 

LEFT JOIN    tbl_web_content AS tc         ON(tc.web_content_id=tsc.web_content_id)  

WHERE  tc.web_content_id=". $OutsideConnect_WebContent_ID ."   AND  tsci.web_sub_content_item_id=".$id );





























$search_arr = array("id"=>$id);



$class_arr = array("",

	"small border=0 cellpadding=0 cellspacing=0",

	"",

	"\"\" style=\"padding-left:2px;padding-right:2px;\""

);





// Get Photo

$get_sql = " SELECT  *   FROM  tbl_web_sub_content_item AS ti,    tbl_web_sub_content_gallery AS tg    WHERE

ti.web_sub_content_item_id=$id            AND         ti.web_sub_content_item_id=tg.web_sub_content_item_id 

ORDER BY  tg.g_order ASC,  tg.file_name   ";





$get_result = mysql_query($get_sql, $link_id);

$total_record = mysql_num_rows($get_result);

$offset = $record_per_page * ($page-1);

$total_page = ceil($total_record/$record_per_page);

$get_result1 = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);

$get_result2 = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);

$get_result3 = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);



mysql_close();



?>