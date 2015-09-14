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
<link media="screen" type="text/css" rel="stylesheet" href="../css/lightbox.css"></link>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/lightbox.min.js"></script>
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
  <!--  <ul>
      <li><a href="facility.html" target="_self">學校設施</a></li>
      <li><a href="#">學校特色</a></li>
    </ul>-->
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
        <li><a href="notice.php"><?PHP echo $row['a_title']; ?></a></li>
      <?PHP } ?></ul>
    </div>
    <div class="col_01_img01"><!--<a href="#"><img src="images/left_bottom_01.jpg" /></a>--></div>
    
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
        <li><a href="speech.php"><?PHP echo $row['file_title']; ?></a><span><?PHP echo $row['file_date']; ?></span></li>
      <?PHP } ?></ul>
    </div>
    <!--活動相片-->
    <div class="active">
      <h1 style='text-align:right;font-size:12px;'><a style="color:red;font-size:11px;" href='activity.php'><img src="images/more.jpg" /></a></h1>
      <?PHP
        $rows = mysql_query('SELECT * FROM tbl_activity WHERE `type_id`=0 ORDER BY `date` DESC LIMIT 1');
        $row=mysql_fetch_array($rows,MYSQL_ASSOC);
        $photos = mysql_query("SELECT * FROM tbl_activity_gallery WHERE act_id={$row['id']} ORDER BY `g_order` ASC");
      ?>
      <a href="activity_photos.php?pid=<?PHP echo $row['id']; ?>"><p><?PHP echo $row['name']; ?></p></a>
      <ul><?PHP for ($i=0; $photo=mysql_fetch_array($photos,MYSQL_ASSOC); $i++){ if($i<=3) { ?>
        <li><a href="<?PHP echo "../gallery_activity/{$photo['file_name']}"; ?>" data-lightbox="activity-photos"><img style="width:60px;height:60px" src="<?PHP echo "../gallery_activity/{$photo['file_name']}"; ?>" /></a></li>
        <?PHP } else { ?>
        <li><a href="<?PHP echo "../gallery_activity/{$photo['file_name']}"; ?>" data-lightbox="activity-photos"></a></li>
      <?PHP } } ?></ul>
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
        <li><a href="news.php"><?PHP echo $row['name']; ?></a><span><?PHP echo $row['date']; ?></span></li>
       
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
        <li class="ml14"><a href="activity.php">活動資訊</a></li>
        <li class="ml14 bdn"><a href="contact.html">聯絡我們</a></li>
        <li class="bdn"><a href="#">登入內聯網</a></li>
      </ul>
    </div>
    <div class="contact fr"> <span>學校地址：新界天水圍天耀邨第二期</span> <span class="mt5">Phase 2, Tin Yiu Estate, Tin ShuiWai, NT</span> <span class="mt5">電話：2251 9751  傳真：2251 9759  電郵：info@cccfyw.edu.hk</span>

      <p class="mt10">版權所有 中華基督教會方潤華小學</p>
    </div>
  </div>
</div>
</body>
</html>
