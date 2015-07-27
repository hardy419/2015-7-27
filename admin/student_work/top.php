<?
session_start();


require("../../php-bin/function.php");

require("../../php-bin/get_class_student.php");
?>

<script language="JavaScript" type="text/JavaScript">

    function change_student(){  
      var sel_class_index = document.show_work.class_id.selectedIndex;
      var sel_class_name = document.show_work.class_id[sel_class_index].value;
	var loaded = 0;	
	
      <? for ($i=0;$i<count($classname_list);$i++){ ?>
          if (sel_class_name=="<?=$classname_list[$i]["class_id"]?>"){
		<?		
            
            	$print = 0;           
            	$all_count =0; 
            	$list_print = "";
             for ($j=0;$j<count($class_list_student[$classname_list[$i]["class_id"]]);$j++){ 
            $list_print .= "
		document.show_work.student[". ($j+$start_list_num) . "].text = \"".$class_list_student[$classname_list[$i]["class_id"]][$j]["student_name"] ."\";
		document.show_work.student[".($j+$start_list_num) . "].value =\"".$class_list_student[$classname_list[$i]["class_id"]][$j]["student_id"]. "\";";
              	
             } 
             ?>
             document.show_work.student.length = <?=count($class_list_student[$classname_list[$i]["class_id"]])?>;
             <?
             echo $list_print;
                if ($print == 0){
              	?>
		document.show_work.student.selectedIndex = 0;
              	<?
              	}
            ?>
		loaded =1;
          }
      <? } ?>
      	if (loaded ==0){
      		document.show_work.student.length = 1;
		document.show_work.student[0].text = "沒有學生";
		document.show_work.student[0].value ="";				
	}
    }
</script>

<html>
<head>
<title>相片庫管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style2 {color: #006699}
.style5 {color: #666666}
-->
</style>
</head>
<body>
<img src="admin_label.gif" width="500" height="35"><br>
<p>請選擇你打算上載家課之學生 </p>
<form name="show_work" method="post" action="main.php" target="admin_upload_main">
  <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="136">班別: 
        <select name="class_id" id="class_id" onChange="change_student();">
          <option></option>
          <?
		//	require_once("../../admin_student/php-bin/get_class_selection.php");
	///	echo count($classname_list);

			$class_list = $classname_list;
			require_once("../../php-bin/get_class_select_html.php");
                    ?>
        </select> </td>
      <td width="182">學生名稱: 
        <select name="student" id="select">
        </select> </td>
      <td width="182"><input type="submit" name="Submit" value="送出"></td>
    </tr>
  </table>
  </form>
</body>
</html>
