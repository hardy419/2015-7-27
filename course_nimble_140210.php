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
                <!--tr>
                  <td><a href="course_class.php"><img src="images/course_left_06.jpg" width="187" height="66" /></a></td>
                </tr-->
                <tr>
                  <td><a href="course_nimble.php"><img src="images/course_left_hover_07.jpg" width="187" height="66" /></a></td>
                </tr>
                <!--tr>
                  <td><a href="course_calendar.php"><img src="images/course_left_08.jpg" width="187" height="65" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_apply.php"><img src="images/course_left_OnlineApplication.jpg" width="187" height="65" /></a></td>
                </tr-->
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/course_top_46.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td>現在位置：</td>
                  <td><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="center"><a href="course_course.php" target="_self">學校課程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td height="25">靈性培育</td>
                </tr>
                <tr>
                  <td>Position：</td>
                  <td><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td><a href="course_course.php" target="_self">Curriculum</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td height="20">Christian Belief</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content">

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<?php show_get_back(); ?>
					<!--?php show_post_mail('留言板'); ?-->
				</td>
			</tr>
			<tr>
				<td colspan='2' align='right'>&nbsp;</td>
			</tr>
		</table>
          <script src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
		<script>
			$(document).ready(function(){
				//init
				function initPhoto(){
					var Bimg_name = $('.details_IMGBox').first().children('img').attr('src');
					$('.details_BIMG_a').attr('href',Bimg_name);
					$('.details_BIMG').attr('src',Bimg_name);
				}
			
				$('.details_IMGBox').click(function(){
					var img_name = $(this).children('img').attr('src');
					$('.details_BIMG_a').attr('href',img_name);
					$('.details_BIMG').hide();
					$('.details_BIMG').attr('src',img_name);
					$('.details_BIMG').fadeIn(300);
				});
				
				initPhoto();
			});
		</script>
           <div class="main_detail">
            <div class="main_title"><img src="images/spiritual_cultivation.jpg" width="743" height="35" /></div>
            <div class="detail_content">
			<img src="images/kczc_013.jpg" width="173" height="149"  class="allimg_border" style="margin-bottom:15px;"/>
              <p>我們相信透過認識基督教信仰，青年人能在成長過程中，找到人生的意義和方向，建主正面且積極的價值觀，並與神、與人和與自己建立和諧的關係。因此，本校一直十分重視學生的靈性培育發展。</p>
              <div class="clear"></div>
            </div><div class="detail_content">
			<img src="images/kczc_014.jpg" width="173" height="149"  class="allimg_border"  style="margin-bottom:15px;"/>
              <p>在學校教會金巴崙長老會禧臨堂的支援下，本校每週分高低年級舉行「早禱崇拜」，與學生一同頌唱詩歌，以詩歌讚美天父上帝，並透過研讀聖經和分享生命見證，讓學生認識信仰。本年度的信仰活動以「相信有愛就有奇蹟」作為主題， 期望學生實踐基督的愛、彼此相愛，使學校成為愛的群體。</p>
              <div class="clear"></div>
            </div><div class="detail_content">
			<img src="images/kczc_015.jpg" width="173" height="149"  class="allimg_border" style="margin-bottom:15px;"/>
              <p>同時，每週的學校教會聚會，讓學生有機會彼此分享和交流，期望學生學習互相關顧、屬靈生命得以扎根成長。而本年度本校將致力培育學生基督徒屬靈領袖，讓學生透過服事他人實踐信仰。此外，每週星期一早上舉行的教職員敬拜讚美會、教師退修營及教師團契，讓教師們彼此支持和守望。</p>
              <div class="clear"></div>
            </div><div class="detail_content">
			<img src="images/kczc_016.jpg" width="173" height="149"  class="allimg_border"  style="margin-bottom:15px;"/>
              <p>透過基督教教育課、福音週信仰活動、福音營、聖誕和復活節崇拜等不同形式的活動，使學生能全面地認識基督教信仰。</p>
              <div class="clear"></div>
            </div>
			
			<!--
			<div class='detailsBox_warp'>
				<div class='details_BIMGBox left'>
					<a class='details_BIMG_a' target='_blank' href='javascript:;'>
						<img class="details_BIMG" style="width:430px" src="./images/vedio/blank.jpg"/>
					</a>
				</div><!--details_BIMGBox--><!--
				<div class='details_IMGlistBox right'>
					<a class="details_IMGBox left"><img src="images/course_nimble_img01.jpg" /></a>
					<a class="details_IMGBox left"><img src="images/course_nimble_img02.jpg" /></a>
					<a class="details_IMGBox left"><img src="images/course_nimble_img03.jpg" /></a>
					<a class="details_IMGBox left"><img src="images/course_nimble_img04.jpg" /></a>
					<a class="details_IMGBox left"><img src="images/course_nimble_img05.jpg" /></a>
					<a class="details_IMGBox left"><img src="images/course_nimble_img06.jpg" /></a>
				</div><!--details_IMGlistBox-->
				<!--<div class='clear'></div>
			</div><!--detailsBox_warp-->
			
		
			
			
          </div>
        </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
