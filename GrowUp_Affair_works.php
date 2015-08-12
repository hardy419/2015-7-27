<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("php-bin/function.php");
include_once("php-bin/lib_header.php");
//中文截取
function sub_str($str, $length = 0, $append = true)
{
	$str =strip_tags(trim($str));
	$strlength = strlen($str);

	define('EC_CHARSET','utf-8');

	if ($length == 0 || $length >= $strlength)
	{
		return $str;  //截取长度等于0或大于等于本字符串的长度，返回字符串本身
	}
	elseif ($length < 0)  //如果截取长度为负数
	{
		$length = $strlength + $length;//那么截取长度就等于字符串长度减去截取长度
		if ($length < 0)
		{
			$length = $strlength;//如果截取长度的绝对值大于字符串本身长度，则截取长度取字符串本身的长度
		}
	}

	if (function_exists('mb_substr'))
	{
		$newstr = mb_substr($str, 0, $length, EC_CHARSET);
	}
	elseif (function_exists('iconv_substr'))
	{
		$newstr = iconv_substr($str, 0, $length, EC_CHARSET);
	}
	else
	{
		//$newstr = trim_right(substr($str, 0, $length));
		$newstr = substr($str, 0, $length);
	}

	if ($append && $str != $newstr)
	{
		$newstr .= '...';
	}
	 
	return $newstr;
}
//**************  Paging System - Start ************/
$search_SQL="Select * FROM `tbl_art` AS ta   LEFT JOIN   (select * from  tbl_art_gallery group by act_id)   AS tt  ON (ta.id=tt.act_id)";
$search_Result = mysql_query( $search_SQL, $link_id );

$Paging_Size = 9;  // how many record per page.
$Paging_Width = 10; // 
$Paging_RecordCount = mysql_num_rows($search_Result);

// include
include_once("php-bin/lib_paging.php");

//**************  Paging System - End ************/
$search_SQL_Limit = $search_SQL.' ORDER BY   modified_date  DESC LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'  ';
$SplitPage_Result = mysql_query( $search_SQL_Limit, $link_id );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聖公會基愛小學 S.K.H. Kei Oi Primary School</title>
<link href="css/all.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.photo_tbl{float:left;}
.photo_tbl img{border:0px;width:190px;height:120px;}
.photo_tbl a.img{border:5px #FFFF99 solid;display:block;width:190px;height:120px;}
.photo_tbl a.img:hover{border:5px #FF9900 solid;}
</style>
</head>

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
             <img src="images/title/student_works.jpg" />

            <ul class="location">
                <li>首頁 &gt;</li>
						<li>							
							學生成長
 &gt; 						</li>
						<li>學校事務 &gt;</li> <li>學生作品</li>
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
		    while ($get_rows=mysql_fetch_array($SplitPage_Result)){
            $i++;
			?>
                    <table width="211" border="0" cellspacing="0" cellpadding="0" class="photo_tbl">
                      <tr>
                        <td width="211" height="140" align="center" valign="top"><a class="img" href="GrowUp_Affair_works_List.php?id=<?php echo $get_rows['id'];?>"><img src="gallery_activity/web<?php echo $get_rows['ori_file_name'];?>" /></a></td>
                      </tr>
                      <tr>
                        <td align="center" class="zti"><a href="GrowUp_Affair_works_List.php?id=<?php echo $get_rows['id'];?>"><?php echo sub_str($get_rows['name'],16);?></a></td>
                      </tr>
                    </table>
                  <?php } ?>
		          </td>
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
									( $Paging_NowPage , $Paging_TotalPage , $Paging_Width, array("start_search=1", "year=".$year, "month=".$month, "type={$type}"));
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
