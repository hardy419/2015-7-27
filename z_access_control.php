<?php

 if( ! session_id() )

	session_start();





if( ($_SESSION["admin_login"]|0)<=0 || ($_SESSION["access_teacher"]|0)==0)

{

	exit();

} 


/*

function access_detail_check( $category_id )

{

	global $link_id;

	$cms_category = 6;



	$sql = " SELECT * FROM tbl_access_control_detail  AS d 

LEFT JOIN   tbl_file_type   AS ft  ON(	d.category_id=ft.type_id )

WHERE

	d.teacher_id=".$_SESSION["kw_admin_user_id"]."  AND

	d.cms_category=".$cms_category."  AND

	d.category_id=".$category_id."

";



	$result = mysql_query($sql,$link_id); 

	if( mysql_num_rows($result) <= 0 )

		exit("access denial.<BR><a href='#' onclick='history.go(-1)'>Go Back</a>");

}
*/
?>