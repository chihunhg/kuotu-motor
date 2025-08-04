<?php
require_once_once(dirname(dirname(dirname(__FILE__)))."/include/Conn.php");//引入文件
require_once_once(dirname(dirname(dirname(__FILE__)))."/include/Function.php");//引入文件
$EMail = SqlFilter($_REQUEST["EMail"],"str");
$RType = $_REQUEST["RType"];

if (CheckMail($EMail)) {
	switch ($RType) {
		case 1:
			$SQL = "Select PKey From member Where strID = '".$strID."'";
			$DR1 = new recordset($SQL);
			if (! $DR1->eof){
				echo "【會員帳號】重複";
			}
			break;
		case 2:
/* 		        $SQL = "Select * From customer Where strID = '".$strID."'";
			$rs = new recordset($SQL);
			if (! $rs->eof){
				echo $rs->field("PKey")."|".$rs->field("strName")."|".$rs->field("Tel_Local")."|".$rs->field("Tel")."|".$rs->field("Ext")."|".$rs->field("Mobile")."|"
				.$rs->field("strCounty1")."|".$rs->field("strCity1")."|".$rs->field("Address1")."|"
				.$rs->field("strCounty2")."|".$rs->field("strCity2")."|".$rs->field("Address2");
			}
			else {
				echo "【會員帳號】無資料";
			} */
			break;
	}
}else {
	echo "【會員帳號】格式錯誤";
}
?>