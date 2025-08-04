<?php
require("_inc.php");
$pageName = "p4";
$subPageName = "p4_5_2";
$nav = $home . $icon . $p4 . $icon . $p4_5_2;

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

    <section class="wrapper">
        <div class="container">
            <div class="pay-bk">
                <div class="pay_step">
                <div class="container"><img src="images/hotaipay/05/invitation_card5.png?20221207" width="100%"></div>
                </div>
                <div class="goto-box goto-box-two3 clearfix">
                    <a href="https://www.kuotu-motor.com.tw/toyota/repair.htm" class="goto-btn" title="立即辦卡" target="_blank" rel="noopener noreferrer">立即預約<i class="bi bi-arrow-right-circle"></i></a>
                    <a href="https://www.hotaimember.com.tw/Account/PointsRecord" class="goto-btn" title="和泰Points點數查詢" target="_blank" rel="noopener noreferrer">和泰Points點數查詢<i class="bi bi-arrow-right-circle"></i></a>
                </div>
            </div>
        </div>
    </section>
    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>