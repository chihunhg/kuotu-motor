<?php
require("_inc.php");
$pageName = "p2";
$subPageName = "p2_5";
$nav = $home . $icon . $p2 . $icon . $p2_5;

require("_code_public.php");
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
    <?php //require("_sidebar.php"); 
    ?>
    <div class="breadCrumbs-box container">
        <ul class="breadCrumbs">
            <li class="item"><a href="./"><?php echo $home; ?></a></li>
            <li class="item"><a href="javascript:;"><?php echo $p2; ?></a></li>
            <li class="item active"><a href="javascript:;"><?php echo $p2_5; ?></a></li>
        </ul>
    </div>

    <section class="wrapper">
        <div class="container">
            <ul class="insurance d-flex flex-wrap">
                <li class="transi">
                    <a href="https://www.hoan.com.tw/Product/Detail/27" title="強制險" target="_blank" rel="noopener noreferrer">
                        <figure>
                            <img src="../images/both/insurance/01.jpg?20210914" class="img-fluid transi" alt="強制險圖片">
                        </figure> 
                        <p class="transi">強制險</p>
                    </a>
                </li>
                <li class="transi">
                    <a href="https://www.hoan.com.tw/Product/Detail/26" title="任意險" target="_blank" rel="noopener noreferrer">
                        <figure>
                            <img src="../images/both/insurance/02.jpg" class="img-fluid transi" alt="任意險圖片">
                        </figure> 
                        <p class="transi">任意險</p>
                    </a>
                </li>
               
            </ul>
        </div>
    </section>


    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>