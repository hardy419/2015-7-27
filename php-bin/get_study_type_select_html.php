<?

for ($i=0;$i<count($study_list);$i++){ 
?>
<option value="<?=$study_list[$i]["study_id"]?>"
	<?              
	if ($study_selected==$study_list[$i]["study_id"]){
		echo " selected";
	
	}
	?>
>	
<?=$study_list[$i]["study_name"]?>
</option>
<? } ?>