<span class="span-group"><?php echo $Class_Name[1]?>：
<select name="Class1" id="Class1" class="m-select">
  <option value="">全部顯示</option>
  <?php
	$sql = 'Select PKey, strName From dbclass1 Where Module_PKey= :Module_PKey Order By Sort ';
	$rs1 = new recordset($sql,array(SqlFilter($Module_PKey,'int')));
	while(! $rs1->eof){
	?>
  <option value="<?php echo $rs1->field("PKey")?>"  <?php if(strval($Class1)==strval($rs1->field("PKey"))) {echo "selected=\"selected\"";}?>><?php echo $rs1->field("strName")?></option>
  <?php
	$rs1->movenext();
	}
	?>
</select>
</span>
<span class="span-group"> <?php echo $Class_Name[2]?>：
<select name="Class2" id="Class2" class="m-select">
  <option value="">全部顯示</option>
  <?php
	$sql = 'Select PKey, strName From dbclass2 Where Class1_PKey= :Class1_PKey Order By Sort';
	$rs1 = new recordset($sql,array(SqlFilter($Class1,'int')));
	while(! $rs1->eof){
	?>
  <option value="<?php echo $rs1->field("PKey")?>"  <?php if(strval($Class2)==strval($rs1->field("PKey"))) {echo "selected=\"selected\"";}?>><?php echo $rs1->field("strName")?></option>
  <?php
	$rs1->movenext();
	}
	?>
</select>
</span>
