<?
session_start();
require("../../php-bin/function.php");
require("./c_parent_process.php");

// array[ month ] [ title / row1 / row2  ]

$color[1][title] = "#EBFAED";
$color[1][row1] = "#D3F3D6";
$color[1][row2] = "#EBFAED";

$color[2][title] = "#EBF4FA";
$color[2][row1] = "#B9E2FF";
$color[2][row2] = "#EBF4FA";

$color[3][title] = "#FFECA9";
$color[3][row1] = "#FFDC63";
$color[3][row2] = "#FFECA9";

$color[4][title] = "#EBFAED";
$color[4][row1] = "#D3F3D6";
$color[4][row2] = "#EBFAED";

$color[5][title] = "#EBF4FA";
$color[5][row1] = "#B9E2FF";
$color[5][row2] = "#EBF4FA";

$color[6][title] = "#FFECA9";
$color[6][row1] = "#FFDC63";
$color[6][row2] = "#FFECA9";

$color[7][title] = "#EBFAED";
$color[7][row1] = "#D3F3D6";
$color[7][row2] = "#EBFAED";

$color[8][title] = "#EBF4FA";
$color[8][row1] = "#B9E2FF";
$color[8][row2] = "#EBF4FA";

$color[9][title] = "#FFECA9";
$color[9][row1] = "#FFDC63";
$color[9][row2] = "#FFECA9";

$color[10][title] = "#EBFAED";
$color[10][row1] = "#D3F3D6";
$color[10][row2] = "#EBFAED";

$color[11][title] = "#EBF4FA";
$color[11][row1] = "#B9E2FF";
$color[11][row2] = "#EBF4FA";

$color[12][title] = "#FFECA9";
$color[12][row1] = "#FFDC63";
$color[12][row2] = "#FFECA9";



?>
<html>
<head>
<title>家長通告</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
-->
</style>


<script language="JavaScript" type="text/JavaScript">
<!--



function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
</head>
<body>
<img src="admin_label.gif" width="500" height="35"><br>
<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td align="left" valign="top">
	
	<table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($_GET[msg]!="") echo "<br>".$_GET[msg]; ?>
        </font></td>
      </tr>
    </table>
	  <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="15%"><span class="style2"><span class="subHead">新增</span>：</span></td>
          <td width="85%" bgcolor="#FFFFFF"><span class="style3"><a href="add_notice.php?school_year=<?=$d_year?>&month=<?=$d_month?>">新增</a></span></td>
        </tr>
      </table>
	  <hr style="height:1px;color=ECECEC;">
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td width="15%" bgcolor="#FFFFFF"><span class="subHead">查看：</span></td>
          <td width="85%" align="left" valign="top" bgcolor="#FFFFFF"><table border="0" cellspacing="0" cellpadding="1">
            <form name="form1" method="get" action="">
              <tr>
                <td valign="bottom" class="wq_content">
				<select name="web_type" id="web_type">
				<option value="">所有類別</option>
                  <?php
					require_once("../../php-bin/get_web_type_selection.php");
					$type_selected = $_GET[web_type];
					require_once("../../php-bin/get_web_type_select_html.php");
				  ?>
                </select> </td>
                <td valign="bottom" class="wq_content">&nbsp;</td>
                <td valign="bottom" class="wq_content">&nbsp;</td>
              </tr>
              <tr>
                <td valign="bottom" class="wq_content">&nbsp;</td>
                <td valign="bottom" class="wq_content">&nbsp;</td>
                <td valign="bottom" class="wq_content">&nbsp;</td>
              </tr>
              <tr>
                <td valign="bottom" class="wq_content"><select name="type" id="type">
                  <option value="" <? if ($_GET[type] == "") { echo "selected"; } ?>>所有項目</option>
                  <!--option value="N" <? if ($_GET[type] == "N") { echo "selected"; } ?>>最新消息</option-->
                  <option value="PC" <? if ($_GET[type] == "PC") { echo "selected"; } ?>>家校園地</option>
                  <option value="P" <? if ($_GET[type] == "P") { echo "selected"; } ?>>家長通告</option>
                  <option value="SR" <? if ($_GET[type] == "SR") { echo "selected"; } ?>>學校報告</option>
                  <option value="D" <? if ($_GET[type] == "D") { echo "selected"; } ?>>發展計劃</option>
                  <option value="S" <? if ($_GET[type] == "S") { echo "selected"; } ?>>學校發展計劃</option>
                  <option value="R" <? if ($_GET[type] == "R") { echo "selected"; } ?>>學校發展報告</option>
                  <option value="SH" <? if ($_GET[type] == "SH") { echo "selected"; } ?>>學校發展歷程</option>
                  <option value="SI" <? if ($_GET[type] == "SI") { echo "selected"; } ?>>學生會資訊</option>
                  <option value="MS" <? if ($_GET[type] == "MS") { echo "selected"; } ?>>影片庫</option>
                  <option value="OA" <? if ($_GET[type] == "OA") { echo "selected"; } ?>>傑出成就</option>
                  <option value="LA" <? if ($_GET[type] == "LA") { echo "selected"; } ?>>學習活動</option>
                  <option value="SN" <? if ($_GET[type] == "SN") { echo "selected"; } ?>>學生報</option>                        </select></td>
                <td valign="bottom" class="wq_content">&nbsp;</td>
                <td valign="bottom" class="wq_content">&nbsp;</td>
              </tr>
              <tr>
                <td valign="bottom" class="wq_content">&nbsp;</td>
                <td valign="bottom" class="wq_content">&nbsp;</td>
                <td valign="bottom" class="wq_content">&nbsp;</td>
              </tr>
              <tr>
                <td valign="bottom" class="wq_content">
				<select name="school_year" id="select">
					<option value=''>所有年份</option>
					<?php
					$get_year_sql = "SELECT `school_year` FROM `tbl_notice` group by `school_year`";
					$get_year_result = mysql_query($get_year_sql,$link_id);
					while ($get_year_rows=mysql_fetch_array($get_year_result,MYSQL_BOTH)){
					?>
						<?php if(empty($get_year_rows['school_year'])) continue; ?>
						<option value="<?php echo $get_year_rows['school_year']; ?>"<?php echo ($d_year ==$get_year_rows['school_year']) ? ' selected':''?>>
						<?php echo $get_year_rows['school_year']; ?></option>
					<? } ?>
                </select>
				<select name="month">
				    <option value=''>所有月份</option>
					<?php
					$get_month_sql = "SELECT `month` FROM `tbl_notice` group by `month`";
					$get_month_result = mysql_query($get_month_sql,$link_id);
					while ($get_month_rows=mysql_fetch_array($get_month_result,MYSQL_BOTH)){
					?>
					  <?php if(empty($get_month_rows['month'])) continue; ?>
					  <option value="<?php echo $get_month_rows['month']; ?>" <?php echo $d_month ==$get_month_rows['month'] ? ' selected ' : '' ; ?>>
					  <?php echo $get_month_rows[month]; ?></option>
					<?php } ?>
				</select>
				</td>
                <td valign="bottom" class="wq_content">&nbsp;</td>
                <td valign="bottom" class="wq_content">
                    <input name="Submit" type="submit" class="index_select" value="查看">
                </td>
              </tr>
            </form>
          </table></td>
        </tr>
      </table>
      <span class="style3"></span>
      <hr style="height:1px;color=ECECEC;">      
      <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top" bgcolor="#FFFFFF">
          <td><table width="100%%"  border="0" cellspacing="0" cellpadding="1">
            <tr align="center" valign="top"><?=$d_year?>
			<? 
			$MonthArrNum=array('',9,10,11,12,1,2,3,4,5,6,7,8);
			$MonthArrChi=array("全部","九","十","十一","十二","一","二","三","四","五","六","七","八");
			
			for ($i=0;$i<sizeof($MonthArrNum);$i++)
			{
						
			
				if ($d_month==$MonthArrNum[$i])
				{
					$linkStr="<span style='border:1px solid red;padding:0px 3px ;color:666666;display:block;'>".$MonthArrChi[$i]."月</span>";
					
				} else{
					
					$linkStr="<a href=?school_year=".$_GET[school_year]."&month=".$MonthArrNum[$i]."&type=".$_GET[type]."&web_type=".$_GET[web_type].">".$MonthArrChi[$i]."月</a>";
				}
				
				echo "<td nowrap>".$linkStr."</td>";
			}
			
			?>
			<!--
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=9">九月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=10">十月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=11">十一月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=12">十二月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=1">一月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=2">二月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=3">三月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=4">四月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=5">五月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=6">六月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=7">七月</a></td>
              <td nowrap><a href="?school_year=<?=$_GET[school_year]?>&month=8">八月</a></td>
			-->
            </tr>
          </table></td>
        </tr>
      </table>
      <br>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="ranktype">
       
          <tr bgcolor="<?=$color[$d_month][title]?>">
            <td width="3%" align="center" valign="top" nowrap bgcolor="ECECEC">日期</td>
            <td align="center" valign="top" nowrap bgcolor="ECECEC">類別</td>
            <td align="center" valign="top" nowrap bgcolor="ECECEC">網頁項目</td>
            <td align="center" valign="top" nowrap bgcolor="ECECEC">編號</td>
            <td align="center" valign="top" nowrap bgcolor="ECECEC">標題</td>
            <td align="center" valign="top" nowrap bgcolor="ECECEC">對象</td>
            <td align="center" valign="top" nowrap bgcolor="ECECEC">图片</td>
            <td width="1%" align="center" valign="top" nowrap bgcolor="ECECEC"><div align="center">下載</div></td>
            <?
            if ($_SESSION[admin_level] == "1"){
            ?>
            <td width="1%" align="center" valign="top" nowrap bgcolor="ECECEC"><div align="center">更改</div></td>
            <td width="1%" align="center" valign="top" nowrap bgcolor="ECECEC"><div align="center">刪除</div></td>
            <?
            }
            ?>
          </tr>
          <?
          
	for ($i =0; $get_rows=mysql_fetch_array($get_result,MYSQL_BOTH); $i++){
		if ($i % 2 ==0)
			$rowcolor = $color[$d_month][row1];
		else
			$rowcolor = $color[$d_month][row2];
?>
          <tr valign="top" bgcolor="FFFFFF">
            <td nowrap><span class="admin_maintain_contents"><font class="style8">
              <?=substr($get_rows["date"],8,2)."-".substr($get_rows["date"],5,2)."-".substr($get_rows["date"],0,4)?>
            </font></span></td>
            <td nowrap>
          <?
			require_once("../../php-bin/get_web_type_selection.php");
			$type_selected = $get_rows["web_type"];
		    for ($i=0;$i<count($type_list);$i++){ 
				if ($type_selected==$type_list[$i]["type_id"])
					echo $type_list[$i]["type_name"];
	
			}
          ?>
			</td>
            <td>
			<?
				if ($get_rows["docoment_type"]=="N")
					echo "最新消息";
				else if ($get_rows["docoment_type"]=="PC")
					echo "家校園地";
				else if ($get_rows["docoment_type"]=="P")
					echo "家長通告";
				else if ($get_rows["docoment_type"]=="SR")
					echo "學校報告";
				else if ($get_rows["docoment_type"]=="D")
					echo "發展計劃";
				else if ($get_rows["docoment_type"]=="S")
					echo "學校發展計劃";
				else if ($get_rows["docoment_type"]=="R")
					echo "學校發展報告";
				else if ($get_rows["docoment_type"]=="SH")
					echo "學校發展歷程";
				else if ($get_rows["docoment_type"]=="SI")
					echo "學生會資訊";
				else if ($get_rows["docoment_type"]=="MS")
					echo "影片庫";
				else if ($get_rows["docoment_type"]=="OA")
					echo "傑出成就";
				else if ($get_rows["docoment_type"]=="LA")
					echo "學習活動";
				else if ($get_rows["docoment_type"]=="SN")
					echo "學生報";
			?>
			</td>
            <td><?=$get_rows[serialno]?></td>
            <?
				if ($get_rows[docoment_name] != ""){
			?>
            <td><?=$get_rows[title_cn]?></td>
			<td><?=$get_rows[target]?></td>
			<td>&nbsp;</td>
            <td><div align="center"><a href="../../userUpload/attachment/<?=$get_rows[docoment_name]?>" target="_blank"><img src="../icons/files.gif" width="13" height="16" border="0"></a></div></td>
            <?
			}else{
			?>
            <td><?=$get_rows[title_cn]?></td>
			<td><?=$get_rows[target]?></td>
			<td align="center" valign="middle" nowrap class="admin_maintain_contents"><font class="style8"> 
            <span class="admin_maintain_contents"><font class="style8" color="#0000FF"><a href="gallery.php?id=<?php echo $get_rows['noticeid']; ?>"><img src="../icons/bmp.gif" alt=管理相片 width="16" height="16" border="0" ></a></font></span>
            </font></td>
            <td><div align="center"></div></td>
            <?
			}
				if ($_SESSION[admin_level] == "1"){
			?>
            <td><div align="center"><a href="update_notice.php?id=<?=$get_rows[noticeid]?>&school_year=<?=$d_year?>&month=<?=$d_month?>"><img src="../icons/xie.gif" width="16" height="16" border="0" alt="更改"></a></div></td>
            <td><div align="center"><a href="notice_delete.php?id=<?=$get_rows[noticeid]?>&school_year=<?=$d_year?>&month=<?=$d_month?>&type=<?=$_GET[type]?>&category=<?=$_GET[category]?>" onClick="return confirm('你確定要刪除這筆資料嗎?')"><img src="../icons/del.gif" width="16" height="16" border="0" alt="刪除"></a></div></td>
            <?
            	}
            ?>
        </tr>
     <?	
	}
	?>
      </table>
	  <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
        <tr align="left" valign="top">
          <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
          <td width="85%" align="right" bgcolor="#FFFFFF"><?
        if ($total_page>0 && $page>0){
			$search_arr=array(
								'school_year'=>$_GET['school_year'],
								'month'=>$MonthArrNum['$i'],
								'type'=>$_GET['type'],
								'web_type'=>$_GET['web_type']
							);
            page_display("",$page,$total_page,10,$search_arr,$sort_arr,$class_arr,"");
        }
    ?></td>
        </tr>
      </table>
<?        
	if ($total_record == 0){
?>
<br>
<table width="100%" cellspacing="0" cellpadding="10">
<tr>
  <td align="center"><span class="style3">本月未有任何通告/活動</span></td>
</tr>
</table>
<?	
	}
?>	        
        
    </td>
  </tr>
</table>
<p> </p>
</body>
</html>
