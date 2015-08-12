<?php

 header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");

















$sub_content_ID      = $_POST['sub_content_id']|0;

$change_to_ID        = $OutsideConnect_WebContent_ID;

$content_Title       = EncodeHTMLTag($_POST['w_title']);

$content_Template    = $_POST['w_template']|0;

$content_Description = EncodeHTMLTag($_POST['w_description']);

$content_Inner = $_POST['w_hidden']|0;

if( $content_Inner != 0 )

	$content_Inner = $_POST['link_to']|0;



$content_Order = $_POST['w_order']|0;





















if( $content_Title=='' )

{

	header("Location: w_search.php?id=". $change_to_ID);

	exit();

}







$update_sql = "UPDATE `tbl_web_sub_content` SET 

  `web_sub_content_title` = '$content_Title',

  `web_sub_content_template` = $content_Template,

  `web_sub_content_description` = '$content_Description',

  `web_sub_content_inner` = $content_Inner,

  `web_sub_content_order` = $content_Order

WHERE web_content_id=". $OutsideConnect_WebContent_ID ."    AND    `web_sub_content_id` = ".$sub_content_ID;





$run_status = mysql_query($update_sql, $link_id);

if (!$run_status)

	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

else

	$msg = "比賽學生添加完成";



mysql_close();







header("Location: w_search.php?id=". $change_to_ID);





?>