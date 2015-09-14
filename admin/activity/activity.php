<?php  

header("Content-Type:text/html;charset=utf-8"); 
require_once("../../admin.inc.php");

// Used to pass type_id to activity_add.php
$type = mysql_escape_string ($_GET['type']);

// Selection
require_once("activity_selection.php");

// access control checking
require_once("z_access_control.php");

// Different types have different texts/names
require_once("activity_text.php");

?><html>
<head>
<title><?PHP echo $activity_title[$type]; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style5 {color: #666666}
-->
</style>
<script src="../../js/jquery-1.11.3.min.js"></script>
</head>
<body>
<p class="title"><?PHP echo $activity_p_title[$type]; ?></p>
<table width="750" height="0"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">
  <?php

	$array_s = array("t_name");
	$array_v = array($_GET[t_name]);

	$str_key = loadsqlkey($array_s, $array_v);
	$_SESSION[skey] = $str_key;
?>

  <tr> 
    <td>
    <?php   if ($msg!=""){?>
    <table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <?php   if ($msg!="") echo "<br>".$msg; ?>
        </font></td>
      </tr>
    </table>
    <?php } ?>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="23%"><span class="style2"><span class="subHead"><?PHP echo $activity_subhead[$type]; ?></span>：</span></td>
          <td width="32%"><a href="activity_add.php?type=<?PHP echo $type; ?>" class="style8">新增</a></td>
          <td width="45%"><a href="a_type_update.php" class="style8"></a></td>
        </tr>
      </table>
      
    


<table width="650" height="191"  border="0" align="left" cellpadding="5" cellspacing="0" class="small">
  <tr> 
    <td>
      
     
      <hr style="height:1px;color=ECECEC;">
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top">
          <td width="15%" bgcolor="#FFFFFF"><span class="style4">搜尋結果：</span></td>
          <td width="85%" align="right" bgcolor="#FFFFFF">
		  總共有 <?php echo $total_record?> 個資料
		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;
		  每頁 <?php echo $record_per_page?> 個
		  &nbsp;&nbsp;<font color=#CCCCCC>|</font>&nbsp;&nbsp;
		  分 <?php echo $total_page?> 頁顯示 
	      </td>
        </tr>
      </table>
      <table width="100%"  border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC">
<?PHP if (0 == $type) { ?>
        <tr valign="top" bgcolor="ECECEC" > <td width="12%" nowrap class="admin_maintain_header">日期</td>
          <td nowrap class="admin_maintain_header">標題</td>
          <td class="admin_maintain_header">管理相片</td>
          <td width="13%" nowrap bgcolor="ECECEC" class="admin_maintain_header">更改及檢視</td>
          <td width="7%" nowrap bgcolor="ECECEC" class="admin_maintain_header">刪除</td>
        </tr>
<?PHP } else if (1 == $type) { ?>
        <tr valign="top" bgcolor="ECECEC" > <td width="12%" nowrap class="admin_maintain_header">日期</td>
          <td width="12%" class="admin_maintain_header">年級</td>
          <td class="admin_maintain_header">描述</td>
          <td class="admin_maintain_header">.jpg圖片</td>
          <td width="13%" nowrap bgcolor="ECECEC" class="admin_maintain_header">更改及檢視</td>
          <td width="7%" nowrap bgcolor="ECECEC" class="admin_maintain_header">刪除</td>
        </tr>
<?PHP } ?>
        
        <?php
        // Display user's information
		
        while (null != $get_result && $get_rows=mysql_fetch_array($get_result,MYSQL_BOTH)){
			if (0 == $type) { 
      ?>
        <tr align="left" valign="top" >  <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?php echo substr($get_rows["date"],8,2)."-".substr($get_rows["date"],5,2)."-".substr($get_rows["date"],0,4)?>
            </font></td>
          <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?php echo $get_rows["name"]?>
            </font></td>
         <td  bgcolor="#FFFFFF">
           <span class="admin_maintain_contents"><font class="style8" color="#0000FF"><a href="gallery.php?id=<?php echo $get_rows["id"]?>&type=<?PHP echo $type; ?>"><img src="../icons/bmp.gif" alt=管理相片 width="16" height="16" border="0" / 刪除相片></a></font></span>
         </td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="activity_update.php?id=<?php echo $get_rows["id"]?>&type=<?PHP echo $type; ?>"><img src="../icons/xie.gif" width="16" height="16" border="0" alt=更改及檢視></a></font></td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="activity_delete.php?id=<?php echo $get_rows["id"]?>&type=<?PHP echo $type; ?>" onClick="return confirm('請注意! 此活動中的所有相片將會一併被刪除?')"><img src="../icons/del.gif" width="16" height="16" border="0" alt=刪除></a></font></td>
        </tr>
<?PHP } else if (1 == $type) { ?>
        <tr align="left" valign="top" >  <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?php echo substr($get_rows["date"],8,2)."-".substr($get_rows["date"],5,2)."-".substr($get_rows["date"],0,4)?>
            </font></td>
          <td nowrap bgcolor="#FFFFFF" ><font class="style8"> 
            <?php echo $get_rows["class_year"].'年級'.$get_rows["name"].'班'; ?>
            </font></td>
          <td bgcolor="#FFFFFF" ><font class="style8"> 
            <?php echo html_entity_decode ($get_rows["description"]); ?>
            </font></td>
          <td align="center" bgcolor="#FFFFFF" >
            <div class="jpgpic" lsrc="<?php echo '../../userfiles/upload/'.$get_rows["file_file_name"]; ?>"><a href="javascript:void(0);"><div class="img-frame"><div></div></div></a></div>
          </td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="activity_update.php?id=<?php echo $get_rows["id"]?>&type=<?PHP echo $type; ?>"><img src="../icons/xie.gif" width="16" height="16" border="0" alt=更改及檢視></a></font></td>
          <td align="center" nowrap bgcolor="#FFFFFF" ><font class="style8" color="#0000FF"><a href="activity_delete.php?id=<?php echo $get_rows["id"]?>&type=<?PHP echo $type; ?>" onClick="return confirm('請注意! 此活動中的所有相片將會一併被刪除?')"><img src="../icons/del.gif" width="16" height="16" border="0" alt=刪除></a></font></td>
        </tr>
        <?php   } } ?>
        <?php   if (null != $get_result && mysql_num_rows($get_result)==0){ ?>
        <?php   } ?>
      </table>
        <?php   if (null != $get_result && mysql_num_rows($get_result)==0){ ?>
    
      <div align="center">
        <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
          <tr align="left" valign="top">
            <td align="center" valign="middle" bgcolor="#FFFFFF"><font class="style8 style6 style5">( 沒有找到有關 <?php echo $_GET["t_name"]?> 的資料 ) </font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="history.go(-1)">返回</a></td>
          </tr>
        </table>
      </div>
      <?php   } ?>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top">
          <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="85%" align="right" bgcolor="#FFFFFF"><?php
        if ($total_page>0 && $page>0){
            page_display("",$page,$total_page,10,$search_arr,$sort_arr,$class_arr,"");
        }
    ?></td>
        </tr>
      </table>
      <p align="right">&nbsp;
    </p></td>
  </tr>
</table>

<script>
$(document).ready(function (){
  $('.jpgpic').css('width','170px');
  $('.jpgpic').css('height','120px');
  $('.img-frame').css('width','160px');
  $('.img-frame').css('height','110px');
  $('.img-frame div').css('width','150px');
  $('.img-frame div').css('height','100px');
  $('.img-frame div').css('padding','5px');
  $("div").each(function(){
    var obj_li=$(this).find("a>div>div");
    var rw=parseInt(obj_li.css("width"));
    var rh=parseInt(obj_li.css("height"));
    var img=new Image();
    img.src=$(this).attr("lsrc");
    img.onload=function(){
      var l,t;
      var w=img.width;
      var h=img.height;
      if(w>rw){
        h=h/w*rw;
        w=rw;
      }
      if(h>rh){
        w=w/h*rh;
        h=rh;
      }
      l=(rw-w)/2;
      t=(rh-h)/2;
      obj_li.html("<img src=\"" + img.src + "\" style=\"width:" + w + "px;height:" + h + "px; position:relative;top:" + t + "px\"/>");
    };
  });
});
</script>
</body>
</html>