<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("php-bin/function.php");
include_once("php-bin/lib_header.php");
//中文截取

//**************  Paging System - Start ************/
$id=is_numeric($_GET['id'])?trim($_GET['id']):0;
$search_SQL    = "select * from tbl_lastest_gallery where act_id=".$id;
$search_Result = mysql_query( $search_SQL, $link_id );

$Paging_Size = 9;  // how many record per page.
$Paging_Width = 10; // 
$Paging_RecordCount = mysql_num_rows($search_Result);

// include
include_once("php-bin/lib_paging.php");

//**************  Paging System - End ************/
$search_SQL_Limit = $search_SQL.' ORDER BY   g_order  DESC LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'  ';
$SplitPage_Result = mysql_query( $search_SQL_Limit, $link_id );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聖公會基愛小學 S.K.H. Kei Oi Primary School</title>
<link href="css/all.css" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
.photo_tbl{float:left;}
.photo_tbl img{border:0px;width:190px;height:120px;}
.photo_tbl a.img{border:5px #FFFF99 solid;display:block;width:190px;height:120px;}
.photo_tbl a.img:hover{border:5px #FF9900 solid;}
</style>
<body><?php include('top_growup.php'); ?>

<!-- container -->
<div id="container">


      <!-- lnb -->
      <div id="lnb">
            <h2 class="lnbTitle"><img src="images/images/lnb3.png" /></h2>
			<?php include('GrowUp_Left.php'); ?>
		 </div>
      <!-- //lnb -->
	  
	  
	  
	  <!-- contents -->
      <div id="contents">
	  
	  
	     <!-- locationGroup -->
	      <div id="locationGroup">
           <!-- <img src="images/growup_topbar.jpg" />-->

            <ul class="location">
                <li>首頁 &gt;</li>
						<li>							
							學生成長
 &gt; 						</li>
						<li>生命教育 &gt;</li><li>最近活動</li>
            </ul>
        </div>
	  <!-- //locationGroup -->
	  
	  <div id="contents_In">
	      <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24" valign="top">&nbsp;</td>
            <td width="655" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>
                <td width="635"><?php
			 $j=8;
			 $i=0;
		while ($get_rows=mysql_fetch_array($SplitPage_Result)){$i++;
			//if($get_rows["file_name"]!=""){?>
                    <table width="211" border="0" cellspacing="0" cellpadding="0" class="photo_tbl">
                      <tr>
                        <td width="211" align="center"><a href="gallery_activity/<?php echo $get_rows['ori_file_name'];?>" target="_blank" class="img"><img src="gallery_activity/web<?php echo $get_rows['ori_file_name'];?>" /></a></td>
                      </tr>
                      <tr>
                        <td align="center" class="zti"><?php echo $get_rows['remark'];?></td>
                      </tr>
                    </table>
                  <?php
		};
		?></td>
                </tr>

              <tr>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td align="right"><table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="20">&nbsp;</td>
                      <td><table border="0" cellspacing="0" cellpadding="4">
                          <tr>
                            <td><?php
if($Paging_RecordCount>0){
echo PagingSystem_dynamic
( $Paging_NowPage , $Paging_TotalPage , $Paging_Width, array("start_search=1", "id=".$id));
}
?>                            </td>
                          </tr>
                      </table></td>
                    </tr>
                </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td height="80" valign="top">&nbsp;</td>
          </tr>
        </table>
	    </div>
      </div>
      <!-- //contents -->
	  
	  
	  
</div>
<!-- //container --><?php include('foot.php'); ?>
</body>
</html>
