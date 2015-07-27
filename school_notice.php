<?php include 'header.php'; ?>
<?php include 'banner_school.php'; ?>
<?php include('./model/school_apply_detail.php');?>
<div class="banner_02"></div>
<div id="content">
    <div class="left_side">
        <div class="left_side_top02"><img src="images/left_top_10.jpg" width="200" height="61" /></div>
        <div class="left_side_content">
            <div class="left_side_content_in">
              <table width="176" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><a href="course_course.php"><img src="images/course_left_03.jpg" width="187" height="66" /></a></td>
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
                <!--tr>
                  <td><a href="course_calendar.php"><img src="images/course_left_08.jpg" width="187" height="65" /></a></td>
                </tr-->
                <tr>
                  <td><a href="school_apply.php"><img src="images/course_left_OnlineApplication_hover.jpg" width="187" height="65" /></a></td>
                </tr>
              </table>
               
            </div>
        </div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/community_right_top_OnlineApplication.jpg"/></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="Organ_news.php" target="_self">學生組織</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="25">網上報名表</td>
                </tr>
                <tr>
                  <td align="left">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left"><a href="Organ_news.php" target="_self">Organizations</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left" height="20">Student Information</td>
                </tr>
              </table></td>
            </tr>
          </table>
      </div>
        <div class="right_content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:20px;">
            <tr>
              <td width="2%"><img src="images/arrow.jpg" width="4" height="10" /></td>
              <td width="58%">網上報名系統</td>
			  <td width="40%" align='right'>
					<?php show_get_back('school_apply.php','返回上一級'); ?>
					<!--?php show_post_mail('網上報名表'); ?--></td>
            </tr>
          </table>
    			<div class="success_box" style="background: #E2F1BB;border: 1px solid #598800;border-radius: 5px;-webkit-border-radius: 5px;-moz-border-radius: 5px;color: #000000;display: none;font-size: 13px;padding: 8px 8px;margin-bottom:20px;width: 672px;display: none;">通過驗證</div>
			<div id='error_box' class="error_box" style="background: #FAD3C4;border: 1px solid #A75B4E;border-radius: 5px;-webkit-border-radius: 5px;-moz-border-radius: 5px;color: #444444;display: none;font-size: 13px;padding: 8px 8px;margin-bottom:20px;width: 672px;display: none;"></div>
			<?php 
			 echo "<font color=red size=4>".$_GET["msg"]."</font>";
			while($object=mysql_fetch_object($get_result)){ ?>
				
<table width="100%" border="0" cellpadding='5' cellspacing="1" bgcolor="#B4B4B4" class="email_hover" style="margin-top:30px; margin-bottom:10px;"  cellpadding="0">
 					  <tr>
					    <td width="100" height="25" align="right" bgcolor="#F9F5EF" >報名錶名稱:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->title;?></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >活動日期:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->date;?></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >活動時間:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->time_start;?>-<?php echo $object->time_end;?></td>
				      </tr>                   
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >活動地點:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->place;?></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >有效日期:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->exp_date;?></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >聯絡人名稱:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->contact_name;?></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >聯絡人電郵:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->contact_email;?></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >特別問題1:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->special_question_1;?><?php echo $object->special_question_tips_1;?></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >特別問題2:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->special_question_2;?><?php echo $object->special_question_tips_2;?></td>
				      </tr>
					  <!--tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >附件:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->document_name;?></td>
				      </tr-->
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >活動描述:</td>
					    <td bgcolor="#FFFFFF" ><?php echo $object->document_desc;?></td>
				      </tr>
					  </table>
                    <br>
                    <form action="apply_notice.php" method="post" name="apply_form" id="apply_form">
                    <table width="100%" border="0" cellpadding='5' cellspacing="1" bgcolor="#B4B4B4" class="email_hover"  cellpadding="0">
 					  <tr>
					    <td width="100" height="25" align="right" bgcolor="#F9F5EF" >姓名:</td>
					    <td height="25" bgcolor="#FFFFFF" >
                        <input type="hidden" name="apply_type" id="apply_type" value="<?php echo $object->id;?>" />
                        <input name="apply_name" type="text" id="apply_name" maxlength="20" /></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >姓名（ENG）:</td>
					    <td height="25" bgcolor="#FFFFFF" ><input name="apply_ename" type="text" id="apply_ename" maxlength="30" /></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >性別:</td>
					    <td height="25" bgcolor="#FFFFFF" ><input type="radio" name="apply_sex" id="apply_sex" value="m" />
				        男<input type="radio" name="apply_sex" id="apply_sex" value="f" />女</td>
				      </tr>                      
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >電話:</td>
					    <td height="25" bgcolor="#FFFFFF" ><input name="apply_tel" type="text" id="apply_tel" maxlength="20" /></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >電郵:</td>
					    <td height="25" bgcolor="#FFFFFF" ><input name="apply_email" type="text" id="apply_email" maxlength="30" /></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >人數(家長):</td>
					    <td height="25" bgcolor="#FFFFFF" ><input name="apply_parnum" type="text" id="apply_parnum" maxlength="7" /></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >人數(學生):</td>
					    <td height="25" bgcolor="#FFFFFF" ><input name="apply_stunum" type="text" id="apply_stunum" maxlength="8" /></td>
				      </tr>
					  <tr>
					    <td height="25" align="right" bgcolor="#F9F5EF" >備註:</td>
					    <td height="25" bgcolor="#FFFFFF" ><textarea name="remark" id="remark"></textarea></td>
				      </tr>                      
					  <tr>
					    <td height="25" colspan="2" align="center" bgcolor="#F9F5EF" >
							<input type='hidden' name='post_id' value='<?php echo $object->id;?>' />
							<input type='hidden' name='special_question_1' value='<?php echo $object->special_question_1;?>' />
							<input type='hidden' name='special_question_2' value='<?php echo $object->special_question_2;?>' />
							<input type='hidden' name='special_question_3' value='<?php echo $object->special_question_3;?>' />
					      <input type="submit" name="button" id="button" value="提交報名錶" />
					   </td>
				      </tr>
					  </table>
                    </form>
			<?php } ?>
<script type="text/javascript">
var formname="apply_form";
new FormValidator(formname, [{
    name: 'apply_name',
    display: '姓名',    
    rules: 'required'
}, {
    name: 'apply_ename',
    display: '英文名',    
    rules: 'required'
},{
    name: 'apply_tel',
    display: '電話',    
    rules: 'required'
},{
    name: 'apply_email',
    display: '電郵', 
    rules: 'required|valid_email'
},{
    name: 'apply_parnum',
    display: '家長人數', 
    rules: 'decimal'
},{
    name: 'apply_stunum',
    display: '學生人數',    
    rules: 'decimal'
}], function(errors, evt) {

    /*
     * DO NOT COPY AND PASTE THIS CALLBACK. THIS IS CONFIGURED TO WORK ON THE DOCUMENTATION PAGE ONLY.
     * YOU MUST CUSTOMIZE YOUR CALLBACK TO WORK UNDER YOUR ENVIRONMENT.
     */

    var SELECTOR_ERRORS = $('.error_box'),
        SELECTOR_SUCCESS = $('.success_box');
        
    if (errors.length > 0) {
        SELECTOR_ERRORS.empty();
        
        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            SELECTOR_ERRORS.append(errors[i].message + '<br />');
        }
        
        SELECTOR_SUCCESS.css({ display: 'none' });
        SELECTOR_ERRORS.fadeIn(200);
    } else {
        SELECTOR_ERRORS.css({ display: 'none' });
        SELECTOR_SUCCESS.fadeIn(200);
		document.getElementById(formname).submit();
    }
    
    if (evt && evt.preventDefault) {
        evt.preventDefault();
    } else if (event) {
        event.returnValue = false;
    }
});
</script>		 

      </div>
    </div> 
</div>
<?php include 'foot.php'; ?>
</body>
</html>
