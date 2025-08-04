<?php
require_once("../_inc.php");
//表單檔案驗證
$MSG = "";

if (strLen($_POST['CName']) == 0){
	$MSG .= "網站名稱(中)空白\\n";
}

if (strLen($_POST['Description']) == 0){
	$MSG .= "網站描述空白\\n";
}

$Keywords = array();
for($i=1;$i<6;$i++){
	if(strLen($_POST['Keyword'.$i]) > 0){
		array_push($Keywords,$_POST['Keyword'.$i]);
	}
}	
if(count($Keywords)==0){
	$MSG .= "網站關鍵字空白\\n";
}

if (! CheckMail($_POST['EMail']) && strlen($_POST['EMail']) > 0)
{
	$MSG .= "聯絡信箱格式錯誤\\n";
}

// 上傳檔將存入此路徑裡的 uploads 資料夾
$upload_dir = '../../Upload/';
makedirs($upload_dir);//產生上傳目錄

//檔案前置名
$ForderName = "web_";
$monthforder = date("Ym").'/';
makedirs($upload_dir.$monthforder);//產生上傳目錄
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
		// 判斷副檔名是否符合預期
		if (!in_array(strtolower($ext),$limitedext)) {
			// 不符合預期，顯示錯誤訊息。
			$MSG .="檔案 $i: ($file_name) 的檔案副檔名有誤\\n";
		}else{
			// 檢查檔案是否太大
			if ($file_size > $size_bytes){
				$MSG .="檔案 $i: ($file_name) 無法上傳，請檢查檔案是否小於 ". $size_bytes / 1024 ."KB\\n";
			}else{
				$file_name = $ForderName. strftime("%Y%m%d%H%M%S").$i.$ext;      //更改上傳的圖檔名稱.

				// 放入陣列
				$Photo[$i] = mb_convert_encoding($file_name,'utf-8','big5');//存入資料庫的檔案存取路徑
				if (move_uploaded_file($file_tmp,$upload_dir.$monthforder.$file_name)) {
					// 取得上傳圖片
					$src = getimagesize($upload_dir.$monthforder.$file_name);
					// 取得來源圖片長寬
					$PhotoW[$i] = $src[0];
					$PhotoH[$i] = $src[1];
					//產生webp圖檔
					$webp_forder = RootForder( __DIR__).'Upload/';
					covnert_webp($webp_forder.$monthforder.$file_name);
				}
			}
		}
	}
}

if ($MSG == ""){
	$sql = "Select * From webset ";
	$rs = new recordset($sql);
	if (! $rs->eof){
		$Web_PKey = $rs->field("PKey");
		$SQL_U = "update webset set ";
		$SQL_U .= " CName = '".SqlFilter($_POST['CName'],"tab")."',";
		$SQL_U .= " EName = '".SqlFilter($_POST['EName'],"tab")."',";
		$SQL_U .= " Description = '".SqlFilter($_POST['Description'],"tab")."',";
		$SQL_U .= " Keywords = '".SqlFilter(implode(',',$Keywords),"tab")."',";
		$SQL_U .= " Address = '".SqlFilter($_POST['Address'],"tab")."',";
		$SQL_U .= " strLink = '".SqlFilter($_POST['strLink'],"tab")."',";
		$SQL_U .= " Tel = '".SqlFilter($_POST['Tel'],"tab")."',";
		$SQL_U .= " Fax = '".SqlFilter($_POST['Fax'],"tab")."',";
		$SQL_U .= " EMail = '".SqlFilter($_POST['EMail'],"tab")."',";
		$SQL_U .= " Facebook = '".SqlFilter($_POST['Facebook'],"tab")."',";
		$SQL_U .= " Line = '".SqlFilter($_POST['Line'],"tab")."',";
		$SQL_U .= " IG = '".SqlFilter($_POST['IG'],"tab")."',";
		$SQL_U .= " gaCode = '".SqlFilter($_POST['gaCode'],"tab")."',";
		$SQL_U .= " dtDate = '".strftime("%Y/%m/%d %H:%M:%S")."' ";
		execute_sql($SQL_U);
		//寫入後台管理記錄
		manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);
	}
	
	//寫入圖檔
	for ($i = 1; $i <= $total_uploads; $i++) {
		if (strLen($Photo[$i]) > 10){
			$sql = "Select * from webset_img Where Sort = 3";
			$rs = new recordset($sql);
			if (!$rs->eof){
				//刪除原始圖檔
				$ext = strtolower(substr(strrchr($rs->field("Photo1"),"."),1));
				$webp_file = str_ireplace($ext,'webp',$rs->field("Photo1"));
				DelFile($upload_dir.$rs->field("Forder").'/'.$rs->field("Photo1"));
				DelFile($upload_dir.$rs->field("Forder").'/'.$webp_file);
				$img = ReSizeImg($upload_dir.$monthforder.$Photo[$i],1920,0);
				$cropW = $img[0];
				$cropH = $img[1];
				//縮圖程式open
				$imgPath = $upload_dir.$monthforder.$Photo[$i];//原始圖檔
				$savePath = $upload_dir.$monthforder.$Photo[$i];//縮圖後檔名
				$ImgResize = new ResizeImage($imgPath,$cropW,$cropH,false,$savePath);
				//縮圖程式end
				
				$SQL_U = " Update webset_img set ";
				$SQL_U .= " Web_PKey = '".SqlFilter($Web_PKey,"int")."',";
				$SQL_U .= " Sort = '3',";
				$SQL_U .= " Forder = '".SqlFilter(date("Ym"),"tab")."',";
				$SQL_U .= " Photo1 = '".SqlFilter($Photo[$i],"tab")."',"; 
				$SQL_U .= " PhotoW1 = '".SqlFilter($cropW,"int")."',";
				$SQL_U .= " PhotoH1 = '".SqlFilter($cropH,"int")."',";
				$SQL_U .= " intType = '1',";
				$SQL_U .= " dtDate = '".strftime("%Y/%m/%d %H:%M:%S")."' ";
				$SQL_U .= " Where PKey =".$rs->field("PKey");
			}else{
				$img = ReSizeImg($upload_dir.$monthforder.$Photo[$i],1920,0);
				$cropW = $img[0];
				$cropH = $img[1];
				//縮圖程式open
				$imgPath = $upload_dir.$monthforder.$Photo[$i];//原始圖檔
				$savePath = $upload_dir.$monthforder.$Photo[$i];//縮圖後檔名
				$ImgResize = new ResizeImage($imgPath,$cropW,$cropH,false,$savePath);
				//縮圖程式end
				
				$SQL_U = " Insert into webset_img set ";
				$SQL_U .= " Web_PKey = '".SqlFilter($Web_PKey,"int")."',";
				$SQL_U .= " Sort = '3',";
				$SQL_U .= " Forder = '".SqlFilter(date("Ym"),"tab")."',";
				$SQL_U .= " Photo1 = '".SqlFilter($Photo[$i],"tab")."',"; 
				$SQL_U .= " PhotoW1 = '".SqlFilter($cropW,"int")."',";
				$SQL_U .= " PhotoH1 = '".SqlFilter($cropH,"int")."',";
				$SQL_U .= " intType = '1',";
				$SQL_U .= " dtDate = '".strftime("%Y/%m/%d %H:%M:%S")."' ";	
			}
			execute_sql($SQL_U);	
			//寫入後台管理記錄
			manage_history($Module_PKey,$Module_Name,$SQL_U,$_SERVER['PHP_SELF'],$_SESSION["Login_ID"]);
		}
	}
	$show = "修改成功!";

	//組合導回參數
 	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('".$show."');";
	ECHO "location.href='webset.php';";
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