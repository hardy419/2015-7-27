<?php



// admin checking
require_once("../../admin.inc.php");



// Connect Database

require_once("../../php-bin/function.php");



// access control checking

require_once("z_access_control.php");



require("config.php");

$title = EncodeHTMLTag($_GET['title']);

$category_id=$_GET['title']|0;

$msg=$_GET['msg'];



$search_SQL = "SELECT * FROM tbl_video WHERE 1";



if ($category_id )

	$search_SQL .= " AND category_id ={$category_id} ";

if ($title != "")

	$search_SQL .= " AND title LIKE '%".$title."%'";

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

	<?php print_title(); ?>

	  

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

						<tr align="left" valign="top" bgcolor="#FFFFFF">

							<td width="30%"><span class="style2"><span class="style4">管理</span>：</span>&nbsp;</td>



							<td width="20%"><a href="search.php">尋找</a></td>



							<td width="20%">

								<a href="add.php">新增</a></td>

						</tr>

					</table>



					<hr style="height:1px;color=ECECEC;">

					<table width="398" border="0" cellpadding="4" cellspacing="0">
					  <tr height="25">
					    <td>分類:</td>
					    <td><label>
					      <select name="category_id" id="category_id">
					        <option value="0">全部</option>
					        <option value="1" <?php if(1==$_GET['category_id']):?>selected<?php endif;?>>校園短片</option>
					        <option value="2" <?php if(2==$_GET['category_id']):?>selected<?php endif;?>>生態直播</option>
				          </select>
					    </label></td>
				      </tr>

						<tr height="25">

							<td width="">主題:</td>



							<td width=""><input name="title" type="text" id="title" value="<?php echo urldecode($title)?>" size="30" maxlength="255"></td>

						</tr>

						<tr height="25">

							<td>&nbsp;</td>

							<td><input name="submit" type="submit" value="搜尋" >

						  <BR></td>

						</tr>

					</table>



<?php




	if( $Paging_RecordCount > 0 )

	{

		$search_SQL_Limit = $search_SQL .' ORDER BY `date` DESC LIMIT '.($Paging_Size*($Paging_NowPage-1)).','.$Paging_Size .'   ';

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
										  <td width="131" align="center" nowrap class="admin_maintain_header">分類</td>

<td width="160" align="center" nowrap class="admin_maintain_header">日期</td>

											<td width="223" align="center" nowrap class="admin_maintain_header">主題</td>

											<td width="35" align="center" valign="middle" nowrap class="admin_maintain_header">更改</td>

											<td width="35" align="center" valign="middle" nowrap class="admin_maintain_header">刪除</td>

										</tr>



<?php



		while( $SplitPage_Record_Obj=mysql_fetch_object($SplitPage_Result) )

		{



?>



												<tr align="left" valign="middle">
												  <td valign="top" nowrap bgcolor="#FFFFFF"><font class="style8">
												    <?php echo  $SplitPage_Record_Obj->category_id==1?'校園短片':'生態直播'; ?>
												  </font></td>

<td valign="top" nowrap bgcolor="#FFFFFF"><font class="style8"><?php echo  $SplitPage_Record_Obj->date; ?></font></td>

													<td valign="top" nowrap bgcolor="#FFFFFF"><font class="style8"><?php echo  $SplitPage_Record_Obj->title; ?></font></td>

													<td align="center" valign="middle" nowrap bgcolor="#FFFFFF"><font class="style8" color="#0000FF"><a href="update.php?id=<?php echo $SplitPage_Record_Obj->id;?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>

													<td align="center" valign="middle" nowrap bgcolor="#FFFFFF"><font class="style8" color="#0000FF"><a href="delete.php?id=<?php echo $SplitPage_Record_Obj->id;?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>

												</tr>



<?php

		}

?>

									</table>

<?php

if ($Paging_RecordCount > $Paging_Size) {

?>

	  <table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

										<tr align="left" valign="top">

											<td width="15%" bgcolor="#FFFFFF">&nbsp;</td>



											<td width="85%" align="right" bgcolor="#FFFFFF"><?php





		PagingSystem_dynamic($Paging_NowPage, $Paging_TotalPage, $Paging_Width, array("start_search=1", "mp3_type_id=".$mp3_type_id));



?></td>

										</tr>

									</table>

<?php

} // if ($Paging_RecordCount > $Paging_Size) {

?>

<?php



	}

	else

	{



?>



									<hr style="height:1px;color=ECECEC;">

									<div align="center">

										<table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

											<tr align="left" valign="top">

												<td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6 style5">( 沒有找到有關的資料 ) </font></td>

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