<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");











$content_ID = $OutsideConnect_WebContent_ID;

$sub_content_ID = $_GET["sub_id"]|0;











$show_sub_content_sql = "SELECT * FROM    tbl_web_sub_content    WHERE         web_sub_content_id!=".$sub_content_ID."   AND    web_sub_content_inner=0      AND    web_content_id=". $OutsideConnect_WebContent_ID ."  AND    web_content_id=". $content_ID;

$show_sub_content_result = mysql_query( $show_sub_content_sql, $link_id );











header('Content-Type: application/xml');





echo '<?xml version="1.0" encoding="utf-8" ?>

<data>';

while( $sub_content_obj = mysql_fetch_object($show_sub_content_result) )

{

	echo '

<elements id="'. $sub_content_obj->web_sub_content_id .'" title="'. $sub_content_obj->web_sub_content_title .'" />';

}

echo '

</data>';







mysql_close();

?>