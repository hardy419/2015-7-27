<?
// admin checking
require_once("../../php-bin/admin_check.php");
require_once("../../php-bin/function.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>新增班別</title>
<link href="../../js/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="change_class" method="post" action="change_process.php">
  <p>&nbsp;</p>
  <table border="0" cellpadding="0" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="100%" height="40" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td height="40" class="style3"><div align="left"><strong>班別升級</strong></div></td>
          </tr>
        </table>
        <table border="1" cellpadding="5" cellspacing="0" class="admin_maintain_form_table">
          <tr class="admin_maintain_form_header"> 
            <td width="649" height="28" class="admin_maintain_form_header">&nbsp;</td>
          </tr>
          <tr class="admin_maintain_form_contents"> 
            <td class="admin_maintain_form_contents"><table width="100%" height="218" border="0" cellpadding="3" cellspacing="2" class="small">
                <tr> 
                  <td width="10%" height="25" align="right">&nbsp;</td>
                  <td width="27%">班別</td>
                  <td width="48%">更改班別名稱為</td>
                  <td width="15%">年級更改為</td>
                </tr>
                <tr> 
                  <td height="25" align="right">一年級</td>
                  <td> 
					<?
						$get_sql = "SELECT class_name FROM tbl_class where year = 1 order by class_name";
						$get_result = mysql_query($get_sql, $link_id);
						$count = 0;
						$textfieldy1='';
						while ($row = mysql_fetch_assoc($get_result)) {
						echo $row["class_name"];
						   $classname[$count] = $row["class_name"];
						   $count++;
						
						$textfieldy1.=  sprintf('<input type="text" name="year[]" value="">',,,);
						
						}
					?>
                  </td>
                  <td>
                    <?=$print_class_html?>
                  </td>
                  <td> 
                    <?
                  if ($year_count !=0){
                  ?>
                    <select name="year1">
                      <option value="1">一年級</option>
                      <option value="2" selected>二年級</option>
                      <option value="3">三年級</option>
                      <option value="4">四年級</option>
                      <option value="5">五年級</option>
                      <option value="6">六年級</option>
                    </select> 
                    <?
                  }
                  else{
                  	echo "-";
                  }
                  ?>
                  </td>
                </tr>
                <tr> 
                  <td height="25" align="right">二年級</td>
                  <td> 
                    <?
                  $show_year = 2;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?>
                  </td>
                  <td>
                    <?=$print_class_html?>
                  </td>
                  <td> 
                    <?
                  if ($year_count !=0){
                  ?>
                    <select name="year2">
                      <option value="1">一年級</option>
                      <option value="2">二年級</option>
                      <option value="3" selected>三年級</option>
                      <option value="4">四年級</option>
                      <option value="5">五年級</option>
                      <option value="6">六年級</option>
                    </select> 
                    <?
                  }
                  else{
                  	echo "-";
                  }
                  ?>
                  </td>
                </tr>
                <tr> 
                  <td height="25" align="right">三年級</td>
                  <td> 
                    <?
                  $show_year = 3;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?>
                  </td>
                  <td>
                    <?=$print_class_html?>
                  </td>
                  <td> 
                    <?
                  if ($year_count !=0){
                  ?>
                    <select name="year3">
                      <option value="1">一年級</option>
                      <option value="2">二年級</option>
                      <option value="3">三年級</option>
                      <option value="4" selected>四年級</option>
                      <option value="5">五年級</option>
                      <option value="6">六年級</option>
                    </select> 
                    <?
                  }
                  else{
                  	echo "-";
                  }
                  ?>
                  </td>
                </tr>
                <tr> 
                  <td height="25" align="right">四年級</td>
                  <td> 
                    <?
                  $show_year = 4;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?>
                  </td>
                  <td>
                    <?=$print_class_html?>
                  </td>
                  <td> 
                    <?
                  if ($year_count !=0){
                  ?>
                    <select name="year4">
                      <option value="1">一年級</option>
                      <option value="2">二年級</option>
                      <option value="3">三年級</option>
                      <option value="4">四年級</option>
                      <option value="5" selected>五年級</option>
                      <option value="6">六年級</option>
                    </select> 
                    <?
                  }
                  else{
                  	echo "-";
                  }
                  ?>
                  </td>
                </tr>
                <tr> 
                  <td height="25" align="right">五年級</td>
                  <td> 
                    <?
                  $show_year = 5;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?>
                  </td>
                  <td>
                    <?=$print_class_html?>
                  </td>
                  <td> 
                    <?
                  if ($year_count !=0){
                  ?>
                    <select name="year5">
                      <option value="1">一年級</option>
                      <option value="2">二年級</option>
                      <option value="3">三年級</option>
                      <option value="4">四年級</option>
                      <option value="5">五年級</option>
                      <option value="6" selected>六年級</option>
                    </select> 
                    <?
                  }
                  else{
                  	echo "-";
                  }
                  ?>
                  </td>
                </tr>
                <tr> 
                  <td height="25" align="right">六年級</td>
                  <td> 
                    <?
                  $show_year = 6;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?>
                  </td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr> 
                  <td height="25" align="right" class="style5">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td> <input type="submit" name="Submit" value="更改"> <input type="reset" name="Submit2" value="重設"></td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr class="admin_maintain_form_footer"> 
            
<td height="28" class="admin_maintain_form_footer"></td>
          </tr>
        </table></td>
    </tr>
  </table>
  </form>
<p>&nbsp;</p>
</body>
</html>
