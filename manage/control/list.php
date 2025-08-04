<?php
require_once("../_inc.php");
require_once("../_module.php");

//刪除
if($_REQUEST["Action"] == "del"){
	$array_cond = array();
	for($i=0;$i<count($_POST["nid"]);$i++){
		array_push($array_cond,' :PKey'.$_POST["nid"][$i]);
	}

	$sql = 'Select * From webcontrol Where PKey IN ('.implode(",",$array_cond).')';
	$rs = new recordset($sql,$_POST["nid"]);
	while (! $rs->eof){
		$pdo = new dbPDO();
		$pdo->delete('webcontrol',' PKey= :PKey',array($rs->field("PKey")));
		$pdo->close();
	$rs->movenext();
	}// while End
	unset($array_cond);
	$rs->close();
	
	ECHO "<script language=\"javascript\">" ;
	ECHO "alert('成功刪除!');" ;
	ECHO "location.href='".$_SERVER["PHP_SELF"]."';" ;
	ECHO "</script>" ;
	exit() ;	
}
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
        <h1><?php echo $Module_Name?>管理</h1>
        <main>
          <form action="" method="post" name="form1" id="form1" onsubmit="document.form1.Page.value=1">
            <div class="m-btn-group">
              <div class="item"><?php require_once("../_select.php"); ?></div>
              <div class="item"><input type="button" name="button" id="button" class="btn btn-warning" value="新增資料" onclick="Update('add.php','')" /></div>
            </div>
            <!--m-btn-group-->
            <div class="table-container">
              <table width="100%" cellspacing="0" cellpadding="0" class="list">
                <thead>
                  <tr>
                    <td width="8%">&nbsp;</td>
                    <td width="8%">順序</td>
                    <td width="10%">管理者名稱</td>
                    <td width="10%">帳號</td>
                    <td>權限範圍</td>
                    <td width="10%">修改日期</td>
                    <td width="10%">編輯</td>
                  </tr>
                </thead>
                <?php
                $i = 0;
                $sql = 'Select * From webcontrol Where intType=0  Order By strID';
                $rs = new recordset($sql);
                if ($rs->eof){ echo "<tr bgcolor=\"#FFFFFF\"><td colspan=\"10\" align=\"center\" height=\"100\"><font color=\"red\">暫無資料。</font></td></tr>";}
                while (! $rs->eof){
                  $i++;
                ?>
                <tr>
                  <td><input type="checkbox" name="nid[]" value="<?php echo  $rs->field("PKey")?>" <?php echo $chk?> /></td>
                  <td><?php echo AddZero($i)?></td>
                  <td><?php echo  $rs->field("strName")?></td>
                  <td><?php echo $rs->field("strID")?></td>
                  <td class="left"><?php echo $rs->field("FunctionName")?>&nbsp;</td>
                  <td><?php echo Date_EN($rs->field("dtUDate"),1)?></td>
                  <td><button name="boton" type="button" id="boton" onclick="Update('update.php','<?php echo authcode($rs->field("PKey"),'ENCODE')?>')">編輯</button>
                  </td>
                </tr>
                <?php
                $rs->movenext();
                }
                ?>
              </table>
            </div>
            <input type="hidden" name="PKey" id="PKey" />
            <input type="hidden" name="Total" id="Total" value="<?php echo $i?>" />
            <input name="manNo" type="hidden" id="manNo" value="<?php echo $manNo?>" />
            <input name="subNo" type="hidden" id="subNo" value="<?php echo $subNo?>" />
          </form>
          <div class="notes">
            <p>備註</p>
            <ul>
              <li>權限管理功能可新增多組管理者帳號及設定其權限範圍。</li>
            </ul>
          </div>
        </main>
      </div>
    </div>
  </div>
  <?php require_once("../_in_code_bottom.php"); ?>
</body>

</html>
