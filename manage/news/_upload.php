<?php 
require_once("../_inc.php");
//參數解碼
if (is_numeric($_REQUEST["PKey"])){
	$PKey = SqlFilter($_REQUEST["PKey"],"int");
}

$data_array['Upload'] = SqlFilter($_POST["Upload"],"tab");

$pdo = new dbPDO();
$table_name = 'news';
$pdo->update($table_name,$data_array,'PKey',SqlFilter($PKey,"int"));
$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.SqlFilter($PKey,"int");
unset($data_array);
$pdo->close();

?>