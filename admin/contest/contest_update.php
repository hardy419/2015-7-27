<?php
header("Content-Type:text/html;charset=utf-8");
 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking

$a_id = $_GET[id]|0;
$get_sql = "Select * FROM   tbl_contest  WHERE    tbl_contest.a_id=".$a_id;
$get_result = mysql_query($get_sql,$link_id);

if( mysql_num_rows($get_result) > 0 )
$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);

$type=$get_rows->a_type;
switch($type){
	case 1:
		$topic="校外比賽";
	break;
	case 2:
		$topic="校內比賽";
	break;
	case 3:
		$topic="獎學金";
	break;
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>比賽紀錄管理</title>

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">
<script language="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>
<script language="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style4 {color: #006600}
.style5 {color: #FF0000}
-->
</style>
<script charset="utf-8" src="../kindeditor/kindeditor-min.js" type="text/javascript"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script charset="utf-8" src="../kindeditor/jquery.min.js" type="text/javascript"></script>
</head>

</head>
<body>
<p class="title"><?php echo $topic;?>紀錄</p><BR>
<form method="post" name="update_user" action="contest_update_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">
<table width="850" border="0" cellpadding="5" cellspacing="1">
  <tr >
    <td width="100%" ><br>
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td colspan="4" bgcolor="ECECEC"><font class="style4">更改</font> </td>
        </tr>
         
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">序號:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="order" type=text class="style8" id="u_name" value="<?php echo $get_rows["order"]?>" size="40"></td>
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
            <td height="18" bgcolor="#FFFFFF">&nbsp;標題:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" id="u_name" value="<?php echo $get_rows["a_title"]?>" size="40"></td>
          </tr> 

          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">內容:</td>
             <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="a_content" id="a_content" cols="60" style="width: 670px; height: 300px;"><?php echo htmlspecialchars($get_rows["a_content"]);?></textarea></td>
          </tr>
	
          <tr bgcolor="#ECECEC">
            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16%"><input type=hidden name="a_id" value="<?php echo $get_rows["a_id"]?>"><input type=hidden name="a_type" value="<?php echo $get_rows["a_type"]?>"></td>
                <td width="84%"><input type=submit class="style8" value="    確定更改   "> &nbsp;
                  <input type="reset" value="重設"> &nbsp;
                  <input type="button" id="back" onClick="history.go(-1)" value="返回"></td>
              </tr>
            </table>            </td>
          </tr>
        
    </table></td>
  </tr>
</table>

</form>
<script language="javascript">
KindEditor.options.filterMode = false;
        KindEditor.ready(function(K) {
                window.editor = K.create('#a_content');
        });
</script>

</body>
</html><?php mysql_close();	?>