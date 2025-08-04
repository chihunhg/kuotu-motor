<?php
require("_inc.php");
$pageName = "p1";
$subPageName = "p1_1";
$nav = $home . $icon . $p1 . $icon . $p1_1;

require("_code_public.php");
?>
<!DOCTYPE html>
<html <?php echo $lang; ?>>

<head>
    <?php require("_in_code_head.php"); ?>
    <?php require("_in_javascript.php"); ?>
    <script language="JavaScript" type="text/JavaScript">
        /*-----------------------------------------*/
  function sbForm(){
    var obj = document.form1;
    if(FormChk(obj)){
      obj.submit();
    }
  }
  /*-----------------------------------------*/
  function FormChk(obj) {
    var array = new Array();
    var obj = document.form1;
    var flag = true;
    /*====================================*/
    if ($('#name').val() == ""){
      $("#name").addClass('aleart_line')
      $("#name_txt").text("請輸入您的姓名");
      array.push("name");
      flag = false;
    }else{
      $("#name").removeClass("aleart_line");
      $("#name_txt").hide().text("");
    }
    /*====================================*/
    if ($('#sex').val() == ""){
      $("#sex").addClass('aleart_line')
      $("#sex_txt").text("請輸入性別");
      array.push("sex");
      flag = false;
    }else{
      $("#sex").removeClass("aleart_line");
      $("#sex_txt").hide().text("");
    }
    /*====================================*/
    if ($('#tel').val() == ""){
      $("#tel").addClass('aleart_line')
      $("#tel_txt").text("請輸入您的電話");
      array.push("tel");
      flag = false;
    }else{
      $("#tel").removeClass("aleart_line");
      $("#tel_txt").hide().text("");
    }
    /*====================================*/
    if ($('#description').val() == ""){
        $("#description").addClass('aleart_line')
        $("#description_txt").text("請填寫問題描述");
        array.push("description");
        flag = false;
      }else{
        $("#description").removeClass("aleart_line");
        $("#description_txt").hide().text("");
      }
    /*=====================================*/
    if($('input[name="person"]:checked').length==0) {
        //$("#interest").addClass('aleart_line')
        $("#person_txt").text("請閱讀客服信箱個資宣告");
        array.push("person");
        flag = false;
     
    }else {
        //$("#person").removeClass("aleart_line");
        $("#person_txt").text("");
    }
    /*====================================*///select 下拉選單
    
    if(flag==false){
      var field = array[0];
      return false;
    }
    return true;
  }
  /*-----------------------------------------*/
  function isEmail(txt){ 
    var pattern = /^([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+$/i;
    //var pattern = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/; 
    return pattern.test(txt);    
  } 
  /*-----------------------------------------*/
</script>
    <script src='https://www.google.com/recaptcha/api.js?hl=zh-TW'></script>
</head>

<body <?php echo $bodytxt; ?> class="topPage">

    <?php require("_header.php"); ?>
    <?php require("_banner.php"); ?>

    <div class="breadCrumbs-box container">
        <ul class="breadCrumbs">
            <li class="item"><a href="./"><?php echo $home; ?></a></li>
            <li class="item"><a href="javascript:;"><?php echo $p1; ?></a></li>
            <li class="item active"><a href="javascript:;"><?php echo $p1_1; ?></a></li>
        </ul>
    </div>
    <section class="wrapper">
        <div class="container">
            <div class="d-lg-flex justify-content-center">
                <div class="contant_area">
                    <div class="contant_inner">

                        <div>
                            <!-- <img src="../images/all/innd.png" alt="創新專業汽車美容" class="img-fliud innd-logo"> -->
                            <!-- <p class="contant_title">創新汽車</p> -->
                            <div class="contant_info">
                                <p class="contant_info_title">
                                    <span>本服務聯絡對象為<b class="red">國都汽車</b></span><br>其他經銷商<br>(北都、桃苗、中部、南都、高都、蘭陽、東部)<br>意見反映請洽總代理品牌客服
                                </p>
                                <div class="contant_info_brand">
                                    <b>TOYOTA</b>
                                    <ul>
                                        <li><a href="0800221345" title="TOYOTA客服專線"><i class="bi bi-telephone-fill"></i>客服專線 : 0800-221-345</a></li>
                                        <li><a href="02-5599-7299" title="TOYOTA客服專線"><i class="bi bi-telephone-fill"></i>客服專線 : 02-5599-7299</a></li>
                                        <li><a href="https://cs-ai-chatbot.toyota.com.tw/" target="_blank" rel="noopener noreferrer" title="TOYOTA客服網址"><i class="bi bi-box-arrow-up-right"></i>客服網址</a></li>
                                    </ul>
                                </div>
                                <div class="contant_info_brand">
                                    <b>LEXUS</b>
                                    <ul>
                                        <li><a href="0800036036" title="LEXUS客服專線"><i class="bi bi-telephone-fill"></i>客服專線 : 0800-036-036</a></li>
                                        <li><a href="https://www.lexus.com.tw/contact.aspx" target="_blank" rel="noopener noreferrer" title="LEXUS客服網址"><i class="bi bi-box-arrow-up-right"></i>客服網址</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- <div class="contant_list">
                                <div class="contant_item"><a href="javascript:;" data-toggle="modal" data-target="#shop"><span><i class="fas fa-car"></i>獨立店總覽</span><i class="fas fa-angle-right mr-0"></i></a></div>
                                <div class="contant_item"><a href="repair.php"><span><i class="fas fa-tools"></i>服務廠總覽</span><i class="fas fa-angle-right mr-0"></i></a></div>
                                <div class="contant_item contant_item_dm"><a href="../images/news/toyota/contant/DM01.jpg" data-lightbox="image-1" data-title="My caption"><span><i class="fab fa-readme"></i>查看服務項目</span><i class="fas fa-angle-right mr-0"></i></a></div>
                            </div> -->
                        </div>
                        <!-- <div class="contact_dm">
                            <a href="../images/news/toyota/contant/DM01.jpg" data-lightbox="image-1">
                                <img src="../images/news/toyota/contant/DM01.jpg" class="img-fluid" alt="DM">
                                <span>點我放大</span>
                            </a>
                        </div> -->
                    </div>
                </div>
                <!--col-md-4 end-->

                <div class="contant_form ">
                    <p>請詳細填寫基本資料，我們將竭誠為您服務! <br><span class="red">（星號 (*) 必須填寫）</span></p>
                    <form class="row" name="form1" method="post" action="mail.php" onSubmit="return FormChk(this)">

                        <div class="form-group col-6">
                            <label for="name">姓名<span class="red">*</span></label>
                            <input name="name" id="name" type="text" class="form-control" size="20">
                            <small id="name_txt" class="red"></small>
                        </div>

                        <div class="form-group col-6">
                            <label for="sex">性別<span class="red">*</span></label>
                            <input name="sex" id="sex" type="text" class="form-control" size="20">
                            <small id="sex_txt" class="red"></small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tel">連絡電話<span class="red">*</span></label>
                            <input name="tel" id="tel" type="text" class="form-control" size="20">
                            <small id="tel_txt" class="red"></small>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="car">車主請填車號</label>
                            <input name="car" id="car" type="text" class="form-control" size="20">
                            <small id="num_txt" class="red"></small>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="mail">E-mail</label>
                            <input name="mail" id="mail" type="text" class="form-control" size="20">
                            <small id="mail_txt" class="red"></small>
                        </div>

                        <div class="form-group col-12">
                            <label for="description">問題描述<span class="red">*</span></label>
                            <textarea name="description" id="description" rows="8" class="form-control"></textarea>
                            <small id="description_txt" class="red"></small>
                        </div>

                        <!-- <div class="form-group">
                            <label for="">驗証碼<span class="red">*</span></label>
                            <div class="g-recaptcha" data-sitekey="6LdasOAUAAAAAAIejpNsXZqOszECFJFXqfj3cHnw"> </div>
                        </div> -->

                        <div class="form-group col-md-12">
                            <input name="person" id="person" type="checkbox">
                            <label for="person"><span class="red ml-1">*</span>我已閱讀<a href="javascript:;" class="personlink">【客服信箱個資宣告】</a>，且同意此宣告內容。</label><br>
                            <small id="person_txt" class="red"></small>
                        </div>

                        <div class="btnWrap text-center">
                            <button class="btn-style btn-grey" type="button" onClick="sbForm();" onMouseOut="MM_swapImgRestore()" value="送出" data-text="送出">
                                <span>確認送出</span>
                                <span><i class="bi bi-chevron-right transi"></i></span>
                            </button>
                            <input type="hidden" name="Send" id="Send" />
                            <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
                        </div>
						<input type="hidden" name="csrf" value="<?php if(isset($CSRF)){echo $CSRF;}?>" />
                    </form>
                </div>
                <!--row-->
                <?php require("_personBox.php"); ?>
                
            </div>
        </div>
    </section>
    <?php require("_footer.php"); ?>
    <?php require("_in_code_bottom.php"); ?>
    <script>
        $('.submit').click(function() {
            $('.personBox').hide();
        })
        $('.personlink').click(function() {
            $('.personBox').show();
        })
    </script>
</body>

</html>