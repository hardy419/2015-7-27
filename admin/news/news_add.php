<?php
require_once("../../admin.inc.php");

header("Content-Type:text/html;charset=utf-8");

// Connect Database
require_once("../../php-bin/function.php");

// access control checking
require_once("z_access_control.php");

?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>學校資訊管理</title>

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style4 {color: #006600}
.style5 {color: #666666}
-->
</style>
</head>
<script src="../../js/validation.js"></script>
<script charset="utf-8" src="../kindeditor/kindeditor-min.js" type="text/javascript"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>

</head>
<body>

<p class="title">學校資訊</p><BR>
<form method="POST" name="add_user" action="news_add_process.php" onSubmit="return check_valid();" enctype="multipart/form-data">
<table width="850" border="0" cellpadding="5" cellspacing="1">
  <tr >
    <td width="100%" >
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
      <tr valign="top">
        <td colspan="4" bgcolor="ECECEC"><font class="style4">新增資料</font> </td>
        </tr>
             <tr>
            <td height="18" bgcolor="#FFFFFF">內容類型:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF">  <select name="contype" id="contype">
            <option value="1" >單頁類型</option>
            <option value="2" >資訊類型</option>
            <option value="3" >下載類型</option>
            </select>
           </td>
          </tr>     

          <tr>
            <td height="18" bgcolor="#FFFFFF">序號:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF">  <input name="order" type="text" id="order" size="10" maxlength="10">
           </td>
          </tr>
          <tr>
            <td height="18" bgcolor="#FFFFFF">標題:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="u_name" type=text class="style8" size="40">
              <font color="#FF0000">* </font></td>
          </tr>


          <tr>
            <td height="18" valign="top" bgcolor="#FFFFFF">內容:</td>
            <td height="18" colspan="3" bgcolor="FFFFFF"><script language="javascript">
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

