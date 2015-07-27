<?php include 'header.php'; ?>
<?php include 'banner_process.php'; ?>
<?php require_once('./model/process_achievement_details.php'); ?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_08.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="images/process_list_hover_03.jpg" width="187" height="66" /></td>
                </tr>
                <!--tr>
                  <td><a href="process_study.php" target="_self"><img src="images/process_list_05.jpg" width="187" height="66" /></a></td>
                </tr-->
                <tr>
                  <td><a href="process_works.php" target="_self"><img src="images/process_list_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <!--tr>
                  <td><a href="process_movie.php" target="_self"><img src="images/process_list_07.jpg" width="187" height="65" /></a></td>
                </tr-->
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/process_right_top_55.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td>現在位置：</td>
                  <td><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="center"><a href="process_achievement.php" target="_self">學習歷程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td height="25"><a href="process_achievement.php" target="_self">傑出成就</a></td>
                </tr>
                <tr>
                  <td>Position：</td>
                  <td><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td><a href="process_achievement.php" target="_self">Learning</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td height="20"><a href="process_achievement.php" target="_self">Achievements</a></td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content">

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<a href='process_achievement.php' style='position:relative;margin:0 5px;line-height:20px;'>
						<img style='position:relative;top:-2px;line-height:20px;margin:0px 5px;' src="images/arrow.jpg" width="4" height="10" /> 返回 
					</a>
					<a href="javascript:MM_openBrWindow('./pop_email.php?title=傑出成就','view','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=350,top=50,left=50')" style='line-height:20px;'>
						
					</a>
				</td>
			</tr>
			<tr>
				<td colspan='2'	>&nbsp;</td>
			</tr>
		</table>
			<div class='details_top_box2' >
				<h2 class='h2_title'><?php echo $res_arr_details['title_cn'];?></h2>
				<p class='p_title'><?php echo $res_arr_details['date'];?></p>
			</div>
			<div style='clear:both;'></div>
			<?php while($res_arr_photo = mysql_fetch_array($get_result_photo)){ ?>
					<img class='OA_img' src='./userUpload/notice/original/<?php echo $res_arr_photo['photo_name'];?>' />
					<?php if(isset($res_arr_photo['p_info'])&&!empty($res_arr_photo['p_info'])){ ?>
					<div class='OA_img_info'><?php echo $res_arr_photo['p_info'];?></div>
					<?php } ?>
			<?php } ?>
			<br/>
			<br/>
			<div class='Process_details'><?php echo $res_arr_details['description'];?></div>
		</div><!--right_content-->
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
