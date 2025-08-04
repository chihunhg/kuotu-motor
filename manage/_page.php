<div class="m-pagination">
<?php
	if( $Total > 0) {//分頁開始
		//產生分頁連結文字
		$PageTxt = "";
		$PageTxt .= "<a href=\"javascript:GotoPage(1,document.form1);\" class=\"first\">第一頁</a>";
		if ($tPage > 10){$PageTxt .= "<a href=\"javascript:GotoPage(".($tPage-10).",document.form1);\" class=\"prev\"><上十頁</a>";}
		//--------先算是哪一區間
		$AreaNo = (int)(($tPage-1)/10);
		$sPage = 1+ (10 * $AreaNo);
		$ePage = 10 + (10 * $AreaNo);
		for($Li=$sPage;$Li<=$ePage;$Li++){
			if($Li > $tPageTotal) break;
			if ($tPage == $Li){
				$PageTxt .= "<a href=\"javascript:;\" class=\"active\">".AddZero($Li)."</a>";
			}
			else{
				$PageTxt .= "<a href=\"javascript:GotoPage(".$Li.",document.form1);\">".Addzero($Li)."</a>";
			}
		}
		//if ($tPage + 1 <= $tPageTotal){$PageTxt .= "<a href=\"javascript:GotoPage(".$tPage+1.",document.form1);\">下一頁</a>&gt;";}
		if ($tPage+10 <= $tPageTotal){$PageTxt .= "<a href=\"javascript:GotoPage(".($tPage+10).",document.form1);\"  class=\"next\">下十頁&#187;</a>&nbsp;";}
		$PageTxt .= "<a href=\"javascript:GotoPage($tPageTotal,document.form1);\" class=\"last\">最末頁</a>";
		$PageTxt .= "<span>".$tPage."/".$tPageTotal."&nbsp;&nbsp;共".$Total."筆</span>";
		echo $PageTxt;
	} //分頁判斷End
?>
<input name="Page" type="hidden" id="Page" value="<?php echo $tPage ?>" />
<input name="Send" type="hidden" id="Send" value="" />
<input name="SortCond" id="SortCond" type="hidden" value="<?php echo $_REQUEST["SortCond"]?>" />
</div>
