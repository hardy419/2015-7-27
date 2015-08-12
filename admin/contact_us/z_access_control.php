<?php

if( ! session_id() )

	session_start();





if( ($_SESSION["admin_login"]|0)<=0 || ($_GET['type']=='T'&&($_SESSION["access_calendar"]|0)==0) || ($_GET['type']!='T'&&($_SESSION["access_news"]|0)==0) )

{

	exit();

}



?>