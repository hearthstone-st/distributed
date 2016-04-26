$(document).ready(function(){ 
	var editor = new Simditor({
		  textarea: $('#editor_course'),
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
	$("#course_info").change(function() {
		editor.setValue("");
	});
	$("#button_course").click(function() {
		var choose = $('#course_info').val();
		var context = editor.getValue();
		if(context == "") {
			if(confirm("您并没有输入内容，确认继续提交？")) {
				submitCourse(choose, context);
			}
		}
		else {
			submitCourse(choose, context);
		}
		
	});
});

function submitCourse(choose, context) {
	$.ajax({
		url: "courseInfo_run.php",
		data: {
			choose: choose,
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
}