<?
session_start();
require("../../php-bin/pagedisplay.php");
$page = 1;
$record_per_page = 30;   // records display each page


if (isset($_GET["page"])){
	$page = $_GET["page"];
}


require("../../php-bin/function.php");


require("../../php-bin/get_class_student.php");


	$show_type = isset($_GET['show_type']) ? $_GET['show_type'] : 'L';


if ($_GET[student] !="")
	$student_id = $_GET[student];

$get_sql = "Select * FROM `tbl_student` ts , tbl_class tc WHERE ts.class_id = tc.class_id and ts.student_id = '$student_id'";

$get_result = mysql_query($get_sql, $link_id);
$get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);
?>

<script language="JavaScript" type="text/JavaScript">
function change_type(sel_num){
	var sel_length = document.upload_file.study_type_id.options.length;
	for (i =0; i < sel_length; i++){
		if (document.upload_file.study_type_id[i].value == sel_num)
			document.upload_file.study_type_id.selectedIndex = i;
	}
}
</script>
<script language="JavaScript" type="text/JavaScript">
<!--

function change_subject(frist){
	var sel_student_index = document.show_work.student.selectedIndex;
	var sel_student_name = document.show_work.student[sel_student_index].value;
    
    }			
    	
    function change_student(frist){  
      var sel_class_index = document.show_work.class_id.selectedIndex;
      var sel_class_name = document.show_work.class_id[sel_class_index].value;
	var loaded = 0;	
      <? for ($i=0;$i<count($classname_list);$i++){ ?>
          if (sel_class_name=="<?=$classname_list[$i]["class_id"]?>"){
		<?		
            // String.fromCharCode(28377)  &#28377;
            	$print = 0;           
            	$all_count =0; 
            	$list_print = "";
             for ($j=0;$j<count($class_list_student[$classname_list[$i]["class_id"]]);$j++){ 
		
		$temp_name = $class_list_student[$classname_list[$i]["class_id"]][$j]["student_name"];
		if (strpos($temp_name,"&#") != "" or substr($temp_name,0,2) == "&#" ){
           		// set the utf8 to big5 code
           		$list_print .= "
		document.show_work.student[". ($j+$start_list_num) . "].text = \"\"";
			$temp_array = split('&', $temp_name);
			for ($h =0; $h < count($temp_array); $h++){

				if (strpos($temp_array[$h],";") != "" ){
					$temp_array2 = split(';', $temp_array[$h]);
					$temp_array2[0] = substr($temp_array2[0], 1);
					$list_print .= " + String.fromCharCode($temp_array2[0]) ";
					$list_print .= " + \"$temp_array2[1]\"";
				}
				else if (substr($temp_array[$h], 0,1) == "#"){
					$temp_p = $temp_array[$h];
					$temp_p = substr($temp_p, 1);
					$list_print .= " + String.fromCharCode($temp_p) ";
				}
				else{
					$list_print .= " + \"$temp_array[$h]\"";
				}		
			
			}

			$list_print .= ";";
			
		}else{
				if($j==0 && $show_type == 'L'){
					$list_print .= "document.show_work.student['0'].text = \"全部\";";
					$list_print .= "document.show_work.student['0'].value =\"\";";
				}
           		 $list_print .= "
		document.show_work.student[". ($j+$start_list_num+1) . "].text = \"".$class_list_student[$classname_list[$i]["class_id"]][$j]["student_name"] ."\";";	
		}
				$list_print .= "
				document.show_work.student[".($j+$start_list_num+1) . "].value =\"".$class_list_student[$classname_list[$i]["class_id"]][$j]["student_id"]. "\";";
              		if ($class_list_student[$classname_list[$i]["class_id"]][$j]["student_id"] == $_GET[student]){
							$j2 = $j+1;
							$load_select = "document.show_work.student.selectedIndex = " . $j2 . ";";
					}
             } 
             ?>
				document.show_work.student.length = <?=count($class_list_student[$classname_list[$i]["class_id"]])?>+1;
             <?
             echo $list_print;
                if ($print == 0){
              	?>
		document.show_work.student.selectedIndex = 0;
              	<?
              	}
            ?>
		loaded =1;
		if (frist == 1){
			<?php echo $load_select; ?>
		}
          }
      <? } ?>
      	if (loaded ==0){
      		document.show_work.student.length = 1;
			<?php if($show_type=='L'){ ?>
				document.show_work.student[0].text = "全部";
			<?php }else{ ?>
				document.show_work.student[0].text = "沒有學生";
			<?php } ?>
		document.show_work.student[0].value ="";				
	}
    }
//-->
</script>
<html>
<head>
<title>admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style5 {color: #666666}
-->
</style>

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script>
	/*
	$(document).ready(function(){
		$('#is_news').change(function(){
			$('#banner_tr1').fadeIn(100,function(){
				$('#banner_tr2').fadeIn(100,function(){
					$('#banner_tr3').fadeIn(100);
				});
			});
		});
		$('#is_news').siblings("#is_news").change(function(){
			$('#banner_tr1').fadeOut(100,function(){
				$('#banner_tr2').fadeOut(100,function(){
					$('#banner_tr3').fadeOut(100);
				});
			});
		});
	});
	*/
</script>
</head>
<body >
<img src="admin_label.gif" width="500" height="35">
<table width='650' border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td align='right'><a id='show_list' href='?show_type=<?php echo $show_type=='L' ? '' : 'L'; ?>'><?php echo $show_type=='L' ? '返回添加學生作品頁' : '列表查看'; ?></a></td>
	</tr>
</table>
<?php if($show_type=='L'){ ?>
	<table width="650" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td>
			<table width="100%"  border="0" cellspacing="1" cellpadding="10">
			  <tr>
				<td><font class=style8 color=red>
				  <? if ($msg!="") echo "<br>".$msg; ?>
				</font></td>
			  </tr>
			</table>
			</td>
		</tr>
		<tr>
			<td>
				<table border="0" cellpadding="3" cellspacing="0" class=small>
				  <form name="show_work" method="GET" action="main.php">
					<input type='hidden' name='show_type' value='L' />
					<tr>
					  <td><span class="style5">班別：</span>                  <select name="class_id" id="class_id" onChange="change_student();this.form.subjectid.value='';this.form.submit();">
							<option value=''>全部</option>
							<?
					$check_selected = $_GET[class_id];
					$class_list = $classname_list;
					for ($i=0;$i<count($class_list);$i++){ 
			?>
							<option value="<?=$class_list[$i]["class_id"]?>"<?=($check_selected==$class_list[$i]["class_id"])?" selected":""?>>
							<?=$class_list[$i]["class_name"]?>
							</option>
							<? } ?>
						  </select>
					  </td>
					  <td><span class="style5">學生：</span>                <select name="student" id="select" onChange="this.form.subjectid.value='';this.form.submit();">
							<option value=''>全部</option>
						  </select>
					  </td>
					  <td><span class="style5">科目：</span>                <select name="subjectid" class="small" id="subjectid">
							<option value=''>全部</option>
							<?
		//if ($_GET[student] !=""){
		if(1) {
			$get_sub_sql = "SELECT ts . * 
		FROM `tbl_study_record` tsr, tbl_subject ts
		WHERE  tsr.`subject_id` = ts.`subject_id` 
		GROUP BY tsr.`subject_id`";
			$get_sub_result = mysql_query($get_sub_sql, $link_id);
			while($get_sub_rows=mysql_fetch_array($get_sub_result,MYSQL_BOTH)){
		?>
							<option value="<?=$get_sub_rows[subject_id]?>"<?=($_GET[subjectid] == $get_sub_rows[subject_id])?" selected":""?>>
							<?=$get_sub_rows[subject_name]?>
							</option>
							<?	
			}
		}
		else{
		?>
							<option value="" selected>沒有科目</option>
							<?
		}
		?>
						</select></td>
					  <td><span class="style5">年份：
						<select name="year" id="year">
							<option value=''>全部</option>
						<?php
							$get_year = "SELECT year FROM `tbl_study_record` GROUP BY year";
							$year_result = mysql_query($get_year,$link_id);
							while($year_record = mysql_fetch_object($year_result)) {
								if ($year_record->year == $_GET[year])
									echo "<option value=\"$year_record->year\" selected>$year_record->year</option>";
								else
									echo "<option value=\"$year_record->year\">$year_record->year</option>";
							}
						?>
						</select>
					  </span></td>
					  <td><input type="submit" name="Submit" value="觀看作品"></td>
					</tr>
				  </form>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table width=100%  border=0 cellpadding=5 cellspacing=1 bgcolor="#CCCCCC" class=small id='tb_banner_list'>
					<tr align="center" valign="top" bgcolor="ECECEC" > 
						<td width=7%>班級</td>
						<td width=15%>學生</td>
						<td width=15%>科目</td>
						<td width=15%>類別</td>
						<td width=10%>年份</td>
						<td width=30%>作品名稱</td>
						<td width=13%>查看</td>
					</tr>
<?php
		$get_r_sql = "SELECT * FROM `tbl_study_record` WHERE 1";
		if ($student_id != '')
			$get_r_sql .= " AND student_id = '$student_id'";
		if ($get_c_rows[study_id] != '')
			$get_r_sql .= " AND study_type_id = '$get_c_rows[study_id]'";
		if ($_GET[subjectid] != '')
			$get_r_sql .= " AND subject_id = '$_GET[subjectid]'";
		if ($_GET[year] != ''){
			$get_r_sql .= " AND year = '$_GET[year]'";		
		}
		if(!empty($_GET['class_id']) && isset($_GET['class_id']) != '' && $_GET['student'] == '' && $_GET['subjectid'] == '' && $_GET['year'] == '' ){
			$get_r_sql = "SELECT r.* FROM `tbl_study_record` as r INNER JOIN `tbl_student` as s WHERE s.class_id = '".$_GET['class_id']."' AND r.student_id = s.student_id";
		}		
		
		if(isset($_GET['from_news']) == 1 && isset($_GET['id'])){
			$get_r_sql = 'SELECT * FROM `tbl_study_record` WHERE `study_record_id` = '.$_GET['id'];
		}
	$get_r_result = mysql_query($get_r_sql,$link_id);
	$total_record = mysql_num_rows($get_r_result);
    $offset = $record_per_page * ($page-1);
    $total_page = ceil($total_record/$record_per_page);
    $get_r_result = mysql_query($get_r_sql." limit $offset,$record_per_page;", $link_id);
	
	if (mysql_num_rows($get_r_result) == 0){
?>
					<tr valign="top" bgcolor="FFFFFF">
						<td colspan="7">&nbsp;<span class="style5">　　沒有資料</span></td>
					</tr>
<?php }else{
			//獲取科目信息
			include('../../php-bin/get_subject_selection.php');
			
			//獲取類別信息
			include('../../php-bin/get_study_type_selection.php');
			while($get_list_res = mysql_fetch_array($get_r_result)){
				$sdu_id = $get_list_res['student_id'];//學號
				$sbj_id = $get_list_res['subject_id'];//科目ID
				$sql_get_sdt = "select `student_name`,`class_id` from `tbl_student` where `student_id` = '".$sdu_id."' ";
				$get_sdt_res = mysql_query($sql_get_sdt);
				$get_sdt = mysql_fetch_array($get_sdt_res);
				$class_id = $get_sdt['class_id'];//班級ID
				$sd_name = $get_sdt['student_name'];//學生姓名
				
				foreach($subject_list as $val){
					if($val['subject_id']==$sbj_id){
						$sbj_name = $val['subject_name'];//科目名
					}
				}
				
				$sdy_tp_id = $get_list_res['study_type_id'];//類別ID
				
				
				foreach($study_list as $val){
					if($val['study_id']==$sdy_tp_id){
						$sdy_tp_name = $val['study_name'];//類別名稱
					}
				}
				
				$year = $get_list_res['year'];//年份
				$name = $get_list_res['name'];//作品名稱
				$sdy_r_id = $get_list_res['study_record_id'];//作品ID
				$li_i = 0;
				foreach($class_list_student as $key => $val){
					if($class_id==$key){
						foreach($val as $v){
							if($v['student_id']==$sdu_id){
								$class_name = $v['class_name'];//班級名稱
							}
						}
						
					}
				}//獲取班級名
					echo "<tr bgcolor='FFFFFF'>";
					echo "<td align='center'>".$class_name."</td>";
					echo "<td align='center'>".$sd_name."</td>";
					echo "<td align='center'>".$sbj_name."</td>";
					echo "<td align='center'>".$sdy_tp_name."</td>";
					echo "<td align='center'>".$year."</td>";
					echo "<td align='center'>".$name."</td>";
					echo "<td align='center'><a href='?show_type=&class_id=".$class_id."&student=".$sdu_id."&subjectid=".$sbj_id."&year=".$year."&Submit=觀看作品'>查看</a></td>";
					echo "</tr>";
			}
	  }　?>
				</table>
		<table width="100%" border="0" cellpadding="10" cellspacing="1" class="small" id='tb_page'>
			<tr align="left" valign="top">
			  <td width="15%" bgcolor="#FFFFFF">&nbsp;</td>
			  <td width="85%" align="right" bgcolor="#FFFFFF"><?
			  $search_arr=array('show_type'=>'L');
			if ($total_page>0 && $page>0){
				page_display("",$page,$total_page,10,$search_arr,$sort_arr,$class_arr,"");
			}
		?></td>
        </tr>
      </table>
			</td>
		</tr>
	</table>
<?php }else{ ?>
<table width="650" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><table width="100%"  border="0" cellspacing="1" cellpadding="10">
      <tr>
        <td><font class=style8 color=red>
          <? if ($msg!="") echo "<br>".$msg; ?>
        </font></td>
      </tr>
    </table>
    <br>
    <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
      <tr align="left" valign="middle" bgcolor="#FFFFFF">
        <td width="15%" nowrap><span class="style2"><span class="subHead">查看學生作品 </span>：</span></td>
        <td width="85%">
		<table border="0" cellpadding="3" cellspacing="0" class=small>
          <form name="show_work" method="GET" action="main.php">
					<input type='hidden' name='show_type' value='' />
            <tr>
              <td><span class="style5">班別：</span>                  <select name="class_id" id="class_id" onChange="change_student();this.form.subjectid.value='';this.form.submit();">
                    <option>請選擇</option>
                    <?
			$check_selected = $_GET[class_id];
			$class_list = $classname_list;
			for ($i=0;$i<count($class_list);$i++){ 
	?>
                    <option value="<?=$class_list[$i]["class_id"]?>"<?=($check_selected==$class_list[$i]["class_id"])?" selected":""?>>
                    <?=$class_list[$i]["class_name"]?>
                    </option>
                    <? } ?>
                  </select>
              </td>
              <td><span class="style5">學生：</span>                <select name="student" id="select" onChange="this.form.subjectid.value='';this.form.submit();">
                  </select>
              </td>
              <td><span class="style5">科目：</span>                <select name="subjectid" class="small" id="subjectid">
                    <?
//if ($_GET[student] !=""){
if(1) {
	$get_sub_sql = "SELECT ts . * 
FROM `tbl_study_record` tsr, tbl_subject ts
WHERE  tsr.`subject_id` = ts.`subject_id` 
GROUP BY tsr.`subject_id`";
	$get_sub_result = mysql_query($get_sub_sql, $link_id);
	while($get_sub_rows=mysql_fetch_array($get_sub_result,MYSQL_BOTH)){
?>
                    <option value="<?=$get_sub_rows[subject_id]?>"<?=($_GET[subjectid] == $get_sub_rows[subject_id])?" selected":""?>>
                    <?=$get_sub_rows[subject_name]?>
                    </option>
                    <?	
	}
}
else{
?>
                    <option value="" selected>沒有科目</option>
                    <?
}
?>
                </select></td>
              <td><span class="style5">年份：
                <select name="year" id="year">
				<?php
					$get_year = "SELECT year FROM `tbl_study_record` GROUP BY year";
					$year_result = mysql_query($get_year,$link_id);
					while($year_record = mysql_fetch_object($year_result)) {
						if ($year_record->year == $_GET[year])
							echo "<option value=\"$year_record->year\" selected>$year_record->year</option>";
						else
							echo "<option value=\"$year_record->year\">$year_record->year</option>";
					}
				?>
                </select>
              </span></td>
              <td><input type="submit" name="Submit" value="觀看作品"></td>
            </tr>
          </form>
        </table></td>
      </tr>
    </table>
      <?
//if ($_GET[subjectid] != ""){
  
    // Get View Type's Information
    $get_c_sql = "SELECT * FROM `tbl_study_type` WHERE 1";

    $get_c_result = mysql_query($get_c_sql,$link_id);
?>
    <table width="100%" border="0" cellpadding="10" cellspacing="1" class="small">
      <tr align="left" valign="middle" bgcolor="#FFFFFF">
        <td width="15%" nowrap><span class="style2"><span class="subHead">
          <?=$get_rows[student_name]?>
          的作品 </span>：</span></td>
        <td width="85%">&nbsp;</td>
      </tr>
    </table>
    <?
    for ($i=0;$get_c_rows=mysql_fetch_array($get_c_result,MYSQL_BOTH);$i++){
?>
  
    <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class=small>
      <tr bgcolor="ECECEC" >
        <td ><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><?=$get_c_rows[study_name]?></td>
            <td align="right"><?
    if ($_SESSION[teacher_level]== 1){
    ?>
              <a href="#upload" onClick="change_type(<?=$get_c_rows[study_id]?>);">上載檔案</a>
              <?
    }
    ?>
	</td>
          </tr>
        </table> 
		</td>
        </tr>
    </table>    
    <table width="100%" border="0" cellpadding="5" cellspacing="1" class=small>
      <?
if ($_GET[subjectid] != '')
		$get_r_sql = "SELECT * FROM `tbl_study_record` WHERE 1";
else
		$get_r_sql = "SELECT * FROM `tbl_study_record` WHERE 0";
		
		if ($student_id != '')
			$get_r_sql .= " AND student_id = '$student_id'";
		if ($get_c_rows[study_id] != '')
			$get_r_sql .= " AND study_type_id = '$get_c_rows[study_id]'";
		if ($_GET[subjectid] != '')
			$get_r_sql .= " AND subject_id = '$_GET[subjectid]'";
		if ($_GET[year] != '')
			$get_r_sql .= " AND year = '$_GET[year]'";
	$get_r_result = mysql_query($get_r_sql,$link_id);
	if (mysql_num_rows($get_r_result) == 0){
?>
      <tr valign="top">
        <td colspan="4">&nbsp;<span class="style5">　　沒有資料</span></td>
        <?	
	}
	else{
	
		for ($i=0;$get_r_rows=mysql_fetch_array($get_r_result,MYSQL_BOTH);$i++){	
	
	?>
      <tr align="center">
        <td width="25%"><?
			require("show_pic.php");
		?>
        </td>
        <td width="25%"><?
			$get_r_rows=mysql_fetch_array($get_r_result,MYSQL_BOTH);
			require("show_pic.php");
		?>        </td>
        <td width="25%"><?
			$get_r_rows=mysql_fetch_array($get_r_result,MYSQL_BOTH);
			require("show_pic.php");
		?>        </td>
        <td width="25%"><?
			$get_r_rows=mysql_fetch_array($get_r_result,MYSQL_BOTH);
			require("show_pic.php");
		?>        </td>
        </tr>
      <? } ?>
   <? } ?>
   <? } ?>
   </table>
   
 
    <?
if ($_SESSION[teacher_level]== 1 &&  $_GET[student] !=""){
?>
      <br>
      <hr style="height:1px;color=ECECEC;">
      <br>      
      <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="small">
	   <form action="upload.php?class_id=<?=$_GET[class_id]?>&student=<?=$_GET[student]?>&subjectid=<?=$_GET[subjectid]?>" method="post" enctype="multipart/form-data" name="upload_file">
        <tr bgcolor="ECECEC">
          <td colspan="2"><span class="style2"><span class="subHead">新增作品</span>：<span class="subHead"><a name="upload"></a></span></span></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">學生: </td>
          <td bgcolor="FFFFFF"><?=$get_rows[student_name]?>
              <input type="hidden" name="student_id" value="<?=$get_rows[student_id]?>">
          </td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">班別:</td>
          <td bgcolor="FFFFFF"><?=$get_rows[class_name]?>
          </td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">作品類別: </td>
          <td bgcolor="FFFFFF"><select name="study_type_id" id="study_type_id">
              <?
			require_once("../../php-bin/get_study_type_selection.php");
		        require_once("../../php-bin/get_study_type_select_html.php");
                    ?>
          </select></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">科目:</td>
          <td bgcolor="FFFFFF"><select name="subjectid" id="subjectid">
              <?
                    	$sql = " And (TYPE = 'ALL' or  TYPE = 'RE')" ;
			require_once("../../php-bin/get_subject_selection.php");
		        $check_selected = $_GET[subjectid];
			for ($i=0;$i<count($subject_list);$i++){ 
			?>
              <option value="<?=$subject_list[$i]["subject_id"]?>"
			<?              
				if ($check_selected==$subject_list[$i]["subject_id"]){
					echo $subject_list[$i]["subject_id"];
					echo " selected";
	
				}
			?>
			>
              <?=$subject_list[$i]["subject_name"]?>
              </option>
              <? } ?>
          </select></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">年份:</td>
          <td bgcolor="FFFFFF"><input name="year" type="text" id="year" value="<?=date(Y);?>" size="5" maxlength="4"> </td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">檔案: </td>
          <td bgcolor="FFFFFF"><input type="file" name="file1"></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">档案尺寸:</td>
          <td bgcolor="FFFFFF">4:3<input name="file_size_type" type="radio" checked value="A" >4:6<input name="file_size_type" type="radio" value="B" ></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">作品名稱:</td>
          <td bgcolor="FFFFFF"><input name="name1" type="text" value="" size="40"></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">描述作品:</td>
          <td bgcolor="FFFFFF"><textarea name="desc1" cols="40" rows="3" id="desc"></textarea></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">作品短評:</td>
          <td bgcolor="FFFFFF"><textarea name="t_desc1" cols="40" rows="3" id="t_desc"></textarea></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">最新消息:</td>
          <td bgcolor="#FFFFFF"><input id='is_news' name="is_news" type="radio" value="Y">
是
  <input id='is_news' name="is_news" type="radio" value="N" checked>
否</td>
        </tr>
        <tr id='banner_tr1' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC">&nbsp;横幅显示:</td>
          <td height="18"><input name="is_banner" type="radio" value="Y">
            是
              <input name="is_banner" type="radio" value="N" checked>
          否</td>
        </tr>
        <tr id='banner_tr2' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;横幅图片:</font></td>
          <td height="18"><font class="style8">
            <input type="file" name="file_banner">
          </font></td>
        </tr>
        <tr id='banner_tr3' style='display:none;' bgcolor="FFFFFF">
          <td height="18" bgcolor="ECECEC"><font class="style8">&nbsp;横幅排序:</font></td>
          <td height="18"><font class="style8">
            <input name="banner_order" type="text" size="10" maxlength="80" value='10'>(數字越小越靠前)
          </font></td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">類別:</td>
          <td bgcolor="#FFFFFF">
		  <select name="web_type" id="web_type">
              <?
			require_once("../../php-bin/get_web_type_selection.php");
		        require_once("../../php-bin/get_web_type_select_html.php");
                    ?>
		  </select>
		  </td>
        </tr>
        <tr>
          <td bgcolor="ECECEC">&nbsp;</td>
          <td bgcolor="ECECEC">
			  <input type="submit" name="Submit" value="    確定新增    ">
              <input type="reset" name="Submit2" value="重設">
		  </td>
        </tr>
		</form>
      </table>
    
  <? } ?>
  <?// } ?>
  </td>
	  <td valign='top'>
		<div style='width:200px;'>
			<table border="0" cellpadding="5" cellspacing="0">
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>上傳學生作品提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>上傳作品前，需首先選擇XX班級XXX同學，然後才能進行學生作品的操作</td>
				</tr>
				<tr>
					<td colspan='2'><span style='color:#0000FF;'>修改學生作品提示：</span></td>
				</tr>
				<tr>
					<td valign='top'><span style='color:red;'>*</span></td>
					<td>修改學生作品請在學生作品欄內，選擇對應作品點擊修改，跳轉至修改頁進行修改。<span style='color:red;'>如無需新增作品，切勿在新增作品區進行操作。</span></td>
				</tr>
			</table>
		</div>
	  </td>
  </tr>
</table>
<br>

  </table>

<?php } ?>

<script>
change_student(1);
</script>
</body>
</html>
