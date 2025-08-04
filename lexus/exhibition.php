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

<body <?php echo $bodytxt; ?>>

    <?php require("_header.php"); ?>
    <?php require("_banner.php"); ?>
    <?php //require("_sidebar.php"); 
    ?>
    <div class="breadCrumbs-box container">
        <ul class="breadCrumbs">
            <li class="item"><a href="./"><?php echo $home; ?></a></li>
            <li class="item"><a href="javascript:;"><?php echo $p2; ?></a></li>
            <li class="item active"><a href="javascript:;"><?php echo $p2_2; ?></a></li>
        </ul>
    </div>

    <section class="wrapper">
        <div class="container">
            <div class="exhibition">
                <p class="time"><i class="bi bi-clock"></i><span>營業時間</span>09:00~21:00</p>
                <div class="locationList">
                    <div class="item">
                        <figure>
                            <img src="../images/index/lexus/location/t01s.jpg" class="img-fluid" alt="台北市松江營業所">
                        </figure>
                        <div class="titleBox">
                            <h3>台北市松江營業所</h3>
                            <ul>
                                <li><a href="tel:(02)2503-2558"><i class="bi bi-telephone-fill"></i>(02)2503-2558</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/ko4KVDnkfy8Riv9n6" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>台北市中山區松江路433號</a></li>
                            </ul>
                            <div class="map_btn"><a class="mapbtn" href="javascript:;"><span>詳細地圖 <i class="fas fa-arrow-right"></i></span></a></div>
                        </div>
                        <div class="mapDetil">
                            <div class="container map-box-close">
                                <span class="map-box-close-btn">
                                    <i class="bi bi-x-lg mr-1"></i><span>關閉</span>
                                </span>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.0672426394603!2d121.53129175092398!3d25.065709943094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9577b6865dd%3A0x844888fb30f564cd!2zTEVYVVMg5p2-5rGf54ef5qWt5omA!5e0!3m2!1szh-TW!2stw!4v1631586052002!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <img src="../images/index/lexus/location/t02s.jpg" class="img-fluid" alt="台北市士林營業所">
                        </figure>
                        <div class="titleBox">
                            <h3>台北市士林營業所</h3>
                            <ul>
                                <li><a href="tel:(02)2831-2518"><i class="bi bi-telephone-fill"></i>(02)2831-2518</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/148hcJCbaU7VQ73E9" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>台北市士林區中正路350號</a></li>
                            </ul>
                            <div class="map_btn"><a class="mapbtn" href="javascript:;"><span>詳細地圖 <i class="fas fa-arrow-right"></i></span></a></div>
                        </div>
                        <div class="mapDetil">
                            <div class="container map-box-close">
                                <span class="map-box-close-btn">
                                    <i class="bi bi-x-lg mr-1"></i><span>關閉</span>
                                </span>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.2119545850956!2d121.51912315092436!3d25.094685541930506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442afe9a0b7ec63%3A0xc3a70c8975003750!2zTEVYVVMg5aOr5p6X54ef5qWt5omA!5e0!3m2!1szh-TW!2stw!4v1631586171904!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <img src="../images/index/lexus/location/nt01s.jpg" class="img-fluid" alt="新北市新莊營業所">
                        </figure>
                        <div class="titleBox">
                            <h3>新北市新莊營業所</h3>
                            <ul>
                                <li><a href="tel:(02)8993-1988"><i class="bi bi-telephone-fill"></i>(02)8993-1988</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/H6m5udyDx78hnb6fA" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>新北市新莊區中正路70號之2</a></li>
                            </ul>
                            <div class="map_btn"><a class="mapbtn" href="javascript:;"><span>詳細地圖 <i class="fas fa-arrow-right"></i></span></a></div>
                        </div>
                        <div class="mapDetil">
                            <div class="container map-box-close">
                                <span class="map-box-close-btn">
                                    <i class="bi bi-x-lg mr-1"></i><span>關閉</span>
                                </span>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.87062514893!2d121.45710335092355!3d25.038464244187033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a86fb02e5e0b%3A0x8779ca824ee55755!2zTEVYVVMg5paw6I6K54ef5qWt5omA!5e0!3m2!1szh-TW!2stw!4v1631586196140!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <img src="../images/index/lexus/location/nt02s.jpg" class="img-fluid" alt="新北市中和營業所">
                        </figure>
                        <div class="titleBox">
                            <h3>新北市中和營業所</h3>
                            <ul>
                                <li><a href="tel:(02)8221-8288"><i class="bi bi-telephone-fill"></i>(02)8221-8288</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/TuhxF25A1UQgLyzV7" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>新北市中和區中正路860號</a></li>
                            </ul>
                            <div class="map_btn"><a class="mapbtn" href="javascript:;"><span>詳細地圖 <i class="fas fa-arrow-right"></i></span></a></div>
                        </div>
                        <div class="mapDetil">
                            <div class="container map-box-close">
                                <span class="map-box-close-btn">
                                    <i class="bi bi-x-lg mr-1"></i><span>關閉</span>
                                </span>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28926.768098505923!2d121.4671601!3d25.0053479!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9bf5c4971c7%3A0x681e53abe688b094!2zTEVYVVMg5Lit5ZKM54ef5qWt5omA!5e0!3m2!1szh-TW!2stw!4v1631586506873!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <img src="../images/index/lexus/location/nt03s.jpg" class="img-fluid" alt="新北市三重營業所">
                        </figure>
                        <div class="titleBox">
                            <h3>新北市三重營業所</h3>
                            <ul>
                                <li><a href="tel:(02)8283-9368"><i class="bi bi-telephone-fill"></i>(02)8283-9368</a></li>
                                <li class="map-add"><a href="https://maps.app.goo.gl/A1fz2zQEKjJjHKzd6" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>新北市三重區三和路四段83號</a></li>
                            </ul>
                            <div class="map_btn"><a class="mapbtn" href="javascript:;"><span>詳細地圖 <i class="fas fa-arrow-right"></i></span></a></div>
                        </div>
                        <div class="mapDetil">
                            <div class="container map-box-close">
                                <span class="map-box-close-btn">
                                    <i class="bi bi-x-lg mr-1"></i><span>關閉</span>
                                </span>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.778485788053!2d121.4891397!3d25.075496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9b2b3019401%3A0x3b7f812bb506679!2zTEVYVVMg5LiJ6YeN54ef5qWt5omA!5e0!3m2!1szh-TW!2stw!4v1747122757842!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div><!-- item end -->
                </div><!-- locationList end -->
                <div class="mask"></div>
            </div>
        </div>
    </section>


    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>
<script>
    $(".mapbtn").click(function() {
        $('.mask').addClass('showup');
        console.log($(this).parent().parent().siblings('.mapDetil'));
        $(this).parent().parent().siblings('.mapDetil').addClass('showup');

    })

    $(".map-box-close").click(function() {
        $('.mapDetil').removeClass('showup');
        $('.mask').removeClass('showup');
        // $('.mapDetil iframe').attr('src', '');
    })
</script>

</html>