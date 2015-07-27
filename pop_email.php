<?
	$title = $_GET[title];
	$to = 'ckjlau@cpcydss.edu.hk';
	require("./PHPMailer/class.phpmailer.php"); //下载的文件必须放在该文件所在目录

	function do_post($user_mail,$title,$name,$email,$txt_msg){
		$mail_title = '金巴崙長老會耀道中學'.$title.'-'.$name.'-'.$email;
		$show_msg = $txt_msg."<br/><p style='text-align:right;'>FROM：".$name." Tel:".$phone." E-mail:".$email."</p>";
		$ade = trim($user_mail); //收件郵箱帳號
		$addresser = 'websitexct@163.com'; //發件郵箱帳號
		$pad = 'xct010203';       //發件郵箱密碼

		$mail = new PHPMailer(); //建立邮件发送类
		$mail->CharSet = "utf-8";
		$address = "$ade";
		$mail->IsHTML(true);
		$mail->IsSMTP(); // 使用SMTP方式发送
		$mail->Host = "smtp.163.com"; // 您的企业邮局域名
		$mail->SMTPAuth = true; // 启用SMTP验证功能
		$mail->Username = "$addresser"; // 邮局用户名(请填写完整的email地址)
		$mail->Password = "$pad"; // 邮局密码
		$mail->Port=25;
		$mail->From = "$addresser"; //邮件发送者email地址
		$mail->FromName = "$name";
		$mail->AddAddress("$address", "$name");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")

		$mail->Subject = $mail_title; //邮件标题
		$mail->Body = '
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		</head>
		<body>
		'.$show_msg.'
		</body>
		</html>
		'; //邮件内容

		if(!$mail->Send())
		{
			$state = 0;
			return $state;
		}else{
			$state = 1;
			return $state;
		}
	}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>金巴崙長老會耀道中學</title>
<style type="text/css">
<!--
*{font-size:12px;}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>
<body>

<?
	if($_POST[submit] == "1") {
?>

<table width="380" height="285" border="0" align="left" cellpadding="10" style="background-repeat:no-repeat;background-position:right ">
  <tr>
    <td height="281" align="center" valign="middle" >
	<img src="./images/school_logo.jpg" width="150" height="134"><br>
	  <p>您的邮件已发送成功！</p>
    <input type="submit" name="Submit2" value="关闭此页面" onClick="javascript:window.close();">
</td>
  </tr>
</table>

<?

		$email_subject = $_POST[title2]."欄目";
		
		$addressee = trim($_POST[to2]);
		$name = trim($_POST[name_chi]);
		$from_email = $_POST[email];
		$friend_email = $_POST[friend_email];
		
		
		
		$email_text = "欄目名稱：$_POST[title2]<br/>";
		$email_text .= "您的名稱：$_POST[name_chi]<br/>";
		$email_text .= "您的email地址：$_POST[email]<br/>";
		$email_text .= "朋友的名稱：$_POST[friend_name_chi]<br/>";
		$email_text .= "朋友的郵箱地址：$_POST[friend_email]<br/>";
		$email_text .= "留言：$_POST[remark]<br/>";
		
		$email_text2 = "欄目名稱：$_POST[title2]<br/>";
		$email_text2 .= "您的名稱：$_POST[friend_name_chi]<br/>";
		$email_text2 .= "您的email地址：$_POST[friend_email]<br/>";
		$email_text2 .= "朋友的名稱：$_POST[name_chi]<br/>";
		$email_text2 .= "朋友的郵箱地址：$_POST[email]<br/>";
		$email_text2 .= "留言：$_POST[remark]<br/>";
		
		do_post($addressee, $email_subject,$name,$from_email,$email_text);

		if($friend_email!=''){
			do_post($addressee, $email_subject,$_POST[friend_name_chi],$_POST[friend_email],$email_text2);
		}
			
	
		exit();
	}
	
	else {
?>

<table width="380" height="250" border="0" align="left" cellpadding="10" style="background-repeat:no-repeat;background-position:right ">
  <tr>
    <td align="center" valign="middle" >
	<form action="pop_email.php" method="post" onSubmit="MM_validateForm('name_chi','','R','email','','RisEmail','friend_email','','NisEmail');return document.MM_returnValue">
	<table  border="0" align="center" cellpadding="5" cellspacing="0">
      <tr align="left" valign="top">
        <td colspan="2" nowrap><div align="center"><span class="brown1 style1"><?php echo $title; ?></span></div></td>
      </tr>
      <tr align="left" valign="top">
        <td align="right" nowrap>名稱:</td>
        <td nowrap><input name="name_chi" type="text" id="name_chi" size="29">
        *</td>
      </tr>
      <tr align="left" valign="top">
        <td align="right" nowrap>郵箱地址:</td>
        <td nowrap><input name="email" type="text" id="email" size="29"> 
        * </td>
      </tr>
      <tr align="left" valign="top">
        <td align="right" nowrap>朋友的名稱:</td>
        <td nowrap><input name="friend_name_chi" type="text" id="friend_name_chi" size="29">
    </td>
      </tr>
      <tr align="left" valign="top">
        <td align="right" nowrap>朋友的郵箱地址:</td>
        <td nowrap><input name="friend_email" type="text" id="friend_email" size="29">
    </td>
      </tr>
      <tr align="left" valign="top">
        <td align="right" nowrap>留言:</td>
        <td nowrap><textarea name="remark" cols="30" rows="5" id="remark"></textarea>            </td>
      </tr>
      <tr align="left" valign="top">
        <td nowrap><input name="submit" type="hidden" id="submit" value="1">
          <input name="to2" type="hidden" id="to2" value="<?=$to;?>">
          <input name="title2" type="hidden" id="title2" value="<?=$title;?>"></td>
        <td nowrap>              <input name="Submit" type="submit" id="Submit" value="發送">
          <input type="reset" name="Reset" value="重置"></td></tr>
    </table>
	</form>
	</td>
  </tr>
</table>
 
<? } ?>
</body>
</html>
