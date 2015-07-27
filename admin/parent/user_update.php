<?
// admin checking
require_once("../../php-bin/admin_check.php");
// Selection
require_once("user_update_selection.php");
?>
<html>
<head>
<title>家長管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style3 {color: #666666}
-->
</style>
<script src="../../js/validation.js"></script>
<script lang="javascript">
<!--
function check_valid() {
var sErrorMsg;
sErrorMsg='';
sErrorMsg=FieldValidation('家長姓名',document.update_user.name.value,'',true,12);
if (sErrorMsg.length>0)
{
displayErrorMessage(sErrorMsg);
return false;
}
sErrorMsg='';
sErrorMsg=FieldValidation('用戶名',document.update_user.u_name.value,'',true,10);
if (sErrorMsg.length>0)
{
displayErrorMessage(sErrorMsg);
return false;
}
sErrorMsg='';
sErrorMsg=FieldValidation('密碼',document.update_user.u_psd.value,'',true,50);
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
<span class="main_small"><img src="admin_label.gif" width="500" height="35"></span><table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="table1">
    <tr>
      <td  valign="top">
                <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
                <form method="POST" name="update_user" action="user_update_process.php" onSubmit="return check_valid();">
					<input type='hidden' name='id' value='<?php echo $get_rows["id"];?>'/>
                    <tr bgcolor="ECECEC">
                      <td colspan="2"><span class="subHead">更改家長資料</span></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td width="82" height="18">&nbsp;家長姓名:</td>
                      <td height="18"><input name="name" type=text class="style8" id="name" value="<?=$get_rows["name"]?>" size="40">
                      <font color="#FF0000">* </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td height="18">&nbsp;用戶名:</td>
                      <td height="18"><input name="u_name" type=text class="style8" id="u_name" value="<?=$get_rows["u_name"]?>" size="40">
                          <font color="#FF0000">* </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td height="18">&nbsp;密碼:</td>
                      <td height="18"><input name="u_psd" type=text class="style8" id="u_psd" value="<?=$get_rows["u_psd"]?>" size="40">
                          <font color="#FF0000">* </font></td>
                    </tr>
                    <tr bgcolor="ECECEC">
                      <td>&nbsp;</td>
                      <td><input name="u_student_id" type=hidden class="style8" id="u_student_id" value="<?=$get_rows["student_id"]?>">
                      <input name="submit" type=submit class="style8" value="    確定更改    ">
                          <input name="back" type="button" class="style5" id="back" onClick="location.href='user.php'" value="返回">
                      </td>
                    </tr>
                  </form>
              </table>
      </td>
    </tr>
  </table>


  <p>&nbsp;</p>



</body>



</html>

