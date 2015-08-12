<?php



for ($i=0;$i<count($class_list);$i++){ 

?>

<option value="<?php echo $class_list[$i]["class_name"]?>"

	<?php                

	if ($check_selected==$class_list[$i]["class_id"]){

		echo " selected";

	

	}

	?>

>	

<?php echo $class_list[$i]["class_name"]?>

</option>

<?php   } ?>