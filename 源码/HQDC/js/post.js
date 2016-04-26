(function(){

	var editor = new Simditor({
		  textarea: $('#editor'),
		  placeholder: '',
		  defaultImage: 'images/image.png',
		  params: {},
		  upload: false,
		  tabIndent: true,
		  toolbar: true,
		  toolbarFloat: true,
		  toolbarFloatOffset: 0,
		  toolbarHidden: false,
		  pasteImage: false,
		  cleanPaste: false
		});

	var isShow = false;
	$('a.show').click(function(e){
		e.preventDefault();
		$(this).parent().parent().find('img').toggleClass('show');
		if(!isShow){
			$(this).html('收起图片');
		}else{
			$(this).html('展开图片');
		}
		isShow = true;
	});


	var receiver = '';
	$(".new-event").click(function(){

				$('#modal').modal();
				receiver = $(this).attr('ref');
				//alert(receiver);

			});
	var file = $('#fileUpload');
	var showimg = $('.img-box');
	var files = $(".files");

	file.wrap("<form id='myupload' action='action.php' method='post' enctype='multipart/form-data'></form>");
    file.change(function(){
		$("#myupload").ajaxSubmit({
			url: './action.php',
			dataType:  'json',
			beforeSend: function() {
        		
				
        		var percentVal = '0%';
        	
        		$.showProgress();
				
    		},
    		uploadProgress: function(event, position, total, percentComplete) {
        		var percentVal = percentComplete + '%';
        	
        		$.updateProgress(percentVal);
    		},
			success: function(data) {
				
				//files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.pic+"'>删除</span>");
				//console.log(data);
				var img = $('<img/>',{
					src : data.pic_path,
					ref : data.pic
					});

				showimg.append(img);
				$.hideProgress();
				
			},
			error: function(xhr){
//		alert(xhr);
				
				//bar.width('0')
				//files.html(xhr.responseText);
			}
		});
	});
	$("#reply").click(function(e){
		e.preventDefault();
		var context = editor.getValue(),
			imgs = [];
		$('.img-box img').each(function(){
			var src = $(this).attr('ref');
			imgs.push(src);
		});

		var data = {
			postId : postId,
			receiver : receiver,
			context : context,
			imgs : imgs

		};
		$.ajax({
			url: 'reply_run.php',
			type: "POST",
			data: {data:data},
			success: function(data){
				if(data == 'noLogin'){
					
					$(".main").showMessage("请先登录",4000);
				}else if(data == 'empty'){
					
					$(".main").showMessage("不能为空",4000);
				}else if(data == "success"){
					//alert("您已成功发帖");
					//$(".main").showMessage("您已成功回帖",4000);
					window.location.reload();
				}
				console.log(data);
				//location='forum.php';

			}
		});

	});

})();