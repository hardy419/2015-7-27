<?php











$item_id_sql_ary = array();

$item_id_sql_ary[] = " `web_sub_content_item_id`=0 ";

while( $get_item_obj = mysql_fetch_object($get_item_result) )

{

	$item_counter++;



	$item_id_sql_ary[] = "  `web_sub_content_item_id`=$get_item_obj->web_sub_content_item_id  ";

}







$gallery_img_ary = array();

$gallery_remark_ary = array();

$gallery_ary_pointer = 0;

$gallery_column_count = 4;







$get_gallery_sql = "SELECT   *   FROM   `tbl_web_sub_content_gallery`   WHERE     ". implode(  $item_id_sql_ary, " OR " );

$get_gallery_sql .= " Order By g_order ASC"; 

$get_gallery_result = mysql_query( $get_gallery_sql, $link_id );







while( $get_gallery_obj = mysql_fetch_object($get_gallery_result) )

{

	$gallery_img_ary[] = '<a href="gallery_sub_content/original/'. $get_gallery_obj->ori_file_name .'" target="_blank"><img src="gallery_sub_content/small/'. $get_gallery_obj->file_name .'" border="0"></a>';

	$gallery_remark_ary[] = $get_gallery_obj->remark;

	$gallery_ary_pointer++;

}

while( $gallery_ary_pointer%$gallery_column_count != 0 )

{

	$gallery_img_ary[] = '<img src="images/trans.gif" width="100" height="72" border="0">';

	$gallery_remark_ary[] = $get_gallery_obj->remark;

	$gallery_ary_pointer++;

}































?>

<a name="<?php echo $get_item_obj->web_sub_content_item_id?>"></a>

<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF" style="table-layout:fixed">

<?php



	for( $i=0; $i<$gallery_ary_pointer/$gallery_column_count; $i++ )

	{



?>

	<tr valign="middle" <?php



if( $get_item_obj->bg_img != "" )

	echo 'style="background:url(\'gallery_sub_content/'. $get_item_obj->bg_img .'\') repeat;}"';



?>>

	<td width="25%" align="center" bgcolor="#F8EDF2">

			<table width="100%" border="0" cellspacing="1" cellpadding="5">

              <tr>

                <td align="center" valign="middle" width="100%" height="69"><?php echo $gallery_img_ary[0+$i*$gallery_column_count] ?></td>

              </tr>

              <tr>

                <td align="center" valign="middle"><?php echo str_replace("\n","<BR>",$gallery_remark_ary[0+$i*$gallery_column_count])?></td>

              </tr>

      </table>

	  </td>

		<td width="25%" align="center" bgcolor="#F8EDF2"><table width="100%" border="0" cellspacing="1" cellpadding="5">

          <tr>

                <td align="center" valign="middle" width="100%" height="69"><?php echo $gallery_img_ary[1+$i*$gallery_column_count] ?></td>

          </tr>

              <tr>

                <td align="center" valign="middle"><?php echo str_replace("\n","<BR>",$gallery_remark_ary[1+$i*$gallery_column_count])?></td>

          </tr>

      </table>	  </td>

		<td width="25%" align="center" bgcolor="#F8EDF2">

			<table width="100%" border="0" cellspacing="1" cellpadding="5">

              <tr>

                <td align="center" valign="middle" width="100%" height="69"><?php echo $gallery_img_ary[2+$i*$gallery_column_count] ?></td>

              </tr>

              <tr>

                <td align="center" valign="middle"><?php echo str_replace("\n","<BR>",$gallery_remark_ary[2+$i*$gallery_column_count])?></td>

              </tr>

      </table>	  </td>

		<td width="25%" align="center" bgcolor="#F8EDF2"><table width="100%" border="0" cellspacing="1" cellpadding="5">

          <tr>

                <td align="center" valign="middle" width="100%" height="69"><?php echo $gallery_img_ary[3+$i*$gallery_column_count] ?></td>

          </tr>

              <tr>

                <td align="center" valign="middle"><?php echo str_replace("\n","<BR>",$gallery_remark_ary[3+$i*$gallery_column_count])?></td>

          </tr>

      </table>      </td>

	</tr>

<?php



	}



?>

</table>

