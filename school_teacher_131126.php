<?php include 'header.php'; ?>
<?php include 'banner_school.php'; ?>
<?php include('./model/teacher_list_selection.php');?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_03.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="school_intro.php" target="_self"><img src="images/left_03.jpg" border="0"/></a></td>
                </tr>
                <tr>
                  <td><a href="school_philosophy.php" target="_self"><img src="images/left_05.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_mottoandcrest.php" target="_self"><img src="images/left_06.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_development.php" target="_self"><img src="images/left_07.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_words.php" target="_self"><img src="images/left_08.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_directors.php" target="_self"><img src="images/left_09.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_teacher.php" target="_self"><img src="images/left_hover_10.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_goldintro.php"><img src="images/left_11.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_church.php" target="_self"><img src="images/left_12.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_report.php" target="_self"><img src="images/left_13.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="school_position.php" target="_self"><img src="images/left_14.jpg" width="187" height="65" /></a></td>
                </tr>
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
        <table width="780" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left"><img src="images/school_right_top_92.jpg" width="109" height="57" /></td>
            <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
              <tr>
                <td>現在位置：</td>
                <td><a href="index.php" target="_self">首頁</a></td>
                <td width="25" align="center">&gt;</td>
                <td align="center"><a href="school_intro.php" target="_self">學校</a></td>
                <td width="25" align="center">&gt;</td>
                <td height="25">老師介紹</td>
              </tr>
              <tr>
                <td>Position：</td>
                <td><a href="index.php" target="_self">Home</a></td>
                <td width="25" align="center">&gt;</td>
                <td><a href="school_intro.php" target="_self">School</a></td>
                <td width="25" align="center">&gt;</td>
                <td height="20">Teacher</td>
              </tr>
            </table></td>
          </tr>
        </table>
      </div>
        <div class="right_content">
         <div class="detail_single">本校校長與教師共七十七人，包括一名課程發展主任、一名外籍英語教師、學校另聘一名外籍英語話劇導師。所有教師均已接受教育專業訓練，其中取得碩士學位共二十九人，所有常額英文教師均已取得語文基準的資格，而教師的平均教學年資為七年。另有學校牧師一人、兩名社工、一名學校牧師、一名校園宣教師、七名教學助理。</div>
		  <form id="form1" name="form1" method="get" action="">
          <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>名稱：</td>
              <td>
					<input name="t_name" type="text" id="t_name" value="<?=$_GET[t_name]?>" size="10">
				  
			  </td>
              <td>
                  <input type="submit" name="submit" value="搜尋" />
              </td>
            </tr>
          </table>
		  </form>
          <table width="745" border="0" cellspacing="1" cellpadding="0" bgcolor="#eeeeee" style="margin-top:30px;" class="email_hover">
            <tr>
              <td height="40" align="center" bgcolor="#f7f7f7">
				<a href="?<? echo "orderby=teacher_name&seq=";
					if($orderby=="teacher_name"){
					echo ($orderseq=="asc")? "desc" : "asc";
					}else{
					echo "desc";
					}
					echo $str_key;
					?>" class="wordfamily_01" style='color:#5B7BB6;'>教職員名稱</a>
			  </td>
              <td align="center" bgcolor="#f7f7f7">
				<a href="?<? echo "orderby=title&seq=";
					if($orderby=="title"){
					echo ($orderseq=="asc")? "desc" : "asc";
					}else{
					echo "desc";
					}
					echo $str_key;
					?>" class="wordfamily_01" style='color:#5B7BB6;'>職位</a>
			  </td>
              <td align="center" bgcolor="#f7f7f7">
				<a href="?<? echo "orderby=subject&seq=";
					if($orderby=="subject"){
					echo ($orderseq=="asc")? "desc" : "asc";
					}else{
					echo "desc";
					}
					echo $str_key;
					?>" class="wordfamily_01" style='color:#5B7BB6;'>任教科目</a>
			  </td>
              <td align="center" bgcolor="#f7f7f7" class="wordfamily_01">電郵</td>
            </tr>
			<? 
			$i=0;
			while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){  
			$linkSTR="teacher_info.php?id=$get_rows[teacher_id]";
			$i++;
			$bgImage=($i%2==0)?"../images/tbg0.jpg":"../images/tbg1.jpg";

			?>
			<tr valign="top" >

			<td align="center" bgcolor="#FFFFFF">
			  <?=$get_rows["teacher_name"]?>
			</td>

			<td align="center" bgcolor="#FFFFFF">
			<?=$get_rows["title"]?>
			</td>

			<td align="center" bgcolor="#FFFFFF">
			<?=$get_rows["subject"]?>
			</td>



			<td height="40" align="center" bgcolor="#FFFFFF">
			  <?
				echo "<a href=\"mailto:$get_rows[teacher_email]\">$get_rows[teacher_email]</a>";
			  ?>
			</td>
			</tr>
			<? } ?>
          </table>
		  <?php 
				if ($total_page>0 && $page>0){
					page_display_q("",$page,$total_page,10,'','','',"");
				}
		  ?>
        </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
