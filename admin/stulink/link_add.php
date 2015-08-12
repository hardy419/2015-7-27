<?php

header("Content-Type:text/html;charset=utf-8"); 


// Connect Database

require_once("../../php-bin/function.php");



require("link_selection.php");


?>

<html>

<head>

<title>學科網站管理</title>

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

<script lang="javascript">

<!--







function check_valid()

{

	var sErrorMsg;

	sErrorMsg='';

	sErrorMsg=FieldValidation('教師帳號',document.add_user.u_id.value,'',true,25);

	if (sErrorMsg.length>0)

	{

	displayErrorMessage(sErrorMsg);

	return false;

	}

	sErrorMsg='';

	sErrorMsg=FieldValidation('教師密碼',document.add_user.u_pw.value,'',true,10);

	if (sErrorMsg.length>0)

	{

	displayErrorMessage(sErrorMsg);

	return false;

	}

	sErrorMsg='';

	sErrorMsg=FieldValidation('教師姓名',document.add_user.u_name.value,'',true,25);

	if (sErrorMsg.length>0)

	{

	displayErrorMessage(sErrorMsg);

	return false;

	}

}

//-->

</script>

</head>

<body>

<span class="title">學科網站管理</span><BR>

<table width="650" border="0" cellpadding="10" cellspacing="1" class="small">

        <tr align="left" valign="top" bgcolor="#FFFFFF">

          <td width="30%" height="35" class="style2"><span class="style4">學科網站管理</span>：</td>

          <td width="20%"><a href="link.php">搜索網頁</a></td>

          <td width="20%"><a href="link_add.php">新增學科網站</a></td>

         

        </tr>

</table>

<table width="650" border="0" cellpadding="5" cellspacing="1">

  <tr >

    <td width="100%" >

      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">

      <tr valign="top">

        <td colspan="4" bgcolor="ECECEC"><font class="style4">新增學科網站資料</font> </td>

        </tr>

        <form method="POST" name="add_user" action="link_add_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">

		 <tr>

            <td height="18" valign="top" bgcolor="#FFFFFF">序號:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="link_sort" type=text class="style8" id="link_sort" size="40">

            <font color="#FF0000">* </font></td>

          </tr>

		

          <tr>

            <td width="128" height="18" bgcolor="#FFFFFF">網頁名稱:</td>

            <td width="425" height="18" colspan="3" bgcolor="FFFFFF"><input name="link_name" id="link_name" type=text class="style8" size="40">

            <font color="#FF0000">* </font></td>

          </tr>

          <tr>

            <td height="18" bgcolor="#FFFFFF">學科網站網址:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="link_address" id="link_address" type=text class="style8" size="40">

              <font color="#FF0000">* </font>格式：http://www.abc.com</td>

          </tr>
          <tr>

            <td height="18" bgcolor="#FFFFFF">網站LOGO:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><input type="file" name="link_logo" id="link_logo" style="display:none" onChange="document.add_user.link_pic1.value=this.value">
         <input name="link_pic1" type="text" id="link_pic1" size="25" value=""><input type="button" size="20" value="瀏覽文件" onClick="document.add_user.link_logo.click();"></td>

          </tr>
          <tr>

            <td height="18" bgcolor="#FFFFFF">簡介:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="link_remark" cols="40" rows="4" class="style8" id="link_remark"></textarea>

            <font color="#FF0000">* </font></td>

          </tr>

         

          <tr bgcolor="#ECECEC">

            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="16%">&nbsp;</td>

                <td width="84%"><input name="submit" type="submit" class="style8" value="    確定新增    ">

                  &nbsp;

                  <input type="reset" value="重設"> &nbsp;

                  <input type="button" id="back" onClick="history.go(-1)" value="返回"></td></tr>

            </table>            </td>

          </tr>

        </form>

    </table></td>

  </tr>

</table>

</body>







</html>



