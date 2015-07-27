<?php include 'header.php'; ?>
<?php include 'banner_process.php'; ?>
<?php require_once('./model/process_works_details.php'); ?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_08.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="process_achievement.php" target="_self"><img src="images/process_list_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="process_study.php" target="_self"><img src="images/process_list_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="process_works.php" target="_self"><img src="images/process_list_hover_06.jpg" width="187" height="66" /></a></td>
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
              <td align="left"><img src="images/process_right_top_59.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">學習歷程</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25"><a href="process_works.php" target="_self">學生作品</a></td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="process_achievement.php" target="_self">Learning</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20"><a href="process_works.php" target="_self">Students’ Works</a></td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content" onmousemove=\HideMenu()\ oncontextmenu="return false" ondragstart="return false" onselectstart ="return false" onselect="document.selection.empty()" oncopy="document.selection.empty()" onbeforecopy="return false" onmouseup="document.selection.empty()">

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="78%" align='right'>&nbsp;						</td>
				<?php if(($_GET['num']-1)<0){ ?>
					<td width="7%" align='center'>&nbsp;</td>
				<?php }else{ ?>
					<td width="7%" align='center'><a href="?num=<?php echo $_GET['num']-1;?>&id=<?php if(isset($article_id)){ echo $article_id;}else{ echo $_GET['id'];} ?>&act=prev" target="_self">上一頁</a></td>
				<?php } ?>
				<?php if(($_GET['num']+1)>=$total_record){?>
					<td width="7%" align='center'>&nbsp;</td>
				<?php }else{ ?>
					<td width="7%" align='center'><a href="?num=<?php echo $_GET['num']+1;?>&id=<?php if(isset($article_id)){ echo $article_id;}else{ echo $_GET['id'];} ?>&act=next" target="_self">下一頁</a></td>
				<?php } ?>
			    <td width="8%" align='right'>
					<?php show_get_back(); ?>
					<!--?php show_post_mail('學生作品'); ?-->
				</td>
			</tr>
		</table>
			<div class='details_Top_Box_warp' >
				<table width="740" height="35" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="23" valign="top" bgcolor="#5B7BB6"><img src="images/detail_left.jpg" width="23" height="35" /></td>
                    <td width="530" valign="middle" background="images/detail_center.jpg" bgcolor="#5B7BB6"><h2 style="font-size:14px;color:#fff; font-family:Verdana, Arial, Helvetica, sans-serif"><?php echo $res_arr['name'];?></h2></td>
                    <td width="23" valign="top" bgcolor="#5B7BB6"><img src="images/detail_right.jpg" width="23" height="35" /></td>
                    <td width="164" align="right" background="images/detail_center_line.jpg">年份 : <?php echo $res_arr['year'];?></td>
                  </tr>
                </table>
				
				<!--<p class='p_title'>年份：<?php echo $res_arr['year'];?></p>--->
		  </div>
			<div style='clear:both;'></div>
			<img class='OA_img' src='./userUpload/attachment/<?php echo $res_arr['FileName'];?>' />
			<!--
			<div class='OA_img_info'>
				<p>作品描述:<br/><?php echo $res_arr['desc'];?></p>
				<p>作品短評:<br/><?php echo $res_arr['t_desc'];?></p>
			</div>
			-->
			
			<br/>
			<br/>
			<div class='Process_details'><?php echo $res_arr_details['description'];?></div>
			<table width="740" height="35">
			  <tr>
			    <td width="319">&nbsp;</td>
				<td width="347" align="right">&nbsp;</td>
			    <td width="58" align="right"><a href="#top"><img src="images/top_top_top.jpg" width="54" height="25"/></a></td>
			  </tr>
		  </table>
			
		</div><!--right_content-->
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
