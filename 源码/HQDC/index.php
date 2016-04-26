<?php
include 'includes/header.php';
	//echo $role;
?>
<link rel="stylesheet" type="text/css" href="css/index.css">

<div class="main row">


		<div class="center row col-md-10 col-md-offset-1">

			<div class="col-md-10 col-md-offset-1 row">
				<div class="progress">
				  <div class="progress-bar progress-bar-success progress-bar-striped" style="width: 35%">
				    <span class="sr-only">35% Complete (success)</span>
				  </div>
				  <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 20%">
				    <span class="sr-only">20% Complete (warning)</span>
				  </div>
				  <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: 10%">
				    <span class="sr-only">10% Complete (danger)</span>
				  </div>
				  <div class="progress-bar progress-bar-info progress-bar-striped" style="width: 35%">
				    <span class="sr-only">10% Complete (danger)</span>
				  </div>
				</div>
				<div class="col-md-4" onclick="location='courseIntroduce.php'">
					<div class="small-box">
						<i class="fa fa-th"></i>
						<h5>简介</h5>
						<i class="to-right fa fa-angle-right"></i>
						<p>教师团队和课程简介</p>
					</div>
						
				</div>

				<div class="col-md-4 " onclick="location='course.php'">
					<div class="small-box">
						<i class="fa fa-plus"></i>
						<h5>课程</h5>
						<i class="to-right fa fa-angle-right"></i>	
						<p>查看课程资料，教师可添加资料</p>
					</div>
						
				</div>				
				<div class="col-md-4 " onclick="location='forum.php'">
					<div class="small-box">
						<i class="fa fa-comments"></i>
						<h5>论坛</h5>
						<i class="to-right fa fa-angle-right"></i>
						<p>查看和回复最新帖子</p>
					</div>
				</div>
				<div class="clear-both"></div>
				<hr>
				<div class="notice-box notice col-md-6">
				
					<div class="panel panel-default">
					  <div class="panel-heading">最近通知</div>
					  <div class="panel-body">
					    <ul>
					       <?php 
				                $news = new News();
				                $record = $news->getInfo();
				                $count = count($record);
				                foreach ($record as $value) {
				                    if ($value->type == 'notice') {
				                        $value = get_object_vars($value);
				                        echo "<li><a href='newsDetail.php?id=".$value['id']."' target='_blank'>".$value['title']."</a>";
				                        echo "<p>".$value['upload_time']."  <a href=''>".$value['upload_people']."</a></p>";
				                        echo "</li>";
				                    }
				                    
				                }
				                
				            ?>
<!-- 					    	<li> -->
<!-- 					    		<a href="#" target="_blank">各位领导，各位老师，关于学院国庆、中秋假期放假安全稳定工作的...</a> -->
<!-- 					    		<p>2015年3月3日11:00 <a href="#">马锐</a></p> -->
<!-- 					    	</li> -->
<!-- 					    	<li> -->
<!-- 					    		<a href="#" target="_blank">请各位同学将作业发到以下邮箱...</a> -->
<!-- 					    		<p>2015年3月3日11:00 <a href="#">马锐</a></p> -->
<!-- 					    	</li> -->
					    </ul>
					  </div>
					</div>

					
				</div>
				<div class="notice-box  state col-md-6 ">
					

					<div class="panel panel-default">
					  <div class="panel-heading">最新动态</div>
					  <div class="panel-body">
					    <ul>
					    <?php 
				                $news = new News();
				                $record = $news->getInfo();
				                $count = count($record);
				                foreach ($record as $value) {
				                    if ($value->type == 'news') {
				                        $value = get_object_vars($value);
				                        echo "<li><a href='newsDetail.php?id=".$value['id']."' target='_blank'>".$value['title']."</a>";
				                        echo "<p>".$value['upload_time']."  <a href=''>".$value['upload_people']."</a></p>";
				                        echo "</li>";
				                    }
				                    
				                }
				                
				            ?>
<!-- 					    	<li> -->
<!-- 					    		<a href="#" target="_blank">各位领导，各位老师，关于学院国庆、中秋假期放假安全稳定工作的...</a> -->
<!-- 					    		<p>2015年3月3日11:00 <a href="#">马锐</a></p> -->
<!-- 					    	</li> -->
					    </ul>
					  </div>
					</div>
				</div>
					
			</div>
		</div>
</div>
<?php
include "includes/footer.php";
?>