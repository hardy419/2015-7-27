<?php   header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");

// Connect Database

require_once("../../php-bin/function.php");

// access control checking

require_once("z_access_control.php");

$type_id = $_POST["n_type"]|0;

//access_detail_check( $type_id );

$date_year = ($_POST[date_year]|0);

$date_month = ($_POST[date_month]|0);

$date_day = ($_POST[date_day]|0);

$date = $date_year ."-". $date_month ."-". $date_day;

$title = EncodeHTMLTag($_POST["n_title"]);

$serial = EncodeHTMLTag($_POST["n_serial"]);

$content = EncodeHTMLTag($_POST["n_content"]);

$link_text = EncodeHTMLTag($_POST["n_link_text"]);

$link_url = EncodeHTMLTag($_POST["n_link_url"]);

$uploaddir="../../file_download/";

$fname = $_FILES['n_file']['name'];

$uploadfile = $uploaddir . basename($_FILES['n_file']['name']);

	$do = copy($_FILES['n_file']['tmp_name'],$uploadfile);

$add_sql = "INSERT INTO `tbl_w_content`(`w_type_id` , `w_date` ,  `type_order` , `w_title` , `w_description` , `link_text` , `link_url`,`file_name`) 

VALUES ( $type_id, '$date', '$serial', '$title', '$content', '$link_text', '$link_url','$fname');";

mysql_query($add_sql);

mysql_close();

header("Location:w_search.php");

?>