function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function view_ans(num) {
	for(i=1;i<20;i++){
		if (document.getElementById("ans"+i)){
		document.getElementById("ans"+i).style.display = "none";}
	}
	$("#menuarea a").toggleClass("");
	document.getElementById("ans" + num).style.display = "block";
} 

function close_ans(num) {
	document.getElementById("ans" + num).style.display = "none";
}

function view_track(num) { 
	document.getElementById("div" + num).style.display = "block"; 
}

function close_track(num) {
	document.getElementById("div" + num).style.display = "none";
}

//批次變更狀態
$(function() {
    $("#chang").click(function(){
		var theForm = document.form1;
		var obj = document.getElementsByName("nid[]");
		var flag = false;
		for (var i = 0; i < obj.length; i++){
			if(obj[i].checked){
				flag = true;
				break;
			}	
		}
		
		if(flag){
			theForm.Send.value ="OK";
			theForm.submit();
		}else{
			alert("請選擇變動項目");
			return false;
		}			
	});
});

//E-Mail驗證
function isEmail(email){
	var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})+$/i;	
	if (reg.test(email)){
		return true;
	}else{
		return false;
	}
}

//檢查是否為日期格式
function isValidDate(dateString) {
  var regEx = /^\d{4}\/\d{2}\/\d{2}$/;
  return dateString.match(regEx) != null;
}

//日期相差
Date.prototype.dateDiff = function(interval,objDate){
	var dtEnd = new Date(objDate);
	if(isNaN(dtEnd)) return undefined;
	switch (interval) {
	case "s":return parseInt((dtEnd - this) / 1000);
	case "n":return parseInt((dtEnd - this) / 60000);
	case "h":return parseInt((dtEnd - this) / 3600000);
	case "d":return parseInt((dtEnd - this) / 86400000);
	case "w":return parseInt((dtEnd - this) / (86400000 * 7));
	case "m":return (dtEnd.getMonth()+1)+((dtEnd.getFullYear()-this.getFullYear())*12) - (this.getMonth()+1);
	case "y":return dtEnd.getFullYear() - this.getFullYear();
	}
}

//帶參數轉向用
function Update(strLink,PKey){
    document.form1.PKey.value=PKey;
    document.form1.action= strLink;
    document.form1.submit();
 }
 
function GotoPage(tPage,theForm){
	theForm.Page.value=tPage;
	theForm.Send.value ="搜尋";
	theForm.submit();
}

//檢查台式身份證
/*
英文代號 - X 
       A=10  台北市       J=18 新竹縣         S=26  高雄縣
       B=11  台中市       K=19 苗栗縣         T=27  屏東縣
       C=12  基隆市       L=20 台中縣         U=28  花蓮縣
       D=13  台南市       M=21 南投縣         V=29  台東縣
       E=14  高雄市       N=22 彰化縣         W=32  金門縣
       F=15  台北縣       O=35 新竹市         X=30  澎湖縣
       G=16  宜蘭縣       P=23 雲林縣         Y=31  陽明山
       H=17  桃園縣       Q=24 嘉義縣         Z=33  連江縣
       I=34  嘉義市       R=25 台南縣

性別 - D1
1 - 男性 
2 - 女性 

Y = X1 + 9*X2 + 8*D1 + 7*D2 + 6*D3 + 5*D4 + 4*D5 + 3*D6 + 2*D7+ 1*D8 + D9 
如 Y 能被 10 整除，則表示該身分證號碼為正確，否則為錯誤。 
*/
function checkID(PID){
	re = /^[ABCDEFGHJKLMNPQRSTUVXYWZIO]{1}[12]{1}\d{8}$/i;
	
	//開頭字母
	var pattens = new Array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	//轉換的對照數字
	var tables = new Array(10,11,12,13,14,15,16,17,34,18,19,20,21,22,35,23,24,25,26,27,28,29,32,30,31,33); 
	//form值
	var formStr = PID;
	//document.write("formStr= " + formStr + "<br>");
	
	//計算開頭字母的值: 十位數字 + 個位數字*9
	var firChar = formStr.substr(0,1);
	var firCharNum = 0;
	var firCharValue = 0;
	//document.write("firChar= " + firChar + "<br>");
	
	for (var i=0;i<=25;i++){
		if (pattens[i] == firChar){
			firCharNum = tables[i];
			break;
		}
	}
	//document.write("firCharNum= " + firCharNum + "<br>");
	
	firCharValue = parseInt(firCharNum.toString().substr(0,1)) + parseInt(firCharNum.toString().substr(1,2))*9;
	
	//document.write(parseInt(firCharNum.toString().substr(0,1)) + "<br>");
	//document.write(parseInt(firCharNum.toString().substr(1,2)) + "<br>");
	
	//document.write("firCharValue= " + firCharValue + "<br>");
	
	//計算性別的值
	var SexValue = parseInt(formStr.substr(1,1))*8;
	//document.write("SexValue= " + SexValue + "<br>");
	
	//計算後七碼的值
	var numCount = 0;
	for (var i=2;i<=8;i++){
		numCount += parseInt(formStr.substr(i,1))*(9-i);
		//document.write(formStr.substr(i,1) + " * " + (9-i) + " = " + (parseInt(formStr.substr(i,1))*(9-i)) + "<br>");
	}
	//document.write("numCount= " + numCount + "<br>");
	
	//計算檢查碼的值
	var lastChar = formStr.substr(formStr.length-1,1);
	//document.write("lastChar= " + lastChar + "<br>");
	var chkNum = 10 - ((firCharValue + SexValue + numCount)%10);
	if (chkNum == 10) chkNum = 0;
	//document.write("chkNum= " + chkNum + "<br>");
	
	//判斷是否正確
	var isTrue = "0";
	var totalValue = firCharValue + SexValue + numCount + parseInt(lastChar);
	//document.write("totalValue= " + totalValue + "<br>");
	if (parseInt(lastChar) == chkNum && totalValue%10 == 0) isTrue = "1";
	//document.write("isTrue= " + isTrue + "<br>");
	//document.write(typeof isTrue + "<br>");
	//document.write(re.test(formStr) + "<br>");
	//document.write(isTrue == 1 + "<br>");
	//document.write(isTrue == '1' + "<br>");

	if (re.test(formStr) && isTrue == "1" && formStr != "A123456789"){
		return true
	}else{
		return false
	}
	
}

//文字方塊轉換成大小寫
$(function(){
   $(".upper").keyup(function(evt){
	  var vOri=$(this).val();
	  var vNew=vOri.toUpperCase();
	  $(this).val(vNew);
   });

   $(".lower").keyup(function(evt){
	  var vOri=$(this).val();
	  var vNew=vOri.toLowerCase();
	  $(this).val(vNew);
   });
});
   
function input_strtoupper(inputObj,e)
{
	var keynum,keychar,numcheck ;
	if(window.event) // IE
	{
		keynum = e.keyCode
	}
	else if(e.which) // Netscape/Firefox/Opera
	{
		keynum = e.which
	}
	keychar = String.fromCharCode(keynum)
	//alert(keychar);
	var lowerk=keychar.toLowerCase();

	numcheck = /[a-z]/;
	if(numcheck.test(inputObj.value))
	{
		start=Math.abs(inputObj.value.indexOf(lowerk))+1; //算出字串位置
		//var End=inputObj.selectionEnd;

		inputObj.value=inputObj.value.toUpperCase();
		if(navigator.appName=='Microsoft Internet Explorer')
		{
			var r =inputObj.createTextRange();
			//alert(inputObj);
			r.moveStart("character",start); //IE要游標出現的字串位置
			r.collapse(true);
			r.select();
		}
		else
		{
			inputObj.selectionStart=start; //FF要游標出現的字串位置
				inputObj.selectionEnd=start;
		}
	}
	//alert(e.which);
} 
 
//檢查居留證
function chkLiveID(id,e)
{
	studIdNumber = id.toUpperCase();
	//驗證填入身分證字號長度及格式
	if(studIdNumber.length != 10){
		alert("長度不足");
		return false;
	}
	//格式，用正則表示式比對第一個字母是否為英文字母
	if(isNaN(studIdNumber.substr(2,8)) || 
			(!/^[A-Z]$/.test(studIdNumber.substr(0,1))) || 
				(!/^[A-Z]$/.test(studIdNumber.substr(1,1)))){
		alert("格式錯誤");
		return false;
	}
	
	var idHeader = "ABCDEFGHJKLMNPQRSTUVXYWZIO"; //按照轉換後權數的大小進行排序
	//這邊把身分證字號轉換成準備要對應的
	studIdNumber = (idHeader.indexOf(studIdNumber.substring(0,1))+10) + 
	'' + ((idHeader.indexOf(studIdNumber.substr(1,1))+10) % 10) + '' + studIdNumber.substr(2,8);
	//開始進行身分證數字的相乘與累加，依照順序乘上1987654321

	s = parseInt(studIdNumber.substr(0,1)) + 
	parseInt(studIdNumber.substr(1,1)) * 9 + 
	parseInt(studIdNumber.substr(2,1)) * 8 + 
	parseInt(studIdNumber.substr(3,1)) * 7 + 			
	parseInt(studIdNumber.substr(4,1)) * 6 + 
	parseInt(studIdNumber.substr(5,1)) * 5 + 
	parseInt(studIdNumber.substr(6,1)) * 4 + 
	parseInt(studIdNumber.substr(7,1)) * 3 + 
	parseInt(studIdNumber.substr(8,1)) * 2 + 
	parseInt(studIdNumber.substr(9,1));

	//檢查號碼 = 10 - 相乘後個位數相加總和之尾數。
	checkNum = parseInt(studIdNumber.substr(10,1));
	//模數 - 總和/模數(10)之餘數若等於第九碼的檢查碼，則驗證成功
	///若餘數為0，檢查碼就是0
	if((s % 10) == 0 || (10 - s % 10) == checkNum){
		return true;
	}
	else{
		return false;
	}
}

//檢查數字欄位格式
function chkNum(field) {
  var str = $("#"+field).val();
  var reg = /^[\d]+$/;
  console.log(str);
  if(! reg.test(str) && str != ''){
		alert("欄位值請輸入數字格式");
		$("#"+field).val(0);
		$("#"+field).focus();
		return false;
	}
}

//產生3位數的逗號分隔
function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

//列表滑動修改上下架
function chgUpload(num){
	var PKey = $("#PKey"+num).val();
	if($("#Upload"+num).attr("checked")){
		var Upload = 'No';
		var flag = false;
		
	}else{
		var Upload = 'Yes';
		var flag = true;		
	}
	$("#Upload"+num).attr("checked",flag);
	console.log("_upload.php?PKey="+PKey+"&Upload="+Upload);
	$.ajax({
	   type: "POST",
	   url: "_upload.php",
	   data: "PKey="+PKey+"&Upload="+Upload,
	   error: function(xhr, status, error) {
	   var err = JSON.parse(xhr.responseText);
	   console.log(err.Message);
	   },
		success: function(stxt){
		}
	});	
}

//中英混合的字串擷取
function chk_big5(str) {
	var array = [0,0];
	var flag = 0;
	var eng = 0;
	var zhtw = 0;
	var length = 0;
	for(var i = 0; i < str.length; i++) {
		if(str.charCodeAt(i) < 0x4E00 || str.charCodeAt(i) > 0x9FA5) {
			eng++;
		}else{
			zhtw++;
		}
	}
	
	if(eng > 0 && zhtw > 0){
		flag = 0; 
	}
	if(eng==0 && zhtw > 0){
		flag = 1; 
		length = zhtw;
	}
	if(eng > 0 && zhtw==0){
		flag = 2;
		length = eng; 
	}
	
	array[0] = flag;
	array[1] = length;
	return array;
}