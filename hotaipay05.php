<?php
require("_inc.php");
$pageName = "p4";
$subPageName = "p4_5";
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
            <li class="item active"><a href="javascript:;"><?php echo $p4_5; ?></a></li>
        </ul>
    </div>
    <section class="wrapper">
        <div class="container">
            <div class="pay-bk">
                <div class="container"><img src="images/hotaipay/05/invitation_card6.jpg?20240110" width="100%"></div>
                <div class="goto-box goto-box-two3 clearfix">
                    <a href="https://ob.ctbcbank.com/card/#/apply?CrdTp&Crd=C_HOTAI&Act=L00&Fa=Y&SPC=57110&Seed=QUE4NTI5OQ%3D%3D" class="goto-btn" title="立即辦卡" target="_blank" rel="noopener noreferrer">立即辦卡<i class="bi bi-arrow-right-circle"></i></a>
                    <a href="https://www.ctbcbank.com/twrbo/zh_tw/onlinecounter_index/cc_service/cc_service_card_index/cc_service_card_status.html" class="goto-btn" title="查詢進度/補件上傳" target="_blank" rel="noopener noreferrer">查詢進度/補件上傳<i class="bi bi-arrow-right-circle"></i></a>
                    <a href="https://www.ctbcbank.com/twrbo/zh_tw/onlinecounter_index/cc_service/cc_service_register/cc_service_register_benefit.html" class="goto-btn" title="首刷禮查詢" target="_blank" rel="noopener noreferrer">首刷禮查詢<i class="bi bi-arrow-right-circle"></i></a>
                </div>
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