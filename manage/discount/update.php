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
	$Cond_Array['Discount_PKey'] = sqlFilter($_REQUEST["Discount_PKey"],"int");
	$sql = 'Select * From discount_img Where Sort= :Sort and Discount_PKey= :Discount_PKey';
	$rs = new recordset($sql,$Cond_Array);
	if (! $rs->eof){
		$PKey = authcode($rs->field("Discount_PKey"),'ENCODE');
		$ext = strtolower(substr(strrchr($rs->field("Photo1"),"."),1));
		$webp_file = str_ireplace($ext,'webp',$rs->field("Photo1"));
		DelFile('../../Upload/'.$rs->field("Forder").'/'.$rs->field("Photo1"));
		DelFile('../../Upload/'.$rs->field("Forder").'/'.$webp_file);

		$pdo = new dbPDO();
		$table_name = 'discount_img';
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

$sql = 'Select * From discount Where PKey= :PKey';
$rs = new recordset($sql,array(SqlFilter($Update_PKey,"int")));
if (! $rs->eof){
	$Discount_PKey = $rs->field("PKey");
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
	
	$Photo = array();
	$PhotoS = array();
	$PhotoM = array();
	$sql = 'Select * from discount_img Where Discount_PKey= :Discount_PKey and Photo1 <> \'\' Order By Sort';
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
                  <td>圖片上傳<span class="require_onced">*</span></td>
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
                      <li>圖片建議尺寸：寬365px * 高240px。</li>
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
