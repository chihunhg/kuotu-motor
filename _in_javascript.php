<script src="js/jquery-3.7.1.min.js"></script>
<link href="js/bootstrap/bootstrap.min.css" rel="stylesheet">

<script src="js/lazyload.min.js"></script>

<link href="css/fontawesome/css/all.css" rel="stylesheet">

<link href="css/style.css?ver=<?php echo filemtime('css/style.css'); ?>" rel="stylesheet">
<link href="css/index.css?ver=<?php echo filemtime('css/index.css'); ?>" rel="stylesheet">

<!--google V.3 驗證-->
<script src='https://www.google.com/recaptcha/api.js?hl=zh-TW'></script>
<!-- reCAPTCHA v3-->
<script src="https://www.google.com/recaptcha/api.js?render=6LfWWcoZAAAAAByCwVtWHXgbcYYYPnq-4t6clFfH"></script><script>grecaptcha.ready(function() {  grecaptcha.execute('6LfWWcoZAAAAAByCwVtWHXgbcYYYPnq-4t6clFfH', {action: 'homepage'}).then(function(token) {   var recaptchaResponse = document.getElementById('recaptchaResponse');   recaptchaResponse.value = token;  });});function onClick(e) { e.preventDefault(); grecaptcha.ready(function() {   grecaptcha.execute('6LfWWcoZAAAAAByCwVtWHXgbcYYYPnq-4t6clFfH', {action: 'submit'}).then(function(token) {   }); });}</script>



<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-BRBBBT7');</script>
<!-- End Google Tag Manager -->