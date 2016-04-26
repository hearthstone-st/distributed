
(function(){
	var logAjax = function(){
		var admin_password = $("#admin_password").val();
		$.ajax({
			url: "adminLogin_run.php",
			data: {
				admin_password:admin_password
			},
			type : "POST",
			
			success : function(result) {
				console.log(result);
//				result = JSON.parse(result);
				result = eval("(" + result + ")");
				var message = result.message;
				if(result.state == 'success') {
					logIn();
					$('.main').showMessage(message,4000);
				}
				else {
					$('.main').showMessage(message,4000);
				}
			}
		});
	};
	$('#admin_login').click(function() {
//		alert("hello wordl");
		logAjax();
	});
	$('#admin_password').keydown(function(e){
	if(e.which==13){
		e.preventDefault();
		logAjax();
	}

	});
	var left = $('.left'),
			button = $('.login-button'),
			nav = $('nav'), 
			navLeft = $('.nav-box'),
			portrait = $('.login-img'),
			login = $('#login'),
			right = $('.right');
	logIn = function(){
		
		left.addClass('logged');
		
		login.fadeOut().promise().done(function(){
			navLeft.fadeIn();
			nav.fadeIn();
			//left.addClass('bg');
		});
		
		portrait.addClass("logged");
		
		right.addClass("logged");
	}
	logOut = function(){
		
		left.removeClass('logged');
		navLeft.fadeOut().promise().done(function(){
			login.fadeIn();
			nav.fadeOut();
			left.removeClass("bg");
		});
		
		portrait.removeClass("logged");
		
		right.removeClass("logged");
	}
	//logIn();
//	button.click(function(e){
//		e.preventDefault();
//		logIn();
//
//
//
//	});
	portrait.click(function(){
		logOut();
	});
	//滑动控制
	$('.left .nav-box a').click(function(e){
		e.preventDefault();
		
		var str = "."+$(this).attr('class').substring(3);
		console.log(str);
		var obj = $(str);
		var top = obj.offset().top-100;
		console.log(top);
		$('html,body').animate({scrollTop:top});
	});
	// $('.left .nav-box .to-account').click(function(e){
	// 	e.preventDefault();

	// 	$('html,body').animate({scrollTop:$('.right .account').offset().top-100});
	// });


})();