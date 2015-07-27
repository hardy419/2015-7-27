<?
    // Connect Database
    require("../../php-bin/function.php");
    require("../../php-bin/pagedisplay.php");

	if ($_GET[delete] == '1') {
		// Delete Record
		$del_sql = "DELETE FROM tbl_apply_question_choice WHERE id = '$_GET[id]';";
		mysql_query($del_sql);
	}
	
    // Get Record
    $get_sql = "SELECT * FROM tbl_apply_question_choice WHERE app_id = '$_GET[app_id]';";

    $get_result = mysql_query($get_sql,$link_id);
	$total_record = mysql_num_rows($get_result)+1;
    mysql_close();
?>
<SCRIPT language=JavaScript>
<!--
var rowcount = <?=$total_record?>;

function insertRow(table){	
	var r1 = document.getElementById(table).insertRow();
	var c1 = r1.insertCell(0);
	var c2 = r1.insertCell(1);
	var c3 = r1.insertCell(2);
	
	
	
	c1.innerHTML = '答案選擇 ('+rowcount+" )：";
	c2.innerHTML = '<input type="text" name="choice[]">';
	c3.innerHTML = '&nbsp';
	rowcount++;
}

function deleteRow(table){
	if(document.getElementById(table).rows.length>1){
		document.getElementById(table).deleteRow();
		rowcount--;
	}
}
//-->
</SCRIPT>
<html>
<head>
<title>網上報名管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style4 {color: #006600}
.style6 {color: #666666}
-->
</style>
</head>
<form action="apply_choice_add.php" method="post" name="apply_choice_add">
<body>
<img src="admin_label.gif" width="500" height="35">
<table width="650" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td>
	
    <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
      <tr align="left" bgcolor="#FFFFFF">
        <td width="15%" class="subHead">更改答案：</td>
        <td width="85%">          <table  border="0" cellspacing="0" cellpadding="3">
            <tr>
              <td><input onClick=insertRow("table_ans") type=button value=新增另一個答案 name=add></td>
              <td><input name=delete type=button id="delete" onClick=deleteRow("table_ans") value=取消最後一個答案></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <br>
    <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="FFFFFF" id="table_ans">
  <tr bgcolor="ECECEC">
    <td width="10%" nowrap bgcolor="ECECEC">特別問題 (1)：</td>
    <td><?=$_GET[sq1]?></td>
	<td width="1%" nowrap bgcolor="ECECEC">刪除</td>
  </tr>
	<?
		$i=1;
		while($record = mysql_fetch_object($get_result)) {
			echo "<tr bgcolor=FFFFFF>";
			echo "<td >答案選擇 ($i)：</td>";
			echo "<td>$record->choice_value</td>";
			echo "<td><a href=apply_choice_update.php?app_id=$_GET[app_id]&sq1=$_GET[sq1]&delete=1&id=$record->id><img src=../icons/del.gif border=0 alt=刪除></a></td>";
			echo "</tr>";
			$i++; 
		}
	?>




 

<input name="id" type="hidden" value="<?=$_GET[app_id]?>">
<input name="title" type="hidden" id="title" value="<?=$_GET[title]?>">
<input name="update" type="hidden" id="update" value="1">
	</table>
	
	<table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="FFFFFF" >
      <?
		$i=1;
		while($record = mysql_fetch_object($get_result)) {
			echo "<tr bgcolor=FFFFFF>";
			echo "<td >答案選擇 ($i)：</td>";
			echo "<td>$record->choice_value</td>";
			echo "<td><a href=apply_choice_update.php?app_id=$_GET[app_id]&sq1=$_GET[sq1]&delete=1&id=$record->id><img src=../icons/del.gif border=0 alt=刪除></a></td>";
			echo "</tr>";
			$i++; 
		}
	?>
      <input name="id" type="hidden" value="<?=$_GET[app_id]?>">
      <input name="title" type="hidden" id="title" value="<?=$_GET[title]?>">
      <input name="update" type="hidden" id="update" value="1">
      <tr align="right" bgcolor="#ECECEC">
        <td width="10%" align="right">&nbsp;</td>
        <td align="left"><input name="submit" type="submit" value="    確定更改    "></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</form>
</html>
