<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("php-bin/function.php");
include_once("php-bin/lib_header.php");
define('file_Path','userfiles/pdf/');

//**************  Paging System - Start ************/
$search_SQL    = "SELECT    *    FROM     tbl_notice   WHERE  a_type='4' ";
//echo $search_SQL;die();
$search_Result = mysql_query( $search_SQL, $link_id );
$count_Obj    = mysql_fetch_object($search_Result);


$Paging_Size = 8;  // how many record per page.
$Paging_Width = 10; // 
$Paging_RecordCount = mysql_num_rows($search_Result);

// include
include_once("php-bin/lib_paging.php");

//**************  Paging System - End ************/

$search_SQL_Limit = $search_SQL.' 
	ORDER BY  add_time  DESC 
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

<body>
<?php include('top_download.php'); ?>
<!-- container -->
<div id="container">


      <!-- lnb -->
       <div id="lnb">
            <h2 class="lnbTitle"><img src="images/images/lnb6.png"/></h2>
			<div id="snb"><?php include('DownLoad_Left.php'); ?></div>	
      </div>
      <!-- //lnb -->
	  
	  
	  
	  <!-- contents -->
      <div id="contents">
	  
	  
	     <!-- locationGroup -->
	      <div id="locationGroup">
            <!--<img src="images/download_topbar.jpg" />-->

            <ul class="location">
                <li>首頁 &gt;</li>
						<li>							
							資料下載區
 &gt; 						</li>
						<li>學校報告及發展計劃</li>
            </ul>
        </div>
	  <!-- //locationGroup -->
	  
	  <div id="contents_In">
	     <table border="0" cellspacing="0" cellpadding="15" width="840">
          <tr>
            <td  valign="top" bgcolor="#FEFAF5" width="840">
            <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E3E8CE">
              <tr>
                <td height="40" colspan="2" align="center" bgcolor="#EDF2D8"><strong>學校報告及發展計劃</strong></td>
              </tr>
                      <?php
                         $i=0;
							while( $Report_Obj = mysql_fetch_object($SplitPage_Result) ){
					?>
			 <tr>
                  <td align="center" bgcolor="#FFFFFF" class="section"><?php echo $Report_Obj->a_title;?> </td>
                  <td align="center" bgcolor="#FFFFFF" class="section"><a href="<?php if(is_file(file_Path.$Report_Obj->down_file))echo file_Path.$Report_Obj->down_file; else echo "javascript:void(0);"?>" target="_blank"><img src="images/2013-11-28_124423.png" width="31" height="31" /></a></td>
                </tr>
              
			<?php  $i++;} ?>
						
            </table>
	                        
            </td>
                
               </tr>
             </table>
          </td>
          </tr>
        </table>
	    </div>
      </div>
      <!-- //contents -->
	  
	  
	  
</div>
<!-- //container --><?php include('foot.php'); ?>
</body>
</html>
