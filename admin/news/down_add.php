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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>周年報告</title>

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {color: #006699}
.style4 {color: #006600}
.style5 {color: #666666}
-->
</style>
</head>
<script src="../../js/validation.js"></script>

</head>
<body>

<p class="title">周年報告</p><BR>
<table width="650" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="30%" height="35"><span class="style2"><span class="style4">周年報告管理</span>：</span></td>
          <td width="20%"><a href="down_add.php">新增</a></td>
          <td width="20%">&nbsp;</td>
          <td></td>
        </tr>
      </table>
<table width="650" border="0" cellpadding="5" cellspacing="1">
  <tr >
    <td width="100%" >
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td colspan="4" bgcolor="ECECEC"><font class="style4">新增資料</font> </td>
        </tr>
        <form method="POST" name="add_user" action="down_add_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">

          <tr>
            <td height="18" bgcolor="#FFFFFF">序號:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF">  <input name="order" type="text" id="order" size="10" maxlength="10" value="100">
           </td>
          </tr>
         <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;開始日期:</font></td>
          <td height="18"><font class="style8">
      <input name="date_year" id="date_year" type="text" size="4" maxlength="4" class="style8">
      -
      <input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8">
      -
	  <input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8">
&nbsp;<img src="../icons/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;YYYY-MM-DD </font></td>
        </tr> 
           <tr>
            <td height="18" bgcolor="#FFFFFF">類別:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"> <select name="a_type" id="a_type">
            <option value="1" >報告</option>
            <option value="2" >計畫書</option>
            <option value="3" >School-based Plan on the Use of the English Enhancement Grant</option>
            </select>
           </td>
          </tr>       
          <tr>
            <td height="18" bgcolor="#FFFFFF">標題:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" size="40">
              <font color="#FF0000">* </font></td>
          </tr>


          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">內容:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="a_content" cols="50" rows="4"></textarea></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">下載:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input type="file" name="a_file" id="a_file" style="display:none" onChange="document.add_user.link_pic1.value=this.value">
         <input name="link_pic1" type="text" id="link_pic1" size="25" value=""><input type="button" size="20" value="瀏覽文件" onClick="document.add_user.a_file.click();"></td>
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

