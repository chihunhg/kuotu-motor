<?php
require("_inc.php");
$pageName = "p1";
$subPageName = "p1_1";
$nav = $home . $icon . $p1 . $icon . $p1_1;
$Module_PKey = "1";
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
    'item' => $web_url.'news.htm',
    'name' => $p1
];

$Element3 = [
    '@type'=> 'ListItem',
    'position'=> '3',
    'item' => $web_url.$page_link,
    'name' => $p1_1
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
            <li class="item active"><a href="javascript:;"><?php echo $p1_1; ?></a></li>
        </ul>
    </div>

    <section class="wrapper">
        <div class="container">
            <ul class="news d-flex flex-wrap">
                <?php
                $sql = 'Select * From news '.$PDO_Cond.' Order By Sort';
                //$sql .= ' limit ' .($tPage - 1)*$tPageSize.','.$tPageSize;//每頁顯示資料的 sql 語法,僅取出所需的資料筆數.
                $rs1 = new recordset($sql, $Cond_Array);
                if($rs1->eof){//Under Construction
                    //echo '<p class="nodata">資料建置中</p>';
                }
                while(! $rs1->eof){
                    $file_a = '';
                    $News_PKey = $rs1->field("PKey");
                    $strName = $rs1->field("strName");
                    $Interview = $rs1->field("Interview");
                    $strLink = $rs1->field("strLink");
                    $Target = $rs1->field("Target");

                   //列表圖
                   $Photo1 = './images/default/default.jpg';
                   $webp_photo1 = '';
                   $sql = 'Select * from news_img Where News_PKey= :News_PKey and Sort = \'1\' and Photo1 <> \'\'';
                   $img_Array['News_PKey'] = $News_PKey;
                   $rs2 = new recordset($sql, $img_Array);
                   if(! $rs2->eof && is_file('../Upload/'.$rs2->field("Forder").'/'.$rs2->field("Photo1"))){
                       $Photo1 = '../Upload/'.$rs2->field("Forder").'/'.$rs2->field("Photo1");
                       $ext = strtolower(substr(strrchr($Photo1,"."),1));
                       if($ext!="gif"){
                        $webp_photo1 = str_ireplace($ext, 'webp',$Photo1);
                       }
                   }
                ?>
                    <li>
                        <a href="<?php echo $strLink;?>" title="<?php echo $strName;?>" target="<?php echo $Target;?>" rel="noopener noreferrer">
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
                            </figure>
                            <div class="news-info transi">
                                <div class="title">
                                    <h3><?php echo $strName;?></h3>
                                </div>
                                <div class="textBox">
                                    <p><?php echo $Interview;?></p>
                                    <span></span>
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php
                        $rs1->movenext();
                    }
                ?>

                <!-- <li>
                    <a href="https://www.facebook.com/123546031550932/photos/a.128171407755061/938330760072451/" title="NX 精悍敏捷 穿梭自如" target="_blank">
                        <figure><img src="../images/news/toyota/2021-07-15-4.gif" alt="NX 精悍敏捷 穿梭自如" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>NX 精悍敏捷 穿梭自如</h3>
                            </div>
                            <div class="textBox">
                                <p>#120萬70期尊享專案<br>
                                    #國都Lexus限定優惠至8月底
                                </p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.lexus.com.tw/news_detail.aspx?nw=414&fn=1" title="Lexus摯友尊享好禮" target="_blank">
                        <figure><img src="../images/news/toyota/2021-07-15-5.gif" alt="Lexus摯友尊享好禮" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>Lexus摯友尊享好禮</h3>
                            </div>
                            <div class="textBox">
                                <p>自2021年7月起，針對車齡滿5年(含)以上之車主，推出專屬的「摯友尊享好禮」方案。</p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.toyota.com.tw/owner_news_detail.aspx?id=274" title="珍惜水資源" target="_blank">
                        <figure><img src="../images/news/toyota/2021-07-15-7.gif" alt="珍惜水資源" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>珍惜水資源</h3>
                            </div>
                            <div class="textBox">
                                <p>即日起選擇不洗車之TOYOTA車主，享有「高效防護口罩一盒(10片)」</p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.toyota.com.tw/event/202104_toyota_toyotatire_v1/" title="YOKOHAMA" target="_blank">
                        <figure><img src="../images/news/toyota/2021-07-15-8.gif" alt="YOKOHAMA" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>YOKOHAMA</h3>
                            </div>
                            <div class="textBox">
                                <p>濕地穩抓全域制霸</p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/Toyotalove.earth99/videos/830471711225589" title="Toyota Eco 特攻隊" target="_blank">
                        <figure><img src="../images/news/toyota/2021-07-15-10.gif" alt="Toyota Eco 特攻隊" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>Toyota Eco 特攻隊</h3>
                            </div>
                            <div class="textBox">
                                <p>2050豐田碳中和 為珍愛台灣發聲</p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.lexus.com.tw/testdrive.aspx" title="Lexus線上預約試乘/購車諮詢" target="_blank">
                        <figure><img src="../images/news/toyota/2021-06-11-6.gif" alt="Lexus線上預約試乘/購車諮詢" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>Lexus線上預約試乘/購車諮詢</h3>
                            </div>
                            <div class="textBox">
                                <p>提供您尊榮零接觸服務！</p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/123546031550932/photos/a.128171407755061/920715998500594/" title="Lexus｜精心守護 讓您回廠最安心" target="_blank">
                        <figure><img src="../images/news/toyota/2021-06-11-1.gif" alt="Lexus｜精心守護 讓您回廠最安心" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>Lexus｜精心守護 讓您回廠最安心</h3>
                            </div>
                            <div class="textBox">
                            <p>服務廠擴大預約取送車服務<br>
                                車輛保養完修後全面消毒<br>
                                預約到府取送車敬請電洽國都LEXUS服務廠：<br>
                                濱江廠(02-25081288)<br>
                                士林廠(02-28312289)<br>
                                新莊廠(02-29983990)<br>
                                中和廠(02-82218618)
                            </p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/Kuotutoyota/photos/a.254034501810220/903594326854231/" title="車主最可靠的防疫夥伴" target="_blank">
                        <figure><img src="../images/news/toyota/2021-06-11-2.gif" alt="車主最可靠的防疫夥伴" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>車主最可靠的防疫夥伴</h3>
                            </div>
                            <div class="textBox">
                                <p>即日起推出 取送服務  若有取送車需求可以來電預約 我們盡速幫您安排人員到府取車</p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/123546031550932/photos/a.128171407755061/938330760072451/" title="NX 精悍敏捷 穿梭自如" target="_blank">
                        <figure><img src="../images/news/toyota/2021-07-15-4.gif" alt="NX 精悍敏捷 穿梭自如" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>NX 精悍敏捷 穿梭自如</h3>
                            </div>
                            <div class="textBox">
                                <p>#120萬70期尊享專案<br>
                                    #國都Lexus限定優惠至8月底
                                </p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.lexus.com.tw/news_detail.aspx?nw=414&fn=1" title="Lexus摯友尊享好禮" target="_blank">
                        <figure><img src="../images/news/toyota/2021-07-15-5.gif" alt="Lexus摯友尊享好禮" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>Lexus摯友尊享好禮</h3>
                            </div>
                            <div class="textBox">
                                <p>自2021年7月起，針對車齡滿5年(含)以上之車主，推出專屬的「摯友尊享好禮」方案。</p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.toyota.com.tw/owner_news_detail.aspx?id=274" title="珍惜水資源" target="_blank">
                        <figure><img src="../images/news/toyota/2021-07-15-7.gif" alt="珍惜水資源" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>珍惜水資源</h3>
                            </div>
                            <div class="textBox">
                                <p>即日起選擇不洗車之TOYOTA車主，享有「高效防護口罩一盒(10片)」</p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="https://www.toyota.com.tw/event/202104_toyota_toyotatire_v1/" title="YOKOHAMA" target="_blank">
                        <figure><img src="../images/news/toyota/2021-07-15-8.gif" alt="YOKOHAMA" class="img-fluid transi"></figure>
                        <div class="news-info transi">
                            <div class="title">
                                <h3>YOKOHAMA</h3>
                            </div>
                            <div class="textBox">
                                <p>濕地穩抓全域制霸</p>
                                <span></span>
                                <i class="bi bi-box-arrow-up-right"></i>
                            </div>
                        </div>
                    </a>
                </li> -->
            </ul>
        </div>
    </section>


    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>