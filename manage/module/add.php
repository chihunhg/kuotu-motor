<?php
require_once("../_inc.php");
$mainitem    ='home';
$subitem     = "s2";
$ModuleNo = 98;

if ($_SESSION["Login_ID"] != "Admin"){
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('無進入[".$m98."]權限!');";
	ECHO "location.href='../index.php';";
	ECHO "</script>";
	exit;
}

//參數解碼
if ($_REQUEST["PKey"] <> ""){
	$Update_PKey = authcode($_REQUEST["PKey"],'DECODE');
}

if ($_REQUEST["Submit"] == "送出"){
	//表單檔案驗證
	$MSG = "";
	if (strLen($_POST['strName']) == 0){
		$MSG .= "【單元名稱】為空白\\n";
	}

	if (! is_numeric($_POST['Sort']) || strLen($_POST['Sort']) == 0){
		$MSG .= "【單元順序】空白或非數字格式\\n";
	}

	if ($_POST['intType']==1 && strLen($_POST['intUse']) == 0){
		$MSG .= "【功能模組】請選擇\\n";
	}else{
		$strLink = 'none';
		$Home = '';
		$intLocal = 0;
		$sql = "Select * from program Where PKey=".SqlFilter($_POST['intUse'],'int');
		$rs = new recordset($sql);
		if(! $rs->eof){
			$strLink = $rs->field("strLink");
			$Home = $rs->field("Home");
			if($rs->field("Home")=='Yes'){
				$intLocal = $rs->field("PKey")-1;				
			}
		}
	}

	if ($_POST['intPage']==2 && strLen($_POST['PageLink']) == 0){
		$MSG .= "【前台連結網址】為空白\\n";
	}
	
	if ($MSG == ""){
		$data_array['intLang'] = SqlFilter($intLang,"int");
		$data_array['Sort'] = SqlFilter($_POST['Sort'],"int");
		$data_array['intType'] = SqlFilter($_POST['intType'],"int");
		$data_array['intUse'] = SqlFilter($_POST['intUse'],"int");
		$data_array['strName'] = $_POST['strName'];
		$data_array['Home'] = SqlFilter($Home,"tab");
		$data_array['intLocal'] = SqlFilter($intLocal,"int");
		if($strLink !='none'){
		$data_array['strLink'] = SqlFilter($strLink,"tab");	
		}
		$data_array['intList'] = SqlFilter($_POST['intItem'],"int");
		$data_array['selList'] = SqlFilter($strList,"tab");
		$data_array['selDetail'] = SqlFilter($selDetail,"tab");
		$data_array['PageLink'] = SqlFilter($_POST['PageLink'],"tab");
		$data_array['intPage'] = SqlFilter($_POST['intPage'],"int");
		$data_array['intDetail'] = SqlFilter($_POST['intDetail'],"int");
		$data_array['intLayer'] = SqlFilter($_POST['intLayer'],"int");
		$data_array['intColum'] = SqlFilter($_POST['intColum'],"int");
		
		$data_array['Upload'] = $_POST['Upload'];
		$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
		$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
		$data_array['UserID'] = SqlFilter($_SESSION["Login_ID"],"tab");
		
		$pdo = new dbPDO();
		$table_name = 'module_p';
		$pdo->insert($table_name,$data_array);
		$Module_PKey = $pdo->getLastId();
		$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$Module_PKey;
		unset($data_array);
		$pdo->close();
		//寫入後台管理記錄
		manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);

		//產生子階層連結
		switch($_POST['intLayer']){
			case 2:				
				$subLink = array('class1',$strLink);
				//捐款專案功能模組
				if($_POST['intUse']==20){
					$subLink = array('project','donation');
				}
				break;
			case 3:
				$subLink = array('class1','class2',$strLink);
				break;
			case 4:
				$subLink = array('class1','class2','class3',$strLink);
				break;
			case 5:
				$subLink = array('class1','class2','class3','class4',$strLink);
				break;
		}
		
		for ($i=0;$i<$_POST['intLayer'];$i++){			
			$j = $i+1;

			$Cond_Array['Module_PKey'] = SqlFilter($Module_PKey,'int');
			$Cond_Array['Sort'] = SqlFilter($j,'int');			
			$sql = 'Select PKey from module_d Where Module_PKey = :Module_PKey and Sort = :Sort';
			$rs = new recordset($sql,$Cond_Array);
			if ($rs->eof){	
				$data_array['Sort'] = SqlFilter($j,"int");
				$data_array['Module_PKey'] = SqlFilter($Module_PKey,"int");
				$data_array['strName'] = SqlFilter($_POST["strName".$j],"tab");
				$data_array['strLink'] = SqlFilter($subLink[$i],"tab");
				$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
				$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
				$data_array['UserID'] = SqlFilter($_SESSION["Login_ID"],"tab");
				$pdo = new dbPDO();
				$table_name = 'module_d';
				$pdo->insert($table_name,$data_array);
				$PKey = $pdo->getLastId();
				$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$PKey;
				unset($data_array);
				$pdo->close();
			}else{				
				$data_array['Sort'] = SqlFilter($j,"int");
				$data_array['Module_PKey'] = SqlFilter($Module_PKey,"int");
				$data_array['strName'] = SqlFilter($_POST["strName".$j],"tab");
				$data_array['strLink'] = SqlFilter($subLink[$i],"tab");
				$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
				$data_array['UserID'] = SqlFilter($_SESSION["Login_ID"],"tab");
				$pdo = new dbPDO();
				$table_name = 'module_d';
				$pdo->update($table_name,$data_array,'PKey',$rs->field("PKey"));
				$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$rs->field("PKey");
				unset($data_array);
				$pdo->close();				
			}
			unset($Cond_Array);
			$rs->close();
			//寫入後台管理記錄
			manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);
		}

		for ($i=1;$i<=$_POST['intColum'];$i++){
			$pdo_cond = ' Where Module_PKey = :Module_PKey and Sort = :Sort';
			$Cond_Array['Module_PKey'] = SqlFilter($Module_PKey,'int');
			$Cond_Array['Sort'] = SqlFilter($i,'int');
			
			$sql = 'Select PKey from module_c '.$pdo_cond;
			$rs = new recordset($sql,$Cond_Array);
			if ($rs->eof){	
				$data_array['Sort'] = SqlFilter($i,"int");
				$data_array['Module_PKey'] = SqlFilter($Module_PKey,"int");
				$data_array['strName'] = SqlFilter($_POST["Colum".$i],"tab");
				$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
				$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
				$data_array['UserID'] = SqlFilter($_SESSION["Login_ID"],"tab");

				$pdo = new dbPDO();
				$table_name = 'module_c';
				$pdo->insert($table_name,$data_array);
				$PKey = $pdo->getLastId();
				$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$PKey;
				unset($data_array);
				$pdo->close();
			}else{				
				$data_array['Sort'] = SqlFilter($i,"int");
				$data_array['Module_PKey'] = SqlFilter($Module_PKey,"int");
				$data_array['strName'] = SqlFilter($_POST["Colum".$i],"tab");
				$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
				$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
				$data_array['UserID'] = SqlFilter($_SESSION["Login_ID"],"tab");
				
				$pdo = new dbPDO();
				$table_name = 'module_c';
				$pdo->update($table_name,$data_array,'PKey',$rs->field("PKey"));
				$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$rs->field("PKey");
				unset($data_array);
				$pdo->close();				
			}
	
			//寫入後台管理記錄
			manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);
		}
		$show = "新增成功!";
		/*echo $_POST['OpenDate'].'<br>';
		echo $SQL_U;
		exit();*/
		//清除Session變數
		unset($_SESSION["Pkey_".$ModuleNo]);
		ECHO "<script language=\"javascript\">" ;
		ECHO "alert('".$show."');";
		ECHO "location.href='list.php';";
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

$List = array(0);
$Detail = array(0);
$Keywords = array();
$sql = 'Select * From module_p Where PKey= :PKey';
$rs = new recordset($sql,array(SqlFilter($Update_PKey,"int")));
if (! $rs->eof){
	$Module_PKey = $rs->field("PKey");
	$Sort = $rs->field("Sort");
	$strName = htmlspecialchars($rs->field("strName"),ENT_QUOTES, 'UTF-8');
	$Home = $rs->field("Home");
	$intType = $rs->field("intType");	
	$intUse = $rs->field("intUse");	
	$intPage = $rs->field("intPage");	
	$PageLink = $rs->field("PageLink");
	$intList = $rs->field("intList");	
	$intDetail = $rs->field("intDetail");	
	$intLayer = $rs->field("intLayer");
	$Upload = $rs->field("Upload");
	$dtUDate = $rs->field("dtUDate");
	$UserID = $rs->field("UserID");
	$sql = "Select * from program Where PKey=".$rs->field("intUse");
	$rs1 = new recordset($sql);
	if(! $rs1->eof){
		$isList = $rs1->field("isList");
		$isDetail = $rs1->field("isDetail");
		$MaxLayer = $rs1->field("MaxLayer");
		$isColum = $rs1->field("isColum");
	}
}

if(empty($intType)){$intType=1;}
if(empty($intColum)){$intColum=0;}
if(empty($intUse)){$intUse=0;}
if(empty($isList)){$isList=0;}
if(empty($isDetail)){$isDetail=0;}
if(empty($isColum)){$isColum=0;}
if(empty($MaxLayer)){$MaxLayer=0;}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
<meta charset="UTF-8">
<title><?php echo $WebName?>｜後端管理系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php require_once("../_in_javascript.php"); ?>
<script>

$(function(){
	// 讓 #textarea_1_1 及 #input_1_1 能限制輸入長度
	// 長度最多 20 字, 訊息狀態部份採用滑出入方式
	$("#Interview").maxlength({
		maxCharacters: 400,
		slider: true
	});
	var Layer= $("#intLayer").val();
	var chkUse= $("#chkUse").val();
	var intL = $("#isItem").val();
	var intD = $("#isDetail").val();
	showModule(<?php echo $intType?>);
	showUse(chkUse,intL,intD,<?php echo $MaxLayer?>);
});

function showLayer(){
	var PKey= $("#Module_PKey").val();
	var Layer= $("#intLayer").val();
	var chkUse= $("#chkUse").val();
	console.log("_sublist.php?PKey="+PKey+"&Layer="+Layer+"&chkUse="+chkUse);
	$.ajax({
	   type: "POST",
	   url: "_sublist.php",
	   data: "PKey="+PKey+"&Layer="+Layer+"&chkUse="+chkUse,
	   error: function(xhr, status, error) {
	   var err = JSON.parse(xhr.responseText);
	   console.log(err.Message);
	   },
		success: function(stxt){
		$("#subList").html(stxt);
		//console.log(stxt);
		}
	});
}

function showModule(num){
	var chkUse = $("#chkUse").val();
/* 	$("#intPage1").prop('checked',true);
	$("#intPage2").prop('checked',false);	
	if(num==2){
		$("#intPage1").prop('checked',false);
		$("#intPage2").prop('checked',true);
	} */
	for (i=1;i<4;i++){
		if (num==2){
			$("#tr_"+i).hide();
		}else{
			$("#tr_"+i).show();
			if (chkUse ==2 && (i==6||i==7)){
				$("#tr_"+i).hide();
			}			
		}
	}
}

function showUse(num,intL,intD,MaxLayer){
	console.log(num+','+intL+','+intD+','+MaxLayer);
	$("#isItem").val(intL);
	$("#isDetail").val(intD);
	$("#chkUse").val(num);
	$("#tr_2").hide();
	$("#tr_3").hide();
	$("#tr_4").hide();
	if(intL==1){
		$("#tr_2").show();
	}
	if(intD==1){
		$("#tr_3").show();
	}
	if(MaxLayer > 0){
		$("#tr_4").show();
		showLayer();
	}
}

function showLayer(){
	var PKey= $("#Module_PKey").val();
	var Layer= $("#intLayer").val();
	var chkUse= $("#chkUse").val();
	console.log("_sublist.php?PKey="+PKey+"&Layer="+Layer+"&chkUse="+chkUse);
	$.ajax({
	   type: "POST",
	   url: "_sublist.php",
	   data: "PKey="+PKey+"&Layer="+Layer+"&chkUse="+chkUse,
	   error: function(xhr, status, error) {
	   var err = JSON.parse(xhr.responseText);
	   console.log(err.Message);
	   },
		success: function(stxt){
		$("#subList").html(stxt);
		//console.log(stxt);
		}
	});
}

//偵測Form裡的各欄位----^_^
function login(theForm) 
 {
	theForm.submit()
  }
  
function fieldCheck0(theForm) {
  var flag = true;
  $("#Sort_txt").text('');
  $("#strName_txt").text('');
  if (isNaN(parseInt($("#Sort").val()))){
	$("#Sort_txt").text('順序不是數字');
	flag = false;
  }
  
  if ($("#strName").val()==''){
    $("#strName_txt").text('單元名稱空白');
	flag = false;
  }

  if (theForm.intPage[1].checked && theForm.PageLink.value == ""){
    $("#PageLink_txt").text('前台連結網址空白');
	flag = false;
  }
	
  if(theForm.intType[0].checked && theForm.chkUse.value==""){
    $("#chkUse_txt").text('功能模組未選擇');
	flag = false;
  }			
  
  var Layer= parseInt($("#intLayer").val(),10);
  for (i=1;i<=Layer;i++){
	if ($("#strName"+i).val()==''){
		$('#strName'+i+'_txt').text('子單元名稱'+i+'空白');
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
      <h1>單元設定</h1>
      <main>
        <form action="" method="post" name="form1" id="form1" onSubmit='if (fieldCheck0(this)) {return true; login(this);} else {return false;}'>
          <table cellspacing="0" cellpadding="0" width="100%" border="0" class="detail">
            <tr>
              <td>單元順序<span class="require_onced">*</span></td>
              <td>
                <input name="Sort" type="text" class="m-input" id="Sort" style="width:10%;" value="<?php echo $Sort?>" maxlength="2" />
                <span id="Sort_txt">限輸入數字</span></td>
            </tr>
            <tr>
              <td>單元名稱<span class="require_onced">*</span></td>
              <td>
                <input name="strName" type="text" id="strName" class="m-input" value="<?php echo $strName?>" style="width:20%;" maxlength="20" />
                <span id="strName_txt"></span></td>
            </tr>
            <tr>
              <td>單元型態<span class="require_onced">*</span></td>
              <td>
                <input name="intType" type="radio" value="1" <?php if($intType ==1){echo 'checked="checked"';}?> onClick="showModule(1)" />
                功能頁面
                <input name="intType" type="radio" value="2" <?php if($intType ==2){echo 'checked="checked"';}?> onClick="showModule(2)" />
                美工頁面</td>
            </tr>
            <tr>
              <td>前台單元<span class="require_onced">*</span></td>
              <td>
                <input type="radio" name="intPage" id="intPage1" value="1" <?php if($intPage !=2){echo 'checked="checked"';}?> />
                無前台頁面
                <input type="radio" name="intPage" id="intPage2" value="2" <?php if($intPage ==2){echo 'checked="checked"';}?> onClick="showSEO(2)" />
                有前台頁面 ；連結檔案名稱
                <input name="PageLink" type="text" id="PageLink" value="<?php echo $PageLink?>" style="width:20%;" placeholder="例：about.htm" />
				<span id="PageLink_txt"></span>
              </td>
            </tr>
            <tr id="module">
              <td>功能模組</td>
              <td>
                <div class="menuSelect none">
                  <ul>
                    <?php 
					$i = 0;
					$sql = "Select * from program Order By Sort";
					$rs = new recordset($sql);
					while (! $rs->eof){
						$i++;
					?>
                    <li>
                      <input type="radio" name="intUse" id="intUse<?php echo $i?>" value="<?php echo $rs->field("PKey")?>" <?php if($rs->field("PKey")==$intUse){echo 'checked="checked"';}?> onClick="showUse(<?php echo $rs->field("PKey")?>,<?php echo $rs->field("isList")?>,<?php echo $rs->field("isDetail")?>,<?php echo $rs->field("MaxLayer")?>)" />
                      <label for="intUse<?php echo $i?>"><span></span><?php echo $rs->field("strName")?></label>
                    </li>
                    <?php 
					$rs->movenext();
					}
					?>
                  </ul>
				  <input type="hidden" name="chkUse" id="chkUse" value="<?php echo $intUse?>" />
                </div>
				<span id="chkUse_txt"></span>
              </td>
            </tr>
            <tr id="tr_1">
              <td>列表樣式</td>
              <td>
                <!--改成下拉選項-->
                <select name="intItem" id="intItem">
                  <option value="1" <?php if($intList==1){echo 'selected="selected"';}?>>文字列表</option>
                  <option value="2" <?php if($intList==2){echo 'selected="selected"';}?>>圖片列表</option>
                </select>
                <!--改成下拉選項-->
              </td>
            </tr>
            <tr id="tr_2">
              <td>底層樣式</td>
              <td>
                <!--改成下拉選項-->
                <select name="intDetail" id="intDetail">
                  <option value="1" <?php if($intDetail==1){echo 'selected="selected"';}?>>上圖下文</option>
                  <option value="2" <?php if($intDetail==2){echo 'selected="selected"';}?>>左圖右文</option>
                  <option value="3" <?php if($intDetail==3){echo 'selected="selected"';}?>>組合圖文</option>
                </select>
                <!--改成下拉選項-->
              </td>
            </tr>
            <tr id="tr_3">
              <td>單元階層</td>
              <td id="subList" class="step-gp">
                <select name="intLayer" id="intLayer" onChange="showLayer()">
                  <option value="" >請選擇</option>
                  <?php for($i=2;$i<= $MaxLayer;$i++){?>
                  <option value="<?php echo $i?>" <?php if($intLayer==$i){echo 'selected="selected"';}?>><?php echo $i?></option>
                  <?php }?>
                </select>
                <input name="oldLayer" type="hidden" id="oldLayer" value="<?php echo $intLayer?>" />
                <ul>
                  <?php 
					if ($intLayer > 1){
						$i = 0;
						$sql = "Select * from module_d Where Module_PKey = ".$Module_PKey." Order By Sort";
						$rs = new recordset($sql);
						while (! $rs->eof){
							$i++;
							switch($rs->field("Sort")){
								case 1:
									$strName = '類別';
									break;
								case 2:
									$strName = '列表';
									break;
							}
					?>
                  <li>第<?php echo $rs->field("Sort")?>階名稱
                    <input type="text" name="strName<?php echo $rs->field("Sort")?>" id="strName<?php echo $rs->field("Sort")?>" value="<?php echo $rs->field("strName")?>" style="width:20%;" placeholder="<?php echo $strName?>" />
                    <span id="strName<?php echo $rs->field("Sort")?>_txt"></span></li>
                  <?php 
						$rs->movenext();
						}
					}
					?>
                </ul>
              </td>
            </tr>
            <tr>
              <td>上下架</td>
              <td>
                <select name="Upload" id="Upload" class="m-select">
                  <option value="Yes" <?php if ($Upload=="Yes"){ echo "selected=\"selected\"";}?>>上架</option>
                  <option value="No" <?php if ($Upload=="No"){ echo "selected=\"selected\"";}?>>下架</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>修改日期</td>
              <td>
                <?php require_once("../_modify.php") ?>
                <input name="Module_PKey" type="hidden" id="Module_PKey" value="<?php echo $Module_PKey?>" />
                <input type="hidden" name="intColum" id="intColum" value="<?php echo $intColum?>" />
                <input type="hidden" name="isItem" id="isItem" value="<?php echo $isList?>" />
                <input type="hidden" name="isDetail" id="isDetail" value="<?php echo $isDetail?>" />
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

