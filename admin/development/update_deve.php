<?
require_once("update_selection.php"); 
?>
<html>
<head>
<title>行事曆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
</head>
<form name="form1" method="post" action="update_deve_process.php?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>&develop_type=<?=$_GET[develop_type]?>">
<body>
<img src="admin_label_news.gif" width="500" height="35"><br>

<br>
  <table width="650" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
        <tr>
          <td bgcolor="ECECEC" class="subHead">更改事件</td>
          <td bgcolor="ECECEC">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">類別:</td>
          <td bgcolor="FFFFFF">
            <select name="develop_type" id="develop_type">
              <?
				require_once("../../php-bin/get_develop_type_selection.php");
				$type_selected = $get_rows[develop_type];
		    	require_once("../../php-bin/get_develop_type_select_html.php");
            ?>
          </select></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp;標題:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <input type="text" name="title" maxlength="40" value="<?=$get_rows[title]?>">
          </font></td>
        </tr>
        <tr class="admin_maintain_form_contents">
          <td bgcolor="ECECEC" class="admin_maintain_form_contents"><font class="style8">&nbsp;內容:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <textarea  name="content" cols="50" rows="6"><?=$get_rows[content]?></textarea>
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">老師名稱:</td>
          <td height="18"><input name="teacher_name" type="text" id="teacher_name" value="<?=$get_rows[teacher_name]?>" size="40"></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp;日期:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <input name="date_year" type="text" size="4" maxlength="4" class="style8" value="<?=substr($get_rows[date], 0,4)?>">
      -
      <input name="date_month" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 5,2)?>">
      -
      <input name="date_day" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 8,2)?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; YYYY-MM-DD</font></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">Link URL:</td>
          <td bgcolor="FFFFFF"><input name="link_url" type="text" id="link_url" value="<? echo $get_rows[link_url] ?>" size="50"></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">在新視窗開啟:</td>
          <td bgcolor="FFFFFF"><input name="new_window" type="radio" value="Y" <? echo ($get_rows[link_open_window] == "Y" ? "checked" : "")?>>
      是
        <input name="new_window" type="radio" value="N" <? echo ($get_rows[link_open_window] == "N" ? "checked" : "")?>>
      否</td>
        </tr><!-- 
        <tr>
          <td bgcolor="ECECEC">網頁&nbsp;類別:</td>
          <td bgcolor="FFFFFF"><?=$title?>              </td>
        </tr>
         -->
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp; </font></td>
          <td bgcolor="ECECEC"><input type="submit" name="Submit" value="    確定更改    ">
              <input type="reset" name="reset" value="重設"></td>
        </tr>
      </table></td>
    </tr>
</table>

  <p><a href=develop_view.php?develop_type=<?=$_GET[develop_type]?>&year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>>回上一頁</a></p>
</body>
</form>
</html>
