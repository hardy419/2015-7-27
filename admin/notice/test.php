<?php
require_once("../../php-bin/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script language="JavaScript" src="calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="calendar-en.js" type="text/javascript"></script>
<LINK rel="StyleSheet" type="text/css" href="style.css">
<LINK rel="stylesheet" href="calendar.css" type="text/css">
</head>

<body>
 <form method="post" name="form1" id="form1" action="down_add_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">
<table>
  <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;開始日期:</font></td>
          <td height="18"><font class="style8">
      <input name="date_year" type="text" size="2" id="date_year" maxlength="4" class="style8" value="<?php echo date('Y',time());?>">
      -
      <input name="date_month" type="text" size="2" id="date_month" maxlength="2" class="style8" value="<?php echo date('m',time());?>">
      -
	  <input name="date_day" type="text" size="2" id="date_day" maxlength="2" class="style8" value="<?php echo date('d',time());?>">
&nbsp;<img src="../icons/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;YYYY-MM-DD </font></td>
        </tr> </table></form>
</body>
</html>