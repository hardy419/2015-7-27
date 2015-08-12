<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// Connect Database

require_once("../../php-bin/function.php");



// access control checking

require_once("z_access_control.php");

$msg = $_GET["msg"];

$name = $_GET["t_name"];

$search_sql = "select * from tbl_contact where 1";

if ($name!="")

 $search_sql.="  and contact_name like '%".$name."%' or

 				contact_tel  like '%".$name."%' or

				contact_mail like '%".$name."%' or

				contact_text  like '%".$name."%'  ";

				$search_Result = mysql_query( $search_sql, $link_id );

$count_Obj = mysql_fetch_object($search_Result);





$Paging_Size = 8;  // how many record per page.

$Paging_Width = 10; // 

$Paging_RecordCount = mysql_num_rows($search_Result);



// include

include_once("../../php-bin/lib_paging.php");



//**************  Paging System - End ************/



$search_SQL_Limit = $search_sql.' 

	ORDER BY   contact_id   ASC 

	LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'  ';



$SplitPage_Result = mysql_query( $search_SQL_Limit, $link_id );

?><html>

<head>

<title>聯絡管理</title>

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

<span class="title">聯絡我們</span><BR>



<table width="650"  border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td><font class=style8 color=red>

                <?php   if ($msg!="") echo "<br>".$msg; ?>

              </font></td>

            </tr>

</table>



<table width="650" height="191"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">

  <tr> 

    <td>

      <hr style="height:1px;color=ECECEC;"><table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

        <tr align="left" valign="top" bgcolor="#FFFFFF">

          <td width="18%" height="46"><span class="style2"><span class="subHead">聯絡我們：</span></span></td>

          <td width="82%"><a href="contact_us.php" class="style8">搜尋</a></td>

        </tr>

      </table>

      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

              <form name="form1" method="get" action="?">

          <tr>

            <td width="18%" bgcolor="#FFFFFF"><span class="style2"><span class="style4">搜尋</span>：</span> </td>

            <td width="82%" bgcolor="#FFFFFF"><table border="0" cellpadding="1" cellspacing="0" class="small">

                <tr>

                  <td class="style5">關鍵字：</td>

                  <td><input name="t_name" type="text" id="t_name" value="<?php echo $_GET[t_name]?>" size="20"></td>

                  <td><input name="Submit" type="submit" class="small" value="搜尋">

				  <?php   if ($_GET[t_name] !="") {?>

                    <input value="重設" name="reset" type="button" onClick="javascript:location='contact_us.php'">

				<?php   } ?>                </tr>

            </table></td>

          </tr>

              </form>

      </table>

     <?php   if( $Paging_RecordCount > 0 )

	{

		

?>

      <hr style="height:1px;color=ECECEC;">

      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

        <tr align="left" valign="top">

          <td width="15%" bgcolor="#FFFFFF" class="style4">搜尋結果：</td>

          <td width="85%" align="right" bgcolor="#FFFFFF">

		  總共有 <?php echo $Paging_RecordCount?> 個資料

		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;

		  每頁 <?php echo $Paging_Size?> 個

		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;

		  分 <?php echo $Paging_TotalPage?> 頁顯示	      </td>

        </tr>

      </table>

      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">

        <tr valign="top" bgcolor="ECECEC" > 

          <td width="16%" nowrap class="admin_maintain_header">聯絡姓名</td>

          <td width="17%" nowrap class="admin_maintain_header">聯絡電話</td>

           <td width="23%" nowrap class="admin_maintain_header">聯絡Email</td>

          <td width="24%" nowrap class="admin_maintain_header">查詢內容</td>

          <td width="13%" nowrap bgcolor="ECECEC" class="admin_maintain_header">更改及檢視</td>

          <td width="7%" nowrap bgcolor="ECECEC" class="admin_maintain_header">刪除</td>

        </tr>

        <?php

      

    



		while( $get_rows=mysql_fetch_array($SplitPage_Result) )

		{



?>

        <tr align="left" valign="top" > 

          <td nowrap bgcolor="#FFFFFF" ><font class="style8">

            <?php echo $get_rows["contact_name"]?>

          </font></td>

          <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 

            <?php echo $get_rows["contact_tel"]?>

            </font></td>

              <td nowrap bgcolor="#FFFFFF" ><font class="style8">  <?php echo $get_rows["contact_mail"]?></font></td>

              <td nowrap bgcolor="#FFFFFF" ><font class="style8"> <?php echo $get_rows["contact_text"]?></font></td>

          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="contact_update.php?id=<?php echo $get_rows["contact_id"]?>"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>

          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="delete.php?id=<?php echo $get_rows["contact_id"]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a></font></td>

        </tr>

        <?php   } ?>

       

      </table>

     <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

        <tr align="left" valign="top">

          <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>

          <td width="85%" align="right" bgcolor="#FFFFFF"><?php





		PagingSystem_dynamic( $Paging_NowPage , $Paging_TotalPage , $Paging_Width , array("start_search=1",  "n_name=".$name) );



?></td>

        </tr>

      </table>

    <?php



	}

	else

	{



?>



    

      <div align="center">

        <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">

          <tr align="left" valign="top">

            <td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6 style5">( 沒有找到有關 <?php echo $_GET["t_name"]?> 的資料 ) </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="history.go(-1)">返回</a></td>

          </tr>

        </table>

      </div>

  <?php   }?>   

      

    <p align="right">&nbsp;    </p></td>

  </tr>

</table>

</body>

</html>

