<?php



/*

學習目標   首要目標   活動及比賽   相關網站   佳作共享  　

*/







//*****   Sub Content List - Start   *****/



$sub_content_list_column_count = 4;



$sub_content_list_pointer = 0;

$sub_content_list_link_ary = array();

$sub_content_list_title_ary = array();



$sub_content_list_sql = " SELECT  DISTINCT wsci.web_sub_content_id,  wsc.web_sub_content_title

 FROM  tbl_web_sub_content_item  AS wsci   LEFT JOIN  tbl_web_sub_content  AS wsc

 ON ( wsc.web_sub_content_id = wsci.web_sub_content_id ) 

 WHERE wsc.web_content_id = ". $content_ID."  AND  wsc.web_sub_content_inner=0

 Group BY  wsci.web_sub_content_id

 ORDER BY  wsc.web_sub_content_order ASC, wsc.web_sub_content_id ASC

";



$sub_content_list_result = mysql_query( $sub_content_list_sql, $link_id );



while( $sub_content_list_obj = mysql_fetch_object($sub_content_list_result) )

{

	if( $sub_content_ID == $sub_content_list_obj->web_sub_content_id )

		$sub_content_list_link_ary[] = '?sub_id='. $sub_content_list_obj->web_sub_content_id.'" class="subcontentNow';

	else

		$sub_content_list_link_ary[] = "?sub_id=". $sub_content_list_obj->web_sub_content_id;

	$sub_content_list_title_ary[] = $sub_content_list_obj->web_sub_content_title;

	$sub_content_list_pointer++;

}

while( $sub_content_list_pointer%$sub_content_list_column_count != 0  )

{

	$sub_content_list_link_ary[] = "#";

	$sub_content_list_title_ary[] = "";

	$sub_content_list_pointer++;

}



//*****   Sub Content List - End   *****/





























?>

<table width="100%"  height="25" border="0" cellpadding="5" >

<?php





for( $i=0; $i<$sub_content_list_pointer/$sub_content_list_column_count; $i++ )

{



?>

	<tr>

		<td width="25%" height="15" align="left" valign="top"><span class="style2"><a href="<?php echo $sub_content_list_link_ary[0+$i*$sub_content_list_column_count] ?>" class="subcontent"><?php echo $sub_content_list_title_ary[0+$i*$sub_content_list_column_count] ?></a></span></td>

		<td width="25%" height="15" align="left" valign="top"><span class="style2"><a href="<?php echo $sub_content_list_link_ary[1+$i*$sub_content_list_column_count] ?>" class="subcontent"><?php echo $sub_content_list_title_ary[1+$i*$sub_content_list_column_count] ?></a></span></td>

		<td  width="25%" height="15" align="left" valign="top"><span class="style2"><a href="<?php echo $sub_content_list_link_ary[2+$i*$sub_content_list_column_count] ?>" class="subcontent"><?php echo $sub_content_list_title_ary[2+$i*$sub_content_list_column_count] ?></a></span></td>

		<td  width="25%" height="15" align="left" valign="top"><span class="style2"><a href="<?php echo $sub_content_list_link_ary[3+$i*$sub_content_list_column_count] ?>" class="subcontent"><?php echo $sub_content_list_title_ary[3+$i*$sub_content_list_column_count] ?></a></span></td>

	</tr>

<?php



}



?>

</table>	