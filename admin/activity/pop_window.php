<?php
    	require("../../php-bin/function.php");

        if (isset($_GET["id"])) {
            $file = $_GET["id"];   // get the product no to be edit
		
			$get_sql = "SELECT * FROM `tbl_gallery` WHERE `file_name` = '$file';";
			$result = mysql_query($get_sql,$link_id);
			$record = mysql_fetch_object($result);
		}
        else{
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
<form name="photo_edit" id="photo_edit" method="post" action="photo_edit_process.php">
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr align="center">
    <td align="center">&nbsp;</td>
    <td align="left"><img src="../../gallery/small/<?=$file?>" border=0></td>
  </tr>
  <!--tr>
    <td align="right" nowrap class="style8">標題:</td>
    <td><input name="remark" type="text" id="remark" size="10" maxlength="50" value="<?=$record->remark;?>"></td>
  </tr-->
  <tr>
    <td align="right" nowrap class="style8">排序:</td>
    <td><input name="order" type="text" id="order" size="10" maxlength="50" value="<?=$record->order;?>"></td>
  </tr>
  <tr>
	<td align="right" nowrap class="style8">&nbsp;</td>
	<td colspan='2'><p>(數字越小越靠前,數字0為封面圖片)</p></td>
  </tr>
  <tr>
    <td align="right" class="style8">&nbsp;</td>
    <td><span class="style8">
	  <input type="hidden" name="file_name" value="<?=$file;?>">
      <input type="submit" name="Submit" value="更改">
    </span></td>
  </tr>
</table>
</form>
</body>
</html>