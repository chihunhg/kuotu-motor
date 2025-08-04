<?php 
	//組合導回參數
	$str = "?Send=".urlencode("搜尋");
	if (SqlFilter($_REQUEST["Page"],"int") > 0)
		$str .= "&Page=".SqlFilter($_REQUEST["Page"],"int");
	if (SqlFilter($_REQUEST["Q_Class1"],"int") > 0)
		$str .= "&Class1=".SqlFilter($_REQUEST["Q_Class1"],"int");
	if (SqlFilter($_REQUEST["Q_Class2"],"int") > 0)
		$str .= "&Class2=".SqlFilter($_REQUEST["Q_Class2"],"int");
	if (SqlFilter($_REQUEST["Q_intLocal"],"int") > 0)
		$str .= "&intLocal=".SqlFilter($_REQUEST["Q_intLocal"],"int");
	if (SqlFilter($_REQUEST["manNo"],"int") > 0)
		$str .= "&manNo=".urlencode(SqlFilter($_REQUEST["manNo"],"int"));
	if (SqlFilter($_REQUEST["subNo"],"int") > 0)
		$str .= "&subNo=".urlencode(SqlFilter($_REQUEST["subNo"],"int"));
	if ($_REQUEST["Q_Keywords"] != "")
		$str .= "&Keywords=".urlencode(SqlFilter($_REQUEST["Q_Keywords"],"str"));
	if ($_REQUEST["Q_OpenDate"] != "")
		$str .= "&OpenDate=".urlencode(SqlFilter($_REQUEST["Q_OpenDate"],"str"));
	if ($_REQUEST["Q_EndDate"] != "")
		$str .= "&EndDate=".urlencode(SqlFilter($_REQUEST["Q_EndDate"],"str"));
	if ($_REQUEST["Q_OpenDate"] != "")
		$str .= "&OpenDate=".urlencode(SqlFilter($_REQUEST["Q_OpenDate"],"str"));
	if ($_REQUEST["Q_Upload"] != "")
		$str .= "&Upload=".urlencode(SqlFilter($_REQUEST["Q_Upload"],"str"));
	if ($_REQUEST["Album_PKey"] != "")
		$str .= "&Album_PKey=".SqlFilter($_REQUEST["Album_PKey"],"int");
	if ($_REQUEST["Q_intType"] != "")
		$str .= "&intType=".SqlFilter($_REQUEST["Q_intType"],"int");
	if ($_REQUEST["Q_intUse"] != "")
		$str .= "&intUse=".SqlFilter($_REQUEST["Q_intUse"],"int");
	//清除Session變數
	unset($_SESSION["PKey_".$ModuleNo]);
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('".$show."');";
	ECHO "location.href='list.php".$str."';";
	ECHO "</script>";
?>