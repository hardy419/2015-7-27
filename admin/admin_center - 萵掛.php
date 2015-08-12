<?php
require_once '../admin.inc.php';
?>
<HTML>
<HEAD>
<TITLE>Admin Center</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK href="../js/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {font-size: 18px; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style3 {
	font-size: 10px;
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #0000FF;
}
.style7 {font-size: 12px; color: #661143; font-family: Verdana, Arial, Helvetica, sans-serif;}
.style8 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
body {
	background-color: #ececec;
}
-->
</style>
</HEAD>
<BODY margin="5" >
<TABLE border="0" cellpadding="0" cellspacing="0" class="table1">
  <TR> 
    <TD align="center" valign="top" >  <TABLE width="150" border="0" cellpadding="3" cellspacing="1" bgcolor="CCCCCC">
        <TR> 
          <TD height="32" align="center" valign="middle" bgcolor="CCCCCC"><TABLE width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
  <TR>
    <TD align="left" valign="top">請選擇下列項目 </td>
  </tr>
          </TABLE>          </TD>
        </TR>
        
        <tr> 
          <td valign="top" bgcolor="#ECECEC" ><TABLE width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
          
 	<TR>
			  <TD align="left" valign="top"><a href="aboutus/n_search.php" target="admin_main">校長的話</a></td>
			</tr>
	<TR>
			  <TD align="left" valign="top"><a href="aboutus/down.php" target="admin_main">周年報告</a></td>
			</tr>
	<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php?type=HD" target="admin_main">活動記錄</a></td>
			</tr>   
	<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php?type=B" target="admin_main">比賽記錄</a></td>
			</tr>   
	<TR>
			  <TD align="left" valign="top"><a href="video/search.php" target="admin_main">美術作品</a></td>
			</tr>  
	<TR>
			  <TD align="left" valign="top"><a href="video/search.php" target="admin_main">其他作品</a></td>
			</tr>  
	<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php?type=N" target="admin_main">通告下載</a></td>
			</tr> 
<TR>
			  <TD align="left" valign="top"><a href="video/search.php" target="admin_main">學科網站</a></td>
			</tr>   
<TR>
			  <TD align="left" valign="top"><a href="video/search.php" target="admin_main">常用網站</a></td>
			</tr>  
          
<?php
if( $_SESSION["access_teacher"] != 0 )
{
?>
			  <TR>
                <TD align="left" valign="top"><a href="aboutus/aboutus.php" target="admin_main">學校簡介</a></td>
              </tr>
<?php
}
if( $_SESSION["access_activity"] != 0 )
{ ?>
              	<TR>
                <TD align="left" valign="top"><a href="stuteacher/aboutus.php" target="admin_main">學與教</a></td>
              </tr>
 <?php
}
if( $_SESSION["access_activity"] != 0 )
{ ?>
			  <TR>
                <TD align="left" valign="top"><a href="teacher/user.php" target="admin_main">老師管理</a></td>
              </tr>
              
<?php
}
if( $_SESSION["access_activity"] != 0 )
{ 
//	        <TD align="left" valign="top"><a href="activity/a_search.php" target="admin_main">相片庫管理</a></td>
//<TD align="left" valign="top"><a href="activity/activity.php" target="admin_main">相片庫管理</a></td>
?>
	        <tr><TD align="left" valign="top"><a href="activity/activity.php" target="admin_main">相片庫管理</a></td></tr>
<?php
}


if( $_SESSION["access_calendar"] != 0 )
{ 
?>
			<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php?type=T" target="admin_main">校曆管理</a></td>
			</tr>
<?php
}

		if( $_SESSION["access_news"] != 0 )
{ 
?>
			<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php?type=N" target="admin_main">通告下載管理</a></td>
			</tr>
<?php
}

		if( $_SESSION["access_calendar_s"] != 0 )
{ 
?>
			<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php?type=S" target="admin_main">最新消息管理</a></td>
			</tr>
<?php
}

		if( $_SESSION["access_calendar_h"] != 0 )
{ 
?>
<!--			<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php?type=H" target="admin_main">家課日誌</a></td>
			</tr>-->
<?php
}

		if( $_SESSION["access_calendar_p"] != 0 )
{ 
?>
			<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php?type=P" target="admin_main">傳媒報導</a></td>
			</tr>
		
            <?php 
			}
if( $_SESSION["access_file"] != 0 )
{ ?>
			<TR>
			  <TD align="left" valign="top"><a href="file/n_search.php" target="admin_main">網上檔案總管</a></td>
			</tr>
<?php
}


if( $_SESSION["access_calendar_2"] != 0 )
{ 
?>
			<TR>
			  <TD align="left" valign="top"><a href="calender_2/calendar.php?type=S" target="admin_main">金句管理</a></td>
			</tr>
<?php
}


if( $_SESSION["access_class"] != 0 )
{ 
?>
			<TR>
			  <TD align="left" valign="top"><a href="class/index.php" target="admin_main">班級管理</a></td>
			</tr>
<?php
}


if( $_SESSION["access_assignment"] != 0 )
{ 
?>
			<TR>
			  <TD align="left" valign="top"><a href="../assignment/search.php" target="admin_main">功課管理</a></td>
			</tr>
<?php
}


if( $_SESSION["access_assignment"] != 0 )
{ 
?>
			<TR>
			  <TD align="left" valign="top"><a href="video/search.php" target="admin_main">短片管理</a></td>
			</tr>
          </TABLE></td>
        </TR>
<?php
}


/*if( $_SESSION["access_calendar_2"] != 0 )
{ */
?>
     		
          </TABLE></td>
        </TR> </TABLE>
      <br>
      <TABLE width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
        <TR>
          <TD align="center" valign="top"><a href="admin_logout.php" target="_parent">登出</a></td>
        </tr>
      </TABLE>      </TD>
  </TR>
</TABLE>

<br>
</BODY>
</HTML>