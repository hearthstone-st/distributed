(function(){
	$('.infobox .navbar a').click(function(){
		var div = $(this).attr('rel');
		$(".centerbox").hide();
		$(div).show();

		});
	$('.message p').click(function(){
		$(this).toggleClass('max-height');
	});
	$('.fa-reply').click(function(){
		var reply = $(this).parent().parent().parent().next('.reply-li');

		reply.fadeIn();
		reply.find('.input-reply').focus();
	});
	$('.input-reply').blur(function(){
		$(this).parent().parent().fadeOut();
	});
	$(".input-reply").keydown(function(event){
		var reply_li = $(this).parent().parent();
		
		 if(event.keyCode ==13){
		 	
		 	var content = $(this).val();
		 	if(content!=''){
			 // 	var cube1 = $('<div />',{
				// 	class: 'cube1'
				// });
			 // 	var cube2 = $('<div />',{
				// 	class: 'cube2'
				// });			
			 // 	var spinner = $('<div />',{
				// 	class: 'spinner small'
				// }).prepend(cube1,cube2);
			
			 var spinner = $('<div/>',{
			 	class:'sk-spinner sk-spinner-rotating-plane'
			 });
			 	reply_li.before(spinner);
			 	reply_li.fadeOut();
			   var input_reply = $(this);
			   $.ajax({
	             type: "POST",
	             url: "test.php",
	             data: {content:content},
	             // dataType: "json",
	             success: function(data){
	                         input_reply.val('');
	                        
	                         spinner.remove();
	                         alert(data);
	                        
	                      }
	         	});		 		
		 	}

		}
	})


	$('.to-left').click(function(){
		var left = parseInt($('.scroll-img').css('margin-left'))-310;

		if(left>-2500){
			left=left+'px';
			$('.scroll-img').css({'margin-left':left});
		}
	});
	$('.to-right').click(function(){
			$('.scroll-img').css({'margin-left':0});
		
	});
	$('.head-chooce').click(function(e){
		e.preventDefault();
		$('.head-choices').css({left:0});
		$('.head-choices img').animate({'margin-left':'20px'}).promise().done(function(){
		// $('.scroll-img').toggleClass('blur');	
		});
		
	});
	$('.head-close').click(function(e){

		$('.scroll-img').css({'margin-left':0});	
		$('.head-choices img').css({'margin-left':'-70px'});
		$('.head-choices').animate({left:'100%'});
	});
	$('.scroll-img img').click(function(){
		console.log($(this));
		var url = $(this).attr('src');
		var imgUrl = url.substring(url.lastIndexOf('/')+1);
		$('#portrait').val(imgUrl);
		$('.scroll-img').css({'margin-left':0});	
		$('.head-choices img').css({'margin-left':'-70px'});
		$('.head-choices').css({left:'100%'});
		$('#head').attr('src',url);

		
	});
})();