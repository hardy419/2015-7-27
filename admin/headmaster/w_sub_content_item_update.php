<?php



// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");















$item_ID = $_GET["id"]|0;

$content_ID = 0;

$sub_content_ID = 0;

$content_Name = "";

$content_URL = "";





$search_SQL = "

SELECT * FROM    tbl_web_sub_content_item  AS i

  LEFT JOIN    tbl_web_sub_content   AS sc    ON (sc.web_sub_content_id=i.web_sub_content_id)

  LEFT JOIN    tbl_web_content   AS c    ON (c.web_content_id=sc.web_content_id)

WHERE    i.web_sub_content_item_id =". $item_ID;



$search_Result = mysql_query( $search_SQL, $link_id );

if( mysql_num_rows($search_Result) > 0 )

{

	$search_Obj = mysql_fetch_object($search_Result);

	$content_ID = $search_Obj->web_content_id;

	$sub_content_ID = $search_Obj->web_sub_content_id;

	$content_Name = $search_Obj->web_content_name;

	$content_URL = $search_Obj->url;

}

















?>

<html>

<head>

<title>網頁製作管理</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<script language="JavaScript" type="text/javascript" src="../../js/function.js"></script>



<LINK rel="stylesheet" href="../../js/calendar.css" type="text/css">

<script language="JavaScript" src="../../js/calendarevents.js" type="text/javascript"></script>

<script language="JavaScript" src="../../js/calendar.js" type="text/javascript"></script>

<script language="JavaScript" src="../../js/calendar-en.js" type="text/javascript"></script>



<script language="javascript" type="text/javascript" src="../../js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script language="javascript" type="text/javascript">

	tinyMCE.init({

		language : "zh_tw",

		mode : "textareas",

		theme : "advanced",

		//plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print,contextmenu,paste,directionality,fullscreen",

		plugins : "table,save,advhr,advimage,advlink,emotions,insertdatetime,preview,zoom,flash,searchreplace,print,contextmenu,paste,directionality,fullscreen",



		// by david

		//convert_newlines_to_brs : true,

		force_br_newlines  : true,

		object_resizing : false,

		theme_advanced_buttons3 : "removeformat,visualaid,separator,sub,sup,separator,charmap",





		theme_advanced_buttons1_add_before : "save,newdocument,separator",

		theme_advanced_buttons1_add : "fontselect,fontsizeselect,separator,fullscreen",

		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom",

		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",

		theme_advanced_buttons3_add_before : "tablecontrols,separator",

		//theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",

		theme_advanced_buttons3_add : "emotions,flash,advhr,separator,print,separator,ltr,rtl,separator,forecolor,backcolor",



		theme_advanced_toolbar_location : "top",

		theme_advanced_toolbar_align : "left",

		theme_advanced_statusbar_location : "bottom",

		content_css : "example_word.css",

	    plugi2n_insertdate_dateFormat : "%Y-%m-%d",

	    plugi2n_insertdate_timeFormat : "%H:%M:%S",

		external_link_list_url : "example_link_list.js",

		external_image_list_url : "example_image_list.js",

		flash_external_list_url : "example_flash_list.js",

		file_browser_callback : "fileBrowserCallBack",

		paste_use_dialog : false,

		theme_advanced_resizing : true,

		theme_advanced_resize_horizontal : false,

		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",

		paste_auto_cleanup_on_paste : true,

		paste_convert_headers_to_strong : false,

		paste_strip_class_attributes : "all",

		paste_remove_spans : false,

		paste_remove_styles : false		

	});



	function fileBrowserCallBack(field_name, url, type, win) {

		// This is where you insert your custom filebrowser logic

		alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);



		// Insert new URL, this would normaly be done in a popup

		win.document.forms[0].elements[field_name].value = "someurl.htm";

	}

</script>

<script>



function preview_sub_content()

{

	document.RTEDemo.action = "../../<?php echo $content_URL?>?sub_id=<?php echo $sub_content_ID ?>#<?php echo $item_ID?>";

	document.RTEDemo.target = "_blank";

	document.RTEDemo.submit();



	document.RTEDemo.target = "";

	document.RTEDemo.action = "w_sub_content_item_update_process.php";

}

</script>

<style type="text/css">

<!--

.style6 {color: #000000}

-->

</style>

</head>

<body>



<style type="text/css">

<!--

.style2 {color: #006699}

.style4 {color: #006600}

.style6 {color: #000000}

-->

</style>

</head>

<body>

<img src="admin_label.gif" width="500" height="35"><br>



<table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="small">

<form name="RTEDemo" action="w_sub_content_item_update_process.php" method="post" onSubmit="return submitForm();" enctype="multipart/form-data">

  <tr> 

    <td >

      <table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td width="200"><span class="style2"><span class="style4">校長專頁</span>：</span></td>

          <td width="100"><a href="w_search.php" >搜尋校長專頁</a></td>

          <td width="100"> <a href="w_sub_content_add.php" >新增主題</a></td>

          <td width="100">&nbsp;</td>

        </tr>

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td width="200">&nbsp;</td>

          <td width="100"><a href="w_sub_content_update.php?id=<?php echo $sub_content_ID ?>">更改主題樣式</a></td>

          <td width="100"><a href="w_sub_content_item_add.php?id=<?php echo $Result_Obj->web_sub_content_id; ?>">新增標題</a> </td>

          <td width="100"><a href="w_gallery.php?id=<?php echo $item_ID?>">圖片管理</a></td>

        </tr>

      </table>

      <hr style="height:1px;color=ECECEC;">



<table border="0" cellpadding="5" cellspacing="0" bgcolor="CCCCCC">

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td><span class="subHead">更改標題</span> : <?php



















//*****   List Content Tree Start  *****/

$select_index_Parent_ID = $content_ID;



include("w_list_tree.php");



$select_index_Ary[] = "<a href='w_sub_content.php?id=".$search_Obj->web_sub_content_id."'>".$search_Obj->web_sub_content_title."</a>";

if( $search_Obj->web_sub_content_item_title == "" )

	$select_index_Ary[] = '[更新:] (標題為空)';

else

	$select_index_Ary[] = '[更新:] '.$search_Obj->web_sub_content_item_title;



echo implode( $select_index_Ary, " > " );

//*****   List Content Tree End  *****/

// <a href="">首頁</a> > <a href="">學與教</a> > <a href="">學習領域</a> > <a href="">中文</a> >  <a href="">學習目標</a>

















?></td>

          </tr>

      </table>



      <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="CCCCCC" class="small" >

        <tr align="center" valign="middle">

          <td width="80" bgcolor="#FFFFFF"><span class="style6">標題:</span></td>

          <td align="left" bgcolor="#FFFFFF">&nbsp;

            <input name="item_title" id="item_title" style="position:relative;left:-5" value="<?php echo $search_Obj->web_sub_content_item_title;?>" size="40" maxlength="40"></td>

          <td width="150" rowspan="2" align="left" bgcolor="#FFFFFF"><div align="center"><a href="#" onClick="preview_sub_content()">預覽</a></div>            <div align="center"></div></td>

        </tr>

        <tr align="center" valign="middle">

          <td width="80" bgcolor="#FFFFFF"><span class="style6">日期:</span></td>

          <td align="left" bgcolor="#FFFFFF"><input name="item_year" type="text" size="4" maxlength="4" class="style8" value="<?php echo substr($search_Obj->date, 0,4)?>">

      -

      <input name="item_month" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($search_Obj->date, 5,2)?>">

      -

	  <input name="item_day" type="text" size="2" maxlength="2" class="style8" value="<?php echo substr($search_Obj->date, 8,2)?>">

&nbsp;<img src="../../images/calendar.gif" alt="calendar" border="0" onClick="showCalendar('item_year','item_day','item_month','item_year','d m y')">&nbsp; YYYY-MM-DD</td>

          </tr>

  <tr align="center" valign="middle">

    <td bgcolor="#FFFFFF"><span class="style6">背景圖:</span></td>

    <td align="left" bgcolor="#FFFFFF">

        <input name="photo[]" type="file" id="photo[]" >

        <?php







if( $search_Obj->bg_img!='' && file_exists("../../gallery_sub_content/".$search_Obj->bg_img) )

{

	echo '<BR><font color=red>(你目前已上載背景圖 <a href="w_sub_content_item_delete.php?id='. $search_Obj->web_sub_content_item_id .'&action=2" >刪除檔案</a> )</font><BR><img src="../../gallery_sub_content/'.$search_Obj->bg_img.'">';

}







?></td>

    <td align="center" valign="middle" bgcolor="#FFFFFF">排序: 

      <input name="item_order" size="3" value="<?php echo $search_Obj->web_sub_content_item_order?>">(小排前)</td>

  </tr>

<?php













$sub_content_sql = "SELECT * FROM    tbl_web_sub_content    WHERE    web_sub_content_inner=".$search_Obj->web_sub_content_id."    AND   web_sub_content_inner!=0    ORDER BY   web_sub_content_order ASC ";

$sub_content_result = mysql_query($sub_content_sql, $link_id);





if( mysql_num_rows($sub_content_result) > 0 )

{

	?>

  <tr align="left" valign="middle">

    <td colspan="3" bgcolor="#ECECEC">

      <span class="style6">內頁:</span></td>

  </tr>

  <tr align="left" valign="middle">

    <td colspan="3" bgcolor="#FFFFFF"><?php



$temp_count = 0;

while( $obj = mysql_fetch_object($sub_content_result) )

{

	if( $temp_count++%5==0 && $temp_count!=1 )

		echo '<table height="1" style="table-layout:fixed"><tr><td></td></tr></table>';

	?>(<a href="javascript:Link_Copy('learnTeach_area.php?sub_id=<?php echo $obj->web_sub_content_id ?>')" >按此複製連結</a>) &nbsp; (<a href="w_sub_content.php?id=<?php echo $obj->web_sub_content_id ?>">更改</a>) &nbsp; <?php echo $obj->web_sub_content_title ?><BR><?php

}







?></td>

  </tr>

	<?php



}











?>



  <tr align="left" valign="middle">

    <td colspan="3" bgcolor="#ECECEC">

      <span class="style6">內容:</span>

    </td>

  </tr>

  <tr align="left" valign="middle" height="300">

    <td colspan="3" bgcolor="#FFFFFF">

<textarea id="elm1" name="elm1" rows="15" style="width:100%"><?php



$original_char_ary = array("'", chr(13).chr(10));

$change_char_ary   = array("&#039;","");



echo str_replace($original_char_ary, $change_char_ary, $search_Obj->web_sub_content_item_html);



?></textarea>

      <table width="96%"  border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td align="right">

              <input type="submit" name="save" value="確定更改"> &nbsp;

              <input type="reset" value="重設"> &nbsp;

              <input type="button" onClick="history.go(-1)" value="返回">

              <input type="hidden" name="sub_content_id" value="<?php echo $sub_content_ID ?>">

              <input type="hidden" name="item_id" value="<?php echo $item_ID ?>">

              <input type="hidden" name="is_preview" value="1">

            </td>

          </tr>

      </table></td>

    </tr>

  <tr align="left" valign="middle">

    <td colspan="3" bgcolor="#ECECEC">

      <span class="style6">檔案上載:</span>

    </td>

  </tr>

  <tr align="center" valign="middle">

    <td colspan="3" bgcolor="#FFFFFF">

      <iframe frameborder="0" allowtransparency="true" width="100%" height="300" src="file_upload.php?id=<?php echo $item_ID?>"  ></iframe>

    </td>

  </tr>

      </table></td>

  </tr>

</form>

</table>





</body>

</html>

<?php

mysql_close();

?>