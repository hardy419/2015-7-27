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
	tbl_file AS tn  LEFT JOIN  tbl_file_type AS tt
	 ON ( tn.file_type_id = tt.type_id  ) 
	 WHERE  1  ";
	
	if( $type != 0 )
		$search_SQL .= "  AND  tn.file_type_id=".$type ;
	else
	{
		$sub_id_ary = array();
		$sub_sql = "SELECT category_id FROM tbl_access_control_detail 
					WHERE
						teacher_id=".$_SESSION["kw_admin_user_id"]."  AND
						cms_category=".$File_cms_category;
		$sub_result = mysql_query( $sub_sql, $link_id );
		while( $sub_obj = mysql_fetch_object($sub_result) )
			$sub_id_ary[] = $sub_obj->category_id;
		if( count($sub_id_ary) == 0 )
			exit();

		$search_SQL .= "  AND  tn.file_type_id IN ( ". implode(",", $sub_id_ary) ." )  ";
	}

	if( $year != 0 )
		$search_SQL .= "  AND  YEAR(tn.file_date)=".$year ;

	if( $month != 0 )
		$search_SQL .= "  AND  MONTH(tn.file_date)=".$month ;

	if( $title != "" )
		$search_SQL .= "  AND  tn.file_title LIKE '%".$title."%'  " ;
	if( $serial != "" )
		$search_SQL .= "  AND  tn.file_serial LIKE '%".$serial."%'  " ;

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
	<img src="admin_label.gif" width="500" height="35"><BR>
	  
	<table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="small">
		<form action="" method="get" name="form1" id="form1" style="border:0" ><?php

if( $msg != "" )
{

	?>
			<tr>
				<td>
					<table width="100%"  border="0" cellspacing="1" cellpadding="10">
						<tr>
							<td><font class=style8 color=red><?php   if($msg=1){ echo "更新完成";}?></font></td>
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
							<td width="30%"><span class="style2"><span class="style4">網上檔案總管</span>：</span>&nbsp;</td>
							<td width="20%"><a href="n_add.php">新增</a></td>
							<td width="20%">&nbsp;</td>
                               <td><a href="n_type_update.php"></a></td>
						</tr>
					</table>

				  <hr style="height:1px;color=ECECEC;">
					<table width="398" border="0" cellpadding="4" cellspacing="0">

						<tr height="25">
							<td width="">類別:</td>

							<td width=""><select name="n_type" id="n_type" >
                              <option value="0" selected>全部</option>
                              <?php
$type_sql="SELECT *  FROM  tbl_file_type   ORDER BY  type_order  ASC ";
$type_result=mysql_query($type_sql, $link_id);

while( $type_Obj=mysql_fetch_object($type_result) )
{
	if( $type_Obj->type_id == $type)
		echo '<option value="' . $type_Obj->type_id . '" selected>' . $type_Obj->type_name . '</option>';
	else
		echo '<option value="' . $type_Obj->type_id . '">' . $type_Obj->type_name . '</option>';
}




										
?>
                            </select></td>

							<td>&nbsp;							</td>
						</tr>
						
						<tr height="25">
							<td width="100">年份:</td>

							<td width="150"><select name="n_year" id="n_year"><option value="0">全部</option><?php





// get all match year
$search_Year_SQL=" SELECT    DISTINCT   Year(file_date) AS year   FROM     tbl_file          ORDER BY  year  DESC ";
$Search_Year_Result=mysql_query($search_Year_SQL, $link_id);
while( $year_Obj=mysql_fetch_object($Search_Year_Result) )
{
	if( $year == $year_Obj->year )
		echo "<option value=" . $year_Obj->year . " selected>" . $year_Obj->year . "</option>";
	else
		echo "<option value=" . $year_Obj->year . ">" . $year_Obj->year . "</option>";
}

?></select></td>

							<td width="">&nbsp;</td>
						</tr>

						<tr height="25">
							<td width="">月份:</td>

							<td width="">
								<select name="n_month" id="n_month"><option value="0">全部</option><?php




// get all match month
$search_Month_SQL="SELECT    DISTINCT   MONTH(file_date) AS month   FROM     tbl_file          ORDER BY  month  ";
$Search_Month_Result=mysql_query($search_Month_SQL, $link_id);

while( $month_Obj=mysql_fetch_object($Search_Month_Result) )
{
	if( $month == $month_Obj->month )
		echo "<option value=" . $month_Obj->month . " selected>". $month_Obj->month ."</option>";
	else
		echo "<option value=" . $month_Obj->month . ">". $month_Obj->month . "</option>";
}





/*
for($i=1; $i<=12; $i++)
{
if($i == $month)
	echo '<option value="' . $i . '" selected>' . $i . '</option>';
else
	echo '<option value="' . $i . '" >' . $i . '</option>';
}
*/




?></select></td>

							<td>&nbsp;</td>
						</tr>

						<tr height="25">
							<td width="">標題:</td>

							<td width=""><input name="n_title" id="n_title" type="text" value="<?php echo $title?>" size="20"></td>
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
					</table>

<?php











	if( $Paging_RecordCount > 0 )
	{
		$search_SQL_Limit = $search_SQL .'  ORDER BY  tn.file_year DESC, tn.file_serial ASC,tn.file_date DESC    LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'   ';;
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
											<td width="120" nowrap class="admin_maintain_header">類別</td>
											<td width="80" align="center" nowrap class="admin_maintain_header">日期</td>
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
													<td nowrap bgcolor="#FFFFFF"><font class="style8"><?php echo  $SplitPage_Record_Obj->type_name; ?></font></td>
													<td align="center" nowrap bgcolor="#FFFFFF"><font class="style8"><?php echo $SplitPage_Record_Obj->file_date; ?></font></td>
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