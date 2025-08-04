<?php
	require("_inc.php");
	$pageName = "p2";
	$subPageName = "p2_1";
  $nav=$home.$icon.$p2.$icon.$p2_1;
	$Module_PKey = "4";
	require("_code_public.php");

  if(is_numeric($_REQUEST['PKey'])){
    $PKey = $_REQUEST['PKey'];
  }

  $PDO_Cond = ' Where Upload = \'Yes\' and Module_PKey= :Module_PKey and Class1_PKey = :Class1_PKey and PKey= :PKey';
  $Cond_Array['Module_PKey'] = SqlFilter($Module_PKey,'int');
  $Cond_Array['Class1_PKey'] = $Class1_PKey;
  $Cond_Array['PKey'] = $PKey;

  $sql = "Select * from showroom ".$PDO_Cond;
  $rs = new recordset($sql, $Cond_Array);
  if (! $rs->eof){
      $Showroom_PKey = $rs->field("PKey");
      $strName = $rs->field("strName");
      $Subject = $rs->field("Subject");
      $intType = $rs->field("intType");
      $strLink = $rs->field("strLink");
      $Target = $rs->field("Target");

      //內容圖
      $Photo1 = '';
      $webp_photo1 = '';
      $sql = 'Select * from showroom_img Where Showroom_PKey= :Showroom_PKey and Sort = \'2\' and Photo1 <> \'\'';
      $img_Array['Showroom_PKey'] = $Showroom_PKey;
      $rs1 = new recordset($sql, $img_Array);
      if(! $rs1->eof && is_file('../Upload/'.$rs1->field("Forder").'/'.$rs1->field("Photo1"))){
          $Photo1 = '../Upload/'.$rs1->field("Forder").'/'.$rs1->field("Photo1");
          $ext = strtolower(substr(strrchr($Photo1,"."),1));
          $webp_photo1 = str_ireplace($ext, 'webp',$Photo1);
      }
  }
  else{
      ECHO "<script language=\"javascript\">" ;
      ECHO "alert('查無資料');" ;
      ECHO "location.href='showroom.htm';" ;
      ECHO "</script>" ;
      exit() ;
  }

  //SEO面包屑-JSON-LD
  $page_link = explode('/',$_SERVER['REQUEST_URI']);
  $page_link = end($page_link);

  $Element1 = [
      '@type'=> 'ListItem',
      'position'=> '1',
      'item' => $web_url,
      'name' => $home
  ];	

  $Element2 = [
      '@type'=> 'ListItem',
      'position'=> '2',
      'item' => $web_url.'showroom.htm',
      'name' => $p2
  ];

  $Element3 = [
      '@type'=> 'ListItem',
      'position'=> '3',
      'item' => $web_url.'showroom.htm',
      'name' => $p2_1
  ];

  $Element4 = [
    '@type'=> 'ListItem',
    'position'=> '4',
    'item' => $web_url.$page_link,
    'name' => $strName
  ];

  $ldjson = [
      "@context"=> "http://schema.org",
      "@type"=> "BreadcrumbList",
      "itemListElement"=> array($Element1,$Element2,$Element3,$Element4)
  ];
  //SEO面包屑-END
?>
<!DOCTYPE html>
<html <?php echo $lang;?>>
<head>
<?php require("_in_code_head.php"); ?>
<?php require("_in_javascript.php"); ?>
</head>

<body <?php echo $bodytxt;?> >

  <?php require("_header.php"); ?>
  <?php require("_banner.php"); ?>
  <?php //require("_sidebar.php"); ?>

      <div class="breadCrumbs-box container">
        <ul class="breadCrumbs">
          <li class="item"><a href="./"><?php echo $home; ?></a></li>
          <li class="item"><a href="javascript:;"><?php echo $p2; ?></a></li>
          <li class="item"><a href="showroom_toyota.php"><?php echo $p2_1; ?></a></li>
          <li class="item active"><a href="javascript:;"><?php echo $strName;?></a></li>
        </ul>
    </div>

  <section class="wrapper">
    <div class="container">
      <article class="car-detail">
        <p><?php echo $strName;?></p>
        <span><?php echo $Subject;?></span>
        <b><?php echo $intType;?></b>
        <a href="<?php echo $strLink;?>" target="<?php echo $Target;?>" rel="noopener noreferrer" class="btn-style btn-grey">
          <span>更多資訊</span>
          <span><i class="bi bi-chevron-right transi"></i></span>
        </a>
      </article>
      <figure>
        <picture>
            <?php 
            if(is_file($webp_photo1)){
            ?>
                <img src="<?php echo $webp_photo1.'?'.time();?>" class="img-fluid transi" alt="<?php echo $strName;?>">
            <?php
            }else{
            ?>
                <img src="<?php echo $Photo1.'?'.time();?>" class="img-fluid transi" alt="<?php echo $strName;?>">
            <?php
            }
            ?>
        </picture>
      </figure>
      <a href="showroom.htm" title="返回上頁" class="btn-style btn-line">
          <span>返回上頁</span>
          <span><i class="bi bi-chevron-right transi"></i></span>
        </a>
    </div>
  </section>


<?php require("_footer.php"); ?>
<?php require("_in_code_bottom.php"); ?>
</body>
</html>