//檢查檔案格式
function format_float(num, pos)
{
	var size = Math.pow(10, pos);
	return Math.round(num * size) / size;
}

function preview(input,num) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();
		var imgtype = input.files[0].type;
		var name = input.files[0].name;
		var size = format_float(input.files[0].size / 1024, 2);
		reader.onload = function (e) {
			$('#preview'+num).show();
			$('#prefile'+num).show();
			switch(imgtype){
				case 'image/jpeg':
				case 'image/gif':
				case 'image/png':
					$('#preview'+num).attr('src', e.target.result);
					$('#prefile'+num).hide();
					break;
				case 'application/pdf':
					$('#prefile'+num).addClass("fas fa-file-pdf");
					$('#prefile'+num).text(name);
					$('#preview'+num).hide();
					break;
				case 'application/msword':
				case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
					$('#prefile'+num).addClass("fas fa-file-word");
					$('#prefile'+num).text(name);
					$('#preview'+num).hide();
					break;
				case 'application/vnd.ms-excel':
				case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
					$('#prefile'+num).addClass("fas fa-file-excel");
					$('#prefile'+num).text(name);
					$('#preview'+num).hide();
					break;
				case 'application/octet-stream':
				case 'application/zip':
					$('#prefile'+num).addClass("fas fa-file-archive");
					$('#prefile'+num).text(name);
					$('#preview'+num).hide();
					break;
				default:
					$('#prefile'+num).addClass("fas fa-file-alt");
					$('#prefile'+num).text(name);
					$('#preview'+num).hide();
			}
			
			var KB = format_float(e.total / 1024, 2);
		   // $('#size'+num).text("檔案大小：" + KB + " KB");
		}
		if($("#img-upl-7").length > 0){
			$("#img-upl-7").prop("checked", true);
		}
		if($("#isShow2").length > 0){
			$("#isShow2").prop("checked", true);
		}
		if($("#img-upl-bka3").length > 0){
			$("#img-upl-bka3").prop("checked", true);
		}
		if($("#intLink2").length > 0){
			$("#intLink2").prop("checked", true);
		}
		
		reader.readAsDataURL(input.files[0]);
	}
}
	
function checkFile(field,size,filetype) {
	var ImageTypeLimit="JPG,JPEG,GIF,PNG";
	var FileTypeLimit=".JPG.GIF.PNG.PDF.DOC.DOCX.PPT.XLS.XLSX.TXT.ZIP.RAR";
	var PdfTypeLimit = ".PDF";
	var CsvLimit=".CSV.TXT.XLS.XLSX";
	var ExcelLimit="XLS.XLSX";
	var file = $("#"+field).val();
	var ext = file.split(".");
	var name = file.split('\\').pop();
	//console.log(name);
	var txt = "";
	switch(filetype){
		case 'img':		
			if(ImageTypeLimit.toUpperCase().indexOf(ext[ext.length-1].toUpperCase())<0)
			{
				txt = "※ 圖檔格式只接受"+ImageTypeLimit+"，請重新選擇檔案。";
			}else{
				txt = chkSize(field,size,1);
			}
			break;
		case 'file':		
			if(FileTypeLimit.toUpperCase().indexOf(ext[ext.length-1].toUpperCase())<0)
			{
				txt = "※ 檔案上傳限制"+FileTypeLimit+"，請重新選擇檔案。";
			}else{
				txt = chkSize(field,size,2);
			}
			break;
		case 'pdf':		
			if(PdfTypeLimit.toUpperCase().indexOf(ext[ext.length-1].toUpperCase())<0)
			{
				txt = "※ 檔案上傳限制"+FileTypeLimit+"，請重新選擇檔案。";
			}else{
				txt = chkSize(field,size,2);
			}
			break;
		case 'csv':		
			if(CsvLimit.toUpperCase().indexOf(ext[ext.length-1].toUpperCase())<0)
			{
				txt = "※ 檔案上傳限制"+CsvLimit+"，請重新選擇檔案。";
			}else{
				txt = chkSize(field,size,2);
			}
			break;
		case 'excel':		
			if(ExcelLimit.toUpperCase().indexOf(ext[ext.length-1].toUpperCase())<0)
			{
				txt = "匯入檔案格式請使用.xml或.xlsx格式";
			}else{
				txt = chkSize(field,size,2);
			}
			break;
	}
	
	if (txt != ""){
		//alert(txt);
		$("#"+field+"_txt").text(txt);
		file = $("#"+field); 
		resetFileInput(file);
		$("#"+field).focus();
		return false;				
	}else{
		$("#"+field+"_txt").text('');
		var input = document.getElementById(field);
		var num = field.replace('Photo','');
		preview(input,num);
		return true;
	}
}

function resetFileInput(file){   
    file.after(file.clone().val(""));   
    file.remove();   
}  

//檢查檔案大小
function chkSize(field,size,type) {
	var msg = "";
	var fileSize = 0; //檔案大小
	var SizeLimit = 1024*size;  //上傳上限，單位:byte	
	var f = $("#"+field).get(0);//document.getElementById("Photo"+num);
	var msg = '';
	//FOR IE
	if ($.browser.msie) {
		var img = new Image();
		img.onload = checkSize;
		img.src = f.value;
	}
	//FOR Firefox,Chrome
	else {
		fileSize = f.files.item(0).size;
		//checkSize();
		//FOR IE FIX
		if ($.browser.msie) {
			fileSize = this.fileSize;
		}

		if (fileSize > SizeLimit) {
			msg = Message(parseInt(fileSize / 1024), parseInt(SizeLimit / 1024),type);
		}
	}
	return msg;
}

function Message(file, limit,type) {
	if(file > 999){
		file = GetRound(file/1000,2)+" MB";
	}else{
		file = file +" KB";
	}
	if(limit > 999){
		limit = GetRound(limit/1000,2)+" MB";
	}else{
		limit = limit +" KB";
	}
	var msg = "上傳圖片錯誤，圖片檔案大小請小於"+ limit;
	if(type==2){
	var msg = "上傳檔案錯誤，檔案大小請小於"+ limit;	
	}
	
	//alert(msg);
	return msg;
} 

//取得整數時，不保留小數位，如，2.999，保留2位小數，返回 3
//num：待四捨五入數值，len：保留小數位數
function GetRound(num, len) {
	return Math.round(num * Math.pow(10, len)) / Math.pow(10, len);
}

//刪除檔案
function del_file(PKey,num,imgtype){
	console.log("_del_img.php?PKey="+PKey,);
	$.ajax({
		type: "POST",
		url: "_del_img.php",
		data: "PKey="+PKey,
		success: function(str){
			console.log(str);
			if(str.indexOf('1|OK') > 0){				
				$('#delete'+num).hide();
				switch(imgtype){
					case 'img':
						$('#preview'+num).attr('src','');
						$('#prefile'+num).hide();
						break;
					case 'pdf':
						$('#prefile'+num).removeClass("fas fa-file-pdf");
						$('#prefile'+num).text('');
						$('#preview'+num).hide();
						break;
					case 'doc':
					case 'docx':
						$('#prefile'+num).removeClass("fas fa-file-word");
						$('#prefile'+num).text('');
						$('#preview'+num).hide();
						break;
					case 'xls':
					case 'xlsx':
						$('#prefile'+num).removeClass("fas fa-file-excel");
						$('#prefile'+num).text('');
						$('#preview'+num).hide();
						break;
					case 'rar':
					case 'zip':
						$('#prefile'+num).removeClass("fas fa-file-archive");
						$('#prefile'+num).text('');
						$('#preview'+num).hide();
						break;
					default:
						$('#prefile'+num).removeClass("fas fa-file-alt");
						$('#prefile'+num).text('');
						$('#preview'+num).hide();
				}
			}
		}
	});
}
