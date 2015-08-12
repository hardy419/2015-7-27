<?php



// preview init start

$is_preview = $_POST["is_preview"]|0;

$preview_item_id = $_POST["item_id"]|0;

$preview_item_order = $_POST["item_order"]|0;

$preview_item_title = EncodeHTMLTag($_POST["item_title"]);

$preview_item_content  = str_replace( '\"', "'", $_POST['elm1']);



$item_Day = $_POST['item_day']|0;

$item_Month = $_POST['item_month']|0;

$item_Year = $_POST['item_year']|0;

$preview_item_date = "";

if( $item_Day>0 && $item_Day<=31 && $item_Month>0 && $item_Month<=12 && $item_Year>=1996 )

	$preview_item_date = "'$item_Year-$item_Month-$item_Day'";

// preview init end



// update the item order temporary

if( $is_preview > 0 )

{

	$original_item_order_result = mysql_query("SELECT web_sub_content_item_order  FROM tbl_web_sub_content_item WHERE web_sub_content_item_id=".$preview_item_id);

	$original_item_order_obj = mysql_fetch_object($original_item_order_result);

	$original_item_order = $original_item_order_obj->web_sub_content_item_order;



	mysql_query("UPDATE  tbl_web_sub_content_item    SET web_sub_content_item_order=".$preview_item_order."    WHERE web_sub_content_item_id=".$preview_item_id);

}

//update end





?>