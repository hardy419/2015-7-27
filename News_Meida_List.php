<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("php-bin/function.php");
include_once("php-bin/lib_header.php");


//**************  Paging System - Start ************/

$search_SQL    = "SELECT    *    FROM     tbl_notice   WHERE a_type=5";
//echo $search_SQL;die();
$search_Result = mysql_query( $search_SQL, $link_id );

$Paging_Size = 8;  // how many record per page.
$Paging_Width = 10; // 
$Paging_RecordCount = mysql_num_rows($search_Result);

// include
include_once("php-bin/lib_paging.php");

//**************  Paging System - End ************/
$search_SQL_Limit = $search_SQL.' 
	ORDER BY   a_id  DESC 
	LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'  ';
$SplitPage_Result = mysql_query( $search_SQL_Limit, $link_id );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聖公會基愛小學 S.K.H. Kei Oi Primary School</title>
<link href="css/all.css" rel="stylesheet" type="text/css" />
<link href="css/.css" rel="stylesheet" type="text/css" />
</head>

<body><?php include('top_news.php'); ?>


<!-- container -->
<div id="container">


      <!-- lnb -->
      <div id="lnb">
            <h2 class="lnbTitle"><img src="images/images/lnb4.png"/></h2>
			<div id="snb"><?php include('News_Left.php'); ?></div>	
      </div>
	  
      <!-- //lnb -->
	  
	  
	  
	  <!-- contents -->
      <div id="contents">
	  
	  
	     <!-- locationGroup -->
	      <div id="locationGroup">
            <!--<img src="images/news_topbar.jpg" />-->

            <ul class="location">
                <li>首頁 &gt;</li>
						<li>							
							學校資訊
 &gt; 						</li>
						<li>媒體報導</li>
            </ul>
        </div>
	  <!-- //locationGroup -->
	  
	  <div id="contents_In">
	     <table width="100" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2"><img src="images/news01.jpg" width="635" height="28" /></td>
                </tr>
                <tr>
                  <td colspan="2"><table width="635" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td height="12" colspan="4"></td>
                      </tr>
                      <?php
						$i=0;
						while( $Record_Obj = mysql_fetch_object($SplitPage_Result) ){
						$class=(++$i%2==0)?'class="news_xiant"':'';
						?>
                      <tr>
                        <td width="8" height="30" <?php echo $class;?>>&nbsp;</td>
                        <td width="9" align="left" <?php echo $class;?>><img src="images/icon_2.jpg" width="2" height="2" /></td>
                        <td width="78" <?php echo $class;?>><?php echo $Record_Obj->a_date?></td>
                        <td width="540" <?php echo $class;?>><a href="News_Meida.php?id=<?php echo $Record_Obj->a_id?>"><?php echo $Record_Obj->a_title?></a> </td>
                      </tr>
                      <?php } ?>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td width="92%" align="right"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20">&nbsp;</td>
                        <td><table border="0" cellspacing="0" cellpadding="4">
                            <tr>
                              <td><?php
								if($Paging_RecordCount>0){
								echo PagingSystem_dynamic
								( $Paging_NowPage , $Paging_TotalPage , $Paging_Width, array("start_search=1", "year=".$year, "month=".$month, "type={$type}"));
								}
								?>
                              </td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                  <td width="8%">&nbsp;</td>
                </tr>
            </table>
	  </div>
	  
	    </div>
      </div>
      <!-- //contents -->
	  
	  
	  
</div>
<!-- //container --><?php include('foot.php'); ?>
</body>
</html>
