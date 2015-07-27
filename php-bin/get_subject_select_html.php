<?

for ($i=0;$i<count($subject_list);$i++){ 
?>
<option value="<?=$subject_list[$i]["subject_name"]?>"
	<?              
	if ($check_selected==$subject_list[$i]["subject_id"]){
	echo $subject_list[$i]["subject_id"];
		echo " selected";
	
	}
	?>
>	
<?=$subject_list[$i]["subject_name"]?>
</option>
<? } ?>