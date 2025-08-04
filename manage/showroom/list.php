<?php
require_once("../_inc.php");
require_once("../_module.php");

//清除Session變數
unset($_SESSION["PKey_".$ModuleNo]);
unset($Keywords);

//刪除
if($_REQUEST["Action"] == "del"){
	$array_cond = array();
	for($i=0;$i<count($_POST["nid"]);$i++){
		array_push($array_cond,' :PKey'.$_POST["nid"][$i]);
	}

	$sql = 'Select * From showroom Where PKey IN ('.implode(",",$array_cond).')';
	$rs = new recordset($sql,$_POST["nid"]);
	while (! $rs->eof){
		$pdo = new dbPDO();
		$sql = 'Select * From showroom_img Where Showroom_PKey= :Showroom_PKey';
		$rs1 = new recordset($sql,array($rs->field("PKey")));
		while (! $rs1->eof){
			//刪除圖檔
			$ext = strtolower(substr(strrchr($rs1->field("Photo1"),"."),1));
			$webp_file = str_ireplace($ext,'webp',$rs1->field("Photo1"));
			DelFile('../../Upload/'.$rs1->field("Forder").'/'.$rs1->field("Photo1"));
			DelFile('../../Upload/'.$rs1->field("Forder").'/'.$webp_file);
			$pdo->delete('showroom_img',' PKey= :PKey',array($rs1->field("PKey")));
		$rs1->movenext();
		}// while End	
		
		$pdo = new dbPDO();
		$pdo->delete('showroom',' PKey= :PKey',array($rs->field("PKey")));
		$pdo->close();
	$rs->movenext();
	}// while End
	unset($array_cond);
	$rs->close();
	
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('成功刪除!');" ;
	ECHO "location.href='".$_SERVER["PHP_SELF"]."';" ;
	ECHO "</script>" ;
	exit() ;
}

if ($_REQUEST["SortUpdate"] == "更新順序"){
	$Total = SqlFilter($_REQUEST["Total"],"int");
	for($i=1;$i<=$Total;$i++){
		$Sort = SqlFilter($_REQUEST["Sort".$i],"int");
		$PKey = SqlFilter($_REQUEST["PKey".$i],"int");
		
		$data_array['Sort'] = $Sort;
		$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
		
		$pdo = new dbPDO();
		$table_name = 'showroom';
		$pdo->update($table_name,$data_array,'PKey',$PKey);
		$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$PKey;
		unset($data_array);
		$pdo->close();
		
		//寫入後台管理記錄
		manage_history($Module_PKey,$Module_Name,$sql_u,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);
	}

	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('成功更新!');" ;
	ECHO "location.href='".$_SERVER["PHP_SELF"]."';" ;
	ECHO "</script>" ;
	exit() ;
}

$PDO_Cond = ' Where intLocal < :intLocal and Module_PKey= :Module_PKey and intLang= :intLang';
$Cond_Array['intLocal'] = 2 ;
$Cond_Array['Module_PKey'] = SqlFilter($Module_PKey,'int') ; 
$Cond_Array['intLang'] = SqlFilter($intLang,'int'); 

//判斷有無執行搜尋
if ($_REQUEST["Submit"] == "搜尋" OR $_REQUEST["Send"] == "搜尋"){
	$Keywords = $_REQUEST["Keywords"];
	$Class1 = SqlFilter($_REQUEST["Class1"],"int");
	$intLocal = SqlFilter($_REQUEST["intLocal"],"int");
	$OpenDate = SqlFilter($_REQUEST["OpenDate"],"str");
	$EndDate = SqlFilter($_REQUEST["EndDate"],"str");

	$strF = 1;
	if ($Keywords != "" && $Keywords != "請輸入標題搜尋"){
		$Cond_Array['Keywords'] = $Keywords;
		if ($strF == 1){
			$PDO_Cond .= ' and Locate( :Keywords,strName)> 0';
		}
		$strF = 0;
	}

	if ($Class1 > 0){
		$Cond_Array['Class1_PKey'] = $Class1;
		if ($strF == 1){
			$PDO_Cond .= ' and Class1_PKey = :Class1_PKey';
		}else{
			$PDO_Cond .= ' and Class1_PKey = :Class1_PKey';
		}
		$strF = 0;
	}

	if ($intLocal > 0){
		$Cond_Array['Class2_PKey'] = $Class2;
		if ($strF == 1){
			$PDO_Cond .= ' Class2_PKey = :Class2_PKey';
		}else{
			$PDO_Cond .= ' and Class2_PKey = :Class2_PKey';
		}
		$strF = 0;
	}

	if (chkDate($OpenDate)){
		$Cond_Array['OpenDate'] = $OpenDate;
		if ($strF == 1){
			$PDO_Cond .= ' OpenDate >= :OpenDate';
		}else{
			$PDO_Cond .= ' and OpenDate >= :OpenDate';
		}
		$strF = 0;
	}

	if (chkDate($EndDate)){
		$Cond_Array['EndDate'] = $EndDate;
		if ($strF == 1){
			$PDO_Cond .= ' OpenDate <= :EndDate';
		}else{
			$PDO_Cond .= ' and OpenDate <= :EndDate';
		}
		$strF = 0;
	}
}

if ($Keywords == "")
	$Keywords="請輸入標題搜尋";

$sql = "Select Count(PKey) as Total From showroom ".$PDO_Cond;
$rs = new recordset($sql,$Cond_Array);
$Total = $rs->field("Total");//取得資料的總數
//頁數
$tSum=1;
$tPageTotal=1;
$tPage = 1;
//每頁幾筆-----
$tPageSize=15;
//總頁數-----
$tPageTotal = ceil(($Total/$tPageSize));

//目前頁數
if (SqlFilter($_REQUEST["Page"],"int") > 0)
	$tPage = $_REQUEST["Page"];
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
  <meta charset="UTF-8">
  <title><?php echo $WebName?>｜後端管理系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php require_once("../_in_javascript.php"); ?>
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
          <form action="" method="post" name="form1" id="form1" onsubmit="document.form1.Page.value=1">
		  <div class="m-search-bar"> <span class="span-group">品牌：
              <select name="Class1" id="Class1" class="m-select">
                <option value="">全部顯示</option>
                <?php
				$sql = 'Select PKey, strName From dbclass1 Where Module_PKey = 0 Order By Sort ';
				$rs1 = new recordset($sql);
				while(! $rs1->eof){
				?>
                <option value="<?php echo $rs1->field("PKey")?>"  <?php if(strval($Class1)==strval($rs1->field("PKey"))) {echo "selected=\"selected\"";}?>><?php echo $rs1->field("strName")?></option>
                <?php
				$rs1->movenext();
				}
				?>
              </select>
              </span> <span class="span-group"> 關鍵字：
                <input name="Keywords" type="text" value="<?php echo $Keywords?>" size="40" id="Keywords" onkeydown="if(event.keyCode==13){this.form.submit();}" onfocus="if (this.value == '<?php echo $Keywords?>') {this.value='';}" />
                <input name="Submit" type="submit" class="btn btn-outline-secondary" value="搜尋" id="Submit" />
              </span>
			</div>   
		  <div class="m-btn-group">
              <div class="item"><?php require_once("../_select.php"); ?>
                <input type="submit" name="SortUpdate" id="SortUpdate" class="btn btn-secondary" value="更新順序"></div>
              <div class="item">
			  <input type="button" name="button" id="button" class="btn btn-warning" value="新增資料" onclick="Update('add.php','')"  />
			  </div>
            </div>
            <div class="table-container">
              <table width="100%" cellspacing="0" cellpadding="0" class="list">
                <thead>
                  <tr>
                    <td width="5%">&nbsp;</td>
                    <td width="10%">順序</td>
					<td>品牌</td>
                    <td>標題</td>
                    <td width="10%">上下架</td>
                    <td width="10%">修改日期</td>
					<td width="10%">複製</td>
                    <td width="10%">編輯</td>
                  </tr>
                </thead>
                <?php
				$i = 0;
				$sql = 'Select * From showroom '.$PDO_Cond.' Order By Sort ';
				$rs = new recordset($sql,$Cond_Array);
				if ($rs->field("PKey") == ""){ echo "<tr bgcolor=\"#FFFFFF\"><td colspan=\"10\" align=\"center\" height=\"100\"><font color=\"red\">暫無資料</font></td></tr>";}
				while (! $rs->eof){
					$i++;
					//取下架日期
					$Upload = "上架";
					if($rs->field("Upload") == 'No'){$Upload = '下架';}

					if(chkTable('dbclass1')){
						$Class1_Name = '';
						$sql = 'Select strName from dbclass1 Where PKey= :PKey';
						$rs1 = new recordset($sql,array($rs->field("Class1_PKey")));
						if (! $rs1->eof){
							$Class1_Name = $rs1->field("strName");
						}
						$rs1->close();			
					}
                ?>
                <tr onmouseover="bgColor='<?php echo $line_color?>'" onmouseout="bgColor=''">
                  <td><input type="checkbox" name="nid[]" value="<?php echo $rs->field("PKey")?>" <?php echo $chk?> /></td>
                  <td><input class="center" name="Sort<?php echo $i?>" type="text" id="Sort<?php echo $i?>" size="4" maxlength="4" value="<?php echo $rs->field("Sort")?>" />
                    <input name="PKey<?php echo $i?>" type="hidden" id="PKey<?php echo $i?>" value="<?php echo $rs->field("PKey")?>" />
                    <input name="Sort_<?php echo $i?>" type="hidden" id="Sort_<?php echo $i?>" value="<?php echo $rs->field("Sort")?>" /></td>
				  <td><?php echo $Class1_Name?></td>
				  <td><?php echo $rs->field("strName")?></td>
				  <td>
					<label class="switch-slide">
					<input type="checkbox" id="Upload<?php echo $i?>" hidden value="Yes" <?php if($rs->field("Upload") == 'Yes'){echo 'checked';}?> onChange="chgUpload(<?php echo $i?>)">
					<label for="Upload<?php echo $i?>" class="switch-slide-label"></label>
					</label>
				  </td>
                  <td><?php echo date_en($rs->field("dtUDate"),1)?></td>
                  <td><button name="copy" type="button<?php echo $i?>" onclick="Update('add.php','<?php echo authcode($rs->field("PKey"),'ENCODE')?>')">複製</button></td>
				  <td><button name="boton" id="boton<?php echo $i?>" onclick="Update('update.php','<?php echo authcode($rs->field("PKey"),'ENCODE')?>')">編輯</button>
                  </td>
                </tr>
                <?php
                  $rs->movenext();
                  }
                  ?>
              </table>
            </div>
            <input type="hidden" name="PKey" id="PKey" />
            <input type="hidden" name="Total" id="Total" value="<?php echo $i?>" />
            <input name="manNo" type="hidden" id="manNo" value="<?php echo $manNo?>" />
            <input name="subNo" type="hidden" id="subNo" value="<?php echo $subNo?>" />
          </form>
          <div class="notes">
            <p>備註</p>
            <ul>
              <!-- <li>首頁形象最多可以上傳1-5筆資料</li>
              <li>無資料或全部下架時，前台區塊不顯示。</li> -->
              <li>網站前台顯示順序，依照「順序」由小至大排序。</li>
            </ul>
          </div>
        </main>
      </div>
    </div>
  </div>
  <?php require_once("../_in_code_bottom.php"); ?>
</body>

</html>
