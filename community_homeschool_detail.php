<?php include 'header.php'; ?>
<?php include 'banner_community.php'; ?>
<?php include('./model/community_homeschool_detail_selection.php');?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_12.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="community_notice.php" target="_self"><img src="images/community_left_list_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="community_meeting.php" target="_self"><img src="images/community_left_list_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="community_classmate.php" target="_self"><img src="images/community_left_list_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="community_homeschool.php" target="_self"><img src="images/community_left_list_hover_07.jpg" width="187" height="65" /></a></td>
                </tr>
                <tr>
                  <td><a href="photos.php" target="_self"><img src="images/community_left_photos.jpg" width="187" height="65" /></a></td>
                </tr>
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/community_right_top_51.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"   class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="community_notice.php" target="_self">家校社區</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">家校園地</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="community_notice.php" target="_self">Community</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Home-School Garden</td>
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
					<!--a href="javascript:MM_openBrWindow('./pop_email.php?title=家校園地','view','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=350,top=50,left=50')" style='line-height:20px;'>
						
					</a-->
				</td>
			</tr>
		</table>
			<?php $object=mysql_fetch_object($get_result); ?>
			<h2 class='detail_title'><?php echo $object->title_cn;?></h2>
			<p class='right'>時間：<?php echo $object->date;?></p>
			<div class='clear'></div>
			<div class='content_div'>
				&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $object->description;?>
			</div><!--content_div-->
        </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
