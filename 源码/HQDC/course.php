<?php 
require_once 'core/init.php';
include "includes/header.php";
$token = Token::generate();
if($role == 'teacher')
{
	$user = new Teacher();
	$data = $user->taskFindAll();
	$name = $user->data()->name;
}
else if($role == 'student')
{
	$user = new Student();
	$data = $user->taskFindAll();
}
else
{
	$user = new User();
	$data = $user->taskFindAll();
}
$nowtime=strtotime('now');
?>
		<link rel="stylesheet" type="text/css" href="css/timeline/default.css" />
		<link rel="stylesheet" type="text/css" href="css/timeline/component.css" />
		<link rel="stylesheet" type="text/css" href="css/course.css">
	<script src="js/ajaxfileupload.js"></script>
		<div class="row main-box">
			<div class="col-md-8 ">	

				
				<div class="main ">
				<h3>
					<i class="fa fa-list"></i> 本学期课程教学安排<a href="#" class="pull-right"><i class="fa fa-refresh"></i> </a>
				 	<?php
				 	if($role=='teacher')
				 	{
				 		?>
				 	<span class="new-task"><a href="newtask.php"><i class="fa fa-plus"></i> 新建课程或作业</a></span>
					<?php } ?>

					<span class="new-task"><a href="grade.php"><i class="fa fa-search"></i> 查看成绩</a></span>
				</h3>


					<ul class="cbp_tmtimeline">
						<?php 
						for ($i=0; $i < count($data); $i++) {
							$stamp=strtotime($data[$i]->start_time);
							$endtime=$data[$i]->end_time;
						?>
						<li> 
							<time class="cbp_tmtime" datetime="<?php echo date("Y-m-d H:i",$stamp); ?>">
								<span><?php echo date("d/m/Y",$stamp); ?></span>
								<span><?php echo date("H:i",$stamp); ?></span>
							</time>
							<div class="cbp_tmicon cbp_tmicon-phone"></div>
							<div class="cbp_tmlabel">
						      <h6>
						       <span style="cursor:pointer;font-weight:bold;" onclick="location=<?php echo '\'taskdetail.php?taskmark='.$data[$i]->id.'\''; ?>">
						            <?php
						            if($data[$i]->type==='H')
						            echo "作业：";
						        	else echo "实验："
						            ?>
						            <?php 
						            echo $data[$i]->title; 
						            ?>
						        </span>
						        
						        <input type="hidden" class="taskid" name="taskid" value="<?php echo $data[$i]->id; ?>">

								<a href="#" class="showContext pull-right"><i class="fa fa-arrow-down"></i><span>展开</span></a>
								<?php
								if($role=='teacher')
								{
									?>
								<a href="#" class="delete-task pull-right"><i class="fa fa-times"></i><span>删除此任务</span></a>
								<?php }?>
								</h6>
						      	<div class="context">
						      		<p><?php echo $data[$i]->context; ?>
						      		</p>	
						      	</div>
				      	      	<?php
				      	      		$files = $user->taskFindTaskFiles($data[$i]->id);
				      	      		if($files)
				      	      		{
				      	      			?>
				      	      	<div class="download">
				      	      				<?php
				      	      			foreach ($files as $file) {
				      	      	?>
				      	      	<a class="" target="_blank" href="<?php echo $file->url; ?>"><i class="fa fa-download"></i> <?php echo $file->name; ?></a><br />
				      	      	<?php
				      	      		}
				      	      	?>
								</div>
								<?php } ?>
								<div class="operate tool-box">
									<?php 

									$studentData=$user->findStudent();
								  	$submitData=$user->findMaterailStudent($data[$i]->id);
								  	$submitNum = count($submitData);
								  	$stdNum = count($studentData);

									?>
								<label><?php if($nowtime<$endtime) echo '该实验持续中';else echo '该实验已截止，'; echo "已有".$submitNum.'(共'.$stdNum.')'."名同学提交作业"?></label>
								<div class="progress">
								  <?php
								  
								  $percent=count($submitData)/count($studentData)*100;
								  ?>
								  <div class="progress-bar progress-bar-striped <?php if($nowtime<$endtime) echo 'active progress-bar-info';else echo 'progress-bar-success';?>" style="width: <?php if($percent==0)echo '2%';else echo $percent."%";?>">
								    
								  </div>
								  
								</div>
								<?php
								if($role=='student') $hData = $user->_homework->findSubmitByStudentTaskId($user->data()->id,$data[$i]->id);
								else if($role=='teacher') $hData = $user->submitByTaskId($data[$i]->id);
								?>
								<input type="hidden" class="h_taskId" value="<?php echo $data[$i]->id; ?>">
								<?php if($role=='student'&&!(isset($hData)&&count($hData))) echo '<div class="upbtn"><input class="homework" id="'.$data[$i]->id.'" type="file" name="homework"></div>'; ?>
									<?php if($role!="teacher")
									{
										?>
									<a class="btn btn-default look" <?php if($role!='student'&&$role!='teacher') echo "disabled";?>>
									<?php 
										if(isset($hData)&&count($hData))
										{
											echo "<i class='fa fa-search'></i>查看已提交作业";
										}
										else
										{
											if($role=='teacher') echo "<i class='fa fa-search'></i>尚未有学生提交作业";
											else echo "<i class='fa fa-upload'></i>提交作业";
										}
									?>
									</a>
									<?php }?>
									<a href='grade.php' class="btn btn-default"><i class="fa fa-search"></i> 查看评分</a>
								</div>
								<div class="homeworkList">
								<?php 
								if(isset($hData)&&count($hData))
								{
									foreach ($hData as $homework) {
										$filename = substr($homework->file_link, strrpos($homework->file_link,"/")+1);
										echo "<a href='$homework->file_link' target='_blank'>$filename</a><br />";
										echo '<div class="upbtn" style="margin-top:10px"><input class="homework" id="'.$data[$i]->id.'" type="file" name="homework"></div>';
										if($role!='teacher') echo '<button class="btn btn-default" style="margin-top:10px"><i class="fa fa-upload"></i> 重新提交</button>';
									}
								}
								?>
								</div>
								
								<div class="info">
									<span>截止时间:<?php echo date("d/m H:i",$data[$i]->end_time); ?></span>
									<?php
									if($role=='teacher')
									{
										?>
									<a href="<?php echo 'taskdetail.php?taskmark='.$data[$i]->id; ?>" class="edit pull-right">编辑 <i class="fa fa-pencil"></i></a>
									<?php }?>
									<span class="pull-right">由<a href=""><?php echo $user->findCreateMan($data[$i]->teacher_id); ?></a>老师发起</span>
								</div>

							</div>
						  </li>
						<?php
						}
						?>
						<li>
							<div class="cbp_tmicon cbp_tmicon-last">
								<i class="fa fa-angle-double-down fa-animate"></i>
							</div>
							
						</li>
						
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="notice-box notice">
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
					    </ul>
					  </div>
					</div>

					
				</div>
				<div class="notice-box  state">
					

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
					    </ul>
					  </div>
					</div>
				</div>
			</div>	
		</div>
		<script src="js/course.js"></script>
<?php 
include "includes/footer.php"
?>
