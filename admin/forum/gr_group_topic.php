<?
	session_start();

	require_once("../../php-bin/function.php");
	require_once("../../php-bin/pagedisplay.php");


	$page = 1;
	$record_per_page = 10;   // records display each page
 
         if (isset($_GET["page"]))
            $page = $_GET["page"];   // get the current page

if (settype($_GET[id], "integer") == false)
	header("Location:gr_group.php");
if ($_GET[id] =="")
	header("Location:gr_group.php");
    	
	$get_sql = "SELECT * FROM `tbl_forum` WHERE reply = '$_GET[id]' or id = '$_GET[id]' ORDER BY `postdate`";
	$get_result = mysql_query($get_sql, $link_id);
if (mysql_num_rows($get_result) == 0)
	header("Location:gr_group.php");

	$total_record = mysql_num_rows($get_result);
	$offset = $record_per_page * ($page-1);
	$total_page = ceil($total_record/$record_per_page);
	$get_result = mysql_query($get_sql." limit $offset,$record_per_page;", $link_id);
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
	
	sErrorMsg='';
	sErrorMsg=FieldValidation('電郵地址',document.add_reply.email.value,'',false,120);
	
	if (sErrorMsg.length>0)
	{
		displayErrorMessage(sErrorMsg);
		return false;
	}

	sErrorMsg='';
	sErrorMsg=FieldValidation('內容',document.add_reply.text.value,'',true,5000);
	
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
<body >
 
  <img src="admin_label.gif" width="500" height="35">
  <table width="650" border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td>
        <br>
        <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="normal">
          <tr valign="middle" bgcolor="ECECEC" > 
            <td colspan="2" class="subHead">  
                
                  瀏覽主題：<b><?=$get_rows[title]?></b>
                
              
            </td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td width="15%" align="left" valign="top" nowrap bgcolor="#FFFFFF"> 
                <p> 
               <?=($get_rows[email] == "")?$get_rows[name] : "<a href=mailto:".$get_rows[email].">".$get_rows[name]."</a>";?>
                </p>
            </td>
            <td valign="top">
              <?=ereg_replace("\n","<BR>",$get_rows[desc])?>
              <br>
              <br>
              <br>
            <table border="0" align="right" cellpadding="3" cellspacing="0" class="normal">
              <tr>
                <td><?=substr($get_rows["postdate"],8,2)."-".substr($get_rows["postdate"],5,2)."-".substr($get_rows["postdate"],0,4)?>
                </td>
                <td> | <a href="gr_group_edit.php?id=<?=$get_rows[id]?>">更改</a></td>
                <td> | <a href="delete_topic.php?id=<?=$get_rows["id"]?>" onClick="return confirm('確認刪除這個主題嗎?')">刪除</a></td>
              </tr>
            </table></td>
          </tr>
          <!-- zzzzzzzzzzzzzzzzzzzzzz-->
         <?

// name email title desc postdate  
while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){

?>
              <tr bgcolor="#FFFFFF">
                <td align="left" valign="top" nowrap bgcolor="#FFFFFF">
                    <p>
<?=($get_rows[email] == "")?$get_rows[name] : "<a href=mailto:".$get_rows[email].">".$get_rows[name]."</a>";?>
</p>
                    
                </td>
                <td valign="top"><?=ereg_replace("\n","<BR>",$get_rows[desc])?><br>
                  <br>
                  <br>
                <table border="0" align="right" cellpadding="3" cellspacing="0" class="normal">
                  <tr>
                    <td><?=substr($get_rows["postdate"],8,2)."-".substr($get_rows["postdate"],5,2)."-".substr($get_rows["postdate"],0,4)?></td>
                    <td> | <a href="gr_group_edit.php?id=<?=$get_rows[id]?>">更改</a></td>
                    <td> | <a href="delete_post.php?id=<?=$get_rows["id"]?>&reply=<?=$get_rows["reply"]?>" onClick="return confirm('確認刪除這段內容嗎?')">刪除</a></td>
                  </tr>
                </table></td>
              </tr>

<?
}
?>
          <!-- zzzzzzzzzzzzzzzzzzzzzz-->
        </table>
                <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
                  <tr align="left" valign="top" bgcolor="#FFFFFF">
                    <td width="15%">&nbsp;</td>
                    <td width="85%" align="right"><?
				
        if ($total_page>0 && $page>0){
		$class_arr[1] = "normal";
		$search_arr = array("id"=>$_GET[id]);
         //   $name_arr = array("Previous","Next","You are currently in the first page","You are currently in the last page","You are currently in page %%","Page %%");
            page_display("",$page,$total_page,10,$search_arr,$sort_arr,$class_arr,$name_arr);
        }
	    ?></td>
                  </tr>
                </table>
                <br>                
                <br>
                <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
          <form name="add_reply" method="post" action="gr_group_add_reply.php" onSubmit="return check_valid()">
            <input name="id" type="hidden" id="id" value="<?=$_GET[id]?>">
            <tr bgcolor="ECECEC"> 
              <td colspan="2" class="subHead">回覆主題</td>
            </tr>
            <tr> 
              <td valign="top" bgcolor="ECECEC"> 
                 
                  名字:              </td>
              <td bgcolor="FFFFFF"> 
                   
                     
                      <?=$_SESSION[name]?>
                    
                  
              </td>
            </tr>
            <tr class="normal"> 
              <td valign="top" bgcolor="ECECEC"> 
                 
                  電郵地址:              </td>
              <td bgcolor="FFFFFF"> 
                   
                    <input name="email" type="text" id="email" size="40">
                  
              </td>
            </tr>
            <tr class="normal"> 
              <td valign="top" bgcolor="ECECEC"> 
                  
                  回覆內容:              </td>
              <td bgcolor="FFFFFF"> 
                  
                
                 
                  <textarea name="text" cols="38" rows="8" id="text"></textarea>
              </td>
            </tr>
            <tr class="normal"> 
              <td valign="top" bgcolor="ECECEC"></td>
              <td bgcolor="ECECEC"> 
                  <input type="submit" name="Submit" value="    確定回覆    ">
                  &nbsp;&nbsp; 
                  <input type="reset" name="Submit2" value="重設">
              </td>
            </tr>
          </form>
        </table>
                <br>
      <a href="#" onClick="history.go(-1)" >回上一頁</a> 
	  </td>
    </tr>
  </table>
  </body>
</html>
