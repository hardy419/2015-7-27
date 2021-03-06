<?PHP
require("../php-bin/function.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>中華基督教會方潤華小學-家課日誌</title>
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/public.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<style>
.py_titleTable table td:first-child {width: 100px;}
.py_titleTable table td:first-child+td {width: 260px;}
.py_titleTable table td:first-child+td+td {width: 120px;}
.py_titleTable table td:first-child+td+td+td {width: 80px;}
.py_titleTable {top: 50px}
.py_tTable {height: auto; top: 100px}
.py_tTable table td {height: auto; background-color: #fff}
.pagination {padding: 10px; float: right}
#search-form a img {position: relative; top: 5px}
</style>
</head>
<body>
<!--==================頁頭==================-->
<div id="policywrap" class="pr commoncss">
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
   <!-- <ul>
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
  <div class="commonTop">
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
    <form id="search-form" action="javascript:void(0);" method="post">
      日期：<input type="text" name="date" id="date" />&nbsp;
      <a href="javascript:(function(){$('#date').focus();})();"><img src="images/calendar.png" /></a>&nbsp;
      班級：
      <select name="class" id="class" value="">
        <option value="all">全部</option>
      </select>&nbsp;
      <input type="submit" name="submit" value="搜尋" />
    </form>
      <div class="py_titleTable pa">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>時間</td>
          <td style="width:100px">標題</td>
          <td style="width:400px">&nbsp;</td>
        </tr>
      </table>
    </div>
    <div class="py_tTable pa">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?PHP
if (isset ($_GET['p'])) {
    $page = $_GET['p'];
}
else {
    $page = 1;
}
$num = 10;
$count = mysql_query('SELECT COUNT(*) AS count FROM tbl_activity WHERE `type_id`=1 ORDER BY `participant` DESC', $link_id);
$count = mysql_fetch_array($count, MYSQL_ASSOC);
$count = $count['count'];
$rows = mysql_query('SELECT * FROM tbl_activity WHERE `type_id`=1 ORDER BY `participant` DESC LIMIT '.($num*($page-1)).','.$num,$link_id);
for ($i=0; $row=mysql_fetch_array($rows,MYSQL_ASSOC); $i++){
?>
        <tr>
          <td width="80"><?PHP echo $row['date']; ?></td>
          <td width="360" style="text-align:left; padding-left: 40px; padding-top:10px; padding-bottom:10px"><a href="homework_class.php?id=<?PHP echo $row['id']; ?>"><?PHP echo $row['participant']; ?></a>&nbsp;</td>
        </tr>

<?PHP } ?>
      </table>

      <div style="clear:both"></div>
      <div class="pagination">
        <a <?PHP if ($page > 1) echo 'href="news.php?p='.($page-1).'"'; ?>>&lt;&lt;</a>
    <?PHP for ($pi=1; $pi<=(int)(($count-1)/$num)+1; ++$pi) { ?>
        <a href="news.php?p=<?PHP echo $pi; ?>"><?PHP echo $pi; ?></a>
    <?PHP } ?>
        <a <?PHP if ($page < (int)(($count-1)/$num)+1) echo 'href="news.php?p='.($page+1).'"'; ?>>&gt;&gt;</a>
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
  $('#policywrap').css('background','url(images/homework_banner.jpg) 1px top no-repeat');

  $('#date').datepicker();
  $('#date').datepicker('option', 'dateFormat','yy-mm-dd');
  $('#search-form a').click(function(){});
});
</script>
</body>
</html>
