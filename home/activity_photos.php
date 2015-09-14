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
<link media="screen" type="text/css" rel="stylesheet" href="../css/lightbox.css"></link>
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/lightbox.min.js"></script>
<style>
.py_titleTable table td:first-child {width: 100px;}
.py_titleTable table td:first-child+td {width: 260px;}
.py_titleTable table td:first-child+td+td {width: 120px;}
.py_titleTable table td:first-child+td+td+td {width: 80px;}
.py_tTable {height: auto; top: 80px}
.pagination {padding: 10px; float: right}

.py_tTable table td {border:0; padding-left:40px; padding-top:20px;}
.py_tTable table tr:first-child+tr+tr td {padding-bottom:20px;}
.img-frame {
  width: 240px;        /* 如果加了border要減掉border的寬度 */
  height: 150px;       /* 同上 */
  border:1px solid #c0c0c0;
}
.img-frame div {
  width: 220px;        /* 200 = 220 - 10*2 */
  height: 130px;
  padding: 10px;
}
.activity-cover {
  width: 200px;
  height: 80px;
  position: absolute;
  top: -100px;
}
.info-div p {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
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
    <ul>
      <li><a href="facility.html" target="_self">學校設施</a></li>
      <li><a href="#">學校特色</a></li>
    </ul>
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

<?PHP
if (isset ($_GET['p'])) {
    $page = $_GET['p'];
}
else {
    $page = 1;
}
$num = 9;
$pid = mysql_escape_string ($_GET['pid']);
$count = mysql_query("SELECT COUNT(*) AS count FROM tbl_activity_gallery WHERE act_id={$pid}", $link_id);
$count = mysql_fetch_array($count, MYSQL_ASSOC);
$count = $count['count'];
$photos = mysql_query("SELECT * FROM tbl_activity_gallery WHERE act_id={$pid} ORDER BY `g_order` ASC LIMIT ".($num*($page-1)).','.$num);
$rows = mysql_query("SELECT * FROM tbl_activity WHERE id={$pid}",$link_id);
$row = mysql_fetch_array($rows,MYSQL_ASSOC);
?>
  <div class="policy pa">
    <a href="activity.php"><div class="activity-cover"></div></a>
    <div class="info-div"><p>標題：<?PHP echo $row['name']; ?></p><p>日期：<?PHP echo $row['date']; ?></p><p>描述：<?PHP echo html_entity_decode ($row['description']); ?></p></div>
    <div class="py_tTable pa">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?PHP
for ($i=0; $photo=mysql_fetch_array($photos,MYSQL_ASSOC); $i++){
    if (0==$i%3) {
        echo '<tr>';
    }
?>
          <td lsrc="<?PHP echo "../gallery_activity/{$photo['file_name']}"; ?>"><a href="<?PHP echo "../gallery_activity/{$photo['file_name']}"; ?>" data-lightbox="activity-photos"><div class="img-frame"><div></div></div></a></td>
<?PHP 
    if (2==$i%3) {
        echo '</tr>';
        if (8 == $i) break;
    }
}
?>
      </table>

      <div style="clear:both"></div>
      <div class="pagination">
        <a <?PHP if ($page > 1) echo 'href="activity_photos.php?pid='.$pid.'&p='.($page-1).'"'; ?>>&lt;&lt;</a>
    <?PHP for ($pi=1; $pi<=(int)(($count-1)/$num)+1; ++$pi) { ?>
        <a href="activity_photos.php?pid=<?PHP echo $pid; ?>&p=<?PHP echo $pi; ?>"><?PHP echo $pi; ?></a>
    <?PHP } ?>
        <a <?PHP if ($page < (int)(($count-1)/$num)+1) echo 'href="activity_photos.php?pid='.$pid.'&p='.($page+1).'"'; ?>>&gt;&gt;</a>
        <a href="activity.php">返回</a>
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
  $(".py_tTable table td").each(function(){
    var obj_li=$(this).find("a>div>div");
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
      obj_li.html("<img src=\"" + img.src + "\" style=\"width:" + w + "px;height:" + h + "px; position:relative;top:" + t + "px\"/>");
    };
  });
});
</script>
</body>
</html>
