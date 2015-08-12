




function Submit_Form( InputObj )
{
	var MSG = []

	if( document.form1.w_title.value=="" )
		MSG[MSG.length] = "請填寫標題";

	if( document.form1.w_hidden.value==1 && document.form1.link_to.selectedIndex==-1 )
		MSG[MSG.length] = "不能設為內頁";

	if( MSG.length > 0 )
	{
		alert(MSG.join("\n"));
		return false;
	}
}







// depth1   depth2   depth3

function init()
{
	Change_Link_To(Link_to_ID);
}





function Change_Link_To( def_id )
{

	if( document.form1.w_hidden.selectedIndex != 0 )
		//layer_link_to.style.display='block';
		layer_link_to.style.visibility='visible';
	else
		//layer_link_to.style.display='none';
		layer_link_to.style.visibility='hidden';

	makeRequest( document.form1.link_to, def_id );
}
