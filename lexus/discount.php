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

    <section class="wrapper index-buy-sale">
        <div class="container">
            <div class="mj-title">
                <span class="en">Rebates</span>
                <p>零利率專案</p>
            </div>
            <?php require("_lexus_sale.php"); ?>
        </div>
    </section>


    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>