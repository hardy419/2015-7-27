<?
// admin checking
require_once("../../php-bin/admin_check.php");

require("class_selection.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>班級管理 </title>
<link href="../../js/style.css" rel="stylesheet" type="text/css">
<script language="javascript" >
<!--
function updateconfirm(){
	var message = "真的要變更嗎?";
	if(!confirm(""+message)){
		return false;
	}
	return true;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>

  <p><span class="title"><img src="admin_label.gif" width="500" height="35"></span></p>
  <table width="650" border="0" cellpadding="5" cellspacing="0" class="table1">
  
    <tr> 
      <td  valign="top"> 
	  <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="CCCCCC" class="small">
      <form name="change_class" method="post" action="change_process.php" onSubmit="return updateconfirm();">
	      <tr bgcolor="ECECEC">
            <td colspan="3" class="subHead">班別升級</td>
          </tr>
          <tr bgcolor="ECECEC">
            <td align="left" bgcolor="ECECEC">&nbsp;</td>
            <td>班別</td>
            <td>更改班別名稱為</td>
          </tr>
          <tr>
            <td align="left" bgcolor="ECECEC">一年級</td>
            <td bgcolor="FFFFFF"><?
                  $get_rows=mysql_fetch_array($get_result,MYSQL_BOTH);
                  $show_year = 1;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?></td>
            <td bgcolor="FFFFFF"><?=$print_class_html?>
            <input type="hidden" name="year1" value="2"></td>
          </tr>
          <tr>
            <td align="left" bgcolor="ECECEC">二年級</td>
            <td bgcolor="FFFFFF"><?
                  $show_year = 2;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?></td>
            <td bgcolor="FFFFFF"><?=$print_class_html?>
            <input name="year2" type="hidden" id="year2" value="3"></td>
          </tr>
          <tr>
            <td align="left" bgcolor="ECECEC">三年級</td>
            <td bgcolor="FFFFFF"><?
                  $show_year = 3;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?></td>
            <td bgcolor="FFFFFF"><?=$print_class_html?>
            <input name="year3" type="hidden" id="year3" value="4"></td>
          </tr>
          <tr>
            <td align="left" bgcolor="ECECEC">四年級</td>
            <td bgcolor="FFFFFF"><?
                  $show_year = 4;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?></td>
            <td bgcolor="FFFFFF"><?=$print_class_html?>
            <input name="year4" type="hidden" id="year4" value="5"></td>
          </tr>
          <tr>
            <td align="left" bgcolor="ECECEC">五年級</td>
            <td bgcolor="FFFFFF"><?
                  $show_year = 5;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?></td>
            <td bgcolor="FFFFFF"><?=$print_class_html?>
            <input name="year5" type="hidden" id="year5" value="6"></td>
          </tr>
          <tr>
            <td align="left" bgcolor="ECECEC">六年級</td>
            <td bgcolor="FFFFFF"><?
                  $show_year = 6;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?></td>
            <td bgcolor="FFFFFF"><?=$print_class_html?>
              <input name="year6" type="hidden" id="year6" value="7"></td>
          </tr>
          <tr>
            <td align="left" bgcolor="ECECEC">七年級</td>
            <td bgcolor="FFFFFF"><?
                  $show_year = 7;
		  require("show_class_html.php"); // load the class name and html (year 1)
                  echo $print_class_name;
                  ?></td>
            <td bgcolor="FFFFFF"><input name="year7" type="hidden" id="year7" value="7">
            -</td>
          </tr>
          <tr bgcolor="ECECEC">
            <td colspan="3" align="center" class="style5"><input type="submit" name="submit1" value="升級">
            <input type="submit" name="submit" value="重設">
					  <button type='button' onclick='javascript:history.go(-1);'>返回</button></td>
          </tr>
	    </form>
        </table></td>
    </tr>
</table>

</body>
</html>
