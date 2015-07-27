<?PHP
error_reporting(0);
session_start();

require_once("../php-bin/function.php");

if ($_GET["action"] == "login") {
		if (mysql_num_rows($u_result=mysql_query("Select * FROM `tbl_teacher` WHERE teacher_login ='".$_POST[admin_login]."' AND password ='".$_POST[admin_password]."'", $link_id)) > 0) {

			$get_rows=mysql_fetch_array($u_result,MYSQL_BOTH);
			
			$_SESSION[class_id] = "T";
			$_SESSION[name] = $get_rows[teacher_name];
			$_SESSION[sysname] = $get_rows[teacher_name];
			$_SESSION[id] = $get_rows[teacher_id];
			$_SESSION[teacher_level] = "1";
			if ($get_rows[allow_control_forum] == "Y"){
				$_SESSION[allow_control_forum] = "1";
			}
			else
				$_SESSION[allow_control_forum] = "0";

			if ($get_rows[admin] == "Y"){
				$_SESSION[admin_level] = "1";
			}
			else
				$_SESSION[admin_level] = "0";
			
			close_mysql();
			header("Location:admin_frame.php");
			
		} else {
			
			unset($_SESSION["admin_level"]);
			session_destroy();
			$logined = false;
			close_mysql();
			
			echo ("<script language='javascript'>");
			echo ("alert(\"Wrong password! Please try again.\");");
			echo ("history.go(-1)");
			echo ("</script>");
			exit();
		}
} else {

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
              <?PHP
if ($_GET[m]==1)
	echo "<font class=\"style16\"><br><br>Invalid Login ID or Password</font>";
?>
              <?PHP if ($msg!="" ){ ?>
              <font class="style16"><br>
              <br>
              <?PHP=$msg?>
              </font>
              <?PHP } ?>
      </div></td>
    </tr>
    <tr>
      <td width="66" height="20">&nbsp;</td>
      <td width="114" class="style3"><span class="style15">Login</span></td>
      <td class="style3"><input name="admin_login" type="text" class="style3" id="admin_login" size="17" maxlength="14">
      </td>
    </tr>
    <tr>
      <td height="29">&nbsp;</td>
      <td class="style15">Password</td>
      <td class="style3"><input name="admin_password" type="password" class="style3" id="admin_password" size="17" maxlength="14">
      </td>
    </tr>
    <tr>
      <td height="46">&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <div align="left">
    <input name="login" type="submit" id="login" value="Log In">
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

<?PHP } ?>
