<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");

















$content_ID    = $OutsideConnect_WebContent_ID;

$content_Title = EncodeHTMLTag($_POST['w_title']);

$content_Template = ($_POST['w_template']|0);

$content_Description = EncodeHTMLTag($_POST['w_description']);

$content_Inner = $_POST['w_hidden']|0;

if( $content_Inner != 0 )

	$content_Inner = $_POST['link_to']|0;



$content_Order = $_POST['w_order']|0;













if( $content_Title=='' )

{

	header("Location: w_search.php?id=".$content_ID);

	exit();

}







$add_sql = "INSERT INTO `tbl_web_sub_content` ( `web_content_id` , `web_sub_content_title` , `web_sub_content_template` , `web_sub_content_description` , `web_sub_content_inner` , `web_sub_content_order` )

  VALUES ( $content_ID, '$content_Title', $content_Template, '$content_Description', $content_Inner, $content_Order )";









$run_status = mysql_query($add_sql, $link_id);

if (!$run_status)

	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

else

{

	$msg = "比賽學生添加完成";

	$sub_content_id = mysql_insert_id($link_id);

}

mysql_close();







header("Location: w_sub_content.php?id=".$sub_content_id);





?>