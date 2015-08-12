<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");









$sub_content_ID = $_GET["id"]|0;

$content_ID = $OutsideConnect_WebContent_ID;

$content_Name = "";









$search_SQL = "SELECT * FROM    tbl_web_sub_content  AS sc

LEFT JOIN  tbl_web_content  AS c  ON ( c.web_content_id=sc.web_content_id )

 WHERE    sc.web_sub_content_id=". $sub_content_ID;

$search_Result = mysql_query( $search_SQL, $link_id );





if( mysql_num_rows($search_Result) > 0 )

{

	$search_Obj = mysql_fetch_object($search_Result);

	$content_Name = $search_Obj->web_content_name;

}





?>

<html>

<head>

<title>網頁製作管理</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/editor/rte.css">

<script language="JavaScript" type="text/javascript" src="../../js/editor/html2xhtml.js"></script>

<script language="JavaScript" type="text/javascript" src="../../js/editor/richtext_compressed.js"></script>

<style type="text/css">

<!--

.style2 {color: #006699}

.style4 {color: #006600}

.style5 {color: #666666}

-->

</style>

</head>

<body>

<img src="admin_label.gif" width="500" height="35"><br>



<table width="650"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">

  <tr> 

    <td>



      <table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td width="200"><span class="style2"><span class="style4">對外聯繫管理</span>：</span></td>

          <td width="100" align="left"><a href="w_search.php" >搜尋</a></td>

          <td width="100" align="left"> <a href="w_sub_content_add.php" >新增欄目</a></td>

          <td align="left"><a href="w_sub_content_item_add.php?id=<?php echo $sub_content_ID; ?>">新增標題</a></td>

        </tr>

      </table>



      <hr style="height:1px;color=ECECEC;">

      <table border="0" cellpadding="5" cellspacing="0" bgcolor="CCCCCC">

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td><span class="subHead">檢視欄目</span> : <?php



















//*****   List Content Tree Start  *****/

$select_index_Parent_ID = $content_ID;



include("w_list_tree.php");



$select_index_Ary[] = $search_Obj->web_sub_content_title;



echo implode( $select_index_Ary, " > " );

//*****   List Content Tree End  *****/

















?></td>

        </tr>

      </table>



      <table width="100%"  border="0" cellpadding="5" cellspacing="1" bgcolor="CCCCCC" style="word-break:break-all;table-layout:fixed;">

<?php







$sub_content_sql = "SELECT * FROM    tbl_web_sub_content    WHERE    web_sub_content_inner=".$sub_content_ID."    AND   web_sub_content_inner!=0    ORDER BY   web_sub_content_order ASC ";

$sub_content_result = mysql_query($sub_content_sql, $link_id);





if( mysql_num_rows($sub_content_result) > 0 )

{

	?>

  <tr align="left" valign="middle">

    <td colspan="3" bgcolor="#ECECEC">

      <span class="style6">內頁:</span></td>

  </tr>

  <tr align="left" valign="middle">

    <td colspan="3" bgcolor="#FFFFFF"><?php



$temp_count = 0;

while( $obj = mysql_fetch_object($sub_content_result) )

{

	if( $temp_count++%5==0 && $temp_count!=1 )

		echo '<table height="1" style="table-layout:fixed"><tr><td></td></tr></table>';

	?><a href="w_sub_content.php?id=<?php echo $obj->web_sub_content_id ?>"><?php echo $obj->web_sub_content_title ?></a><BR><?php

}







?></td>

  </tr>

	<?php



}







?>

      </table>



      <table width="100%"  border="0" cellpadding="5" cellspacing="1" bgcolor="CCCCCC" style="word-break:break-all;table-layout:fixed;">

        <tr valign="middle" bgcolor="ECECEC" >

          <td width="31%"  class="admin_maintain_header">標題</td>

          <td width=""  class="admin_maintain_header">內容</td>

          <!-- <td width="90" align="center"  bgcolor="ECECEC" class="admin_maintain_header">日期</td> -->

          <td width="45" align="center"  bgcolor="ECECEC" class="admin_maintain_header">圖片管理</td>

          <td width="45" align="center"  bgcolor="ECECEC" class="admin_maintain_header">更改標題</td>

          <td width="45" align="center"  bgcolor="ECECEC" class="admin_maintain_header">刪除標題</td>

        </tr>







<?php









	$search_SQL = "SELECT * FROM    tbl_web_sub_content_item    WHERE    web_sub_content_id=". $sub_content_ID."   ORDER BY  web_sub_content_item_order ASC, web_sub_content_item_id ASC ";





	$search_Result = mysql_query( $search_SQL, $link_id );





while( $search_Result_Obj = mysql_fetch_object($search_Result) )

{





?>



        <tr align="left" valign="top" >

          <td bgcolor="#FFFFFF"><font class="style8"><?php echo $search_Result_Obj->web_sub_content_item_title;?></font></td>

          <td bgcolor="#FFFFFF"><?php echo CutStr(strip_tags($search_Result_Obj->web_sub_content_item_html),60);?></td>

          <!-- <td align="center" bgcolor="#FFFFFF" ></td> <?php echo $search_Result_Obj->date?> -->

          <td align="center" bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="w_gallery.php?id=<?php echo $search_Result_Obj->web_sub_content_item_id ?>"><img src="../icons/bmp.gif" width="16" height="16" border=0 alt=圖片管理></a></font></td>

          <td align="center" bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="w_sub_content_item_update.php?id=<?php echo $search_Result_Obj->web_sub_content_item_id ;?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>

          <td align="center" bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="w_sub_content_item_delete.php?id=<?php echo $search_Result_Obj->web_sub_content_item_id ?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>

        </tr>



<?php



}























?>

      </table><BR>

<table width="100%" cellpadding="5">

<tr><td align="right" valign="middle"><a href="w_search.php?id=<?php echo $content_ID ?>">返回</a></td>

</tr></table>

    </td>

  </tr>

</table>





</body>

</html>

<?php

mysql_close();

?>