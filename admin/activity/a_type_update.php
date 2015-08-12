<?php

header("Content-Type:text/html;charset=utf-8"); 

require_once("../../admin.inc.php");



// Connect Database

require_once("../../php-bin/function.php");



// access control checking

require_once("z_access_control.php");















$type_id =  $_GET['id']|0;

$type_name = "";

$type_order = 0;







$selected_result = mysql_query( " SELECT *  FROM  tbl_activity_type    WHERE   type_id =".$type_id, $link_id );

if( $selected_obj = mysql_fetch_object($selected_result) )

{

	$type_name = $selected_obj->type_name;

	$type_order = $selected_obj->type_order;

}



















?>

<html>

<head>

<title>網頁製作管理 - 類別管理</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">

<style type="text/css">

<!--

.style2 {color: #006699}

.style4 {color: #006600}

.style5 {color: #666666}

-->

</style>

</head>

</head>

<body>





<script language="javascript">

function Update_Form( submit_type, value )

{

	document.update_method.submit_type.value = submit_type;



	if( submit_type==0 || submit_type==1 )

	{

		if( value != "" )

			document.update_method.check_submit.value = 1;

	}

	if( submit_type==2 && document.update_method.type_id.value!="0" )

	{

		if( window.confirm('你確定要刪除這類別嗎?') )

			document.update_method.check_submit.value = 1;

	}

}





function Submit_Check()

{

	if( document.update_method.check_submit.value != "0" )

		return true;

	return false;

}

</script>

<img src="admin_label.gif" width="500" height="35"><BR>

<table width="650" border="0" cellpadding="10" cellspacing="1" class="small">

         <tr align="left" valign="top" bgcolor="#FFFFFF">

          <td width="26%"><span class="style2"><span class="subHead">新增活動記錄</span>：</span></td>

          <td width="32%"><a href="activity_add.php" class="style8">新增活動記錄資料</a></td>

          <td width="42%"><a href="a_type_update.php" class="style8">類別管里</a></td>

  </tr>

</table>

      <table width="441" border="0" cellpadding="5" cellspacing="1"  bgcolor="#CCCCCC">

        <form action="a_type_update_process.php" method="post" name="update_method" id="update_method" style="border:0" onSubmit="return Submit_Check();">

          <?php

if( $_GET["msg"] )

{





?>

          <tr align="center" valign="middle" bgcolor="#FFFFFF">

            <td colspan="3" ><?php echo $_GET["msg"]?></td>

          </tr>

<?php

}

?>

          <tr valign="middle" bgcolor="#FFFFFF">

            <td width="94">類別:</td>

            <td width="150"><select name="type_id" id="type_id" onChange="location='?id='+this.options[this.selectedIndex].value">

              <option value="0"></option>

              <?php







$get_type_result = mysql_query( " SELECT *  FROM  tbl_activity_type   ORDER BY  type_order  ASC ", $link_id );

while( $type_obj = mysql_fetch_object($get_type_result) )

{

	if( $type_id == $type_obj->type_id  )

		echo '<option value="'. $type_obj->type_id  .'" selected>'. $type_obj->type_name  .'</option>';

	else

		echo '<option value="'. $type_obj->type_id  .'">'. $type_obj->type_name  .'</option>';

}







?>

            </select></td>

            <td align="center"><input name="submit" type="submit" onClick="Update_Form(2, document.update_method.type_id.value)" value="刪除"></td>

          </tr>

          <tr valign="middle" bgcolor="#FFFFFF">

            <td align="right">[類別名]</td>

            <td><input name="type_name" id="type_name" size="15" maxlength="15" value="<?php echo $type_name?>"></td>

            <td align="center">

              <input name="submit" type="submit" onClick="Update_Form(0, document.update_method.type_name.value)" value="新增">

&nbsp; &nbsp;

        <input name="submit" type="submit" onClick="Update_Form(1, document.update_method.type_name.value)" value="更改">        </td>

          </tr>

          <tr valign="middle" bgcolor="#FFFFFF">

            <td align="right">[排序]<BR>(小排前)</td>

            <td><input name="type_order" id="type_order" size="15" maxlength="15" value="<?php echo $type_order?>"></td>

            <td align="center">

        <input type="hidden" name="submit_type">

        <input type="hidden" name="check_submit" value=0>            </td>

          </tr>

        </form>

</table>

</body>







</html>



