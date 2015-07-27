<?
// admin checking
require_once("../../php-bin/admin_check.php");
require("class_selection.php");
?>
<html>
<head>
<title>班級管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style4 {color: #006600}
.style5 {color: #666666}
-->
</style>
</head>

<body class="main_small">
<span class="title"><img src="admin_label.gif" width="500" height="35"></span>
<table width="650" border="0" cellspacing="1" cellpadding="5">
  <tr>
    <td><table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($_GET["msg"]!="") echo "<br>".$_GET["msg"]; ?>
        </font></td>
      </tr>
    </table>
    <br>
    <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
      <tr align="left" valign="top" bgcolor="#FFFFFF">
        <td width="15%"><span class="style2"><span class="style4">班級管理</span>：</span></td>
        <td width="85%"><a href="add.php">新增班別</a>　　<a href="change.php">班別升級</a></td>
      </tr>
    </table>
    <hr style="height:1px;color=ECECEC;">
    <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
      <tr align="left" valign="top" bgcolor="#FFFFFF">
        <td width="15%"><span class="style2"><span class="style4">搜尋結果</span>：</span></td>
        <td width="85%" align="right">總共有
          <?=$total_record?>
個資料</td>
      </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="CCCCCC"  class="admin_maintain_table">
      <tr class="admin_maintain_header">
        <td width="39%" nowrap class="admin_maintain_header"><div align="center">班級名稱</div></td>
        <td width="38%" nowrap class="admin_maintain_header"><div align="center">年級</div></td>
        <td width="1%" nowrap class="admin_maintain_header"><div align="center">刪除</div></td>
      </tr>
      <?
      
// Display class's information
while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){
	if ($get_rows[year] == 1)	
		$year_word = "一年級";
	else if ($get_rows[year] == 2)	
		$year_word = "二年級";
	else if ($get_rows[year] == 3)	
		$year_word = "三年級";
	else if ($get_rows[year] == 4)	
		$year_word = "四年級";
	else if ($get_rows[year] == 5)	
		$year_word = "五年級";
	else if ($get_rows[year] == 6)	
		$year_word = "六年級";
	else if ($get_rows[year] == 7)	
		$year_word = "七年級";
	else{
		$year_word = $get_rows[year] . "畢業";	
	}
?>
      <tr class="admin_maintain_contents" align="center">
        <td class="admin_maintain_contents"><?=$get_rows[class_name]?></td>
        <td class="admin_maintain_contents"><?=$year_word?></td>
        <td class="admin_maintain_contents"><a href="class_delete.php?id=<?=$get_rows["class_id"]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" width="16" height="16" border="0" alt="刪除"></a></td>
      </tr>
      <?
}
?>
    </table></td>
  </tr>
</table>
<p align="left"> &nbsp;&nbsp;&nbsp;</br>
  </br>
<span class="style19"> </span> </p>
     
</body>
</html>
