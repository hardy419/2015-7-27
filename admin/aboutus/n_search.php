<?php
header("Content-Type:text/html;charset=utf-8"); 
// admin checking
require_once '../../admin.inc.php';

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");


$type = $_GET['n_type']|0;
$year = $_GET['n_year']|0;
$month = $_GET['n_month']|0;
$title = EncodeHTMLTag($_GET['n_title']);
$serial = EncodeHTMLTag($_GET['n_serial']);
$msg = EncodeHTMLTag($_GET['msg']);

	$search_SQL = "  SELECT  *  FROM  
	tbl_chancellor where file_type_id=9 ";
   
	$search_Result = mysql_query( $search_SQL, $link_id );
	
	if ( ! $search_Result )
		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

	//**************  Paging System - Start ************/

	$Paging_Size = 10;  // how many record per page.
	$Paging_Width = 10; // 
	$Paging_RecordCount = mysql_num_rows($search_Result);
    
	// include
	include_once("../../php-bin/lib_paging.php");

	//**************  Paging System - End ************/
	

?><html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>網頁製作管理 - 尋找網頁</title>

	

	<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

	<style type="text/css">
	<!--
	.style2 {color: #006699}
	.style4 {color: #006600}
	.style5 {color: #666666}
	-->
	</style>
</head>

<body>
	<p class="title">校長的話</p><BR>
	  
	<table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="small">
		<form action="" method="get" name="form1" id="form1" style="border:0" ><?php

if( $msg != "" )
{

	?>
			<tr>
				<td>
					<table width="100%"  border="0" cellspacing="1" cellpadding="10">
						<tr>
							<td><font class=style8 color=red><?php   if($msg){ echo Msg($msg);}?></font></td>
						</tr>
					</table>
					<hr style="height:1px;color=ECECEC;">
				</td>
			</tr>

	<?php

}

?>
			<tr>
				<td>
					<table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">
						<tr align="left" valign="top" bgcolor="#FFFFFF">
							<td width="30%"><span class="style2"><span class="style4">校長的話</span>：</span>&nbsp;</td>
							<td width="20%"><a href="n_add.php">新增</a></td>
							<td width="20%">&nbsp;</td>
                               <td><a href="n_type_update.php"></a></td>
						</tr>
					</table>

				 <!-- <hr style="height:1px;color=ECECEC;">
					<table width="398" border="0" cellpadding="4" cellspacing="0">


						<tr height="25">
							<td width="100">標題:</td>
							<td width="150"><input name="n_title" id="n_title" type="text" value="<?php echo $title?>" size="20"></td>
							<td>&nbsp;</td>
						</tr>

						<tr height="25">
						  <td>序號:</td>
						  <td><input name="n_serial" id="n_serial" type="text" value="<?php echo $serial?>" size="20"></td>
						  <td>&nbsp;</td>
					  </tr>
						<tr height="25">
							<td>&nbsp;</td>
							<td><input type="submit" value="搜尋" ><BR></td>

							<td>&nbsp;</td>
						</tr>
					</table>-->

<?php











	if( $Paging_RecordCount > 0 )
	{
		$search_SQL_Limit = $search_SQL .'   LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'   ';;
		$SplitPage_Result = mysql_query($search_SQL_Limit, $link_id);

									
?>

				  <hr style="height:1px;color=ECECEC;">
									<table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">
										<tr align="left" valign="top">
											<td width="15%" bgcolor="#FFFFFF"><span class="style4">搜尋結果：</span></td>

											<td width="85%" align="right" bgcolor="#FFFFFF">總共有 <?php echo $Paging_RecordCount ?> 個資料<font color=#CCCCCC>&nbsp;&nbsp;|</font>&nbsp;&nbsp; 每頁 <?php echo  $Paging_Size ?> 個 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 分 <?php echo $Paging_TotalPage ?> 頁顯示
											</td>
										</tr>
									</table>

									<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="CCCCCC" style="word-break:break-all;table-layout:fixed;">
										<tr align="left" valign="middle" bgcolor="ECECEC">
											<td width="70" nowrap class="admin_maintain_header">序號</td>
											<td nowrap class="admin_maintain_header">標題</td>

											<td width="35" align="center" valign="middle" nowrap class="admin_maintain_header">更改</td>
											<td width="35" align="center" valign="middle" nowrap class="admin_maintain_header">刪除</td>
										</tr>

<?php

		while( $SplitPage_Record_Obj=mysql_fetch_object($SplitPage_Result) )
		{

?>

												<tr align="left" valign="middle">
													<td nowrap bgcolor="#FFFFFF"><?php echo  $SplitPage_Record_Obj->file_serial; ?></td>
													<td nowrap bgcolor="#FFFFFF"><?php echo  $SplitPage_Record_Obj->file_title; ?></td>

													<td align="center" valign="middle" nowrap bgcolor="#FFFFFF"><font class="style8" color="#0000FF"><a href="n_update.php?id=<?php echo $SplitPage_Record_Obj->file_id;?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>
													<td align="center" valign="middle" nowrap bgcolor="#FFFFFF"><font class="style8" color="#0000FF"><a href="n_delete.php?id=<?php echo $SplitPage_Record_Obj->file_id;?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>
												</tr>

<?php
		}
?>
									</table>

									<table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">
		  <tr align="left" valign="top">
											<td width="15%" bgcolor="#FFFFFF">&nbsp;</td>

											<td width="85%" align="right" bgcolor="#FFFFFF"><?php


		PagingSystem_dynamic( $Paging_NowPage , $Paging_TotalPage , $Paging_Width , array("start_search=1", "n_type=".$type, "n_year=".$year, "n_month=".$month, "n_title=".$title) );

?></td>
										</tr>
									</table>

<?php

	}
	else
	{

?>

									<hr style="height:1px;color=ECECEC;">
									<div align="center">
										<table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">
											<tr align="left" valign="top">
												<td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6 style5">( 沒有找到有關的資料 ) </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="history.go(-1)">返回</a></td>
											</tr>
										</table>
									</div>

<?php


	}




?>

</td>
			</tr>
		</form>
	</table>
</body>


</html>
<?php
mysql_close();
?>