<?php
   //隨機生成一個 $num_max 位數的數字驗證碼
    $autonum="";
	$num_max = 6;
	$img_height = 30;
	$img_height2 = 0;//計算「兩條虛線」使用
	$img_width = 100;
	$mass = 0;//生成「大量黑點」使用
	$randnum = 0;
	
	//$str = "abcdefghijklmnopqrstuvwxyz";
	//$str = strtoupper($str)."0123456789";
	$str = '0123456789'; 
	$l = strlen($str); //取得字串長度 
    for($i=0;$i<$num_max;$i++){
		$num=rand(0,$l-1);  
   		$autonum.= $str[$num];      	
		//$autonum .= $rands;
    }
   //$num_max  位驗證碼也可以用rand(1000,9999)直接生成
   //將生成的驗證碼寫入session，備驗證頁面使用
    Session_start();
    $_SESSION["code_check"] =$autonum;
   //創建圖片，定義顏色
    Header("Content-type: image/PNG");
    srand((double)microtime()*1000000);
    $im = imagecreate($img_width,$img_height);
    $black = ImageColorAllocate($im, 95,95,95);
    $gray = ImageColorAllocate($im, 224,234,237);//底色
    imagefill($im,0,0,$gray);

    //隨機繪製兩條虛線，起干擾作用
    //$style = array($black, $black, $black, $black, $black, $gray, $gray, $gray, $gray, $gray);
	$style = array($gray, $gray, $gray, $gray, $gray, $gray, $gray, $gray, $gray, $gray);
    imagesetstyle($im, $style);
    $y1=rand(0,$img_height2);
    $y2=rand(0,$img_height2);
    $y3=rand(0,$img_height2);
    $y4=rand(0,$img_height2);
    imageline($im, 0, $y1, $img_width, $y3, IMG_COLOR_STYLED);
    imageline($im, 0, $y2, $img_width, $y4, IMG_COLOR_STYLED);

    //在畫布上隨機生成大量黑點，起干擾作用;
    for($i=0;$i<$mass;$i++)
    {
   		imagesetpixel($im, rand(0,$img_width), rand(0,$img_height), $black);
    }
    //將六個數字隨機顯示在畫布上,字符的水平間距和位置都按一定波動範圍隨機生成
    $strx=rand(1,10);
    for($i=0;$i<$num_max;$i++){
 	   $strpos=rand(1,10);	   
	   //imagettftext($im, 28 , 120, $strx , $strpos+0, $black,"ELEPHNT.ttf", substr($autonum,$i,1));  
	    imagestring($im,11,$strx,$strpos, substr($autonum,$i,1), $black);
	    $strx+=rand(8,14);
				//ariblk.ttf//ELEPHNT.ttf
		$strx = $strx + 0;
    }
    ImagePNG($im);
    ImageDestroy($im);
?>
