<?php













while( $get_item_obj = mysql_fetch_object($get_item_result) )

{

	$item_counter++;







	$gallery_img_ary = array();

	$gallery_ary_count = 2;

	$gallery_ary_pointer = 0;

	

	$get_gallery_sql = "SELECT   *   FROM   `tbl_web_sub_content_gallery`   WHERE   `web_sub_content_item_id`=". $get_item_obj->web_sub_content_item_id ." Order By g_order ASC LIMIT $gallery_ary_count ";

	$get_gallery_result = mysql_query( $get_gallery_sql, $link_id );

	

	

	//while( $gallery_ary_pointer++ < $gallery_ary_count )

		//$gallery_img_ary[] = '<img src="images/trans.gif"  width="100" height="75" border=0 style="border-color:#CCCCCC;">';





?>

<a name="<?php echo $get_item_obj->web_sub_content_item_id?>"></a>

<table border="0" cellpadding="10" cellspacing="1" width="100%" >

<?php





if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

{

	?>

	<tr>

		<td colspan="2" align="left" valign="top" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>"><b><?php echo $preview_item_title ?></b><?php



if( $preview_item_date != "" )

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

		<td colspan="2" align="left" valign="top" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>"><b><?php echo $get_item_obj->web_sub_content_item_title ?></b><?php



if( $get_item_obj->date != "" )

	echo " &nbsp; ".$get_item_obj->date;





?></td>

	</tr>

	<?php

	}

}











?>

	<tr <?php



if( $get_item_obj->bg_img != "" )

	echo 'style="background:url(\'gallery_sub_content/'. $get_item_obj->bg_img .'\') repeat }"';



?> >

		

		<td width="101" align="center" valign="top" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>">

			<table border="0" cellpadding="3" cellspacing="0">

<?php



	while( $get_gallery_obj = mysql_fetch_object($get_gallery_result) )

	{

		?><tr><td align="center"><a href="gallery_sub_content/original/<?php echo $get_gallery_obj->ori_file_name ?>" target="_blank"><img src="gallery_sub_content/small/<?php echo $get_gallery_obj->file_name ?>" border="0" ></a></td></tr><?php

	}



?>

			</table>

	  </td>



		<td align="left" valign="top" bgcolor="<?php echo $Content_BGColor_Ary2[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary2)];?>" style="padding:10">

			<table border="0" cellpadding="0" cellspacing="0" style="width:100%;height:100%;table-layout:fixed"><tr><td></td></tr><tr><td><?php

if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

	echo $preview_item_content;

else

	echo $get_item_obj->web_sub_content_item_html

?></td></tr></table>

		</td>

	</tr>



	<tr>

	</tr>

</table>

<br />





<?php



	$Content_BGColor_Ary_Pointer++;

}













?>