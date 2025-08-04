<?php
require("_inc.php");
$pageName = "p4";
$subPageName = "p4_2";
$nav = $home . $icon . $p4 . $icon . $p4_2;

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
            <li class="item active"><a href="javascript:;"><?php echo $p4_2; ?></a></li>
        </ul>
    </div>
    <section class="wrapper">
        <div class="container">
            <div class="pay_two_way">
                <div class="usw-way">
                    <a href="#use02_1">TOYOTA</a>
                    <a href="#use02_2">LEXUS</a>
                </div>
                <div class="pay_two_way_box">
                    <div class="area_point">
                        <a id="use01_1" class="po_point"></a>
                    </div>
                    <p class="pay_two_way_name">TOYOTA</p>
                    <div class="pay_way_app">
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/04/0-1-1-1.jpg" data-lightbox="exp2" data-title="步驟0">
                                <img src="images/hotaipay/04/0-1-1-1.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/04/0-1-1-2.jpg" data-lightbox="exp2" data-title="步驟1">
                                <img src="images/hotaipay/04/0-1-1-2.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/04/0-1-1-3.jpg" data-lightbox="exp2" data-title="步驟2">
                                <img src="images/hotaipay/04/0-1-1-3.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/04/0-1-1-4.jpg" data-lightbox="exp2" data-title="步驟3">
                                <img src="images/hotaipay/04/0-1-1-4.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/04/0-1-1-5.jpg" data-lightbox="exp2" data-title="步驟4">
                                <img src="images/hotaipay/04/0-1-1-5.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/04/0-1-1-6.jpg" data-lightbox="exp2" data-title="步驟5">
                                <img src="images/hotaipay/04/0-1-1-6.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/04/0-1-1-7.jpg" data-lightbox="exp2" data-title="步驟6">
                                <img src="images/hotaipay/04/0-1-1-7.jpg" class="img-fluid">
                            </a>
                        </figure>
                </div>
                <div class="pay_two_way_box">
                    <div class="area_point">
                        <a id="use02_2" class="po_point"></a>
                    </div>
                    <p class="pay_two_way_name">LEXUS</p>
                    <div class="pay_way_app">
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/02/1-1-1-1.jpg" data-lightbox="exp2" data-title="步驟0">
                                <img src="images/hotaipay/02/1-1-1-1.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/02/1-1-1-2.jpg" data-lightbox="exp2" data-title="步驟1">
                                <img src="images/hotaipay/02/1-1-1-2.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/02/1-1-1-3.jpg" data-lightbox="exp2" data-title="步驟2">
                                <img src="images/hotaipay/02/1-1-1-3.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/02/1-1-1-4.jpg" data-lightbox="exp2" data-title="步驟3">
                                <img src="images/hotaipay/02/1-1-1-4.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/02/1-1-1-5.jpg" data-lightbox="exp2" data-title="步驟4">
                                <img src="images/hotaipay/02/1-1-1-5.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/02/1-1-1-6.jpg" data-lightbox="exp2" data-title="步驟5">
                                <img src="images/hotaipay/02/1-1-1-6.jpg" class="img-fluid">
                            </a>
                        </figure>
                        <figure>
                            <a class="example-image-link" href="images/hotaipay/02/1-1-1-7.jpg" data-lightbox="exp2" data-title="步驟6">
                                <img src="images/hotaipay/02/1-1-1-7.jpg" class="img-fluid">
                            </a>
                        </figure>
                    </div>
                </div>
            </div>
            <a href="hotaipay.htm" class="back">
                返回列表<i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </section>
    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
    <script>
    //---錨點滑動---//
    $(function() {
        $('.usw-way a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>
</body>

</html>