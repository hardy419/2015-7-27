<?php 
/*消息提醒*/
function Msg($status){
	switch ($status){
		case 1:
			$msg='增加成功!';
		break;
		case 2:
			$msg='增加失敗';
		break;
		case 3:
			$msg='更新成功!';
		break;
		case 4:
			$msg='更新失敗';
		break;
		case 5:
			$msg='刪除成功！';
		break;
		case 6:
			$msg='刪除失敗';
		break;
		default:
		   $msg="操作失誤";
	}
	
	return $msg;
}

?>