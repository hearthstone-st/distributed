$(document).ready(function(){ 
	$("#table").hide();
	$("#search").click(function(){
		var searchContext = $("#searchContext").val();	
		$.ajax({
            url: "searchAccount_run.php",
            data: {data:searchContext},
            type:"POST",
            success : function(result){ 
            	result = JSON.parse(result);
            	
            	if(result.state == undefined) {
            		$('table tbody').empty();
            		$.each(result,function(name,value) {
            			var tr= $('<tr/>',{
            				id:value.id
            			});
            			console.log(value);
            			var username = $('<td/>',{
            				html:value.username
            			});
            			var name = $('<td/>',{
            				html:value.name
            			});
            			var joined = $('<td/>',{
            				html:value.joined
            			});
            			if(value.group == 'S') {
            				var group = $('<td/>',{
                				html:value.group + '(学生)'
                			});
            			}
            			else {
            				var group = $('<td/>',{
                				html:value.group + '(老师)'
                			});
            			}
//                		if(value.group == 'S'){
//                			tr += '<td>' + value.group +'（学生）</td>';
//                		}
//                		else{
//                			tr += '<td>' + value.group +'（老师）</td></tr>';
//                		}
                		var del = $('<td/>');
                		var a = $('<a/>',{
            			 	html:"删除",
            			 	href:"#?id=" + value.id
           			 	}).click(function(e) {
           			 		if(confirm("确认删除")){
           			 			e.preventDefault();
           			 			var urlParam = $(this).attr('href');
           			 			var id = urlParam.substring(urlParam.lastIndexOf('=')+1, urlParam.length);
           			 			$.ajax({
           			 				url: "./deleteAccount_run.php",
           			 				data: {
           			 					id : id
           			 				},
           			 				type:'POST',
           			 				dataType:'json',
           			 				success : function(data){ 
           			 					console.log(data);
           			 					var message = data.message;
//           			 					alert(message);
           			 					$('.main').showMessage(message,4000);
           			 					if(message == '删除成功') {
           			 						$('#'+id).remove();
           			 					}
           			 				},
           			 				error : function() {
//           			 					alert('无法开始删除');
           			 					$('.main').showMessage("无法开始删除",4000);
           			 				}
           			 			});
           			 		}
           			 	});
           			 //}
//                		tr += '<td>' + '<a href="#?id='+value.id+'onClick">删除</a></td>';
                		del.append(a);
                		tr.append(username,name,joined,group,del);
                		$('table tbody').append(tr);
                		
            		});
    
            	}
            	else {
//            		$('#table').replaceWith("没有结果");
//            		alert('没有结果');
            		$('.main').showMessage('没有结果',4000);
            		$('#table').show();
            	}
            	$("#table").show();
            },
            error : function() {
            	alert('搜索失败');
            	$('.main').showMessage('搜索失败',4000);
            }
       });	
	});
	
});	