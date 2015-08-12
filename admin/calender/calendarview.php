<?php   header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../admin.inc.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");







$id = $_GET[id]|0;



$query="SELECT * FROM `tbl_calendar` WHERE  `calendarid`=$id";

$result = mysql_query($query, $link_id);







if( mysql_num_rows($result) != 0 )

{

	while ($object=mysql_fetch_object($result))

	{

		// calendarid userid username date title content time classid year public schoolid

		$id=$object->calendarid;

		$serial=$object->serial;

		$title_m=$object->title;

		$content=$object->content;

		$username=$object->poster;

		$timestr =$object->posttime;

		$date =$object->date;	

		$exp_date =$object->exp_date;	

		$type_post =$object->type;			

		$link_text =$object->link_text;

		$link_url =$object->link_url;

		$new_window =$object->link_open_window;

		$file_name =$object->file_name;

		$is_news =$object->is_news;	

		$web_type =$object->web_type;

		$content =ereg_replace("\n","<BR>",$content);

	}

}









if ($type_post == "S")

{

	$type = "S";

	$title = "最新消息";

	$logo = "admin_label_news.gif";

}

else if ($type_post == "T")

{

	$type = "T";

	$title = "校曆";

	$logo = "admin_label_school.gif";

}

else

{

	$type = "N";

	$title = "通告";

	$logo = "admin_label_notice.gif";

}







?>

<html>

<head>

<title>校曆</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

</head>

<body>



<img src="<?php echo $logo?>" width="500" height="35"><BR>



<table width="650" border="0" cellspacing="0" cellpadding="5">

  <tr>

    <td>

	

	<table width="100%"  border="0" cellspacing="1" cellpadding="10">

      <tr>

        <td><font class=style8 color=red>

          <?php   if ($msg!="") echo "<br>".$msg; ?>

        </font></td>

      </tr>

    </table>

	<br>



<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class=small>

  <tr bgcolor="ECECEC"> 

    <td colspan="3">

      <span class="subHead">事件內容</span>      ( 

      <?php echo $username?>

      )</td>

  </tr>

  <tr> 

    <td width="55" bgcolor="ECECEC">日期:</td>

    <td colspan="2" bgcolor="FFFFFF">

      <?php echo $date?>

    </td>

   </tr>

<?php   if( $type == "S" ){ ?>

  <tr> 

    <td width="55" bgcolor="ECECEC">有效日期:</td>

    <td colspan="2" bgcolor="FFFFFF">

      <?php

if( $exp_date != '0000-00-00' )

	echo $exp_date

?>

    </td>

   </tr>

<?php   } ?>

<?php

if( $type == "N" )

{

?>

  <tr> 

    <td width="55" bgcolor="ECECEC">序號:</td>

    <td colspan="2" bgcolor="FFFFFF">

      <?php echo $serial?></td>

    </tr>

<?php

}

?>

  <tr> 

    <td width="55" bgcolor="ECECEC">標題:</td>

    <td colspan="2" bgcolor="FFFFFF">

      <?php echo $title_m?></td>

    </tr>

  <tr> 

    <td valign="top" bgcolor="ECECEC">內容:</td>

    <td colspan="2" valign="top" bgcolor="FFFFFF"> 

      <?php echo $content?>

    </td>

  </tr>

<?php

if( $type == "S" )

{

?>

<!--

  <tr> 

    <td valign="top" bgcolor="ECECEC">最新消息:</td>

    <td colspan="2" valign="top" bgcolor="FFFFFF"> 

      <?php   if ( $is_news == 'Y') { echo "是"; } else{ echo "否"; } ?>

    </td>

  </tr>

-->

<?php

}

?>

  <tr>

    <td valign="top" bgcolor="ECECEC">連結:</td>

    <td colspan="2" valign="top" bgcolor="FFFFFF"><?php   echo "<a href=$link_url ". ($new_window == "Y" ? "target=_blank":"") .">$link_text</a>"; ?></td>

  </tr>

  <tr>

    <td valign="top" bgcolor="ECECEC">附件:</td>

    <td width="260" valign="top" bgcolor="FFFFFF"><div align="left">

    <?php

    if ($file_name != ""){

    ?>

    <a href="../../calendar_attachment/<?php echo $file_name?>" target="_blank">下載</a>

    <?php

    }

    ?>

    </div></td>

    <td width="261" valign="top" bgcolor="FFFFFF"><div align="right">張貼日期:

          <?php echo $timestr?>

          <?php   if ($_SESSION[admin_login] == 1){ ?>

            <a href=update_cale.php?type=<?php echo $type;?>&year=<?php echo $_GET[year]?>&month=<?php echo $_GET[month]?>&id=<?php echo $_GET['id']?>>[修改]</a> 

			<a href=cale_delete.php?type=<?php echo $type?>&year=<?php echo $_GET[year]?>&month=<?php echo $_GET[month]?>&id=<?php echo $_GET['id']?> onClick="return confirm('你確定要刪除這筆資料嗎?')">[刪除]</a>

          <?php

        }

        ?></div></td>

  </tr>

</table>

</td>

  </tr>

</table>



<p><a href=calendar.php?type=<?php echo $type?>&year=<?php echo $_GET[year]?>&month=<?php echo $_GET[month]?>><small>回上一頁</small></a></p>

</body>

</html>

<?php

mysql_close();

?>