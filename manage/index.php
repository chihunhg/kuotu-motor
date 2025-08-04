<?php
require_once("_inc.php");
if (strtolower($_REQUEST['Action']) == 'logout'){
	session_destroy();
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('你已執行登出動作');";
	ECHO "location.href='login/index.php';";
	ECHO "</script>";
	exit;
}

$sql = "select * From webcontrol Where strID = 'Admin'";	
$rs = new recordset($sql);
if ($rs->eof){
	$sql_query = new dbPDO();
	$table_name = 'webcontrol';

	$data_array['strName'] = '網站管理者';
	$data_array['intType'] = '1';
	$data_array['strID'] = 'Admin';
	$data_array['strPW'] = md5('brick4080');
	$data_array['FunctionID'] = '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15';
	$data_array['UserID'] = 'Admin';
	$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
	$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
	$sql_query->insert($table_name,$data_array);
	unset($data_array);
	$sql_query->close();
}

If ($_SESSION['Manage'] == 'Yes' && strlen($_SESSION["Login_ID"]) > 0){
	location_href("login/login.php");
	exit();
} else{
	location_href("login/index.php");
	exit();
}

$mainitem="index";
$subname=$pageTitle2; 
$is_list="1";
$unitprocess=$url_link.$pageTitle2;
?>