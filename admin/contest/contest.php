<?php
require_once("../../admin.inc.php");
// access control checking
require_once("z_access_control.php");
// Selection
require_once("../../php-bin/function.php");

require_once("../../php-bin/pagedisplay.php");

?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>學校事務管理</title>

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
<p class="title">學校事務</p>

<table width="850"   border="0" align="left" cellpadding="5" cellspacing="0" class="small">

  <tr> 
    <td>
     
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
        <tr valign="top" bgcolor="ECECEC" > <td width="12%" nowrap class="admin_maintain_header">序號</td>
          <td nowrap class="admin_maintain_header"><a href="#">標題</a></td>
          <td width="13%" nowrap bgcolor="ECECEC" class="admin_maintain_header">檢視</td>
        </tr>
        
        <tr align="left" valign="top" >  <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 1</font></td>
          <td nowrap bgcolor="#FFFFFF" ><font class="style8">校外比賽</font></td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="contestlist.php?id=1"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>
        </tr>
        <tr align="left" valign="top" >  <td nowrap bgcolor="#FFFFFF" ><font class="style8">2</font></td>
          <td nowrap bgcolor="#FFFFFF" ><font class="style8">校內比賽</font></td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="contestlist.php?id=2"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>
        </tr>
        <tr align="left" valign="top" >  <td nowrap bgcolor="#FFFFFF" ><font class="style8">3</font></td>
          <td nowrap bgcolor="#FFFFFF" ><font class="style8">獎學金</font></td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="contestlist.php?id=3"><img src="../icons/xie.gif" width="16" height="16" border=0 alt=更改及檢視></a></font></td>
        </tr>
      </table>
        
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top">
          <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="85%" align="right" bgcolor="#FFFFFF"></td>
        </tr>
      </table>
      <p align="right">&nbsp;
    </p></td>
  </tr>
</table>
</body>
</html>
