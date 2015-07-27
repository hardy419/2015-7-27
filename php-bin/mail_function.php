<meta http-equiv="Content-Type" content="text/html; charset=big5">
<script language="javascript">
<!--//
function MM_openBrWindow(theURL,winName,features) {
  window.open(theURL,winName,features);
}
//-->
</script>

<?php

function mail_to_page($title) {

	$title = base64_encode($title);
	$to = "ckjlau@cpcydss.edu.hk";
	//$to = "benbenau@gmail.com";
	$to = base64_encode($to);
	
	$url = "<a href=\"javascript:MM_openBrWindow('../pop_email.php?title=$title&to=$to','view','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=400,height=350,top=50,left=50')\">";
	$url .="<img src=../images/email.gif border=0 style=\"margin-bottom:-3px;\"> <font style=font-size:12px;>電郵本頁</font></a>";

	echo $url;
	
	return 0;

}

/* 
	$mail_title="Title ABC";
	$mail_to="abc@email.com";
	
	mail_to_page($mail_title, $mail_to);
*/
?>