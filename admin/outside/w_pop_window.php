<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");











$id = EncodeHTMLTag($_GET["id"]);









if ( $id != "" )

{

	$file = $id;   // get the product no to be edit



	$get_sql = "SELECT * FROM `tbl_web_sub_content_gallery` WHERE `file_name` = '$file';";

	$result = mysql_query($get_sql,$link_id);

	$record = mysql_fetch_object($result);

	mysql_close();

}

else

{

	echo ("<script language='javascript'>");

	echo ("alert(\"No Product no. supply\");");

	echo ("history.go(-1)");

	echo ("</script>");

	exit();

}





?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

"http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>

<title>圖片檢示</title>

	<!-- no cache headers -->

	<meta http-equiv="Pragma" content="no-cache" />

	<meta http-equiv="Expires" content="-1" />

	<meta http-equiv="Cache-Control" content="no-cache" />

	<!-- end no cache headers -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

	background-color: #ECECEC;

}

.style8 {font-size: 12px}

.style9 {

	color: #FFFFFF;

	font-weight: bold;

}

-->

</style>

</head>



<body>

<form name="photo_edit" id="photo_edit" method="post" action="w_photo_edit_process.php">

<table width="100%" border="0" cellspacing="0" cellpadding="5">

  <tr align="center">

    <td align="center">&nbsp;</td>

    <td align="left"><img src="../../gallery_sub_content/small/<?php echo $file?>" border=0></td>

  </tr>

  <tr>

    <td align="right" nowrap class="style8">排序:</td>

    <td><input name="order" id="order" size="3" value="<?php echo $record->g_order;?>">(小排前)</td>

  </tr>

  <tr>

    <td align="right" nowrap class="style8">圖片描述:</td>

    <td><textarea name="remark" id="remark"  cols="20" rows="2"><?php echo $record->remark;?></textarea></td>

  </tr>

  <tr>

    <td align="right" class="style8">&nbsp;</td>

    <td><span class="style8">

	  <input type="hidden" name="file_name" value="<?php echo $file;?>">

      <input type="submit" name="Submit" value="更改">

    </span></td>

  </tr>

</table>

</form>

</body>

</html>