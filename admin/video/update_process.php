<?php
header("Content-Type:text/html;charset=utf-8"); 


// admin checking
require_once("../../admin.inc.php");



// Connect Database

require_once("../../php-bin/function.php");



// access control checking

require_once("z_access_control.php");

$id = $_POST['id']|0;

$date_year = ($_POST[date_year]|0);

$date_month = ($_POST[date_month]|0);

$date_day = ($_POST[date_day]|0);

$date = $date_year ."-". $date_month ."-". $date_day;

$category_id = $_POST['_POST']|0;

$title = EncodeHTMLTag($_POST["title"]);

$video = EncodeHTMLTag($_POST["video"]);

$picture = EncodeHTMLTag($_POST["picture"]);


$update_qstr = "UPDATE tbl_video SET `category_id`={$category_id}, `date`='{$date}', title='{$title}', video='{$video}', picture='{$picture}' WHERE id={$id}";

if (mysql_query($update_qstr, $link_id)) {
	
	$msg = "Update Sucess";

}

mysql_close();


header("Location: search.php?start_search=1&msg=".$msg."&mp3_title=".urlencode($search_Obj2->mp3_title)."&mp3_type_id=".urlencode($search_Obj2->mp3_type_id));

?>