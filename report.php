<?php
require("_inc.php");
$pageName = "p2";
$subPageName = "p2_2";
$nav = $home . $icon . $p2 . $icon . $p2_2;

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
            <li class="item"><a href="javascript:;"><?php echo $p2; ?></a></li>
            <li class="item active"><a href="javascript:;"><?php echo $p2_2; ?></a></li>
        </ul>
    </div>
    <section class="wrapper">
        <div class="container">
            <section>
                <div class="linkBox">
                    <a onClick="myFunction()" tittle="前往公開資訊觀測站" href="javascript:;">前往公開資訊觀測站<i class="fas fa-arrow-right"></i><br>( 國都代號2225 )</a>
                </div>
                <p class='show'></p>
            </section>
        </div>
    </section>
    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>

     <script> 
        function myFunction() { 
            if (window.confirm("開啟外部連結")) {
                window.open("https://mops.twse.com.tw/mops/web/index");
            }
        } 
    </script> 
