<?php

header("Content-Type:text/html;charset=utf-8"); 

$select_index_Ary = array();





for( $i=0; true; $i++ )

{

	$select_index_SQL    = "SELECT * FROM    tbl_web_content  

  WHERE    web_content_id=". $OutsideConnect_WebContent_ID ."    AND    web_content_id=". $select_index_Parent_ID.'  AND active=1  ';

	$select_index_Result = mysql_query( $select_index_SQL, $link_id );

	if( mysql_num_rows($select_index_Result) == 0 )

		break;



	$select_index_Obj       = mysql_fetch_object($select_index_Result);

	$select_index_Parent_ID = $select_index_Obj->web_content_parent_id;

	if( $i == 0 )

		$select_index_Ary[] = '<a href="w_search.php?id='.$select_index_Obj->web_content_id.'">'.$select_index_Obj->web_content_name.'</a>';

	else

		$select_index_Ary[]     = $select_index_Obj->web_content_name;



	if( $select_index_Parent_ID == 0 )

		break;

}

$select_index_Ary = array_reverse($select_index_Ary);







if( $search_Obj->web_sub_content_inner != 0 )

{

	$inner_sql = " SELECT * FROM  tbl_web_sub_content  WHERE  web_sub_content_id=".$search_Obj->web_sub_content_inner;

	$inner_result = mysql_query( $inner_sql, $link_id);

	if( $inner_obj = mysql_fetch_object($inner_result) )

	{

		$select_index_Ary[] = '<a href="w_sub_content.php?id='.$inner_obj->web_sub_content_id.'">'.$inner_obj->web_sub_content_title.'</a>';

	}

}



?>