<?php include 'header.php'; ?>
<?php include 'banner_organ.php'; ?>
<?php require_once('./model/Organ_news_list_selection.php'); ?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_10.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="Organ_news.php" target="_self"><img src="images/organ_left_list_hover_03.jpg" width="187" height="66" /></a></td>
                </tr>
                <tr>
                  <td><a href="Organ_leader.php" target="_self"><img src="images/organ_left_list_05.jpg" width="187" height="66" /></a></td>
                </tr>
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/organ_right_top_47.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="Organ_news.php" target="_self">學生組織</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">學生會資訊</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="Organ_news.php" target="_self">Organizations</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Student Union</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content">
		  <form id="form1" name="form1" method="post" action="">
		  </form>
          <div class="clear">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="1%" align="left"><img src="images/arrow.jpg" width="4" height="10" /></td>
                <td width="99%" height="50" align="left" class="wordfamily_01">2013-2014 學生會幹事名單</td>
              </tr>
            </table>
            <table width="740" border="0" cellpadding="10" cellspacing="1" bgcolor="#FAEBDC">
              <tr>
                <td width="95" bgcolor="#FEFBF8">會長</td>
                <td width="602" bgcolor="#FFFFFF">鄧美思</td>
              </tr>
              <tr>
                <td bgcolor="#FEFBF8">副會長</td>
                <td bgcolor="#FFFFFF">賴藝偉、麥慧中</td>
              </tr>
              <tr>
                <td bgcolor="#FEFBF8">秘書</td>
                <td bgcolor="#FFFFFF">陳芝平</td>
              </tr>
              <tr>
                <td bgcolor="#FEFBF8">財政</td>
                <td bgcolor="#FFFFFF">張俊傑、姚霖傑</td>
              </tr>
              
              <tr>
                <td bgcolor="#FEFBF8">宣傳</td>
                <td bgcolor="#FFFFFF">李文靖、郭浩然</td>
              </tr>
              <tr>
                <td bgcolor="#FEFBF8">康樂</td>
                <td bgcolor="#FFFFFF">黃翠琳、譚國鋒、霍筠翹</td>
              </tr>
              <tr>
                <td bgcolor="#FEFBF8">福利</td>
                <td bgcolor="#FFFFFF">譚浩然、吳挺愷</td>
              </tr>
              <tr>
                <td bgcolor="#FEFBF8">總務</td>
                <td bgcolor="#FFFFFF">莫志健、張遨然</td>
              </tr>
            </table>
          </div>
		  
		  <?php 
				if ($total_page>0 && $page>0){
					page_display_q("",$page,$total_page,10,'','','',"");
				}
		  ?>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
