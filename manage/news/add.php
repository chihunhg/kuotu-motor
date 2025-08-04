<?php
require_once("../_inc.php");
require_once("../_module.php");

//參數解碼
if ($_REQUEST["PKey"] <> ""){
	$_SESSION["PKey_".$ModuleNo] = authcode($_REQUEST["PKey"],'DECODE');
	$Update_PKey = authcode($_REQUEST["PKey"],'DECODE');
}

$sql = 'Select * From news Where PKey= :PKey';
$rs = new recordset($sql,array($Update_PKey));
if (! $rs->eof){
	$News_PKey = $rs->field("PKey");
	$Sort = $rs->field("Sort");
	$Class1 = $rs->field("Class1_PKey");
	$strName = htmlspecialchars($rs->field("strName"),ENT_QUOTES, 'UTF-8');
	$Subject = $rs->field("Subject");
	$Interview = htmlspecialchars($rs->field("Interview"),ENT_QUOTES, 'UTF-8');
	$Color = $rs->field("Color");
	$strLink = $rs->field("strLink");
	$Target = $rs->field("Target");
	$isShow = $rs->field("isShow");
	$Upload = $rs->field("Upload");
	$Home = $rs->field("Home");
	$dtUDate = $rs->field("dtUDate");
	$dtDate = $rs->field("dtDate");
	$UserID = $rs->field("UserID");
}

//序號+1
$sql = "Select Sort from news Where Module_PKey= :Module_PKey Order By Sort desc limit 1";
$rs = new recordset($sql, array(SqlFilter($Module_PKey,'int')));
if(! $rs->eof){
	$Sort = $rs->field("Sort")+1;
}else{
	$Sort = 1;
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
function login(theForm) {
	theForm.submit()
}

function fieldCheck0(theForm) {
	var array = new Array();
	var flag = true;
	if (isNaN(parseInt($("#Sort").val()))){
		$("#Sort_txt").text('順序不是數字');
		array.push('Sort');
		flag = false;
	}else{
		$("#Sort_txt").text('');
	}
	
  if ($("#Class1").val() == '') {
		$("#Class1_txt").text('品牌請選擇');
		array.push('Class1');
		flag = false;
	}else{
		$("#Class1_txt").text('');
	}

	if ($("#strName").val() == '') {
		$("#strName_txt").text('標題空白');
		array.push('strName');
		flag = false;
	}else{
		$("#strName_txt").text('');
	}

  if ($("#strLink").val() == '') {
		$("#strLink_txt").text('連結空白');
		array.push('strLink');
		flag = false;
	}else{
		$("#strLink_txt").text('');
	}

	// var name = $("#preview1").prop('src');
	// if (name == '') {
	// 	$("#Photo1_txt").text('選擇圖片檔案');
	// 	array.push('Photo1');
	// 	flag = false;
	// }else{
	// 	$("#Photo1_txt").text('');
	// }

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
        <h1><?php echo $Module_Name?></h1>
        <main>
          <form action="addin.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit='if (fieldCheck0(this)) {return true; login(this);} else {return false;}'>
            <div class="table-container">
              <table cellspacing="0" cellpadding="0" width="100%" border="0" class="detail">
                <tr>
                  <td>順序 <span class="require_onced">*</span></td>
                  <td><input name="Sort" type="text" class="m-input" id="Sort" style="width:50px; text-align:center;" value="<?php echo $Sort?>" maxlength="4" />
                    <span id="Sort_txt">限輸入數字</span>
                  </td>
                </tr>
        
                <tr>
                  <td>品牌 <span class="require_onced">*</span></td>
                  <td><select name="Class1" id="Class1">
                    <option value="">請選擇</option>
                    <?php
                    $sql = 'Select PKey, strName From dbclass1 Where Module_PKey = 0 and Upload = \'Yes\' Order By Sort';
                    $rs1 = new recordset($sql);
                    while(! $rs1->eof){
                    ?>
                    <option value="<?php echo $rs1->field("PKey")?>"  <?php if(strval($Class1)==strval($rs1->field("PKey"))) {echo "selected=\"selected\"";}?>><?php echo $rs1->field("strName")?></option>
                    <?php
                    $rs1->movenext();
                    }
                    ?>
                    </select><span class="red" id="Class1_txt"></span></td>
                </tr>

                <tr>
                  <td>標題 <span class="require_onced">*</span></td>
                  <td>
                    <input type="text" name="strName" id="strName" value="<?php echo $strName?>" class="m-input" maxlength="50" style="width:50%;" />
                    <span style="font-size: .9em;color: red;display: block;margin-top: .5em;" id="strName_txt"></span>
                  </td>
                </tr>

                <tr>
                  <td>連結 <span class="require_onced">*</span></td>
                  <td>
                    <input name="strLink" type="text" id="strLink" value="<?php echo $strLink?>" maxlength="255" style="width:50%" />
                    &nbsp;
                    <div class="radio_box">
                      <input name="Target" type="radio" id="Target" value="_blank" <?php if ($Target == "_blank") {echo "checked=\"checked\"";}?> />
                      <label for="Target"><span></span>另開視窗(_blank)</label>
                      &nbsp;
                      <input type="radio" name="Target" id="Target2" value="_self" <?php if ($Target != "_blank") {echo "checked=\"checked\"";}?> />
                      <label for="Target2"><span></span>本頁開啟(_self)</label>
                    </div>
                    <br/>
                    <span style="font-size: .9em;color: red;display: block;margin-top: .5em;" id="strLink_txt"></span>
                  </td>
                </tr>

                <tr>
                  <td>列表圖 </td>
                  <td>
                    <div class="upload-box">
                      <div class="photo">
                        <img id="preview1">
                        <span id="Photo1_txt" class="red"></span>
                      </div>
                      <div class="file-upload">
                        <label for="Photo1">
                          <input name="Photo1" type="file" accept="image/jpeg,image/gif,image/png" id="Photo1" size="30" onChange="checkFile('Photo1',1000,'img')" />
                          選擇檔案</label>
                      </div>
                    </div>
                    <ul class="set-tips">
                      <li>圖片建議尺寸：寬320px * 高164px。</li>
                      <li>若圖片為空，將以預設圖顯示</li>
                      <?php echo $remark_pic?>
                    </ul>
                  </td>
                </tr>

                <tr>
                  <td>簡述 </td>
                  <td>
                    <textarea name="Interview" id="Interview" cols="30" rows="10" placeholder=""><?php echo $Interview?></textarea>
                  </td>
                  </tr>
                <tr>

                <tr>
                  <td>首頁顯示 </td>
                  <td>
                  <div class="menuSelect none">
                    <ul>
                      <li>
                        <input name="Home" type="checkbox" id="Home" value="Yes" <?php if($Total<'4' && $Home=='Yes'){echo 'checked="checked"';} if($Total=='4'){?> disabled=disabled <?php }?> />
                        <label for="Home"><span></span>是，首頁顯示</label>
                        <input type="hidden" name="Home_PKey" id="Home_PKey" value="<?php echo $Home;?>"  />
                        <input type="hidden" name="posital" id="posital" value="add"  />
                      </li>
                    </ul>
                    <?php //if($Total=='4'){首頁只能勾選四個項目，目前已滿?>
                      <span id="Home_txt" name="Home_txt"></span>
                    <?php //}?>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td>上下架</td>
                  <td><select name="Upload" id="Upload">
                      <option value="Yes" <?php if($Upload == 'Yes') {echo "selected=\"selecteded\"";}?>>上架</option>
                      <option value="No" <?php if($Upload == 'No') {echo "selected=\"selecteded\"";}?>>下架</option>
                    </select></td>
                </tr>
                <tr>
                  <td>修改日期</td>
                  <td><?php require_once("../_modify.php") ?></td>
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
