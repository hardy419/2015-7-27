<?php require("./php-bin/function.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>金巴崙長老會耀道中學</title><script>
	function logOut(){
		window.location.href='./do_logOut.php';
	}
</script>
<link href="css/lrtk.css" rel="stylesheet" type="text/css">
<LINK rel=stylesheet type=text/css href="lanrentuku.css">
<link href="./css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/lightbox.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/slide.js"></script>
<script language="javascript">
	<!--//
	function MM_openBrWindow(theURL,winName,features) {
	  window.open(theURL,winName,features);
	}
	//-->
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#5b7bb6">
  <tr>
    <td height="8"></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" height="110">
  <tr>
    <td align="left"><a href="index.php" target="_self"><img src="images/logo.jpg" width="580" height="72" border="0"/></a></td>
    <td class='wrap_top_p_log' align="right">
		<img src="images/logo_right.jpg" width="174" height="40" border="0" usemap="#Map" />
		<?php if(checkLogin()){
			$txt = $_SESSION['UNAME'];
			switch($_SESSION['UTPYE']){
				case 'S':
					$u_type = ' 同學';
					break;
				case 'T':
					$u_type = ' 老師';
					break;
				case 'P':
					$u_type = ' 家長';
					break;
			}
				echo '<p class=\'top_p_log\'>歡迎您：'.$txt.$u_type.' | <a href=\'javascript:void(0);\' onclick=\'logOut();\'> 登出 </a></p>';
		} ?>
	</td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div id="menu">
<ul id="nav">

    
    <li class="mainlevel" id="mainlevel_01"><a href="index.php" target="_self"><div></div></a>
    </li>
    
    <li class="mainlevel" id="mainlevel_02"><a href="school_intro.php" target="_self"><div></div></a>
    <ul id="sub_02">
    <li><a href="school_intro.php" target="_self">學校介紹<br/>School Introduction</a></li>
    <li><a href="school_philosophy.php" target="_self">辦學理念<br/>Educational Philosophy</a></li>
    <li><a href="school_mottoandcrest.php" target="_self">校訓與校徽<br/>Motto and Badge</a></li>
    <li><a href="school_development.php" target="_self">學校發展歷程<br/>Development of Schools</a></li>
    <li><a href="school_words.php" target="_self">校長的話<br/>Principal Message</a></li>
    <li><a href="school_directors.php" target="_self">法團校董會<br/>IMC</a></li>
    <li><a href="school_teacher.php" target="_self">老師介紹<br/>Teacher</a></li>
    <li><a href="school_goldintro.php" target="_self">金巴崙長老會介紹<br/>Presbyterian</a></li>
    <li><a href="school_church.php" target="_self">學校教會介紹<br/>School Church</a></li>
    <li><a href="school_report.php" target="_self">發展計劃/報告<br/>School Plan/Report</a></li>
    <li><a href="school_position.php" target="_self">學校位置<br/>School Location</a></li>
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_03"><a href="course_course.php" target="_self"><div></div></a>
    <ul id="sub_03">
    <li><a href="course_course.php" target="_self">課程政策<br/>Curriculum Policy</a></li>
    <li><a href="course_train.php" target="_self">培育政策<br/>Foster Policy</a></li>
    <li><a href="course_class.php" target="_self">聯課活動<br/>Co-Curricular Activities</a></li>
    <li><a href="course_nimble.php" target="_self">靈性培育<br/>Spiritual Nurture</a></li>
    <li><a href="course_calendar.php" target="_self">校曆表<br/>School Calendar</a></li>
    <li><a href="school_apply.php" target="_self">網上報名<br/>Online Application</a></li>
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_04"><a href="process_achievement.php" target="_self"><div></div></a>
    <ul id="sub_04">
    <li><a href="process_achievement.php" target="_self">傑出成就<br/>Outstanding Achievement</a></li>
    <li><a href="process_study.php" target="_self">學習活動<br/>Learning Activites</a></li>
    <li><a href="process_works.php" target="_self">學生作品<br/>Student Work</a></li>
    <li><a href="process_movie.php" target="_self">影片庫<br/>Video Library</a></li>
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_05"><a href="Organ_news.php" target="_self"><div></div></a>
    <ul id="sub_05">
    <li><a href="Organ_news.php" target="_self">學生會資訊<br/>Student Information</a></li>
    <li><a href="Organ_leader.php" target="_self">學生領袖<br/>Student Leaders</a></li>
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_06"><a href="community_notice.php" target="_self"><div></div></a>
    <ul id="sub_06">
    <li><a href="community_notice.php" target="_self">家長通告<br/>Notice to Parents</a></li>
    <li><a href="community_meeting.php" target="_self">家長教師會<br/>parent-Teacher Association</a></li>
    <li><a href="community_classmate.php" target="_self">舊生會<br/>School Alumni</a></li>
    <li><a href="community_homeschool.php" target="_self">家校園地<br/>School Campus</a></li>
	<li><a href="photos.php" target="_self">相片庫<br>Photos</a></li>
    </ul>
    </li>
    
     <li class="mainlevel" id="menu_tv"><a href="caspumtv.php" target="_self"><div></div></a>
    </li>
    
    
     <li class="mainlevel" id="menu_intra"><a class="menu_intra_a" href="http://www.cpcydss.edu.hk/" target="_self"><div></div></a>
		 <ul id="sub_06">
			<li><a href="login.php" target="_self">登錄<br/>Login</a></li>
		</ul>
    </li>
    
    <div class="clear"></div>

</ul>
</div></td>
  </tr>
</table>

<map name="Map" id="Map">
  <area shape="rect" coords="86,2,172,38" href="contact.php" target="_self" />
  <area shape="rect" coords="0,-1,83,46" href="sitemap.php" target="_self" />
</map>
