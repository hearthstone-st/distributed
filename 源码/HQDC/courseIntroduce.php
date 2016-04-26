<?php
include 'includes/header.php';
?>
<link rel="stylesheet" type="text/css" href="css/courseIntroduce.css">
<div class="main row">
	<div class="col-md-10 col-md-offset-1 row">
	<div class="left col-md-8">
		<ul class="nav nav-tabs">
		  <li role="presentation" class="active"><a class="to-tab1" href="#">课程简介</a></li>
		  <li role="presentation"><a class="to-tab2" href="#">教学环境</a></li>
		  <li role="presentation"><a class="to-tab3" href="#">教师简介</a></li>
		</ul>
		<div id="courseIntroduce" class="tab1">
		<h1>课程简介</h1>
		<div class="info">
			<?php 
			   $courseInfo = new CourseInfo();
			   echo $courseInfo->getCourseIntroduce();
			?>	
			
		</div>
		

		</div>
		
		<div id="teachingEnvironment" class="tab2"> 
		<h1>教学环境</h1>
		<div class="info">
			<?php 
			   echo $courseInfo->getTeachingEnvironment();
			?>	
			
		</div>
		</div><!-- tab2 -->

		<div class="tab3">
		<h1>教师简介</h1>
			<div class="info">
			<?php 
			$teacherInfo = new DBTeacher();
			$detail = $teacherInfo->getAllIntroduce();
			foreach ($detail as $value) {
			    $value = (array)$value;
			    echo "<div>";
			    echo "<p>姓名：".$value['name']."</p>";
			    echo "<p>职称：".$value['professional_title']."</p>";
			    echo "<p>主要工作：".$value['main_job']."</p>";
			    echo "<p>研究经历：".$value['research_achievements']."</p>";
			    echo "<p>获奖信息：".$value['record_information']."</p>";
			    echo "</div>";
// 			    print_r($value);
			}
			?>
			</div>
			
		</div>
		
		
	</div>
	<div class="right col-md-4">
		<div class="notice-box notice ">
				
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
		<div class="notice-box  state  ">
			

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
					    	<!-- <li>
					    		<a href="#" target="_blank">各位领导，各位老师，关于学院国庆、中秋假期放假安全稳定工作的...</a>
					    		<p>2015年3月3日11:00 <a href="#">马锐</a></p>
					    	</li> -->
			    </ul>
			  </div>
			</div>
		</div>
		
	</div>
	
	
	
	</div>
</div>
<script type="text/javascript" src="js/courseIntroduce.js"></script>
<?php 
include "includes/footer.php";
?>