<?php
require("_inc.php");
$pageName = "p1";
$subPageName = "p1_2";
$nav = $home . $icon . $p1 . $icon . $p1_2;
$Module_PKey = "2";
require("_code_public.php");

$PDO_Cond .= ' Where Module_PKey = :Module_PKey and Class1_PKey = :Class1_PKey and Upload = \'Yes\'';
$Cond_Array['Module_PKey'] = $Module_PKey;
$Cond_Array['Class1_PKey'] = $Class1_PKey;
// $sql = 'Select count(PKey)as Total From filedown '.$PDO_Cond;
// $rs = new recordset($sql, $Cond_Array);
// $Total = $rs->field("Total");

// //頁數
// $tSum=1;
// $tPageTotal=1;
// $tPage = 1;
// //每頁幾筆-----
// $tPageSize=6;
// //總頁數-----
// $tPageTotal = ceil(($Total/$tPageSize));

// //當前頁數
// if (SqlFilter($_REQUEST["Page"],"int") > 0)
// $tPage = $_REQUEST["Page"];

//SEO面包屑-JSON-LD
$page_link = explode('/',$_SERVER['REQUEST_URI']);
$page_link = end($page_link);

$Element1 = [
    '@type'=> 'ListItem',
    'position'=> '1',
    'item' => $web_url,
    'name' => $home
];	

$Element2 = [
    '@type'=> 'ListItem',
    'position'=> '2',
    'item' => $web_url.'discount.htm',
    'name' => $p1
];

$Element3 = [
    '@type'=> 'ListItem',
    'position'=> '3',
    'item' => $web_url.$page_link,
    'name' => $p1_2
];

$ldjson = [
    "@context"=> "http://schema.org",
    "@type"=> "BreadcrumbList",
    "itemListElement"=> array($Element1,$Element2,$Element3)
];
//SEO面包屑-END
?>
<!DOCTYPE html>
<html <?php echo $lang; ?>>

<head>
    <?php require("_in_code_head.php"); ?>
    <?php require("_in_javascript.php"); ?>
</head>

<body <?php echo $bodytxt; ?>>

    <?php require("_header.php"); ?>
    <?php require("_banner.php"); ?>
    <?php require("_sidebar.php"); 
    ?>
    <div class="breadCrumbs-box container">
        <ul class="breadCrumbs">
            <li class="item"><a href="./"><?php echo $home; ?></a></li>
            <li class="item"><a href="javascript:;"><?php echo $p1; ?></a></li>
            <li class="item active"><a href="javascript:;"><?php echo $p1_2; ?></a></li>
        </ul>
    </div>

    <section class="wrapper">
        <div class="container">
            <ul class="discount d-flex flex-wrap">
                <?php
                $sql = 'Select * From discount '.$PDO_Cond.'  Order By Sort';
                //$sql .= ' limit ' .($tPage - 1)*$tPageSize.','.$tPageSize;//每頁顯示資料的 sql 語法,僅取出所需的資料筆數.
                $rs1 = new recordset($sql, $Cond_Array);
                if($rs1->eof){//Under Construction
                    //echo '<p class="nodata">資料建置中</p>';
                }
                while(! $rs1->eof){
                    $Discount_PKey = $rs1->field("PKey");
                    $strName = $rs1->field("strName");
                    $Interview = $rs1->field("Interview");
                    //$strLink = $rs1->field("strLink");
                    //$Target = $rs1->field("Target");

                   //列表圖
                   $Photo1 = './images/default/default.jpg';
                   $webp_photo1 = '';
                   $sql = 'Select * from discount_img Where Discount_PKey= :Discount_PKey and Sort = \'1\' and Photo1 <> \'\'';
                   $img_Array['Discount_PKey'] = $Discount_PKey;
                   $rs2 = new recordset($sql, $img_Array);
                   if(! $rs1->eof && is_file('../Upload/'.$rs2->field("Forder").'/'.$rs2->field("Photo1"))){
                       $Photo1 = '../Upload/'.$rs2->field("Forder").'/'.$rs2->field("Photo1");
                       $ext = strtolower(substr(strrchr($Photo1,"."),1));
                       $webp_photo1 = str_ireplace($ext, 'webp',$Photo1);
                   }
                ?>
                    <li>
                        <a href="#" onclick="paperBtn('<?php echo $Discount_PKey;?>')" data-toggle="modal" data-target="#buy_10">
                            <figure>
                                <picture>
                                    <?php 
                                    if(is_file($webp_photo1)){
                                    ?>
                                        <!-- <source srcset="<?php echo $webp_photo1.'?'.time();?>" type=""> -->
                                        <img src="<?php echo $webp_photo1.'?'.time();?>" class="img-fluid transi" alt="<?php echo $strName;?>">
                                    <?php
                                    }else{
                                    ?>
                                        <img src="<?php echo $Photo1.'?'.time();?>" class="img-fluid transi" alt="<?php echo $strName;?>">
                                    <?php
                                    }
                                    ?>
                                </picture>
                                <span class="more">了解更多</span>
                            </figure>
                            <div class="txt">
                                <p><?php echo $strName;?></p>
                            </div>
                        </a>
                    </li>
                <?php
                    $rs1->movenext();
                }
                ?>
                <!-- <li>
                    <a href="#" data-toggle="modal" data-target="#buy_10">
                        <figure>
                            <img class="img-fluid" src="../images/index/toyota/REBATES/COROLLASPORT.jpg" alt="COROLLA SPORT 60萬30期0利率即日起至7月31日止">
                            <span class="more">了解更多</span>
                        </figure>
                        <div class="txt">
                            <p>COROLLA SPORT 60萬30期0利率即日起至7月31日止</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#buy_11">
                        <figure>
                            <img class="img-fluid" src="../images/index/toyota/REBATES/C-HR.jpg" alt="C-HR 60萬30期0利率即日起至7月31日止">
                            <span class="more">了解更多</span>
                        </figure>
                        <div class="txt">
                            <p>C-HR 60萬30期0利率即日起至7月31日止</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#buy_12">
                        <figure>
                            <img class="img-fluid" src="../images/index/toyota/REBATES/CAMRY.jpg" alt="CAMRY 40萬30期0利率即日起至7月31日止">
                            <span class="more">了解更多</span>
                        </figure>
                        <div class="txt">
                            <p>CAMRY 40萬30期0利率即日起至7月31日止</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#buy_10">
                        <figure>
                            <img class="img-fluid" src="../images/index/toyota/REBATES/COROLLASPORT.jpg" alt="COROLLA SPORT 60萬30期0利率即日起至7月31日止">
                            <span class="more">了解更多</span>
                        </figure>
                        <div class="txt">
                            <p>COROLLA SPORT 60萬30期0利率即日起至7月31日止</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#buy_11">
                        <figure>
                            <img class="img-fluid" src="../images/index/toyota/REBATES/C-HR.jpg" alt="C-HR 60萬30期0利率即日起至7月31日止">
                            <span class="more">了解更多</span>
                        </figure>
                        <div class="txt">
                            <p>C-HR 60萬30期0利率即日起至7月31日止</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#buy_12">
                        <figure>
                            <img class="img-fluid" src="../images/index/toyota/REBATES/CAMRY.jpg" alt="CAMRY 40萬30期0利率即日起至7月31日止">
                            <span class="more">了解更多</span>
                        </figure>
                        <div class="txt">
                            <p>CAMRY 40萬30期0利率即日起至7月31日止</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#buy_10">
                        <figure>
                            <img class="img-fluid" src="../images/index/toyota/REBATES/COROLLASPORT.jpg" alt="COROLLA SPORT 60萬30期0利率即日起至7月31日止">
                            <span class="more">了解更多</span>
                        </figure>
                        <div class="txt">
                            <p>COROLLA SPORT 60萬30期0利率即日起至7月31日止</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#buy_11">
                        <figure>
                            <img class="img-fluid" src="../images/index/toyota/REBATES/C-HR.jpg" alt="C-HR 60萬30期0利率即日起至7月31日止">
                            <span class="more">了解更多</span>
                        </figure>
                        <div class="txt">
                            <p>C-HR 60萬30期0利率即日起至7月31日止</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#buy_12">
                        <figure>
                            <img class="img-fluid" src="../images/index/toyota/REBATES/CAMRY.jpg" alt="CAMRY 40萬30期0利率即日起至7月31日止">
                            <span class="more">了解更多</span>
                        </figure>
                        <div class="txt">
                            <p>CAMRY 40萬30期0利率即日起至7月31日止</p>
                        </div>
                    </a>
                </li> -->
            </ul>
            <?php require("_REBATES.php"); ?>
        </div>
    </section>


    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>