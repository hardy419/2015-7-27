<?
// admin checking
require_once("../../php-bin/admin_check.php");
// Selection
require_once("apply_result_detial_selection.php");	
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

<font class="title">報名資料</font>
<table width="650" border="0" cellpadding="5" cellspacing="1">
  <tr >
    <td width="100%" ><br>
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td bgcolor="ECECEC"><font class="style4">檢視報名資料</font> </td>
        <td align="right" bgcolor="ECECEC">
              <?
			  	$dt = substr("$record->DateTime",0,4);
				$dt .= "年";
				$dt .= substr("$record->DateTime",4,2);
				$dt .= "月";
				$dt .= substr("$record->DateTime",6,2);
				$dt .= "日 ";
				$dt .= substr("$record->DateTime",8,2);
				$dt .= ":";
				$dt .= substr("$record->DateTime",10,2);
				echo $dt;
			  ?>
		</td>
      </tr>
       <form method="GET" name="update_user" action="apply_result.php">
          <tr>
            <td width="18%" height="18" bgcolor="#FFFFFF">&nbsp;中文姓名:</td>
            <td width="82%" height="18" bgcolor="FFFFFF"><?=$record->name_chi?></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;English Name :</td>
            <td height="18" bgcolor="FFFFFF"><?=$record->name_eng?></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;電話:</td>
            <td height="18" bgcolor="FFFFFF"><?=$record->tel?></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;電郵:</td>
            <td height="18" bgcolor="FFFFFF"><?=$record->email?></td>
          </tr>
		  <? if ($record->sq1!='') { ?>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><?=$record->sq1?></td>
            <td height="18" bgcolor="FFFFFF"><?=$record->special_question_1?></td>
          </tr>
		  <? } ?>
		  <? if ($record->sq3!='') { ?>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><?=$record->sq2?></td>
            <td height="18" bgcolor="FFFFFF"><?=$record->special_question_2?></td>
          </tr>
		  <? } ?>
		  <? if ($record->sq3!='') { ?>
          <tr>
            <td height="18" bgcolor="#FFFFFF"><?=$record->sq3?></td>
            <td height="18" bgcolor="FFFFFF"><?=$record->special_question_3?></td>
          </tr>
		  <? } ?> 
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;留言:</td>
            <td height="18" bgcolor="FFFFFF"><?=$record->remark?></td>
          </tr>
          <tr bgcolor="#ECECEC">
            <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="17%"><input name="id" type="hidden" id="id" value="<?=$_GET[post_id]?>">
                  <input name="t_name" type="hidden" id="t_name" value="<?=$_GET[t_name]?>"></td>
                <td width="83%"><input name="back" type="submit" id="back" value="返回"></td></tr>
            </table>
            </td>
          </tr>
        </form>
    </table></td>
  </tr>
</table>




</body>
</html>