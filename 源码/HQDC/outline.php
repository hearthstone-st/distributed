<?php
include 'includes/header.php';
?>
<div class="main row">
	<div class="col-md-8 col-md-offset-2">
		
	
		<h2 class="center">
			教学大纲
		</h2>
		<div>
			<?php 
			$courseInfo = new CourseInfo();
			
			echo $courseInfo->getTeachingProgram();
			?>
		</div>
	</div>
</div>
<?php
include "includes/footer.php";
?>