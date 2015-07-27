<?php include 'header.php'; ?>
<?php include 'banner_course.php'; ?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_06.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="course_course.php" target="_self"><img src="images/course_left_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_train.php" target="_self"><img src="images/course_left_hover_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_class.php" target="_self"><img src="images/course_left_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_nimble.php" target="_self"><img src="images/course_left_07.jpg" width="187" height="66" /></a></td>
                </tr>
				<?php require('./model/course_School_calendar.php'); if(!empty($res_PDF_arr['file_name'])){ ?>
                <tr>
                  <td><a href="./userUpload/pdf/<?php echo $res_PDF_arr['file_name']; ?>" target='_blank'><img src="images/course_left_08.jpg" width="187" height="65" /></a></td>
                </tr>
				<?php } ?>
               <!-- <tr>
                  <td><a href="school_apply.php"><img src="images/course_left_OnlineApplication.jpg" /></a></td>
                </tr>-->
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="379" align="left"><img src="images/course_top_50.jpg" /></td>
              <td width="401" align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="course_course.php" target="_self">學校課程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">培育政策</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="course_course.php" target="_self">School Curriculum</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Pastoral Care Policy</td>
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
					<!--?php show_post_mail('留言板'); ?-->
				</td>
			</tr>
			<tr>
				<td colspan='2' align='right'>&nbsp;</td>
			</tr>
		</table>
          <div class="main_detail">
            <div class="main_title"><img src="images/Education-mission.jpg" width="743" height="35" /></div>
            <div class="detail_content">
			<img src="images/kczc_012.jpg" width="173" height="149"  class="allimg_border" style="margin-bottom:30px;"/>
              <p>我們的抱負乃是實踐以基督教信仰為本的教育，讓學生能夠認識基督真理，從而確立人的尊貴、自由，培育其創意和愛人如己的情操。我們的目標是生命的陶造與孕育，使學生為尊重自己、尊重別人、勇於承擔、積極進取、熱切求真、明辨是非、有情有夢的人。耀道中學建立嚴謹的校風，期望學懂時刻自我反思，追求自律，能兼重國際視野，成為對家庭、社區、國家及世界負責任及作出貢獻的人。</p>
              <div class="clear"></div>
            </div>
          </div>
        <div class="main_detail">
            <div class="en_title"><br />
          </div>
            <div class="detail_content">
              <div class="clear"></div>
          </div>
          </div>
        <div class="detail_content">
          <div class="clear"></div>
          </div>
          </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
