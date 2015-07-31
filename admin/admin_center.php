<?PHP
session_start();

error_reporting(0);

require_once("../php-bin/teacher_check.php");

$_SESSION['not_admin_cp'] = 0;
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
<BODY leftmargin="10" topmargin="0" marginwidth="0" marginheight="0">
<TABLE border="0" cellpadding="0" cellspacing="0" class="table1">
  <TR> 
    <TD align="center" valign="top" >  <TABLE width="150" border="0" cellpadding="3" cellspacing="1" bgcolor="CCCCCC">
        <TR> 
          <TD height="32" align="center" valign="middle" bgcolor="CCCCCC"><TABLE width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
            <?PHP if ($_SESSION[admin_level] == 1){ ?>
            <?PHP 		  
            }
            ?>
  <TR>
    <TD align="left" valign="top">請選擇下列項目 </td>
  </tr>
          </TABLE>          </TD>
        </TR>
        <tr> 
          <td valign="top" bgcolor="#ECECEC" ><TABLE width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
			<TR>
			  <TD align="left" valign="top"><a href="parent_notice/c_parent.php" target="admin_main">網上檔案總管</a></td>
			</tr>
			<TR>
			  <TD align="left" valign="top"><a href="calender/news_others.php" target="admin_main">最新消息</a> </td>
			  </tr>
			  <TR>
                <TD align="left" valign="top"><a href="teacher/user.php" target="admin_main">老師管理</a></td>
              </tr>
			<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php" target="admin_main">行事曆</a> </td>
			</tr>

              <?PHP if ($_SESSION[admin_level] == 1){ ?>
			  <!--TR>
                <TD align="left" valign="top"><a href="teacher/user.php" target="admin_main">老師管理</a></td>
              </tr>
             <TR>
                <TD align="left" valign="top"><a href="student/user.php" target="admin_main">學生管理</a></td>
              </tr>
             <TR>
                <TD align="left" valign="top"><a href="parent/user.php" target="admin_main">家長管理</a></td>
              </tr>
              <TR>
                <TD align="left" valign="top"><a href="class/index.php" target="admin_main">班別管理</a>
                </td>
              </tr-->
			 
              <?PHP 		  
            }
            ?>
			<!--tr>
	        <TD align="left" valign="top"><a href="activity/activity.php" target="admin_main">相片庫管理</a></td>
	        </tr>
			<TR>
              <TD align="left" valign="top"><a href="apply/apply.php" target="admin_main">網上報名</a></td>
	        </tr>
			<TR>
			  <TD align="left" valign="top"><a href="school_calendar/school_calendar.php" target="admin_main">校曆表</a> </td>
			</tr>
			<TR>
			  <TD align="left" valign="top"><a href="calender/calendar.php" target="admin_main">行事曆</a> </td>
			</tr>
			<TR>
			  <TD align="left" valign="top"><a href="calender/news_others.php" target="admin_main">最新消息</a> </td>
			  </tr>
			<TR>
			  <TD align="left" valign="top"><a href="calender/banner.php" target="admin_main">焦點消息（主頁Banner管理）</a> </td>
			  </tr>
			<TR>
			  <TD align="left" valign="top"><a href="parent_notice/c_parent.php" target="admin_main">網上檔案總管</a></td>
			</tr>
			<TR>
			  <TD align="left" valign="top"><a href="javascript:;" target="admin_main">學生報在「網上檔案總管」中添加</a></td>
			</tr>
			<TR>
			  <TD align="left" valign="top"><a href="development/development.php" target="admin_main">專業發展及專題研習</a></td>
			  </tr-->
			<!--TR>
			  <TD align="left" valign="top"><a href="student_work/main.php" target="admin_main">學生作品管理</a> </td>
			</tr-->
			<!--TR>
			  <TD align="left" valign="top"><a href="homework/index.php" target="admin_main">家課管理</a></td>
			</tr-->
			<!--TR>
			  <TD align="left" valign="top"><a href="forum/gr_group.php" target="admin_main">留言版管理</a> </td>
			</tr-->
          </TABLE></td>
        </TR>
      </TABLE>
      <br>
      <TABLE width="90%" border="0" align="center" cellpadding="5" cellspacing="0">
        <?PHP if ($_SESSION[admin_level] == 1){ ?>
        <?PHP 		  
            }
            ?>
        <TR>
          <TD align="center" valign="top"><a href="admin_logout.php" target="_parent">登出</a></td>
        </tr>
      </TABLE>      </TD>
  </TR>
</TABLE>

<br>
</BODY>
</HTML>
