<?php   header("Content-Type:text/html;charset=utf-8"); 
require_once("php-bin/function.php");
include_once("php-bin/lib_header.php");


//**************  Paging System - Start ************/

$search_SQL    = "SELECT    *    FROM     tbl_movie ";
$search_Result = mysql_query( $search_SQL, $link_id );
$count_Obj    = mysql_fetch_object($search_Result);


$Paging_Size = 8;  // how many record per page.
$Paging_Width = 10; // 
$Paging_RecordCount = mysql_num_rows($search_Result);

// include
include_once("php-bin/lib_paging.php");

//**************  Paging System - End ************/
$search_SQL_Limit = $search_SQL.' 
	ORDER BY   id  DESC 
	LIMIT '. ($Paging_Size*($Paging_NowPage -1)) .' , '. $Paging_Size .'  ';
$SplitPage_Result = mysql_query( $search_SQL_Limit, $link_id );
$id=$_GET[id]|0;

if(0==$id){
	$rs=mysql_query( 'SELECT    *    FROM     tbl_movie	ORDER BY   id  DESC 	LIMIT 1 ', $link_id );
	if($row=mysql_fetch_assoc($rs)){
		$id=$row['id'];
	}
}
$query="select * from tbl_movie  where id=$id limit 1";
$result = mysql_query($query, $link_id);
$object=mysql_fetch_object($result);
$file_id=$object->id;
$file_date=$object->date;
$file_title=$object->name;
$file_content=$object->description;
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聖公會基愛小學 S.K.H. Kei Oi Primary School</title>
<link href="css/all.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include('top_news.php'); ?>
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
            <img src="images/title/info_act_video.jpg" />

            <ul class="location">
                <li>首頁 &gt;</li>
						<li>							
							學校資訊
 &gt; 						</li>
						<li>活動影片</li>
            </ul>
        </div>
	  <!-- //locationGroup -->
	  
	  <div id="contents_In">
	     <table border="0" cellspacing="0" cellpadding="15" width="840">
          <tr>
            <td  valign="top" bgcolor="#FEFAF5" width="200">
                      <?php
                         $i=0;
							while( $Record_Obj = mysql_fetch_object($SplitPage_Result) ){
							 
							?>
							<table width="200" border="0" cellpadding="0" cellspacing="0" <?php if($id==$Record_Obj->id){?> bgcolor="#FCEEDC"<?php }?> class="left_line">
				              <tr>
				                <td width="10%" align="center"><img src="images/arrow.png" width="4" height="7" /></td>
				                <td height="30" class="left_line"><a href="News_Video.php?id=<?php echo $Record_Obj->id?>" target="_self"><?php echo $Record_Obj->name?></a></td>
				              </tr>
				              <tr>
				                <td>&nbsp;</td>
				                <td height="30">(<?php echo $Record_Obj->date?>)</td>
				              </tr>
				            </table>
				              <table width="200" border="0" cellspacing="0" cellpadding="0">
				                <tr>
				                  <td><img src="images/line_bg.jpg" width="200" height="1" /></td>
				                </tr>
				              </table>
						<?php  $i++;} ?>
	                <table border="0" width=200 cellspacing="0" cellpadding="0">
	                  <tr>
	                    <td align="right"><a href="News_Video_List.php"><img src="images/more.jpg" width="41" height="17" border="0" /></a></td>
	                    <td width="45" height="35"></td>
	                  </tr>
                </table>             
            </td>
          <td width="25" rowspan="3" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
          <td valign="top" width="615">
             <table width="100%">
               <tr>
                <td align="center" class="headline"><?php echo $file_title?></td>
              </tr>
              <tr>    
		          <td valign="top" class="section">
		         <embed src="<?php echo $file_content?>" quality="high" width="615" height="400" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
		         </td>
		      </tr>
		          <?php if(!empty($file_file_name)){?><tr><td><a href="file_download/<?php echo $file_file_name; ?>" target="_blank" style="float:right;"><img src="file_download/<?php echo $file_photo; ?>" width="223" align="right" /></a></td></tr>
		          <?php }?>
		      <tr>
		          <td>
		           <?php if(!empty($file_link_text)):?>
		              <strong>相關連結：</strong><?php   echo "<a href=$file_link_url ". ($file_link_new_window == "1" ? "target=_blank":"") .">$file_link_text</a>"; ?>
		              <?php
						if ($file_file_name != ""){
						?><strong>附&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;件：</strong><a href="file_download/<?php echo $file_file_name; ?>" target="_blank">下載</a>
		              <?php
						}
						?>
					  <?php endif;?>
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
