<?php



// admin checking

require_once("../../admin.inc.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");





?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>班級管理 </title>

<link href="../../js/style.css" rel="stylesheet" type="text/css">

</head>

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







<body style="background-color: #FFFFFF">

<p><span class="title"><img src="admin_label.gif" width="500" height="35"></span></p>

<div align="center">

<table width="500" border="0" align="left" cellpadding="0" cellspacing="0" class="table1">

    <tr> 

      <td  valign="top"> <table width="650" border="0" cellpadding="5" cellspacing="0">

          <tr> 

            <td height="40" class="style3"><div align="left">

              <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="style8">

                <form method="POST" name="add_user" action="user_add_process.php" onSubmit="return check_valid();">

                  <tr bgcolor="ECECEC">

                    <td colspan="2" class="subHead">新增學生資料</td>

                  </tr>

                  <tr bgcolor="FFFFFF">

                    <td width="82" height="18"><font class="style8">&nbsp;學生帳號:</font></td>

                    <td height="18"><font class="style8">

                      <input name="u_id" type=text size="40">

                      <font color="#FF0000">*</font> </font></td>

                  </tr>

                  <tr bgcolor="FFFFFF">

                    <td height="18"><font class="style8">&nbsp;密碼:</font></td>

                    <td height="18"><font class="style8">

                      <input name="u_pw" type=text size="40">

                      <font color="#FF0000">*</font> </font></td>

                  </tr>

                  <tr bgcolor="FFFFFF">

                    <td height="18"><font class="style8">&nbsp;學生姓名:</font></td>

                    <td height="18"><font class="style8">

                      <input name="u_name" type=text  size="40">

                      <font color="#FF0000">*</font> </font></td>

                  </tr>

                  <tr bgcolor="FFFFFF">

                    <td height="18"><font class="style8">&nbsp;班別:</font></td>

                    <td height="18"><font class="style8">

                      <select  name="u_class">

                        <?php

			require_once("../../php-bin/get_class_selection.php");

		        require_once("../../php-bin/get_class_select_html.php");

                    ?>

                      </select>

                      <font color="#FF0000">*</font> </font></td>

                  </tr>

                  <tr bgcolor="ECECEC">

                    <td><font class="style8">&nbsp; </font></td>

                    <td><font class="style8">

                      <input name="submit" type=submit  value="確定新增">

                      <input name="back" type="button" id="back" onClick="history.go(-1)" value="回上一頁">

                    </font></td>

                  </tr>

                </form>

              </table>

              <span style="font-weight: 400"><font size="4" face="萬用中特圓"></font></span></div></td>

          </tr>

        </table>

      </td>

    </tr>

  </table>

</div>

</body>







</html>



