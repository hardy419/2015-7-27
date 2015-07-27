<?
// admin checking
require_once("../../php-bin/admin_check.php");
// Selection
require_once("user_add_selection.php");
?>
<html>
<head>
<title>學生管理</title>
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
sErrorMsg=FieldValidation('學生帳號',document.add_user.u_id.value,'',true,12);
if (sErrorMsg.length>0)
{
displayErrorMessage(sErrorMsg);
return false;
}
sErrorMsg='';
sErrorMsg=FieldValidation('學生密碼',document.add_user.u_pw.value,'',true,10);
if (sErrorMsg.length>0)
{
displayErrorMessage(sErrorMsg);
return false;
}
sErrorMsg='';
sErrorMsg=FieldValidation('學生姓名',document.add_user.u_name.value,'',true,50);
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
  <span class="main_small"><img src="admin_label.gif" width="500" height="35"></span>
  <table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="table1">
    <tr>
      <td  valign="top">
                <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
                  <form method="POST" name="add_user" action="user_add_process.php" onSubmit="return check_valid();">
                    <tr bgcolor="ECECEC">
                      <td colspan="2"><span class="subHead">新增學生資料</span></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td width="82" height="18">&nbsp;學生帳號:</td>
                      <td height="18"><input name="u_id" type=text class="style8" size="40">
                        <font color="#FF0000">* </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td height="18">&nbsp;密碼:</td>
                      <td height="18"><input name="u_pw" type=text class="style8" size="40">
                          <font color="#FF0000">* </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td height="18">&nbsp;學生姓名:</td>
                      <td height="18"><input name="u_name" type=text class="style8" size="40">
                          <font color="#FF0000">* </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td height="18">&nbsp;班別:</td>
                      <td height="18"><select class="style8" name="u_class">
                          <?
			require_once("../../php-bin/get_class_selection.php");
			for ($i=0;$i<count($class_list);$i++){ 
			?>
                          <option value="<?=$class_list[$i]["class_id"]?>"
				<?              
				if ($check_selected==$class_list[$i]["class_id"]){
					echo " selected";
				
				}
				?>
			>
                          <?=$class_list[$i]["class_name"]?>
                          </option>
                          <? }
                    ?>
                        </select>
                          <font color="#FF0000">* </font></td>
                    </tr>
                    <tr bgcolor="#FFFFFF">
                      <td height="18"> &nbsp;班號:</td>
                      <td height="18"><input name="u_class_no" type=text class="style8" id="u_class_no" size="5" maxlength="2"></td>
                    </tr>
                    <tr bgcolor="ECECEC">
                      <td>&nbsp;</td>
                      <td><input name="submit" type=submit class="style8" value="    確定新增    ">
                          <input name="back" type="button" class="style5" id="back" onClick="location.href='user.php'" value="返回">
                      </td>
                    </tr>
                  </form>
              </table>
      </td>
    </tr>
  </table>
</body>



</html>

