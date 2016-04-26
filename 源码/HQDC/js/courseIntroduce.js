(function(){
	$active = $('.left .nav li.active');
	$show = $('.left .tab1');
	$('.left .nav a').click(function(e){
		e.preventDefault();
		$active.removeClass('active');
		$(this).parent().addClass("active");
		$active = $(this).parent();
		var str = "."+$(this).attr('class').substring(3);
		console.log(str);
		var obj = $(str);

		$show.hide();
		obj.show();
		$show = obj;
		
		
	});
})();