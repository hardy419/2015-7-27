<html>
<head>
<title>班級管理 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="StyleSheet" TYPE="text/css" HREF="../../js/style.css">
<style type="text/css">
<!--
.style5 {color: #666666}
-->
</style>
</head>
<script src="../../js/validation.js"></script>
<script lang="javascript">

<!--



    function check_valid() {



    	var sErrorMsg;



    	sErrorMsg='';

    	sErrorMsg=FieldValidation('班別名稱',document.add_class.class_name.value,'',true,20);



    	if (sErrorMsg.length>0)

    	{

    		displayErrorMessage(sErrorMsg);

    		return false;

    	}

    }



//-->

</script>

</head>

<body>

  <p class="title"><img src="admin_label.gif" width="500" height="35"></p>
  <table border="0" cellpadding="0" cellspacing="0" class="table1">
    <tr> 
      <td  valign="top"> <table width="650" height="40" border="0" cellpadding="5" cellspacing="0">
          <tr> 
            <td height="40" class="style3"><div align="left">
              <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" class="small">
                <tr bgcolor="ECECEC">
                  <td colspan="2" class="subHead">新增班別 </td>
                </tr>
                <form name="add_class" method="post" action="add_process.php" onSubmit="return check_valid();">
                  <tr bgcolor="FFFFFF">
                    <td width="12%" align="right">班別名稱:</td>
                    <td><input name="class_name" type="text" id="class_name" size="40" maxlength="20">                    </td>
                  </tr>
                  <tr bgcolor="FFFFFF">
                    <td align="right">年級:</td>
                    <td><select name="class_year" id="class_year">
                        <option value="1" selected>一年級</option>
                        <option value="2">二年級</option>
                        <option value="3">三年級</option>
                        <option value="4">四年級</option>
                        <option value="5">五年級</option>
                        <option value="6">六年級</option>
                        <option value="7">七年級</option>
                    </select></td>
                  </tr>
                  <tr valign="middle" bgcolor="ECECEC">
                    <td>&nbsp;</td>
                    <td><input type="submit" name="Submit" value="    確定新增    ">
                      <input type="reset" name="Submit2" value="重設">
					  <button type='button' onclick='javascript:history.go(-1);'>返回</button></td>
                  </tr>
                </form>
              </table>
            </div></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
 
</body>
</html>
