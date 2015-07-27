<?
	session_start();
?>
<SCRIPT LANGUAGE="JavaScript">

<!--
function openwin(fname,wid,hei) {

var url = "" + fname + ".htm";
var par = "status=no,scrollbars=no,resizable=no,toolbar=no,location=no,directories=0,copyhistory=no,width=" + wid +",height=" + hei;
var newwin = window.open(url,fname,par);

}

-->

</SCRIPT>

<script language="JavaScript" type="text/JavaScript">
<!--
function check_valid() {
	var sErrorMsg;
	
	sErrorMsg='';
	sErrorMsg=FieldValidation('電郵地址',document.add_topic.email.value,'',false,120);
	
	if (sErrorMsg.length>0)
	{
		displayErrorMessage(sErrorMsg);
		return false;
	}

	sErrorMsg='';
	sErrorMsg=FieldValidation('標題',document.add_topic.title.value,'',true,100);
	
	if (sErrorMsg.length>0)
	{
		displayErrorMessage(sErrorMsg);
		return false;
	}

	sErrorMsg='';
	sErrorMsg=FieldValidation('內容',document.add_topic.text.value,'',true,5000);
	
	if (sErrorMsg.length>0)
	{
		displayErrorMessage(sErrorMsg);
		return false;
	}

}

//-->
</script>
<html>
<head>
<title>相片庫管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style5 {color: #666666}
-->
</style>
</head>
<form name="add_topic" method="post" action="gr_group_add.php" onSubmit="return check_valid()">
<body>
<img src="admin_label.gif" width="500" height="35"><br>
            

  <table width="650" border="0" cellpadding="5" cellspacing="0">
    <tr> 
                    <td>
                    

                    <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
                    <tr bgcolor="ECECEC">
                    <td colspan="2" class="subHead">
                      新增主題
                    </td>
                    </tr>
                        <tr> 
                          <td align="left" valign="top" bgcolor="ECECEC"> 
                             <div align="left">名字:
                            </div></td>
                          <td bgcolor="FFFFFF"> 
                               
                                 
                                  <?=$_SESSION[name]?>
                                
                              
                            </td>
                        </tr>
                        <tr class="normal"> 
                          <td align="left" valign="top" bgcolor="ECECEC"><div align="center" > 
                             <div align="left">電郵地址:
                            </div></td>
                          <td bgcolor="FFFFFF"><input name="email" type="text" size="40">
                              
                            </td>
                        </tr>
                        <tr class="normal"> 
                          <td align="left" valign="top" bgcolor="ECECEC"> <div align="center" > 
                             <div align="left">標題:
                            </div></td>
                          <td bgcolor="FFFFFF"> <input name="title" type="text" size="40"> </td>
                        </tr>
                        <tr class="normal"> 
                          <td align="left" valign="top" bgcolor="ECECEC"><div align="center" > 
                             <div align="left">內容:
                            </div></td>
                          <td bgcolor="FFFFFF">                              <textarea name="text" cols="38" rows="8"></textarea>
                          </td>
                        </tr>
                        <tr class="normal"> 
                          <td align="left" valign="top" bgcolor="ECECEC"><div align="right">
                            <div align="left"></div></td>
                          <td bgcolor="ECECEC"> 
                              <input type="submit" name="Submit" value="    確定新增    ">
                              &nbsp;&nbsp; 
                              <input type="reset" name="Submit2" value="重設">
                <font class="style8">&nbsp;&nbsp;                </font></td>
                        </tr>
      </table>
      <br>
      <br>
      <a href="#" onClick="location.href='gr_group.php'" >回上一頁</a> </td>
    </tr>
</table>
             
  
  </body>
 </form>
</html>
