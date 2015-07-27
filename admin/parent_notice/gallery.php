<?php 
	require("gallery_selection.php");
	$record = mysql_fetch_object($get_result3);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>图片管理 </title>
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
	document.gallery.action="photo_add.php";
}


function Delete_Photo(file_name) {
	if ( confirm('你確定要刪除這張相片嗎?') ) {
		location='photo_delete_process.php?file_name='+file_name+'&id=<?=$_GET[id];?>';
	}
}

function MM_openBrWindow(theURL,winName,features) {
  window.open(theURL,winName,features);
}
-->
</script>


</head>
<body>

<img src="admin_label.gif" width="500" height="35"><table width="650"  border="0" cellpadding="5" cellspacing="0">

  <tr>
    <td><br>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" >
        <tr align="left" valign="top">
          <td bgcolor="#FFFFFF"><span class="subHead">
          <?=$record->name;?>
        </span></td>
        <td align="right" nowrap bgcolor="#FFFFFF"> 共有
              <?=$total_record?> 張图片      &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 每頁
        <?=$record_per_page?>
        個 &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp; 分
        <?=$total_page?>
        頁顯示 </td>
        </tr>
      </table>
    </td>
    <td width="150" valign="top"><br>
    </td>
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
		<table border=0 cellpadding="5" cellspacing="1" bgcolor="CCCCCC">
		<tr><td bgcolor="ECECEC">
		<a href="../../userUpload/notice/<?=$get_rows['photo_name'];?>" target="_blank">
		<img border="0" src="../../userUpload/notice/small/<?=$get_rows['photo_name'];?>" alt="點擊放大圖片">
		</a>
		</td>
		</tr>
		<tr>
		<td bgcolor="ECECEC">
				<!--table-2 start-->
				<table width="100%" border=0 cellpadding="0" cellspacing="0">
				<tr valign="top">
				<td align="left"><a href="javascript:MM_openBrWindow('pop_window.php?id=<?=$get_rows['photo_name']?>','view','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=350,height=170,top=50,left=50')"><font color=#666666>修改</font></a><!--font color=#CCCCCC>(<?=$i+1?>)</font>-->&nbsp;</td>
				<td align="right"><a href="javascript:Delete_Photo('<?=$get_rows['photo_name']?>');"><font color=#666666>刪除</font></a></td>
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
		<tr><td bgcolor="ECECEC">		
		<img src="../../images/trans.gif" border="0" width="90" height="69">		
		</td>
		</tr>
		<tr>
		<td bgcolor="ECECEC">&nbsp;
				
	
		</td>
		</tr>
		</table>
		<!--table-1 end-->
	<?
	}
	
	
	
}
?>
			
      <? if (mysql_num_rows($get_result)==0){ ?>
      <tr>
	  	<td colspan="5" align="center">
        	<font color=red style="font-size:12px">現時沒有相片</font>
      	</td>
	  </tr>
	  <? } ?>
	  
    </table>
</td>
    <td width="150" rowspan="2" valign="top">
	
					<table width="100%%"  border="0" cellpadding="0" cellspacing="1" bgcolor="ECECEC">
					<tr>
					<td>
					<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" >
					<form action="" enctype="multipart/form-data" method="post" name="gallery">
						<tr align="left" valign="top" >
							<td><span class="subHead">上載相片：(建議尺寸：640*480)</span></td>
						</tr>
						<tr align="left" valign="top" >
							<td><span class="subHead">每張圖大小不得超過8MB</span></td>
						</tr>
						<?php for($i=0;$i<3;$i++) { ?>
						<!--tr>
						  <td>
							<input name="remark[]" type="text" id="remark[]" size="15" maxlength="50">相片描
						  </td>
						</tr-->
						<tr>
							<td width="85%"><input name="photo[]" type="file" id="photo[]" size="15"></td>
						</tr>
						<? } ?>
						<tr>
							<td valign="top">
								<input name="id" type="hidden" id="id" value="<?=$_GET["id"];?>">
								<input type="submit" name="Submit3" value="確定上載" onClick="PhotoAdd();">
							</td>
						</tr>
						</form>
					</table>
					</td>
					</tr>
					</table>
	
	
	
	</td>
  </tr>
  <tr>
    <td align="right" valign="top">      <table width="100%" border="0" cellpadding="10" cellspacing="1" >
      <tr align="left" valign="top" bgcolor="#FFFFFF">
        <td width="50%" align="left" bgcolor="#FFFFFF"><span class="subHead"><a href="c_parent.php">返回列表页 </a> </span>            </td>
        <td align="right" bgcolor="#FFFFFF"><?
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
