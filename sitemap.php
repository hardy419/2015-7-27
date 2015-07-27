<?php include 'header.php'; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="20">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        
        <div class="left_side_content"><img src="images/sitemap01.jpg" width="186" height="306"  style="margin-left:2px;"/></div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/sitemap.jpg" width="91" height="56" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left" height="25">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left">網頁指南</td>
                </tr>
                <tr>
                  <td align="left" height="20">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="sitemap.php">Site Map</a></td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
      <div class="right_content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<?php show_get_back('index.php','返回首頁'); ?>
					<!--?php show_post_mail('網頁指南'); ?-->
				</td>
			</tr>
		</table>
        <div class="sitemap">
              <ul>
                  <li class="level_1_title"><a href="index.php">首頁</a></li>
                  <li class="level_1_title"><a href="school_intro.php">學校</a></li>
                       <ul class="lever2_bg">
                          <li class="level_2"><a href="school_intro.php">學校介紹</a></li>
                          <li class="level_2"><a href="school_philosophy.php">辦學理念</a></li>
                          <li class="level_2"><a href="school_mottoandcrest.php">校徽</a></li>
                          <!--li class="level_2"><a href="school_development.php">學校發展歷程</a></li-->
                          <li class="level_2"><a href="school_words.php">校長的話</a></li>
                          <li class="level_2"><a href="school_directors.php">法團校董會</a></li>
                          <li class="level_2"><a href="school_teacher.php">老師介紹</a></li>
                          <li class="level_2"><a href="school_goldintro.php">金巴崙長老會介紹</a></li>
                          <li class="level_2"><a href="school_church.php">學校教會介紹</a> </li>
                          <li class="level_2"><a href="school_report.php">發展計劃/報告</a></li>
                          <li class="level_2"><a href="school_position.php">學校位置</a></li>
                      </ul>
                  <li class="level_1_title"><a href="course_course.php">學校課程</a></li>
                      <ul class="lever2_bg">
                          <li class="level_2"><a href="course_course.php">課程政策</a></li>
                          <li class="level_2"><a href="course_train.php">培育政策</a></li>
                          <li class="level_2"><a href="course_class.php">聯課活動</a></li>
                          <li class="level_2"><a href="course_nimble.php">靈性培育</a></li>
						  <?php require('./model/course_School_calendar.php'); if(!empty($res_PDF_arr['file_name'])){ ?>
						  <li class="level_2"><a href="./userUpload/pdf/<?php echo $res_PDF_arr['file_name']; ?>" target="_blank">校歷表</a></li>
						  <?php } ?>
                          <!--li class="level_2"><a href="school_apply.php">網上報名</a></li-->
                      </ul>
                  <li class="level_1_title"><a href="process_achievement.php">學習歷程</a></li>
                      <ul class="lever2_bg">
                          <li class="level_2"><a href="process_achievement.php">傑出成就</a></li>
                          <li class="level_2"><a href="process_study.php">學習活動</a></li>
                          <li class="level_2"><a href="process_works.php">學生報</a></li>
                          <!--li class="level_2"><a href="process_movie.php">影片庫</a></li-->
                      </ul>
                  <li class="level_1_title"><a href="Organ_news.php">學生組織</a></li>
                      <ul class="lever2_bg">
                          <li class="level_2"><a href="Organ_news.php">學生會資訊</a></li>
                          <li class="level_2"><a href="Organ_leader.php">學生領袖</a></li>
                      </ul>
                  <li class="level_1_title"><a href="community_notice.php">家校社區</a></li>
                      <ul class="lever2_bg">
                          <li class="level_2"><a href="community_notice.php">家長通告</a></li>
                          <li class="level_2"><a href="community_meeting.php">家長教師會</a></li>
                          <li class="level_2"><a href="community_classmate.php">校友會</a></li>
                          <li class="level_2"><a href="community_homeschool.php">家校園地</a></li>
                          <!--li class="level_2"><a href="photos.php">相片庫</a></li-->
                      </ul>
                  <li class="level_1_title"><a href="YDTV.php" target="_self">校園電視台</a></li>
                  <li class="level_1_title"><a href="http://library.cpcydss.edu.hk/" target="_self">圖書館</a></li>
                      <ul class="lever2_bg">
                         <!-- <li class="level_2"><a href="login.php">登錄</a></li>-->
					  </ul>
              </ul>
          </div>
      </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
