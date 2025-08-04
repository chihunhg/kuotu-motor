<?php
	require_once("_inc.php");
	$PKey = SqlFilter($_REQUEST["PKey"],"int");
	

	$strHtml = "";
	$sql = 'Select * From discount Where PKey= :PKey and Class1_PKey = :Class1_PKey and Upload = \'Yes\'';
	$rs = new recordset($sql, array($PKey, $Class1_PKey));
	if (! $rs->eof){
		$Discount_PKey_ = $rs->field("PKey");
		$strName_ = $rs->field("strName");
		$Interview_ = $rs->field("Interview");
		//$strLink = $rs1->field("strLink");
		//$Target = $rs1->field("Target");

		//列表圖
		$Photo1_ = '';
		$webp_photo1_ = '';
		$sql = 'Select * from discount_img Where Discount_PKey= :Discount_PKey and Sort = \'1\' and Photo1 <> \'\'';
		$img_Array_['Discount_PKey'] = $Discount_PKey_;
		$rs1 = new recordset($sql, $img_Array_);
		if(! $rs1->eof && is_file('../Upload/'.$rs1->field("Forder").'/'.$rs1->field("Photo1"))){
			$Photo1_ = '../Upload/'.$rs1->field("Forder").'/'.$rs1->field("Photo1");
			$ext= strtolower(substr(strrchr($Photo1_,"."),1));
			$webp_photo1_ = str_ireplace($ext, 'webp',$Photo1_);
		}
		$rs1->close();
	}
	$rs->close();


	$strHtml .='<p class="modal-body-title">'.$strName_.'</p>';
	$strHtml .='<figure>';
	$strHtml .='<picture>';
	if(is_file($webp_photo1_)){
		$strHtml .='<img src="'.$webp_photo1_.'?'.time().'" class="img-fluid transi" alt="'.$strName.'">';
	}else{
		$strHtml .='<img src="'.$Photo1_.'?'.time().'" class="img-fluid transi" alt="'.$strName.'">';
	}
	$strHtml .='</picture>';
	$strHtml .='</figure>';
	$strHtml .='<article>';
	$strHtml .='<p class="modal-body-text">'.$Interview_.'</p>';
	$strHtml .='</article>';

	echo $strHtml;
?>