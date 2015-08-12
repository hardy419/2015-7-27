<?php

if( ! session_id() )

	session_start();





if( ($_SESSION["plk_user_type"]|0) == 0 )

{



	unset($_SESSION["plk_user_type"]);

	session_destroy();



	echo ("<script language='javascript'>");

	echo ("alert(\"Please login.\");");

	echo ("history.go(-1)");

	echo ("</script>");

	exit();



}



?>