$(document).ready(function(){ 
	$('#defined_password').hide();
//	alert("hello");
	$('#fromhand').click(function() {	
		var username = $('#username').val();
		var name= $('#name').val();
		var password = $('#password').val();
		var password_confirm = $('#password_confirm').val();
		var group = $('#group').val();
		var sex = $('#sex').val();

		if(username == '' || password == '') {
			$('.main').showMessage("用户名和密码不能为空",4000);
		}
		else {
			if(password == password_confirm) {
				$.showProgress("20%",'info');
				$.ajax({
					url: "createAccount_run.php",
					data: {
						type:'fromhand',
						username:username,
						name:name,
						password:password,
						sex:sex,
						group:group
					},
					type : "POST",
					
					success : function(result) {
						$.updateProgress("100%");
	                    $.hideProgress();
//						result = JSON.parse(result);
						result = eval("(" + result + ")");
//						console.log(result);
//						console.log(result.context);
						if(result.state == 'failed') {
//							alert("hello");
							$('.main').showMessage(result.context,4000);
							if(result.stateNum == '102') {
								$('#username').val("");
							}
							if(result.stateNum == '103') {
//								location.reload();
								$('#username').val("");
								$('#password').val("");
								$('#password_confirm').val("");
							}
						}
						else {
							
							$('.main').showMessage(result.context,4000);
//							location.reload(); 
							$('#username').val("");
							$('#password').val("");
							$('#password_confirm').val("");
						}
					}
				});
			}
			else {
				$('.main').showMessage("确认密码不匹配",4000);
				$('#password').val("");
				$('#password_confirm').val("");
			}
		}
	});

	$("#exportExcelModel").click(function() {
//		$.ajax({
//			url: "createAccount_run.php",
//			data: {
//				type:'exportExcelModel',
//			},
//			type : "POST",
//			
//			success : function(result) {
//				console.log(result);
//			}
//		});
		window.location.href="./createAccount_run.php? type=exportExcelModel"; 
	}); 
	$(":radio").click(function() {
		if($("#radio_password:checked").val() == 'user_defined') {
			$('#defined_password').show();
		}
		if($("#radio_password:checked").val() == 'default_password') {
			$('#defined_password').hide();
		}
	});

	$('#fromExcel').click(function() {
		var file = $("#file_stu");
        if($.trim(file.val())==''){
               $('.main').showMessage("请先选择文件",4000);
               return false;
        }
        else {
        	var formData = new FormData($("#form")[0]);
        	var passwordType = $("#radio_password:checked").val();
        	formData.append('type','fromExcel');
        	formData.append('passwordType',passwordType);
        	if(passwordType == 'user_defined') {
        		formData.append('defined_password',$("#defined_password").val());
        	}
        	$.showProgress("20%",'info');
        	 $.ajax({
                 url: './createAccount_run.php' ,
                 type: 'POST',
                 data: formData,
                 async: false,
                 cache: false,
                 contentType: false,
                 processData: false,
                 success: function (result) {
                	 console.log(result);
                	 result = eval("(" + result + ")");
                	 console.log(result);
                	 console.log(result.state);
                	 $.updateProgress("100%");
	                 $.hideProgress();
                	 if(result.state == 'success') {
                		 // $("#message").append("<p>导入成功"+result['successNum']+"条。</p>");
                		 // $("#message").append("<p>导入失败"+result['failedNum']+"条.</p>");
                		 // if(result.failedNum != 0) {
                			//  $.each(result.message, function(name,value) {
                			// 	 $("#message").append("<p>" + name + " " +value + "</p>");
                			//  });
                		 // }
                		 $('.main').showMessage('导入成功',4000);
                	 }
                	 else if(result.state == 'failed') {
                		 $('.main').showMessage(result.message,4000);
                	 }
                 },
                 error: function (result) {
                     $('.main').showMessage(result,4000);
                 }
            });
        }
        
	});
});

