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
		<img src="images/logo_right.jpg" width="250" height="40" border="0" usemap="#Map" />
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
		} ?>	</td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div id="menu">
<ul id="nav">

    
    <li class="mainlevel" id="mainlevel_01"><a href="index.php" target="_self" style='width:65px;'><div></div></a>
    </li>
    
    <li class="mainlevel" id="mainlevel_02"><a href="school_intro.php" target="_self"><div></div></a>
    <ul id="sub_02">
    <li><a href="school_intro.php" target="_self">學校介紹<br/>School Background</a></li>
    <li><a href="school_philosophy.php" target="_self">辦學理念<br/>School Mission</a></li>
    <li><a href="school_mottoandcrest.php" target="_self">校徽<br/>School Badge</a></li>
    <!--li><a href="school_development.php" target="_self">學校發展歷程<br/>School Development</a></li-->
    <li><a href="school_words.php" target="_self">校長的話<br/>Principal's Message</a></li>
    <li><a href="school_directors.php" target="_self">法團校董會<br/>IMC</a></li>
    <li><a href="school_teacher.php" target="_self">老師介紹<br/>Teaching Staff</a></li>
    <li><a href="school_goldintro.php" target="_self">金巴崙長老會介紹<br/>Cumberland Presbyterian Church</a></li>
    <li><a href="school_church.php" target="_self">學校教會介紹<br/>Xi Lin Cumberland Presbyterian Church</a></li>
    <li><a href="school_report.php" target="_self">發展計劃/報告<br/>Plans and Reports</a></li>
    <li><a href="school_position.php" target="_self">學校位置<br/>Location</a></li>
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_03"><a href="course_course.php" target="_self"><div></div></a>
    <ul id="sub_03">
    <li><a href="course_course.php" target="_self">課程政策<br/>Curriculum Policy</a></li>
    <li><a href="course_train.php" target="_self">培育政策<br/>Pastoral Care Policy</a></li>
    <li><a href="course_class.php" target="_self">聯課活動<br/>Co-Curricular Activities</a></li>
    <li><a href="course_nimble.php" target="_self">靈性培育<br/>Christian Belief</a></li>
	<?php require('./model/course_School_calendar.php'); if(!empty($res_PDF_arr['file_name'])){ ?>
    <li><a href="./userUpload/pdf/<?php echo $res_PDF_arr['file_name']; ?>" target="_blank">校曆表<br/>School Calendar</a></li>
	<?php } ?>
    <!--<li><a href="school_apply.php" target="_self">網上報名<br/>Online Application</a></li>-->
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_04"><a href="process_achievement.php" target="_self"><div></div></a>
    <ul id="sub_04">
    <li><a href="process_achievement.php" target="_self">傑出成就<br/>Achievements</a></li>
    <li><a href="process_study.php" target="_self">學習活動<br/>Learning Activites</a></li>
    <li><a href="process_works.php" target="_self">學生報<br/>Student Newsletter</a></li>
    <!--li><a href="process_movie.php" target="_self">影片庫<br/>Videos</a></li-->
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_05"><a href="Organ_news.php" target="_self"><div></div></a>
    <ul id="sub_05">
    <li><a href="Organ_news.php" target="_self">學生會資訊<br/>Student Union</a></li>
    <li><a href="Organ_leader.php" target="_self">學生領袖<br/>Student Leaders</a></li>
    </ul>
    </li>
    
    <li class="mainlevel" id="mainlevel_06"><a href="community_notice.php" target="_self"><div></div></a>
    <ul id="sub_06">
    <li><a href="community_notice.php" target="_self">家長通告<br/>Notices</a></li>
    <li><a href="community_meeting.php" target="_self">家長教師會<br/>Parent-Teacher Association</a></li>
    <li><a href="community_classmate.php" target="_self">校友會<br/>Alumni Association</a></li>
    <li><a href="community_homeschool.php" target="_self">家校園地<br/>Home-School Garden</a></li>
	<!--li><a href="photos.php" target="_self">相片庫<br>Photos</a></li-->
    </ul>
    </li>
    
     <li class="mainlevel" id="menu_tv"><a href="YDTV.php" target="_self"><div></div></a>
    </li>
    
    
     <li class="mainlevel" id="menu_intra"><a class="menu_intra_a" href="http://library.cpcydss.edu.hk/" target="_self"><div></div></a>
		 <ul id="sub_06">
			
		</ul>
    </li>
    
    <div class="clear"></div>

</ul>
</div></td>
  </tr>
</table>

<map name="Map" id="Map">
  <area shape="rect" coords="174,2,260,38" href="http://www.cpcydss.edu.hk/login.php" target="_self" />
  <area shape="rect" coords="89,0,172,47" href="sitemap.php" target="_self" />
</map>
