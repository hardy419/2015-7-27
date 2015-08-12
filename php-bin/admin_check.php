<?php

if( ! session_id() )

	session_start();





if( $_SESSION["admin_login"] != 1)

{





?><script language="javascript">





var win = window;

while( win.parent != win )

{

	win = win.parent;

}

win.location.href = "../../admin/index.php";





</script>

<?php





}



?>