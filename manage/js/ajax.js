//AJAX 送出查詢字串到指定檔案 以 option組合*****
function AjaxLoadClass2(PKey){
	removeOptions('Class2');
	if (document.getElementById('Class3'))
		removeOptions('Class3');
	if (document.getElementById('Product_PKey'))
		removeOptions('Product_PKey');	
	AjaxLoadSuccess('Class2',PKey)
}


//AJAX 送出查詢字串到指定檔案 以 option組合*****
function AjaxLoadClass3(PKey){
	removeOptions('Class3');
	AjaxLoadSuccess('Class3',PKey);
	if (document.getElementById('Product_PKey')){
		removeOptions('Product_PKey');
		AjaxLoadSuccess('Product_PKey',PKey)
	}
}

$(function(){
	//產生官網中類選單
	$('#Class1').change(function(){
		var PKey = $('#Class1').val();
		if ($('#Class2').length > 0 ) { 
		removeOptions('Class2');
		AjaxLoadSuccess('Class2',PKey);
		}		
		if ($('#Class3').length > 0 ) { 
		removeOptions('Class3');}		
	});	
		
	//產生官網小類選單
	$('#Class2').change(function(){
		var PKey = $('#Class2').val();
		console.log($('#Class2').val());
		if ($('#Class3').length > 0 ) {
		removeOptions('Class3');
		AjaxLoadSuccess('Class3',PKey);
		}
	});
		
	//產生官網小類選單
	$('#Class3').change(function(){
		var PKey = $('#Class3').val();
		if ($('#Class4').length > 0 ) {
		removeOptions('Class4');
		AjaxLoadSuccess('Class4',PKey);
		}
	});
});	
	
function AjaxLoadSuccess(selectbox,PKey){
	console.log('ajax/ajax.php?PKey='+ PKey + '&RType=' + selectbox);
	$(function(){
		$.ajax({
		   type: 'POST',
		   url: '../ajax/ajax.php',
		   data: 'PKey='+ PKey + '&RType=' + selectbox ,
		   success: function(json){
			    onComplete(selectbox,json);
			  }
		});
	});	
}

//完成後執行的函數
function onComplete(selectbox,val)
{
	var str = jQuery.parseJSON(val);
	if (str.data !== null){
		for(var i = 0; i < str.data.length; i++){
			let ID = encodeURIComponent(str.data[i].ID);
			let Name = encodeURIComponent(str.data[i].Name);
			$('#'+selectbox).append($('<option>', {
				value: ID,
				text: decodeURIComponent(Name)
			}));
		};
	}	
}


//移除指定的options
function removeOptions(selectbox)
{
	$('#'+selectbox+' option:not(:first)').remove();
/* 	console.log(selectbox);
	var length = $('#'+selectbox+' option').length;
	var i;
	console.log(length);
	console.log();
	for(i=length;i>0;i--)
	{
		//selectbox.options.remove(i);
		//document.getElementById(selectbox).remove(i);
		$('#'+selectbox+' option[index=\''+i+'\']').remove();
	} */
}