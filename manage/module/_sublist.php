<?php 
require_once("../_inc.php");
//參數解碼
if (is_numeric($_REQUEST["PKey"])){
	$PKey = SqlFilter($_REQUEST["PKey"],"int");
}

$intLayer = 0;
$intColum = 0;
$oldLayer = 0;
$sql = "Select * From module_p Where PKey =".SqlFilter($PKey,"int");
$rs = new recordset($sql);
if (! $rs->eof){
	if($rs->field("selList")!='') {
	$List = explode(',',$rs->field("selList"));
	};
	if($rs->field("selDetail")!='') {
	$Detail = explode(',',$rs->field("selDetail"));
	}
	$intList = $rs->field("intList");	
	$intDetail = $rs->field("intDetail");	
	$oldLayer = $rs->field("intLayer");
	$intColum = $rs->field("intColum");
}

$intLayer = SqlFilter($_REQUEST["Layer"],"int");

if (is_numeric($_REQUEST["chkUse"])){
	$intUse = SqlFilter($_REQUEST["chkUse"],"int");
}	
	
$sql = "Select * from program Where PKey=".SqlFilter($intUse,'int');
$rs1 = new recordset($sql);
if(! $rs1->eof){
	$isList = $rs1->field("isList");
	$isDetail = $rs1->field("isDetail");
	$MaxLayer = $rs1->field("MaxLayer");
}
?>
<select name="intLayer" id="intLayer" class="m-select" onchange="showLayer()">
  <option value="" >請選擇</option>
  <?php for($i=2;$i<=$MaxLayer;$i++){?>
  <option value="<?php echo $i?>" <?php if($intLayer==$i){echo 'selected="selected"';}?>><?php echo $i?></option>
  <?php }?>
</select>
<input name="oldLayer" type="hidden" id="oldLayer" value="<?php echo $oldLayer?>" />
<?php if($intLayer > 1){?>
<ul>
<?php
for ($i=1;$i<=$intLayer;$i++){
	$strName = '第'.$i.'層';
	$sql = "Select * from module_d Where Module_PKey = ".SqlFilter($PKey,'int')." and Sort =".$i;
	$rs = new recordset($sql);
	if (! $rs->eof){
		$strName = htmlspecialchars($rs->field("strName"),ENT_QUOTES, 'UTF-8');
	}	
?>
<li>子單元名稱<?php echo $i?> <span class="require_onced">*</span>
  <input type="text" name="strName<?php echo $i?>" id="strName<?php echo $i?>" class="m-input" value="<?php echo $strName ?>" style="width:20%;" />
  </li>
<?php 
}
?>
</ul>
<?php }?>