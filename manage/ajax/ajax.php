<?php
require_once("../_inc.php");
$PKey = $_REQUEST["PKey"];
$RType = $_REQUEST["RType"];

If ($RType !=""){
	$list = "";
	switch ($RType) {
		case 'Class2':
			$sql = 'SELECT PKey, strName From dbclass2 Where Class1_PKey= :Class1_PKey Order By Sort';
			$rs = new recordset($sql,array(sqlFilter($PKey,"int")));
			while (! $rs->eof){
				$list .= "{ID:'".$rs->field("PKey")."',Name:'".$rs->field("strName")."'},";
				$rs->movenext();
			}
			break;
		case 'Class3':
			$sql = 'SELECT PKey, strName From dbclass3 Where Class2_PKey= :Class2_PKey Order By Sort';
			$rs = new recordset($sql,array(sqlFilter($PKey,"int")));
			while (! $rs->eof){
				$list .= "{ID:'".$rs->field("PKey")."',Name:'".$rs->field("strName")."'},";
				$rs->movenext();
			}
			break;
	}

	if (strlen($list) > 2){
		$list = substr($list,0,strlen($list)-1);
		$list = "{data:[". $list. "]}";	
	}
	echo $list; 	
}
?>