<?php
require_once("../_inc.php");
if(is_numeric($_REQUEST['PKey'])){
	$PKey = $_REQUEST['PKey'];
}
//取出圖檔路徑
$sql = 'Select * From dbad Where PKey= :PKey';
$rs = new recordset($sql,array($PKey));
if (! $rs->eof){
	$ext = strtolower(substr(strrchr($rs->field("Photo1"),"."),1));
	$webp_file = str_ireplace($ext,'webp',$rs->field("Photo1"));
	DelFile('../../Upload/'.$rs->field("Forder").'/'.$rs->field("Photo1"));
	DelFile('../../Upload/'.$rs->field("Forder").'/'.$webp_file);
	$data_array['Forder'] = '';
	$data_array['Photo1'] = ''; 
	$table_name = 'dbad';
	$pdo = new dbPDO();			
	$pdo->update($table_name,$data_array,'PKey',$rs->field("PKey"));
	unset($data_array);
	$pdo->close();

	unset($data_array);
	$pdo->close();
	
	//寫入後台管理記錄
	manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);
	echo '1|OK';	
}
unset($Cond_Array);
$rs->close();
?>