<?php include 'header.php'; ?>
<div class="banner_02"></div>
<div id="content">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" height="20">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
    <div class="left_side">
        
      <div class="left_side_content"><img src="images/phone_03.jpg" width="186" height="306"  style="margin-left:2px;"/></div>
    </div>
    <div class="right_side">
        <div class="right_side_top02">
          <table width="780" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left"><img src="images/intranet.jpg" /></td>
              <td align="right" class="12pxfont"><table border="0" cellspacing="0" cellpadding="0"  class="position email_hover">
                <tr>
                  <td align="left" height="25">現在位置：</td>
                  <td align="left"><a href="index.php" target="_self">首頁</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left">登錄</td>
                </tr>
                <tr>
                  <td align="left" height="20">Position：</td>
                  <td align="left"><a href="index.php" target="_self">Home</a></td>
                  <td width="25" align="center">&gt;</td>
                  <td align="left">Login</td>
                </tr>
              </table></td>
            </tr>
          </table>
		</div><!--right_side_top02-->

          <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan='2' align='right'>
					<?php show_get_back(); ?>
					<!--?php show_post_mail('登錄'); ?-->
				</td>
			</tr>
		</table>
		<div class='main_login'>
			<div class="success_box" style="background: #E2F1BB;border: 1px solid #598800;border-radius: 5px;-webkit-border-radius: 5px;-moz-border-radius: 5px;color: #000000;display: none;font-size: 13px;padding: 8px 8px;margin-bottom:20px;width: 672px;display: none;">通過驗證</div>
			<div id='error_box' class="error_box" style="background: #FAD3C4;border: 1px solid #A75B4E;border-radius: 5px;-webkit-border-radius: 5px;-moz-border-radius: 5px;color: #444444;display: none;font-size: 13px;padding: 8px 8px;margin-bottom:20px;width: 672px;display: none;"></div>
			<div class='main_loginBox'>
				<?php if(checkLogin()){
							$txt = $_SESSION['UNAME'];
							switch($_SESSION['UTPYE']){
								case 'S':
									$u_type = '同學';
									break;
								case 'T':
									$u_type = '老師';
									break;
								case 'P':
									$u_type = '家長';
									break;
							}
							echo '<p>歡迎您：'.$txt.$u_type.'</p>';
							echo "<a href='javascript:void(0);' onclick='logOut();'>登出</a>";
					  }else{?>
				<form action='HTTP://eclass.cpcydss.edu.hk/login.php' method='post' id='form_login' name='form_login' target="_self">
				<!--<form action='./model/do_login.php' method='post' id='form_login' name='form_login' target="_self">-->
					<table class='tb_login' cellpadding='5'>
<!--						<tr>
							<td width=70>用戶類別<span class='right'>：</span></td>
							<td>
								<select name='u_type' id='u_type'>
									<option value='1'>學生</option>
									<option value='2'>教師</option>
									<option value='3'>家長</option>
								</select>
							</td>
						</tr>-->
						<tr>
							<td>用戶名<span class='right'>：</span></td>
							<td><input type='text' name='UserLogin' id='u_name' class='ipt_txt_login' maxlength='20' style="height:25px;"/></td>
						</tr>
						<tr>
							<td>密碼<span class='right'>：</span></td>
							<td><input type='password' name='UserPassword' id='u_pwd' class='ipt_txt_login' maxlength='20' style="height:25px;"/></td>
						</tr>
<!--						<tr>
							<td>驗證碼<span class='right'>：</span></td>
							<td valign="top">
								<input type='text' name='s_code' id='s_code' class='ipt_sCode_login' maxlength='10' style="height:25px;"/>
								&nbsp;<img class='left;' src="random_img.php" width="71" height="21" align="absmiddle" style="margin-bottom:10px;" />&nbsp;
						  </td>
						</tr>-->
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type='submit' name='sub' id='sub' value='登錄'  class='a_login'/>
							</td>
						</tr>
				  </table>
				</form>
<script type="text/javascript">
new FormValidator('form_login', [{
    name: 'u_name',
    display: '姓名',    
    rules: 'required'
}, {
    name: 'u_pwd',
    display: '密碼',    
    rules: 'required'
}, {
    name: 's_code',
    display: '驗證碼', 
    rules: 'required'
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
		document.getElementById("form_login").submit();
    }
    
    if (evt && evt.preventDefault) {
        evt.preventDefault();
    } else if (event) {
        event.returnValue = false;
    }
});
</script>
<script>
	if(<?php echo isset($_GET['msg']);?> == 101){
		$("#error_box").append("驗證碼輸入錯誤！");
		$("#error_box").fadeIn(200);
	}else if(<?php echo isset($_GET['msg']);?> == 102){
		$("#error_box").append("用戶名或密碼輸入有誤！");
		$("#error_box").fadeIn(200);
	}
</script>
			<?}?>
			</div><!--main_loginBox-->
		</div><!--main_login-->
	</div><!--right_side-->
</div><!--content-->
<?php include 'foot.php'; ?>
</body>
</html>
