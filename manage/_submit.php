<div class="btnWrap center">
  <button type="button" onclick="javascript:history.back();">關閉</button>
  <button type="submit" name="Submit" id="Submit" value="送出" class="full">送出</button>
  <?php if (! stristr($_SERVER["PHP_SELF"],"add.php")) {?>
  <input name="PKey" type="hidden" id="PKey" value="<?php echo $_REQUEST['PKey']?>" />
  <?php } ?>
  <input name="Page" type="hidden" id="Page" value="<?php echo $_REQUEST['Page']?>" />
  <input name="manNo" type="hidden" id="manNo" value="<?php echo $manNo?>" />
  <input name="subNo" type="hidden" id="subNo" value="<?php echo $subNo?>" />
  <input type="hidden" name="Send" id="Send" />
  <input type="hidden" name="Q_OpenDate" id="Q_OpenDate" value="<?php echo $_REQUEST["OpenDate"]?>" />
  <input type="hidden" name="Q_EndDate" id="Q_EndDate" value="<?php echo $_REQUEST["EndDate"]?>" />
  <input type="hidden" name="Q_Upload" id="Q_Upload" value="<?php echo $_REQUEST["Upload"]?>" />
  <input type="hidden" name="Q_intLocal" id="Q_intLocal" value="<?php echo $_REQUEST["intLocal"]?>" />
  <input type="hidden" name="Q_Keywords" id="Q_Keywords" value="<?php echo $_REQUEST["Keywords"]?>" />
  <input type="hidden" name="Q_Class1" id="Q_Class1" value="<?php echo $_REQUEST["Class1"]?>" />
  <input type="hidden" name="Q_Class2" id="Q_Class2" value="<?php echo $_REQUEST["Class2"]?>" />
  <input type="hidden" name="Q_Class3" id="Q_Class3" value="<?php echo $_REQUEST["Class3"]?>" />
  <input type="hidden" name="Q_intState" id="Q_intState" value="<?php echo $_REQUEST["intState"]?>" />
  <input type="hidden" name="Q_intPay" id="Q_intPay" value="<?php echo $_REQUEST["intPay"]?>" />
  <input type="hidden" name="Q_intType" id="Q_intType" value="<?php echo $_REQUEST["intType"]?>" />
  <input type="hidden" name="Q_intUse" id="Q_intUse" value="<?php echo $_REQUEST["intUse"]?>" />
</div>
