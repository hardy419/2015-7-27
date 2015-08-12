<?php

header("Content-Type:text/html;charset=utf-8"); 

// admin checking

require_once("../../php-bin/admin_check.php");



// access control checking

require_once("z_access_control.php");



// Connect Database

require_once("../../php-bin/function.php");











$content_ID = $HeadMaster_WebContent_ID;

$select_index_ary = array();















if( $content_ID != 0 )

{

	// init split pages

	$All_Result_Count = 0; // how many match record "match the request".

	$PageSize = 2;  // how many record per page.

	$nowPage = 0;   // what pape is the user in.

	$Pages = 0;     // how many pages.  Pages=match_Record_Count/PageSize

	

	

	

	// To Check how many record "match the request".

	$search_SQL = "SELECT * FROM    tbl_web_sub_content    WHERE    web_content_id=". $HeadMaster_WebContent_ID ."    AND    web_content_id=". $content_ID;

	$All_Result = mysql_query( $search_SQL, $link_id );

	

	if ( ! $All_Result )

		$msg = str_replace(" ", "+", "Query failed: " . mysql_error($link_id));

	

	

	

	/***   Split Page   ***/

	

	$nowPage  = $_GET["p"]|0;

	$All_Result_Count = mysql_num_rows($All_Result);

	$Pages = ceil( $All_Result_Count / $PageSize );

	if( $Pages == 0 )

		$Pages = 1;

	

	if( $nowPage > $Pages )

		$nowPage = $Pages;

	if( $nowPage <= 0 )

		$nowPage = 1;

	

	/***   Split Page END  ***/



}


?>

<html>

<head>

<title>網頁製作管理 - 新增主題</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<style type="text/css">

<!--

.style2 {color: #006699}

.style4 {color: #006600}

.style5 {color: #666666}

.style6 {color: #000000}

-->

</style>

</head>











<script language="javascript" src="../../js/function.js"></script>

<SCRIPT LANGUAGE="JavaScript">



Link_to_ID = 0;

Learn_Teach_ID = <?php echo $HeadMaster_WebContent_ID?>;

Now_Sub_Content_ID = 0;





</SCRIPT>

<script language="javascript" src="w_request.js"></script>

<script language="javascript" src="w_function.js"></script>

























<body>

<img src="admin_label.gif" width="500" height="35"><br>

<table width="650" border="0" align="left" cellpadding="5" cellspacing="0" class="small">

<form action="w_sub_content_add_process.php" method="post" name="form1" id="form1" style="border:0" onSubmit="return Submit_Form(document.form1.id)">

  <tr> 

    <td>

      <table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td width="200"><span class="style2"><span class="style4">校長專頁</span>：</span></td>

          <td width="100"><a href="w_search.php" >搜尋校長專頁</a></td>

          <td width="100"> <a href="w_sub_content_add.php" >新增主題</a></td>

          <td>&nbsp;</td>

        </tr>

      </table>

      <hr style="height:1px;color=ECECEC;">





<table border="0" cellpadding="5" cellspacing="0" bgcolor="CCCCCC">

        <tr align="left" valign="middle" bgcolor="#FFFFFF">

          <td><span class="style2"><span class="subHead">新增主題</span>：</span></td>

        </tr>

      </table>

      <hr style="height:1px;color=ECECEC;">

      <table width="100%" border="0" cellpadding="5" cellspacing="1" class="small">

        <tr align="center" valign="middle">

          <td width="102" align="left" bgcolor="#FFFFFF"><span class="style6">是否為內頁:</span></td>

          <td align="left" bgcolor="#FFFFFF">

			<select name="w_hidden" id="w_hidden" onChange="Change_Link_To()"><option value="0" selected>否</option><option value="1">是</option></select><div id="layer_link_to"  style="visibility:hidden;" ><select name="link_to"><?php

?></select> 的內頁</div>          </td>

          <td width="60" align="right" bgcolor="#FFFFFF" >排序:<BR>(小排前)</td>

          <td width="40" align="left" bgcolor="#FFFFFF" ><input name="w_order" type=text class="style8" id="w_order" value="10" size="10" maxlength="3"></td>

        </tr>

        <tr align="center" valign="middle">

          <td align="left" bgcolor="#FFFFFF"><span class="style6">主題:</span></td>

          <td colspan="3" align="left" bgcolor="#FFFFFF"><input name="w_title" id="w_title" value="" size="60" maxlength="40"></td>

        </tr>

        <tr align="center" valign="middle" id="tem_layer" name="tem_layer">

          <td align="left" bgcolor="#FFFFFF"><span class="style6">樣式 :</span></td>

          <td colspan="3" align="left" bgcolor="#FFFFFF"><table border="0" cellspacing="0" cellpadding="3">

            <tr>

              <td align="center" valign="top"><img src="t_ico_1.gif" width="78" height="58" border="1"></td>

              <td align="center" valign="top"><img src="t_ico_2.gif" width="78" height="58" border="1"></td>

              <td align="center" valign="top"><img src="t_ico_3.gif" width="78" height="58" border="1"></td>

              <td align="center" valign="top"><img src="t_ico_4.gif" width="78" height="58" border="1"></td>

              <td align="center" valign="top"><img src="t_ico_5.gif" width="78" height="58" border="1"></td>

            </tr>

            <tr>

              <td align="center" valign="top"><input name="w_template" type="radio" value="1">

                1</td>

              <td align="center" valign="top"><input name="w_template" type="radio" value="2">

                2</td>

              <td align="center" valign="top"><input name="w_template" type="radio" value="3">

                3</td>

              <td align="center" valign="top"><input name="w_template" type="radio" value="4" checked>

                4</td>

              <td align="center" valign="top"><input name="w_template" type="radio" value="5">

                5</td>

            </tr>

          </table>

            </td>

        </tr>

        <tr align="center" valign="middle">

          <td align="left" bgcolor="#FFFFFF">描述:</td>

          <td colspan="3" align="left" bgcolor="#FFFFFF"><textarea name="w_description" cols="58" rows="5" id="w_description"></textarea></td>

        </tr>

        <tr align="center" valign="middle">

          <td align="left" bgcolor="#FFFFFF">&nbsp;</td>

          <td colspan="3" align="left" bgcolor="#FFFFFF"><span style="position:relative; left:150">

            <input type="submit" value="新增"> &nbsp; &nbsp;

            <input type="reset" value="重設"> &nbsp; &nbsp;

            <input type="button" value="返回" onClick="history.go(-1)">

          </span>       

        </tr>

      </table>

    </td>

  </tr>

</form>

</table>

</body>



<script language="javascript" defer>

init( );

</script>



</html>

<?php

mysql_close();

?>