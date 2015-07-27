<?

for ($i=0;$i<count($type_list);$i++){ 
?>
<option value="<?=$type_list[$i]["type_id"]?>"
	<?              
	if ($type_selected==$type_list[$i]["type_id"] || !empty($web_type) && $web_type == $type_list[$i]["type_id"]){
		echo " selected";
	
	}
	?>
>	
<?=$type_list[$i]["type_name"]?>
</option>
<? } ?>