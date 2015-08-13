<?PHP
require("../php-bin/function.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>中華基督教會方潤華小學-首頁</title>
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/public.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
</head>

<body>
<!--==================頁頭==================-->
<div id="indexTop" class="pr">
<ul class="menu pa">
  <li><a id='home' href="index.php" target="_self" class="current" >主頁</a></li>
  <li><a href="info.html" target="_self">學校資料</a>
  	<ul>
      <li><a href="info2.html" target="_self">學校設施</a></li>
      <li><a href="info3.html">學校特色</a></li>
      	<li><a href="notice.php">學校通告</a></li>
      	<li><a href="news.php">最新消息</a></li>
      	<li><a href="speech.php">校長的話</a></li>
    </ul>
  </li>
  <li><a href="apply.html">入學申請</a>
    <ul>
      <li><a href="facility.html" target="_self">學校設施</a></li>
      <li><a href="#">學校特色</a></li>
    </ul>
  </li>
  <li><a href="join.html">幼小銜接</a></li>
  <li><a href="policy.html">課程政策</a></li>
  <li><a href="timetable.html" target="_self">上課時間</a></li>
  <li><a href="loving.html">愛心學園</a></li>
  <li><a href="activity.php">活動資訊</a></li>
  <li><a id='last_menu' href="contact.html">聯絡我們</a></li>
</ul>
  <div class="logo pa"></div>
  <div class="banner_index pa"></div>
  <div class="cloud_01 pa"></div>
  <div class="cloud_02 pa"></div>
  <div class="add pa"></div>
  <div class="language pa">
     <a class="cn" href=''></a>
     
  </div>
</div>
<!--==================頁中==================-->
<map id="notice-map" name="notice-map">
  <area shape="rectangle" coords="240,0,283,24" href="notice.php"></area>
</map>
<map id="leader-map" name="leader-map">
  <area shape="rectangle" coords="240,0,283,24" href="speech.php"></area>
</map>
<map id="news-map" name="news-map">
  <area shape="rectangle" coords="240,0,283,24" href="news.php"></area>
</map>
<div id="wrap"> 
  <!--第一列-->
  <div class="col_01 fl"> 
    <!--學校通告-->
    <div class="notice">
      <img src="images/notice_title.jpg" usemap="#notice-map" />
      <?PHP
        $rows = mysql_query('SELECT * FROM tbl_notice WHERE a_type=1 ORDER BY `a_date` DESC LIMIT 5');
      ?>
      <ul><?PHP for ($i=0; $row=mysql_fetch_array($rows,MYSQL_ASSOC); $i++){ ?>
        <li><a href="<?PHP if(null != $row['down_file'] && !empty($row['down_file'])) { echo '../userfiles/pdf/'.$row['down_file']; } else { echo 'javascript:void(0);'; } ?>"><?PHP echo $row['a_title']; ?></a></li>
      <?PHP } ?></ul>
    </div>
    <div class="col_01_img01"><a href="#"><img src="images/left_bottom_01.jpg" /></a></div>
    <div class="col_01_img02"><a href="timetable.html"><img src="images/left_bottom_02.jpg" /></a></div>
  </div>
  <!--第二列-->
  <div class="col_02 fl"> 
    <!--校長的話-->
    <div class="leader">
      <img src="images/leader_title.jpg" usemap="#leader-map" />
      <?PHP
        $rows = mysql_query('SELECT * FROM tbl_chancellor where file_type_id=9 ORDER BY `file_date` DESC LIMIT 5');
      ?>
      <ul><?PHP for ($i=0; $row=mysql_fetch_array($rows,MYSQL_ASSOC); $i++){ ?>
        <li><a href="<?PHP if(null != $row['file_file_name'] && !empty($row['file_file_name'])) { echo '../userfiles/pdf/'.$row['file_file_name']; } else { echo 'javascript:void(0);'; } ?>"><?PHP echo $row['file_title']; ?></a><span><?PHP echo $row['file_date']; ?></span></li>
      <?PHP } ?></ul>
    </div>
    <!--活動相片-->
    <div class="active">
      <h1></h1>
      <?PHP
        $rows = mysql_query('SELECT * FROM tbl_activity ORDER BY `date` DESC LIMIT 1');
        $row=mysql_fetch_array($rows,MYSQL_ASSOC);
        $photos = mysql_query("SELECT * FROM tbl_activity_gallery WHERE act_id={$row['id']} ORDER BY `g_order` ASC");
      ?>
      <p><?PHP echo $row['name']; ?></p>
      <ul><?PHP for ($i=0; $photo=mysql_fetch_array($photos,MYSQL_ASSOC); $i++){ ?>
        <li><a href="#"><img style="width:60px;height:60px" src="<?PHP echo "../gallery_activity/{$photo['file_name']}"; ?>" /></a></li>
      <?PHP if(3==$i) break; } ?></ul>
    </div>
  </div>
  <!--第三列-->
  <div class="col_03 fl"> 
    <!--最新消息-->
    <div class="news">
      <img src="images/news_title.jpg" usemap="#news-map" />
      <?PHP
        $rows = mysql_query('SELECT * FROM tbl_lastest ORDER BY `date` DESC LIMIT 3');
      ?>
      <ul><?PHP for ($i=0; $row=mysql_fetch_array($rows,MYSQL_ASSOC); $i++){ ?>
        <li><a href="<?PHP if(null != $row['file_file_name'] && !empty($row['file_file_name'])) { echo '../userfiles/pdf/'.$row['file_file_name']; } else { echo 'javascript:void(0);'; } ?>"><?PHP echo $row['name']; ?></a><span><?PHP echo $row['date']; ?></span></li>
       
      <?PHP } ?></ul>
    </div>
    <div class="col_03_pic01 fl"><a href="#"><img src="images/right_bottom_01.jpg" /></a></div>
    <div class="col_03_pic02 fl"><a href="#"><img src="images/right_bottom_02.jpg" /></a></div>
  </div>
</div>
<!--==================頁尾==================-->
<div id="footer_wrap">
  <div class="footer">
    <div class="footermenu fl">
      <ul>
        <li><a href="info.html">學校資料</a></li>
        <li class="ml14"><a href="info2.html">學校設施</a></li>
        <li class="ml14"><a href="info3.html">學校特色</a></li>
        <li class="ml14"><a href="apply.html">入學申請</a></li>
        <li class="ml14 bdn"><a href="join.html">幼小銜接</a></li>
        <li><a href="policy.html">課程政策</a></li>
        <li class="ml14"><a href="timetable.html">上課時間</a></li>
        <li class="ml14"><a href="loving.html">愛心學園</a></li>
        <li class="ml14"><a href="activity.html">活動資訊</a></li>
        <li class="ml14 bdn"><a href="contact.html">聯絡我們</a></li>
        <li class="bdn"><a href="#">登入內聯網</a></li>
      </ul>
    </div>
    <div class="contact fr"> <span>學校地址：新界天水圍天耀邨第二期</span> <span class="mt5">Phase 2, Tin Yiu Estate, Tin ShuiWai, NT</span> <span class="mt5">電話：2551 9751  傳真：2551 9759  電郵：info@ccc.fyw.org</span>

      <p class="mt10">版權所有 中華基督教會方潤華小學</p>
    </div>
  </div>
</div>
</body>
</html>
