<?php
require_once("../_inc.php");
$mainitem    ='home';
$subitem     = "s4";
$subname     = $m98."－".$m98.$mgw1;
$unitprocess = $m_home.$icon.$m98.$mgw1; //單元路徑列
$ModuleNo = 98;
if ($_SESSION["Login_ID"] != "Admin"){
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('無進入[".$m98."]權限!');";
	ECHO "location.href='../index.php';";
	ECHO "</script>";
}
//刪除
if($_REQUEST["Action"] == "del"){
	$cond = array();
	for($i=0;$i<count($_POST["nid"]);$i++){
		array_push($cond,' :PKey'.$_POST["nid"][$i]);
	}

	$sql = 'Select * From module_p Where PKey IN ('.implode(",",$cond).')';
	$rs = new recordset($sql,$_POST["nid"]);
	while (! $rs->eof){
		$pdo = new dbPDO();
		//execute_sql ("delete From module_d Where Module_PKey =".$rs->field("PKey")) ;
		$pdo->delete('module_d',' Module_PKey= :Module_PKey',array($rs->field("PKey")));
		
		//execute_sql ("delete From module_p Where PKey =".$rs->field("PKey")) ;
		$pdo->delete('module_p',' PKey= :PKey',array($rs->field("PKey")));
		
		//execute_sql ("delete From dbad Where intLocal =".$rs->field("PKey")) ;
		$pdo->delete('dbad',' intLocal= :intLocal',array($rs->field("PKey")));
		$pdo->close();
	$rs->movenext();
	}// while End
	unset($cond);
	
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
		$table_name = 'module_p';
		$pdo->update($table_name,$data_array,'PKey',$PKey);
		$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$PKey;
		unset($data_array);
		$pdo->close();		
	}

	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('成功更新!');" ;
	ECHO "location.href='".$_SERVER["PHP_SELF"]."';" ;
	ECHO "</script>" ;
	exit() ;
}
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
        <h1>單元設定</h1>
        <main>
          <form action="" method="post" name="form1" id="form1" onsubmit="document.form1.Page.value=1">
            <div class="m-content">
              <div class="m-search-bar">
                <?php
				//判斷選單
				switch($Layer){
					case 2:
						require_once("../_search1.php");
						break;
					case 3:
						require_once("../_search2.php");
						break;
					case 4:
						require_once("../_search3.php");
						break;
					case 5:
						require_once("../_search4.php");
						break;
				}
				?>
                <span class="span-group"> 關鍵字：
                  <input name="Keywords" type="text" value="<?php echo $Keywords?>" size="40" id="Keywords" onkeydown="if(event.keyCode==13){this.form.submit();}" onfocus="if (this.value == '<?php echo $Keywords?>') {this.value='';}" />
                  <input name="Submit" type="submit" value="搜尋" class="btn btn-outline-secondary" id="Submit"/>
                </span>
              </div>
              <!--search-bar-->
              <div class="m-btn-group">
                <div class="item">
                  <?php include("../_select.php")?>
                  <input type="submit" name="SortUpdate" id="SortUpdate" class="btn btn-secondary" value="更新順序" /></div>
                <div class="item">
                  <input type="button" name="button" id="button" class="btn btn-warning" value="新增資料" onclick="Update('add.php','')" /></div>
              </div>
              <!--btn-group-->
            <table width="100%" cellspacing="0" cellpadding="0" class="list">
              <thead>
                <tr>
                    <td width="5%">&nbsp;</td>
                    <td>單元順序</td>
                    <td>標題</td>
                    <td>單元型態</td>
                    <td>功能模組</td>
                    <td>列表版面</td>
                    <td>內頁版面</td>
                    <td>單元階層</td>
                    <td>上下架</td>
                    <td width="8%">編輯</td>
                </tr>
              </thead>
              <?php
				$i=0;
				$sql = 'Select * From module_p Where intLang = :intLang Order By Home desc, Sort, PKey';
				$rs = new recordset($sql,array(SqlFilter($intLang,'int')));
				if ($rs->field("PKey") == ""){ echo "<tr bgcolor=\"#FFFFFF\"><td colspan=\"10\" align=\"center\" height=\"100\"><font color=\"red\">暫無資料</font></td></tr>";}
				while (! $rs->eof){
					$i++;
					$Type = '功能頁面';
					if ($rs->field("intType")==2){
						$Type = '美工頁面';
						$Module_Name = '';
					}
					$isList = 0;
					$isDetail = 0;
					$sql = 'Select * from program  Where PKey = :PKey';
					$rs1 = new recordset($sql,array($rs->field("intUse")));
					if(! $rs1->eof){
						$isList = $rs1->field("isList");
						$isDetail = $rs1->field("isDetail");
						$Module_Name = $rs1->field("strName");
					}
					$List = '';
					$Detail = '';

					$cond_array['intType'] = 1;	
					$cond_array['Sort'] = $rs->field("intList");	
					$cond_array['intUse'] = $rs->field("intUse");	
					$sql = 'Select strName from program_img Where intType = :intType and Sort= :Sort and intUse= :intUse';
					$rs1 = new recordset($sql,$cond_array);
					if(! $rs1->eof){
						$List = $rs1->field("strName");
					}
					unset($cond_array);

					$cond_array['intType'] = 2;	
					$cond_array['Sort'] = $rs->field("intList");	
					$cond_array['intUse'] = $rs->field("intUse");	
					$sql = 'Select strName from program_img Where intType = :intType and Sort= :Sort and intUse= :intUse';
					$rs1 = new recordset($sql,$cond_array);
					if(! $rs1->eof){
						$Detail = $rs1->field("strName");
					}
					$rs1->close();
					unset($cond_array);
					
					//取下架日期
					$Upload = "上架";
					if($rs->field("Upload") == 'No'){$Upload = '下架';}
				?>				
                <tr>
                  <td><input type="checkbox" name="nid[]" value="<?php echo $rs->field("PKey")?>" <?php echo $chk?>  /></td>
                  <td align="center"><?php if($rs->field("Home")=='Yes'){?>
                    <input class="center" name="Sort<?php echo $i?>" type="hidden" id="Sort<?php echo $i?>" value="<?php echo AddZero($rs->field("Sort"))?>" />
                    <?php
						echo AddZero($rs->field("Sort"));
					  }else{
					 ?>
                    <input class="center" name="Sort<?php echo $i?>" type="text" id="Sort<?php echo $i?>" size="4" maxlength="4" value="<?php echo AddZero($rs->field("Sort"))?>" />
                    <?php }?>
                    <input name="PKey<?php echo $i?>" type="hidden" id="PKey<?php echo $i?>" value="<?php echo $rs->field("PKey")?>" /></td>
                  <td><?php echo $rs->field("strName")?>&nbsp;</td>
                  <td><?php echo $Type?>&nbsp;</td>
                  <td><?php echo $Module_Name?>&nbsp;</td>
                  <td><?php echo $List?>&nbsp;</td>
                  <td><?php echo $Detail?>&nbsp;</td>
                  <td><?php if ($rs->field("intLayer") > 1 ){echo $rs->field("intLayer").'層';}?>
                    &nbsp;</td>
                  <td nowrap="nowrap"><label class="switch-slide">
                    <input type="checkbox" id="Upload<?php echo $i?>" hidden value="Yes" <?php if($rs->field("Upload") == 'Yes'){echo 'checked';}?> onChange="chgUpload(<?php echo $i?>)">
                    <label for="Upload<?php echo $i?>" class="switch-slide-label"></label>
                    </label></td>
                  <td><button name="boton" type="button" onclick="Update('update.php','<?php echo authcode($rs->field("PKey"),'ENCODE')?>')">編輯</button></td>
                </tr>
                <?php
				$rs->movenext();
				}
				?>
            </table>
            <input name="PKey" type="hidden" id="PKey" />
            <input type="hidden" name="Total" id="Total" value="<?php echo $i?>" />
            <div class="notes">
              <p>備註</p>
              <ul>
                <li>單元下架，網站前台不顯示。</li>
                <li>網站前台顯示順序，依照「單元順序」由小至大排序；順序相同，依照修改日期由新至舊排序。</li>
              </ul>
            </div>
            </div>
          </form>
        </main>
      </div>
    </div>
  </div>
  <?php require_once("../_in_code_bottom.php"); ?>
</body>
</html>
