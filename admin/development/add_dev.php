<? require("../../php-bin/function.php"); ?>

<html>
<head>
<title>行事曆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {font-size: 4px}
-->
</style>
<form name="form1" method="post" action="add_dev_process.php">
<body>
<img src="admin_label_news.gif" width="500" height="35"><br>
<br>

<table width="650" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
        <tr bgcolor="ECECEC">
          <td colspan="2" class="subHead">新增事件</td>
        </tr>
        <tr class="small">
          <td bgcolor="ECECEC">&nbsp;類別:</td>
          <td bgcolor="#FFFFFF">
            <select name="develop_type" id="develop_type">
              <?
				require_once("../../php-bin/get_develop_type_selection.php");
		    	require_once("../../php-bin/get_develop_type_select_html.php");
            ?>
            </select>
          </td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td width="101" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;標題:</font></td>
          <td width="496" height="18"><font class="style8">
            <input name="title" type="text" size="40" maxlength="40">
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;內容:</font></td>
          <td height="18"><font class="style8">
            <textarea  name="content" cols="38" rows="6"></textarea>
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">老師名稱:</td>
          <td height="18"><input name="teacher_name" type="text" id="teacher_name" size="40"></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;日期:</font></td>
          <td height="18"><font class="style8">
      <input id='date_day' name="date_day" type="text" size="2" maxlength="2" class="style8">
      -
      <input id='date_month' name="date_month" type="text" size="2" maxlength="2" class="style8">
      -
	  <input id='date_year' name="date_year" type="text" size="4" maxlength="4" class="style8">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;DD-MM-YYYY </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">網頁檔案名稱:</td>
          <td height="18"><input name="link_url" type="text" id="link_url" size="40"> 
            e.g teacher_abc.html</td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">在新視窗開啟:</td>
          <td height="18"><input name="new_window" type="radio" value="Y">
      是
        <input name="new_window" type="radio" value="N" checked>
      否</td>
        </tr><!-- 
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;網頁類別:</td>
          <td height="18"><?=$title?>              </td>
        </tr>
         -->
        <tr bgcolor="ECECEC">
          <td><font class="style8">&nbsp; </font></td>
          <td><font class="style8">
            <input type="submit" name="Submit" value="    確定新增    ">
            <input type="reset" name="reset" value="重設">
          </font></td>
        </tr>
      </table></td>
    </tr>
</table>

  <p><a href=development.php?develop_type=<?=$_GET[develop_type]?>&year=<?=$_GET[year]?>&month=<?=$_GET[month]?>>回上一頁</a></p>
</body>
</form>
</html>
