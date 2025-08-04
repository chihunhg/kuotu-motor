<?php
	session_start();//啟動 session
	//------------------------------------------------------------------------
	header("Cache-control: private");
	header('Content-type: text/html; charset=utf-8');

	error_reporting(E_ALL && E_NOTICE);//忽略提醒
	//error_reporting(E_ALL && E_NOTICE ^ E_Warning);//忽略 提醒+Warning
	//error_reporting(E_ALL);
	//ini_set('display_errors', TRUE);
	//ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Asia/Taipei');
	require_once(dirname(dirname(__FILE__))."/include/Conn.php");//引入文件
	require_once(dirname(dirname(__FILE__))."/include/dbclass.php");//引入文件
	require_once(dirname(dirname(__FILE__))."/include/Function.php");//引入文件	
	//------------------------------------------------------------------------
	$thisUrl = "https://".$_SERVER['HTTP_HOST'].sqlFilter($_SERVER['REQUEST_URI'],'str');
	$pageTitle     = "國都｜toyota";
	$pageTitle2     = "國都｜toyota";
	$m_description = "";
	$m_keywords = "";
	//------------------------------------------------------------------------
	//$bodytxt = " onDragStart='return false' oncontextmenu='return false' onSelectStart='return false'";
	$showDiv = "none";
	//------------------------------------------------------------------------
	//通知信
	$m_title     = "國都｜toyota";//主旨
	$m_from_mail = "service@tsgoauth.com.tw"; //寄件者及收件者 --測試站，請勿改掉寄件者信箱
	$m_to_mail   = "AA81414@TOYOTA.COM.TW;AA06038@TOYOTA.COM.TW;AA79677@TOYOTA.COM.TW;AA91112@TOYOTA.COM.TW"; //收件者，注意遠傳主機寄件者/收件者不能為同一個網域(@後方不能一樣)
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
	$p1   = "最新消息";
		$p1_1   = "活動訊息";
		$p1_2   = "購車優惠";
		$p1_3   = "FB 粉專";
		$p1_4   = "愛車美容";
	$p2   = "購車服務";
		$p2_1   = "車款展示";
		$p2_2   = "TOYOTA營業所";
		$p2_3   = "預約試乘";
		$p2_4   = "購車試算";
		$p2_5   = "保險介紹";
		$p2_6   = "專屬配件";
	$p3   = "維修服務";
		$p3_1   = "TOYOTA服務廠";
		$p3_2   = "預約保養";
		$p3_3   = "保養介紹";
		$p3_4   = "保證保固";
		$p3_5   = "線上預約美容";
	$p4   = "中古車服務";
		$p4_1   = "TOYOTA中古車營業所";
		$p4_2   = "在庫車查詢";
		$p4_3   = "FB 粉專";
		$p4_4   = "關於認證中古車";
	$p5   = "顧客關懷";
		$p5_1   = "聯絡我們";
	$p6   = "關於國都";
		$p6_1   = "公司簡介";
		$p6_2   = "年度報表";
		$p6_3   = "樂在環保";
		$p6_4   = "我愛國都";
		$p6_5   = "相關網站";
	$p7   = "人才招募";	
	$p8   = "回首頁";	
	
	$tc   = "繁";
	$en   = "Eng";
	$Language   = "繁";
	$Class1_PKey = "1";
	//------------------------------------------------------------------------

	$sql = "Select * From webset";
	$rs = new recordset($sql);
	if (! $rs->eof){
		$Web_Name = $rs->field("strName");
		$pageTitle = $rs->field("strName");
		$pageTitle2 = $rs->field("strName");
		$m_description = $rs->field("Description");
		$m_keywords = $rs->field("Keywords");
	}

	//網站網址
	$web_url = RootURL($_SERVER['PHP_SELF']);
?>
