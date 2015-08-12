<?php













while( $get_item_obj = mysql_fetch_object($get_item_result) )

{

	$item_counter++;















	$gallery_img_ary = array();

	$gallery_remark_ary = array();

	$gallery_column_count = 4;

	$gallery_ary_pointer = 0;

	

	$get_gallery_sql = "SELECT   *   FROM   `tbl_web_sub_content_gallery`   WHERE   `web_sub_content_item_id`=". $get_item_obj->web_sub_content_item_id ." Order By g_order ASC "; // LIMIT $gallery_ary_count

	$get_gallery_result = mysql_query( $get_gallery_sql, $link_id );

	

	

	while( $get_gallery_obj = mysql_fetch_object($get_gallery_result) )

	{

		$gallery_img_ary[] = '<a href="gallery_sub_content/original/'. $get_gallery_obj->ori_file_name .'" target="_blank"><img src="gallery_sub_content/small/'. $get_gallery_obj->file_name .'" border="0"></a>';

		$gallery_remark_ary[] = $get_gallery_obj->remark;

		$gallery_ary_pointer++;

	}



	//while( $gallery_ary_pointer++ < $gallery_ary_count )

	while( $gallery_ary_pointer%$gallery_column_count != 0 )

	{

		//$gallery_img_ary[] = '<table border="0" cellpadding="0" cellspacing="1" width="100%" height="90" bgcolor="#CCCCCC"><tr><td bgcolor="#EFD8E2">&nbsp;</td></tr></table>';

		$gallery_img_ary[] = '<table border="0" cellpadding="0" cellspacing="1" width="100%" height="100%"><tr><td><img src="images/trans.gif" width="100%" height="100%" border="0"></td></tr></table>';

		$gallery_remark_ary[] = "";

		$gallery_ary_pointer++;

	}















?>

<a name="<?php echo $get_item_obj->web_sub_content_item_id?>"></a>

<table width="100%" cellpadding="5" cellspacing="1" border="0" style="table-layout:fixed">

<?php





if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

{

	?>

	<tr>

		<td colspan="4" align="left" valign="top" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>"><b><?php echo $preview_item_title ?></b><?php



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

		<td colspan="4" align="left" valign="top" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>"><b><?php echo $get_item_obj->web_sub_content_item_title ?></b><?php



if( $get_item_obj->date != "" )

	echo " &nbsp; ".$get_item_obj->date;





?></td>

	</tr>

	<?php

	}

}









	for( $i=0; $i<$gallery_ary_pointer/$gallery_column_count; $i++ )

	{

	?>

	<tr align="center" valign="middle">

		<td width="25%" align="center" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>">

			<table width="100%" height="100%" border="0" cellspacing="1" cellpadding="5">

              <tr>

                <td align="center" valign="middle" width="100%" height="69"><?php echo $gallery_img_ary[0+$i*$gallery_column_count]?></td>

              </tr>

              <tr>

                <td align="center" valign="top"><?php echo str_replace("\n","<BR>",$gallery_remark_ary[0+$i*$gallery_column_count])?></td>

              </tr>

      </table>	  </td>

		<td width="25%" align="center" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>">

			<table width="100%" height="100%" border="0" cellspacing="1" cellpadding="5">

              <tr>

                <td align="center" valign="middle" width="100%" height="69"><?php echo $gallery_img_ary[1+$i*$gallery_column_count]?></td>

              </tr>

              <tr>

                <td align="center" valign="top"><?php echo str_replace("\n","<BR>",$gallery_remark_ary[1+$i*$gallery_column_count])?></td>

              </tr>

      </table>	  </td>

		<td width="25%" align="center" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>">

			<table width="100%" height="100%" border="0" cellspacing="1" cellpadding="5">

              <tr>

                <td align="center" valign="middle" width="100%" height="69"><?php echo $gallery_img_ary[2+$i*$gallery_column_count]?></td>

              </tr>

              <tr>

                <td align="center" valign="top"><?php echo str_replace("\n","<BR>",$gallery_remark_ary[2+$i*$gallery_column_count])?></td>

              </tr>

      </table>	  </td>

		<td width="25%" align="center" bgcolor="<?php echo $Content_BGColor_Ary1[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary1)];?>">

			<table width="100%" height="100%" border="0" cellspacing="1" cellpadding="5">

              <tr>

                <td align="center" valign="middle" width="100%" height="69"><?php echo $gallery_img_ary[3+$i*$gallery_column_count]?></td>

              </tr>

              <tr>

                <td align="center" valign="top"><?php echo str_replace("\n","<BR>",$gallery_remark_ary[3+$i*$gallery_column_count])?></td>

              </tr>

      </table>	  </td>

  </tr>

	<?php

	}







	if( $get_item_obj->web_sub_content_item_html != "" )

	{

	?>

	<tr>

		<td colspan="4" bgcolor="<?php echo $Content_BGColor_Ary2[$Content_BGColor_Ary_Pointer%count($Content_BGColor_Ary2)];?>" style="margin-left:25">



<table border="0" cellpadding="0" cellspacing="0" style="width:100%;table-layout:fixed">

	<tr <?php



if( $get_item_obj->bg_img != "" )

	echo 'style="background:url(\'gallery_sub_content/'. $get_item_obj->bg_img .'\') repeat}"';



?> ><td><?php

if( $is_preview>0 && $get_item_obj->web_sub_content_item_id==$preview_item_id )

	echo $preview_item_content;

else

	echo $get_item_obj->web_sub_content_item_html

?></td>

	</tr>

</table>



		</td>

	</tr>

	<?php

	}





?>

</table>





<br />



<?php



	$Content_BGColor_Ary_Pointer++;

}









?>