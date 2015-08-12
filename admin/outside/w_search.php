<?php   header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");



$type = $_GET['n_type'];

$title = EncodeHTMLTag($_GET['n_title']);

$msg = EncodeHTMLTag($_GET['msg']);

	$search_SQL = "  SELECT  *  FROM  

	 tbl_w_content  AS tn  LEFT JOIN  tbl_w_type AS tt

	 ON ( tn.w_type_id = tt.type_id  ) 

	 WHERE  1  ";

	if( $type != 0 ) {

		$search_SQL .= "  AND  tn.w_type_id=".$type ; }

		

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



		$search_SQL .= "  AND  tn.w_type_id IN ( ". implode(",", $sub_id_ary) ." )  ";

	}

	

	if( $title != "" )

		$search_SQL .= "  AND  tn.w_title LIKE '%".$title."%'  " ;



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

<head>

	<title>網頁製作管理 - 尋找網頁</title>



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



<body>

	<span class="title"> 教學資源</span><br>

	  

	<table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="small">

		<form action="" method="get" name="form1" id="form1" style="border:0" ><?php



if( $msg != "" )

{



	?>

			<tr>

				<td>

					<table width="100%"  border="0" cellspacing="1" cellpadding="10">

						<tr>

							<td><font class=style8 color=red><?php echo $msg;?></font></td>

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

					  <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td width="200" class="style2"><span class="style4">教學資源管理</span>：</td>

          <td width="100"><a href="w_search.php" >搜尋</a></td>

          <td width="100"> <a href="w_sub_content_add.php" >新增教學資源</a></td>

          <td><a href="w_type_update.php">類別管理</a></td>

        </tr>

					</table>



					<hr style="height:1px;color=ECECEC;">

					<table width="398" border="0" cellpadding="4" cellspacing="0">



						<tr height="25">

							<td width="100">類別:</td>



							<td width="150"><select name="n_type" id="n_type">

							  <option value="0">全部</option>

							  <?php





$get_type_sql = " SELECT *  FROM  tbl_w_type   ORDER BY  type_order  ASC";



$get_type_result = mysql_query($get_type_sql, $link_id);

while( $type_obj = mysql_fetch_object($get_type_result) )

{

	echo '<option value="'. $type_obj->type_id .'">'. $type_obj->type_name .'</option>';

}





?>

							  </select>							</td>



							<td>&nbsp;							</td>

						</tr>



						<tr height="25">

							<td width="100">標題:</td>



							<td width="150"><input name="n_title" id="n_title" type="text" value="<?php echo $title?>" size="20"></td>

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

		$search_SQL_Limit = $search_SQL .'  ORDER BY   tn.type_order ASC,tn.w_date DESC    LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'   ';;

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

											<td width="57" nowrap class="admin_maintain_header">標題</td>

											<td width="165" nowrap class="admin_maintain_header">相關鏈接</td>

											<td width="35" align="center" valign="middle" nowrap class="admin_maintain_header">更改</td>

											<td width="35" align="center" valign="middle" nowrap class="admin_maintain_header">刪除</td>

										</tr>



<?php



		while( $SplitPage_Record_Obj=mysql_fetch_object($SplitPage_Result) )

		{



?>



												<tr align="left" valign="middle">

													<td nowrap bgcolor="#FFFFFF"><font class="style8"><?php echo  $SplitPage_Record_Obj->type_name; ?></font></td>

												  <td align="center" nowrap bgcolor="#FFFFFF"><font class="style8"><?php echo $SplitPage_Record_Obj->w_date; ?></font></td>

													

													<td align="center" nowrap bgcolor="#FFFFFF"><font class="style8">

													<?php   echo $SplitPage_Record_Obj->type_order; ?></font></td>

													<td nowrap bgcolor="#FFFFFF"><?php echo  $SplitPage_Record_Obj->w_title; ?></td>

													<td nowrap bgcolor="#FFFFFF"><?php echo  $SplitPage_Record_Obj->link_url; ?></td>

												  <td align="center" valign="middle" nowrap bgcolor="#FFFFFF"><font class="style8" color="#0000FF"><a href="w_update.php?id=<?php echo $SplitPage_Record_Obj->w_id;?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>

													<td align="center" valign="middle" nowrap bgcolor="#FFFFFF"><font class="style8" color="#0000FF"><a href="w_delete.php?id=<?php echo $SplitPage_Record_Obj->w_id;?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>

												</tr>



<?php

		}

?>

									</table>



<table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

										<tr align="left" valign="top">

											<td width="15%" bgcolor="#FFFFFF">&nbsp;</td>



											<td width="85%" align="right" bgcolor="#FFFFFF"><?php





		PagingSystem_dynamic( $Paging_NowPage , $Paging_TotalPage , $Paging_Width , array("start_search=1", "n_type=".$type, "n_title=".$title) );



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