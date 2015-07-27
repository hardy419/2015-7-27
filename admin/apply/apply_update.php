<?
require_once("apply_update_selection.php");
//calendarid post_id poster date title content posttime 
    if ($get_rows[type] == "S"){
    	$type = "S";
    	$title = "校曆";
    }
    else{
    	$type = "T";
    	$title = "行事歷";
    }    
?>
<html>
<head>
<title>網上報名管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">
<!--
.style4 {color: #006600}
-->
</style>
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script LANGUAGE="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script LANGUAGE="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<script src="../../js/validation.js"></script>
</head>
<body>
<form name="form1" method="post" action="apply_update_process.php?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>" enctype="multipart/form-data">
<table width="530" border="0" cellpadding="0" cellspacing="0" class="table1">
	<tr>
		<td>
			<img src="admin_label.gif" width="500" height="35">
		</td>
	</tr>
	<tr>
		<td height=40></td>
	</tr>
    <tr> 
      <td  valign="top"> <table width="650" height="0" border="0" cellpadding="5" cellspacing="0">
          <tr> 
            <td height="40" class="style3"><div align="left">
              <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
                <tr valign="top" bgcolor="ececec">
                  <td colspan="4" class="subHead">更改報名表</td>
                </tr>
                <tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC""><font class="style8">&nbsp;標題:</font></td>
                  <td colspan="3"><font class="style8">
                    <input name="title" type="text" value="<?=$get_rows[title]?>" size="40" maxlength="40">
                  </font></td>
                </tr>
                <tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC"><font class="style8">&nbsp;活動日期:</font></td>
                  <td colspan="3"><font class="style8">
      <input name="date_day" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 8,2)?>">              
      -
      <input name="date_month" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[date], 5,2)?>">
      -
	  <input name="date_year" type="text" size="4" maxlength="4" class="style8" value="<?=substr($get_rows[date], 0,4)?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" width="16" height="16" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;DD -MM-YYYY</font></td>
                </tr>
                <tr valign="top" bgcolor="ffffff" class="small">
                  <td bgcolor="ECECEC">&nbsp;活動時間:</td>
                  <td colspan="3"><select name="time_hour_start" id="time_hour_start">
                      <?php 
						for($i=0;$i<24;$i++) {
							if ($get_rows[tsh] == $i)
								$temp = " selected";
							else
								$temp = "";
							printf("<option value=\"%02d\"%s>%02d</option>",$i,$temp,$i);
						}
					?>
                    </select>
      ：
      <select name="time_min_start" id="time_min_start">
        <?php 
						for($i=0;$i<60;$i+=5) { 
							if ($get_rows[tsm] == $i)
								$temp = " selected";
							else
								$temp = "";
							printf("<option value=\"%02d\"%s>%02d</option>",$i,$temp,$i);
						}
					?>
      </select>
      至
      <select name="time_hour_end" id="time_hour_end">
        <?php 
						for($i=0;$i<24;$i++) {
							if ($get_rows[teh] == $i)
								$temp = " selected";
							else
								$temp = "";
							printf("<option value=\"%02d\"%s>%02d</option>",$i,$temp,$i);
						}
					?>
      </select>
      ：
      <select name="time_min_end" id="select2">
        <?php 
						for($i=0;$i<60;$i+=5) {
							if ($get_rows[tem] == $i)
								$temp = " selected";
							else
								$temp = "";
							printf("<option value=\"%02d\"%s>%02d</option>",$i,$temp,$i);
						}
					?>
    </select></td>
                </tr>
                <tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC">活動地點:</td>
                  <td colspan="3"><input name="place" type="text" id="place" value="<?=$get_rows[place]?>"></td>
                </tr>
                <tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC"><font class="style8">&nbsp;有效日期:</font></td>
                  <td colspan="3"><font class="style8">
      <input name="date_day2" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[exp_date], 8,2)?>">              
      -
      <input name="date_month2" type="text" size="2" maxlength="2" class="style8" value="<?=substr($get_rows[exp_date], 5,2)?>">
      -
	  <input name="date_year2" type="text" size="4" maxlength="4" class="style8" value="<?=substr($get_rows[exp_date], 0,4)?>">
&nbsp;<img src="../../images/calendar.gif" alt="calendar" width="16" height="16" border="0" onClick="showCalendar('date_year2','date_day2','date_month2','date_year2','d m y')">&nbsp; DD-MM-YYYY</font></td>
                </tr>
                <tr valign="top" bgcolor="ffffff" class="small">
                  <td bgcolor="ECECEC">&nbsp;聯絡人名稱:</td>
                  <td colspan="3"><input name="c_name" type="text" id="c_name" value="<?=$get_rows[contact_name]?>"></td>
                </tr>
                <tr valign="top" bgcolor="ffffff" class="small">
                  <td bgcolor="ECECEC">&nbsp;聯絡人電郵:</td>
                  <td colspan="3"><input name="c_email" type="text" id="c_email" value="<?=$get_rows[contact_email]?>"></td>
                </tr>
                <tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC">Link Text:</td>
                  <td colspan="3"><input name="link_text" type="text" id="link_text" value="<?=$get_rows[link_text]?>" size="40"></td>
                </tr>
                <tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC">Link URL:</td>
                  <td colspan="3"><input name="link_url" type="text" id="link_url" value="<? echo ($get_rows[link_url] == "" ? "http://" : $get_rows[link_url])?>" size="40"></td>
                </tr>
                <tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC">在新視窗開啟:</td>
                  <td colspan="3"><input name="new_window" type="radio" value="Y" <? echo ($get_rows[link_open_window] == "Y" ? "checked" : "")?>>
      是
        <input name="new_window" type="radio" value="N" <? echo ($get_rows[link_open_window] == "N" ? "checked" : "")?>>
      否</td>
                </tr>
				<input type='hidden' name='sq_type1' value='1' />
                <!--tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC">問題類別:</td>
                  <td colspan="3"><input name="sq_type1" type="radio" value="1"  <? if($check_selection == 'no') { echo "checked"; } ?>>
輸入文字
  <input name="sq_type1" type="radio" value="2" <? if($check_selection == 'yes') { echo "checked"; } ?>>
選單</td>
                </tr-->
                <tr valign="top" bgcolor="ffffff" class="small">
                  <td bgcolor="ECECEC">特別問題(1):</td>
                  <td><input name="sq1" type="text" id="sq1" value="<?=$get_rows[special_question_1]?>" size="20" maxlength="30"></td>
                  <td bgcolor="ECECEC">提示(1):</td>
                  <td bgcolor="ffffff"><input name="sqt1" type="text" id="sqt1" value="<?=$get_rows[special_question_tips_1]?>" size="20" maxlength="30"></td>
                </tr>
                <tr valign="top" bgcolor="ffffff" class="small">
                  <td bgcolor="ECECEC">特別問題(2):</td>
                  <td><input name="sq2" type="text" id="sq2" value="<?=$get_rows[special_question_2]?>" size="20" maxlength="30"></td>
                  <td bgcolor="ECECEC">提示(2):</td>
                  <td bgcolor="ffffff"><input name="sqt2" type="text" id="sqt2" value="<?=$get_rows[special_question_tips_2]?>" size="20" maxlength="30"></td>
                </tr>
                <tr valign="top" bgcolor="ffffff" class="small">
                  <td bgcolor="ECECEC">特別問題(2):</td>
                  <td><input name="sq3" type="text" id="sq3" value="<?=$get_rows[special_question_3]?>" size="20" maxlength="30"></td>
                  <td bgcolor="ECECEC">提示(3):</td>
                  <td bgcolor="ffffff"><input name="sqt3" type="text" id="sqt3" value="<?=$get_rows[special_question_tips_3]?>" size="20" maxlength="30"></td>
                </tr>
                <!--tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC">&nbsp;附件:</td>
                  <td colspan="3"><input type="file" name="file">
                      <? if (file_exists("../../apply/attachment/" . $get_rows["document_name"]) && $get_rows["document_name"] !=""  && $delete != 1){ ?>
&nbsp;<font color=red>(你目前已上載檔案 <a href="?year=<?=$_GET[year]?>&month=<?=$_GET[month]?>&id=<?=$_GET[id]?>&Dfile=1" class="style8">刪除檔案</a> )
      <? } ?>
    </font></td>
                </tr-->
                <tr valign="top" bgcolor="ffffff">
                  <td bgcolor="ECECEC">附件說明:</td>
                  <td colspan="3"><input name="document_desc" type="text" id="document_desc" value="<?=$get_rows[document_desc]?>" size="40" maxlength="30"></td>
                </tr>
                <tr valign="top" bgcolor="ffffff" class="small">
                  <td bgcolor="ECECEC">&nbsp;活動描述:</td>
                  <td colspan="3"><textarea name="desc" cols="38" rows="5" id="desc"><?=$get_rows[description]?>
              </textarea>
                      <input name="check_selection" type="hidden" id="check_selection" value="<?=$check_selection?>"></td>
                </tr>
                <tr valign="top" bgcolor="ECECEC">
                  <td><font class="style8">&nbsp; </font></td>
                  <td colspan="3"><input type="submit" name="Submit" value="    確定更改    ">
                      <input type="reset" name="reset" value="重設">
					  <button type='button' onclick='javascript:history.go(-1);'>返回</button>
				  </td>
                </tr>
              </table>
              <span style="font-weight: 400"><font size="5" face="萬用中特圓"><strong></strong></font></span></div></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</form>
</html>
