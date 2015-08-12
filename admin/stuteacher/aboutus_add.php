<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>學與教管理</title>
<script charset="utf-8" src="../kindeditor/kindeditor-min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style4 {color: #006600}
.style5 {color: #666666}
-->
</style>
</head>

<body>

<p class="title">學與教</p><BR>
<table width="650" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="30%" height="35"><span class="style2"><span class="style4">學與教管理</span>：</span></td>
          <td width="20%"><a href="aboutus.php">搜索</a></td>
          <td width="20%"><a href="aboutus_add.php">新增</a></td>
          <td></td>
        </tr>
</table> <form method="POST" name="add_user" action="aboutus_add_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">
<table width="850" border="0" cellpadding="5" cellspacing="1">
  <tr >
    <td width="100%" >
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td colspan="4" bgcolor="ECECEC"><font class="style4">新增資料</font> </td>
        </tr>
       

          <tr>
            <td height="18" bgcolor="#FFFFFF">序號:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF">  <input name="order" type="text" id="order" size="10" maxlength="10">
           </td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">類別:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><select name="a_type" id="a_type">
            <option value="1">主要學習領域</option>
            <option value="2">教師專業發展</option>
            </select>
              <font color="#FF0000">* </font></td>
          </tr>          
          <tr>
            <td height="18" bgcolor="#FFFFFF">標題:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" size="40">
              <font color="#FF0000">* </font></td>
          </tr>


          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">內容:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><script type="text/javascript">
KindEditor.options.filterMode = false;
        KindEditor.ready(function(K) {
                window.editor = K.create('#a_content');
        });
</script>
                    <textarea name="a_content" id="a_content" cols="60" style="width: 670px; height: 300px;"></textarea></td>
          </tr>

          <tr bgcolor="#ECECEC">
            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="16%">&nbsp;</td>
                <td width="84%"><input type="submit" class="style8" value="    確定新增    "> &nbsp;
                  <input type="reset" value="重設"> &nbsp;
                  <input type="button" id="back" onClick="history.go(-1)" value="返回"></td>
              </tr>
            </table>            </td>
          </tr>
        
    </table></td>
  </tr>
</table></form>
</body>



</html>

