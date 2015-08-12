<?php

require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking

mysql_query('SET NAMES utf8');





$u_id = $_GET[id]|0;






if ($_GET[Dfile] == 1 )
{
	// check the having file.
	$sql = "SELECT * FROM `tbl_teacher` WHERE teacher_id=$u_id ";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

	if ($get_rows[docoment_name] != "")
	{
		unlink("../../gallery_staff/". $get_rows[docoment_name]);
	
		$sql = "update `tbl_teacher` SET `docoment_name`='' WHERE teacher_id=$u_id ";
		mysql_query($sql,$link_id); 
	}
}





$get_sql = "Select * FROM   tbl_teacher  LEFT JOIN  tbl_access_control  ON(tbl_teacher.teacher_id=tbl_access_control.teacher_id)    WHERE    tbl_teacher.teacher_id=".$u_id;
$get_result = mysql_query($get_sql,$link_id);

if( mysql_num_rows($get_result) > 0 )
{

	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);




?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>教師管理</title>

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style4 {color: #006600}
.style5 {color: #FF0000}
-->
</style>
</head>
<script src="../../js/validation.js"></script>
<script lang="javascript">
<!--
function check_valid() {
	var sErrorMsg;
	sErrorMsg='';
	sErrorMsg=FieldValidation('教師帳號',document.update_user.u_id.value,'',true,25);
	if (sErrorMsg.length>0)
	{
	displayErrorMessage(sErrorMsg);
	return false;
	}
/*
	sErrorMsg='';
	sErrorMsg=FieldValidation('教師密碼',document.update_user.u_pw.value,'',true,10);
	if (sErrorMsg.length>0)
	{
	displayErrorMessage(sErrorMsg);
	return false;
	}*/
	sErrorMsg='';
	sErrorMsg=FieldValidation('教師姓名',document.update_user.u_name.value,'',true,25);
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
    <td width="100%" ><br>
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td colspan="4" bgcolor="ECECEC"><font class="style4">更改教師資料</font> </td>
        </tr>
       <form method="POST" name="update_user" action="user_update_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">
          
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;教師姓名:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" id="u_name" value="<?php echo $get_rows["teacher_name"]?>" size="40"></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">電郵:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_email" type=text class="style8" id="u_email" value="<?php echo $get_rows["teacher_email"]?>" size="40"></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;職位:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF">

<select name="type_id" id="type_id">
                <option value="0"></option>
                <?php



$get_type_result = mysql_query( " SELECT *  FROM  tbl_teacher_type ", $link_id );
while( $type_obj = mysql_fetch_object($get_type_result) )
{
	if( $get_rows["type_id"] == $type_obj->id )
		echo '<option value="'. $type_obj->id .'" selected>'. $type_obj->type_name  .'</option>';
	else
		echo '<option value="'. $type_obj->id .'">'. $type_obj->type_name  .'</option>';
}



?>
            </select></td>
          </tr>
          
<?php

if( $get_rows["got_degree"] == 0 )
	echo '<option value="0" selected>否</option><option value="1">是</option>';
else
	echo '<option value="0">否</option><option value="1" selected>是</option>';

?></select></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;已接受專業培訓:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="take_train" id="take_train"><?php

if( $get_rows["take_train"] == 0 )
	echo '<option value="0" selected>否</option><option value="1">是</option>';
else
	echo '<option value="0">否</option><option value="1" selected>是</option>';

?></select></td>
          </tr>


          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;通過英文基準試:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="pass_english_test" id="pass_english_test"><?php

if( $get_rows["pass_english_test"] == 0 )
	echo '<option value="0" selected>否</option><option value="1">是</option>';
else
	echo '<option value="0">否</option><option value="1" selected>是</option>';

?></select></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;通過普通話基準試:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="pass_putonghua_test" id="pass_putonghua_test"><?php

if( $get_rows["pass_putonghua_test"] == 0 )
	echo '<option value="0" selected>否</option><option value="1">是</option>';
else
	echo '<option value="0">否</option><option value="1" selected>是</option>';

?></select></td>
          </tr>-->



          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">&nbsp;教學經驗:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="year_experience" type=text class="style8" id="year_experience" size="2" maxlength="2" value="<?php echo $get_rows["year_experience"]?>"></td>
          </tr>
		  <?php
		  $user_data=$link->select_data('tbl_usermeta', '*', 'user_id='.$u_id);
		  if(is_array($user_data))foreach($user_data as $k=>$v){
		  	$user_data_rows[$v['meta_key']]=$v['meta_value'];
		  }
		  mysql_query('SET NAMES utf8');
		  
		  $uaer_meta_data=user_meta_data();
		  foreach($uaer_meta_data as $key => $val):
		  var_dump($val);
		  ?>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF"><?php echo $val?>:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="<?php echo $key?>" cols="50" rows="4"><?php echo $user_data_rows[$key]?></textarea></td>
          </tr>
		  <?php
		  endforeach;
		  ?>
          <tr bgcolor="CCCCCC">
            <td height="25" valign="top" bgcolor="#FFFFFF">&nbsp;相片:</td>
            <td height="18" colspan="3" valign="top" bgcolor="FFFFFF"><input type="file" name="file">
                (尺寸: 91 X 104 px ) <br>
                <?php   if (file_exists("../../gallery_staff/" . $get_rows["docoment_name"]) && $get_rows["docoment_name"] !=""  && $delete != 1){ ?>
&nbsp;<font color=red>(你目前已上載相片
<?php echo $get_rows["docoment_name"]?>
    <a href="?id=<?php echo $_GET[id]?>&Dfile=1" class="style8" onClick="return confirm('你確定要刪除這個檔案嗎？');">刪除檔案</a> )</font>
    <?php   } ?>            </td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">是否在網頁顯示:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="show" id="show">
              <option value="N">否</option>
              <option value="Y" <?php if($get_rows["show"]=='Y'):?>selected="selected"<?php endif;?>>是</option>
            </select>            </td>
          </tr>
          <tr bgcolor="#ECECEC">
            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16%"><input type=hidden name="u_teacher_id" value="<?php echo $get_rows["teacher_id"]?>"></td>
                <td width="84%"><input type=submit class="style8" value="    確定更改   "> &nbsp;
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
</html><?php
	mysql_close();


}
else
{
	header("Location: user.php");

}
	
?>