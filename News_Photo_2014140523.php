<?php
header("Content-Type:text/html;charset=utf-8");
require_once("php-bin/function.php");
include_once("php-bin/lib_header.php");

$orderby = "";
$orderseq = "asc";
$page = 1;
$record_per_page = 20;   // records display each page


if (isset($_GET["page"]))
	$page = $_GET["page"]|0;
$years=array();
$get_sql = "Select * FROM `tbl_activity`  group by year order by year desc";
$result = mysql_query($get_sql, $link_id);
while($row=mysql_fetch_object($result))
	$years[]=$row->year;

$events=array();
foreach($years as $key=>$year){
	$get_sql = "Select * FROM `tbl_activity`  WHERE year=".$year;
	$get_result = mysql_query($get_sql, $link_id);
	$i=0;
	while($rows=mysql_fetch_assoc($get_result)){
	    
		$events[$key][$i]=$rows;
		$i++;
	}
	mysql_close();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聖公會基愛小學 S.K.H. Kei Oi Primary School</title>
<link href="css/all.css" rel="stylesheet" type="text/css" /></head>
<style>
.tab{border-bottom:2px solid #d1e3a9;float:left;width:840px;}
.tab li{float:left;border-radius:5px 5px 0px 0px;border-top:2px solid #d1e3a9;border-left:2px solid #d1e3a9;border-right:2px solid #d1e3a9;margin:0px 2px; }
.tab li a{padding:6px 16px;display:block;color:#565656; background:#ffffff; font-size:16px;}
.tab li a.current{background:#dce9bb;color:#394e03;}
.tabContent{display:none;}
</style>
<body><?php include('top_news.php'); ?>
<script src="js/jquery.js"></script>
<script>
 $(function(){
	 $(".tabContent").eq(0).fadeIn();
    $(".tab li").click(function(e){
         e=e||windows.event;
         e.preventDefault();
         var index=$(this).index();
         $(".tab li a").removeClass('current');
         $(this).find('a').addClass('current');
         $(".tabContent").hide().eq(index).fadeIn();
     });
  });
</script>

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
            <img src="images/news_topbar.jpg" />

            <ul class="location">
                <li>首頁 &gt;</li>
						<li>							
							學校資訊
 &gt; 						</li>
						<li>							
			  活動照片</li>
            </ul>
        </div>
	  <!-- //locationGroup -->
	  
	  <div id="contents_In">
	    <table width="98%" border="0" cellspacing="0" cellpadding="10">
          <tr>
            <td width="71%" align="center" valign="top" class="section"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="3%" align="left" valign="top"><table width="100%" height="9" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td></td>
                    </tr>
                  </table>
                <img src="images/arrow_02.jpg" width="13" height="13" /></td>
                <td width="97%" align="left"><img src="images/title01.jpg" width="100" height="30" /></td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td width="3%" align="left" valign="top">&nbsp;</td>
                  <td width="97%" align="left"><table width="100%" height="15" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#FEFEF2">
                      <tr>
                        <td width="2%" height="115">&nbsp;</td>
                        <td width="97%" align="left">為鼓勵學生善用餘暇參加課外活動，服務社群，本校逢星期五設課外活動，為一至六年級提供34種活動項目， 動靜俱備。<br />
本校設有各項興趣小組，於星期五下午及星期六上午課餘時間為本校學生提供自費活動，如：跆拳道、兒童舞訓練班、笑笑魔術師、傳統水墨畫、機械模型製作、升中面試班，奧林匹克數學培訓及圍棋。全由專業導師負責指導，使學生過著多采多姿的生活。 </td>
                      </tr>
                  </table></td>
                </tr>
              </table>
              <table width="100%" height="15" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                
                <tr>
                  <td width="3%" align="left" valign="top">&nbsp;</td>
                  <td width="97%" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="2%" align="left" valign="top"><table width="100%" height="9" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td></td>
                            </tr>
                          </table>
                            <img src="images/arrow_01.jpg" width="5" height="5" /></td>
                        <td width="98%" align="left"><strong>課外活動小組</strong><br />
                          詩班、木笛、節奏樂、英誦、中誦、圖書小組、公民教 育小組、校園電視台、數學學會、視藝學會、辯論學會、英語話劇、田徑、球類、足球、乒乓球、羽毛球、團契、節能減廢小先鋒、趣味英語、手工藝、美術設計、 專注力小組、English Games、趣味語文遊戲、資訊科技小達人、公民教育小組、卡通天地、語文天地及中普快車等。 </td>
                      </tr>
                  </table>
                    <table width="100%" height="15" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="3%" align="left" valign="top">&nbsp;</td>
                  <td width="97%" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="2%" align="left" valign="top"><table width="100%" height="9" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td></td>
                            </tr>
                          </table>
                            <img src="images/arrow_01.jpg" width="5" height="5" /></td>
                        <td width="98%" align="left"><strong>服務團體</strong><br />
                          本校設有女童軍、幼童軍、公益少年團、基督少年軍等。 </td>
                      </tr>
                  </table>
                    <table width="100%" height="15" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="3%" align="left" valign="top">&nbsp;</td>
                  <td width="97%" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="2%" align="left" valign="top"><table width="100%" height="9" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td></td>
                            </tr>
                          </table>
                            <img src="images/arrow_01.jpg" width="5" height="5" /></td>
                        <td width="98%" align="left"><strong>校隊培訓</strong><br />
                          包括田徑、籃球、足球、乒乓球、游泳、羽毛球、木笛隊、敲擊樂隊、英語話劇組、詠春、中國舞藝術體操、醒獅班、花式跳繩、非洲鼓、等訓練班於每日課後由體育老師及專業教練培訓。</td>
                      </tr>
                  </table></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px;">
                <tr>
                  <td>
                  <ul class="tab">
                        <?php foreach ($years as $key=>$val){?>
                         <li class="tabnav"><a href="#" <?php if($key==0){?>class="current"<?php }?>><?php echo $val;?>年</a></li>
                        <?php }?>
                        
                  </ul></td>
                </tr>
              </table>
               <table width="100%" height="15" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="3%" align="left"><img src="images/arrow_02.jpg" width="13" height="13" /></td>
                  <td width="97%" align="left">本學年活動一覽</td>
                </tr>
              </table>
              <table width="100%" height="15" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td></td>
                </tr>
              </table>
             <?php foreach ($events as $key=>$event){?>       
              <div class="tabContent">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#E3E8CE">
                      <tr>
                        <td height="40" align="center" bgcolor="#EDF2D8"><strong>日期</strong></td>
                        <td height="40" align="center" bgcolor="#EDF2D8"><strong>活動名稱</strong></td>
                        <td height="40" align="center" bgcolor="#EDF2D8"><strong>參加對象</strong></td>
                      </tr>
                     <?php foreach ($event as $key=>$row){?>
                      <tr>
                        <td align="center" bgcolor="#FFFFFF"><?php echo $row['date'];?></td>
                        <td height="35" align="center" bgcolor="#FFFFFF"><?php echo $row['name'];?></td>
                        <td align="center" bgcolor="#FFFFFF"><?php echo $row['participant'];?></td>
                      </tr>
                      <?php }?>
                  </table></td>
                </tr>
              </table>
              </div>
              <?php  }?>
             </td>
          </tr>
        </table>
	  </div>
	  
	  
	  </div>
      <!-- //contents -->
	  
	  
	  
</div>

<!-- //container -->
<?php include('foot.php'); ?></body>
</html>
