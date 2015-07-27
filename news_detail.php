<?php include 'header.php'; ?>
<?php include 'banner_school.php'; ?>
<?php include('./model/news_details.php');?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/news_top_03.jpg" width="200" height="61" /></div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
        <table width="780" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left"><img src="images/News_right.jpg" /></td>
            <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
              <tr>
                <td align="left" height="25">現在位置：</td>
                <td align="left"><a href="index.php" target="_self">首頁</a></td>
                <td width="25" align="center">&gt;</td>
                <td align="left">最新消息</td>
              </tr>
              <tr>
                <td align="left" height="20">Position：</td>
                <td align="left"><a href="index.php" target="_self">Home</a></td>
                <td width="25" align="center">&gt;</td>
                <td align="left">News</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
        <div class="right_content">

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<?php show_get_back('news.php','返回上一級'); ?>
					<!--?php show_post_mail('最新消息'); ?-->
				</td>
			</tr>
		</table>
			<?php if(isset($msg)){ ?>
				<?php echo $msg; ?>
			<?php } ?>
			<?php  $res_arr = mysql_fetch_array($get_query_res);?>
			<table width="745" border="0" cellspacing="1" cellpadding="5" bgcolor="#B4B4B4" style="margin-top:30px;" class="email_hover">
				<tr>
				  <td width="129" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">日期</td>
				  <td height="40" align="left" bgcolor="#FFFFFF"><?php echo $res_arr['date']; ?></td>
				</tr>
				<tr>
				   <td width="129" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">標題</td>
				  <td height="40" align="left" bgcolor="#FFFFFF"><?php echo $res_arr['title']; ?></td>
				</tr>
				<tr>
				   <td width="129" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">內容</td>
				  <td height="40" align="left" bgcolor="#FFFFFF"><?php echo $res_arr['content']; ?></td>
				</tr>
				<tr>
				   <td width="129" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">連接</td>
				  <td height="40" align="left" bgcolor="#FFFFFF">
					<?php if($res_arr[0] != 1 && !empty($res_arr['link']) or $res_arr[0] != 1 && $res_arr['link'] = 'http://' )echo '<a target=\'_blank\' href=\''.$res_arr['link'].'\'>'.$res_arr['link'].'</a>'; ?>
				  </td>
				</tr>
				<tr>
				   <td width="129" height="40" align="center" bgcolor="#F9F5EF" class="wordfamily_01">附件</td>
				  <td height="40" align="left" bgcolor="#FFFFFF">
					<?php 
						if(!empty($res_arr['file_name'])){
							$file_url = '';
							switch($res_arr[0]){
								case '1':
								$file_url = './userUpload/attachment/'.$res_arr['file_name'];
								break;
								case '2':
								$file_url = './userUpload/attachment/'.$res_arr['file_name'];
								break;
								case '3':
								$file_url = './userUpload/attachment/'.$res_arr['file_name'];
								break;
							}
							echo '<a href=\''.$file_url.'\' target=\'_blank\'>下载</a>';
						}
					?>
				  </td>
				</tr>
			</table>
        </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
