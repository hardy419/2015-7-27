<?php













while( $get_item_obj = mysql_fetch_object($get_item_result) )

{

	$item_counter++;













?>

<a name="<?php echo $get_item_obj->web_sub_content_item_id?>"></a>

<table border="0" cellpadding="8" cellspacing="1" width="100%" style="table-layout:fixed">

<?php







if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

{

	?>

	<tr>

		<td align="left" valign="top" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>"><b><?php echo $preview_item_title ?></b><?php



		if( $get_item_obj->date != "" )

			echo " &nbsp; ".$preview_item_date;





?></td>

	</tr>

	<?php

}

else

{

	if( $get_item_obj->web_sub_content_item_title != "" )

	{

	?>

	<tr>

		<td align="left" valign="top" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>"><b><?php echo $get_item_obj->web_sub_content_item_title ?></b><?php



		if( $get_item_obj->date != "" )

			echo " &nbsp; ".$get_item_obj->date;





?></td>

	</tr>

	<?php

	}

}



?>

	<tr>

		<td align="left" valign="top" bgcolor="<?php echo $Content_BGColor_Ary2[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary2)];?>"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;table-layout:fixed;"><tr

<?php



if( $get_item_obj->bg_img != "" )

	echo 'style="background:url(\'gallery_sub_content/'. $get_item_obj->bg_img .'\') repeat}"';



?>><td><?php

if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

	echo $preview_item_content;

else

	echo $get_item_obj->web_sub_content_item_html

?></td>

		</tr></table></td>

	</tr>

</table>

<br />

<?php



	$Content_BGColor_Ary_Pointer++;



}













?>