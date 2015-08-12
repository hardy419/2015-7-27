


function makeRequest( class_id, SelectObj )
{
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
				DoSomething( http_request, SelectObj );
			}
		};   //setup receiver to handle incoming events
		http_request.open('POST', "m_get_student.php?class_id="+class_id, true); //combine url here, using get method and asycn type connection
		http_request.send(null);
	}
	catch(e){ return false; }
}





function DoSomething( http_request, SelectObj )
{
	var xmlDoc = http_request.responseXML;
	var cell = xmlDoc.selectNodes('/data/elements');
	var opt, i;

	for( i=0; i<cell.length; i++ )
	{
		opt = document.createElement('OPTION');
		opt.text = cell[i].getAttribute('name'); // student name
		opt.value = cell[i].getAttribute('class_name'); // student class name

		opt.s_id = cell[i].getAttribute('id'); // student id
		opt.s_name = cell[i].getAttribute('name'); // student name
		opt.c_id = cell[i].getAttribute('class_id'); // student class id
		opt.c_name = cell[i].getAttribute('class_name'); // student class name

		SelectObj.options.add(opt, SelectObj.length);
	}
}
