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
$sql = 'Select Sort from program_img Where intType = :intType and intUse = :intUse Order By Sort';
$cond_array['intType'] = 2;
$cond_array['intUse'] = SqlFilter($PKey,'int');
$rs = new recordset($sql,$cond_array);
while(! $rs->eof){
	$list[$rs->field("Sort")] = $rs->field("Sort");
$rs->movenext();
}
unset($cond_array);
$rs->close();
$selDetail = $list;

$sql = "Select * From module_p Where PKey =".SqlFilter($Module_PKey,"int");
$sql = 'Select * From module_p Where PKey= :PKey';
$cond_array['PKey'] = SqlFilter($Module_PKey,'int');
$rs = new recordset($sql,$cond_array);
if (! $rs->eof){
	$selList = $rs->field("selList");
	$selDetail = explode(',',$rs->field("selDetail"));
	$intList = $rs->field("intList");	
	$intDetail = $rs->field("intDetail");	
	$intLayer = $rs->field("intLayer");
	$intColum = $rs->field("intColum");
}
unset($cond_array);
$rs->close();


$cond = array();
for($i=0;$i<count($selDetail);$i++){
	array_push($cond,' :Sort'.$selDetail[$i]);
	$cond_array['Sort'.$selDetail[$i]] = $selDetail[$i];
}
$i = 0;
$sql = 'Select * from program_img Where intType= :intType and intUse= :intUse  and Sort IN('.implode(",",$cond).') Order By Sort';
$cond_array['intType'] = 2;
$cond_array['intUse'] = SqlFilter($PKey,'int');
$rs = new recordset($sql,$cond_array);
while(! $rs->eof){	
	$i++;
	$chk = '';
	if($intDetail==$rs->field("Sort")){
		$chk = 'checked="checked"';
	}else{
		if($intDetail==0 && $i==1){
			$chk = 'checked="checked"';
		}
	}	
?>
  <div style="width:20%;float:left; text-align:center;">
  <input name="intDetail" type="radio" class="m-input" value="<?php echo $rs->field("Sort")?>" <?php echo $chk;?> />
  <?php echo $rs->field("strName")?><br /> <img src="../upload/<?php echo $rs->field("Photo1")?>" width="150" />
  </div>
<?php 
$rs->movenext();
}
unset($cond);
unset($cond_array);
$rs->close();
?>