<SCRIPT language=JavaScript>
<!--
var rowcount = 1;

function insertRow(table){	
	var r1 = document.getElementById(table).insertRow();
	var c1 = r1.insertCell(0);
	var c2 = r1.insertCell(1);
	c1.innerHTML = '答案選擇 ('+rowcount+' ):';
	c2.innerHTML = '<input type="text" name="choice[]">';
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
  <table width="650" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td><table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" bgcolor="#FFFFFF">
          <td width="15%" class="subHead">新增答案：</td>
          <td width="85%"><table  border="0" cellspacing="0" cellpadding="3">
              <tr>
                <td><input onClick=insertRow("table_ans") type=button value=新增另一個答案 name=add></td>
                <td><input name=delete type=button id="delete" onClick=deleteRow("table_ans") value=取消最後一個答案></td>
              </tr>
          </table></td>
        </tr>
      </table>
        <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="FFFFFF" id="table_ans">
          <tr bgcolor="ECECEC">
            <td width="100">特別問題1：</td>
            <td><?=$_GET[sq1]?></td>
          </tr>
          <tr bgcolor="#CCCCCC">
        </table>
        <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="FFFFFF">
          <tr bgcolor="ECECEC">
            <td width="100"><span class="style1"></span></td>
            <td align="left"><input name="submit" type="submit" value="    確定新增    "></td>
          </tr>
        </table>
        <input name="id" type="hidden" value="<?=$_GET[app_id]?>">
        <input name="title" type="hidden" id="title" value="<?=$_GET[title]?>"></td>
    </tr>
  </table>
  
</body>
</form>
</html>
