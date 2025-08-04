<?php
require_once("../_inc.php");

//帳號傳值
$strID = SqlFilter($_REQUEST["strID"],"str");

//密碼傳值
$strPW = SqlFilter($_REQUEST["strPW"],"str");

if ($_REQUEST['Submit'] == '送出'){
	
	if(!isset($_POST['csrf']) || empty($_POST['csrf']) || $_POST['csrf']!= $_SESSION['CSRF']){
		location_href('./');
		exit;
	}
	
	$sql = "select * from webcontrol Where strID='".$strID."' ";
	$rs = new recordset($sql);
	if (! $rs->eof){
		if ($rs->field("strPW") == md5($strPW)){
			$_SESSION["Manage"] = "Yes";//是否登入
			$_SESSION["UserName"] = $rs->field("strName"); //姓名		
			$_SESSION["Login_ID"] = $rs->field("strID"); //帳號		
			$_SESSION["FunctionID"] = $rs->field("FunctionID"); //權限
			location_href("login.php");
			exit();
		}
		else
		{			
			Echo "<script language=\"javascript\">" ;
			Echo "alert('密碼不符!!');";
			Echo "location.href='".$_SERVER['PHP_SELF']."';";
			Echo "</script>";
			exit();
		}
	}else{		
		Echo "<script language=\"javascript\">" ;
		Echo "alert('帳號不符!!');";
		Echo "location.href='".$_SERVER['PHP_SELF']."';";
		Echo "</script>";
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
<meta charset="UTF-8">
<title><?php echo $WebName?>｜後端管理系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php require_once("../_in_javascript.php"); ?>
<script type="text/javascript">
function login(theForm) 
 {
	theForm.submit()
  }
  
function fieldCheck0(theForm) {
  var array = new Array();
  var flag = true;
  if ($("#strID").val()==''){
	$("#strID_txt").text('帳號空白');
	array.push('strID');
	flag = false;
  }
 
  if ($("#strPW").val()==''){
	$("#strPW_txt").text('密碼空白');
	array.push('strPW');
	flag = false;
  }
  
  if(flag==false){
	var field = array[0];
	alert('發生錯誤，請填寫下列欄位');
	$('#'+field).focus();
  }else{
	return true;
  }
}
</script>
</head>

<body>
	<?php require_once("../_header.php"); ?>
	<div class="wrap login">
		<form action="" method="post" name="form1" id="form1" onSubmit='if (fieldCheck0(this)) {return true; login(this);} else {return false;}'>
		<div class="box">
			<h1><?php echo $WebName?><span>後端管理系統</span></h1>
			<div class="item">
				<label for="">帳號</label>
				<input type="text" autofocus name="strID" id="strID">
				<span id="strID_txt"></span>
			</div>
			<div class="item">
				<label for="">密碼</label>
				<input type="password" name="strPW" id="strPW">
				<span id="strPW_txt"></span>
			</div>
			<button type="submit" name="Submit" id="Submit" value="送出">登入</button>
		</div>
		<input type="hidden" name="csrf" value="<?php if(isset($CSRF)){echo $CSRF;}?>" />
		</form>
		<p class="copyright">Copyright © <?php echo date('Y').' '.$WebName?> All rights.&nbsp;<a href="https://www.tsg.com.tw/" target="_blank" rel="noopener noreferrer" title="天矽科技 │ 客製化網頁設計">Designed by TSG</a></p>
	</div>
	<?php require_once("../_in_code_bottom.php"); ?>
</body>

</html>
