<?
error_reporting(0);
// admin checking
require_once("../../php-bin/admin_check.php");
// Selection
require_once("user_update_selection.php");	
?>
<html>
<head>
<title>教師管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style4 {color: #006600}
-->
</style>
</head>
<script src="../../js/validation.js"></script>
<script lang="javascript">
<!--
function check_valid() {
	var sErrorMsg;
	sErrorMsg='';
	sErrorMsg=FieldValidation('教師帳號',document.update_user.u_id.value,'',true,12);
	if (sErrorMsg.length>0)
	{
	displayErrorMessage(sErrorMsg);
	return false;
	}
	sErrorMsg='';
	sErrorMsg=FieldValidation('教師密碼',document.update_user.u_pw.value,'',true,10);
	if (sErrorMsg.length>0)
	{
	displayErrorMessage(sErrorMsg);
	return false;
	}
	sErrorMsg='';
	sErrorMsg=FieldValidation('教師姓名',document.update_user.u_name.value,'',true,50);
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
        <td colspan="4" bgcolor="ECECEC"><font class="style4">更改教師資料</font> </td>
        </tr>
       <form method="POST" name="update_user" action="user_update_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">
          <tr>
            <td width="16%" height="18" bgcolor="#FFFFFF">&nbsp;教師帳號:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_id" type=text class="style8" id="u_id" value="<?=$get_rows["teacher_login"]?>" size="40"></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;密碼:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_pw" type=text class="style8" id="u_pw" value="<?=$get_rows["password"]?>" size="40"></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;教師姓名:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" id="u_name" value="<?=$get_rows["teacher_name"]?>" size="40"></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;電郵:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_email" type=text class="style8" id="u_email" value="<?=$get_rows["teacher_email"]?>" size="40"></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;職位:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="title" type=text class="style8" id="title" value="<?=$get_rows["title"]?>" size="40"></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;科目:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="subject" type=text class="style8" id="subject" value="<?=$get_rows["subject"]?>" size="40"></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;教師介紹:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="u_intro" cols="50" rows="7" id="u_intro"><?=$get_rows["teacher_intro"]?></textarea></td>
          </tr>
          <!--tr bgcolor="CCCCCC">
            <td height="25" valign="top" bgcolor="#FFFFFF">&nbsp;相片:</td>
            <td height="18" colspan="3" valign="top" bgcolor="FFFFFF"><input type="file" name="file">
                (尺寸: 100 X 150 px ) <br>
                <? if (file_exists("../../teacher_staff/photo/" . $get_rows["docoment_name"]) && $get_rows["docoment_name"] !=""  && $delete != 1){ ?>
&nbsp;<font color=red>(你目前已上載相片
<?=$get_rows["docoment_name"]?>
    <a href="?id=<?=$_GET[id]?>&Dfile=1" class="style8">刪除檔案</a> )</font>
    <? } ?>
            </td>
          </tr-->
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;在網頁顯示:</td>
            <td width="81" height="18" bgcolor="FFFFFF"><input name="show" type="checkbox" id="show" value="Y"
			<?
             if ($get_rows["show"] == "Y")
             	echo "checked";
            ?>
			>
    是</td>
            <td width="48" bgcolor="FFFFFF">&nbsp;排序:</td>
            <td width="356" bgcolor="FFFFFF"><input name="order" type=text class="style8" id="title3" value="<?=$get_rows["order"];?>" size="10" maxlength="3"></td>
          </tr>
          <!--tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;修改文章:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_edit" type="checkbox" id="u_edit3" value="Y" 
            <?
             if ($get_rows["allow_control_forum"] == "Y")
             	echo "checked";
            ?>
            >
            是</td>
          </tr-->
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;設定為管理員:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_admin" type="checkbox" id="u_edit" value="Y" 
            <?
             if ($get_rows["admin"] == "Y")
             	echo "checked";
            ?>
            >
            是</td>
          </tr>
          <tr bgcolor="#ECECEC">
            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16%"><input type=hidden name="u_teacher_id" value="<?=$get_rows["teacher_id"]?>"></td>
                <td width="84%"><input name="submit" type=submit class="style8" value="    確定更改   ">
                  <input name="back" type="button" id="back" onClick="location.href='user.php'" value="返回"></td>
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

