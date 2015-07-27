<?
	require("../../php-bin/function.php");
	
	$school_year = $_GET[school_year];

    	//$type = "P";
    	//$title = "家長通告";
    	
	$year = date("Y");
	$month = date("m");
	$day = date("d");

	$year2 = date("Y");
	$month2 = date("m");
	$day2 = date("d");
		
	$sql_category = "SELECT category FROM `tbl_notice` GROUP BY category";
	$result_category = mysql_query($sql_category,$link_id);

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
</head>
<link rel="stylesheet" href="../../js/style.css" type="text/css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<form name="form1" method="post" action="add_notice_process.php" enctype="multipart/form-data">
<body>
<img src="admin_label.gif" width="500" height="35">
<table width="650" border="0" cellpadding="5" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="admin_maintain_form_table">
        <tr bgcolor="ECECEC">
          <td colspan="2" class="subHead">新增</td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;編號 :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="no" type="text" id="no" size="40" maxlength="40">
          </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;類別 :</font></td>
          <td height="18" bgcolor="FFFFFF">
                    <select name="web_type" id="web_type">
          <?
			require_once("../../php-bin/get_web_type_selection.php");
		    require_once("../../php-bin/get_web_type_select_html.php");
          ?>
            </select>
		  </td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;對象 :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="target" type="text" id="target" value="" size="40">
          </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8"> &nbsp;標題 :</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
            <input name="title" type="text" id="title" value="" size="40">
          </font></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">相關連結名稱:</td>
          <td height="18"><input name="link_text" type="text" id="link_text" size="40"></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">相關連結網址:</td>
          <td height="18"><input name="link_url" type="text" id="link_url" value="http://" size="40"></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">在新視窗開啟:</td>
          <td height="18"><input name="new_window" type="radio" value="Y" checked>
    是
      <input name="new_window" type="radio" value="N">
    否</td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC"><font class="style8">日期:</font></td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
      <input name="date_day" type="text" size="2" maxlength="2" class="style8" value="<?=$day?>">      
      -
      <input name="date_month" type="text" size="2" maxlength="2" class="style8" value="<?=$month?>">
      -
	  <input name="date_year" type="text" size="4" maxlength="4" class="style8" value="<?=$year?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;DD -MM-YYYY </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC">有效日期:</td>
          <td height="18" bgcolor="FFFFFF"><font class="style8">
      <input name="date_day2" type="text" size="2" maxlength="2" class="style8" value="<?=$day2?>">
      -
      <input name="date_month2" type="text" size="2" maxlength="2" class="style8" value="<?=$month2?>">
      -
	  <input name="date_year2" type="text" size="4" maxlength="4" class="style8" value="<?=$year2?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year2','date_day2','date_month2','date_year2','d m y')">&nbsp; DD-MM-YYYY </font></td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC">&nbsp;附件:</td>
          <td height="18" bgcolor="FFFFFF"><input type="file" name="file"></td>
        </tr>
        <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">最新消息:</td>
          <td height="18"><input name="is_news" type="radio" value="Y">
    是
      <input name="is_news" type="radio" value="N" checked>
    否</td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC">&nbsp;網頁項目:</td>
          <td height="18" bgcolor="FFFFFF">
		  <select name="type" id="type">
            <option value="N">最新消息</option>
            <option value="PC">家校通訊</option>
            <option value="P">家長通告</option>
            <option value="SR">學校報告</option>
            <option value="D">發展計劃</option>
            <option value="S">校務計劃</option>
            <option value="R">校務報告</option>
		  </select>
		  </td>
        </tr>
        <tr>
          <td height="18" bgcolor="ECECEC">&nbsp;年度:</td>
          <td height="18" bgcolor="FFFFFF"><select name="school_year" id="school_year"><?



$now_Year = date("Y")|0;
$now_Month = date("m")|0;
$start_Year = $now_Year+2;
$end_Year = 2000;

for( $i=$start_Year; $i>=$end_Year; $i-- )
{
	if( ($i==$now_Year && $now_Month>=9) || ($i==$now_Year-1 && $now_Month<=8) )
		echo '<option value="'.$i.'-'.($i+1).'" selected>'.$i.'-'.($i+1).'</option>';
	else
		echo '<option value="'.$i.'-'.($i+1).'">'.$i.'-'.($i+1).'</option>';
}




?></select>
          </td>
        </tr>
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

  <p><a href=c_parent.php?month=<?=$_GET[month]?>&school_year=<?=$school_year?>>回上一頁</a></p>
</body>
</form>
</html>
