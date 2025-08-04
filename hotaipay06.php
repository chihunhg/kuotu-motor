<?php
require("_inc.php");
$pageName = "p4";
$subPageName = "p4_6";
$nav = $home . $icon . $p4 . $icon . $p4_6;

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
            <li class="item active"><a href="javascript:;"><?php echo $p4_6; ?></a></li>
        </ul>
    </div>
    <section class="wrapper">
        <div class="container">
            <div class="pay-bk">
                <div class="pay_step pay_step01">
                    <figure class="">
                        <img src="images/hotaipay/06/step-1.png" class="img-fluid">
                        <p>輸入手機號碼<br><b>(即會員帳號)</b><br>完成簡訊驗證</p>
                    </figure>
                    <figure class="">
                        <img src="images/hotaipay/06/step-2.png" class="img-fluid">
                        <p>設定密碼</p>
                    </figure>
                    <figure class="">
                        <img src="images/hotaipay/06/step-3.png" class="img-fluid">
                        <p>填寫基本資料</p>
                    </figure>
                    <figure class="">
                        <img src="images/hotaipay/06/step-done.png" class="img-fluid">
                    </figure>
                </div>
                <div class="goto-box">
                    <a href="https://www.hotaimember.com.tw/Register" class="goto-btn" title="立即註冊" target="_blank" rel="noopener noreferrer">立即註冊<i class="bi bi-arrow-right-circle"></i></a>
                </div>
            </div>
            <a href="hotaipay.htm" class="back">
                <span>返回列表<i class="fas fa-arrow-right"></i></span>
            </a>
        </div>
    </section>
    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>