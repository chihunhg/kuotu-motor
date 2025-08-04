<?php
require_once("../_inc.php");
require_once("../_module.php");

//參數解碼
if ($_REQUEST["PKey"] <> ""){
	$_SESSION["PKey_".$ModuleNo] = authcode($_REQUEST["PKey"],'DECODE');
	$Update_PKey = authcode($_REQUEST["PKey"],'DECODE');
}

if ($_REQUEST["Submit"] == "送出"){
	//表單檔案驗證
	$MSG = "";

	if (strLen($_POST["strName"]) == 0)
	{$MSG .= "【姓名】為空白\\n";}
	$regexp = "/^[A-Za-z0-9._-]{5,20}$/";
	if (! preg_match($regexp,$_POST['strID'])){
		$MSG .= "【帳號】空白或格式錯誤\\n";
	}elseif ($_POST['strID'] != $_POST['oldID']){
		$sql = 'Select PKey From webcontrol Where strID= :strID';
		$rs = new recordset($sql,array($_POST['strID']));
		if (! $rs->eof){
			$MSG .= "【帳號】已被申請過\\n";
		}
	}

	$regexp = "/^[A-Za-z0-9._-]{5,20}$/";
	if (! preg_match($regexp,$_POST['strPW']) && $_POST['strPW'] != $_POST['oldPW']) {
		$MSG .= "【密碼】英文或數字5~20碼\\n";
	}
	
	if (count($_POST["FunctionName"]) == 0)
	{$MSG .= "【權限】請選擇\\n";}
	else
	{
		$F_Name = array();
		$F_ID = array();
		for ($i = 0; $i <= count($_POST["FunctionName"])-1; $i++) {
			//組合模組代碼和名稱			
			$II = explode("|",$_POST["FunctionName"][$i]);
			$F_ID[$i] = $II[0];
			$F_Name[$i]= $II[1];
		}
	}
	
	if ($MSG == ""){
		$data_array['Module_PKey'] = SqlFilter($Module_PKey,"int");
		$data_array['strID'] = SqlFilter($_POST['strID'],"tab");
		if($_POST['oldPW'] != $_POST['strPW']){
		$data_array['strPW'] = SqlFilter(md5($_POST['strPW']),"tab");
		}
		$data_array['strName'] = $_POST['strName'];
		$data_array['FunctionName'] = implode(',',$F_Name);
		$data_array['FunctionID'] = implode(',',$F_ID); 
		$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
		$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
		$data_array['UserID'] = $_SESSION['Login_ID'];
		
		$pdo = new dbPDO();
		$table_name = 'webcontrol';
		$pdo->insert($table_name,$data_array);
		$PKey = $pdo->getLastId();
		$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$PKey;
		unset($data_array);
		$pdo->close();
		//寫入後台管理記錄
		manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);
		$show = "新增成功!";
		
		//清除Session變數
		unset($_SESSION["Pkey_".$ModuleNo]); 
		ECHO "<script language=\"javascript\">" ;
		ECHO "alert('".$show."');";
		ECHO "location.href='list.php';";
		ECHO "</script>";
		exit();
	}
	Else{
		ECHO "<script language=\"javascript\">" ;
		ECHO "alert('發生錯誤，請填寫下列欄位\\n".$MSG."');";
		ECHO "location.href='javascript:history.back()';";
		ECHO "</script>";
		exit();
	}
}

$M1 = array();
$sql = 'Select * From webcontrol Where PKey= :PKey';
$rs = new recordset($sql,array(SqlFilter($Update_PKey,"int")));
if (! $rs->eof){
	$strID = $rs->field("strID");
	$strName = $rs->field("strName");
	$strPW = $rs->field("strPW");
	$M1 = explode(",",$rs->field("FunctionID"));
	$dtUDate = $rs->field("dtUDate");
	$UserID = $rs->field("UserID");
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
  if ($("#strName").val()==''){
	$("#strName_txt").text('管理者名稱空白');
	array.push('strName');
	flag = false;
  }

  var reg = /^[a-z0-9._-]{5,20}$/ig;
  if (!reg.test($("#strID").val())){
	$("#strID_txt").text('帳號英文或數字5~20碼');
	array.push('strID');
	flag = false;
  }		

  var reg = /^[a-z0-9._-]{5,20}$/ig;
  if (!reg.test($("#strPW").val())){
	$("#strPW_txt").text('密碼英文或數字5~20碼');
	array.push('strPW');
	flag = false;
  }
  
  var Total = $('input[name="FunctionName[]"]:checked').length;
  if(Total==0){
	$("#FunctionName_txt").text('權限請勾選');
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
  
function selectAll(theForm) {
	var obj = document.getElementsByName("FunctionName[]");
	for (var i = 0; i < obj.length; i++) {
		if (obj[i].disabled == false) {
			obj[i].checked = true;
		}
	}
}

function selectNone(theForm) {
	var obj = document.getElementsByName("FunctionName[]");
	for (var i = 0; i < obj.length; i++) {
		obj[i].checked = false;
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
      <h1><?php echo $Module_Name?></h1>
      <main>
        <form id="form1" name="form1" method="post" action="" onSubmit='if (fieldCheck0(this)) {return true; login(this);} else {return false;}'>
          <div class="table-container">
            <table cellspacing="0" cellpadding="0" width="100%" border="0" class="detail">
              <tr>
                <td>管理者名稱<span class="require_onced">*</span></td>
                <td>
                  <input type="text" name="strName" id="strName" value="<?php echo $strName?>" class="m-input" size="20" maxlength="20" />
                  <span id="strName_txt"></span> </td>
              </tr>
              <tr>
                <td>帳號<span class="require_onced">*</span></td>
                <td>
                  <input name="strID" type="text" id="strID" value="<?php echo $strID?>" class="m-input" style="width:20%;" />
                  <input name="oldID" type="hidden" id="oldID" value="<?php echo $strID?>" />
                  (英文或數字5~20碼) <span id="strID_txt"></span> </td>
              </tr>
              <tr>
                <td>密碼<span class="require_onced">*</span></td>
                <td>
                  <input type="password" name="strPW" id="strPW" value="<?php echo $strPW?>" class="m-input" style="width:20%;" />
                  <input name="oldPW" type="hidden" id="oldPW" value="<?php echo $strPW?>" />
                  (英文或數字5~20碼) <span id="strPW_txt"></span> </td>
              </tr>
              <tr>
                <td>權限範圍<span class="require_onced">*</span></td>
                <td>
                  <div class="menuSelect none">
                    <input name="button" type="button" class="btn btn-outline-secondary" value="全選" onclick="selectAll(this.form);">
                    <input name="button2" type="button" class="btn btn-outline-secondary" value="取消全選" onclick="selectNone(this.form);">
                    <ul>
                      <?php 
						$i = 0;
                        $sql = 'Select * from module_p Where Upload=\'Yes\' and intType = 1 Order By Home desc,Sort';
						$rs = new recordset($sql);
						while (! $rs->eof){
							$i++;
                        ?>
                      <li>
                        <input name="FunctionName[]" id="f-menu<?php echo $i?>" type="checkbox" value="<?php echo $rs->field("PKey")?>|<?php echo $rs->field("strName")?>" <?php if (in_array($rs->field("PKey"),$M1)) {echo "checked=\"checked\"";}?> />
                        <label for="f-menu<?php echo $i?>"><span></span><?php echo $rs->field("strName")?></label>
                      </li>
                      <?php 
                        $rs->movenext();
                        }
                        ?>
                    </ul>
                    <span id="FunctionName_txt"></span> </div>
                </td>
              </tr>
              <tr>
                <td>修改日期</td>
                <td>
                  <?php require_once("../_modify.php") ?>
                </td>
              </tr>
            </table>
          </div>
          <?php require_once("../_submit.php") ?>
        </form>
      </main>
    </div>
  </div>
</div>
<?php require_once("../_in_code_bottom.php"); ?>
</body>
</html>
