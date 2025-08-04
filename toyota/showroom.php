<?php
	require("_inc.php");
	$pageName = "p2";
	$subPageName = "p2_1";
  $nav=$home.$icon.$p2.$icon.$p2_1;
  $Module_PKey = "4";
	require("_code_public.php");

  $PDO_Cond .= ' Where Module_PKey = :Module_PKey and Class1_PKey = :Class1_PKey and Upload = \'Yes\'';
  $Cond_Array['Module_PKey'] = $Module_PKey;
  $Cond_Array['Class1_PKey'] = $Class1_PKey;

  // $sql = 'Select count(PKey)as Total From filedown '.$PDO_Cond;
  // $rs = new recordset($sql, $Cond_Array);
  // $Total = $rs->field("Total");

  // //頁數
  // $tSum=1;
  // $tPageTotal=1;
  // $tPage = 1;
  // //每頁幾筆-----
  // $tPageSize=6;
  // //總頁數-----
  // $tPageTotal = ceil(($Total/$tPageSize));

  // //當前頁數
  // if (SqlFilter($_REQUEST["Page"],"int") > 0)
  // $tPage = $_REQUEST["Page"];

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
      'item' => $web_url.$page_link,
      'name' => $p2_1
  ];

  $ldjson = [
      "@context"=> "http://schema.org",
      "@type"=> "BreadcrumbList",
      "itemListElement"=> array($Element1,$Element2,$Element3)
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
        <li class="item active"><a href="javascript:;"><?php echo $p2_1; ?></a></li>
      </ul>
    </div>

  <section class="wrapper">
    <div class="container">
      
      <ul class="carsshow d-flex flex-wrap">
      <?php
        $sql = 'Select * From showroom '.$PDO_Cond.' Order By Sort';
        //$sql .= ' limit ' .($tPage - 1)*$tPageSize.','.$tPageSize;//每頁顯示資料的 sql 語法,僅取出所需的資料筆數.
        $rs1 = new recordset($sql, $Cond_Array);
        if($rs1->eof){//Under Construction
            //echo '<p class="nodata">資料建置中</p>';
        }
        while(! $rs1->eof){
            $Showroom_PKey = $rs1->field("PKey");
            $strName = $rs1->field("strName");
            $Subject = $rs1->field("Subject");
            $intType = $rs1->field("intType");
            
            //列表圖
            $Photo1 = './images/default/default.jpg';
            $webp_photo1 = '';
            $sql = 'Select * from showroom_img Where Showroom_PKey= :Showroom_PKey and Sort = \'1\' and Photo1 <> \'\'';
            $img_Array['Showroom_PKey'] = $Showroom_PKey;
            $rs2 = new recordset($sql, $img_Array);
            if(! $rs2->eof && is_file('../Upload/'.$rs2->field("Forder").'/'.$rs2->field("Photo1"))){
                $Photo1 = '../Upload/'.$rs2->field("Forder").'/'.$rs2->field("Photo1");
                $ext = strtolower(substr(strrchr($Photo1,"."),1));
                $webp_photo1 = str_ireplace($ext, 'webp',$Photo1);
            }
      ?>
            <li>
              <a href="showroom_detail<?php echo $Showroom_PKey;?>.htm" title="<?php echo $strName;?>">
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
                <div class="cars-info transi">
                  <p><?php echo $strName;?></p>
                  <span><?php echo $Subject;?></span>
                  <b><?php echo $intType;?></b>
                </div>
                <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
              </a>
            </li>
      <?php
            $rs1->movenext();
        }
      ?>
        <!--<li>
          <a href="showroom_detail.php" title="COROLLA CROSS">
            <figure><img src="../images/cars/toyota/COROLLACROSS.png" alt="COROLLACROSS" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>COROLLA CROSS</p>
              <span>NT$76.5~98.5萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="ALTISGRHYBRID">
            <figure><img src="../images/cars/toyota/ALTISGRHYBRID.png" alt="ALTISGRHYBRID" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>ALTIS GR SPORT HYBRID</p>
              <span>NT$87.5~87.5萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="ALTISGR">
            <figure><img src="../images/cars/toyota/ALTISGRHYBRID.png" alt="ALTISGR" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>ALTIS GR SPORT</p>
              <span>NT$82.8~82.8萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="SUPRA">
            <figure><img src="../images/cars/toyota/SUPRA.png" alt="SUPRA" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>SUPRA</p>
              <span>NT$203.0~248.0萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="HILUX">
            <figure><img src="../images/cars/toyota/HILUX.png" alt="HILUX" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>HILUX</p>
              <span>NT$145.0~145.0萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="CAMRY">
            <figure><img src="../images/cars/toyota/CAMRY.png" alt="CAMRY" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>CAMRY</p>
              <span>NT$92.9~139.9萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="COROLLA SPORT">
            <figure><img src="../images/cars/toyota/COROLLASPORT.png" alt="COROLLA SPORT" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>COROLLA SPORT</p>
              <span>NT$84.9~89.8萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="PRIUS PHV">
            <figure><img src="../images/cars/toyota/PRIUSPHV.png" alt="PRIUS PHV" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>PRIUS PHV</p>
              <span>NT$114.9~125.9萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="C-HR">
            <figure><img src="../images/cars/toyota/C-HR.png" alt="C-HR" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>C-HR</p>
              <span>NT$89.9~107.9萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="SIENTA">
            <figure><img src="../images/cars/toyota/SIENTA.png" alt="SIENTA" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>SIENTA</p>
              <span>NT$64.9~89.9萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="86">
            <figure><img src="../images/cars/toyota/86.png" alt="86" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>86</p>
              <span>NT$123~133萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="ALTIS">
            <figure><img src="../images/cars/toyota/ALTIS.png" alt="ALTIS" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>ALTIS</p>
              <span>NT$69.8~77.8萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="ALTIS">
            <figure><img src="../images/cars/toyota/ALTIS.png" alt="ALTIS" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>ALTIS HYBRID</p>
              <span>NT$81.8~89.8萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="PRIUS ALPHA">
            <figure><img src="../images/cars/toyota/PRIUSALPHA.png" alt="PRIUS ALPHA" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>PRIUS ALPHA</p>
              <span>NT$125~125萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="PRADO">
            <figure><img src="../images/cars/toyota/PRADO.png" alt="PRADO" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>PRADO</p>
              <span>NT$239~278萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="RAV4">
            <figure><img src="../images/cars/toyota/RAV4.png" alt="RAV4" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>RAV4</p>
              <span>NT$95.9~119.9萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="RAV4HYBIRD">
            <figure><img src="../images/cars/toyota/RAV4.png" alt="RAV4HYBIRD" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>RAV4HYBIRD</p>
              <span>NT$118.5~128.9萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="VIOS">
            <figure><img src="../images/cars/toyota/VIOS.png" alt="VIOS" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>VIOS</p>
              <span>NT$55.3~65.5萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="YARIS">
            <figure><img src="../images/cars/toyota/YARIS.png" alt="YARIS" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>YARIS</p>
              <span>NT$58.9~70.9萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="SIENNA">
            <figure><img src="../images/cars/toyota/SIENNA.png" alt="SIENNA" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>SIENNA</p>
              <span>NT$222.0~279.0萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li>
        <li>
          <a href="showroom_detail.php" title="ALPHARD">
            <figure><img src="../images/cars/toyota/ALPHARD.png" alt="ALPHARD" class="img-fluid transi"></figure>
            <div class="cars-info transi">
              <p>ALPHARD</p>
              <span>NT$284~284萬</span>
            </div>
            <span class="transi cars-more">了解更多<i class="bi bi-chevron-right"></i></span>
          </a>
        </li> -->
      </ul>
      
    </div>
  </section>


<?php require("_footer.php"); ?>
<?php require("_in_code_bottom.php"); ?>
</body>
</html>