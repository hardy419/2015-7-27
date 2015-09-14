<?PHP
require("../php-bin/function.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>中華基督教會方潤華小學-活動資訊</title>
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/activity.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/public.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<script src="../js/jquery-1.11.3.min.js"></script>
<style>
.py_titleTable table td:first-child {width: 100px;}
.py_titleTable table td:first-child+td {width: 260px;}
.py_titleTable table td:first-child+td+td {width: 120px;}
.py_titleTable table td:first-child+td+td+td {width: 80px;}
.py_tTable {height: auto}
.pagination {padding: 10px; float: right}
</style>
</head>
<body>
<!--==================頁頭==================-->
<div id="activitywrap" class="pr">
<ul class="menu pa">
  <li><a id='home' href="index.php" target="_self" >主頁</a></li>
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
    <!--ul>
      <li><a href="facility.html" target="_self">學校設施</a></li>
      <li><a href="#">學校特色</a></li>
    </ul-->
  </li>
  <li><a href="join.html">幼小銜接</a></li>
  <li><a href="policy.html">課程政策</a></li>
  <li><a href="timetable.html" target="_self">上課時間</a></li>
  <li><a href="loving.html">愛心學園</a></li>
  <li><a href="activity.php" class="current">活動資訊</a></li>
  <li><a id='last_menu' href="contact.html">聯絡我們</a></li>
</ul>
  <div class="activityTop">
    <div class="logo pa"></div>
    <div class="cloud_01 pa"></div>
    <div class="cloud_02 pa"></div>
    <div class="add pa"></div>
    <div class="language pa">
     <a class="cn" href=''></a>
     <a class="cen">&nbsp;&nbsp;</a>
     <a class="en" href=''></a>
   </div>
  
  </div>

  <div class="policy pa">
    <div class="py_tTable pa">
      <ul>
<?PHP
if (isset ($_GET['p'])) {
    $page = $_GET['p'];
}
else {
    $page = 1;
}
$num = 8;
$count = mysql_query('SELECT COUNT(*) AS count FROM tbl_activity WHERE `type_id`=0 ORDER BY `date` DESC', $link_id);
$count = mysql_fetch_array($count, MYSQL_ASSOC);
$count = $count['count'];
$rows = mysql_query('SELECT * FROM tbl_activity WHERE `type_id`=0 ORDER BY `date` DESC LIMIT '.($num*($page-1)).','.$num,$link_id);
for ($i=0; $row=mysql_fetch_array($rows,MYSQL_ASSOC); $i++){
    $photos = mysql_query("SELECT * FROM tbl_activity_gallery WHERE act_id={$row['id']} ORDER BY `g_order` ASC");
    $photo=mysql_fetch_array($photos,MYSQL_ASSOC);
?>
      <li class="img-info" lsrc="<?PHP echo "../gallery_activity/{$photo['file_name']}"; ?>"><div class="img-frame"><a href="activity_photos.php?pid=<?PHP echo $row['id']; ?>"><div></div></a><div class="info-div"><p><?PHP echo $row['name']; ?></p><p><?PHP echo $row['date']; ?></p><p><?PHP echo html_entity_decode ($row['description']); ?></p></div></div></li>
<?PHP } ?>
      </ul>
      <div style="clear:both"></div>
      <div class="pagination">
        <a <?PHP if ($page > 1) echo 'href="activity.php?p='.($page-1).'"'; ?>>&lt;&lt;</a>
    <?PHP for ($pi=1; $pi<=(int)(($count-1)/$num)+1; ++$pi) { ?>
        <a href="activity.php?p=<?PHP echo $pi; ?>"><?PHP echo $pi; ?></a>
    <?PHP } ?>
        <a <?PHP if ($page < (int)(($count-1)/$num)+1) echo 'href="activity.php?p='.($page+1).'"'; ?>>&gt;&gt;</a>
      </div>
   </div>

  </div>

</div>
<!--==================頁中==================-->

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

<script>
$(document).ready(function (){
  $('.img-info').css('width','220px');
  $('.img-info').css('height','170px');
  $('.img-info').css('float','left');
  $('.img-info').css('margin-top','20px');
  $('.img-info').css('margin-bottom','80px');
  $('.img-frame').css('width','209px');
  $('.img-frame').css('height','159px');
  $('.img-frame').css('border','1px solid #c0c0c0');
  $('.img-frame>a>div').css('width','200px');
  $('.img-frame>a>div').css('height','150px');
  $('.img-frame>a>div').css('padding','5px');
  $('.info-div').css('text-align','center');
  $('.info-div p').css('overflow','hidden');
  $('.info-div p').css('white-space','nowrap');
  $('.info-div p').css('text-overflow','ellipsis');
  // Image re-sizing
  $(".py_tTable li").each(function(idx){
    if(0==idx%4){
      $(this).css('margin-left','15px');
    }
    if(3==idx%4){
      $('<div style="clear:both"></div>').insertAfter($(this));
    }
    else{
      $(this).css('margin-right','20px');
    }

    var obj_li=$(this).find("div a div");
    var rw=parseInt(obj_li.css("width"));
    var rh=parseInt(obj_li.css("height"));
    var img=new Image();
    img.src=$(this).attr("lsrc");
    img.onload=function(){
      var l,t;
      var w=img.width;
      var h=img.height;
      if(w>rw){
        h=h/w*rw;
        w=rw;
      }
      if(h>rh){
        w=w/h*rh;
        h=rh;
      }
      l=(rw-w)/2;
      t=(rh-h)/2;
      obj_li.html("<img src=\"" + img.src + "\" style=\"width:" + w + "px;height:" + h + "px; position:relative;left:" + l + "px;top:" + t + "px\"/>");
    };
  });
  // Image re-sizing END
});
</script>
</body>
</html>
