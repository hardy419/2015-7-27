<?php

if( ! session_id() )

	session_start();





if( ($_SESSION["admin_login"]|0)<=0 || ($_SESSION["access_headmaster"]|0)==0 )

{

	exit();

}



?>