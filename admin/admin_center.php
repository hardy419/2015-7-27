<?php
require_once '../admin.inc.php';
?>
<HTML>
<HEAD>
<TITLE>Admin Center</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>

<style type="text/css">
* {
	margin:0;
	padding:0;
	list-style-type:none;
}
a, img {
	border:0;
}
body {
	font:12px/180% Arial, Helvetica, sans-serif, "新宋体";
}
a, a:hover {
	text-decoration: none;
}
/*收缩菜单*/
.v {
	float:right;
	width:14px;
	height:14px;
	overflow:hidden;
	background:url(../images/vicon.png) no-repeat;
	display:inline-block;
	margin-top:-5px;
	margin-bottom:-5px;
}
.v01 {
	background-position:0 0;
}
.v02 {
	background-position:0 -16px;
	;
}
.vtitle,.title {
	height:35px;
	background:#CCCCCC;
	line-height:35px;
	border:1px solid #ccb6a9;
	margin-top:-1px;
	padding-left:15px;
	font-size:15px;
	color:#4d4d4d;
	font-family:"\5FAE\8F6F\96C5\9ED1";
	cursor:pointer;
}
.vtitle em {
	margin:10px 10px 0 0;
}
.vconlist {
	background:#ECECEC;
	border-right:1px solid #ccb6a9;
	border-left:1px solid #ccb6a9;
}
.vconlist li a {
	height:30px;
	line-height:30px;
	padding-left:20px;
	display:block;
	font-size:14px;
	color:#866f67;
	font-family:"\5FAE\8F6F\96C5\9ED1";
}
.vconlist li.select a, .vconlist li a:hover {
	color:#ed4948;
	text-decoration:none;
}

#description
{
 margin:0px auto;
 width:500px;
 font-size:14px;
}
#softwhy a
{
 text-decoration:underline;
 color:red;
}
</style>
</HEAD>
<BODY style=" background:#ECECEC;">
<div style="margin:10px; border:#ccc;">
  <div class="title">請選擇下列項目 </div>
  <div class="vtitle"><em class="v v02"></em>學校資料</div>
  <div class="vcon" >
    <ul class="vconlist clearfix">
       <li><a href="notice/downlist.php?type=1" target="admin_main">學校通告</a></li>
      <li><a href="lastest/activity.php" target="admin_main">最新消息</a></li>
      <li><a href="aboutus/n_search.php" target="admin_main">校長的話</a></li>
      <!--li><a href="aboutus/down.php" target="admin_main">周年報告</a></li>
     < <li><a href="calender/calendar.php?type=T" target="admin_main">校曆表</a></li>-->
    </ul>
  </div>
  <!--div class="vtitle"><em class="v v02"></em>學生成長</div>
  <div class="vcon" >
    <ul class="vconlist clearfix">
      <li><a href="contest/contestlist.php?id=1" target="admin_main">校外比賽</a></li>
      <li><a href="contest/contestlist.php?id=2" target="admin_main">校內比賽</a></li>
      <li><a href="art/activity.php" target="admin_main">學生作品</a></li>
      <li><a href="contest/contestlist.php?id=3" target="admin_main">獎學金</a></li>
    </ul>
  </div-->
  <div class="vtitle"><em class="v v02"></em>活動資訊</div>
  <div class="vcon">
    <ul class="vconlist clearfix">
      <li><a href="activity/activity.php?type=HD" target="admin_main">活動照片</a></li>
      <!--li><a href="movie/activity.php" target="admin_main">活動影片</a></li>
      <li><a href="notice/downlist.php?type=2" target="admin_main">校園刊物</a></li>
      <li><a href="notice/downlist.php?type=5" target="admin_main">傳媒報道</a></li>
      <li><a href="notice/downlist.php?type=6" target="admin_main">境外學習活動</a></li-->
    </ul>
  </div>
   <!--div class="vtitle"><em class="v v02"></em>資料下載區</div>
  <div class="vcon">
    <ul class="vconlist clearfix">
      <li><a href="notice/downlist.php?type=4" target="admin_main">學校報告及發展計劃</a></li>
      <li><a href="notice/downlist.php?type=3" target="admin_main">招標公告</a></li>
    </ul>
  </div>
 < <div class="vtitle"><em class="v v02"></em>其他</div>
  <div class="vcon">
    <ul class="vconlist clearfix">
     <li><a href="link/link.php?link_sort=2" target="admin_main">常用網站</a></li>
    </ul>
  </div>-->
  
   <div class="title"><a href="admin_logout.php" target="_parent">登出</a></div>
</div>
<script type="text/javascript">
$(function(){
	//菜单隐藏展开
	var tabs_i=0
	$('.vtitle').click(function(){
		var _self = $(this);
		var j = $('.vtitle').index(_self);
		if( tabs_i == j ) return false; tabs_i = j;
		$('.vtitle em').each(function(e){
			if(e==tabs_i){
				$('em',_self).removeClass('v01').addClass('v02');
			}else{
				$(this).removeClass('v02').addClass('v01');
			}
		});
		$('.vcon').slideUp().eq(tabs_i).slideDown();
	});
})
</script>
</BODY>
</HTML>