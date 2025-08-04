<?php
require("_inc.php");
$pageName = "p4";
$nav = $home . $icon . $p4;

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
    <div style="background-image:url(images/banner/<?php echo $pageName; ?>.jpg);" class="inner-banner">
        <div class="inner-banner-title">
            <h1>和泰Pay專區</h1>
        </div>
    </div>

    <div class="breadCrumbs-box container">
        <ul class="breadCrumbs">
            <li class="item"><a href="./"><?php echo $home; ?></a></li>
            <li class="item active"><a href="javascript:;"><?php echo $p4; ?></a></li>
        </ul>
    </div>
    <section class="wrapper">
        <div class="container">
            <ul class="hotaipay">
                <li>
                    <a href="https://www.hotaigo.com.tw/flagshipMall?flagshipMallId=10" target="_blank" title="<?php echo $p4_10; ?>" >
                        <!-- 國都專屬優惠專區(和泰Points兌換) -->
                        <div class="hotaipay-info transi">
                            <h3><?php echo $p4_10; ?></h3>
                            <i class="bi bi-box-arrow-in-right"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="hotaipay06.htm" title="<?php echo $p4_6; ?>" >
                        <!-- 和泰會員註冊 -->
                        <div class="hotaipay-info transi">
                            <h3><?php echo $p4_6; ?></h3>
                            <i class="bi bi-box-arrow-in-right"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="hotaipay01.htm" title="<?php echo $p4_1; ?>" >
                        <!-- 首次啟用 -->
                        <div class="hotaipay-info transi">
                            <h3><?php echo $p4_1; ?></h3>
                            <i class="bi bi-box-arrow-in-right"></i>
                        </div>
                    </a>
                </li>
               
                <li>
                    <a href="hotaipay05.htm" title="<?php echo $p4_5; ?>" >
                        <!-- 申辦和泰聯名卡 -->
                        <div class="hotaipay-info transi">
                            <h3><?php echo $p4_5; ?></h3>
                            <i class="bi bi-box-arrow-in-right"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="hotaipay02.htm" title="<?php echo $p4_2; ?>" >
                        <!-- 綁定中信卡 -->
                        <div class="hotaipay-info transi">
                            <h3><?php echo $p4_2; ?></h3>
                            <i class="bi bi-box-arrow-in-right"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>