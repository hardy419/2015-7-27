<?php
$Content_Title = "µu¤ùºÞ²z";

function print_title()
{
	global $Content_Title;
	echo "<style>
		  .content_title 
		  {

		  font-family:Arial, Helvetica, sans-serif; 
		  }
		  </style>";
	echo "<h1 class='content_title'>".$Content_Title."</h1>";
}
?>