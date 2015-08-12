


function Select_Change( SelectObjAry, TrObjAry, nowSelectObj )
{
	var depth = nowSelectObj.depth;

	// Make all "BELOW TR Object" to hidden.
	for( var i=TrObjAry.length-1; i>depth; i-- )
		TrObjAry[i].style.visibility = "hidden";

	// Clear all Option in all "BELOW Select Object"
	for( var i=depth+1; i<SelectObjAry.length; i++ )
		Clear_All_Select_Option( SelectObjAry[i] );

	// Add new BELOW Select Object
	for( var i=depth; i<SelectObjAry.length; i++ )
	{
		if( SelectObjAry[depth].selectedIndex != -1 )
		{
			Add_Selection( SelectObjAry[depth+1], SelectObjAry[depth].options[SelectObjAry[depth].selectedIndex].value, TrObjAry[depth+1] );
		}
		else
			break;
	}
}



// $content_ary [ depth ] [ id, parent id, name ] [ record index of this depth ]
function Add_Selection( SelectObj, parent_id, TrObj, SelectedID )
{
	var depth = SelectObj.depth;
	var count = content_Ary[depth][0].length;
	var match_count = 0;

	if( SelectedID == "undefined" )
		SelectedID = 0;

	TrObj.style.visibility = "hidden";

	for( var i=0; i<count; i++ )
	{
		if( content_Ary[depth][1][i] == parent_id )
		{
			match_count++;
			opt = document.createElement('OPTION');
			opt.text = content_Ary[depth][2][i];	// name
			opt.value = content_Ary[depth][0][i];	// id
			SelectObj.options.add(opt, SelectObj.length);
			if( SelectedID == opt.value )
				opt.selected = true;
		}
	}

	if( match_count > 0 )
		TrObj.style.visibility = "visible";
}





// depth1   depth2   depth3
function init_select( SelectObjAry, TrObjAry )
{
	depth = 0;
	// Add new BELOW Select Object
	for( var i=depth; i<SelectObjAry.length; i++ )
	{
		if( SelectObjAry[depth].selectedIndex != -1 )
		{
			Add_Selection( SelectObjAry[depth+1], select_index_Ary[depth], TrObjAry[depth+1], select_index_Ary[depth+1] );
		}
		else
			break;
	}

	Add_Selection( SelectObjAry[0], 0, TrObj1, select_index_Ary[0] );
	if( select_index_Ary.length == 0 )
	{
		if( TrObj1.style.visibility != "hidden" )
		{
			Add_Selection( SelectObjAry[1], SelectObjAry[0].options[SelectObjAry[0].selectedIndex].value, TrObjAry[1] );
			if( TrObjAry[1].style.visibility != "hidden" )
				Add_Selection( SelectObjAry[2], SelectObjAry[1].options[SelectObjAry[1].selectedIndex].value, TrObjAry[2] );
		}
	}
	else
	{	
		if( select_index_Ary.length >= 2 )
			Add_Selection( SelectObjAry[1], select_index_Ary[0], TrObjAry[1], select_index_Ary[1] );
		if( select_index_Ary.length >= 3 )
			Add_Selection( SelectObjAry[2], select_index_Ary[1], TrObjAry[2], select_index_Ary[2] );
	}
}





// clear all <select> -> <option>
function Clear_All_Select_Option( SelectObj )
{
	while( SelectObj.length > 0 )
		Clear_Select_Option( SelectObj, 0 );
}

// clear one <select> -> <option>
function Clear_Select_Option( SelectObj, index )
{
	if( BrowserObj.Is_Firefox || BrowserObj.Is_Firebird ) // for FireFox
		SelectObj.remove(index);
	else // default for IE
		SelectObj.options.remove(index);
}

