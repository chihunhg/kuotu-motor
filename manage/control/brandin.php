<?php
require_once("../_inc.php");

// 上傳檔將存入此路徑裡的 uploads 資料夾
$upload_dir = '../../Upload/';
makedirs($upload_dir);//產生上傳目錄

//檔案前置名
$ForderName = "logo_";
$monthforder = date("Ym").'/';
makedirs($upload_dir.$monthforder);//產生上傳目錄
// 上傳檔總數
$total_uploads = 2;
// 上傳檔大小限制，此處限制為300KB
$size_bytes = 1000 * 1024;
// 副檔名限制
$limitedext = array(".gif",".jpg",".jpeg",".png");

// 用迴圈讀取資料
for ($i = 1; $i <= $total_uploads; $i++) {
	$new_file = $_FILES['Photo'.$i];
	// 讀取上傳檔名
	$file_name = mb_convert_encoding($new_file['name'],'big5','utf-8');
	// 把檔名中的空格替換成 "_"
	$file_name = str_replace(' ', '_', $file_name);
	// 存入暫存區的檔名
	$file_tmp = $new_file['tmp_name'];
	// 檔案大小
	$file_size = $new_file['size'];
	// 判斷檔案是否指定$i<5…
	if (is_uploaded_file($file_tmp)) {
		// 若有上傳檔，則取出該檔案的副檔名
		$ext = strrchr($file_name,'.');
		$allowed_types = array(
            // images
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
        );

		$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
		$detected_type = finfo_file( $fileInfo, $file_tmp);
		if ( !in_array($detected_type, $allowed_types) ) {
			$MSG .="檔案 $i: ($file_name) 的檔案格式有誤\\n";
		}
		finfo_close( $fileInfo );
		
		// 檢查檔案是否太大
		if ($file_size > $size_bytes){
			$MSG .="檔案 $i: ($file_name) 無法上傳，請檢查檔案是否小於 ". $size_bytes / 1024 ."KB\\n";
		}else{
			$file_name = $ForderName. strftime("%Y%m%d%H%M%S").addzero($i).$ext;      //更改上傳的圖檔名稱.

			// 放入陣列
			$Photo[$i] = mb_convert_encoding($file_name,'utf-8','big5');//存入資料庫的檔案存取路徑
			if (move_uploaded_file($file_tmp,$upload_dir.$monthforder.$file_name)) {
				chmod($upload_dir.$monthforder.$file_name, 0666);
				if($_POST['intType'.$i]==1){
					// 取得上傳圖片
					$src = getimagesize($upload_dir.$monthforder.$file_name);
					// 取得來源圖片長寬
					$PhotoW[$i] = $src[0];
					$PhotoH[$i] = $src[1];
					//產生webp圖檔
					$webp_forder = RootForder( __DIR__).'Upload/';
					covnert_webp($webp_forder.$monthforder.$file_name);
					$ext = strtolower(substr(strrchr($file_name,"."),1));
					$webp_file = str_ireplace($ext,'webp',$file_name);
					if(is_file($upload_dir.$monthforder.$webp_file)){
						chmod($upload_dir.$monthforder.$webp_file, 0666);
					}
				}
			}
		}
	}
}

if ($MSG == ""){
	if(count($_POST['Module_1']) > 0){
		$Module_1 = implode(',',$_POST['Module_1']);
	}
	if(count($_POST['Module_2']) > 0){
		$Module_2 = implode(',',$_POST['Module_2']);
	}
	if(count($_POST['Contact']) > 0){
		$Contact = implode(',',$_POST['Contact']);
	}
	$table_name = 'webset';
	$sql = 'Select * From '.$table_name;
	$rs = new recordset($sql);
	if (! $rs->eof){
		$SQL_U = "update webset set ";
		$data_array['Module_1'] = SqlFilter($Module_1,"tab");
		$data_array['Module_2'] = SqlFilter($Module_2,"tab");
		$data_array['Contact'] = SqlFilter($Contact,"tab");
		$data_array['isShow'] = SqlFilter($_POST['isShow'],"int");
		for ($i = 1; $i <= $total_uploads; $i++) {
			if (strLen($Photo[$i]) > 10){
				//刪除原始圖檔
				$ext = strtolower(substr(strrchr($rs->field("Photo".$i),"."),1));
				$webp_file = str_ireplace($ext,'webp',$rs->field("Photo".$i));
				DelFile($upload_dir.$rs->field("Forder").'/'.$rs->field("Photo".$i));
				DelFile($upload_dir.$rs->field("Forder").'/'.$webp_file);
				$data_array['Photo'.$i] = SqlFilter($Photo[$i],"tab");
				$data_array['PhotoW'.$i] = SqlFilter($PhotoW[$i],"int");
				$data_array['PhotoH'.$i] = SqlFilter($PhotoH[$i],"int");
			}
		}
		$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
		
		$pdo = new dbPDO();
		
		$pdo->update($table_name,$data_array,'PKey',$rs->field("PKey"));
		$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$rs->field("PKey");
		unset($data_array);
		$pdo->close();
		//寫入後台管理記錄
		manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);
	}

	$show = "修改成功!";

	//組合導回參數
 	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('".$show."');";
	ECHO "location.href='brand.php';";
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
?>