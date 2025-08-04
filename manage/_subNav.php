<?php 
$Left_Menu = explode(",",$_SESSION["FunctionID"]);
?>
<div class="subNav open">
  <nav class="navbar">
    <div class="collapse navbar-collapse show" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <!-- <span>首頁管理</span> -->
        <?php 
		$sql = "Select * from module_p Where Upload='Yes' and PKey = 1 Order By Sort,PKey";
		$rs = new recordset($sql);
		while (! $rs->eof){
			$url_link = '../'.$rs->field("strLink").'/list.php?manNo='.$rs->field("PKey");
			if (in_array($rs->field("PKey"),$Left_Menu) || $_SESSION["Login_ID"] == "Admin"){
		?>
        <!-- <li class="nav-item <?php if($manNo==$rs->field("PKey")){echo 'active';}?>">
          <a class="nav-link" href="<?php echo $url_link?>"><?php echo $rs->field("strName")?></a>
        </li> -->
        <?php 
			}
		$rs->movenext();
		}
		?>
        <span>單元管理</span>
        <?php 
		$sql = "Select * from module_p Where Upload='Yes' and intType = 1 and intUse Not IN(1,17) Order By Sort,PKey";
		$rs = new recordset($sql);
		while (! $rs->eof){
			$n++;
			if (in_array($rs->field("PKey"),$Left_Menu) || $_SESSION["Login_ID"] == "Admin")
			{//主單元判斷
				$url_link = '../'.$rs->field("strLink").'/list.php?manNo='.$rs->field("PKey");
				//子單元判斷
				if ($rs->field("intLayer") > 0){
		?>
        <li class="nav-item dropdown <?php if($manNo==$rs->field("PKey")){echo 'active';}?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $rs->field("strName")?>
          </a>
          <div class="dropdown-menu <?php if($manNo==$rs->field("PKey")){echo 'show';}?>" aria-labelledby="navbarDropdown">
            <?php 
			$sql = 'Select * from module_d Where Module_PKey= :Module_PKey order by Sort';
			$rs1 = new recordset($sql,array($rs->field("PKey")));
			while (! $rs1->eof){
			?>
            <a class="dropdown-item <?php if($subNo==$rs1->field("PKey")){echo 'active';}?>" href="../<?php echo $rs1->field("strLink")?>/list.php?manNo=<?php echo $rs->field("PKey")?>&amp;subNo=<?php echo $rs1->field("PKey")?>"><?php echo $rs1->field("strName").$mgw1;?></a>
            <?php 
			$rs1->movenext();
			}
			?>
          </div>
        </li>
        <?php 
			}
			else
			{
		?>
        <li class="nav-item <?php if($manNo==$rs->field("PKey")){echo 'active';}?>">
          <a class="nav-link" href="<?php echo $url_link?>"><?php echo $rs->field("strName")?></a>
        </li>
        <?php 
				}
			}
		$rs->movenext();
		}
		?>
        <span>系統管理</span>
        <?php 
		if (in_array(3,$Left_Menu) || $_SESSION["Login_ID"] == "Admin"){
		?>
        <li class="nav-item <?php if($Module_PKey==3){echo 'active';}?>">
          <a class="nav-link" href="../control/list.php?manNo=3">權限管理</a>
        </li>
        <?php 
		}
		if ($_SESSION["Login_ID"] == "Admin"){
		?>
        <li class="nav-item <?php if($subitem=='s1'){echo 'active';}?>">
          <a class="nav-link" href="../control/webset.php"> SEO關鍵字</a>
        </li>
        <?php 
		}
		?>
        <li class="nav-item <?php if($subitem=="s5"){echo 'active';}?>">
          <a class="nav-link" href="../control/chgpw.php">變更密碼</a>
        </li>
      </ul>
    </div>
  </nav>
</div>
