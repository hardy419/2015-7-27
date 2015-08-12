$(document).ready(function(){
	$('#dialog').dialog({modal:true,autoOpen:false,width:400,height:240,position:"center",resizable:false,"close":function(){$('#dialog_body').html( "" );},buttons: {"¨ú®ø": function() {$(this).dialog('close');},"Àx¦s": submit_content}});
	$(".day_box").dblclick(function(){
		var d={"d":$(this).attr("id")};
		win_open(d);
	});
});
function loading(){$("#dialog_body").html($("#ajax-loader-box").html());$("#dialog").dialog("open");}
function win_open(data){
	loading();
	$.get("edit_form.php",data,function(s){
		$("#dialog_body").html(s);
	});
}
function submit_content(){
	var url=$("#contentForm").attr("action");
	var d=$("#contentForm").serialize();
	$.post(url,d,function(s){
		if("success"==s){
			$("#c_"+$("#d").val()).html($("#content").val());
			$("#dialog").dialog('close');
		} else {
			$("#dialog_body").html(s);
		}
	});
}