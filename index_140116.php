<?php include('header.php'); ?>
<script type="text/javascript" src="js/js/jquery.pack.js"></script>
<script type="text/javascript" src="js/js/slides.js"></script>
<script type="text/javascript" src="js/js/slide.js"></script>
<div id="maincontent">
	<?php include('./model/banner_selection.php'); ?>
	<?php include('./php-bin/scripture.php');?>
	<?php 
		while($rel_arr_banner = mysql_fetch_array($get_result_banner)){
		if(!empty($rel_arr_banner['banner_photo'])){
	?>
		<div class="element pict" style='background:#FFFFFF;'>
			<a target='_balnk' href="./news_detail.php?id=<?php echo $rel_arr_banner['id'];?>&tp=<?php echo $rel_arr_banner[0];?>">
				<?php echo '<img src="./userUpload/banner/'.$rel_arr_banner['banner_photo'].'">'?>
			</a>
		</div>
	<?php }}?>
    <script>
		$(document).ready(function(){
			$('.pict').addClass("main");
		});
	</script>
    <div class="element navi left"><img src="images/left.gif" alt="left"></div>
    <div class="element navi right"><img src="images/right.gif" alt="right"></div>
</div>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:20px; margin-top:20px;" class="index_news">
  <tr>
    <td width="510" valign="top">
		<table width="510" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
		  <tr>
			<td><a href="news.php" target="_self"><img src="images/index_news_top.jpg" width="510" height="54" /></a></td>
		  </tr>
		</table>
		<?php include('./model/news_list_selection.php'); ?>
		<?php $i = 0;?>
		<?php while($rel_arr_news = mysql_fetch_array($get_result_news)){?>
		<?php if($i>5)break;?>
      <table width="510" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:13px;">
        <tr>
          <td width="8"><img src="images/arrow.jpg" width="4" height="10" /></td>
          <td width="103" align="center" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:12px; color:#5b7bb6;">[<?php echo $rel_arr_news['date'];?>]</td>
          <td width="393" height="25" align="left">
		  <?php 
				if($rel_arr_news[0]==3){ 
					$sql_doc_type = 'select `docoment_type` from tbl_notice where noticeid = \''.$rel_arr_news['id'].'\'';
					$get_doc_type = mysql_query($sql_doc_type, $link_id);
					$res_doc_type = mysql_fetch_array($get_doc_type);
				}
		  ?>
		  <a  <?php if($rel_arr_news['link_open_window']=='Y'){echo "target='_balnk'";}?> href="<?php if(!empty($rel_arr_news['file_name'])){ echo './userUpload/attachment/'.$rel_arr_news['file_name'];
		  }else{
		  		if($rel_arr_news[0]==3){
						if($res_doc_type['docoment_type']=='P'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($rel_arr_news['web_type']=='9'){
							echo './process_study.php';
						}else if($res_doc_type['docoment_type']=='PC'){
							echo './community_homeschool_detail.php?id='.$rel_arr_news['id'];
						}else if($res_doc_type['docoment_type']=='S'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($res_doc_type['docoment_type']=='R'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($res_doc_type['docoment_type']=='SI'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($res_doc_type['docoment_type']=='MS'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($res_doc_type['docoment_type']=='OA'){
							echo './process_achievement_details.php?id='.$rel_arr_news['id'];
						}else if($res_doc_type['docoment_type']=='LA'){
							echo './process_study_details.php?id='.$rel_arr_news['id'];
						}
					}else if($rel_arr_news[0]==1){
						echo './process_works.php';
					}else{ 
						echo'./news_detail.php?id='.$rel_arr_news['id'].'&tp='.$rel_arr_news[0];
					}
		  }?>"><?php echo get_sub_string($rel_arr_news['title_cn'],50)?></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td height="18" align="left"><a <?php if($rel_arr_news['link_open_window']=='Y'){echo "target='_balnk'";}?> href="<?php if(!empty($rel_arr_news['file_name'])){ echo './userUpload/attachment/'.$rel_arr_news['file_name'];
		  }else{
		  		if($rel_arr_news[0]==3){
						if($res_doc_type['docoment_type']=='P'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($rel_arr_news['web_type']=='9'){
							echo './process_study.php';
						}else if($res_doc_type['docoment_type']=='PC'){
							echo './community_homeschool_detail.php?id='.$rel_arr_news['id'];
						}else if($res_doc_type['docoment_type']=='S'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($res_doc_type['docoment_type']=='R'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($res_doc_type['docoment_type']=='SI'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($res_doc_type['docoment_type']=='MS'){
							echo './userUpload/attachment/'.$rel_arr_news['file'];
						}else if($res_doc_type['docoment_type']=='OA'){
							echo './process_achievement_details.php?id='.$rel_arr_news['id'];
						}else if($res_doc_type['docoment_type']=='LA'){
							echo './process_study_details.php?id='.$rel_arr_news['id'];
						}
					}else if($rel_arr_news[0]==1){
						echo './process_works.php';
					}else{ 
						echo'./news_detail.php?id='.$rel_arr_news['id'].'&tp='.$rel_arr_news[0];
					}
		  }?>"><?php echo get_sub_string($rel_arr_news['title_en'],120)?> </a></td>
        </tr>
    </table>
		<?php $i++; }?>
    <td width="10">&nbsp;</td>
    <td width="480" valign="bottom"><table width="490" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="116" rowspan="2" align="right" valign="top"><img src="images/xx.jpg" width="77" height="38" /></td>
        <td width="21" height="60" align="left" valign="top" style="font-size:12px; font-family:新細明體; color:#666;">&nbsp;</td>
        <td width="353" align="left" valign="top" style="font-size:12px; font-family:新細明體; color:#666;"><img src="images/xx_words.jpg" width="352" height="108" /></td>
      </tr>
      <tr>
        <td height="40" colspan="2" align="right" valign="top">&nbsp;</td>
      </tr>
    </table>
      <table width="490" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="119" rowspan="2" align="right" valign="top"><img src="images/jj.jpg" width="77" height="38" /></td>
        <td width="20" height="60" align="left" valign="top" style="font-size:12px; font-family:新細明體; color:#666;">&nbsp;</td>
        <td width="353" align="left" valign="top" style="font-size:15px; font-family:新細明體; color:#666;line-height:24px;">
		  <? 
		  $r=rand(0,sizeof($scriptureArr)-1);
		  ?><?=$scriptureArr[$r][0]?></td>
		</td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="right" valign="top"><?=$scriptureArr[$r][1]?></td>
      </tr>
    </table>
      <table width="490" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right"><img src="images/index_student_03.jpg" width="441" height="193" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<?php include('foot.php'); ?>
</body>
</html>