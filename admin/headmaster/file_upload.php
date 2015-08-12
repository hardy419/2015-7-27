<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");















$item_id = $_GET["id"]|0;

















?><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/editor/rte.css">

<script  src="../../js/function.js"></script>

<style type="text/css">

<!--

.style2 {color: #006699}

.style4 {color: #006600}

.style6 {color: #000000}

-->

</style>

</head>

<style type="text/css">

<!--

.style1 {

	font-size: 16px;

	font-weight: bold;

}

body {

	margin-left: 0px;

	margin-top: 0px;

}

-->

</style>

<body rightmargin="0" bottommargin="0">

<table width="100%"  border="0" cellpadding="0" cellspacing="0" style="word-break:break-all;table-layout:fixed;">

<tr>

	<td align="left" valign="top">







	<table width="100%"  border="0" cellpadding="5" cellspacing="1" bgcolor="CCCCCC" style="word-break:break-all;table-layout:fixed;">

        <tr align="left" valign="middle" bgcolor="ECECEC" >

          <td nowrap class="admin_maintain_header">檔案描述</td>

          <td width="120" align="center" valign="middle" nowrap class="admin_maintain_header">複製連結</td>

          <td width="80" align="center" valign="middle" nowrap class="admin_maintain_header">下載</td>

          <td width="60" align="center" valign="middle" nowrap class="admin_maintain_header">刪除</td>

        </tr>



<?php



















	

$file_sql = ' SELECT  *  FROM  tbl_web_sub_content_file  WHERE  web_sub_content_item_id='.$item_id."  ORDER BY  file_name ";

$file_result = mysql_query( $file_sql, $link_id );



while( $file_obj = mysql_fetch_object($file_result) )

{

?>

        <tr align="left" valign="middle" >

          <td nowrap bgcolor="#FFFFFF" ><?php echo $file_obj->file_remark;?></td>

          <td align="center" valign="middle" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF">( <a href="javascript:Link_Copy('file_sub_content/<?php echo $file_obj->file_name?>')" >按此複製連結</a> )</font></td>

          <td align="center" valign="middle" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF">( <a href="../../file_sub_content/<?php echo $file_obj->file_name?>" target="_blank" >按此下載</a> )</font></td>

          <td align="center" valign="middle" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="file_delete.php?item_id=<?php echo $item_id?>&file_id=<?php echo $file_obj->file_id;?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>

        </tr>

<?php



}













?>

      </table>













	</td>

	<td width="220" align="center" valign="top">











<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" >

<form action="file_upload_process.php" enctype="multipart/form-data" method="post" name="form1">

	<tr align="left" valign="middle" >

		<td align="center"><span class="subHead">

	  <input type="submit" value="確定上載" >

		</span>		  <input name="id" type="hidden" id="id" value="<?php echo $item_id;?>"></td>

		</tr>

<?php



for($i=0;$i<3;$i++)

{



?>

	<tr align="left" valign="middle">

	  <td><input name="remark[]" type="text" id="remark[]" size="15" maxlength="125">檔案描述</td>

	</tr>

	<tr align="left" valign="middle">

      <td><input name="file_ary[]" type="file" id="file_ary[]" size="15"></td>

	</tr>

<?php



}



?>

  </form>

</table>	</td>

</tr>

</table>

</body>



