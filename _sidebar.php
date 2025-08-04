            <div class="sidebar">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidenav" aria-expanded="false" aria-controls="sidenav">
                  <i class="fa fa-list"></i> 次選單<i class="fa fa-caret-down"></i>
                </button>
                
                <div id="sidenav" class="collapse in">
                    <ul class="nav navbar">
                    <?php if ($pageName == "p1") { ?>
                        <li class="active"><a href="p1_about.php"><?php echo $p1_1;?></a></li>
                        <li><a href="#"><?php echo $p1_2;?></a></li>
                        
                    <?php } else if ($pageName == "p2") { ?>
                        <li<?php if ($subPageName == "p2_1") { ?> class="active"<?php } ?>><a href="showroom_toyota.php" title="<?php echo $p2_1;?>"><?php echo $p2_1;?></a></li>
                        <li<?php if ($subPageName == "p2_2") { ?> class="active"<?php } ?>><a href="showroom_lexus.php" title="<?php echo $p2_2;?>"><?php echo $p2_2;?></a></li>
                        
                    <?php } else if ($pageName == "p3") { ?>
                        <li<?php if ($subPageName == "p3_1") { ?> class="active"<?php } ?>><a href="p3_product.php" title="<?php echo $p3_1;?>"><?php echo $p3_1;?></a></li>
                        <li<?php if ($subPageName == "p3_2") { ?> class="active"<?php } ?>><a href="p3_product.php" title="<?php echo $p3_2;?>"><?php echo $p3_2;?></a></li>
                        
                    <?php } else if ($pageName == "p4") { ?>
                        <li<?php if ($subPageName == "p4_1") { ?> class="active"<?php } ?>><a href="p4_product.php" title="<?php echo $p4_1;?>"><?php echo $p4_1;?></a></li>
                        <li<?php if ($subPageName == "p4_2") { ?> class="active"<?php } ?>><a href="p4_product.php" title="<?php echo $p4_2;?>"><?php echo $p4_2;?></a></li>
                        
                    <?php } ?>
                    </ul>
                </div>
                
            </div>
            <!--/.sidebar-->
            
