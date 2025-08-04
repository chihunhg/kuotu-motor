<?php 
require_once("../_inc.php");
//參數解碼
if (is_numeric($_REQUEST["PKey"])){
	$PKey = SqlFilter($_REQUEST["PKey"],"int");
}

if (is_numeric($_REQUEST["Module_PKey"])){
	$Module_PKey = SqlFilter($_REQUEST["Module_PKey"],"int");
}
$List = array(0);
$sql = 'Select * From module_p Where PKey= :PKey';
$rs = new recordset($sql,array(SqlFilter($Module_PKey,"int")));
if (! $rs->eof){
	$selList = 0;
	if($rs->field("selList")!='') {
	$List = explode(',',$rs->field("selList"));
	}
	$selDetail = 0;
	if($rs->field("selDetail")!='') {
	$Detail = explode(',',$rs->field("selDetail"));
	}
	$intList = $rs->field("intList");	
	$intDetail = $rs->field("intDetail");	
	$intLayer = $rs->field("intLayer");
	$intColum = $rs->field("intColum");
}

$sql = 'Select * from program_img Where intType= :intType and intUse= :intUse Order By Sort';
$cond_array['intType'] = 1;
$cond_array['intUse'] = SqlFilter($PKey,'int');
$rs = new recordset($sql,$cond_array);
while(! $rs->eof){	
?>
  <div style="width:20%;float:left; text-align:center;">
  <input name="Item[]" type="checkbox" class="m-input" value="<?php echo $rs->field("Sort")?>" <?php if(in_array($rs->field("Sort"),$List)){echo 'checked="checked"';}?> />	
  <?php echo $rs->field("strName")?><br /> <img src="../upload/<?php echo $rs->field("Photo1")?>" width="150" />
  </div>
<?php 
$rs->movenext();
}
unset($cond_array);
$rs->close();
?>