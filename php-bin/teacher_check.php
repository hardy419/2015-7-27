<?PHP
session_start();

if ($_SESSION['teacher_level'] != 1){

	header("Location:../");
}


?>