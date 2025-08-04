<?php
$secure = true; // if you only want to receive the cookie over HTTPS
$httponly = true; // prevent JavaScript access to session cookie
$samesite = 'lax';
$maxlifetime = 600;
if(PHP_VERSION_ID < 70300) {
	session_set_cookie_params($maxlifetime, '/; samesite='.$samesite, $_SERVER['HTTP_HOST'], $secure, $httponly);
} else {
	session_set_cookie_params([
		'lifetime' => $maxlifetime,
		'path' => '/',
		'domain' => $_SERVER['HTTP_HOST'],
		'secure' => $secure,
		'httponly' => $httponly,
		'samesite' => $samesite
	]);
}
session_start();//啟動 session

//讀取Cookie
if(!empty($_COOKIE['SessionID'])){
	$SessionID = $_COOKIE['SessionID'];
}
if(empty($SessionID)){
	$SessionID = session_id();	
	//寫入Cookie
	setcookie('SessionID',$SessionID,time()+600);
}
//------------------------------------------------------------------------
header("Cache-control: private");
header('Content-type: text/html; charset=utf-8');
//------------------------------------------------------------------------

//檢測到XSS時 Browser將停止Load頁面(不支持 CSP 的舊瀏覽器用戶)
header("X-XSS-Protection: 1; mode=block");

//HTTP強制安全傳輸技術
header("Strict-Transport-Security:max-age=63072000");

//header("Cache-control: no-store, no-cache, must-revalidate, max-age=0");
if($_SERVER['REQUEST_SCHEME']=="https"){
	setcookie('PHPSESSID',session_id(),0,"/","",true);
}
// header("Set-Cookie: PHPSESSID=".session_id()."; path=/; domain=".$_SERVER['HTTP_HOST']."; expires=".gmstrftime("%A, %d-%b-%Y %H:%M:%S GMT",time()+9600).";true");
//header('Set-Cookie: PHPSESSID='.session_id().'; Secure');//Cookie Secure	
// cookie serialize

$CSRF = sha1(microtime());
if(! isset($_SESSION['CSRF']) || empty($_SESSION['CSRF'])) {
   $_SESSION['CSRF'] = $CSRF;
}else{
	$CSRF = $_SESSION['CSRF'];
}

error_reporting(E_ALL && E_NOTICE);
date_default_timezone_set('Asia/Taipei');

require_once(dirname(dirname(__FILE__))."/include/Conn.php");//引入文件
require_once(dirname(dirname(__FILE__))."/include/dbclass.php");//引入文件
require_once(dirname(dirname(__FILE__))."/include/Function.php");//引入文件
// *** Include the class 載入縮圖元件
require_once(dirname(dirname(__FILE__)).'/include/ResizeImage.php');
require_once (dirname(dirname(__FILE__)).'/include/webp/autoload.php');

//語系代碼
$intLang = 1;//1.繁中;2.英文;3.簡中
switch($intLang){
	case 1:
		$lang_name = '中文版';
		break;
	case 2:
		$lang_name = '英文版';
		break;
	case 3:
		$lang_name = '簡體版';
		break;
	default:
		$lang_name = '中文版';
		break;
}

$ImageTypeLimit=".GIF.JPG.PNG";
$FileTypeLimit=".JPG.GIF.PNG.PDF.DOC.DOCX.PPT.XLS.XLSX.TXT.ZIP.RAR";
$ExcelLimit=".XLS.XLSX";
$pageTitle1="天矽科技";
$pageTitle2 = $lang_name."後端管理系統";
$meta_d="";
$meta_k="";
$m_home="<a href=\"../login/login.php\">後端管理系統</a>";
$url_link="<img src='../images/icon01.gif' hspace=5  border=0 align=absmiddle>";
$icon="&nbsp;&#187;&nbsp;";
$line_color="#f7f7f7" ;
$mgw1="管理";
$mgw2="新增/修改";
$mgw3="預覽";
$m98 = "單元版型";
$m83 = "版型圖示";

//權限管理
$s1="首頁單元設定";
$s2="基本資料設定";
$s3="購物資訊";
$s5="變更密碼";
$divview="none";

$today=date("Y/m/d");
$years = date("Y"); //用date()函式取得目前年份格式0000
$months = date("m"); //用date()函式取得目前月份格式00
$days = date("d"); //用date()函式取得目前日期格式00
$day = date("Y/m/d",mktime(0,0,0,$months+1,$days,$years));

$Keywords = "";
$Action = "";
$remark_pic="<li>圖檔格式只接受JPG,GIF,PNG的檔案，檔案大小限1MB以內。</li>";
$remark_save="<li>檔案名稱請以英數字命名。</li>";
$remark_save2="<li>上傳檔案請以英數字命名，檔案大小限6MB以內。</li>";
$remark_file1="<li>檔案格式只接受JPG,GIF,PDF,DOC,DOCX,PPT,PPTX,XLS,XLSX,TXT,ZIP,RAR的檔案</li>";
$remark_file2="<li>檔案格式只接受PDF。</li>";


if (($_SESSION["Manage"] != "Yes" OR strlen($_SESSION["Login_ID"]) == 0) AND ! stristr($_SERVER["PHP_SELF"],"index.php")) {
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert(\"後台閒置時間過長已自動登出，請重新登入，謝謝。\");";
	ECHO "location.href=\"../index.php\";";
	ECHO "</script>";
	exit;
}

//刪除log
$sql_d = "delete from managelog Where datediff(now(), dtDate) > 10;";
execute_sql($sql_d);

//產生選單資料
$Array_MU_Name = array();//單元名稱
$sql = 'Select * from module_p Where Upload=\'Yes\' Order By PKey';
$rs = new recordset($sql);
while (! $rs->eof){
	$i = $rs->field("PKey");
	$Array_MU_Name[$i] = $rs->field("strName");
$rs->movenext();
}

//$Keywords = array();
$sql = 'Select * From webset ';
$rs = new recordset($sql);
if (! $rs->eof){
	$WebName = $rs->field("strName");
	$Web_Mail = $rs->field("EMail");
}
?>