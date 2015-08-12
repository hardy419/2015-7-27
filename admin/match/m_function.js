

// add student from <select>
function AddStudent1( )
{
	if( document.form1.m_student1.selectedIndex == -1 )
		return;

	var opt_obj = document.form1.m_student1.options[document.form1.m_student1.selectedIndex];

	var StudentID = opt_obj.s_id; // Student ID
	var StudentName = opt_obj.s_name; // Student Name
	var StudentClassID = opt_obj.c_id; // Student Class ID
	var StudentClassName = opt_obj.c_name; // Student Class Name
	var StudentOutsidePraise = document.form1.m_outside_praise.value; // Student Outside Praise
	var StudentInsidePraise = document.form1.m_inside_praise.value; // Student Inside Praise

	if( Search_Student_Exist_In_Add_Ary( StudentName, StudentClassName, StudentOutsidePraise, StudentInsidePraise ) )
		return;

	Add_Student_To_Table(StudentID, StudentName, StudentClassID, StudentClassName, false, StudentOutsidePraise, StudentInsidePraise);
}


// add student from the <input>
function AddStudent2()
{
	var StudentName = document.form1.m_student2.value; // Student Name
	var StudentClassID = "";
	var StudentClassName = document.form1.m_class2.value; // Student Class Name
	var StudentOutsidePraise = document.form1.m_outside_praise.value; // Student Outside Praise
	var StudentInsidePraise = document.form1.m_inside_praise.value; // Student Inside Praise

	if( StudentName=="" || StudentClassName=="" )
		return;

	if( Search_Student_Exist_In_Add_Ary( StudentName, StudentClassName, StudentOutsidePraise, StudentInsidePraise ) )
		return;

	Add_Student_To_Table("", StudentName, "", StudentClassName, false, StudentOutsidePraise, StudentInsidePraise);
}



// add student to table and to the Student_Add_Ary
function Add_Student_To_Table( StudentID, StudentName, StudentClassID, StudentClassName, NoAdd_to_Student_Add_Ary, StudentOutsidePraise, StudentInsidePraise )
{
	// Add to Student_Add_Ary
	if( ! NoAdd_to_Student_Add_Ary )
	{
		var count = Student_Add_Ary[0].length;
		Student_Add_Ary[0][count] = StudentID;
		Student_Add_Ary[1][count] = StudentName;
		Student_Add_Ary[2][count] = StudentClassID;
		Student_Add_Ary[3][count] = StudentClassName;
		Student_Add_Ary[4][count] = StudentOutsidePraise;
		Student_Add_Ary[5][count] = StudentInsidePraise;
	}

	// add Student To Table
	var newTr = document.getElementById('AddStudentInfo').insertRow(-1);
	var newTd0 = newTr.insertCell(0); // subject
	var newTd1 = newTr.insertCell(1); // rank
	var newTd2 = newTr.insertCell(2); // class name
	var newTd3 = newTr.insertCell(3); // student name
	var newTd4 = newTr.insertCell(4); // Arrow up and down
	var newTd5 = newTr.insertCell(5); // close

	var tempInputID =  document.createElement("input");
	tempInputID.name = "student_id_ary[]";
	tempInputID.type = "hidden";

	var tempInput0 =  document.createElement("input");
	tempInput0.name = "student_outside_praise_ary[]";
	tempInput0.style.width = "100%";
	tempInput0.style.border = 0;
	tempInput0.value = StudentOutsidePraise;//////////
	newTd0.appendChild(tempInputID);
	newTd0.appendChild(tempInput0);

	var tempInput1 =  document.createElement("input");
	tempInput1.name = "student_inside_praise_ary[]";
	tempInput1.style.width = "100%";
	tempInput1.style.border = 0;
	tempInput1.value = StudentInsidePraise;///////////
	newTd1.appendChild(tempInput1);

	var tempInput2 =  document.createElement("input");
	tempInput2.name = "student_class_name_ary[]";
	tempInput2.style.textAlign = "center";
	tempInput2.style.width = "100%";
	tempInput2.style.border = 0;
	tempInput2.value = StudentClassName;/////////////
	newTd2.appendChild(tempInput2);
	newTd2.StudentClassName = StudentClassName;
	newTd2.StudentName = StudentName;

	var tempInput3 =  document.createElement("input");
	tempInput3.name = "student_name_ary[]";
	tempInput3.style.textAlign = "center";
	tempInput3.style.width = "100%";
	tempInput3.style.border = 0;
	tempInput3.value = StudentName;//////////
	newTd3.appendChild(tempInput3);

	newTd4.innerHTML= '<img border="0" src="../../images/arrow_up.gif" width="12" height="10" onclick="MoveStudent(0, this.parentNode.parentNode)" onmouseover="this.style.cursor=\'hand\'"><br><img border="0" src="../../images/arrow_down.gif" width="12" height="10" onclick="MoveStudent(1, this.parentNode.parentNode)" onmouseover="this.style.cursor=\'hand\'">';

	newTd5.innerHTML= '<a href="#" onclick="if(window.confirm(\'你確定要刪除嗎?\')){DelStudent(this.parentNode.parentNode)}"><img src="../icons/del.gif" alt="刪除" width="16" height="16" border="0"></a>';
}




// Del student from the  "Add array" and make it disappear in the <table>
function DelStudent( TrObj )
{
	var index = Search_Index_In_Add_Ary( TrObj.childNodes[0].StudentName, TrObj.childNodes[0].StudentClassName );

	// Delete student info from Student_Add_Ary
	Student_Add_Ary[0].splice( index, 1 );
	Student_Add_Ary[1].splice( index, 1 );
	Student_Add_Ary[2].splice( index, 1 );
	Student_Add_Ary[3].splice( index, 1 );
	Student_Add_Ary[4].splice( index, 1 );
	Student_Add_Ary[5].splice( index, 1 );

	TrObj.parentNode.deleteRow(TrObj.rowIndex);
}




// check if the student has add to the Student_Add_Ary or not.
function Search_Student_Exist_In_Add_Ary( StudentName, StudentClassName, Outside_praise, Inside_praise )
{
	var len = Student_Add_Ary[0].length;

	for(i=0; i<len; i++ )
	{
		if( Student_Add_Ary[1][i]==StudentName && Student_Add_Ary[3][i]==StudentClassName && Student_Add_Ary[4][i]==Outside_praise && Student_Add_Ary[5][i]==Inside_praise  )
			return true;
	}
	return false;
}



// check
// get the index of the student in  Student_Add_Ary.
function Search_Index_In_Add_Ary( student_name, student_className )
{
	var count = Student_Add_Ary[0].length;

	for( i=0; i<count; i++ )
	{
		if( Student_Add_Ary[1][i]==student_name && Student_Add_Ary[3][i]==student_className )
			return i;
	}
	return -1;
}















// run when you choose other class of the school.
function StudentClass_SelectObj_Change( ClassObj, SelectObj )
{
	var new_class_id = ClassObj.value;
	var pre_class_id = ClassObj.preClassID;

	if( new_class_id != pre_class_id )
	{
		Clear_All_Select_Option( SelectObj );
		makeRequest( new_class_id, SelectObj );
	}
	ClassObj.preClassID = ClassObj.value;
}



// add all student name to the <option>
function Add_All_Student( SelectObj )
{
	makeRequest( 0, SelectObj );
}


// add student name which belong to some class_id   to the <option>
function Add_Selection( SelectObj, class_id )
{
	for( i=0; i<Student_Count; i++ )
	{
		if( Student_Info_Ary[2][i] == class_id )
		{
			opt = document.createElement('OPTION');
			opt.text = Student_Info_Ary[1][i]; // student name
			opt.value = Student_Info_Ary[3][i]; // student class name
			SelectObj.options.add(opt, SelectObj.length);
		}
	}
}








function MoveStudent( arrow, TrObj )
{
	var iTbody = TrObj.parentNode;
	var index = TrObj.rowIndex-1; //  TrObj.rowIndex=0(title)

	if( arrow==0 && index>0 ) // move up
	{
		Student_Add_Ary[0].moveUp(index);
		Student_Add_Ary[1].moveUp(index);
		Student_Add_Ary[2].moveUp(index);
		Student_Add_Ary[3].moveUp(index);
		Student_Add_Ary[4].moveUp(index);
		Student_Add_Ary[5].moveUp(index);

		iTbody.insertBefore(TrObj, TrObj.previousSibling);
	}
	else if( arrow==1 && TrObj!=iTbody.lastChild ) // move down
	{
		Student_Add_Ary[0].moveDown(index);
		Student_Add_Ary[1].moveDown(index);
		Student_Add_Ary[2].moveDown(index);
		Student_Add_Ary[3].moveDown(index);
		Student_Add_Ary[4].moveDown(index);
		Student_Add_Ary[5].moveDown(index);

		iTbody.insertBefore(TrObj.nextSibling, TrObj);
	}
}












function CheckForm()
{
	MSG = [];

	if( document.form1.match_name.value==""  )
		MSG[MSG.length] = "請填 比賽名稱";
	if( document.form1.match_year.value==""  )
		MSG[MSG.length] = "請填 得獎年份";

	if( MSG.length > 0 )
	{
		alert(MSG.join("\n"));
		return false;
	}
	return true;
}

