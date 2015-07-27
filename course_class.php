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
                  <td><a href="course_course.php"><img src="images/course_left_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_train.php"><img src="images/course_left_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_class.php"><img src="images/course_left_hover_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_nimble.php"><img src="images/course_left_07.jpg" width="187" height="66" /></a></td>
                </tr>
				<?php require('./model/course_School_calendar.php'); if(!empty($res_PDF_arr['file_name'])){ ?>
                <tr>
                  <td><a href="./userUpload/pdf/<?php echo $res_PDF_arr['file_name']; ?>" target='_blank'><img src="images/course_left_08.jpg" width="187" height="65" /></a></td>
                </tr>
				<?php } ?>
                <!--<tr>
                  <td><a href="school_apply.php"><img src="images/course_left_OnlineApplication.jpg"/></a></td>
                </tr>-->
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/course_top_48.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="course_course.php" target="_self">學校課程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">聯課活動</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="course_course.php" target="_self">School Curriculum</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Co-Curricular Activities</td>
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
					<!--?php show_post_mail('留言板'); ?-->				</td>
			</tr>
			<tr>
				<td colspan='2' align='right'>&nbsp;</td>
			</tr>
			<tr>
			  <td colspan='2' align='center'><table width="740" border="0" cellpadding="10" cellspacing="1" bgcolor="#EEEEEE" class="detail_content">
                <tr>
                  <td bgcolor="#fcfcfc">本校為培養同學的不同興趣，讓同學更投入學校在課堂以外的學習生活，學校開辦不同的學會及學生組織供同學參與。學會主要分為四個類型：服務、體藝、興趣類和學術。</td>
                </tr>
              </table>
			    <table width="740" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="199" valign="top"><span class="detail_content"><img src="images/cocu_01.jpg" width="173" height="149"  class="allimg_border" style="margin-bottom:15px;"/></span></td>
                    <td width="541" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="3%"><img src="images/arrow.jpg" width="4" height="10" /></td>
                        <td width="97%" align="left" class="wordfamily_01">服務類</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="left"><strong>公益少年團</strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="left">為全港性的服務團隊，鼓勵團員關心社會、主動參與社會服務。團員透過累積積點，能考取不同的徽章。</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="left"><strong>基督少年軍</strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td align="left">帶領青少年認識基督、接受基督，讓基督成為他們的救主和生命的主，引領青少年人學效基督，培養像主一樣的人格，其中包括服務、虔誠、紀律及自愛等良好質素。</td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
			    <table width="740" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2"><hr size="1" color="#eee" width="100%" /></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="199" valign="top"><span class="detail_content"><img src="images/cocu_02.jpg" width="173" height="149"  class="allimg_border" style="margin-bottom:15px;"/></span></td>
                    <td width="541" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="3%"><img src="images/arrow.jpg" width="4" height="10" /></td>
                          <td width="97%" align="left" class="wordfamily_01">學術類</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>中普學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">透過一系列富趣味性的活動，讓同學認識中國傳統文化，了解當中蘊含的內涵。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>英文學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">English activities that provide an aut English environment where students can speak and interact with each others.</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>經商學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">提供一系列活動以培養商業及經濟認知，並透過營商經驗，讓會員訓練解難能力、創意思維及團體精神。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>科學學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">透過有趣的科學活動及實驗，讓同學了解自然與科學之美。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>地理及環保學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">希望透過外出考察本港不同地理景觀，讓同學更了解及愛護環境。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>資訊科技學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">提昇同學對資訊科技的興趣，編寫Android apps。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>English 
Debate Club</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">To build confidence in speaking through taking part in public speaking contest and debate competition. </td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
			    <table width="740" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2"><hr size="1" color="#eee" width="100%" /></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="199" valign="top"><span class="detail_content"><img src="images/cocu_03.jpg" width="173" height="149"  class="allimg_border" style="margin-bottom:15px;"/></span></td>
                    <td width="541" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="3%"><img src="images/arrow.jpg" width="4" height="10" /></td>
                          <td width="97%" align="left" class="wordfamily_01">興趣類</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>天文學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">提升學生對天文學的興趣，讓學生接觸更多不同的天文活動。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>攝影學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">教授同學不同題材的攝影方法及技巧，安排外出攝影活動、舉行作品分享。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>觀鳥學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">讓學生更深入認識大自然奇妙之處，並且有機會代表學校參與觀鳥比賽。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>棋藝學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">舉辦比賽以促進會員間的交流及增加會員對棋藝的興趣和認識。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>食物與營養學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">增加同學對食物與營養的興趣及認知，透過烹飪班、示範班、參觀、小導師計劃，提升學員多元技能。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>閱讀及時事學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">透過讀書會及論壇，以提升學生的閱讀興趣及增加表達意見的自信心。</td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
			    <table width="740" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2"><hr size="1" color="#eee" width="100%" /></td>
                  </tr>
                  <tr>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="199" valign="top"><span class="detail_content"><img src="images/cocu_04.jpg" width="173" height="149"  class="allimg_border" style="margin-bottom:15px;"/></span></td>
                    <td width="541" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="3%"><img src="images/arrow.jpg" width="4" height="10" /></td>
                          <td width="97%" align="left" class="wordfamily_01">體藝類</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>視藝學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">增加學員對藝術的認識及興趣，吸取校內校外藝術文化，發揮創作之餘亦能提高藝術氣質。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>體育學會</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">提升學生對體育的興趣，讓同學接觸更多不同的體育活動。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>中文劇社</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">為初入劇社社員安排演技訓練，提高其表達技巧。表現優秀者，將參與校際戲劇節及本校綜合表演。</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left"><strong>英語劇社</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="left">To build confidence in speaking while incorporating drama elements. To perform in front of large audiences and practice your English skills</td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
			</tr>
			<tr>
			  <td colspan='2' align='right'>&nbsp;</td>
	    </tr>
		</table>		
           </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
