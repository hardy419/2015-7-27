<?php 
header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");
require_once("gallery_selection.php");

// Used to pass type_id to photo_add.php & when click back
$type = mysql_escape_string ($_GET['type']);

$record = mysql_fetch_object($get_result3);

access_detail_check( $record->type_id );

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>活動記錄管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style5 {color: #666666}
-->
</style>
<script language="javascript">
<!--
function PhotoAdd() {
	document.gallery.action="photo_add.php?type=<?PHP echo $type; ?>";
}


function Delete_Photo(file_name) {
	if ( confirm('你確定要刪除這張相片嗎?') ) {
		location='photo_delete_process.php?file_name='+file_name+'&id=<?php echo $_GET[id];?>';
	}
}

function MM_openBrWindow(theURL,winName,features) {
  window.open(theURL,winName,features);
}

function mutiupload(theURL,winName,features) {
  window.open("mutiupload/index.php?id=<?php echo $_GET[id];?>","mutiupload_win","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=1,resizable=no,width=800,height=600,top=50,left=50");
}
-->
</script>


</head>
<body>

<p class="title">活動記錄圖片管理</p><table width="650"  border="0" cellpadding="5" cellspacing="0">

  <tr>
    <td><br>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" >
        <tr align="left" valign="top">
          <td bgcolor="#FFFFFF"><span class="subHead">
       <?php echo $get_rows[1]?>  ：        </span></td>
        <td align="right" nowrap bgcolor="#FFFFFF"> 共有
              <?php echo $total_record?> 張相片      &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 每頁
        <?php echo $record_per_page?>
        個 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 分
        <?php echo $total_page?>
        頁顯示 </td>
        </tr>
      </table>
    </td>
    <td valign="bottom"><p><a href="#" onClick="mutiupload();return false;">使用Flash組件上傳多張圖片</a></p></td>
  </tr>
  <tr>
    <td valign="top">
	  <table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
	 


<?php
$i = 0; 
$j=5;
while ($get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)) { 
	$j--;
		if ($i%5 == 0) 
		{
		
		echo '<tr>';
		}
		?>
	<td align="left" valign="top" >
		
		<!--table-1 start-->
		<table border=0 cellpadding="5" cellspacing="1" bgcolor="CCCCCC" style="table-layout:fixed" >
		<tr><td align="center" valign="middle" bgcolor="ECECEC" width="90" height="69">
		<a href="../../gallery_activity/<?php echo $get_rows[file_name];?>" target="_blank">
		<img border="0" src="../../gallery_activity/thumb<?php echo $get_rows[file_name];?>" alt="<?php echo $get_rows[remark];?>" width="90" height="60.75">
		</a>
		</td>
		</tr>
		<tr>
		<td bgcolor="ECECEC" width="100%">
				<!--table-2 start-->
				<table width="100%" border=0 cellpadding="0" cellspacing="0">
				<tr valign="top">
				<td align="left"><a href="javascript:MM_openBrWindow('pop_window.php?id=<?php echo $get_rows[file_name]?>','view','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=350,height=190,top=50,left=50')"><font color=#666666>修改</font></a><!--font color=#CCCCCC>(<?php echo $i+1?>)</font>-->&nbsp;</td>
				<td align="right"><a href="javascript:Delete_Photo('<?php echo $get_rows[file_name]?>');"><font color=#666666>刪除</font></a></td>
				</tr>
				</table>
				<!--table-2 end-->
	
		</td>
		</tr>
		</table>
		<!--table-1 end-->
		
		
	</td>
	<?php
	$i++;		
	if ( $i%5 == 0) {
	$j=5;
	echo '</tr>';
	}	
}
//end while

//補回沒有相片的 td
if($j<5)
{
	for ($k=0;$k<$j;$k++)
	{
	//放入透明圖片頂位
	//echo "<td align=center valign=top  bgcolor=ECECEC><table border=0 cellpadding=5 cellspacing=1 ><tr><td><img src=../../images/trans.gif border=0 width=90></td></tr></table></td>";
	?>
	<!--table-1 start-->
		<td align=center valign=top>
		<table border=0 cellpadding="5" cellspacing="1" bgcolor="CCCCCC">
			<tr>
				<td bgcolor="ECECEC"><img src="../../images/trans.gif" border="0" width="90" height="69">	</td>
			</tr>
			<tr><td bgcolor="ECECEC">&nbsp;</td></tr>
		</table>
		<!--table-1 end-->
	<?php
	}
	
	
	
}
?>
			
      <?php   if (mysql_num_rows($get_result)==0){ ?>
      <tr>
	  	<td colspan="5" align="center">
        	<font color=red style="font-size:12px">現時沒有相片</font>
      	</td>
	  </tr>
	  <?php   } ?>
	  
    </table>
</td>
    <td width="150" rowspan="2" valign="top">
	


<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#ECECEC" >
					<form action="" enctype="multipart/form-data" method="post" name="gallery">
					<tr align="left" valign="top" bgcolor="#FFFFFF" >
					<td><span class="subHead">上載相片：</span></td>
					</tr>
<?php for($i=0;$i<5;$i++) { ?>	
<tr bgcolor="#FFFFFF"><td>
	<table>
		<tr valign="middle"><td align="left">相片描述:</td>
		<td align="right">排序:
		  <input name="order[]" id="order[]" size="3" value="100"></td></tr>	
		<tr><td colspan="2"><textarea name="remark[]" id="remark[]"  cols="22" rows="2"></textarea></td></tr>	
		<tr><td colspan="2"><input type="file" name="photo[]" id="photo<?php echo $i;?>" style="display:none" onChange="document.gallery.link_pic<?php echo $i;?>.value=this.value">
         <input name="link_pic<?php echo $i;?>" type="text" id="link_pic<?php echo $i;?>" size="25" value=""><input type="button" size="20" value="瀏覽文件" onClick="document.gallery.photo<?php echo $i;?>.click();">
       </td></tr>
	</table>

</td></tr>
<?php   } ?>
					<tr bgcolor="#FFFFFF">
					<td valign="top"><input name="id" type="hidden" id="id" value="<?php echo $_GET["id"];?>">
					<input type="submit" name="Submit3" value="確定上載" onClick="PhotoAdd();">
					</td>
					</tr>
					</form>
					</table>
	
	
	
	</td>
  </tr>
  <tr>
    <td align="right" valign="top">      <table width="100%" border="0" cellpadding="10" cellspacing="1" >
      <tr align="left" valign="top" bgcolor="#FFFFFF">
        <td width="50%" align="left" bgcolor="#FFFFFF"><span class="subHead"><a href="activity.php?type=<?PHP echo $type; ?>">返回活動記錄目錄 </a> </span>            </td>
        <td align="right" bgcolor="#FFFFFF"><?php
        if ($total_page>0 && $page>0){
            page_display("",$page,$total_page,10,$search_arr,$sort_arr,$class_arr,"");
        }
    ?></td>
      </tr>
    </table>
    </td>
  </tr>

</table>


</body>
</html>