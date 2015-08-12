<?php
require_once("../../admin.inc.php");
require_once("../../php-bin/function.php");
// access control checking
switch ($_GET['type']){
	case 1:
		$topic="通告下載";
		break;
	case 2:
		$topic="校園刊物";
		break;
	case 3:
		$topic="招標公告";
		break;
	case 4:
		$topic="學校報告及發展計劃";
		break;
	case 5:
		$topic="傳媒報道";
		break;
	case 6:
		$topic="境外學習活動";
		break;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>通告下載</title>

<LINK rel="StyleSheet" type="text/css" href="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script language="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<script charset="utf-8" src="../kindeditor/kindeditor-min.js" type="text/javascript"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>

<style type="text/css">
<!--
.style2 {color: #006699}
.style4 {color: #006600}
.style5 {color: #666666}
-->
</style>
<script src="../../js/validation.js"></script>
</head>
<body>

<p class="title"><?php echo $topic;?></p><BR>
<form method="POST" name="add_user" action="down_add_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">

<table width="850" border="0" cellpadding="5" cellspacing="1">
  <tr >
    <td width="100%" >
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td colspan="4" bgcolor="ECECEC"><font class="style4">新增資料</font> </td>
        </tr>

          <tr>
            <td height="18" bgcolor="#FFFFFF">序號:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF">  <input name="order" type="text" id="order" size="10" maxlength="10" value="100">
           </td>
          </tr>   
         <tr bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;開始日期:</font></td>
          <td height="18"><font class="style8">
      <input name="date_year" id="date_year" type="text" size="4" maxlength="4" class="style8" value="<?php echo date('Y',time());?>">-
      <input name="date_month" id="date_month" type="text" size="2" maxlength="2" class="style8" value="<?php echo date('m',time());?>">-
	  <input name="date_day" id="date_day" type="text" size="2" maxlength="2" class="style8" value="<?php echo date('d',time());?>">
&nbsp;<img src="../icons/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;YYYY-MM-DD </font></td>
        </tr>  
          
        <tr>
            <td height="18" bgcolor="#FFFFFF">標題:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" size="40">
              <font color="#FF0000">* </font></td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">內容:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF">
              <script language="javascript">
			KindEditor.options.filterMode = false;
			        KindEditor.ready(function(K) {
			                window.editor = K.create('#a_content');
			        });
			</script>
                    <textarea name="a_content" id="a_content" cols="60" style="width: 670px; height: 300px;"></textarea>
          </td>
          </tr>
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">下載:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input type="file" name="a_file" id="a_file" style="display:none" onChange="document.add_user.link_pic1.value=this.value">
         <input name="link_pic1" type="text" id="link_pic1" size="25" value=""><input type="button" size="20" value="瀏覽文件" onClick="document.add_user.a_file.click();"></td>
          </tr>
          <tr bgcolor="#ECECEC">
            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="35%">&nbsp;</td>
                <td width="75%">
                  <input type="hidden" name="a_type" value="<?php echo $_GET['type'];?>" />
                  <input type="submit" class="style8" value="    確定新增    "> &nbsp;
                  <input type="reset" value="重設"> &nbsp;
                  <input type="button" id="back" onClick="history.go(-1)" value="返回"></td>
              </tr>
            </table>            </td>
          </tr>
        
    </table></td>
  </tr>
</table></form>
</body>
</html>

