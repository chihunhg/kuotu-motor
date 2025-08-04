<?php 
require_once("../_inc.php");
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
  <meta charset="UTF-8">
  <title><?php echo $WebName?>｜後端管理系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php require_once("../_in_javascript.php"); ?>
</head>

<body>
  <?php require_once("../_header.php"); ?>
  <div class="wrap">
    <?php require_once("../_subNav.php"); ?>
    <div class="content">
      <button class="subNav-btn in"><i class="fas fa-angle-right"></i><span>選單</span></button>
      <div class="container">
        <h1>Hello, <?php echo $_SESSION["UserName"]?></h1>
        <article>開啟左側的選單內容，選擇要編輯的功能吧！<br><br>TSG 天矽團隊</article>
        <div class="tips">

        </div>
      </div>
    </div>
  </div>
  <?php require_once("../_in_code_bottom.php"); ?>
</body>
</html>
