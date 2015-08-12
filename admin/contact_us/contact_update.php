<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// Connect Database

require_once("../../php-bin/function.php");



// access control checking

require_once("z_access_control.php");





$link_fid=$_GET["id"];



$get_sql="select * from tbl_contact where contact_id=$link_fid";



$sql_result=mysql_query($get_sql,$link_id);

while($get_data=mysql_fetch_array($sql_result)){

	$contact_name=$get_data["contact_name"];

	$contact_tel=$get_data["contact_tel"];

	$contact_mail=$get_data["contact_mail"];

	$contact_text=$get_data["contact_text"];

	

	}

	

?>

<html>

<head>

<title>連結管理</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<style type="text/css">

<!--

.style2 {color: #006699}

.style4 {color: #006600}

.style5 {color: #666666}

-->

</style>

</head>

<script src="../../js/validation.js"></script>



</head>

<body>

<span class="title">聯絡我們</span><BR>

<table width="650" border="0" cellpadding="10" cellspacing="1" class="small">

        <tr align="left" valign="top" bgcolor="#FFFFFF">

          <td width="26%" height="35" class="style2"><span class="subHead">聯絡我們</span>：</td>

          <td width="74%"><a href="contact_us.php">搜索</a></td>

       

         

  </tr>

</table>

<table width="650" border="0" cellpadding="5" cellspacing="1">

  <tr >

    <td width="100%" >

      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">

      <tr valign="top">

        <td colspan="4" bgcolor="ECECEC"><font class="style4">聯絡資料</font> </td>

        </tr>

        <form method="POST" action="contact_update_process.php?action=update" enctype="multipart/form-data">

		 <tr>

            <td height="18" valign="top" bgcolor="#FFFFFF">姓名:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="contact_name" type=text class="style8" id="contact_name" size="40" value="<?php echo $contact_name; ?>"> <font color="#FF0000">* </font></td>

          </tr>

		

          <tr>

            <td width="128" height="18" bgcolor="#FFFFFF">電話:</td>

            <td width="425" height="18" colspan="3" bgcolor="FFFFFF"><input name="contact_tel" id="contact_tel" type=text class="style8" size="40" value="<?php echo $contact_tel; ?>">

            <font color="#FF0000">* </font></td>

          </tr>

          <tr>

            <td height="18" bgcolor="#FFFFFF">電郵:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="contact_mail" id="contact_mail" type=text class="style8" size="40" value="<?php echo $contact_mail; ?>">

              <font color="#FF0000">* </font></td>

          </tr>

          <tr>

            <td height="18" bgcolor="#FFFFFF">查詢內容:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="contact_text" cols="40" rows="5" id="contact_text"><?php echo $contact_text; ?></textarea></td>

          </tr>

         

          <tr bgcolor="#ECECEC">

            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="16%">&nbsp;</td>

                <td width="84%"><input name="submit" type="submit" class="style8" value="    確定新增    ">

                  &nbsp;

                  <input type="reset" value="重設"> &nbsp;

                  <input type="button" id="back" onClick="history.go(-1)" value="返回">

				 

				  <input type="hidden" name="id" id="id" value="<?php echo $link_fid; ?>">

				  </td></tr>

            </table>            </td>

          </tr>

        </form>

    </table></td>

  </tr>

</table>

</body>







</html>



