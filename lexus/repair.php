<?php
require("_inc.php");
$pageName = "p3";
$subPageName = "p3_1";
$nav = $home . $icon . $p3 . $icon . $p3_1;

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
            <li class="item"><a href="javascript:;"><?php echo $p3; ?></a></li>
            <li class="item active"><a href="javascript:;"><?php echo $p3_1; ?></a></li>
        </ul>
    </div>
    <section class="wrapper">
        <div class="container">
            <div class="sevice">
                <div class="timeList">
                    <div class="timeList-box d-flex flex-wrap">
                        <p class="time"><span><i class="bi bi-clock"></i>一般服務時間</span>(周一 ~ 周六) 08:30~17:30</p>
                        <p class="time"><span><i class="bi bi-clock"></i>晚間服務時間</span>(周一 ~ 周五) 17:30~19:00</p>
                        <p class="time"><span><i class="bi bi-clock"></i>假日服務時間</span>08:30~17:30</p>
                    </div>
                    <div class="reservation d-flex flex-grow-1">
                        <a href="https://www.toyota.com.tw/owner_login.aspx?xurl=OWNER_BOOKING.ASPX" target="_blank">線上預約保養<i class="fas fa-arrow-right"></i></a>
                        <a href="contact.htm" target="_blank">線上預約美容<i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>


                <div class="seviceList">
                    <div class="item">
                        <figure>
                            <a href="javascript:;" data-toggle="modal" data-target="#repair_1">
                                <img src="../images/index/lexus/repair/t01a.jpg" class="img-fluid" alt="台北市濱江服務廠">
                                <span>了解詳情</span>
                            </a>
                        </figure>
                        <div class="textBox">
                            <h3><a href="javascript:;" data-toggle="modal" data-target="#repair_1">台北市濱江服務廠</a></h3>
                            <ul>
                                <li><a href="tel:(02)2508-1288"><i class="bi bi-telephone-fill"></i>(02)2508-1288</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/3SCrLgfngLZgZPtd8" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>台北市濱江街233號</a></li>
                            </ul>
                            <ul class="serviceItem">
                                <li class="always">固定服務:</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>一般時間</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>車輛美容鍍膜</li>
                            </ul>
                            <ul class="serviceItem">
                                <li>須預約服務:</li>
                                <li><i class="bi bi-check2-circle"></i>夜間時間</li>
                            </ul>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <a href="javascript:;" data-toggle="modal" data-target="#repair_2">
                                <img src="../images/index/lexus/repair/t02a.jpg" class="img-fluid" alt="台北市士林服務廠">
                                <span>了解詳情</span>
                            </a>
                        </figure>
                        <div class="textBox">
                            <h3><a href="javascript:;" data-toggle="modal" data-target="#repair_2">台北市士林服務廠</a></h3>
                            <ul>
                                <li><a href="tel:(02)2831-2289"><i class="bi bi-telephone-fill"></i>(02)2831-2289</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/H5hvWcZN9XRLroLT9" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>台北市士林區中正路350號</a></li>
                            </ul>
                            <ul class="serviceItem">
                                <li class="always">固定服務:</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>一般時間</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>車輛美容鍍膜</li>
                            </ul>
                            <ul class="serviceItem">
                                <li>須預約服務:</li>
                                <li><i class="bi bi-check2-circle"></i>夜間時間</li>
                            </ul>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <a href="javascript:;" data-toggle="modal" data-target="#repair_3">
                                <img src="../images/index/lexus/repair/nt01a.jpg" class="img-fluid" alt="新北市新莊服務廠">
                                <span>了解詳情</span>
                            </a>
                        </figure>
                        <div class="textBox">
                            <h3><a href="javascript:;" data-toggle="modal" data-target="#repair_3">新北市新莊服務廠</a></h3>
                            <ul>
                                <li><a href="tel:(02)2998-3990"><i class="bi bi-telephone-fill"></i>(02)2998-3990</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/29at4aDXdQE4bQo79" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>新北市新莊區中正路70號之2</a></li>
                            </ul>
                            <ul class="serviceItem">
                                <li class="always">固定服務:</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>一般時間</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>車輛美容鍍膜</li>
                            </ul>
                            <ul class="serviceItem">
                                <li>須預約服務:</li>
                                <li><i class="bi bi-check2-circle"></i>夜間時間</li>
                            </ul>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <a href="javascript:;" data-toggle="modal" data-target="#repair_4">
                                <img src="../images/index/lexus/repair/nt02a.jpg" class="img-fluid" alt="新北市中和服務廠">
                                <span>了解詳情</span>
                            </a>

                        </figure>
                        <div class="textBox">
                            <h3><a href="javascript:;" data-toggle="modal" data-target="#repair_4">新北市中和服務廠</a></h3>
                            <ul>
                                <li><a href="tel:(02)8221-8618"><i class="bi bi-telephone-fill"></i>(02)8221-8618</a></li>
                                <li class="map-add"><a href="https://goo.gl/maps/J7hTuWoD28EkSZF36" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>新北市中和區中山路2段546號</a></li>
                            </ul>
                            <ul class="serviceItem">
                                <li class="always">固定服務:</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>一般時間</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>車輛美容鍍膜</li>
                            </ul>
                            <ul class="serviceItem">
                                <li>須預約服務:</li>
                                <li><i class="bi bi-check2-circle"></i>夜間時間</li>
                            </ul>
                        </div>
                    </div><!-- item end -->
                    <div class="item">
                        <figure>
                            <a href="javascript:;" data-toggle="modal" data-target="#repair_5">
                                <img src="../images/index/lexus/repair/nt03a.jpg" class="img-fluid" alt="新北市三重服務廠">
                                <span>了解詳情</span>
                            </a>

                        </figure>
                        <div class="textBox">
                            <h3><a href="javascript:;" data-toggle="modal" data-target="#repair_5">新北市三重服務廠</a></h3>
                            <ul>
                                <li><a href="tel:(02)8283-9699"><i class="bi bi-telephone-fill"></i>(02)8283-9699</a></li>
                                <li class="map-add"><a href="https://maps.app.goo.gl/ZiVjBTZoxJMUUW7F9" target="_blank" rel="noopener noreferrer"><i class="bi bi-geo-alt-fill"></i>新北市三重區三和路四段83號</a></li>
                            </ul>
                            <ul class="serviceItem">
                                <li class="always">固定服務:</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>一般時間</li>
                                <li class="always"><i class="bi bi-check2-circle"></i>車輛美容鍍膜</li>
                            </ul>
                            <ul class="serviceItem">
                                <li>須預約服務:</li>
                                <li><i class="bi bi-check2-circle"></i>夜間時間</li>
                            </ul>
                        </div>
                    </div><!-- item end -->
                </div>
            </div>
        </div>
    </section>
    <?php require("_Maintenance.php"); ?>


    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
</body>

</html>