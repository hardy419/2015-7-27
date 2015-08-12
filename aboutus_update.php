<?php
header("Content-Type:text/html;charset=utf-8");
 
require_once("../../admin.inc.php");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking

$a_id = $_GET[id]|0;

if ($_GET[Dfile] == 1 )
{
	// check the having file.
	$sql = "SELECT * FROM `tbl_aboutus` WHERE a_id=$a_id ";
	$result = mysql_query($sql,$link_id); 
	$get_rows = mysql_fetch_array($result);

}

$get_sql = "Select * FROM   tbl_aboutus  WHERE    tbl_aboutus.a_id=".$a_id;
mysql_query("set names utf8");
$get_result = mysql_query($get_sql,$link_id);

if( mysql_num_rows($get_result) > 0 )
{

	$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>學校簡介管理</title>

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style4 {color: #006600}
.style5 {color: #FF0000}
-->
</style>
<script charset="utf-8" src="../kindeditor/kindeditor-min.js" type="text/javascript"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script charset="utf-8" src="../kindeditor/jquery.min.js" type="text/javascript"></script>
</head>

</head>
<body>

<p class="title">學校簡介</p><BR>
<table width="650" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="30%" height="35"><span class="style2"><span class="style4">學校簡介管理</span>：</span></td>
          <td width="20%"><a href="aboutus_add.php">新增</a></td>
          <td width="20%">&nbsp;</td>
          <td></td>
        </tr>
</table>   <form method="post" name="update_user" action="aboutus_update_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">
<table width="850" border="0" cellpadding="5" cellspacing="1">
  <tr >
    <td width="100%" ><br>
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td colspan="4" bgcolor="ECECEC"><font class="style4">更改教師資料</font> </td>
        </tr>
           <tr>
            <td height="18" bgcolor="#FFFFFF">內容類型:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF">  <select name="contype" id="contype">
            <option value="1" <?php if($get_rows["contype"]==1){echo "selected";}?>>單頁類型</option>
            <option value="2" <?php if($get_rows["contype"]==2){echo "selected";}?>>資訊類型</option>
            <option value="3" <?php if($get_rows["contype"]==3){echo "selected";}?>>下載類型</option>
            </select>
           </td>
          </tr>   
          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">序號:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="order" type=text class="style8" id="u_name" value="<?php echo $get_rows["order"]?>" size="40"></td>
          </tr>      
          <tr>
            <td height="18" bgcolor="#FFFFFF">&nbsp;標題:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" id="u_name" value="<?php echo $get_rows["a_title"]?>" size="40"></td>
          </tr>
 


          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">內容:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><script language="javascript">
KindEditor.options.filterMode = false;
        KindEditor.ready(function(K) {
                window.editor = K.create('#a_content');
        });
</script>
                    <textarea name="a_content" id="a_content" cols="60" style="width: 670px; height: 300px;"><?php echo htmlspecialchars($get_rows["a_content"]);?></textarea></td>
          </tr>
	
          <tr bgcolor="#ECECEC">
            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16%"><input type=hidden name="a_id" value="<?php echo $get_rows["a_id"]?>"></td>
                <td width="84%"><input type=submit class="style8" value="    確定更改   "> &nbsp;
                  <input type="reset" value="重設"> &nbsp;
                  <input type="button" id="back" onClick="history.go(-1)" value="返回"></td>
              </tr>
            </table>            </td>
          </tr>
        
    </table></td>
  </tr>
</table>

</form>


</body>
</html><?php
	mysql_close();


}

	
?>