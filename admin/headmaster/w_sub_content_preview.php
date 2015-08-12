<?php



// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");













$Content_Title_BGColor = "#9A70DC";

$Content_BGColor_Ary1 = array(

	"#FFF3D7",

	"#DCFFD7",

	"#D7EDFF",

	"#FFD7D8",

);

$Content_BGColor_Ary2 = array(

	"#FFF9ed",

	"#F1FFEE",

	"#EEF9FF",

	"#FFEEEE"

);













$Learn_Content_ID = 20; // 學習領域

$content_ID = $_GET["id"]|0;



$Content_BGColor_Ary_Pointer = 0;

$sub_content_ID = $_GET["sub_id"]|0;

$sub_content_ID_def = $_GET["sub_id"]|0; // for checking, the value do not change.

$sub_content_found = false;









//*****    Get  $content_ID  by default  OR  get it from a  $sub_content_ID    *****/

if( $content_ID != 0 ) // have $content_ID

{

	if( mysql_query( "SELECT * FROM   `tbl_web_content`   WHERE  `web_content_id`=$content_ID  AND active=1 ", $link_id ) ); // $content_ID confirm.

	else // $content_ID not match.

	{

		$get_content_id_sql = "SELECT *   FROM   `tbl_web_content`   WHERE  `web_content_parent_id`=$Learn_Content_ID  AND active=1 ";

		$get_content_id_result = mysql_query( $get_content_id_sql, $link_id );

		$get_content_id_obj = mysql_fetch_object($get_content_id_result);

		$content_ID = $get_content_id_obj->web_content_id;

	}

}

else // do not contain $content_ID.

{

	if( $sub_content_ID_def == 0 ) //  just come in this page. $content_ID and $sub_content_ID are not found.

	{

		$get_content_id_sql = "SELECT *   FROM   `tbl_web_content`   WHERE  `web_content_parent_id`=$Learn_Content_ID  AND active=1 ";

		$get_content_id_result = mysql_query( $get_content_id_sql, $link_id );

	}

	else // use $sub_content_ID to get $content_ID.

	{

		if( $get_content_id_result = mysql_query( "SELECT * FROM   `tbl_web_sub_content`   WHERE  `web_sub_content_id`=$sub_content_ID_def ", $link_id ) ) // sub content id confirm.

			$sub_content_found = true;

		else // sub content id not match.

		{

			$get_content_id_sql = "SELECT *   FROM   `tbl_web_content`   WHERE  `web_content_parent_id`=$Learn_Content_ID  AND active=1 ";

			$get_content_id_result = mysql_query( $get_content_id_sql, $link_id );

		}

	}

	$get_content_id_obj = mysql_fetch_object($get_content_id_result);

	$content_ID = $get_content_id_obj->web_content_id;

}

//*****    Get end    *****/













//*****    Get  Sub_Content Object  *****/



if( ! $sub_content_found )

{

	$get_sub_content_id_sql = "SELECT *   FROM   `tbl_web_sub_content`   WHERE   `web_content_id`=$content_ID  ";

	$get_sub_content_id_result = mysql_query( $get_sub_content_id_sql, $link_id );

	if( $get_sub_content_id_obj = mysql_fetch_object($get_sub_content_id_result) )

	{

		$sub_content_ID = $get_sub_content_id_obj->web_sub_content_id;

		$sub_content_found = true;

	}

}

else

{

	$sub_content_ID = $get_content_id_obj->web_sub_content_id;

	$sub_content_found = true;

}



if( $sub_content_found )

{

	$sub_content_obj_result = mysql_query("SELECT *   FROM   `tbl_web_sub_content`   WHERE   `web_sub_content_id`=$sub_content_ID", $link_id );

	$sub_content_Obj = mysql_fetch_object( $sub_content_obj_result );



	// Get template id

	$template_ID = $sub_content_Obj->web_sub_content_template;

	// end

}



//*****    Get end    *****/



//echo $content_ID."<BR>";

//echo $sub_content_ID;

	





?>

<html>

<head>

<title>保良局馮晴紀錄小學</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style type="text/css">

<!--



body,td,th {

	font-size: 12px;

	color: #000000;

}

body {

	background-color: #FFFFFF;

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

#Layer1 {

	position:absolute;

	width:82px;

	height:78px;

	z-index:2;

}

.style1 {color: #713404}

.style2 {color: #FFFFFF;text-decoration:none;}

.style3 {color: #FFFF00;text-decoration:none;}

.style4 {

	color: #63344A;

	font-weight: bold;

}

.style5 {color: #FFFFFF}

.style7 {color: #404040; text-decoration: none; }

.style9 {color: #3300FF; text-decoration: none; }

-->

</style></head>

<body>

<!-- ImageReady Slices (intro_.PSD) -->



<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

   	<td><img src="images/learnTeach_header.jpg" width="770" height="52"></td>

  </tr>

  <tr>

    <td bgcolor="#DFEFFF"><img src="images/spacer.gif" width="20" height="20"></td>

  </tr>

  <tr>

    <td bgcolor="#93C6FF"><img src="images/spacer.gif" width="20" height="19"></td>

  </tr>

</table>

<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="173" rowspan="2" valign="top" background="images/learnTeach_menu_L_bottom.jpg" style="background-repeat:repeat-y"><table border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="173" align="left" valign="top"><img src="images/learnTeach_menu_L.jpg" width="173" height="97" alt=""></td>

        </tr>

      <tr>

        <td align="left" valign="bottom" background="images/intro_purpose_22.jpg" style="background-repeat:no-repeat"><img src="images/learnTeach_menu_L_area.jpg" width="157" height="82" alt=""></td>

        </tr><tr>

        <td align="left" valign="top" background="images/intro_purpose_10b.jpg" style="background-repeat:repeat-y"><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <?php



















//*****   Subject List Start  *****/



$content_list_sql = "SELECT * FROM `tbl_web_content` WHERE  `web_content_parent_id`=$Learn_Content_ID  AND active=1 ";

$content_list_result = mysql_query( $content_list_sql, $link_id );

$img_url = '';



while( $content_list_obj = mysql_fetch_object($content_list_result) )

{

	if( $content_list_obj->web_content_id == $content_ID )

		$img_url = $content_list_obj->img_url;



?>

          <tr>

            <td valign="top" background="images/learnTeach_menu_L_back.jpg" style="background-repeat:no-repeat"><table width="160" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td width="6%"><img src="images/spacer.gif" width="10" height="36"></td>

                  <td align="center" valign="top"><table width="70%" border="0" align="center" cellpadding="5" cellspacing="0">

                      <tr align="center" valign="middle">

                        <td width="25%"><a style="text-decoration:none" href="?id=<?php echo $content_list_obj->web_content_id?>"><img src="images/star_1.gif" width="20" height="19" border="0"></a></td>

                        <td width="75%" align="left"><a style="text-decoration:none" href="?id=<?php echo $content_list_obj->web_content_id?>"><span class="style1">

                          <?php echo $content_list_obj->web_content_name?>

                        </span></a></td>

                      </tr>

                  </table></td>

                </tr>

            </table></td>

          </tr>

          <?php



}



//*****   Subject List End  *****/



















?>

        </table></td>

        </tr>

    </table></td>

    <td width="26" style="background-repeat:no-repeat" valign="top"><img src="images/learnTeach_purple_head2.jpg" width="26" height="75"></td>

    <td width="571" background="images/learnTeach_submenu_back.jpg" style="background-repeat:no-repeat"><table width="92%" border="0" align="center" cellpadding="5" cellspacing="0">

      <tr>

        <td align="left" valign="middle"><a href="learnTeach_way.php"><span class="style9">．</span><span class="style7">課程政策</span></a></td>

        <td align="left" valign="middle"><span class="style9">．</span><span class="style7"><a href="learnTeach_course.php" class="style7">課節編排</a></span> </td>

        <td align="left" valign="middle"><span class="style9">．</span><span class="style7"><a href="learnTeach_time.php" class="style7">上課時間</a> </span></td>

        <td align="left" valign="middle"><span class="style9">．</span><span class="style7"><a href="learnTeach_estimate.php" class="style7">評估政策</a></span> </td>

        <td align="left" valign="middle"><span class="style9">．</span><span class="style7"><a href="learnTeach_area.php" class="style7">學習領域</a></span></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td colspan="2" valign="top" ><table width="577" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td width="345"><img src="images/spacer.gif" width="345" height="20"></td>

		<td width="232"></td>

      </tr>

      <tr>

        <td width="345" background="images/learnTeach_path.jpg" style="background-repeat:no-repeat">		

			<table  border="0" cellspacing="0" cellpadding="0" width="100%">

			  <tr>

			    <td><img src="images/spacer.gif" width="10" height="29"></td>

				  <td align="left" valign="middle" width="340"><a href="index.php">主頁</a> &gt;

			      <?php









$lib_content_tree_link = array();

//*****   List Content Tree Start  *****/

include("php-bin/lib_content_tree_list.php");

//*****   List Content Tree End  *****/











?></td>

			  </tr>

			</table>

		</td>

        <td width="232" rowspan="2"><img src="images/learnTeach_subheader_subject.jpg" width="232" height="80"></td>

      </tr>

      <tr>

        <td valign="bottom" width="345"><img src="images/learnTeach_subheader1.jpg" width="100%" height="51" alt=""></td>

      </tr>

    </table>

      <table width="577" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td width="10" background="images/learnTeach_border_L.jpg" style="background-repeat:repeat-y"><img src="images/spacer.gif" width="1" height="5"></td>

          <td align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="15">

              <tr>

                <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">

                  <tr height="27px">

                    <td width="12" bgcolor="#52223c"></td>

                    <td width="99%" height="27px"  valign="middle" bgcolor="<?php echo $Content_Title_BGColor?>" style="color:#FFFFFF;font-size:15px; font-weight:bold;padding-left:10"><?php



echo $sub_content_Obj->web_sub_content_title;



?></td>

                  </tr>

                  <tr height="27px">

                    <td height="27px" colspan="2" bgcolor="#EFD8E4">

					

                          <?php



//*****   Sub Content List - Start   *****/



include("php-bin/lib_content_subcontent_list.php");



//*****   Sub Content List - End   *****/







?>

</td>

                  </tr>

                </table>

                  <br>

                      <?php



//$template_ID = 1;









	// get all item for the sub_content_id

	$get_item_sql = "SELECT   *   FROM   `tbl_web_sub_content_item`   WHERE   `web_sub_content_id`=$sub_content_ID  ";

	$get_item_result = mysql_query( $get_item_sql, $link_id );

	$item_counter = 0;







	$template_ID=($_GET["tid"]!="") ? $_GET["tid"] : $template_ID ;

	//$template_ID=3;

	

	if( $template_ID == 1 )

		include("php-bin/lib_content_template1.php");

	else if( $template_ID == 2 )

		include("php-bin/lib_content_template2.php");

	else if( $template_ID == 3 )

		include("php-bin/lib_content_template3.php");

	else if( $template_ID == 4 )

		include("php-bin/lib_content_template4.php");

	else // template 5

		include("php-bin/lib_content_template5.php");

		

	?>	



                      <br>

                <p>&nbsp;</p></td></tr>

          </table></td>

          <td width="1" background="images/learnTeach_border_R.jpg" style="background-repeat:repeat-y"><img src="images/spacer.gif" width="5" height="5"></td>

        </tr>

      </table>

      <table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td><img src="images/learnTeach_border_bottom.jpg" width="576" height="29" alt=""></td>

        </tr>

        <tr>

          <td><img src="images/spacer.gif" width="500" height="20"></td>

        </tr>

      </table></td>

  </tr>

</table>

<?php

include_once("php-bin/lib_fooder.php");

?>

<div id="layerMenu"  style="position:absolute; top:0px; width:100%; height:94px; z-index:1; visibility: visible;">

  <div align="center">

    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="770" height="94">

      <param name="movie" value="flash/menu.swf">

      <param name="quality" value="high">

      <param name="wmode" value="transparent">

      <embed src="flash/menu.swf" width="770" height="94" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" ></embed>

    </object>

  </div>

</div>



<!-- End ImageReady Slices -->

</body>

</html>

<?php

mysql_close();

?>