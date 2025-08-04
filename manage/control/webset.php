<?php
require_once("../_inc.php");
$subitem = "s1";

if ($_REQUEST['Submit'] == '送出'){
	//表單檔案驗證
	$MSG = "";

	if (strLen($_POST['strName']) == 0){
		$MSG .= "網站名稱(中)空白\\n";
	}

	if (strLen($_POST['Description']) == 0){
		$MSG .= "網站描述空白\\n";
	}
	
	$Keywords = array();
	for($i=1;$i<6;$i++){
		if(strLen($_POST['Keyword'.$i]) > 0){
			array_push($Keywords,$_POST['Keyword'.$i]);
		}
	}	
	if(count($Keywords)==0){
		$MSG .= "網站關鍵字空白\\n";
	}

	if (! CheckMail($_POST['EMail']) && strlen($_POST['EMail']) > 0)
	{
		$MSG .= "聯絡信箱格式錯誤\\n";
	}
	
	if ($MSG == ""){
		$sql = "Select * From webset ";
		$rs = new recordset($sql);
		if (! $rs->eof){
			$data_array['strName'] = SqlFilter($_POST['strName'],"tab");
			$data_array['Description'] = SqlFilter($_POST['Description'],"tab");
			$data_array['Keywords'] = SqlFilter(implode(',',$Keywords),"tab");
			$data_array['gaCode'] = SqlFilter($_POST['gaCode'],"tab");
			$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
			
			$pdo = new dbPDO();
			$table_name = 'webset';
			$pdo->update($table_name,$data_array,'PKey',$rs->field("PKey"));
			$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$rs->field("PKey");
			unset($data_array);
			$pdo->close();			
			$show = "修改成功!";
		}
		//echo $SQL_U;
		//組合導回參數
		ECHO "<script language=\"javascript\">" ;
		ECHO "alert('".$show."');";
		Echo "location.href='".$_SERVER['PHP_SELF']."';";
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

$Keywords = array();
$sql = 'Select * From webset ';
$rs = new recordset($sql);
if (! $rs->eof){
	$strName = htmlspecialchars($rs->field("strName"),ENT_QUOTES, 'UTF-8');
	$EName = htmlspecialchars($rs->field("EName"),ENT_QUOTES, 'UTF-8');
	$Description = $rs->field("Description");
	$Keywords = explode(',',$rs->field("Keywords"));
	$Tel = htmlspecialchars($rs->field("Tel"),ENT_QUOTES, 'UTF-8');
	$Fax = htmlspecialchars($rs->field("Fax"),ENT_QUOTES, 'UTF-8');
	$Address = htmlspecialchars($rs->field("Address"),ENT_QUOTES, 'UTF-8');
	$strLink = htmlspecialchars($rs->field("strLink"),ENT_QUOTES, 'UTF-8');
	$EMail = htmlspecialchars($rs->field("EMail"),ENT_QUOTES, 'UTF-8');
	$Facebook = htmlspecialchars($rs->field("Facebook"),ENT_QUOTES, 'UTF-8');
	$Line = htmlspecialchars($rs->field("Line"),ENT_QUOTES, 'UTF-8');
	$IG = htmlspecialchars($rs->field("IG"),ENT_QUOTES, 'UTF-8');
	$gaCode = $rs->field("gaCode");
	$dtDate = $rs->field("dtDate");
}else{
	$data_array['Module_1'] = '3,4,5,6,7,8,9,10';
	$data_array['Module_2'] = '3,4,5,6,7,8,9,10';
	$data_array['Contact'] = '1,2,3,4';
	$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
		
	$pdo = new dbPDO();
	$table_name = 'webset';
	$pdo->insert($table_name,$data_array);
	unset($data_array);
	$pdo->close();
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
//偵測Form裡的各欄位
function login(theForm) 
 {
	theForm.submit()
  }
  
function fieldCheck0(theForm) {
	var array = new Array();
	var flag = true;
	if ($("#strName").val()==''){
		$("#Name_txt").text('網站名稱');
		array.push('strName');
		flag = false;
	}else{
		$("#Name_txt").text('');
	}

	if ($("#Description").val()==''){
		$("#Description_txt").text('網站描述空白');
		array.push('Description');
		flag = false;
	}else{
		$("#Description_txt").text('');
	}

	var chk = false;
	for(i=1;i<6;i++){
		if($("#Keyword"+i).val() !=''){
			chk = true;
			break;
		}
	}

	if(chk==false){
		$("#Keyword_txt").text('網站關鍵字空白');
		array.push('Keyword1');
		flag = false;
	}else{
		$("#Keyword_txt").text('');
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
      <h1>網站設定</h1>
      <main>
        <form action="" method="post" name="form1" id="form1" onsubmit='if (fieldCheck0(this)) {return true; login(this);} else {return false;}'>
          <table>
            <tr>
              <td>
                <label for="label">網站名稱<span class="require_onced">*</span></label>
                <div class="box">
                  <input type="text" name="strName" id="strName" value="<?php echo $strName?>" >
				  <span id="Name_txt"></span>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label for="label">網站描述<span class="require_onced">*</span></label>
                <div class="box">
                  <textarea name="Description" id="Description" cols="30" rows="10" placeholder="請輸入160字元內的網站描述"><?php echo $Description?></textarea>
				  <span id="Description_txt"></span>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <label for="label">網站關鍵字<span class="require_onced">*</span></label>
                <div class="box keyword">
                  <?php for($i=0;$i<5;$i++){?><input name="Keyword<?php echo $i+1?>" type="text" id="Keyword<?php echo $i+1?>" value="<?php echo $Keywords[$i]?>" maxlength="50"/><?php }?>
				  <span id="Keyword_txt"></span>
                </div>
				
              </td>
            </tr>
            <tr>
              <td>
                <label for="label">GA-Code</label>
                <div class="box">
                  <textarea name="gaCode" id="gaCode" cols="30" rows="10" placeholder="貼上追蹤程式碼，追蹤程式碼將放置在網站的每個頁面中。"><?php echo $gaCode?></textarea>
                </div>
              </td>
            </tr>
          </table>
          <?php require_once("../_submit.php") ?>
        </form>
      </main>
    </div>
  </div>
</div>
<?php require_once("../_in_code_bottom.php"); ?>
</body>

</html>
