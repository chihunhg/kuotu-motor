<?php
require_once("../_inc.php");
$subitem = "s3";

//刪除選取的圖檔
if ($_REQUEST["motion"] == "del" && is_numeric($_REQUEST["imgNo"])){
	//取出圖檔路徑
	$SQL = "Select * From webset ";
	$rs = new recordset($SQL);
	if (! $rs->eof){
		$PKey = authcode($rs->field("PKey"),'ENCODE');
		$ext = strtolower(substr(strrchr($rs->field("Photo".$_REQUEST["imgNo"]),"."),1));
		$webp_file = str_ireplace($ext,'webp',$rs->field("Photo".$_REQUEST["imgNo"]));
		DelFile('../../Upload/'.$rs->field("Forder").'/'.$rs->field("Photo".$_REQUEST["imgNo"]));
		DelFile('../../Upload/'.$rs->field("Forder").'/'.$webp_file);
		
		$sql  = "Update webset Set " ;
		$sql .= " Photo".$_REQUEST["imgNo"]."='',";		
		$sql .= " PhotoW".$_REQUEST["imgNo"]."=0,";		
		$sql .= " PhotoH".$_REQUEST["imgNo"]."=0 ";
		$sql .= " Where PKey =".$rs->field("PKey");
		execute_sql($sql);
		
		//寫入後台管理記錄
		manage_history($Module_PKey,'頁首／頁尾',$sql,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);	
	}
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('成功刪除!');" ;
	ECHO "location.href='".$_SERVER["PHP_SELF"]."';" ;
	ECHO "</script>" ;
	exit() ;
}

$sql = "Select * from webset ";
$rs = new recordset($sql);
if(! $rs->eof){
	$Module_1 = explode(',',$rs->field("Module_1"));
	$Module_2 = explode(',',$rs->field("Module_2"));
	$Contact = explode(',',$rs->field("Contact"));
	$isShow = $rs->field("isShow");
	$Photo1 = $rs->field("Photo1");
	$Photo2 = $rs->field("Photo2");
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

      if ($("#preview1").prop('src') == '') {
        $("#Photo1_txt").text('請上傳網站識別(logo)');
        array.push('Photo1');
        flag = false;
      }

      var Total = $('input[name="Module_1[]"]:checked').length;
      if (Total == 0) {
        $("#Module_1_txt").text('頁首選單請勾選');
        array.push('h-menu1');
        flag = false;
      }

      if (flag == false) {
        var field = array[0];
        alert('發生錯誤，請填寫下列欄位');
        $('#' + field).focus();
      } else {
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
        <h1>頁首／頁尾</h1>
        <main class="none">
          <form action="brandin.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit='if (fieldCheck0(this)) {return true; login(this);} else {return false;}'>
            <section>
              <h2>頁首設定</h2>
              <table class="detail">
                <tr>
                  <td>
                    <label for="label">網站識別<span class="require_onced">*</span><br><span>(logo)</span></label>
                    <div class="box">
                      <div class="upload-box" style="margin-top:0;">
                        <div class="photo">
                          <?php if(strLen($Photo1) > 10){?>
                          <img id="preview1" style="max-width: 150px; max-height: 150px;" src="../../Upload/<?php echo $Photo1.'?'.time()?>">
                          <a href="javascript:if(confirm('確定刪除嗎？')){location.href='<?php echo $_SERVER['PHP_SELF']?>?motion=del&amp;imgNo=1';};" class="btn line">刪除圖片</a>
                          <?php }else{?>
                          <img id="preview1" style="max-width: 150px; max-height: 150px;">
                          <div id="size1"></div>
                          <?php }?>
                          <span id="Photo1_txt"></span>
                        </div>
                        <div class="file-upload">
                          <label for="Photo1">
                            <input name="Photo1" type="file" accept="image/jpeg,image/gif,image/png" id="Photo1" size="30" onChange="checkFile('Photo1',1000,'img')" />
                            選擇檔案</label>
                        </div>
                      </div>
                    </div>

                  </td>
                </tr>
                <tr>
                  <td class="clear">
                    <label for="label">頁首選單<span class="require_onced">*</span><br>
                      <span>(請勾選顯示項目)</span></label>
                    <div class="menuSelect">
                      <ul>
                        <?php 
                          $i = 0;
                          $sql = "Select * from module_p Where intPage = 2 and Upload='Yes' Order By Sort,PKey ";
                          $rs = new recordset($sql);
                          while(! $rs->eof){
                            $i++;
                            $chk = '';
                            if(in_array($rs->field("PKey"),$Module_1)){
                              $chk = 'checked="checked"';
                            }
                          ?>
                        <li>
                          <input type="checkbox" id="h-menu<?php echo $i?>" name="Module_1[]" value="<?php echo $rs->field("PKey")?>" <?php echo $chk?>>
                          <label for="h-menu<?php echo $i?>"><span></span><?php echo $rs->field("strName")?></label>
                        </li>
                        <?php 
                          $rs->movenext();
                          }
                          ?>
                      </ul>
                      <span id="Module_1_txt"></span>
                    </div>
                  </td>
                </tr>
              </table>
              <div class="notes">
                <p>備註</p>
                <ul>
                  <li>下架單元，頁首選單預設不顯示。</li>
                </ul>
              </div>
            </section>
            <section>
              <h2>頁尾設定</h2>
              <table class="detail">
                <tr>
                  <td>
                    <label for="label">網站識別(logo)</label>
                    <div class="box">
                      <div class="default-img-box">
                        <ul>
                          <li><input type="radio" name="isShow" id="isShow1" value="0" <?php if(empty($isShow)){echo 'checked';}?>><label for="isShow1"><span></span>無圖片</label></li>
                        </ul>
                      </div>
                      <div class="upload-box">
                        <div class="upload-title"><input type="radio" name="isShow" id="isShow2" value="1" <?php if($isShow==1){echo 'checked';}?>><label for="isShow2"><span></span>上傳圖片</label></div>
                        <div class="photo">
                          <?php if(strLen($Photo2) > 10){?>
                          <img id="preview2" style="max-width: 150px; max-height: 150px;" src="../../Upload/<?php echo $Photo2.'?'.time()?>">
                          <a href="javascript:void(0);" onclick="if(confirm('確定刪除嗎？')){location.href='<?php echo $_SERVER['PHP_SELF']?>?motion=del&amp;imgNo=2';};" class="btn line">刪除圖片</a>
                          <?php }else{?>
                          <img id="preview2" style="max-width: 150px; max-height: 150px;">
                          <div id="size2"></div>
                          <?php }?>
                          <span id="Photo2_txt"></span>
                        </div>
                        <div class="file-upload">
                          <label for="Photo2"><input name="Photo2" type="file" accept="image/jpeg,image/gif,image/png" id="Photo2" size="30" onChange="checkFile('Photo2',1000,'img')" />選擇檔案</label>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="clear">
                    <label for="label">頁尾選單<br>
                      <span>(請勾選顯示項目)</span></label>
                    <div class="menuSelect">
                      <ul>
                        <?php 
                          $i = 0;
                          $sql = "Select * from module_p Where intPage = 2 and Upload='Yes' Order By Sort,PKey ";
                          $rs = new recordset($sql);
                          while(! $rs->eof){
                            $i++;
                            $chk = '';
                            if(in_array($rs->field("PKey"),$Module_2)){
                              $chk = 'checked="checked"';
                            }
                          ?>
                        <li>
                          <input type="checkbox" id="f-menu<?php echo $i?>" name="Module_2[]" value="<?php echo $rs->field("PKey")?>" <?php echo $chk?>>
                          <label for="f-menu<?php echo $i?>"><span></span><?php echo $rs->field("strName")?></label>
                        </li>
                        <?php 
                          $rs->movenext();
                          }
                          ?>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="clear">
                    <label for="label">聯絡資訊<br>
                      <span>(請勾選顯示項目)</span></label>
                    <div class="menuSelect">
                      <ul>
                        <li>
                          <input type="checkbox" id="c-menu1" name="Contact[]" value="1" <?php if(in_array(1,$Contact)){ echo 'checked="checked"';}?>>
                          <label for="c-menu1"><span></span>地址</label>
                        </li>
                        <li>
                          <input type="checkbox" id="c-menu2" name="Contact[]" value="2" <?php if(in_array(2,$Contact)){ echo 'checked="checked"';}?>>
                          <label for="c-menu2"><span></span>電話</label>
                        </li>
                        <li>
                          <input type="checkbox" id="c-menu3" name="Contact[]" value="3" <?php if(in_array(3,$Contact)){ echo 'checked="checked"';}?>>
                          <label for="c-menu3"><span></span>傳真</label>
                        </li>
                        <li>
                          <input type="checkbox" id="c-menu4" name="Contact[]" value="4" <?php if(in_array(4,$Contact)){ echo 'checked="checked"';}?>>
                          <label for="c-menu4"><span></span>信箱</label>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
              </table>
              <div class="notes" style="margin-top:1em">
                <p>備註</p>
                <ul>
                  <li>下架單元，頁尾選單預設不顯示。</li>
                  <li>聯絡資訊的內容可以在網站設定調整</li>
                </ul>
              </div>
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
