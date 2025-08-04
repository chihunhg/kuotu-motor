<?php if ($pageName == "index") { ?>
	<div class="index-banner transi">
		<div class="slider single-item sliderbox pc_banner">

			<div>
				<a href="https://www.toyota.com.tw/event/202507LC/" target="_blank" rel="noopener noreferrer" title="TOYOTA LAND CRUISER| TOYOTA TAIWAN">
					<img src="../images/banner/toyota/132.jpg?20250711" alt="TOYOTA LAND CRUISER| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>

			<div>
				<a href="https://www.toyota.com.tw/event/202507SONY/" target="_blank" rel="noopener noreferrer" title="TOYOTA轟動全台 震撼獻禮| TOYOTA TAIWAN">
					<img src="../images/banner/toyota/130.jpg?20250702" alt="TOYOTA轟動全台 震撼獻禮| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>

			<div>
				<a href="https://www.toyota.com.tw/owner_news_detail.aspx?id=1036" target="_blank" rel="noopener noreferrer" title="這夏家電禮遇你 換輪胎電瓶抽好禮| TOYOTA TAIWAN">
					<img src="../images/banner/toyota/131.jpg?20250702" alt="這夏家電禮遇你 換輪胎電瓶抽好禮| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>

			<div>
				<a href="https://www.kuotu-motor.com.tw/images/banner/toyota/118_b.jpg" target="_blank" rel="noopener noreferrer" title="新名稱，全新氣象！| TOYOTA TAIWAN">
					<img src="../images/banner/toyota/118.jpg?20250224" alt="新名稱，全新氣象！| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>

			<div>
				<a href="https://www.toyota.com.tw/showroom/RAV4/" target="_blank" rel="noopener noreferrer" title="進口SUV銷售冠軍TOYOTA RAV4 曜黑魅影版，全新登場| TOYOTA TAIWAN">
					<img src="../images/banner/toyota/112.jpg?20241205" alt="進口SUV銷售冠軍TOYOTA RAV4 曜黑魅影版，全新登場| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>
            
		</div>
        
		<div class="slider single-item sliderbox sm_banner">

			<div>
				<a href="https://www.toyota.com.tw/event/202507LC/" target="_blank" rel="noopener noreferrer" title="了解更多: | TOYOTA TAIWAN">
					<img src="../images/banner/toyota/132_sm.jpg?20250711" alt="TOYOTA LAND CRUISER| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>

			<div>
				<a href="https://www.toyota.com.tw/event/202507SONY/" target="_blank" rel="noopener noreferrer" title="了解更多: | TOYOTA TAIWAN">
					<img src="../images/banner/toyota/130_sm.jpg?20250702" alt="TOYOTA轟動全台 震撼獻禮| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>

			<div>
				<a href="https://www.toyota.com.tw/owner_news_detail.aspx?id=1036" target="_blank" rel="noopener noreferrer" title="了解更多: | TOYOTA TAIWAN">
					<img src="../images/banner/toyota/131_sm.jpg?20250702" alt="這夏家電禮遇你 換輪胎電瓶抽好禮| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>

			<div>
				<a href="https://www.kuotu-motor.com.tw/images/banner/toyota/118_b.jpg" target="_blank" rel="noopener noreferrer" title="了解更多: | TOYOTA TAIWAN">
					<img src="../images/banner/toyota/118_sm.jpg?20250224" alt="新名稱，全新氣象！| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>

			<div>
				<a href="https://www.toyota.com.tw/showroom/RAV4/" target="_blank" rel="noopener noreferrer" title="了解更多: | TOYOTA TAIWAN">
					<img src="../images/banner/toyota/112_sm.jpg?20241205" alt="進口SUV銷售冠軍TOYOTA RAV4 曜黑魅影版，全新登場| TOYOTA TAIWAN" class="img-fluid">
				</a>
			</div>

		</div>

	</div>
<?php } else { ?>
	<div style="background-image:url(../images/banner/toyota/<?php echo $pageName; ?>.jpg);" class="inner-banner">
		<?php switch ($subPageName) {
			case "p1_1":
				$en = "News";
				break;
			case "p1_2":
				$en = "Discount";
				break;
			case "p1_4":
				$en = "contact";
				break;
			case "p2_1":
				$en = "Cars Show";
				break;
			case "p2_2":
				$en = "Location";
				break;
			case "p2_5":
				$en = "Insurance";
				break;
			case "p3_1":
				$en = "Service";
				break;
			case "p4_1":
				$en = "used cars";
				break;
		}
		?>
		<div class="inner-banner-title">
			<h1><?php echo $$subPageName; ?></h1>
			<span class="en"><?php echo $en; ?></span>
		</div>
	</div>
<?php } ?>