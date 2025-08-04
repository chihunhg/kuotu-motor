<?php 
if (is_numeric($_REQUEST['manNo'])){
	if ($_SESSION['manNo'] != $_REQUEST['manNo']){
		unset($_SESSION["subNo"]);
	}
	$_SESSION['manNo'] = $_REQUEST['manNo'];
} 

$page_link = explode('/',$_SERVER['REQUEST_URI']);
$page_link = end($page_link);
$name = '';
switch($page_link){
	case 'add.php':
	$name = '－新增';
	break;
	case 'update.php':
	$name = '－編輯';
	break;
	default:
	$name = '';
	break;
}

//取出主標題
$sql = "Select * from module_p Where PKey=".SqlFilter($_SESSION['manNo'],'int');
$rs = new recordset($sql);
if (! $rs->eof){
	$Module_PKey = $rs->field("PKey");
	$manNo = $rs->field("PKey");
	$Module_Name = $rs->field("strName");
	$Layer = $rs->field("intLayer");
	$Colum = $rs->field("intColum");
	$intUse = $rs->field("intUse");
	$intList = $rs->field("intList");
	$intDetail = $rs->field("intDetail");
	$MaxQ = $rs->field("MaxQ");
	$subname=$Module_Name."：".$Module_Name.$mgw1;
	if($Layer < 1){
	$subname=$Module_Name.$mgw1.$name;
	}
}

//取預設子單元
if (empty($_SESSION['subNo'])){
	$sql = "Select * from module_d Where Module_PKey=".SqlFilter($Module_PKey,'int')." Order By Sort  limit 1 ";
	$rs = new recordset($sql);
	if (! $rs->eof){
		$Module_PKey = $rs->field("Module_PKey");
		$manNo = $rs->field("Module_PKey");
		$_SESSION['subNo'] = $rs->field("PKey");
	}
}

if (is_numeric($_REQUEST['subNo'])){
	$_SESSION['subNo'] = $_REQUEST['subNo'];
}

//取出子標題
$sql = "Select * from module_d Where PKey=".SqlFilter($_SESSION['subNo'],'int');
$rs = new recordset($sql);
if (! $rs->eof && $Layer > 1){
	$Module_PKey = $rs->field("Module_PKey");
	$manNo = $rs->field("Module_PKey");
	$subNo = $rs->field("PKey");
	$subname     = $Module_Name."：".$rs->field("strName").$mgw1.$name;
}

if (! in_array($manNo,explode(",",$_SESSION["FunctionID"])) && $_SESSION["Login_ID"] != "Admin"){
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('無進入[".$Module_Name."]權限!');";
	ECHO "location.href='../index.php';";
	ECHO "</script>";
	exit;
}

//取出子單元的css名稱
$Class_Name = array();
$i = 0;
$sql = "Select strName from module_d Where Module_PKey = ".SqlFilter($Module_PKey,'int')." Order By Sort";
$rs = new recordset($sql);
while (! $rs->eof){
	$i++;
	$Class_Name[$i] = $rs->field("strName");
	if ($i==$Layer){
		break;
	}
$rs->movenext();
}

//取出產品欄位名稱
$Colum_Name = array();
$i = 0;
$sql = "Select strName from module_c Where Module_PKey = ".SqlFilter($Module_PKey,'int')." Order By Sort";
$rs = new recordset($sql);
while (! $rs->eof){
	$i++;
	$Colum_Name[$i] = $rs->field("strName");
	if ($i>$Colum){
		break;
	}
$rs->movenext();
}

$sql = "Select Photo1 from program_img Where intType = 1 and Sort=".SqlFilter($intList,'int')." and intUse=".SqlFilter($intUse,'int');
$rs1 = new recordset($sql);
if(! $rs1->eof){
	$list_img = $rs1->field("Photo1");
}
$sql = "Select Photo1 from program_img Where intType = 2 and Sort=".SqlFilter($intDetail,'int')." and intUse=".SqlFilter($intUse,'int');
$rs1 = new recordset($sql);
if(! $rs1->eof){
	$dtl_img = $rs1->field("Photo1");
}

//取出網站參數
$sql = "Select * From webset ";
$rs = new recordset($sql);
if (! $rs->eof){
	$keywords = $rs->field("Keywords");
	$description = $rs->field("Description");
}
?>