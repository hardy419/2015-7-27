<?
// admin checking
require_once("../../php-bin/admin_check.php");

require_once("../../php-bin/function.php");


?>



<script src="../../js/validation.js"></script>

<script lang="javascript">
<!--



function check_valid() {

	if (document.add_hw.file.value == ""){

	    	var sErrorMsg;
	   	sErrorMsg='';
	    	sErrorMsg=FieldValidation('家課內容',
	    	document.add_hw.u_text.value,'',true,12);
	    	if (sErrorMsg.length>0){
	    		displayErrorMessage(sErrorMsg);
	   		return false;
	    	}
	}
}
//-->

</script>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
</head>
<form method="POST" name="add_hw" action="add_process.php?classname=<?=$_GET[classname]?>" enctype="multipart/form-data" onsubmit="return check_valid();">
<body>
<table width="500" border="0" align="left" cellpadding="0" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="650" border="0" cellpadding="5" cellspacing="0">
          <tr> 
            <td class="style3"><div align="left">
              <table width="100%"  border="0" align="left" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
                <tr bgcolor="ECECEC">
                  <td colspan="2" class="subHead">新增家課資料</td>
                </tr>
                <tr>
                  <td width="82" height="18" bgcolor="ECECEC">&nbsp;日期:</td>
                  <td width="302" height="18" bgcolor="FFFFFF"><?=$_GET[date]?>
                      <input type="hidden" name="u_date" value="<?=$_GET[date]?>">
                  </td>
                </tr>
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;家課內容:</td>
                  <td height="18" bgcolor="FFFFFF"><input name="u_text" type=text class="style8" id="u_text" size="30">
                  </td>
                </tr>
				<!--
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;科目:</td>
                  <td height="18" bgcolor="FFFFFF"><select class="style8" name="u_subject">
                      <?
					  /*
					
                    	$sql = " And (TYPE = 'ALL' or  TYPE = 'HW')" ;
			require_once("../../php-bin/get_subject_selection.php");
		        $check_selected = $_GET[subjectid];
		        require_once("../../php-bin/get_subject_select_html.php");
				*/
                    ?>
                    </select>
                  </td>
                </tr>
				-->
				<!--
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;備註:</td>
                  <td height="18" bgcolor="FFFFFF"><textarea name="remark" id="remark"></textarea></td>
                </tr>
				-->
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;班別:</td>
                  <td height="18" bgcolor="FFFFFF"><select class="style8" name="u_class">
                      <?
                    	
			require_once("../../php-bin/get_class_selection.php");
			$check_selected = $_GET[classname];
		        for ($i=0;$i<count($class_list);$i++){ 
?>
                      <option value="<?=$class_list[$i]["class_name"]?>"
	<?              
	if ($check_selected==$class_list[$i]["class_name"]){
		echo " selected";
	
	}
	?>
>
                      <?=$class_list[$i]["class_name"]?>
                      </option>
                      <? } ?>
                      
                    ?>
                    </select>
                  </td>
                </tr>
				<!--
                <tr>
                  <td height="18" bgcolor="ECECEC">&nbsp;上載CVS:</td>
                  <td height="18" bgcolor="FFFFFF"><input name="file" type="file" class="small"></td>
                </tr>
				-->
                <tr>
                  <td bgcolor="ECECEC">&nbsp;</td>
                  <td bgcolor="ECECEC">
				  <?  //此引擎的小學科目分類不合用於中學，所以把科目分類取消, 預設使用"中文" ?>
				  <input name="u_subject" type="hidden" id="u_subject" value="中文">
                  <input name="submit" type=submit class="style8" value="確定新增">
                      <input name="back" type="button" class="style5" id="back" onClick="location.href='show.php?date=<?=$_GET[date]?>'" value="回上一頁">
                  </td>
                </tr>
              </table>
              <span style="font-weight: 400"><font size="4" face="萬用中特圓"></font></span></div></td>
          </tr>
        </table>
      </td>
    </tr>
</table>

</body>
</form>

</html>

