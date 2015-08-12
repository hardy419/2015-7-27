<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");















// Dump "class table" to an array.

$ClassIDAry = array();

$ClassNameAry = array();



$get_class_sql = "SELECT * FROM `tbl_class` ORDER BY `year` ASC , class_name ASC";

$get_class_result = mysql_query($get_class_sql, $link_id);

while($row = mysql_fetch_object($get_class_result))

{

	$ClassIDAry[] = $row->class_id;

	$ClassNameAry[] = $row->class_name;

}





?><html>

<head>

<title>校內校外比賽管理 - 新增比賽資料</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">

<script language="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>

<script language="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>

<script language="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>



<style type="text/css">

<!--

.style3 {color: #666666}

.style2 {color: #006699}

.style4 {color: #006600}

-->

</style>









<script language="javascript" src="../../js/function.js"></script>

<script language="javascript" src="m_function.js"></script>

<script language="javascript" src="m_request.js"></script>



<script language="javascript">







// An array store data who has add to this record.

var Student_Add_Ary = 

[

	[], // Add Student ID

	[], // Add Student Name

	[], // Add Student Class ID

	[], // Add Student Class Name

	[], // Add Student Outside Praise

	[]  // Add Student Inside Praise

];











function init( Class_Obj, SelectObj )

{

	makeRequest( Class_Obj.lastChild.value, SelectObj );

	Class_Obj.lastChild.selected = true;

}





</script>





</head>

<body>

<img src="admin_label.gif" width="500" height="35"><br>



<table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="table1">

    <tr>

      <td  valign="top">



        <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

          <tr align="left" valign="top" bgcolor="#FFFFFF">

            <td width="30%" height="35"><span class="style2"><span class="style4">校內校外比賽管理</span>：</span></td>

            <td width="20%"><a href="m_search.php">搜尋比賽</a></td>

            <td width="20%"><a href="m_add.php" class="style8">新增比賽資料</a> </td>

            <td><a href="import.php" class="style8">導入比賽</a></td>

          </tr>

        </table>

        <hr style="height:1px;color=ECECEC;"><BR>



                <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">

                  <form method="POST" name="form1" action="m_add_process.php" onSubmit="return CheckForm()">

                    <tr bgcolor="ECECEC">

                      <td colspan="6"><span class="style2"><span class="style4">新增比賽資料</span>：</span></td>

                    </tr>

                    <tr bgcolor="#FFFFFF">

                      <td width="80" height="18" align="center" valign="middle">&nbsp;比賽名稱:</td>

                      <td colspan="5"><input name="match_name" type=text class="style8" value="" size="40" maxlength="40" >

                        <font color="#FF0000">* </font></td>

                    </tr>

                    <tr bgcolor="#FFFFFF">

                      <td height="18" align="center" valign="middle">&nbsp;得獎年份:</td>

                      <td colspan="5">



<input name="date_year" type="text" size="4" maxlength="4" class="style8">              

 -

<input name="date_month" type="text" size="2" maxlength="2" class="style8">

 -

<input name="date_day" type="text" size="2" maxlength="2" class="style8">

</font>&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('date_year','date_day','date_month','date_year','d m y')">&nbsp;YYYY-MM-DD</span>



                          <font color="#FF0000">* </font></td>

                    </tr>

                    <tr bgcolor="#FFFFFF">

                      <td height="18" align="center" valign="middle">&nbsp;科目:</td>

                      <td colspan="5"><input name="match_subject" type=text class="style8" value="" size="40" maxlength="40" ></td>

                    </tr>

                    <tr bgcolor="#FFFFFF">

                      <td height="18" align="center" valign="middle">&nbsp;主辦單位:</td>

                      <td colspan="5"><input name="match_sponsor" type=text class="style8" value="" size="40" maxlength="40" ></td>

                    </tr>

                    <tr bgcolor="#FFFFFF">

                      <td rowspan="3" align="center" valign="middle">資料:</td>

                      <td width="100" rowspan="3"><span class="style3">比賽成績：</span><p><input name="m_outside_praise" type="text" id="m_outside_praise" size="15" maxlength="15"></p></td>

                      <td width="103" rowspan="3"><span class="style3">學校獎勵：</span><p><input name="m_inside_praise" type="text" id="m_inside_praise" size="15" maxlength="15"></p></td>

                      <td><font color="#FF0000">* </font> <span class="style3">班別：</span></td>

                      <td><span class="style3"><font color="#FF0000">* </font>學生：</span></td>

                      <td>&nbsp;</td>

                    </tr>







                    <tr bgcolor="#FFFFFF">

                      <td width="62"><select class="style8" preClassID="-1" id="class_select" name="class_select" onChange="StudentClass_SelectObj_Change(this, document.form1.m_student1)">

                          <option value=0>全部</option>

                          <?php





for( $i=0; $i<count($ClassIDAry); $i++ )

{

	echo "

                            <option value='$ClassIDAry[$i]'>$ClassNameAry[$i]</option>";

}



?>

                        </select></td>

                      <td width="126"><select class="style8" name="m_student1" id="m_student1"></select></td>

                      <td width="42"><input type="button" value="添加" onClick="AddStudent1();"></td>

                    </tr>

                    <tr bgcolor="#FFFFFF">

                      <td><input type="text" size="2" maxlength="2" name="m_class2" id="m_class2"></td>

                      <td><input type="text" size="15" maxlength="15" name="m_student2" id="m_student2"></td>

                      <td><input name="button" type="button" onClick="AddStudent2();" value="添加"></td>

                    </tr>

                    <tr bgcolor="#FFFFFF">

                      <td height="116" align="center" valign="middle">得獎學生:</td>

                      <td height="116" colspan="5" valign="top">



							<!-- Student -->

						  <table id="AddStudentInfo"  bgcolor="#CCCCCC" name="AddStudentInfo" border="0" cellspacing="1" cellpadding="0" style="word-break:break-all;table-layout:fixed;width:100%;" >

	<colgroup bgcolor="#FFFFFF" valign="middle">

		<col style="width:">

		<col style="width:">

		<col style="width:40" align="center">

		<col style="width:" align="center">

		<col style="width:40" align="center">

		<col style="width:40" align="center">

	</colgroup>

	<tr>

		<td><span class="style3">&nbsp;比賽成績</span></td>

		<td><span class="style3">&nbsp;學校獎勵</span></td>

		<td><span class="style3">&nbsp;班別</span></td>

		<td><span class="style3">&nbsp;學生名</span></td>

		<td><span class="style3">&nbsp;排序</span></td>

		<td><span class="style3">&nbsp;刪除</span></td>

	</tr>

	</table>					  </td>

                    </tr>

                    <tr bgcolor="ECECEC">

                      <td>&nbsp;</td>

                      <td colspan="5"><input type="submit" class="style8" value="確定新增"> &nbsp;

                        <input type="button" onClick="location.reload()" value="重設"> &nbsp;

                        <input type="button" class="style5" onClick="history.go(-1)" value="返回">					  </td>

                    </tr>

                  </form>

              </table>

      <p>&nbsp;</p></td>

    </tr>

  </table>

  

</body>





<script language="javascript" defer>

init( document.form1.class_select, document.form1.m_student1 );

</script>



</html>



