<?php



//*****   List Content Tree Start  *****/





$select_index_Ary = array();

$select_index_Parent_ID = $content_ID;



while( $select_index_Parent_ID != 0 )

{

	$select_index_SQL    = "SELECT * FROM    tbl_web_content  

  WHERE     web_content_id=". $select_index_Parent_ID.'   ';



	$select_index_Result = mysql_query( $select_index_SQL, $link_id );

	if( mysql_num_rows($select_index_Result) == 0 )

		break;



	$select_index_Obj       = mysql_fetch_object($select_index_Result);

	if( $content_ID == $select_index_Obj->web_content_id )

		$select_index_Ary[]     = '<a href="?id='. $content_ID .'">'. $select_index_Obj->web_content_name .'</a>';

	else

		$select_index_Ary[]     = $select_index_Obj->web_content_name;

	$select_index_Parent_ID = $select_index_Obj->web_content_parent_id;

}

$select_index_Ary = array_reverse($select_index_Ary);





if( $sub_content_found )

{

	if( $sub_content_Obj->web_sub_content_inner != 0 )

	{

		$inner_sql = " SELECT * FROM  tbl_web_sub_content  WHERE  web_sub_content_id=".$sub_content_Obj->web_sub_content_inner;

		$inner_result = mysql_query( $inner_sql, $link_id);

		if( $inner_obj = mysql_fetch_object($inner_result) )

		{

			$select_index_Ary[] = "<a href='?sub_id=".$inner_obj->web_sub_content_id."'>".$inner_obj->web_sub_content_title."</a>";

		}

	}

	$select_index_title = $sub_content_Obj->web_sub_content_title;

	$select_index_Ary[] = '<a href="?sub_id='. $sub_content_Obj->web_sub_content_id .'">'. $sub_content_Obj->web_sub_content_title .'</a>';

}







for( $i=0; $i<count($lib_content_tree_link); $i++ )

{

	$select_index_Ary[$i] = '<a href="'. $lib_content_tree_link[$i] .'">'. $select_index_Ary[$i] .'</a>';	

}









echo implode( $select_index_Ary, " &gt; " );





//*****   List Content Tree End  *****/



/*

愛與教 > 學習領域 > 常識

*/

?>