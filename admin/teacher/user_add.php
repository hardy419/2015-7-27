<?
// admin checking
require_once("../../php-bin/admin_check.php");
// Selection
require_once("user_add_selection.php");	
?>
<html>
<head>
<title>教師管理</title>
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
function check_valid() {
	var sErrorMsg;
	sErrorMsg='';
	sErrorMsg=FieldValidation('教師帳號',document.add_user.u_id.value,'',true,12);
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
	sErrorMsg=FieldValidation('教師姓名',document.add_user.u_name.value,'',true,50);
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

<img src="admin_label.gif" width="500" height="35">
<table width="650" border="0" cellpadding="5" cellspacing="1">
  <tr >
    <td width="100%" ><br>
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td colspan="4" bgcolor="ECECEC"><font class="style4">新增教師資料</font> </td>
        </tr>
        <form method="POST" name="add_user" action="user_add_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">
          <tr>
            <td width="68" height="18" bgcolor="#FFFFFF">&nbsp;教師帳號:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_id" type=text class="style8" size="40">
            <font color="#FF0000">* </font></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;密碼:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_pw" type=text class="style8" size="40">
              <font color="#FF0000">* </font></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;教師姓名:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" size="40">
              <font color="#FF0000">* </font></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">電郵:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_email" type=text class="style8" id="u_email" size="40"></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;職位:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="title" type=text class="style8" id="title" size="40"></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;科目:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="subject" type=text class="style8" id="subject" size="40"></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">教師介紹:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="u_intro" cols="50" rows="7" id="u_intro"></textarea></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;相片:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input type="file" name="file"> 
            (尺寸: 100 X 150 px ) </td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">在網頁顯示:</td>
            <td width="81" height="18" bgcolor="FFFFFF"><input name="show" type="checkbox" id="show" value="Y">
            是</td>
            <td width="48" bgcolor="FFFFFF">排序:</td>
            <td width="356" bgcolor="FFFFFF"><input name="order" type=text class="style8" id="title3" value="100" size="10" maxlength="3"></td>
          </tr>
          <!--tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;修改文章:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_edit" type="checkbox" id="u_edit" value="Y">
            是</td>
          </tr-->
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;設定為管理員:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_admin" type="checkbox" id="u_admin" value="Y">
            是</td>
          </tr>
          <tr bgcolor="#ECECEC">
            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16%">&nbsp;</td>
                <td width="84%"><input name="submit" type=submit class="style8" value="    確定新增    ">
                  <input name="back" type="button" id="back" onClick="location.href='user.php';" value="返回"></td>
              </tr>
            </table>
            </td>
          </tr>
        </form>
    </table></td>
  </tr>
</table>
</body>



</html>

