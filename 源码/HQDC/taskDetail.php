<?php
require_once 'core/init.php';
include "includes/header.php";
if(Input::get('edit')=='true')
{
	echo "<script>var editmodel=true;</script>";
}
$token = Token::generate();
if($role=='student')
{
	$user = new Student();
}
else $user = new User();
$nowtime=strtotime('now');
if(Input::exists('get'))
{
      $id = Input::get('taskmark');
      $data = $user->taskFindById($id);
      if($data)
      {
	      $title = $data[0]->title;
	      $type = $data[0]->type;
	      $start = $data[0]->start_time;
	      $end = $data[0]->end_time;
	      $desc = $data[0]->context;
	      $teacher_id = $data[0]->teacher_id;
	      $files = $user->taskFindTaskFiles($id);
	  }
?>
<link rel="stylesheet" type="text/css" href="css/taskDetail.css">
<script src="js/ajaxfileupload.js"></script>
<script src="js/taskdetail.js"></script>
<div class="main row">
	<div class="col-md-10 col-md-offset-1 row">
	<div class="col-md-8 col-md-offset-2 row padding">
		<div class="task">
			<input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
			<input type="hidden" id="id" value="<?php echo $id; ?>">
			<div>
				<label>标题</label>
			<input type="text" id="title" name="title" class="title"  value="<?php if(isset($title)) echo $title; ?>" disabled>
			</div>
			<div>
				<label>内容</label>
			<textarea class="context" name="desc" id="context" placeholder="" disabled>
<?php if(isset($desc)) echo $desc; ?>		
			</textarea>
			</div>
			<div id="deadline" style="display:none">
				<label>截止时间</label>
				<div class="col-sm-3 deadline">
					<input type="date" name="endtime" id="endtime" value="<?php echo date("Y-m-d",$end); ?>">
				</div>
			</div>
			<label>作业附件</label>
			<div class="download"> 
			<?php   
			if(isset($files))
			{
			?>
 
			<?php  
				foreach ($files as $file) {
					?>
			<div>   
				<a class="" href="download.php?path='<?php echo $file->url; ?>'" id="<?php echo "fl".$file->id; ?>">
					<i class="fa fa-download">
					</i> <?php echo $file->name; ?>
				</a>
				<span class='fileDel' style="display:none;" id="<?php echo $file->id; ?>">[删除]</span>
				<br>
			</div>
                    <?php
                       }
            ?>
			<?php
			}
			?>
			<input id="fileToUpload" type="file" name="file" style="display:none;">
			</div>
			<div class="tool-box" id="uptask" style="display:none">
				<button class="btn btn-primary" id="uploadfile"><i class="fa fa-upload"></i> 确定</button>
			</div>
			<div class="operate tool-box">
			<?php
				$studentData=$user->findStudent();
				$submitData=$user->findMaterailStudent($id);
				$percent=count($submitData)/count($studentData)*100;
			?>
			<label>已有<?php echo count($submitData).'(共'.count($studentData).')';?>名同学提交作业</label>
			<div class="progress">
			  
			  <div class="progress-bar progress-bar-info progress-bar-striped active" style="width: <?php echo $percent."%";?>">
			    <span class="sr-only">已有<?php echo $percent."%";?>同学提交作业</span>
			  </div>
			  
			</div>
			<?php
			if($role=='student')
			{
			?>
			<div class="files">
				<div class="homeworklist">
				<?php
				$hData = $user->_homework->findSubmitByStudentTaskId($user->data()->id,$id);
				?>
				<label>
					<?php 
					if(count($hData))
					{
						echo "作业<br />";
						foreach ($hData as $homework) {
							$filename = substr($homework->file_link, strrpos($homework->file_link,"/")+1);
							echo "<a href=\"download.php?path='$homework->file_link'\" target='_blank'>$filename</a><br />";
						}
					}
					else echo '你尚未提交作业';
					?>
				</label>
			</div>

			</div>
				<div class="upbtn"><input id="homework" type="file" name='homework'></div>
				<?php }?>
				<button id="uploadHomework" class="btn btn-primary" <?php if($nowtime>$end) echo "disabled";?>><i class="fa fa-upload" ></i> 提交作业</button>
				<?php
				if($role=='teacher')
				{
				?>
				<button onclick="location=<?php echo '\'workScore.php?taskId='.$id.'\''?>" class="btn btn-default"><i class="fa fa-pencil"></i> 为学生评分</button> 
			<?php }?>
			</div>
			<div class="info">
				<span>截止时间:<?php echo date("d/m h:i",$end);?></span>
				<?php
				if($role=='teacher')
				{
					?>
				<a href="#" class="delete-task pull-right" taskid="<?php echo $id;?>"><i class="fa fa-times"></i><span>删除此任务</span></a>
				<a href="#" class="edit pull-right" id="edit">编辑 <i class="fa fa-pencil"></i></a>
				<?php }?>
				<span class="pull-right">由<a href=""><?php if(isset($teacher_id)) echo $user->findCreateMan($teacher_id); ?></a>老师发起</span>
			</div>
		</div>
	</div>
	</div>
</div>
<?php
}
?>
<?php 
include "includes/footer.php";
?>