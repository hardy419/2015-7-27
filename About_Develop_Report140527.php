<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("php-bin/function.php");
include_once("php-bin/lib_header.php");
define('file_Path','userfiles/pdf/');

//**************  Paging System - Start ************/
$search_SQL    = "SELECT    *    FROM     tbl_down   WHERE  a_type='1' ";
$report_Result = mysql_query( $search_SQL, $link_id );

$search_SQL    = "SELECT    *    FROM     tbl_down   WHERE  a_type='2' ";
$order_Result = mysql_query( $search_SQL, $link_id );

$search_SQL    = "SELECT    *    FROM     tbl_down   WHERE  a_type='3' ";
$school_Result = mysql_query( $search_SQL, $link_id );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聖公會基愛小學 S.K.H. Kei Oi Primary School</title>
<link href="css/all.css" rel="stylesheet" type="text/css" />
</head>

<body><?php include('top_about.php'); ?>


<!-- container -->
<div id="container">


      <!-- lnb -->
    <div id="lnb">
            <h2 class="lnbTitle"><img src="images/images/lnb1.png" alt="정시모집" /></h2>
			<div id="snb"><?php include('About_Left.php'); ?></div>
      </div>
      <!-- //lnb -->
	  
	  
	  
	  <!-- contents -->
      <div id="contents">
	  
	  
	     <!-- locationGroup -->
	      <div id="locationGroup">
            <img src="images/zhounianbaogaojijihua.jpg" width="361" height="110" />

            <ul class="location">
                <li>首頁 &gt;</li>
						<li>							
							學校簡介
 &gt; 						</li>
						<li>學校發展 &gt; 						</li>
						<li>							
							周年報告及計劃</li>
            </ul>
        </div>
	  <!-- //locationGroup -->
	  
	  <div id="contents_In">
	    <table width="98%" border="0" cellspacing="0" cellpadding="10">
          <tr>
            <td width="81%" valign="top" class="section"><table width="98%" border="0" cellpadding="8" cellspacing="1">
              <tr>
                <td width="4%" align="right" valign="top" bgcolor="#FEFEF2" class="content_top"><table width="100%" height="15" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td></td>
                    </tr>
                  </table>
                    <img src="images/arrow_02.jpg" width="13" height="13" /></td>
                <td width="96%" height="40" bgcolor="#FEFEF2" class="section"><strong class="table_title">&nbsp;&nbsp;&nbsp;周年報告及計劃</strong></td>
              </tr>
            </table>
              <table width="98%" border="0" cellpadding="0" cellspacing="1">
                <tr>
                  <td width="5%" height="69" valign="top" bgcolor="#FEFEF2" class="content_top"><table width="100%" height="9" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td></td>
                      </tr>
                  </table></td>
                  <td width="95%" bgcolor="#FEFEF2" class="section">為加深外界對我校的認識，本頁特地提供周年校務報告 及學校發展計劃書供下載。 現時最新版本為2010年至2013度的周年校務報告 及2012至2015年之學校發展計劃書。</td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>  
              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E3E8CE">
                <tr>
                  <td height="40" colspan="2" align="center" bgcolor="#EDF2D8" class="section"><strong>報告</strong></td>
                </tr>
                 <?php
				  while( $Report_Obj = mysql_fetch_object($report_Result) ){
				 ?>
                <tr>
                  <td align="center" bgcolor="#FFFFFF" class="section"><?php echo $Report_Obj->a_title;?> </td>
                  <td align="center" bgcolor="#FFFFFF" class="section" width="100"><a href="<?php if(is_file(file_Path.$Report_Obj->down_file))echo file_Path.$Report_Obj->down_file; else echo "javascript:void(0);"?>" target="_blank"><img src="images/2013-11-28_124423.png" width="31" height="31" /></a></td>
                </tr>
                 <?php }?>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E3E8CE">
                <tr>
                  <td height="40" colspan="2" align="center" bgcolor="#EDF2D8" class="section"><strong>計劃書</strong></td>
                </tr>
                <?php
				  while( $Report_Obj = mysql_fetch_object($order_Result) ){
				 ?>
                <tr>
                  <td align="center" bgcolor="#FFFFFF" class="section"><?php echo $Report_Obj->a_title;?>  </td>
                  <td align="center" bgcolor="#FFFFFF" class="section" width="100"><a href="<?php if(is_file(file_Path.$Report_Obj->down_file))echo file_Path.$Report_Obj->down_file;else echo "javascript:void(0);"?>" target="_blank"><img src="images/2013-11-28_124423.png" width="31" height="31" /></a></td>
                </tr>
                <?php } ?>
                
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E3E8CE">
                <tr>
                  <td height="40" colspan="2" align="center" bgcolor="#EDF2D8" class="section"><strong class="section_en">School-based Plan on the Use of the English Enhancement Grant</strong></td>
                </tr>
                 <?php
				  while( $Report_Obj = mysql_fetch_object($school_Result) ){
				 ?>
                <tr>
                  <td align="center" bgcolor="#FFFFFF" class="section_en"><?php echo $Report_Obj->a_title;?></td>
                  <td align="center" bgcolor="#FFFFFF" class="section" width="100"><a href="<?php if(is_file(file_Path.$Report_Obj->down_file))echo file_Path.$Report_Obj->down_file;else echo "javascript:void(0);"?>" target="_blank"><img src="images/2013-11-28_124423.png" width="31" height="31" /></a></td>
                </tr>
                <?php } ?>
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
