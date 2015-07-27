<?php include 'header.php'; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="20">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        
        <div class="left_side_content"><img src="images/feedback.jpg" width="186" height="306"  style="margin-left:2px;"/></div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/feedback_05.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left" height="25">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left">留言板</td>
                </tr>
                <tr>
                  <td align="left" height="20">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left">Feedback</td>
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
		</table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:'新細明體'; color:#666; font-size:16px;">
            <tr>
              <td height="1" colspan="3" align="left" valign="top" background="images/dot.jpg" bgcolor="#f2f2f2"></td>
            </tr>
            <tr>
              <td width="16%" height="50" align="center" bgcolor="#f2f2f2">姓名：</td>
              <td width="3%">&nbsp;</td>
              <td width="81%"><form id="form1" name="form1" method="post" action="">
                <input type="text" name="textfield" id="textfield" style="border:1px solid #ccc; height:24px; width:250px;" />
              </form></td>
            </tr>
            <tr>
              <td height="1" colspan="3" align="left" valign="top" background="images/dot.jpg" bgcolor="#f2f2f2"></td>
            </tr>
            <tr>
              <td height="50" align="center" bgcolor="#f2f2f2" class="16pxfont">電話：</td>
              <td>&nbsp;</td>
              <td><form id="form1" name="form1" method="post" action="">
                <input type="text" name="textfield" id="textfield" style="border:1px solid #ccc; height:24px; width:250px;" />
              </form></td>
            </tr>
            <tr>
              <td height="1" colspan="3" align="left" valign="top" background="images/dot.jpg" bgcolor="#f2f2f2"></td>
            </tr>
            <tr>
              <td height="50" align="center" bgcolor="#f2f2f2" class="16pxfont">郵箱：</td>
              <td>&nbsp;</td>
              <td><form id="form1" name="form1" method="post" action="">
                <input type="text" name="textfield2" id="textfield2" style="border:1px solid #ccc; height:24px; width:250px;" />
              </form></td>
            </tr>
            <tr>
              <td height="1" colspan="3" align="left" valign="top" background="images/dot.jpg" bgcolor="#f2f2f2"></td>
            </tr>
            <tr>
              <td height="22" valign="top" bgcolor="#f2f2f2" class="16pxfont">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="50" align="center" valign="top" bgcolor="#f2f2f2" class="16pxfont">留言：</td>
              <td>&nbsp;</td>
              <td><form id="form2" name="form2" method="post" action="">
                <textarea name="textarea" id="textarea" cols="45" rows="5" style="border:1px solid #ccc; height:200px; width:500px;"></textarea>
              </form></td>
            </tr>
            <tr>
              <td height="28" bgcolor="#f2f2f2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="1" colspan="3" align="left" valign="top" background="images/dot.jpg" bgcolor="#f2f2f2"></td>
            </tr>
            <tr>
              <td height="50">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="100" align="left"><a href="#"><img src="images/ok.jpg" width="136" height="36" border="0"/></a></td>
            </tr>
          </table>
           
        </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
