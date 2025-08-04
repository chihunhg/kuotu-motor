<?php
require_once("../_inc.php");
$subitem     = "s4";

//刪除選取的圖檔
if ($_REQUEST["motion"] == "del" && is_numeric($_REQUEST["imgNo"])){
	//取出圖檔路徑
	$SQL = "Select * From dbhome ";
	$rs = new recordset($SQL);
	if (! $rs->eof){
		$PKey = authcode($rs->field("PKey"),'ENCODE');
		$ext = strtolower(substr(strrchr($rs->field("Photo".$_REQUEST["imgNo"]),"."),1));
		$webp_file = str_ireplace($ext,'webp',$rs->field("Photo".$_REQUEST["imgNo"]));
		DelFile('../../Upload/'.$rs->field("Forder").'/'.$rs->field("Photo".$_REQUEST["imgNo"]));
		DelFile('../../Upload/'.$rs->field("Forder").'/'.$webp_file);
		
		$sql  = "Update dbhome Set " ;
		$sql .= " Photo".$_REQUEST["imgNo"]."='',";		
		$sql .= " PhotoW".$_REQUEST["imgNo"]."=0,";		
		$sql .= " PhotoH".$_REQUEST["imgNo"]."=0 ";
		$sql .= " Where PKey =".$rs->field("PKey");
		execute_sql($sql);
		
		//寫入後台管理記錄
		manage_history($Module_PKey,'首頁區塊',$sql,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);	
	}
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('成功刪除!');" ;
	ECHO "location.href='".$_SERVER["PHP_SELF"]."';" ;
	ECHO "</script>" ;
	exit() ;
}

$sql = "Select * From dbhome ";
$rs = new recordset($sql);
if (! $rs->eof){
	$strName = htmlspecialchars($rs->field("strName"),ENT_QUOTES, 'UTF-8');
	$strLink = htmlspecialchars($rs->field("strLink"),ENT_QUOTES, 'UTF-8');
	$Contents = $rs->field("Contents");
	$isShow1 = $rs->field("isShow1");
	$Photo1 = $rs->field("Photo1");
	$isShow2 = $rs->field("isShow2");
	$Photo2 = $rs->field("Photo2");
	$dtDate = $rs->field("dtDate");
}else{
	$SQL_U = "insert into dbhome set dtDate = '".strftime("%Y/%m/%d %H:%M:%S")."' ";
	execute_sql($SQL_U);
}

$Array_MU_Name = array();//單元名稱
$sql = "Select PKey, strName from module_p Where intPage = 2 and Upload='Yes' and PageLink <> '' Order By PKey";
$rs = new recordset($sql);
while (! $rs->eof){
	$i = $rs->field("PKey");
	$Array_MU_Name[$i] = $rs->field("strName");
$rs->movenext();
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
    $(function() {
      // 讓 #textarea_1_1 及 #input_1_1 能限制輸入長度
      // 長度最多 20 字, 訊息狀態部份採用滑出入方式
      $("#Contents").maxlength({
        maxCharacters: 200,
        slider: true
      });
    });

    //偵測Form裡的各欄位----^_^
    function login(theForm) {
      theForm.submit()
    }

    function fieldCheck0(theForm) {

      if ($("#strName").lentth > 0) {
        if ($("#strName").val() == '') {
          $("#strName_txt").text('標題空白');
          flag = false;
        }
      }

      if ($("#Contents").lentth > 0) {
        if ($("#Contents").val() == '') {
          $("#Contents_txt").text('內容空白');
          flag = false;
        }
      }

      if ($("#strLink").lentth > 0) {
        if ($("#strLink").val() == '') {
          $("#strLink_txt").text('連結按鈕空白');
          flag = false;
        }
      }

      return flag;
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
        <h1>首頁區塊</h1>
        <main class="none">
          <form action="blockin.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit='if (fieldCheck0(this)) {return true; login(this);} else {return false;}'>
            <section>
              <h2>區塊一：<?php echo $Array_MU_Name[3]?></h2>
              <table class="detail">
                <tr>
                  <td>
                    <label for="label">標題<span class="require_onced">*</span></label>
                    <div class="box">
                      <input type="text" value="<?php echo $strName?>" id="strName" name="strName">
                      <span id="strName_txt"></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="label">內容<span class="require_onced">*</span></label>
                    <div class="box">
                      <textarea name="Contents" id="Contents" cols="30" rows="10"><?php echo $Contents?></textarea>
                      <span id="Contents_txt"></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="label">連結按鈕<span class="require_onced">*</span></label>
                    <div class="box">
                      <input type="text" id="strLink" name="strLink" value="<?php echo $strLink?>">
                      <span id="strLink_txt"></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="label">圖片上傳<span class="require_onced">*</span></label>
                    <div class="box">
                      <div class="default-img-box">
                        <ul>
                          <li class="non"><input type="radio" name="isShow1" id="img-upl-bka1" value="0" <?php if(empty($isShow1)){echo 'checked';}?>><label for="img-upl-bka1"><span></span>無圖片</label></li>
                          <li><input type="radio" name="isShow1" id="img-upl-bka2" value="1" <?php if($isShow1==1){echo 'checked';}?>><label for="img-upl-bka2"><span></span><img src="../../images/default/home6.jpg?<?php echo time()?>"></label></li>
                        </ul>
                      </div>
                      <div class="upload-box">
                        <div class="upload-title"><input type="radio" name="isShow1" id="img-upl-bka3" value="2" <?php if($isShow1==2){echo 'checked';}?>><label for="img-upl-bka3"><span></span>上傳圖片</label></div>
                        <div class="photo"> <?php if(strLen($Photo1) > 10){?>
                          <img id="preview1" style="max-width: 150px; max-height: 150px;" src="../../Upload/<?php echo $Photo1.'?'.time()?>">
                          <span id="Photo1_txt"></span>
                          <a href="javascript:void(0);" onclick="if(confirm('確定刪除嗎？')){location.href='<?php echo $_SERVER['PHP_SELF']?>?motion=del&amp;imgNo=1';};" class="btn line">刪除圖片</a>
                          <?php }else{?>
                          <img id="preview1" style="max-width: 150px; max-height: 150px;">
                          <div id="size1"></div>
                          <span id="Photo1_txt"></span>
                          <?php }?>
                        </div>
                        <div class="file-upload">
                          <label for="Photo1">
                            <input name="Photo1" type="file" accept="image/jpeg,image/gif,image/png" id="Photo1" size="30" onChange="checkFile('Photo1',1000,'img')" />選擇檔案
                          </label>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </section>
            <section>
              <h2>區塊二：<?php echo $Array_MU_Name[5]?></h2>
              <table class="detail">
                <tr>
                  <td>
                    <p>① 顯示「<?php echo $Array_MU_Name[5]?>」單元內容，依照修改日期新至舊顯示最新六則。</p>
                  </td>
                </tr>
              </table>
            </section>
            <section>
              <h2>區塊三：<?php echo $Array_MU_Name[4]?></h2>
              <table class="detail">
                <tr>
                  <td>
                    <p>① 顯示「<?php echo $Array_MU_Name[4]?>」單元內容，依照刊登日期新至舊顯示最新六則。</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="label">② 圖片上傳<span class="require_onced">*</span></label>
                    <div class="box">
                      <div class="default-img-box">
                        <ul>
                          <li class="non"><input type="radio" name="isShow2" id="img-upl-bkb1" value="0" <?php if(empty($isShow2)){echo 'checked';}?>><label for="img-upl-bkb1"><span></span>無圖片</label></li>
                          <li><input type="radio" name="isShow2" id="img-upl-bkb2" value="1" <?php if($isShow2==1){echo 'checked';}?>><label for="img-upl-bkb2"><span></span><img src="../../images/default/home7.jpg?<?php echo time()?>"></label></li>
                        </ul>
                      </div>
                      <div class="upload-box">
                        <div class="upload-title"><input type="radio" name="isShow2" id="img-upl-bkb3" value="2" <?php if($isShow2==2){echo 'checked';}?>><label for="img-upl-bkb3"><span></span>上傳圖片</label></div>
                        <div class="photo"><?php if(strLen($Photo2) > 10){?>
                          <img id="preview2" style="max-width: 150px; max-height: 150px;" src="../../Upload/<?php echo $Photo2.'?'.time()?>">
                          <span id="Photo2_txt"></span>
                          <a href="javascript:if(confirm('確定刪除嗎？')){location.href='<?php echo $_SERVER['PHP_SELF']?>?motion=del&amp;imgNo=2';};" class="btn line">刪除圖片</a>
                          <?php }else{?>
                          <img id="preview2" style="max-width: 150px; max-height: 150px;">
                          <div id="size2"></div>
                          <span id="Photo2_txt"></span>
                          <?php }?>
                        </div>
                        <div class="file-upload">
                          <label for="Photo2"><input name="Photo2" type="file" accept="image/jpeg,image/gif,image/png" id="Photo2" size="30" onChange="checkFile('Photo2',1000,'img')" />
                            選擇檔案</label>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </section>
            <?php require_once("../_submit.php"); ?>
          </form>
        </main>
      </div>
    </div>
  </div>
  <?php require_once("../_in_code_bottom.php"); ?>
</body>

</html>
