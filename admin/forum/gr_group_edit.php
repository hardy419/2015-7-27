<?
	session_start();

	if ($_SESSION[allow_control_forum] != 1)	
		header("Location:../../index.htm");

	require_once("../../php-bin/function.php");
	
	$get_sql = "SELECT * FROM `tbl_forum` WHERE id = '$_GET[id]'";
	$get_result = mysql_query($get_sql, $link_id);
	if (mysql_num_rows($get_result) ==0)
		header("Location:gr_group.php");	
		
	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);		

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

<?
if ($get_rows[reply] == 0){
?>
	sErrorMsg='';
	sErrorMsg=FieldValidation('標題',document.update_post.title.value,'',true,100);
	
	if (sErrorMsg.length>0)
	{
		displayErrorMessage(sErrorMsg);
		return false;
	}
<?
}
?>
	sErrorMsg='';
	sErrorMsg=FieldValidation('內容',document.update_post.text.value,'',true,5000);
	
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
.style2 {color: #006699}
-->
</style>
</head>
<form name="update_post" method="post" action="gr_group_edit_post.php" onSubmit="return check_valid()">
<input name="id" type="hidden" id="id" value="<?=$_GET[id]?>">
<input name="reply" type="hidden" id="reply" value="<?=$get_rows[reply]?>">
<body >
   <img src="admin_label.gif" width="500" height="35">

             
           
                <table width="650" border="0" cellpadding="5" cellspacing="0">
                  <tr> 
                    <td><table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
                     
                      <tr bgcolor="ECECEC" class="normal">
                        <td colspan="2" valign="top" class="subHead">更改留言</td>
                      </tr>
                        <tr> 
                          <td valign="top" bgcolor="ECECEC"> 
                              名字:
                          </td>
                          <td bgcolor="ECECEC"> 
                              <?=$get_rows[name]?>
                              
                          </td>
                        </tr>
                        <?
                        if ($get_rows[email] != ""){
                        ?>
                        <tr class="normal"> 
                          <td valign="top" bgcolor="ECECEC"> 
                              電郵地址:
                          </td>
                          <td bgcolor="FFFFFF">
                              <?=$get_rows[email]?>
                          </td>
                        </tr>
                        <?
                        }
                        if ($get_rows[reply] == 0){
                        ?>
                        <tr class="normal"> 
                          <td valign="top" bgcolor="ECECEC">  
                              標題:
                          </td>
                          <td bgcolor="FFFFFF"> <input name="title" type="text" id="title" value="<?=$get_rows[title]?>" size="40"> </td>
                        </tr>
                        <?
                        }
                        ?>
                        <tr class="normal"> 
                          <td valign="top" bgcolor="ECECEC"> 
                              內容:
                          </td>
                          <td bgcolor="FFFFFF"> 
                              
                            
                             
                              <textarea name="text" cols="38" rows="8" id="text"><?=$get_rows[desc]?></textarea>
                          </td>
                        </tr>
                        <tr class="normal"> 
                          <td valign="top" bgcolor="ECECEC"></td>
                          <td bgcolor="ECECEC"> 
                              <input type="submit" name="Submit" value="     確定更改    ">
                              &nbsp;&nbsp; 
                              <input type="submit" name="Submit2" value="還原">
                          </td>
                        </tr>
                    </table>
                    <br>
					  <a href="#" onClick="history.go(-1)" >回上一頁</a> 
					</td>
                  </tr>
</table>
                
             
</body>
 </form>
</html>
