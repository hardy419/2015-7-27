<?php
require_once("../../admin.inc.php");

header("Content-Type:text/html;charset=utf-8");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");




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

<img src="admin_label.gif" width="500" height="35"><BR>
<table width="650" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="30%" height="35"><span class="style2"><span class="style4">教師管理</span>：</span></td>
          <td width="20%"><a href="user.php">搜索教師</a></td>
          <td width="20%"><a href="user_add.php">新增教師</a></td>
          <td><a href="type_update.php">教師職位管理</a></td>
        </tr>
      </table>
<table width="650" border="0" cellpadding="5" cellspacing="1">
  <tr >
    <td width="100%" >
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td colspan="4" bgcolor="ECECEC"><font class="style4">新增教師資料</font> </td>
        </tr>
        <form method="POST" name="add_user" action="user_add_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">
          <!--<tr>
            <td width="128" height="18" bgcolor="#FFFFFF">教師帳號:</td>
            <td width="425" height="18" colspan="3" bgcolor="FFFFFF"><input name="u_id" type=text class="style8" size="40">
            <font color="#FF0000">* </font></td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">密碼:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_pw" type=password class="style8" size="40">
              <font color="#FF0000">* </font></td>
          </tr>-->
          <tr>
            <td height="18" bgcolor="#FFFFFF">教師姓名:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" size="40">
              <font color="#FF0000">* </font></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">電郵:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_email" type=text class="style8" id="u_email" size="40"></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;職位:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF">
<select name="type_id" id="type_id">
                <option value="0"></option><?php



$get_type_result = mysql_query( " SELECT *  FROM  tbl_teacher_type ", $link_id );
while( $type_obj = mysql_fetch_object($get_type_result) )
{
	echo '<option value="'. $type_obj->id .'" >'. $type_obj->type_name  .'</option>';
}



?>
            </select></td>
          </tr>
          <!--<tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">行政職務:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea rows="3" cols="50" name="duty_admin" class="style8" id="duty_admin" ></textarea></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">教學職務:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea rows="3" cols="50" name="duty_teach" class="style8" id="duty_teach" ></textarea></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">教育科目&班別:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea rows="5" cols="50" name="subject" class="style8" id="subject" ></textarea></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">持學位:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="got_degree" id="got_degree"><option value="0">否</option><option value="1">是</option></select></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">已接受專業培訓:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="take_train" id="take_train"><option value="0">否</option><option value="1">是</option></select></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;通過英文基準試:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="pass_english_test" id="pass_english_test"><option value="0">否</option><option value="1">是</option></select></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">通過普通話基準試:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="pass_putonghua_test" id="pass_putonghua_test"><option value="0">否</option><option value="1">是</option></select></td>
          </tr>-->
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">教學經驗:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="year_experience" type=text class="style8" id="year_experience" size="2" maxlength="2"></td>
          </tr>
		  <?php
		  $uaer_meta_data=user_meta_data();
		  foreach($uaer_meta_data as $key => $val):
		  ?>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF"><?php echo $val?>:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="<?php echo $key?>" cols="50" rows="4"></textarea></td>
          </tr>
		  <?php
		  endforeach;
		  ?>
          <tr>
            <td height="18" bgcolor="#FFFFFF">相片:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input type="file" name="file"> 
            (尺寸: 91 X 104 px ) </td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">是否在網頁顯示:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="show" id="show">
              <option value="N">否</option>
              <option value="Y">是</option>
            </select>
            </td>
          </tr>
          <tr bgcolor="#ECECEC">
            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16%">&nbsp;</td>
                <td width="84%"><input type="submit" class="style8" value="    確定新增    "> &nbsp;
                  <input type="reset" value="重設"> &nbsp;
                  <input type="button" id="back" onClick="history.go(-1)" value="返回"></td>
              </tr>
            </table>            </td>
          </tr>
        </form>
    </table></td>
  </tr>
</table>
</body>



</html>

