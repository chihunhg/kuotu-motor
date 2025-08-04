<?php 
require_once("../_inc.php");
//參數解碼
if (is_numeric($_REQUEST["PKey"])){
	$PKey = SqlFilter($_REQUEST["PKey"],"int");
}

if (is_numeric($_REQUEST["Module_PKey"])){
	$Module_PKey = SqlFilter($_REQUEST["Module_PKey"],"int");
}
$intList = 0;	
$intDetail = 0;
//取預設值
$list = array(0);
$sql = "Select Sort from program_img Where intType = 1 and intUse = ".SqlFilter($PKey,'int')." Order By Sort ";
$rs = new recordset($sql);
while(! $rs->eof){
	$list[$rs->field("Sort")] = $rs->field("Sort");
$rs->movenext();
}
$selList = implode(',',$list);
$sql = "Select * From module_p Where PKey =".SqlFilter($Module_PKey,"int");
$rs = new recordset($sql);
if (! $rs->eof){
	$selList = $rs->field("selList");
	$selDetail = $rs->field("selDetail");
	$intList = $rs->field("intList");	
	$intDetail = $rs->field("intDetail");	
	$intLayer = $rs->field("intLayer");
	$intColum = $rs->field("intColum");
}
$i = 0;
$sql = "Select strName,Photo1,Sort from program_img Where intType = 1 and intUse = ".SqlFilter($PKey,'int')." and Sort IN(".$selList.") Order By Sort ";
$rs = new recordset($sql);
while(! $rs->eof){
	$chk = '';
	$i++;
	if($intList==$rs->field("Sort")){
		$chk = 'checked="checked"';
	}else{
		if($intList==0 && $i==1){
			$chk = 'checked="checked"';
		}
	}
?>
  <div style="width:20%;float:left; text-align:center;">
  <input name="intItem" type="radio" class="m-input" value="<?php echo $rs->field("Sort")?>"  <?php echo $chk?> />
  <?php echo $rs->field("strName")?><br /> <img src="../upload/<?php echo $rs->field("Photo1")?>" width="150" />
  </div>
<?php 
$rs->movenext();
}
?>