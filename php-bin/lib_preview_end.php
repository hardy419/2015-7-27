<?php



// update the item order to original one.

if( $is_preview > 0 )

{

	mysql_query("UPDATE  tbl_web_sub_content_item    SET web_sub_content_item_order=".$original_item_order."    WHERE web_sub_content_item_id=".$preview_item_id);

}

//update end





?>