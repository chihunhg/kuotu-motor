<script src="../js/bootstrap/bootstrap.min.js"></script>
<script src="../js/script.js?20210923"></script>

<link href="../css/bootstrap-icons.css" rel="stylesheet">
<!--slick.js-->
<link rel="stylesheet" href="../js/slick/slick.css">
<link rel="stylesheet" href="../js/slick/slick-theme.css">
<script src="../js/slick/slick.min.js"></script>

<!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@200;400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap" rel="stylesheet">
<!-- wow -->
<link href="../js/wow/animate.css" rel="stylesheet">
<script src="../js/wow/wow.min.js"></script>
<script>
if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
	new WOW().init();
};
</script>
<!--[if lt IE 9]>
<script src="assets/html5shiv.min.js"></script>
<script src="assets/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
//判斷瀏覽器是否為IE包含 Edge，並跳出提示窗
function DetectIsIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // 回傳版本 <=10 的版本
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // 回傳版本 >=11 的版本
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
        // 判斷Edge
        return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    // other browser
    return false;
}

var q = DetectIsIE();

if (q != false) {
	//是IE 包含 Edge
    $(function (){
    	$('.warning').css('display','block')
      $('.warning').css('opacity','1')
      $('.navbar-brand').addClass('IElogo')
    }); 
} else {
	//不是IE
    $(function (){
    	$('.warning').css('display','none')
    });        
  } 	
 </script>
<!-- 用來相容其他瀏覽器--Bootstrap5 -->
<script crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js"></script>
<script>
  // Fix preventDefault for IE
  (function () {
    var workingDefaultPrevented = (function () {
      var e = document.createEvent('CustomEvent')
      e.initEvent('Bootstrap', true, true)
      e.preventDefault()
      return e.defaultPrevented
    })()
    if (!workingDefaultPrevented) {
      var origPreventDefault = Event.prototype.preventDefault
      Event.prototype.preventDefault = function () {
        if (!this.cancelable) {
          return
        }
        origPreventDefault.call(this)
        Object.defineProperty(this, 'defaultPrevented', {
          get: function () {
            return true
          },
          configurable: true
        })
      }
    }
  })()

  //購車優惠
  function paperBtn(PKey){
        //console.log("_paper.php?PKey="+ PKey);
        $.ajax({
            type: "POST",
            url: "_paper.php",
            data: "PKey=" + PKey,
            success: function(txt){
                //console.log(txt);
                $('.modal-body').html(txt);
            }
        });
    }
</script>
<?php //require("../_in_code_bottom.php"); ?>
