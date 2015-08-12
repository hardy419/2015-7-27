<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");











$content_ID = $HeadMaster_WebContent_ID;

















if( $content_ID != 0 )

{







	//**************  Paging System - Start ************/



	$search_SQL    = "SELECT    *  FROM    tbl_web_sub_content    WHERE       web_content_id=$content_ID  ";

	$count_Result = mysql_query( $search_SQL, $link_id );

	$count_Obj    = mysql_fetch_object($count_Result);



	$Paging_Size = 10;  // how many record per page.

	$Paging_Width = 10; // 

	$Paging_RecordCount = mysql_num_rows($count_Result);





	// include

	include_once("../../php-bin/lib_paging.php");

	//**************  Paging System - End ************/

}
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

<img src="admin_label.gif" width="500" height="35"><br>

<table width="650"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">

<form action="w_search.php" method="get" name="form1" id="form1" style="border:0" onSubmit="return Submit_Form()">

  <tr> 

    <td>

      <table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td width="200"><span class="style2"><span class="style4">校長專頁</span>：</span></td>

          <td width="100"><a href="w_search.php" >搜尋校長專頁</a></td>

          <td width="100"> <a href="w_sub_content_add.php" >新增主題</a></td>

          <td>&nbsp;</td>

        </tr>

      </table>

<?php



if( $_GET['msg'] != '' )

	echo '<BR><font color="red">'. $_GET['msg'] .'</font><BR>';

















if(  $content_ID != 0 )

{







	if( $Paging_RecordCount > 0 )

	{













?>

<hr style="height:1px;color=ECECEC;">

      <table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

        <tr align="left" valign="top">

          <td width="15%" bgcolor="#FFFFFF"><span class="style4">搜尋結果：</span></td>

          <td width="85%" align="right" bgcolor="#FFFFFF">總共有 <?php echo $Paging_RecordCount?> 個資料<font color=#CCCCCC>&nbsp;&nbsp;|</font>&nbsp;&nbsp; 每頁 <?php echo $Paging_Size?> 個 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 分 <?php echo $Paging_TotalPage ?> 頁顯示 </td>

        </tr>

      </table>      

      <table width="100%"  border="0" cellpadding="5" cellspacing="1" bgcolor="CCCCCC" style="word-break:break-all;table-layout:fixed;">

        <tr align="left" valign="middle" bgcolor="ECECEC" >

          <td width="200" nowrap class="admin_maintain_header">主題</td>

          <td nowrap class="admin_maintain_header">描述</td>

          <td width="40" align="center" valign="middle" nowrap class="admin_maintain_header">內頁</td>

          <td width="85" align="center" valign="middle" nowrap class="admin_maintain_header">更改主題樣式</td>

          <td width="65" align="center" valign="middle" nowrap class="admin_maintain_header">檢視主題</td>

          <td width="65" align="center" valign="middle" nowrap class="admin_maintain_header">刪除主題</td>

        </tr>



<?php

















		$search_SQL_Limit = $search_SQL.'     ORDER BY     

   web_sub_content_inner ASC,

   web_sub_content_order ASC,

   web_sub_content_id ASC   

       LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'  ';

/*

		$search_SQL_Limit = '

SELECT  sc.*,  InnerP.web_sub_content_order  AS  innerP_order

FROM    tbl_web_sub_content  AS  sc

  LEFT JOIN  tbl_web_sub_content  AS InnerP  ON(sc.web_sub_content_inner=InnerP.web_sub_content_id)



WHERE    sc.web_content_id='.$HeadMaster_WebContent_ID.'    AND    sc.web_content_id='.$content_ID.'  

ORDER BY 

   sc.web_sub_content_inner ASC,

   sc.web_sub_content_order ASC,

   sc.web_sub_content_id ASC    

LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'  ';

*/



		$SplitPage_Result = mysql_query( $search_SQL_Limit, $link_id );





		while( $SplitPage_Record_Obj = mysql_fetch_object($SplitPage_Result) )

		{



?>

        <tr align="left" valign="middle" >

          <td bgcolor="#FFFFFF" ><font class="style8"><?php



if( $SplitPage_Record_Obj->web_sub_content_inner != 0 )

{

	$inner_sql = " SELECT * FROM  tbl_web_sub_content  WHERE  web_sub_content_id=".$SplitPage_Record_Obj->web_sub_content_inner;

	$inner_result = mysql_query( $inner_sql, $link_id);

	if( $inner_obj = mysql_fetch_object($inner_result) )

	{

		echo $inner_obj->web_sub_content_title." > ";

	}

}



echo CutStr($SplitPage_Record_Obj->web_sub_content_title,25);



?></font></td>

          <td bgcolor="#FFFFFF" ><font class="style8"><?php echo CutStr($SplitPage_Record_Obj->web_sub_content_description,50);?></font></td>

          <td align="center" bgcolor="#FFFFFF" ><font class="style8"><?php echo ($SplitPage_Record_Obj->web_sub_content_inner==0?"否":"是")?></font></td>

          <td align="center" valign="middle" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="w_sub_content_update.php?id=<?php echo $SplitPage_Record_Obj->web_sub_content_id;?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt="更改"></a></font></td>

          <td align="center" valign="middle" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="w_sub_content.php?id=<?php echo $SplitPage_Record_Obj->web_sub_content_id;?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt="檢視內容"></a></font></td>

          <td align="center" valign="middle" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="w_sub_content_delete.php?id=<?php echo $SplitPage_Record_Obj->web_sub_content_id;?>" onClick="return confirm('你確定要刪除這筆資料嗎,里面所有內容也會同時被刪除?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>

        </tr>

<?php



		}













?>

      </table> 



<table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

          <tr align="left" valign="top">

            <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>

            <td width="85%" align="right" bgcolor="#FFFFFF"><?php





PagingSystem_dynamic( $Paging_NowPage , $Paging_TotalPage , $Paging_Width , array("id=$content_ID") );



?>

</td>

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

              <td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6 style5">( 沒有找到有關的資料 ) </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="w_search.php" >返回</a></td>

            </tr>

          </table>

        </div>



<?php



	}





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