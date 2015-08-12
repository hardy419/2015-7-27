<?php













while( $get_item_obj = mysql_fetch_object($get_item_result) )

{

	$item_counter++;











	$gallery_img_ary = array();

	$gallery_ary_count = 1;

	$gallery_ary_pointer = 0;

	

	$get_gallery_sql = "SELECT   *   FROM   `tbl_web_sub_content_gallery`   WHERE   `web_sub_content_item_id`=". $get_item_obj->web_sub_content_item_id ." Order By g_order ASC LIMIT $gallery_ary_count ";

	$get_gallery_result = mysql_query( $get_gallery_sql, $link_id );

	

	

	while( $get_gallery_obj = mysql_fetch_object($get_gallery_result) )

		$gallery_img_ary[] = '<a href="gallery_sub_content/original/'. $get_gallery_obj->ori_file_name .'" target="_blank"><img src="gallery_sub_content/'. $get_gallery_obj->file_name .'" width="200" height="150" border=0 ></a>';

	while( $gallery_ary_pointer++ < $gallery_ary_count )

		$gallery_img_ary[] = '<img src="images/trans.gif" width="200" height="150" border=0 >';







	if( $item_counter%2 == 1 ) // image on the left side

	{



?>

<a name="<?php echo $get_item_obj->web_sub_content_item_id?>"></a>

<table border="0" cellpadding="10" cellspacing="1" width="100%" style="table-layout:fixed">

	<tr <?php



if( $get_item_obj->bg_img != "" )

	echo 'style="background:url(\'gallery_sub_content/'. $get_item_obj->bg_img .'\') repeat;}"';



?>>

		<td width="200" align="center" valign="top" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>"><?php echo $gallery_img_ary[0]?></td>

		<td align="left" valign="top" bgcolor="<?php echo $Content_BGColor_Ary2[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary2)];?>"  ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;table-layout:fixed">

<?php





if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

{



	?><tr><td><b><?php



	echo $preview_item_title;





	if( $get_item_obj->date != "" )

		echo " &nbsp; ".$preview_item_date;





?></b></td></tr><?php

}

else

{

	if( $get_item_obj->web_sub_content_item_title != "" )

	{

	?><tr><td><b><?php



		echo $get_item_obj->web_sub_content_item_title;





		if( $get_item_obj->date != "" )

			echo " &nbsp; ".$get_item_obj->date;





?></b></td></tr><?php

	}

}



?>

<tr><td><?php

if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

	echo $preview_item_content;

else

	echo $get_item_obj->web_sub_content_item_html

?></td></tr>

</table></td>

	</tr>

</table>



<table border="0" cellpadding="5" cellspacing="0" width="100%">

	<tr>

		<td align="center" height="8" >&nbsp;</td>

	</tr>

</table>

<?php



	}

	else // image on the right side

	{

			

?>

<table border="0" cellpadding="10" cellspacing="1" width="100%">

	<tr>

		<td align="center" valign="top" bgcolor="<?php echo $Content_BGColor_Ary2[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary2)];?>" <?php



if( $get_item_obj->bg_img != "" )

	echo 'style="background:url(\'gallery_sub_content/'. $get_item_obj->bg_img .'\') repeat ;}"';



?> ><table border="0" cellpadding="0" cellspacing="0" style="width:100%;table-layout:fixed">

<?php



if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

{



	?><tr><td><b><?php



	echo $preview_item_title;





	if( $get_item_obj->date != "" )

		echo " &nbsp; ".$preview_item_date;





?></b></td></tr><?php

}

else

{

	if( $get_item_obj->web_sub_content_item_title != "" )

	{

	?><tr><td><b><?php



		echo $get_item_obj->web_sub_content_item_title; 





		if( $get_item_obj->date != "" )

			echo " &nbsp; ".$get_item_obj->date;





	?></b></td></tr><?php

	}

}



?>

<tr><td><?php

if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

	echo $preview_item_content;

else

	echo $get_item_obj->web_sub_content_item_html

?></td></tr>

</table></td>

		<td width="200" align="right" valign="top" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>"><?php echo $gallery_img_ary[0]?></td>

	</tr>

</table>



<table border="0" cellpadding="5" cellspacing="0" width="100%">

	<tr>

		<td align="center" height="8" >&nbsp;</td>

	</tr>

</table>

<?php



	}

	

	$Content_BGColor_Ary_Pointer++;



}









?>