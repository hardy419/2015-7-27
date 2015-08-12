<?php   
session_start();
header("Content-Type:text/html;charset=utf-8"); 
require_once '../public.inc.php';
require_once("../php-bin/function.php");


$admin_user = $_POST[admin_login];
$admin_pw   = md5($_POST[admin_password]);

if( $_SESSION["admin_login"] == "1" )
	header("Location: admin_frame.php");

else if( $_GET["action"] == "login" )
{
	$u_result = mysql_query("Select * FROM `tbl_teacher`  LEFT JOIN `tbl_access_control`  ON(tbl_teacher.teacher_id=tbl_access_control.teacher_id)      WHERE tbl_teacher.teacher_login='".$admin_user."' AND tbl_teacher.password='".$admin_pw."'", $link_id);
	if( $u_obj = mysql_fetch_object($u_result) )
	{
		$_SESSION["admin_login"] = "1";
		$_SESSION["access_teacher"] = $u_obj->access_teacher;
		$_SESSION["access_student"] = $u_obj->access_student;
		$_SESSION["access_class"] = $u_obj->access_class;
		$_SESSION["access_activity"] = $u_obj->access_activity; 
		$_SESSION["access_calendar"] = $u_obj->access_calendar;
		$_SESSION["access_news"] = $u_obj->access_news;
		$_SESSION["access_outside"] = $u_obj->access_outside;
		$_SESSION["access_file"] = $u_obj->access_file;
		$_SESSION["access_match"] = $u_obj->access_match;
		$_SESSION["access_content"] = $u_obj->access_content;
		$_SESSION["access_headmaster"] = $u_obj->access_headmaster;
		$_SESSION["access_topmark"] = $u_obj->access_topmark;
		$_SESSION["access_calendar_2"] = $u_obj->access_calendar_2;
		$_SESSION["access_assignment"] = $u_obj->access_assignment;
		$_SESSION["access_calendar_s"] = $u_obj->access_calendar_s;
		$_SESSION["access_calendar_h"] = $u_obj->access_calendar_h;
		$_SESSION["access_calendar_p"] = $u_obj->access_calendar_p;

		$_SESSION["kw_admin_user_id"] = $u_obj->teacher_id;
		$_SESSION["kw_admin_user_name"] = $u_obj->teacher_name;
        
		header("Location: admin_frame.php");
	}
	else
	{
		unset($_SESSION["admin_login"]);
		session_destroy();
					
		echo ("<script language='javascript'>");
		echo ("alert(\"Wrong password! Please try again.\");");
		echo ("history.go(-1)");
		echo ("</script>");
		exit();
	}
	
	mysql_close();
}
else
{

	?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Admin Control</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 18px;
}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #661143; }
.style16 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: red; }
-->
</style>
</head>
<body>

<form name="login_form" method="post" action="?action=login">

  <table width="402" height="327" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td height="54" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td height="150" colspan="3"><div align="center"><span class="style2">Admin Control Panel</span>
<?php

if ($msg!="" )
{
	?>
	<font class="style16"><br><br><?php echo $msg?></font>
	<?php
}

?>
      </div></td>
    </tr>
    <tr>
      <td width="66" height="20">&nbsp;</td>
      <td width="114" class="style3"><span class="style15">用戶名</span></td>
      <td class="style3"><input name="admin_login" type="text" class="style3" id="admin_login" size="17" maxlength="14">
      </td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td class="style15">密碼</td>
      <td class="style3"><input name="admin_password" type="password" class="style3" id="admin_password" size="17" maxlength="14">
      </td>
    </tr>
    <tr>
      <td height="46">&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <div align="left">
    <input name="login" type="submit" id="login" value="登入">
&nbsp;&nbsp;&nbsp; </div></td></tr>
    <tr>
      <td height="46">&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
  </table>
</form>

</body>
</html>

	<?php

}

?>