<?php
global $Table;
$Table = array();
//=====================================Tourist No Insurance Code============================//
$Table[] = array();
$TableLine = (count($Table) -1);
$Table[$TableLine]["Name"] = "field_table";
$Table[$TableLine]["Limit"] = 10;
$Table[$TableLine]["CountSQL"] = "Select Count(*) From " . $Table[$TableLine]["Name"] ;
$Table[$TableLine]["SQL"] = "Select * From " . $Table[$TableLine]["Name"] ;

//$Table[$TableLine]["OrderSQL"] = "Order By News_Date DESC";

$Table[$TableLine]["SearchAry"] = array();

$Table[$TableLine]["ErrorHeader"] = "index.php";

$Table["Field"] = &$Table[$TableLine];


?>