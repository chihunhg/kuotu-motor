<?php
require("_inc.php");
$pageName = "p4";
$subPageName = "p4_10";
$nav = $home . $icon . $p4 . $icon . $p4_5;

require("_code_public.php");
?>
<!DOCTYPE html>
<html <?php echo $lang; ?>>

<head>
    <?php require("_in_code_head.php"); ?>
    <?php require("_in_javascript.php"); ?>
</head>

<body <?php echo $bodytxt; ?> class="topPage">

    <?php require("_header.php"); ?>
    <?php require("_banner.php"); ?>

    <div class="breadCrumbs-box container">
        <ul class="breadCrumbs">
            <li class="item"><a href="./"><?php echo $home; ?></a></li>
            <li class="item "><a href="hotaipay.htm"><?php echo $p4; ?></a></li>
            <li class="item active"><a href="javascript:;"><?php echo $p4_10; ?></a></li>
        </ul>
    </div>
    <section class="wrapper">
        <div class="container">
            <div class="pay-bk">
                <div class="container"><img src="images/hotaipay/03/202301_1.jpg" alt="【HOTAI購】國都商城 可使用和泰Points折抵" width="100%"></div>
                <div class="container"><a href="https://www.hotaigo.com.tw/product?keyword=Disney" target="_blank"><img src="images/hotaipay/03/202301_2.jpg" alt="大人小孩都愛迪士尼" width="100%" border="0"></a></div>
                <div class="container"><a href="https://www.hotaigo.com.tw/product?keyword=%E9%87%8E%E6%A8%82%E6%88%B6%E5%A4%96%E7%94%A8%E5%93%81" target="_blank"><img src="images/hotaipay/03/202301_3.jpg" alt="來去野外住一晚" width="100%" border="0"></a></div>
                <div class="container"><a href="https://www.hotaigo.com.tw/product?keyword=%E5%A4%A7%E5%AE%B6%E6%BA%90" target="_blank"><img src="images/hotaipay/03/202301_4.jpg" alt="幸福家庭必備家電" width="100%" border="0"></a></div>
                <div class="container"><img src="images/hotaipay/03/202301_5.jpg" width="100%" border="0"></div>
                <!--<div class="goto-box goto-box-two3 clearfix">
                    <a href="https://ob.ctbcbank.com/card/#/apply?CrdTp&Crd=C_HOTAI&Act=L00&Fa=Y&SPC=57110&Seed=QUE4NTI5OQ%3D%3D" class="goto-btn" title="立即辦卡" target="_blank" rel="noopener noreferrer">立即辦卡<i class="bi bi-arrow-right-circle"></i></a>
                    <a href="https://www.ctbcbank.com/twrbo/zh_tw/onlinecounter_index/cc_service/cc_service_card_index/cc_service_card_status.html" class="goto-btn" title="查詢進度/補件上傳" target="_blank" rel="noopener noreferrer">查詢進度/補件上傳<i class="bi bi-arrow-right-circle"></i></a>
                    <a href="https://www.ctbcbank.com/twrbo/zh_tw/onlinecounter_index/cc_service/cc_service_register/cc_service_register_benefit.html" class="goto-btn" title="首刷禮查詢" target="_blank" rel="noopener noreferrer">首刷禮查詢<i class="bi bi-arrow-right-circle"></i></a>
                </div> -->
            </div>
            <a href="hotaipay.htm" class="back">
                返回列表<i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>
    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>