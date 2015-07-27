// JavaScript Document123

// 1. Returns the current date in mm/dd/yyyy format
var dtCh= "/";
var minYear=1900;
var maxYear=2100;

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}

function isDate(dtStr){
	var daysInMonth = DaysArray(12)
	var pos1=dtStr.indexOf(dtCh)
	var pos2=dtStr.indexOf(dtCh,pos1+1)
	var strMonth=dtStr.substring(0,pos1)
	var strDay=dtStr.substring(pos1+1,pos2)
	var strYear=dtStr.substring(pos2+1)
	strYr=strYear
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth)
	day=parseInt(strDay)
	year=parseInt(strYr)
	if (pos1==-1 || pos2==-1){
		//alert("The date format should be : mm/dd/yyyy")
		return false
	}
	if (strMonth.length<1 || month<1 || month>12){
		//alert("Please enter a valid month")
		return false
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		//alert("Please enter a valid day")
		return false
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		//alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear)
		return false
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		//alert("Please enter a valid date")
		return false
	}
return true
}

function ValidateForm(){
	var dt=document.frmSample.txtDate
	if (isDate(dt.value)==false){
		dt.focus()
		return false
	}
    return true
 }

function now() 
{ 
	var stDate; 
	var now; 
	now_date= new Date(); 
	stDate=(now_date.getMonth()+1)+"/"+now_date.getDate()+"/"+now_date.getYear(); 
	return(stDate); 
} 

// 1. Determines if a string has a valid email structure
// 2. Functionality from planet-source-code

function IsEmail(sFieldValue)
{
	var checkEmail = "@.";
	var checkStr = sFieldValue;
	var EmailValid = false;
	var EmailAt = false;
	var EmailPeriod = false;

	for (i = 0;  i < checkStr.length;  i++)
	{
		ch = checkStr.charAt(i);
		for (j = 0;  j < checkEmail.length;  j++)
		{
			if (ch == checkEmail.charAt(j) && ch == "@")
				EmailAt = true;
			if (ch == checkEmail.charAt(j) && ch == ".")
				EmailPeriod = true;
			if (EmailAt && EmailPeriod)
				break;
			if (j == checkEmail.length)
				break;
		}
		// if both the @ and . were in the string
		if (EmailAt && EmailPeriod)
		{
			EmailValid = true
			break;
		}
	}

	return(EmailValid);
}

// 1. Determines if a string is completely numeric
// 2. Functionality from Planet-Source-Code

function IsMobile(sFieldValue)
{
	if ((IsNumeric(sFieldValue)==true)&&(sFieldValue.length==8)) {
		return (true);
	} else {
		return (false);
	}	
}

function IsNumeric(sFieldValue)
{
	var checkOK = "0123456789.";
	var checkStr = sFieldValue;
	var allValid = true;
	var allNum = "";
	var dot_flag = 0;

	if (checkStr=="")
	{
		return(false);
	}
	for (i = 0;  i < checkStr.length;  i++)
	{
		ch = checkStr.charAt(i);

		for (j = 0;  j < checkOK.length;  j++)
		{
			if (ch == checkOK.charAt(j))
				break;
		}
		
		if (ch == "."){
            dot_flag++;
        }
		
		if (j == checkOK.length)
		{
			allValid = false;
			break;
		}

		if (ch != ",")
		{
			allNum += ch;
		}

		if (!allValid)
		{
			allValid =false;
		}
	}
	if (dot_flag>1)
		return(false);

	return(allValid);
}

// 1. Determine is a field value is numeric or an email
// 2. Checks if the field is required
// 3. Checks if the field length has exceeded the maximum size

function FieldValidation(sFieldName, sFieldValue, sRule, bRequired, maxLength)
{
	var sErrorMessage;
	
	sErrorMessage="";

	switch(sRule)
	{
		case "Date":
			if (sFieldValue!="") {
				if (isDate(sFieldValue)==false) {
					sErrorMessage+=sFieldName + " 不是正確日子";
				}
			}
			break;
		case "Numeric":
			if (sFieldValue!="") { 
				if (IsNumeric(sFieldValue)==false) {
					sErrorMessage+=sFieldName + " 不是數字 ";
				}
			}
			break;
		case "Email":
			if (IsEmail(sFieldValue)==false)
			{
				sErrorMessage+=sFieldName + " 不是電郵 ";
			}
			break;
		case "Mobile":
			if (sFieldValue!="") { 
				if (IsMobile(sFieldValue)==false) {
					sErrorMessage+=sFieldName + " 必定要八位數字，短訊功能只支援香港地區";
				}
			}
			break;
	}

	/*------------------------------------------check if field is required---------------------------*/
	if ( (bRequired==true) && (sFieldValue!=""))
	{
		if (sFieldValue.length==0)
		{
			sErrorMessage+=sFieldName + " 必需輸入";
		}
	}	
	else if ( (bRequired==true) && (sFieldValue==""))
	{
		sErrorMessage+=sFieldName + " 必需輸入";
	}
	/*------------------------------------check for maxlength--------------------------------------*/
	if ((sFieldValue!="") && (maxLength>0))
	{
		if (sFieldValue.length>maxLength)
		{
			sErrorMessage+=sFieldName + " 巳超出預設的 " + maxLength + " 字";
		}
	}

	return(sErrorMessage);
}

// 1. Displays the error message in a popup window

function displayErrorMessage(sErrorMsg) 
{
	alert("" + sErrorMsg + "");
//win = window.open(",", 'popup', 'height = 200 width=200 toolbar = yes  titlebar=yes status = no resizeable=yes scrollbars=yes');
//win.document.write("Data Validation Errors<br>");
//win.document.write("" + sErrorMsg + "");

}

function IsPassword(Pass, Pass_Confirm) {
	
	var sErrorMessage;
	sErrorMessage="";
	
	if (Pass!=Pass_Confirm) {
		sErrorMessage = "密碼和確認不相同，請從新輸入！"; 
	}	
	return(sErrorMessage);
}
