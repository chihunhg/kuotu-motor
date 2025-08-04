//動態產生規格TR
$(function(){		
	$("#Add").click(function(){
		var trTxt;
		var Total = parseInt($("#Total").val()) + 1;
		var Quantity = $("#Quantity").val();
		
		trTxt = '<tr id="tr_'+Total+'">';
		trTxt += '	<td><button type="button" class="fas fa-times btn btn-secondary" onclick="if(confirm(\'確定刪除嗎？\')){deltr('+Total+');};"></button><input name="PKey'+Total+'" type="hidden" id="PKey'+Total+'" value="0" /><input name="data'+Total+'" type="hidden" id="data'+Total+'" value="Y" /></td>';
		trTxt += '	<td><label class="dtmpicker"><input type="text" name="OpenDate_'+Total+'" id="OpenDate_'+Total+'" autocomplete="off" class="form-control2"></label></td>';
		trTxt += '	<td><label class="dtmpicker"><input type="text" name="EndDate_'+Total+'" id="OpenDate_'+Total+'" autocomplete="off" class="form-control2"></label></td>';
		trTxt += '	<td><input type="number" name="intQ_1" id="intQ_'+Total+'" value="'+Quantity+'" onchange="chkNum("intQ_'+Total+'")"></td>';
		trTxt += '	<td><input type="number" name="intH_1" id="intH_'+Total+'" value="0" onchange="chkNum("intH_'+Total+'")"></td>';
		trTxt += '</tr>';
		
		$("#time_tab").append(trTxt);
		$("#Total").val(Total) ;
	})
	
})

function deltr(index)
{
	Total = parseInt($("#Total").val());
	var PKey = $("#PKey"+index).val() ;
	console.log("_del_course.php?PKey="+ PKey);
	//刪除DB
	$.ajax({
		type: "POST",
		url: "_del_course.php",
		data: "PKey="+ PKey,
		success: function(){
		}
	});
	$("tr[id=\'tr_"+index+"\']").remove();
	$("#Total").val(Total);
}

function Product_Sorttr(index)
{
	var n = 0;
	for (i=1;i<=index;i++){
		if ($("#other_"+i).length > 0){
		n = n + 1 ;
		$("#other_"+i+" td:first").html(n);}
	}
}