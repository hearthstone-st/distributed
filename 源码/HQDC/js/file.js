$(function () {
	var bar = $('.bar');
	var percent = $('.percent');
	var showimg = $('#showimg');
	var progress = $(".progress");
	var files = $(".files");
	var btn = $(".btn span");
	$("#fileupload").wrap("<form id='myupload' action='action.php' method='post' enctype='multipart/form-data'></form>");
    $("#fileupload").change(function(){
		$("#myupload").ajaxSubmit({
			url: './action.php',
			dataType:  'json',
			beforeSend: function() {
        		showimg.empty();
				progress.show();
        		var percentVal = '0%';
        		bar.width(percentVal);
        		percent.html(percentVal);
				btn.html("上传中...");
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		var percentVal = percentComplete + '%';
        		bar.width(percentVal);
        		percent.html(percentVal);
    		},
			success: function(data) {
				files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.pic+"'>删除</span>");
				var img = data.pic;
				showimg.html("<img src='"+img+"'>");
				btn.html("添加附件");
			},
			error: function(xhr){
//		alert(xhr);
				btn.html("上传失败");
				bar.width('0')
				files.html(xhr.responseText);
			}
		});
	});
	
	$(".delimg").live('click',function(){
		var pic = $(this).attr("rel");
		$.post("action.php?act=delimg",{imagename:pic},function(msg){
			if(msg==1){
				files.html("删除成功.");
				showimg.empty();
				progress.hide();
//				$("form").replaceWith("<input id='fileupload' type='file' name='mypic'>");
				 window.location.reload();
			}else{
				alert(msg);
			}
		});
	});
});