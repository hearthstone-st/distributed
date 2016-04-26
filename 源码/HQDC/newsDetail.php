<?php 
include "includes/header.php";
$news = new News();
$newsId = Input::get("id");

$news = $news->find($newsId);
?>

<div class="main row">
	<div class="col-md-8 col-md-offset-2">

		<h4><?php echo $news->title;?></h4>	
		<div><?php echo $news->context;?></div>	
		<p>由<?php echo $news->upload_people;?>发布</p>
		<p><?php echo $news->upload_time;?></p>
<!-- =======
		<?php 
		$id = Input::get('id');
		$info = new News();
		$data = (array)$info->getInfoByID($id);
// 		print_r($data);
		// echo "<div>";
		// echo "<h1>".$data['title']."</h1>";
		// echo "<p>".$data['context']."</p>";
		// echo "<p>".$data['upload_people']."</p>";
		// echo "</div>";
		?>
>>>>>>> origin/master -->
	</div>
</div>

<?php
include "includes/footer.php";
?>
