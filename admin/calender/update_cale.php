<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("update_selection.php");


//calendarid post_id poster date title content posttime 

if ($_GET[type] == "P")
{
	$type = "P";
	$title = "傳媒報導";
	$logo = "admin_label_news.gif";
}else if ($_GET[type] == "S")
{
	$type = "S";
	$title = "最新消息";
	$logo = "admin_label_news.gif";
}else if ($_GET[type] == "T")
{
	$type = "T";
	$title = "校曆";
	$logo = "admin_label_school.gif";
}
else if ($_GET[type] == "H")
{
	$type = "H";
	$title = "家課日誌";
	$logo = "admin_label_school.gif";
}
else
{
	$type = "N";
	$title = "學校通告";
	$logo = "admin_label_notice.gif";
}





?><html>
<head>
<title>校曆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
</head>
<script>
function CheckForm()
{
	MSG = [];

	if( (document.form1.date_day.value|0) == 0 ||
	(document.form1.date_month.value|0) == 0 ||
	(document.form1.date_year.value|0) == 0 )
		MSG[MSG.length] = "請填寫日期";

	if( document.form1.title.value == "" )
		MSG[MSG.length] = "請填寫標題";

	//if( document.form1.content.value == "" )
		//MSG[MSG.length] = "請填寫內容";

	if( MSG.length > 0 )
	{
		alert(MSG.join("\n"));
		return false;
	}
	return true;
}
</script>
<form name="form1" method="post" action="update_cale_process.php?year=<?php echo $_GET[year]?>&month=<?php echo $_GET[month]?>&id=<?php echo $_GET[id]?>" enctype="multipart/form-data" onSubmit="return CheckForm();">
<body>

<span class="title"><strong><?php echo $title;?></strong></span><br>

  <table width="650" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
        <tr>
          <td bgcolor="ECECEC" class="subHead">更改事件</td>
          <td bgcolor="ECECEC">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp;開始日期:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
      <input name="date_year" id="date_year" type="text" size="4" maxlength="4" class="style8" value="<?php echo substr($get_rows[date], 0,4)?>">
      -
      <input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($get_rows[date], 5,2)?>">
      -
      <input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($get_rows[date], 8,2)?>">
&nbsp;<img src="../icons/calendar.gif" alt="calendar" width="16" height="16" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp; YYYY-MM-DD</font></td>
        </tr>
<?php   if ($get_rows[type] == "S"){ ?>
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp;結束<font class="style8">日期</font>:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
      <input name="exp_date_year" type="text" size="4" maxlength="4" class="style8" value="<?php echo (substr($get_rows[exp_date], 0,4)=='0000')?'':substr($get_rows[exp_date], 0,4)?>">
      -
      <input name="exp_date_month" type="text" size="2" maxlength="2" class="style8" value="<?php echo (substr($get_rows[exp_date], 5,2)=='00'?'':substr($get_rows[exp_date], 5,2))?>">
      -
      <input name="exp_date_day" type="text" size="2" maxlength="2" class="style8" value="<?php echo (substr($get_rows[exp_date], 8,2)=='00'?'':substr($get_rows[exp_date], 8,2))?>">
&nbsp;<img src="../icons/calendar.gif" alt="calendar" width="16" height="16" border="0" onClick="showCalendar('exp_date_year','exp_date_day','exp_date_month','exp_date_year','d m y')">&nbsp; YYYY-MM-DD</font></td>
        </tr>
<?php   } ?>
<?php
if( $type == "N" )
{
?>
        <tr bgcolor="FFFFFF">
          <td width="101" height="18" bgcolor="ECECEC"><font class="style8">&nbsp;序號:</font></td>
          <td width="496" height="18"><font class="style8">
            <input type="text" name="serial" size="10" maxlength="10" value="<?php echo $get_rows[serial]?>" >
          </font></td>
        </tr>
<?php
}
?>
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp;標題:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <input type="text" name="title" size="40" maxlength="125" value="<?php echo $get_rows[title]?>">
          </font></td>
        </tr>
        <tr class="admin_maintain_form_contents">
          <td bgcolor="ECECEC" class="admin_maintain_form_contents"><font class="style8">&nbsp;內容:</font></td>
          <td bgcolor="FFFFFF"><font class="style8">
            <textarea  name="content" cols="38" rows="6"><?php echo $get_rows[content]?></textarea>
          </font></td>
        </tr><!--
<?php   if ($get_rows[type] == "S"){ ?>

        <tr>
          <td bgcolor="ECECEC">最新消息:</td>
          <td bgcolor="FFFFFF">
			  <input name="is_news" type="radio" value="Y" <?php   if($get_rows[is_news]=='Y') { echo "checked"; } ?>>是
			  <input name="is_news" type="radio" value="N" <?php   if($get_rows[is_news]=='N') { echo "checked"; } ?>>否
		  </td>
        </tr>

<?php   } ?>
        <tr>
          <td bgcolor="ECECEC">相關連結名稱:</td>
          <td bgcolor="FFFFFF"><input name="link_text" type="text" id="link_text" value="<?php echo $get_rows[link_text]?>" size="40" maxlength="125"></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">相關連結網址:</td>
          <td bgcolor="FFFFFF"><input name="link_url" type="text" id="link_url" value="<?php   echo ($get_rows[link_url] == "" ? "http://" : $get_rows[link_url])?>" size="40" maxlength="125"></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">在新視窗開啟:</td>
          <td bgcolor="FFFFFF"><input name="new_window" type="radio" value="Y" <?php   echo ($get_rows[link_open_window] == "Y" ? "checked" : "")?>>
      是
        <input name="new_window" type="radio" value="N" <?php   echo ($get_rows[link_open_window] == "N" ? "checked" : "")?>>
      否</td>
        </tr-->
        <tr>
          <td bgcolor="ECECEC">&nbsp;附件:</td>
          <td bgcolor="FFFFFF"><input type="file" name="file">
              <?php   if (file_exists("../../calendar_attachment/" . $get_rows["file_name"]) && $get_rows["file_name"] !=""  && $delete != 1){ ?>
<BR><font color=red>(你目前已上載檔案 <a href="?year=<?php echo $_GET[year]?>&month=<?php echo $_GET[month]?>&id=<?php echo $_GET[id]?>&Dfile=1" class="style8"  onClick="return confirm('你確定要刪除這檔案嗎?')" >刪除檔案</a> )
      <?php   } ?>
    </font></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC"><font class="style8">&nbsp; </font></td>
          <td bgcolor="ECECEC">
              <input name="type" type="hidden" id="type" value="<?php echo $type?>">
              <input type="submit" name="Submit" value="    確定更改    ">
              <input type="reset" name="reset" value="重設"></td>
        </tr>
      </table></td>
    </tr>
</table>

  <p><a href=calendarview.php?type=<?php echo $type?>&year=<?php echo $_GET[year]?>&month=<?php echo $_GET[month]?>&id=<?php echo $_GET[id]?>>回上一頁</a></p>
</body>
</form>
</html>