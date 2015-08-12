
<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("php-bin/function.php");
include_once("php-bin/lib_header.php");
define('file_Path','userfiles/pdf/');

//**************  Paging System - Start ************/
$search_SQL    = "SELECT    *    FROM     tbl_notice   WHERE  a_type=1 ";
//echo $search_SQL;die();
$search_Result = mysql_query( $search_SQL, $link_id );
$count_Obj    = mysql_fetch_object($search_Result);


$Paging_Size = 9;  // how many record per page.
$Paging_Width = 10; // 
$Paging_RecordCount = mysql_num_rows($search_Result);
$TotalNum=ceil($Paging_RecordCount/$Paging_Size);
$Paging_NowPage=is_numeric($_GET['p'])?trim($_GET['p']):1;
// include
include_once("php-bin/lib_paging.php");

//**************  Paging System - End ************/

$search_SQL_Limit = $search_SQL.' 
	ORDER BY  a_id  DESC 
	LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'  ';

$SplitPage_Result = mysql_query( $search_SQL_Limit, $link_id );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聖公會基愛小學 S.K.H. Kei Oi Primary School</title>
<link href="css/all.css" rel="stylesheet" type="text/css" />
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
            <img src="images/title/info_notice.jpg" />
            <ul class="location">
                <li>首頁 &gt;</li>
						<li>							
							學校資訊
 &gt; 						</li>
						<li>通告下載</li>
            </ul>
        </div>
	  <!-- //locationGroup -->
	  
	  <div id="contents_In">
	    <table width="98%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td width="100%" colspan="3" class="section">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" class="section"><table width="100%" border="0" cellpadding="8" cellspacing="1">
                <tr>
                  <td width="5%" align="center" valign="top" bgcolor="#FEFEF2" class="content_top"><table width="100%" height="14" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td></td>
                    </tr>
                  </table>
                  <img src="images/arrow_02.jpg" width="13" height="13" /></td>
                  <td width="95%" height="40" bgcolor="#FEFEF2" class="content_top">本欄提供學校最近三個月發出之通告，讓家長可更清楚學校之動向。通告以PDF格式儲存，而文件閱讀程式可從以下超連結下載。</td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3" class="section">&nbsp;</td>
          </tr>
          
          <tr>
            <td colspan="3" class="section"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E3E8CE">
              <tr>
                
                <td height="40" align="center" bgcolor="#EDF2D8"><strong>通告编号</strong></td>
                <td height="40" align="center" bgcolor="#EDF2D8"><strong>通告內容</strong></td>
                <td height="40" align="center" bgcolor="#EDF2D8"><strong>下載</strong></td>
              </tr>
                    <?php
                         $i=0;
							while( $Report_Obj = mysql_fetch_object($SplitPage_Result) ){
					?>
			 <tr>
			      <td align="center" bgcolor="#FFFFFF"><?php echo $Report_Obj->a_id;?></td>
                  <td height="35" align="center" bgcolor="#FFFFFF"><?php echo $Report_Obj->a_title;?> </td>
                 <td bgcolor="#FFFFFF" align="center"><a href="<?php if(is_file(file_Path.$Report_Obj->down_file))echo file_Path.$Report_Obj->down_file; else echo "javascript:void(0);"?>" target="_blank"><img src="images/2013-11-28_124423.png" width="31" height="31" /></a></td>
                </tr>
              
			<?php  $i++;} ?>
				
            

            </table>
            </td>
          </tr>
          <tr>
            <td colspan="3" class="section">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" class="section"><div class="scott">
            <?php if($Paging_NowPage>1){?><a href="News.php?p=<?php echo $Paging_NowPage-1;?>"> &lt; </a><?php }else{?><span class="disabled"> &lt; </span><?php }?>
             <?php 
             $i=1;
             $p=isset($_GET['p'])?$_GET['p']:1;
             while($i<=$TotalNum){
             ?>
             <?php if($Paging_NowPage==$i){?>
              <span class="current"><?php echo $i;?></span>
             <?php }else{ ?>
              <span><a href="News.php?p=<?php echo $i;?>" ><?php echo $i;?></a></span>
             <?php }?>
             <?php $i++;}?>
           <?php if($Paging_NowPage<$TotalNum){?><a href="News.php?p=<?php echo $Paging_NowPage+1;?>"> &gt; </a><?php }else{?><span class="disabled"> &gt; </span><?php }?>
            
            </div></td>
          </tr>
          <tr>
            <td colspan="3" class="section">&nbsp;</td>
          </tr>
        </table>
	  </div>
	  
	  
	  </div>
      <!-- //contents -->
	  
	  
	  
</div>
<!-- //container --><?php include('foot.php'); ?>
</body>
</html>
