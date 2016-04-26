(function(){

	$('.importance').change(function(){
		if(!jQuery.isNumeric($(this).val())||$(this).val()<=0||$(this).val()>10){
			$('.main').showMessage('请输入0~10之间的数字',3000);
			$(this).val(5);
		}
		if($(this).val()==10){
			$num = 9.5;
		}else if($(this).val()<=1){
			$num = 0.5;
		}
		else{
			$num = $(this).val();
		}
		var percent = $num*10+'%'+'!important',
			percent1 = (100-$num*10)+'%'+'!important';
		//alert(percent);	
		$(this).parent().find('.task-name').css("cssText","width: "+percent); 
		$(this).css("cssText","width: "+percent1); 
		
	});
	var changeImportance = function(e){
		$('.importance').each(function(i){
			var imp;
			if(e[i]==0){
				imp=0.5;
			}else{
				imp = e[i];
			}
			var percent = imp*10+'%'+'!important',
			percent1 = (100-imp*10)+'%'+'!important';
			$(this).parent().find('.task-name').css("cssText","width: "+percent); 
			$(this).css("cssText","width: "+percent1); 
			$(this).val(e[i]);
		});	
	}

	var importanceArr = [];
	$('.importance').each(function(i){
		
		
		importanceArr.push($(this).val());
		}
	)
	
	changeImportance(importanceArr);
	$('#change-importance').click(function(){
		var taskArr = [];

		$('.importance').each(function(){
			var task = {'id':$(this).attr('ref'),'importance':$(this).val()};
			taskArr.push(task);

		});
		$.ajax({
			url: 'changeTaskImportance.php',
			type: "POST",
			data: {data:taskArr},
			success: function(data){
				if(data == 'noLogin'){
					
					$(".main").showMessage("请先登录",4000);
				}else if(data == "success"){
					
					//alert("您已成功发帖");
					
					$(".main").showMessage("修改成功",4000);
					//window.location.reload();
				}else if($data="noRight"){
					$(".main").showMessage("请以教师身份登录",4000);
				}else if($data="later"){
					$(".main").showMessage("更新失败，请稍后再试",4000);
				}
				console.log(data);
				//location='forum.php';

			}
		});
	});
})();