<?php
require_once("../_inc.php");
require_once("../_module.php");

//參數解碼
if ($_REQUEST["PKey"] <> ""){
	$_SESSION["PKey_".$ModuleNo] = authcode($_REQUEST["PKey"],'DECODE');
	$Update_PKey = authcode($_REQUEST["PKey"],'DECODE');
}

//刪除圖片除選取的圖檔
if ($_REQUEST["motion"] == "del" AND is_numeric($_REQUEST["imgNo"])){
	//取出圖檔路徑
	$Cond_Array['Sort'] = sqlFilter($_REQUEST["imgNo"],"int");
	$Cond_Array['Showroom_PKey'] = sqlFilter($_REQUEST["Showroom_PKey"],"int");
	$sql = 'Select * From showroom_img Where Sort= :Sort and Showroom_PKey= :Showroom_PKey';
	$rs = new recordset($sql,$Cond_Array);
	if (! $rs->eof){
		$PKey = authcode($rs->field("Showroom_PKey"),'ENCODE');
		$ext = strtolower(substr(strrchr($rs->field("Photo1"),"."),1));
		$webp_file = str_ireplace($ext,'webp',$rs->field("Photo1"));
		DelFile('../../Upload/'.$rs->field("Forder").'/'.$rs->field("Photo1"));
		DelFile('../../Upload/'.$rs->field("Forder").'/'.$webp_file);

		$pdo = new dbPDO();
		$table_name = 'Showroom_img';
		$pdo->delete($table_name,' PKey= :PKey',array($rs->field("PKey")));
		$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$rs->field("PKey");
		unset($data_array);
		$pdo->close();
		//寫入後台管理記錄
		manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);	
	}
	unset($Cond_Array);
	$rs->close();
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('成功刪除圖片!');" ;
	ECHO "location.href='".$_SERVER["PHP_SELF"]."?PKey=".$PKey."';" ;
	ECHO "</script>" ;
	exit() ;
}

$sql = 'Select * From showroom Where PKey= :PKey';
$rs = new recordset($sql,array(SqlFilter($Update_PKey,"int")));
if (! $rs->eof){
	$Showroom_PKey = $rs->field("PKey");
	$Sort = $rs->field("Sort");
	$Class1 = $rs->field("Class1_PKey");
	$strName = htmlspecialchars($rs->field("strName"),ENT_QUOTES, 'UTF-8');
	$Subject = $rs->field("Subject");
  $intType = $rs->field("intType");
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
	
	$Photo = array();
	$PhotoS = array();
	$PhotoM = array();
	$sql = 'Select * from showroom_img Where Showroom_PKey= :Showroom_PKey and Photo1 <> \'\' Order By Sort';
	$rs1 = new recordset($sql,array($rs->field("PKey")));
	while (! $rs1->eof){
		$i = $rs1->field("Sort");
		$Photo[$i] = $rs1->field("Forder").'/'.$rs1->field("Photo1");
		$PhotoS[$i] = $rs1->field("PKey");
		$PhotoM[$i] = $rs1->field("PhotoM");
	$rs1->movenext();
	}
	$rs1->close();
}
else{
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('查無要修改資料!');" ;
	ECHO "location.href='list.php';" ;
	ECHO "</script>" ;
	exit() ;
}

if (empty($Color)){
	$Color = '#123456';
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

  // if ($("#Subject").val() == '') {
	// 	$("#Subject_txt").text('價錢空白');
	// 	array.push('Subject');
	// 	flag = false;
	// }else{
	// 	$("#Subject_txt").text('');
	// }

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
                  <td>
                    <input name="Sort" type="text" class="m-input" id="Sort" style="width:50px; text-align:center;" value="<?php echo $Sort?>" maxlength="4" />
                    &nbsp; <span id="Sort_txt">限輸入數字</span> </td>
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
                  <td>價格 </td>
                  <td>
                    <input type="text" name="Subject" id="Subject" value="<?php echo $Subject?>" placeholder="NT$76.5~98.5萬" class="m-input" maxlength="50" style="width:50%;" />
                    <span style="font-size: .9em;color: red;display: block;margin-top: .5em;" id="Subject_txt"></span>
                  </td>
                </tr>

                <tr>
                  <td>類型 </td>
                  <td>
                    <input type="text" name="intType" id="intType" value="<?php echo $intType?>" placeholder="" class="m-input" maxlength="50" style="width:50%;" />
                    <span style="font-size: .9em;color: red;display: block;margin-top: .5em;" id="Subject_txt"></span>
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
                  <td>列表圖<span class="require_onced">*</span></td>
                  <td>
                    <div class="upload-box">
                      <div class="photo"> <?php if(strlen($Photo[1]) > 4){?>
                        <img id="preview1" style="max-width: 150px; max-height: 150px;" src="../../Upload/<?php echo $Photo[1].'?'.time() ?>"><span id="Photo1_txt"></span> <a href="javascript:void(0);" onclick="if(confirm('確定刪除嗎？')){del_file(<?php echo $PhotoS[1]?>,1,'img')};" id="delete1" class="btn">刪除圖片</a>
                        <?php }else{?>
                        <img id="preview1" style="max-width: 150px; max-height: 150px;">
                        <div id="size1"></div>
                        <span id="Photo1_txt"></span>
                        <?php }?>
                      </div>
                      <div class="file-upload"><label for="Photo1"><input name="Photo1" type="file" accept="image/jpeg,image/gif,image/png" id="Photo1" size="30" onChange="checkFile('Photo1',1000,'img')" />
                          <input name="intType1" type="hidden" id="intType1" value="1" />選擇檔案</label></div>
                    </div>
                    <ul class="set-tips">
                      <li>列表圖建議尺寸：寬320px * 高164px。</li>
                      <li>若圖片為空，將以預設圖顯示</li>
                      <?php echo $remark_pic?>
                    </ul>
                  </td>
                </tr>

                <tr>
                  <td>內容圖<span class="require_onced">*</span></td>
                  <td>
                    <div class="upload-box">
                      <div class="photo"> <?php if(strlen($Photo[2]) > 4){?>
                        <img id="preview2" style="max-width: 150px; max-height: 150px;" src="../../Upload/<?php echo $Photo[2].'?'.time() ?>"><span id="Photo2_txt"></span> <a href="javascript:void(0);" onclick="if(confirm('確定刪除嗎？')){del_file(<?php echo $PhotoS[2]?>,2,'img')};" id="delete2" class="btn">刪除圖片</a>
                        <?php }else{?>
                        <img id="preview2" style="max-width: 150px; max-height: 150px;">
                        <div id="size2"></div>
                        <span id="Photo2_txt"></span>
                        <?php }?>
                      </div>
                      <div class="file-upload"><label for="Photo2"><input name="Photo2" type="file" accept="image/jpeg,image/gif,image/png" id="Photo2" size="30" onChange="checkFile('Photo2',1000,'img')" />
                          <input name="intType2" type="hidden" id="intType2" value="1" />選擇檔案</label></div>
                    </div>
                    <ul class="set-tips">
                      <li>內容圖建議尺寸：寬1164px以內 * 高不限。</li>
                      <?php echo $remark_pic?>
                    </ul>
                  </td>
                </tr>

                <tr>
                  <td>上下架</td>
                  <td>
                    <select name="Upload" id="Upload" class="m-select">
                      <option value="Yes" <?php if($Upload == 'Yes') {echo "selected=\"selecteded\"";}?>>上架</option>
                      <option value="No" <?php if($Upload == 'No') {echo "selected=\"selecteded\"";}?>>下架</option>
                    </select>
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
