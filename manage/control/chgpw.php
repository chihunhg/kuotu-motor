<?php
require_once("../_inc.php");
$subitem     = "s5";

if ($_REQUEST["Submit"] == "送出"){
	$MSG = "";
	
	$regexp = "/^[A-Za-z0-9]{5,20}$/"; //13位的en字符和數字串
	if (! preg_match($regexp,$_REQUEST["newpw"]))
	{$MSG .= "【新密碼】英文或數字5~20碼\\n";}
	
	if (! preg_match($regexp,$_REQUEST["repw"]))
	{$MSG .= "【確認新密碼】英文或數字5~20碼\\n";}
	
	if ($_REQUEST["repw"] != $_REQUEST["newpw"])
	{$MSG .= "【新密碼和確認新密碼】不符\\n";}

	if ($MSG == ""){
		$data_array['strPW'] = SqlFilter(md5($_POST['newpw']),"tab");
		$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
		$data_array['UserID'] = SqlFilter($_SESSION['Login_ID'],"str");
		
		$pdo = new dbPDO();
		$table_name = 'webcontrol';
		$pdo->update($table_name,$data_array,'strID',$_SESSION["Login_ID"]);
		$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$Update_PKey;
		unset($data_array);
		$pdo->close();

		//清除Session變數
		unset($_SESSION["Pkey_".$Moduleno]); 

		ECHO "<script language=\"javascript\">" ;
		ECHO "alert('密碼成功更新，下次請用新密碼登入');";
		ECHO "location.href='".$_SERVER["PHP_SELF"]."';" ;
		ECHO "</script>";
		exit;		
	}
	Else{
		ECHO "<script language=\"javascript\">" ;
		ECHO "alert('發生錯誤，請填寫下列欄位\\n".$MSG."');";
		ECHO "location.href='javascript:history.back()';";
		ECHO "</script>";
		exit;
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
<script>
//偵測Form裡的各欄位----^_^
function login(theForm) 
 {
	theForm.submit()
  }
  
function fieldCheck0(theForm) {	
  var array = new Array();
  var flag = true;
  var reg = /^[a-z0-9._-]{5,20}$/ig;
  if (!reg.test($("#newpw").val())){
	$("#newpw_txt").text('新密碼英文或數字5~20碼');
	array.push('newpw');
	flag = false;
  }	
 
  if ($("#repw").val() != $("#newpw").val()){
	$("#newpw_txt").text('新密碼和確認新密碼不同');
	array.push('repw');
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
<div class="wrap">
  <?php require_once("../_subNav.php"); ?>
  <div class="content">
    <button class="subNav-btn in"><i class="fas fa-angle-right"></i><span>選單</span></button>
    <div class="container">
      <h1>變更密碼</h1>
      <main>
        <form action="" method="post" name="form1" id="form1" onsubmit='if (fieldCheck0(this)) {return true; login(this);} else {return false;}'>
          <input type="hidden" name="u" value="ok" />
          <div class="table-container">
            <table cellspacing="0" cellpadding="0" width="100%" border="0" class="detail">
              <tr>
                <td>管理者名稱<span class="require_onced">*</span></td>
                <td><?php echo $_SESSION["UserName"]?></td>
              </tr>
              <tr>
                <td>新密碼<span class="require_onced">*</span></td>
                <td><input type="text" name="newpw" id="newpw" value="" maxlength="20" placeholder="英文或數字5~20碼"/><span id="newpw_txt"></span></td>
              </tr>
              <tr>
                <td>確認新密碼<span class="require_onced">*</span></td>
                <td><input type="text" name="repw" id="repw" value="" maxlength="20" placeholder="英文或數字5~20碼"/><span id="repw_txt"></span></td>
              </tr>
            </table>
          </div>
          <?php require_once("../_submit.php") ?>
        </form>
        <div class="notes">
          <p>備註</p>
          <ul>
            <li>因安全性考量，密碼會經由程式重新編碼保護，網管人員者無法存取變更後的新密碼，請妥善保管新設定的密碼。</li>
          </ul>
        </div>
      </main>
    </div>
  </div>
</div>
<?php require_once("../_in_code_bottom.php"); ?>
</body>
</html>
