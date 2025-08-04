<?php
	//title
	if ( $pageName == "p1" ){
		$pageTitle     = $p1 . " ∣ " . $pageTitle2;
		//$m_keywords    = "";
		//$m_description = "";
	
	} elseif ( $pageName == "p2" ){
		$pageTitle     = $p2 . " ∣ " . $pageTitle2;
		//$m_keywords    = "";
		//$m_description = "";
		
	} elseif ( $pageName == "p3" ){
		$pageTitle     = $p3 . " ∣ " . $pageTitle2;
		//$m_keywords    = "";
		//$m_description = "";

	} elseif ( $pageName == "p4" ){
		$pageTitle     = $p4 . " ∣ " . $pageTitle2;
		//$m_keywords    = "";
		//$m_description = "";

	} elseif ( $pageName == "p5" ){
		$pageTitle     = $p5 . " ∣ " . $pageTitle2;
		//$m_keywords    = "";
		//$m_description = "";
	}
?>
<title><?php echo $pageTitle;?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="<?php echo $m_description;?>" />
<meta name="keywords" content="<?php echo $m_keywords;?>" />
<meta name="robots" content="all" />
<link rel="canonical" href="<?php echo $thisUrl;?>"/>
<meta property="og:site_name" content="<?php echo $pageTitle2;?>"/>
<meta property="og:url" content="<?php echo $thisUrl; ?>" />
<meta property="og:type" content="website" />
<?php if ($pageName=="index"){ ?>
<meta property="og:title" content="<?php echo $pageTitle;?>"/>
<meta property="og:description" content="" />
<meta property="og:image" content="images/fb_img.jpg"/>
<link rel="image_src" type="image/jpeg" href="images/fb_img.jpg" />
<? } else { ?>
<meta property="og:title" content="<?php if ($strName != "") echo $strName." - "; {?><? } ?><?php echo $pageTitle;?>"/>
<meta property="og:image" content=""/>
<? } ?>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script type="application/ld+json">
	<?php 
	echo json_encode($ldjson);
	echo PHP_EOL;
	?>
</script>

<!--google流量分析追蹤碼-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43913929-1', 'kuotu-motor.com.tw');
  ga('send', 'pageview');

</script>