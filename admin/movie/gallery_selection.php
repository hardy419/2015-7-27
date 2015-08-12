<?php   header("Content-Type:text/html;charset=utf-8"); 

require_once("../../admin.inc.php");



// Connect Database

require_once("../../php-bin/function.php");
// access control checking

require_once("z_access_control.php");
require_once("../../php-bin/pagedisplay.php");


// Initial variables

$msg = "";

if (isset($_GET["msg"]))  // GET status message

	$msg = EncodeHTMLTag($_GET["msg"]);



$page = 1;

$record_per_page = 20;   // records display each page

if ( isset( $_GET["page"] ) )

	$page = $_GET["page"]|0;


$id = $_GET[id]|0;


$search_arr = array("id"=>$id);


$class_arr = array("",

	   "small border=0 cellpadding=0 cellspacing=0",

	   "",

	   "\"\" style=\"padding-left:2px;padding-right:2px;\"");

// Get Photo
$get_rs = mysql_query("select `id`,`name` from tbl_activity where id=".$id, $link_id);
$get_rows=mysql_fetch_row($get_rs);
$get_sql = "SELECT ta.name, ta.type_id, tg.* FROM `tbl_activity_gallery` AS tg , 

`tbl_activity` AS ta    LEFT JOIN  tbl_activity_type AS tt  ON(ta.type_id=tt.type_id) 

WHERE tg.act_id=ta.id AND tg.act_id=".$id."

ORDER BY  tg.g_order ASC,  tg.file_name ASC  ";

$get_result = mysql_query($get_sql, $link_id);

$get_obj = mysql_fetch_object($get_result);

$total_record = mysql_num_rows($get_result);

$offset = $record_per_page * ($page-1);

$total_page = ceil($total_record/$record_per_page);


$get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);

$get_result2 = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);

$get_result3 = mysql_query(" SELECT * FROM `tbl_activity_type` AS tt  

LEFT JOIN   tbl_activity  AS  ta  ON(ta.type_id=tt.type_id) 

LEFT JOIN  `tbl_activity_gallery` AS tg   ON( ta.id=tg.act_id  )

WHERE ta.id=".$id, $link_id);
mysql_close();

?>