<?php
	//XML Injection
	libxml_set_external_entity_loader(null);
	$secure = false; // if you only want to receive the cookie over HTTPS
	if($REQUEST_SCHEME=="https"){
	$secure = true; // if you only want to receive the cookie over HTTPS	
	}
	$httponly = true; // prevent JavaScript access to session cookie
	$samesite = 'Strict';
	$maxlifetime = 600;
	$arr_cookie_options = array (
		//'expires' => time() + 60*60*24, 
		'path' => '/', 
		'domain' => $_SERVER['HTTP_HOST'], // leading dot for compatibility or use subdomain
		'secure' => $secure,     // or false
		'httponly' => true,    // or false
		'samesite' => 'Strict' // None || Lax  || Strict
		);
	session_set_cookie_params([
		'lifetime' => 0
		, 'path' => '/'
		, 'domain' => $_SERVER['HTTP_HOST']
		, 'secure' => true
		, 'httponly' => true
		, 'samesite' => 'Strict'
	]); 
	session_start();//啟動 session

	//讀取Cookie
	if(!empty($_COOKIE['SessionID'])){
		$SessionID = $_COOKIE['SessionID'];
	}
	if(empty($SessionID)){
		$SessionID = session_id();
	}

	//寫入Cookie
	setcookie('SessionID',$SessionID,$arr_cookie_options);
	//Session fixation
	$_SESSION['LAST_REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_USER_AGENT'])){
		$_SESSION['LAST_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
		if($_SERVER['REMOTE_ADDR'] !== $_SESSION['LAST_REMOTE_ADDR'] || $_SERVER['HTTP_USER_AGENT'] !== $_SESSION['LAST_USER_AGENT']) {
		   session_destroy();
		}	
	}

	//------------------------------------------------------------------------
	header("Cache-control: private");
	header('Content-type: text/html; charset=utf-8');
	//------------------------------------------------------------------------

	//檢測到XSS時 Browser將停止Load頁面(不支持 CSP 的舊瀏覽器用戶)
	header("X-XSS-Protection: 1; mode=block");
	//Content Security Policy (CSP)
	header("Content-Security-Policy: default 'self';");
	header("Content-Security-Policy: frame-ancestors 'none';");
	header("Referrer-Policy: strict-origin-when-cross-origin");
	header("Permissions-Policy: strict-origin-when-cross-origin");
	//HTTP強制安全傳輸技術
	header("Strict-Transport-Security:max-age=31536000;includeSubDomains;preload");

	setcookie('PHPSESSID',session_id(), $arr_cookie_options);

	$CSRF = sha1(microtime());
	if(! isset($_SESSION['CSRF']) || empty($_SESSION['CSRF'])) {
	   $_SESSION['CSRF'] = $CSRF;
	}else{
		$CSRF = $_SESSION['CSRF'];
	}

	error_reporting(E_ALL ^ E_NOTICE);//忽略提醒
	//error_reporting(E_ALL ^ E_NOTICE ^ E_Warning);//忽略 提醒+Warning
	//error_reporting(E_ALL);
	//ini_set('display_errors', TRUE);
	//ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Asia/Taipei');
	require_once(dirname(__FILE__)."/include/Conn.php");//引入文件
	require_once(dirname(__FILE__)."/include/Function.php");//引入文件	
	//------------------------------------------------------------------------
    $thisUrl = "https://".$_SERVER['HTTP_HOST'].sqlFilter($_SERVER['REQUEST_URI'],'str');
	$pageTitle     = "國都豐田數位服務網";
	$pageTitle2     = "國都豐田數位服務網";
	$m_description = "天下雜誌年度服務業排名，前百大企業，販賣區域及營業所分佈：台北市中山、士林、大同、北投區及新北市，共 22個營業所，19 個服務廠";
	$m_keywords = "toyota,LEXUS,豐田汽車,凌志汽車,和泰汽車,和泰總代理,國都";
	//------------------------------------------------------------------------
	//$bodytxt = " onDragStart='return false' oncontextmenu='return false' onSelectStart='return false'";
	$showDiv = "none";
	//------------------------------------------------------------------------
	//通知信
	$m_title     = "國都豐田數位服務網";//主旨
	$m_from_mail = "noreply@tsg.com.tw"; //寄件者及收件者 --測試站，請勿改掉寄件者信箱
	$m_to_mail   = "AA78171@TOYOTA.COM.TW;AA83403@TOYOTA.COM.TW;AA91112@TOYOTA.COM.TW;maurice@tsg.com.tw;AA81346@TOYOTA.COM.TW"; //收件者，注意遠傳主機寄件者/收件者不能為同一個網域(@後方不能一樣)
	$m_cc_mail   = ""; //CC
	$m_bcc_mail  = ""; //BCC
	
	$m_smtp      = "smtp.isl.net.tw";//這組是宏遠的，若放遠傳請改seed.net.tw
	
	//$m_SMTPAuth  = true;//啟動smtp認證 false
	//$m_username  = "service@tsgoauth.com.tw";//SMTP驗證帳號
	//$m_password  = "tsg1234";//SMTP驗證密碼
	
	$web_mail    = "";
	//------------------------------------------------------------------------
	$lang    = "zh-Hant-TW";//語系宣告
	$home   = "首頁";
	$p1   = "顧客關懷";
		$p1_1   = "聯絡我們";
	$p2   = "關於國都";
		$p2_1   = "公司簡介";
		$p2_2   = "年度報表";
		$p2_3   = "樂在環保";
		$p2_4   = "我愛國都";
		$p2_5   = "相關網站";
	$p3   = "人才招募";
	$p4   = "和泰Pay專區";
		$p4_1   = "首次啟用";
		$p4_2   = "綁定中信卡";
		$p4_5   = "申辦和泰聯名卡<br>(查詢進度/補件上傳/首刷禮查詢)";
		$p4_5_2   = "申辦和泰聯名卡";
		$p4_6   = "和泰會員註冊";
		$p4_7   = "Lexus紅利積點轉換和泰Points";
		$p4_8   = "Toyota利high金轉換為和泰Points";
		$p4_9   = "新增綁定車號";
		$p4_10   = "國都專屬優惠專區(和泰Points兌換)";
	$p5   = "隱私權聲明";

	//------------------------------------------------------------------------
	
	$CSRF = sha1(microtime());
	if(! isset($_SESSION['CSRF']) || empty($_SESSION['CSRF'])) {
	   $_SESSION['CSRF'] = $CSRF;
	}else{
		$CSRF = $_SESSION['CSRF'];
	}
?>
