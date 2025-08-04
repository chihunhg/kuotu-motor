$(function (){
 
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
			console.log(size);
			$("#img-upl-7").prop("checked", true);
            reader.readAsDataURL(input.files[0]);
        }
    }
		
    $("#Photo1").on("change",function (){
        preview(this,1);
    })
		
    $("#Photo2").on("change",function (){
        preview(this,2);
    })
		
    $("#Photo3").on("change",function (){
        preview(this,3);
    })
		
    $("#Photo4").on("change",function (){
        preview(this,4);
    })
		
    $("#Photo5").on("change",function (){
        preview(this,5);
    })
		
    $("#Photo6").on("change",function (){
        preview(this,6);
    })
		
    $("#Photo7").on("change",function (){
        preview(this,7);
    })
		
    $("#Photo8").on("change",function (){
        preview(this,8);
    })
		
    $("#Photo9").on("change",function (){
        preview(this,9);
    })
		
    $("#Photo10").on("change",function (){
        preview(this,10);
    })
    
})