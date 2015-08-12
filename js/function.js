
function Link_Copy(copyText)
{
     if (window.clipboardData) { // IE send-to-clipboard method.
          window.clipboardData.setData('Text', copyText);
          
     } else if (window.netscape) {
          // You have to sign the code to enable this or allow the action in about:config by changing user_pref("signed.applets.codebase_principal_support", true);
          netscape.security.PrivilegeManager.enablePrivilege('UniversalXPConnect');
          
          // Store support string in an object.
          var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
          if (!str) return false;
          str.data=copyText;
          
          // Make transferable.
          var trans = Components.classes["@mozilla.org/widget/transferable;1"].createInstance(Components.interfaces.nsITransferable);
          if (!trans) return false;
          
          // Specify what datatypes we want to obtain, which is text in this case.
          trans.addDataFlavor("text/unicode");
          trans.setTransferData("text/unicode",str,copyText.length*2);
          
          var clipid=Components.interfaces.nsIClipboard;
          var clip = Components.classes["@mozilla.org/widget/clipboard;1"].getService(clipid);
          if (!clip) return false;
          
          clip.setData(trans,null,clipid.kGlobalClipboard);
     }
}










// Written by David NG @ TC Globalwork
// arrayObj.splice(start, deleteCount, [item1[, item2[, . . . [,itemN]]]])
if( !Array.prototype.splice )
{
	function Array.prototype.splice( start, deleteCount )
	{
		var delobj = this.slice( start, start+deleteCount );
		var ostart = this.slice( 0, start );
		for( var i=0,j=ostart.length,k; i<j; this[i]=ostart[i++] );
		for( i=2, k=arguments.length; i<k; this[j++]=arguments[i++] );
		var oend = this.slice( start+deleteCount );
		for( i=0,k=oend.length; i<k; this[j++]=oend[i++] );
		this.length = j;
		return delobj;
	}
}


// Written by David NG @ TC Globalwork
// arrayObj.moveUp(index)
if( !Array.prototype.moveUp )
{
	function Array.prototype.moveUp( index )
	{
		if( index <= 0 )
			return false;

		var obj = this.slice( index-1, index+1 );
		this[index-1] = obj[1];
		this[index] = obj[0];
		return true;
	}
}

// Written by David NG @ TC Globalwork
// arrayObj.moveDown(index)
if( !Array.prototype.moveDown )
{
	function Array.prototype.moveDown( index )
	{
		if( index >= this.length-1 )
			return false;

		var obj = this.slice( index, index+2 );
		this[index+1] = obj[0];
		this[index] = obj[1];
		return true;
	}
}



/*
Browser Detecter 1.1
Written by David NG 
	@ TC Globalwork
	@ dwin.net
*/
function BrowserDetectClass()
{
	this.Agent           = navigator.userAgent.toLowerCase();
	this.appName         = navigator.appName.toLowerCase();
	this.RTPass          = false;
	this.Version         = 0;
	this.Gecko_Version   = 0;

	this.Is_Windows      = this.Agent.indexOf("window") != -1;
	this.Is_Linux        = this.Agent.indexOf("linux") != -1;
	this.Is_Mac          = this.Agent.indexOf("mac") != -1;

	this.Is_appFirefox   = this.appName.indexOf("firefox") != -1;
	this.Is_appNascape   = this.appName.indexOf("netscape") != -1;
	this.Is_appIE        = this.appName.indexOf("internet explorer") != -1;
	this.Is_appKonqueror = this.appName.indexOf("konqueror") != -1;

	this.Is_DHTML        = document.getElementById?true:false || document.all?true:false || document.layers?true:false;
	this.Is_DOM          = document.getElementById?true:false && document.createElement?true:false;

	this.Is_IE           = false;
	this.Is_Opera        = false;
	this.Is_Netscape     = false;
	this.Is_Firebird     = false;
	this.Is_Firefox      = false;
	this.Is_Mozilla      = false;
	this.Is_Konqueror    = false;
	this.Is_Gecko        = false;
	this.Is_HTMLEditor   = false;

	this.IE_PassVersion        = 4.01;
	this.Opera_PassVersion     = 7.21;
	this.Netscape_PassVersion  = 7.0;
	this.Firebird_PassVersion  = 0.6;
	this.Mozilla_PassVersion   = 1.6;
	this.Konqueror_PassVersion = 3.2;
	this.Gecko_PassVersion     = 20030312;
	this.IE_Editor_PassVersion = 5.5;



	if( this.Is_appIE )
	{
		this.Is_IE    = this.Agent.indexOf("msie") != -1;
		this.Is_Opera = this.Agent.indexOf("opera") != -1;
		if( this.Is_Opera )
			this.Version = GetVersion( "opera" );
		else
		{
			this.Version       = GetVersion( "msie" );
			this.Is_HTMLEditor = this.Version >= this.IE_Editor_PassVersion;
		}

		this.RTPass = ( ( this.Is_Opera && this.Version>=this.Opera_PassVersion ) || ( this.Is_IE && this.Version>=this.IE_PassVersion ) );
	}

	else if( this.Is_appNascape || this.Is_appFirefox )
	{
		this.Is_Netscape = this.Agent.indexOf("netscape") != -1;
		if( this.Is_Netscape )
			this.Version = GetVersion( "netscape" );

		this.Is_Firebird = this.Agent.indexOf("firebird") != -1;
		if( this.Is_Firebird )
			this.Version = GetVersion( "firebird" );

		this.Is_Firefox = this.Agent.indexOf("firefox") != -1;
		if( this.Is_Firefox )
			this.Version = GetVersion( "firefox" );

		this.Is_Mozilla = this.Agent.indexOf("debian") != -1;
		if( this.Is_Mozilla )
			this.Version = GetVersion( "debian" );

		this.RTPass = ( this.Is_Firefox || ( this.Is_Firebird && this.Version>=this.Firebird_PassVersion ) || ( this.Is_Netscape && this.Version>=this.Netscape_PassVersion ) || ( this.Is_Mozilla && this.Version>=this.Mozilla_PassVersion )  );

		this.Is_Gecko = this.Agent.indexOf("gecko") != -1;
		if( this.Is_Gecko )
		{
			this.Gecko_Version = GetVersion( "gecko" );
			this.RTPass = this.Is_HTMLEditor = this.Gecko_Version >= this.Gecko_PassVersion;
		}
	}

	else if( this.Is_appKonqueror )
	{
		this.Is_Konqueror = this.Agent.indexOf("konqueror") != -1;
		if( this.Is_Konqueror )
			this.Version = GetVersion( "konqueror" );

		this.RTPass = ( this.Is_Konqueror && this.Version>=this.Konqueror_PassVersion );
	}



	function GetVersion( str )
	{
		var iAgent     = navigator.userAgent.toLowerCase();
		var i          = iAgent.indexOf( str );
		var iLen       = iAgent.length;
		var iTemp      = 0;
		var iVersion   = "";

		for( ; i<iLen; i++ )
		{
			iTemp = iAgent.charAt(i);
			//if( ( iTemp>=0 && iTemp<=9 ) || ( iTemp=="." && iVersion.indexOf(".")==-1 ) )
			if( iTemp=="." && iVersion.indexOf(".")!=-1 )
				continue;
			if( ( iTemp>=0 && iTemp<=9 ) || iTemp=="." )
				iVersion += iTemp;
			else if( iVersion != "" )
				return iVersion;
		}
		return iVersion;
	}
}
var BrowserObj = new BrowserDetectClass();
















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




