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
            
        </div>
    </section>


    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>