<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");



$SearchStart = $_GET["SearchStart"]|0; // check if this is a search

// init variable to store data in $_GET

$match_Name = '';

$match_Year = '';

$match_StudentName = '';

//$queryText = '';      // to store the query text.

//$match_Orderby = '';

//$match_Sequence = '';


if( $_GET['m_match_name'] != '' )

{

	$match_Name = EncodeHTMLTag($_GET['m_match_name']);

	//$queryText .= '&m_match_name='. $_GET['m_match_name'];

}



if( $_GET['m_year'] != '' )

{

	$match_Year = $_GET['m_year']|0;

	//$queryText .= '&m_year='. $_GET['m_year'];

}



if( $_GET['m_student_name'] != '' )

{

	$match_StudentName = EncodeHTMLTag($_GET['m_student_name']);

	//$queryText .= '&m_student_name='. $_GET['m_student_name'];

}



if( $_GET['orderby'] != '' )

{

	$match_Orderby = EncodeHTMLTag($_GET['orderby']);

	//$queryText .= '&orderby='. $_GET['orderby'];

}



if( $_GET['sequence'] != '' )

{

	$match_Sequence = $_GET['sequence']|0;

	//$queryText .= '&sequence='. $_GET['sequence'];

}























  // do the search



$search_SQL = '';

$search_Condition_SQL = '';





// To Check how many record "match the request".

$search_SQL = "SELECT DISTINCT m.* from tbl_match AS m   LEFT JOIN  tbl_match_record AS r   ON(  m.match_id=r.match_id )  WHERE 1  ";



if( $match_Name!='' )

	$search_Condition_SQL .= ' AND m.match_name LIKE "%'.$match_Name.'%"';

if( $match_Year!='' )

	$search_Condition_SQL .= ' AND m.match_year="'.$match_Year.'"';

if( $match_StudentName!='' )

	$search_Condition_SQL .= ' AND r.match_record_student_name LIKE "%'.$match_StudentName.'%" ';



$All_Match_Result = mysql_query( $search_SQL.$search_Condition_SQL, $link_id );

if ( ! $All_Match_Result )

	$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));









//**************  Paging System - Start ************/



$Paging_Size = 10;  // how many record per page.

$Paging_Width = 10; // 

$Paging_RecordCount = mysql_num_rows($All_Match_Result);



// include

include_once("../../php-bin/lib_paging.php");



//**************  Paging System - End ************/

















?><html>

<head>

<title>校內比賽管理 - 搜尋比賽</title>

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



<SCRIPT LANGUAGE="JavaScript">

<!--

//-->

</SCRIPT>









<img src="admin_label.gif" width="500" height="35"><br>

<table width="650" height="191"  border="0" align="left" cellpadding="5" cellspacing="0" class="small"><?php



if( $_GET['msg'] != '' )

	echo '<tr height="30"><td><font color="red">'. $_GET['msg'] .'</font></td></tr>';





?>

  <tr> 

    <td>

<form action="m_search.php" method="get" name="search_method" id="search_method" style="border:0">

  <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

    <tr align="left" valign="top" bgcolor="#FFFFFF">

      <td width="30%" height="35"><span class="style2"><span class="style4">校內比賽管理</span>：</span></td>

      <td width="20%"><a href="m_search.php">搜尋比賽</a></td>

      <td width="20%"><a href="m_add.php" class="style8">新增比賽資料</a> </td>

      <td><a href="import.php" class="style8">導入比賽</a></td>

    </tr>

  </table>

  <hr style="height:1px;color=ECECEC;">

      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

       

          <tr>

            <td width="15%" valign="top" bgcolor="#FFFFFF"><span class="style2"><span class="style4">搜尋比賽</span>：</span> </td>

            <td width="85%" bgcolor="#FFFFFF">

              <table border="0" cellpadding="1" cellspacing="0" class="small">

                  <tr>

                    <td><span class="style5">比賽年份：</span></td>

                    <td><select name="m_year" id="m_year"><option value="">全部</option><?php







// get all match year

$search_year_SQL = "SELECT    DISTINCT match_year    FROM   tbl_match          ORDER BY  match_year  DESC ";

$Search_Year_Result = mysql_query( $search_year_SQL, $link_id );

while( $yearObj = mysql_fetch_object($Search_Year_Result) )

{

	if( $match_Year == $yearObj->match_year )

		echo "<option value=". $yearObj->match_year ." selected>". $yearObj->match_year ."-". ($yearObj->match_year+1) ." 年度</option>";

	else

		echo "<option value=". $yearObj->match_year .">". $yearObj->match_year ."-". ($yearObj->match_year+1) ." 年度</option>";

}







?></select></td>



















                    <td>               

                  </tr>

              </table>

              <table border="0" cellpadding="1" cellspacing="0" class="small">

                <tr>

                  <td><span class="style5">比賽名稱：</span></td>

                  <td><input name="m_match_name" type="text" id="m_match_name" value="<?php echo $match_Name?>"  size="40" maxlength="40"></td>

                  <td>

              </tr>

            </table>

              <table border="0" cellpadding="1" cellspacing="0" class="small">

                  <tr>

                    <td><span class="style5">學生姓名：</span></td>

                    <td><input name="m_student_name" type="text" id="m_student_name" value="<?php echo $match_StudentName?>" size="20"></td>

                    <td>               

                  </tr>

              </table>

              <p>

                <input type="submit" class="small" value="搜尋">

                <input type="reset" value="重設" >

                <input type="hidden" name="SearchStart" value="1" >

</p>              </td>

          </tr>

        

      </table>

</form>

<?php



if( $Paging_RecordCount > 0 ) // found match record

{





	$search_SQL_Orderby = '  ORDER BY  match_date  DESC ';

	$search_SQL_Limit = '';

/*

	if( $match_Orderby == 'name' )

		$search_SQL_Orderby .= ' ORDER BY  m.match_name ';

	if( $match_Orderby == 'year' )

		$search_SQL_Orderby .= ' ORDER BY  m.match_year ';

	if( $match_Orderby == 'studentname' )

		$search_SQL_Orderby .= ' ORDER BY  r.match_record_student_name ';

	if( $match_Orderby == 'classname' )

		$search_SQL_Orderby .= ' ORDER BY  r.match_record_class_name ';



	if( $search_SQL_Orderby != '' )

	{

		if( $match_Sequence%2 == 0 )

			$search_SQL_Orderby .= ' ASC ';

		else

			$search_SQL_Orderby .= ' DESC ';



		$match_Sequence += 1;

		$match_Sequence %= 2;



		//$queryText .= '&sequence='. ($match_Sequence%2);

	}

*/



	

	$search_SQL_Limit .= '  LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'  ';

	$sql = $search_SQL . $search_Condition_SQL . $search_SQL_Orderby ."  ". $search_SQL_Limit;

	$Match_SplitPage_Result = mysql_query( $sql, $link_id );







?>



      <hr style="height:1px;color=ECECEC;">

      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

        <tr align="left" valign="top">

          <td width="15%" bgcolor="#FFFFFF"><span class="style4">搜尋結果：</span></td>

          <td width="85%" align="right" bgcolor="#FFFFFF">

		  總共有 <?php echo $Paging_RecordCount?> 個資料

		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;

		  每頁 <?php echo $Paging_Size?> 個

		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;

		  分 <?php echo $Paging_TotalPage ?> 頁顯示 

	      </td> 



        </tr>

      </table>

      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" style="word-break:break-all;table-layout:fixed;">

        <tr valign="top" bgcolor="ECECEC" > 

          <td width="" nowrap class="admin_maintain_header">比賽名稱</td>

          <td width="100" align="center" nowrap class="admin_maintain_header">得獎年份</td>

          <td width="150" nowrap class="admin_maintain_header">



			<table style="width:100%;height:100%"   border="0" cellpadding="0" cellspacing="0">

              <tr align="left" valign="middle" ><td width="40">班別</td> 

              <td>學生姓名</td>

              </tr>

			</table>

          <td width="45" align="center" nowrap bgcolor="ECECEC" class="admin_maintain_header">更改</td>

          <td width="45" align="center" nowrap bgcolor="ECECEC" class="admin_maintain_header">刪除</td>

        </tr>



<?php











	while( $Match_SplitPage_Record_Obj = mysql_fetch_object($Match_SplitPage_Result) ) // get all the match

	{











?>







        <tr align="left" valign="top" > 

          <td bgcolor="#FFFFFF" ><font class="style8"> 

            <?php echo  $Match_SplitPage_Record_Obj->match_name ?>

            </font></td>

          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8"> 

           <?php echo  $Match_SplitPage_Record_Obj->match_year ?>-<?php echo  $Match_SplitPage_Record_Obj->match_year+1 ?>

            </font></td>

          <td nowrap bgcolor="#FFFFFF" ><p><font class="style8"> 



			<table style="width:100%;height:100%;word-break:break-all;table-layout:fixed;"  border="0" cellpadding="2" cellspacing="0"><?php











		// Get the student in the "match record" with the same match_id

		$search_student_SQL = ' SELECT * from tbl_match AS m,  tbl_match_record AS r   WHERE  m.match_id=r.match_id  AND  r.match_id='.$Match_SplitPage_Record_Obj->match_id.'   ORDER BY r.match_record_order  ASC  '; // .$search_SQL_Orderby

		$student_Result = mysql_query($search_student_SQL, $link_id);

		

		

		if (!$student_Result)

			$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

		

		

		while($student_Obj = mysql_fetch_object($student_Result))

		{

			echo '

					  <tr align="left" valign="middle" ><td width="40">'. $student_Obj->match_record_class_name .'</td> <td>'. $student_Obj->match_record_student_name .'</td></tr>';

		}





?>                

			</table>



		  </font></p>          </td>

          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="m_update.php?id=<?php echo  $Match_SplitPage_Record_Obj->match_id ;?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>

          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="m_delete.php?id=<?php echo  $Match_SplitPage_Record_Obj->match_id ;?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>

        </tr>



<?php

	}

?>

      </table>

     

         <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

          <tr align="left" valign="top">

            <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>

            <td width="85%" align="right" bgcolor="#FFFFFF"><?php



PagingSystem_dynamic( $Paging_NowPage , $Paging_TotalPage , $Paging_Width , array("m_match_name=$match_Name", "m_year=$match_Year", "m_student_name=$match_StudentName") );



?></td>

          </tr>

        </table>

	 

<?php



}

else if( $SearchStart > 0 )

{



?>



      <hr style="height:1px;color=ECECEC;">

        <div align="center">

          <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

            <tr align="left" valign="top">

              <td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6 style5">( 沒有找到有關的資料 ) </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="m_search.php">返回</a></td>

            </tr>

          </table>

        </div>

<?php

}

?>







    </td>

  </tr>

</table>

</body>

</html>

