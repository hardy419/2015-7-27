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
                  <td><a href="course_course.php"><img src="images/course_left_hover_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_train.php"><img src="images/course_left_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_class.php"><img src="images/course_left_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="course_nimble.php"><img src="images/course_left_07.jpg" width="187" height="66" /></a></td>
                </tr>
				<?php require('./model/course_School_calendar.php'); if(!empty($res_PDF_arr['file_name'])){ ?>
                <tr>
                  <td><a href="./userUpload/pdf/<?php echo $res_PDF_arr['file_name']; ?>" target='_blank'><img src="images/course_left_08.jpg" width="187" height="65" /></a></td>
                </tr>
				<?php } ?>
               <!-- <tr>
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
              <td align="left"><img src="images/course_top_52.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="course_course.php" target="_self">學校課程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">課程政策</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="course_course.php" target="_self">School Curriculum</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Curriculum Policy</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
      <div class="top_tab">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<a href='index.php' style='position:relative;margin:0 5px;display:block;float:right;line-height:20px;height:20px;font-size:14px;' >
						<img style='position:relative;float:left;top:5px;line-height:20px;margin:0px 5px;' src="images/arrow.jpg" width="4" height="10" /> 返回首頁 
					</a>
					<!--?php show_post_mail('課程政策'); ?-->
				</td>
			</tr>
		</table>
		<!--a href="course_course.php" target="_self"><img src="images/kczc_top_hover_18.jpg" width="146" height="47"/></a>
          <a href="course_course_math.php" target="_self"><img src="images/kczc_top_07.jpg" width="146" height="40"/></a><a href="course_course_info.php" target="_self"><img src="images/kczc_top_11.jpg" width="146" height="40"/></a><a href="course_course_gongtong.php" target="_self"><img src="images/kczc_top_09.jpg" width="146" height="40"/></a> 
        <div class="clear"></div-->
          </div>
      <div class="right_content">        
          <div class="detail_single"></div>
          <div class="small_title"></div>
          <div class="detail_content" style="margin-bottom:20px;">
            <img src="images/kczc_content_39.jpg" width="173" height="149"  class="allimg_border left" style="margin-top:5px;"/ >
            <p><!--img src="images/kczc_content_35.jpg" width="138" height="19" /><br /-->學校著重提升學與教效能，一方面期望同學上課專注認真，另一方面老師會幫助同學，促進課堂互動、提供完整的課堂組織、協助同學鞏固知識、並延伸學習的機會、提升共通能力和高層次思考能力。學校亦持續探討多元化的教學及閱讀策略，利用課堂及活動提升同學運用英語的積極性，讓同學在多方面均得以發揮及照顧。</p>
              <div class="clear"></div>
        </div>
        <div class="small_title"></div>
            <div class="detail_content" style="margin-bottom:20px;">
              <img src="images/kczc_content_51.jpg" width="173" height="149"  class="allimg_border" style="margin-top:5px;"/>
              <p><!--img src="images/kczc_content_46.jpg" width="193" height="18" /><br /-->近年，在多個主要科目學校增加資源提供分組上課，高中更增設小班教學。於選科安排中，得以時間表的配合下，大大增加了同學選科組合的彈性，希望藉此照顧不同興趣及不同能力的同學，提升學習效能。</p>
              <div class="clear"></div>
        </div>
  <div class="small_title"></div>
            <div class="detail_content" style="margin-bottom:20px;">
              <img src="images/kczc_content_60.jpg" width="173" height="149"  class="allimg_border" style="margin-top:5px;"/>
              <p><!--img src="images/kczc_content_56.jpg" width="69" height="18" /><br /-->
              在新高中課程，學校為學生提供多元發展的學習經歷。同學除了需要修讀中國語文、英國語文、數學和通識教育科等四個核心科目外，亦可按本身興趣，在本校提供的選修課程中，修讀兩科。選修課程分別有物理、化學、生物、地理、歷史、企業、會計與財務概論﹝BAFS﹞、資訊及通訊科技﹝ICT﹞、經濟、倫理與宗教，體育(文憑試)和視覺藝術等，部分科目可選擇以英文教學。<br />除此之外，本校亦為同學提供「其他學習經歷」課程，包括德育及公民教育、體育、藝術教育、社會服務及與工作有關的經驗等，以達致全人發展。</p>
              <div class="clear"></div>
        </div>
<div class="small_title"></div>
            <div class="detail_content" style="margin-bottom:20px;">
              <img src="images/kczc_content_66.jpg" width="173" height="149"  class="allimg_border" style="margin-top:5px;"/>
              <p><!--img src="images/kczc_content_62.jpg" width="69" height="19" /><br /-->對於不同能力的同學，多個科目提供相關的學習輔導班及拔尖班，鞏固學習基礎及延伸更深入的課題，加強學習自信，同時協助同學進一步掌握公開考試的技巧。<br />於2013年，學校更增設了自主學習課，讓同學學習備課，整理溫習材料，安排溫習內容及次序，同儕間組織學習小組等，為同學建立終生學習的技巧及應有態度，成為一個獨立自主的年青人。</p>
              <div class="clear"></div>
        </div>
      </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
