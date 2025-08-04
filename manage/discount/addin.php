<?php
require_once("../_inc.php");
require_once("../_module.php");

//參數解碼
if ($_REQUEST["PKey"] <> ""){
	$Update_PKey = authcode($_REQUEST["PKey"],'DECODE');
}
//表單檔案驗證
$MSG = "";

$strLink = $_POST['strLink'];
if (! CheckURL($strLink) && strLen($strLink) > 10){
	$strLink = "http://".$strLink;
}

//上傳檔將存入此路徑裡的 uploads 資料夾
$upload_dir = '../../Upload/';
$monthforder = date("Ym").'/';
makedirs($upload_dir.$monthforder);//產生上傳目錄

//檔案前置名
$ForderName = "discount_";
// 上傳檔總數
$total_uploads = 1;
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
	$sql = 'Select * From discount Where PKey= :PKey';
	$rs = new recordset($sql,array(SqlFilter($Update_PKey,"int")));
	if (! $rs->eof){
		$Discount_PKey = $rs->field("PKey");
		$data_array['Class1_PKey'] = SqlFilter($_POST['Class1'],"int");
		$data_array['Module_PKey'] = SqlFilter($Module_PKey,"int");
		$data_array['Sort'] = SqlFilter($_POST['Sort'],"int");
		$data_array['intLocal'] = 1;
		$data_array['strName'] = $_POST['strName'];
		$data_array['Subject'] = $_POST['Subject'];
		$data_array['Interview'] = SqlFilter($_POST['Interview'],"tab");
		$data_array['strLink'] = $_POST['strLink'];
		$data_array['Target'] = $_POST['Target'];
		$data_array['Movielink'] = $_POST['Movielink'];			
		$data_array['Upload'] = $_POST['Upload'];
		$data_array['Home'] = $_POST['Home'];
		$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
		$data_array['UserID'] = $_SESSION["Login_ID"];
		
		$pdo = new dbPDO();
		$table_name = 'discount';
		$pdo->update($table_name,$data_array,'PKey',$rs->field("PKey"));
		$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$rs->field("PKey");
		unset($data_array);
		$pdo->close();

		$show = "修改成功!";
	}
	else{
		$data_array['Class1_PKey'] = SqlFilter($_POST['Class1'],"int");
		$data_array['Module_PKey'] = SqlFilter($Module_PKey,"int");
		$data_array['Sort'] = SqlFilter($_POST['Sort'],"int");
		$data_array['intLocal'] = 1;
		$data_array['strName'] = $_POST['strName'];
		$data_array['Subject'] = $_POST['Subject'];
		$data_array['Interview'] = SqlFilter($_POST['Interview'],"tab");
		$data_array['strLink'] = $_POST['strLink'];
		$data_array['Target'] = $_POST['Target'];
		$data_array['Movielink'] = $_POST['Movielink'];
		$data_array['Upload'] = $_POST['Upload'];
		$data_array['Home'] = $_POST['Home'];
		$data_array['dtUDate'] = strftime("%Y/%m/%d %H:%M:%S");
		$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
		$data_array['UserID'] = $_SESSION["Login_ID"];
		
		$pdo = new dbPDO();
		$table_name = 'discount';
		$pdo->insert($table_name,$data_array);
		$Discount_PKey = $pdo->getLastId();
		$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$Discount_PKey;
		unset($data_array);
		$pdo->close();

		$show = "新增成功!";
	}
	
	//寫入圖檔
	for ($i = 1; $i <= $total_uploads; $i++) {
		$table_name = 'discount_img';
		if (strLen($Photo[$i]) > 10){			
			//判斷檔案類別(1.圖片;2.檔案)
			$Cond_Array['Discount_PKey'] = $Discount_PKey;
			$Cond_Array['Sort'] = $i;
			$img_ext = strtolower(substr(strrchr($Photo[$i],"."),1));

			$img = ReSizeImg($upload_dir.$monthforder.$Photo[$i],150,150);
			$cropW = $img[0];
			$cropH = $img[1];
			$name = 's_'.$Photo[$i];
			if($img_ext!=='gif'){
				//縮圖程式open
				$imgPath = $upload_dir.$monthforder.$Photo[$i];//原始圖檔
				$savePath = $upload_dir.$monthforder.$name;//縮圖後檔名
				$ImgResize = new ResizeImage($imgPath,$cropW,$cropH,false,$savePath);
				chmod($savePath, 0666);
				//縮圖程式end 			
			} 
			
			$sql = 'Select * from '.$table_name.' Where Discount_PKey= :Discount_PKey and Sort= :Sort';
			$rs = new recordset($sql,$Cond_Array);
			if (!$rs->eof){
				//刪除原始圖檔
				$ext = strtolower(substr(strrchr($rs->field("Photo".$i),"."),1));
				$webp_file = str_ireplace($ext,'webp',$rs->field("Photo".$i));
				DelFile($upload_dir.$rs->field("Forder").'/'.$rs->field("Photo".$i));
				DelFile($upload_dir.$rs->field("Forder").'/'.$webp_file);
				DelFile($upload_dir.$rs->field("Forder").'/s_'.$rs->field("Photo".$i));
				$data_array['Discount_PKey'] = SqlFilter($Discount_PKey,"int");
				$data_array['Sort'] = SqlFilter($i,"int");
				$data_array['Forder'] = date("Ym");
				$data_array['Photo1'] = $Photo[$i]; 
				$data_array['PhotoW1'] = SqlFilter($PhotoW[$i],"int"); 
				$data_array['PhotoH1'] = SqlFilter($PhotoH[$i],"int");
				$data_array['intType'] = SqlFilter($_POST["intType".$i],"int");
				$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
				$pdo = new dbPDO();				
				$pdo->update($table_name,$data_array,'PKey',$rs->field("PKey"));
				$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$rs->field("PKey");
				unset($data_array);
				$pdo->close();
			}else{
				$data_array['Discount_PKey'] = SqlFilter($Discount_PKey,"int");
				$data_array['Sort'] = SqlFilter($i,"int");
				$data_array['Forder'] = date("Ym");
				$data_array['Photo1'] = $Photo[$i]; 
				$data_array['PhotoW1'] = SqlFilter($PhotoW[$i],"int"); 
				$data_array['PhotoH1'] = SqlFilter($PhotoH[$i],"int");
				$data_array['intType'] = SqlFilter($_POST["intType".$i],"int");
				$data_array['dtDate'] = strftime("%Y/%m/%d %H:%M:%S");
				$pdo = new dbPDO();
				$pdo->insert($table_name,$data_array);
				$PKey = $pdo->getLastId();
				$SQL_U = $pdo->getLastSql()."\n".array_to_string($data_array).'PKey='.$PKey;
				unset($data_array);
				$pdo->close();	
			}	
			unset($Cond_Array);
			//寫入後台管理記錄
			manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);
		}
	}
	//寫入後台管理記錄
	manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);	
	//echo $SQL_U;
	//組合導回參數
	require_once("../_return_list.php");
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