<?php
require("_inc.php");
$pageName = "p4";
$subPageName = "p4_9";
$nav = $home . $icon . $p4 . $icon . $p4_9;

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
            <li class="item active"><a href="javascript:;"><?php echo $p4_9; ?></a></li>
        </ul>
    </div>
    <section class="wrapper">
        <div class="container">
            <div class="pay_step">
                <figure>
                    <a class="example-image-link" href="images/hotaipay/09/points_c1.jpg" data-lightbox="exp2" data-title="步驟1">
                        <img src="images/hotaipay/09/points_c1.jpg" class="img-fluid">
                    </a>
                </figure>
                <figure>
                    <a class="example-image-link" href="images/hotaipay/09/points_c2.jpg" data-lightbox="exp2" data-title="步驟2">
                        <img src="images/hotaipay/09/points_c2.jpg" class="img-fluid">
                    </a>
                </figure>
                <figure>
                    <a class="example-image-link" href="images/hotaipay/09/points_c3.jpg" data-lightbox="exp2" data-title="步驟3">
                        <img src="images/hotaipay/09/points_c3.jpg" class="img-fluid">
                    </a>
                </figure>
                <figure>
                    <a class="example-image-link" href="images/hotaipay/09/points_c4.jpg" data-lightbox="exp2" data-title="步驟4">
                        <img src="images/hotaipay/09/points_c4.jpg" class="img-fluid">
                    </a>
                </figure>
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