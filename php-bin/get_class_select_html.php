<?

for ($i=0;$i<count($class_list);$i++){ 
?>
<option value="<?=$class_list[$i]["class_name"]?>"
	<?              
	if ($check_selected==$class_list[$i]["class_id"]){
		echo " selected";
	
	}
	?>
>	
<?=$class_list[$i]["class_name"]?>
</option>
<? } ?>