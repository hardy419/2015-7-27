


function makeRequest( SelectObj, def_val )
{
	Clear_All_Select_Option(SelectObj);
	if (window.XMLHttpRequest)
	{            // browser: Mozilla, Safari, ...
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType)
			http_request.overrideMimeType('text/xml');
	}
	else if(window.ActiveXObject)
	{      // browser: IE
		try{ http_request = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch(e)
		{
			try{ http_request = new ActiveXObject("Microsoft.XMLHTTP"); }
			catch(e){}
		}
	}



	try
	{
		//fine, object for connection created, management stuff
		http_request.onreadystatechange = function()
		{
			if( http_request.readyState==4  )
			{
				DoSomething( http_request, SelectObj, def_val );
			}
		};   //setup receiver to handle incoming events
		http_request.open('POST', "w_get_sub_content.php?sub_id="+Now_Sub_Content_ID, true); //combine url here, using get method and asycn type connection
		http_request.send(null);
	}
	catch(e){ return false; }
}





function DoSomething( http_request, SelectObj, def_val )
{
	var xmlDoc = http_request.responseXML;
	var cell = xmlDoc.selectNodes('/data/elements');
	var opt, i;

	for( i=0; i<cell.length; i++ )
	{
		opt = document.createElement('OPTION');
		opt.text = cell[i].getAttribute('title');
		opt.value = cell[i].getAttribute('id');

		if( def_val == cell[i].getAttribute('id') )
			opt.selected = true;

		SelectObj.options.add(opt, SelectObj.length);
	}
}
