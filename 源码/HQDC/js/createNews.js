$(document).ready(function(){ 
	var editor = new Simditor({
		  textarea: $('#editor_news'),
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
	$("#type").change(function() {
		editor.setValue("");
	});
	$("#button_news").click(function() {
		var type = $('#type').val();
		var title = $('#title').val();
		var context = editor.getValue();
		if(title == "") {
			alert("请输入标题!");
		}
		else {
			if(context == "") {
				if(confirm("您并没有输入内容，确认继续提交？")) {
					submitNews(type, title, context);
				}
			}
			else {
				submitNews(type, title, context);
			}
		}
	});
});

function submitNews(type, title, context) {
	$.ajax({
		url: "createNews_run.php",
		data: {
			type: type,
			title: title,
			context: context
		},
		type : "POST",
		
		success : function(result) {
			
			console.log(result);
			result = JSON.parse(result);
			var message = result.message;
			if(result.state == 'success') {
				$('.main').showMessage(message,4000);
			}
			else {
				$('.main').showMessage(message,4000);
			}
		}
	});
	return;
}