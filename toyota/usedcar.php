<?php
require("_inc.php");
$pageName = "p4";
$subPageName = "p4_1";
$nav = $home . $icon . $p4 . $icon . $p4_1;

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
            <li class="item"><a href="javascript:;"><?php echo $p4; ?></a></li>
            <li class="item active"><a href="javascript:;"><?php echo $p4_1; ?></a></li>
        </ul>
    </div>

    <section class="wrapper">
        <div class="container">
            <div class="usedcar">
                <div class="timeList">
                    <p class="time"><span><i class="bi bi-clock"></i>營業時間</span>(周一 ~ 周日) AM09:00 ~ PM：09:00</p>
                    <p class="time"><span><i class="fas fa-chart-line"></i>經營理念</span><span class="timeitem"><i class="far fa-check-circle mx-1"></i>親切<i class="far fa-check-circle mx-1"></i>熱忱服務<i class="far fa-check-circle mx-1"></i>提供透明化<i class="far fa-check-circle mx-1"></i>優質中古車</span></p>
                </div>
                
                <div class="locationList">
                    <div class="item">
                        <figure>
                            <img src="../images/usedcar/toyota/bo5.jpg" class="img-fluid" alt="台北市 陽明營業所">
                        </figure>
                        <div class="titleBox">
                            <h3>台北市 陽明營業所</h3>
                            <ul>
                                <li><a href="tel:(02)2891-1811"><i class="bi bi-telephone-fill"></i>(02)2891-1811</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/p3g6Vb9BmWCp3F5c8" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>台北市北投區大業路6號1樓</a></li>
                            </ul>
                            <div class="map_btn"><a class="mapbtn" href="javascript:;" data-num="3"><span>詳細地圖 <i class="fas fa-arrow-right"></i></span></a></div>
                        </div>
                        <div class="mapDetil">
                            <div class="container map-box-close">
                                <span class="map-box-close-btn">
                                    <i class="bi bi-x-lg mr-1"></i><span>關閉</span>
                                </span>
                            </div>
                            <iframe data-num="3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.402229658841!2d121.49763135092454!3d25.122088740828946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442afd639c61341%3A0xcdedf93b27e3b5ee!2zVE9ZT1RB6KqN6K2J5Lit5Y-k6LuKIOWci-mDvemZveaYjuaJgA!5e0!3m2!1szh-TW!2stw!4v1631584966481!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                           
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <img src="../images/usedcar/toyota/bo1.jpg" class="img-fluid" alt="台北市 松江營業所">
                        </figure>
                        <div class="titleBox">
                            <h3>台北市 松江營業所</h3>
                            <ul>
                                <li><a href="tel:(02)2515-9988"><i class="bi bi-telephone-fill"></i>(02)2515-9988</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/xu9jy8wuz85mSPrN7" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>台北市中山區松江路557號</a></li>
                            </ul>
                            <div class="map_btn">
                                <a class="mapbtn" href="javascript:;" data-num="0"><span>詳細地圖 <i class="fas fa-arrow-right"></i></span></a>
                            </div>
                        </div>
                        <div class="mapDetil">
                            <div class="container map-box-close">
                                <span class="map-box-close-btn">
                                    <i class="bi bi-x-lg mr-1"></i><span>關閉</span>
                                </span>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14457.72094963464!2d121.5244600495703!3d25.05340286835556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9f9f123fb4f%3A0x9d9e595d06c71580!2zVE9ZT1RB6KqN6K2J5Lit5Y-k6LuKIOWci-mDveadvuaxn-aJgA!5e0!3m2!1szh-TW!2stw!4v1631584767966!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <img src="../images/usedcar/toyota/bo2.jpg" class="img-fluid" alt="新北市 中和營業所">
                        </figure>
                        <div class="titleBox">
                            <h3>新北市 中和營業所</h3>
                            <ul>
                                <li><a href="tel:(02)8226-6988"><i class="bi bi-telephone-fill"></i>(02)8226-6988</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/Xw1xBuELuScGeWUn8" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>新北市中和區中正路866號</a></li>
                            </ul>
                            <div class="map_btn"><a class="mapbtn" href="javascript:;" data-num="1"><span>詳細地圖 <i class="fas fa-arrow-right"></i></span></a></div>
                        </div>
                        <div class="mapDetil">
                            <div class="container map-box-close">
                                <span class="map-box-close-btn">
                                    <i class="bi bi-x-lg mr-1"></i><span>關閉</span>
                                </span>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.8330417575307!2d121.48215475092317!3d25.005788545496372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a82973f40ef3%3A0x43991059030848e2!2zVE9ZT1RB6KqN6K2J5Lit5Y-k6LuKIOWci-mDveS4reWSjOaJgA!5e0!3m2!1szh-TW!2stw!4v1631584911496!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <img src="../images/usedcar/toyota/bo3.jpg" class="img-fluid" alt="新北市 丹鳳營業所">
                        </figure>
                        <div class="titleBox">
                            <h3>新北市 丹鳳營業所</h3>
                            <ul>
                                <li><a href="tel:(02)2901-5800"><i class="bi bi-telephone-fill"></i>(02)2901-5800</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/K37xK2R7yfAnMb3L9" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>新北市新莊區中正路717號</a></li>
                            </ul>
                            <div class="map_btn"><a class="mapbtn" href="javascript:;" data-num="2"><span>詳細地圖 <i class="fas fa-arrow-right"></i></span></a></div>
                        </div>
                        <div class="mapDetil">
                            <div class="container map-box-close">
                                <span class="map-box-close-btn">
                                    <i class="bi bi-x-lg mr-1"></i><span>關閉</span>
                                </span>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.1444245869734!2d121.42200985092342!3d25.029172344559605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7ed3d8f32a3%3A0x11aef7549d64f9fc!2zVE9ZT1RB6KqN6K2J5Lit5Y-k6LuKIOWci-mDveS4uemzs-aJgA!5e0!3m2!1szh-TW!2stw!4v1631584937738!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div><!-- item end -->
                    
                </div>
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

<!-- <script>
    $('.mapbtn').click(function(event) {
        $('.mapbtn').removeClass('active');
        $('.d-xl-none').hide();
        $('.item').removeClass('active');


        $(this).addClass('active');
        $(this).parent().parent().siblings('iframe').slideDown();
        $(this).parent().parent().parent().addClass('active');
        var num = $(this).attr('data-num');
        switch (num) {
            case "0":
                $('.d-xl-block').attr('src', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7227.937281066415!2d121.53404000000002!3d25.069052!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a956f6a3cd8b%3A0x1bf82c60d61d46c6!2zMTA0OTHlj7DljJfluILkuK3lsbHljYDmnb7msZ_ot681NTfomZ8!5e0!3m2!1szh-TW!2stw!4v1628556521860!5m2!1szh-TW!2stw');
                break;
            case "1":
                $('.d-xl-block').attr('src', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7231.652516325409!2d121.484305!3d25.006019!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a829729a92d5%3A0x4e956638fd01d5d3!2zMjM15paw5YyX5biC5Lit5ZKM5Y2A5Lit5q2j6LevODY2LTEx6Jmf!5e0!3m2!1szh-TW!2stw!4v1628561247851!5m2!1szh-TW!2stw');
                break;
            case "2":
                $('.d-xl-block').attr('src', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7230.2936422076045!2d121.42421000000002!3d25.029091!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7ed3e30d041%3A0xbad0ef5b2cfc0b69!2zMjQy5paw5YyX5biC5paw6I6K5Y2A5Lit5q2j6LevNzE36Jmf!5e0!3m2!1szh-TW!2stw!4v1628561311693!5m2!1szh-TW!2stw');
                break;
            case "3":
                $('.d-xl-block').attr('src', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.401654849888!2d121.49771981500791!3d25.122108183931218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442ae455c739cbb%3A0x31d6837c537411fd!2zMTEy5Y-w5YyX5biC5YyX5oqV5Y2A5aSn5qWt6LevNuiZnw!5e0!3m2!1szh-TW!2stw!4v1628561400718!5m2!1szh-TW!2stw');
                break;
        }
    })
</script> -->

</html>