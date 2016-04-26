<?php
include "includes/header.php";

// $taskSubmit = new TaskSubmit();
// $user = new User();
// $taskS = $taskSubmit->findWithUserAndTask($user->data()->id,'1');
// var_dump($taskS);

// $task = new DBTask();
// $date = 1448060300;
// $date1 = 1448060500;
// $taskArray = $task->findWithDateBetween($date,$date1);
// var_dump($taskArray);

// $message = new Message();
// $m1 = $message->getMessage();
// var_dump($m1);


?>
<style type="text/css">
  nav{
    display: none;
  }
  .ani{
  	width: 300px;
  	height: 300px;
  	border: 1px solid #ccc;
  	border-radius: 20px;
  	margin: 20px;
  	position: absolute;
  	top:100px;
  	left:0px;

  }
  .animate-on-transforms{
  	transition:all 1s;
  }
  .totes-at-the-end{
  	width: 200px;
  	height: 200px;
  	top:10px;
  	left: 500px;
  }
  body{
  	min-height: 1000px;
  }
</style>


<div class="ani">
	123
</div>
<script type="text/javascript">
	el = $('.ani');
	// Get the first position.
	
	var first = el.offset();

	// Move it to the end.
	el.addClass('totes-at-the-end');

	// Get the last position.
	var last = el.offset();

	// Invert.
	var invertY = first.top - last.top,
		invertX = first.left - last.left
		invertW = first.width-last.width;

	// Go from the inverted position to last.
	

	el.css({
		'transform':'translateY(' + invertY + 'px) '+
		'translateX(' + invertX + 'px) '
		

	}); 

	requestAnimationFrame(function() {

	    // 开启动画
	    el.addClass('animate-on-transforms');

	    // 动画执行
	    el.css('transform','none');
	  });
	

	// Do any tidy up at the end of the animation.
	//player.addEventListener('finish', tidyUpAnimations);

</script>
<?php
include "includes/footer.php";
?>