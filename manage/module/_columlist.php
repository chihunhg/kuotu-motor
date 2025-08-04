<?php 
require_once("../_inc.php");
//參數解碼
if (is_numeric($_REQUEST["PKey"])){
	$PKey = SqlFilter($_REQUEST["PKey"],"int");
}

$pdo_cond = 'Where PKey = :PKey';
$cond_array['PKey'] = SqlFilter($PKey,"int");
$sql = 'Select * From module_p '.$pdo_cond;
$rs = new recordset($sql,$cond_array);
if (! $rs->eof){
	if($rs->field("selList")!='') {
	$List = explode(',',$rs->field("selList"));
	};
	if($rs->field("selDetail")!='') {
	$Detail = explode(',',$rs->field("selDetail"));
	}
	$intList = $rs->field("intList");	
	$intDetail = $rs->field("intDetail");	
	$intLayer = $rs->field("intLayer");
	$intColum = $rs->field("intColum");
}
unset($cond_array);
$rs->close();

if (is_numeric($_REQUEST["intColum"])){
	$intColum = SqlFilter($_REQUEST["intColum"],"int");
}

if (is_numeric($_REQUEST["chkUse"])){
	$intUse = SqlFilter($_REQUEST["chkUse"],"int");
}	

$pdo_cond = 'Where PKey = :PKey';
$cond_array['PKey'] = SqlFilter($intUse,"int");
$sql = 'Select * From program '.$pdo_cond;
$rs1 = new recordset($sql,$cond_array);
if(! $rs1->eof){
	$isList = $rs1->field("isList");
	$isDetail = $rs1->field("isDetail");
	$MaxLayer = $rs1->field("MaxLayer");
}
unset($cond_array);
$rs1->close();
?>
<select name="intColum" id="intColum" class="m-select" onchange="showColum()">
  <option value="" >請選擇</option>
  <?php for($i=1;$i<7;$i++){?>
  <option value="<?php echo $i?>" <?php if($intColum==$i){echo 'selected="selected"';}?>><?php echo $i?></option>
  <?php }?>
</select>
<ul>
<?php
for ($i=1;$i<=$intColum;$i++){
	$strName = '內容'.$i;
	$sql = "Select * from module_c Where Module_PKey = ".SqlFilter($PKey,'int')." and Sort =".$i;
	$pdo_cond = 'Where PKey = :PKey and Sort = :Sort';
	$cond_array['PKey'] = SqlFilter($intUse,"int");
	$cond_array['Sort'] = $i;
	$sql = 'Select * from module_c '.$pdo_cond;
	$rs = new recordset($sql,$cond_array);
	if (! $rs->eof){
		$strName = htmlspecialchars($rs->field("strName"),ENT_QUOTES, 'UTF-8');
	}
	unset($cond_array);
	$rs->close();	
?>
<li>欄位標題<?php echo $i?> <span class="require_onced">*</span>
  <input type="text" name="Colum<?php echo $i?>" id="Colum<?php echo $i?>" class="m-input" value="<?php echo $strName ?>" style="width:20%;" />
  </li>
<?php 
}
?>
</ul>