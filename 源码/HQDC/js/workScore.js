(function(){


	var scoreArray = [],
		table = $('table.score tbody tr');
		$('.save').click(function(){
			table.each(function(){
				var data = {
					"id": $(this).find(".number").attr("submitId"),
					'score' :$(this).find(".score input").val()
				}

				scoreArray.push(data);
			});
		//console.log(scoreArray);
		$.showProgress("20%",'info');
		$.ajax({
	             type: "POST",
	             url: "score_run.php",
	             data: {data:eval(scoreArray)},
	             // dataType: "json",
	             success: function(data){
	                         console.log(data);
	                         $.updateProgress("100%");
	                         $.hideProgress();
	                      }
	         	});	
		});
		
})();