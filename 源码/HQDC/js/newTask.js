$(document).ready(function(){
	function checkEndTime(startTime){  
	    var end=new Date(startTime.replace("-", "/").replace("-", "/"));  
	    var start=new Date();  
	    if(end>start){  
	        return false;
	    }  
	    return true;
	};
	function checkFrom(){
		if($("#title").val()=='')
		{
			$("#title").focus();
		}
		else if(checkEndTime($("#endtime").val())){
			$("#endtime").focus();
		}
		else if($("#context").val()=='')
		{
			$("#context").focus();
		}
		else $("#submit").removeAttr("disabled");
	}
	// $("#title").blur(function(){

	// if ($(this).val()=='') {
	// 		$(".main").showMessage("标题不能为空",3000);
	// 		$("#submit").attr("disabled",true);
	// 	};
	// });
	// $("#endtime").blur(function(){
	// 	if (checkEndTime($(this).val())) {
	// 		$(".main").showMessage("截止时间有误",3000);
	// 		$("#submit").attr("disabled",true);
	// 	};
	// });
	// $("#context").blur(function(){
	// 	if ($("#context").val()=='') {
	// 		$(".main").showMessage("内容不能为空",3000);
	// 		$("#submit").attr("disabled",true);
	// 	};
	// });
	$('form :input').keydown(function(){
		if($("#title").val()!=''&&!checkEndTime($("#endtime").val())&&
			$("#context").val()!='')
		{
			$("#submit").removeAttr("disabled");
		}
	});
	// $(".fileDel").click(function(){
	// //  $.post("filedel.php",
	// //    {
	// //      'fileId':mark,
	// //      'token':$("[name$='token']").val()
	// //    },
	// //    function(data,status){
	// //        if(status=='success'){
	// //           window.location.href="taskdetail.php?taskmark="+$("#id").val()+"&edit=true";
	// //        }
	// //        else $('.main').showMessage('删除失败！',4000);
	// //    });
	// });
	jQuery(function(){   
		function ajaxFileUp(){
		    $.ajaxFileUpload({
		        url:'createfile_run.php',
		        secureuri :false,
		        fileElementId :'inputFile',
		        dataType : 'json',
		        success : function (data, status){
		            if(typeof(data.error) != 'undefined'){
		                if(data.error != ''){
		                    $('main').showMessage('删除失败！',3000);
		                }else{
		                    var rs=data.msg;
		                    $(".main").showMessage("添加附件",3000);
		                    $(".filelist").append("<span><a href='"+data.url+"' target='_black'>"+rs+"</a><span class='fileDel' id='"+data.url+"'>[删除]</span><br /></span>").append("<input type='hidden' name='uploadfile[]' value='"+rs+"'>");
		                }
		            }
		            $("#inputFile").change('change', function(){
		              ajaxFileUp();
		            });
		        },
		        error: function(data, status, e){
		            $('main').showMessage('删除失败！',3000);
		            $("#inputFile").change('change', function(){
		              ajaxFileUp();
		            });
		        }
			})
		}
		$("#inputFile").change('change', function(){
		  ajaxFileUp();
		});
		$(".filelist").on("click",".fileDel",function(){
			var filepath=$(this).attr('id');
			$.post("delfile_ajax.php",
			  {
			    'filepath':filepath
			  },
			  function(data,status){
			      if(status=='success'){
			      	$(".main").showMessage("已删除",3000);
			      	$("span[id = '"+ filepath +"']").parent().remove();
			      }
			      else 
			         {
			         $('main').showMessage('删除失败！',3000);
			         }
			  });
		});
	});
})