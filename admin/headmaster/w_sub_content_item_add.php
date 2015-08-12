<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");









$sub_content_ID = $_GET["id"]|0;

$content_ID = 0;

$content_Name = "";









$search_SQL = "SELECT * FROM    tbl_web_sub_content  AS sc

LEFT JOIN  tbl_web_content  AS c  ON ( c.web_content_id=sc.web_content_id )

 WHERE    sc.web_sub_content_id=". $sub_content_ID;

$search_Result = mysql_query( $search_SQL, $link_id );

if( mysql_num_rows($search_Result) > 0 )

{

	$search_Obj = mysql_fetch_object($search_Result);

	$content_ID = $search_Obj->web_content_id;

	$content_Name = $search_Obj->web_content_name;

}











?>

<html>

<head>

<title>網頁製作管理</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">

<script language="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>

<script language="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>

<script language="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>

<style type="text/css">

<!--

.style2 {color: #006699}

.style4 {color: #006600}

.style6 {color: #000000}

-->

</style>

</head>

<body>

<img src="admin_label.gif" width="500" height="35"><br>



<table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="small">

<form name="RTEDemo" action="w_sub_content_item_add_process.php" method="post" onSubmit="return submitForm();" enctype="multipart/form-data">

  <tr> 

    <td >

      <table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td width="200"><span class="style2"><span class="style4">校長專頁</span>：</span></td>

          <td width="100"><a href="w_search.php" >搜尋校長專頁</a></td>

          <td width="100"> <a href="w_sub_content_add.php" >新增主題</a></td>

          <td>&nbsp;</td>

        </tr>

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td width="200">&nbsp;</td>

          <td width="100"><a href="w_sub_content_update.php?id=<?php echo $sub_content_ID ?>">更改主題樣式</a></td>

          <td width="100"><a href="w_sub_content_item_add.php?id=<?php echo $Result_Obj->web_sub_content_id; ?>">新增標題</a> </td>

          <td width="100">&nbsp;</td>

        </tr>

      </table>

      <hr style="height:1px;color=ECECEC;">

<table border="0" cellpadding="5" cellspacing="0" bgcolor="CCCCCC">

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td><span class="subHead">新增標題</span> : <?php



















//*****   List Content Tree Start  *****/

$select_index_Parent_ID = $content_ID;



include("w_list_tree.php");



$select_index_Ary[] = $search_Obj->web_sub_content_title;

$select_index_Ary[] = "[新增]";



echo implode( $select_index_Ary, " > " );

//*****   List Content Tree End  *****/

















?></td>

          </tr>

      </table>

      <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="CCCCCC" class="small">

        <tr align="center" valign="middle">

          <td width="80" bgcolor="#FFFFFF"><span class="style6">標題:</span></td>

          <td align="left" bgcolor="#FFFFFF">&nbsp;

            <input name="item_title" id="item_title" style="position:relative;left:-5" value="" size="40" maxlength="40"></td>

          <td width="120" rowspan="3" align="left" bgcolor="#FFFFFF"><div align="center"><a href="cap_2_b.jpg" target="_blank"><img src="cap_2_s.jpg" width="100" height="75" border="0"><br>

                    <br>

        示意圖<br>

          </a></div></td>

        </tr>





      <tr align="center" valign="middle">

          <td bgcolor="#FFFFFF"><span class="style6">日期:</span></td>

          <td align="left" bgcolor="#FFFFFF">



      <input name="item_year" type="text" size="4" maxlength="4" class="style8" value="">

      -

      <input name="item_month" type="text" size="2" maxlength="2" class="style8" value="">

      -

	  <input name="item_day" type="text" size="2" maxlength="2" class="style8" value="">

&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('item_year','item_day','item_month','item_year','d m y')">&nbsp; YYYY-MM-DD</td>

        </tr>



      <tr align="center" valign="middle">

          <td bgcolor="#FFFFFF"><span class="style6">背景圖:</span></td>

          <td align="left" bgcolor="#FFFFFF">

            <input name="photo[]" type="file" id="photo[]" ></td>

          </tr>

        <tr align="left" valign="middle">

          <td colspan="3" bgcolor="#FFFFFF">



<table width="96%"  border="0" cellspacing="0" cellpadding="4">

    <tr>

      <td align="right">

        <input type="submit" value="繼續"> &nbsp;

        <input type="button" onClick="history.go(-1)" value="返回">

        <input type="hidden" name="sub_content_id" value="<?php echo $sub_content_ID ?>">    </td>

    </tr>

</table></td>

          </tr>

      </table>   </td>

  </tr>

</form>

</table>





</body>

</html>

<?php

mysql_close();

?>