<?php   header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");













$file_name = EncodeHTMLTag($_POST["file_name"]);

$remark = EncodeHTMLTag($_POST["remark"]);

$g_order = $_POST["order"]|0;













if( $file_name != "" )

{



	$update_sql = "UPDATE `tbl_web_sub_content_gallery` SET

	`remark`='$remark',

	`g_order`=$g_order 

	WHERE `file_name`='$file_name'  ";



	$run_status = mysql_query($update_sql);



	if (!$run_status)

		$msg = str_replace(" ", "+", "�t�ο��~: " . mysql_error($link_id));

	else

		$msg = "�ۤ���s����";





	mysql_close();



}









?><script language="javascript">

window.opener.location.reload();

window.close();

</script>