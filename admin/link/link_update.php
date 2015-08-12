<?php
header("Content-Type:text/html;charset=utf-8"); 

// Connect Database

require_once("../../php-bin/function.php");


$link_fid=$_GET["id"];

$get_sql="select * from tbl_link where link_id=$link_fid order by link_id desc";

$sql_result=mysql_query($get_sql,$link_id);

while($get_data=mysql_fetch_array($sql_result)){

	$link_name=$get_data["link_name"];

	$link_sort=$get_data["link_sort"];

	$link_address=$get_data["link_address"];
	$link_logo=$get_data["link_logo"];
	$link_remark=$get_data["link_remark"];

	$link_id=$get_data["link_id"];
	$type=$get_data['link_type'];

	}

	

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>常用網站管理</title>



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



</head>

<body>

<span class="title">常用網站管理</span><BR>

<table width="650" border="0" cellpadding="10" cellspacing="1" class="small">

        <tr align="left" valign="top" bgcolor="#FFFFFF">

          <td width="30%" height="35" class="style2"><span class="style4">常用網站管理</span>：</td>

          <td width="20%"><a href="link.php">搜索網頁</a></td>

          <td width="20%"><a href="link_add.php">新增常用網站</a></td>

         

        </tr>

</table>

<table width="650" border="0" cellpadding="5" cellspacing="1">

  <tr >

    <td width="100%" >

      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">

      <tr valign="top">

        <td colspan="4" bgcolor="ECECEC"><font class="style4">新增常用網站資料</font> </td>

        </tr>

        <form method="POST" name="add_link" action="link_update_process.php?action=update" onSubmit="return check_valid();" enctype="multipart/form-data">

		 <tr>

            <td height="18" valign="top" bgcolor="#FFFFFF">序號:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="link_sort" type=text class="style8" id="link_sort" size="40" value="<?php echo $link_sort; ?>"> <font color="#FF0000">* </font></td>

          </tr>

		 <tr>
             <td height="18" valign="top" bgcolor="#FFFFFF">序號:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF">
               <select name="link_type">
                 <option value="1" <?php if($type==1){?>selected='selected'<?php }?>>重點發展計劃</option>
                 <option value="2" <?php if($type==2){?>selected='selected'<?php }?>>常用教育網站</option>
               </select>
            <font color="#FF0000">* </font></td>
		  </tr>

          <tr>

            <td width="128" height="18" bgcolor="#FFFFFF">網頁名稱:</td>

            <td width="425" height="18" colspan="3" bgcolor="FFFFFF"><input name="link_name" id="link_name" type=text class="style8" size="40" value="<?php echo $link_name; ?>">

            <font color="#FF0000">* </font></td>

          </tr>

          <tr>

            <td height="18" bgcolor="#FFFFFF">常用網站網址:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><input name="link_address" id="link_address" type=text class="style8" size="40" value="<?php echo $link_address; ?>">

              <font color="#FF0000">* </font>格式：http://www.abc.com</td>

          </tr>
          <tr>

            <td height="18" bgcolor="#FFFFFF">網站LOGO:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><input type="file" name="link_logo" id="link_logo" style="display:none" onChange="document.add_link.link_pic1.value=this.value">
         <input name="link_pic1" type="text" id="link_pic1" size="25" value=""><input type="button" size="20" value="瀏覽文件" onClick="document.add_link.link_logo.click();"><?php if($link_logo!=""){?><br><img src="../../userfiles/upload/<?php echo $link_logo; ?>" height="68" width="180" /><?php }?></td>

          </tr>
          <tr>

            <td height="18" bgcolor="#FFFFFF">簡介:</td>

            <td height="18" colspan="3" bgcolor="FFFFFF"><textarea name="link_remark" cols="40" rows="4" class="style8" id="link_remark"><?php echo $link_remark; ?></textarea></td>

          </tr>

         

          <tr bgcolor="#ECECEC">

            <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="16%">&nbsp;</td>

                <td width="84%"><input name="submit" type="submit" class="style8" value="    確定新增    ">

                  &nbsp;

                  <input type="reset" value="重設"> &nbsp;

                  <input type="button" id="back" onClick="history.go(-1)" value="返回">

				 

				  <input type="hidden" name="id" id="id" value="<?php echo $link_id ?>">

				  </td></tr>

            </table>            </td>

          </tr>

        </form>

    </table></td>

  </tr>

</table>

</body>

</html>
