<?php
include "includes/header.php";
$taskSubmit = new TaskSubmit();
$taskSubmit = $taskSubmit->findWithTaskId(Input::get('taskId'));
$user = new User();
if (!$user->isLoggedIn()) {
    echo "<script type='text/javascript'>
    
		
        if(confirm('您没有登录，是否跳转到登录页面？')){
        window.location.href = 'login.php';
        }else{
        window.location.href = 'index.php';
        }
        
		</script>";
}else if($role != 'teacher'){
	echo "<script type='text/javascript'>
    
		
        if(confirm('您不是教师，是否重新登录？')){
        window.location.href = 'login.php';
        }else{
        window.location.href = 'index.php';
        }
        
		</script>";
}

?>
<link rel="stylesheet" type="text/css" href="css/table/component.css">
<link rel="stylesheet" type="text/css" href="css/workScore.css">

<div class="main row">
	<div class="intro col-md-8 col-md-offset-2">
		<i class="fa fa-pencil fa-animate"></i>
		<h4>第三次作业评分</h4>
		<p>请在查看学生提交的<b>文件</b>后仔细评分并<b>保存</b>，或<a href="course.php">点此</a>返回<b>课程页面</b></p>
		<a class="save btn btn-primary"><i class="fa fa-check"></i> 保存修改</a>
		<a href="#"class="btn btn-default"><i class="fa fa-search"></i> 查看作业内容</a>
	</div>
	<div class="table-box col-md-8 col-md-offset-2">	
		<table class="score">
			<thead>
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>作业文件</th>
					<th>评分</th>
				</tr>
			</thead>
					
				
			<tbody>
			<?php if($taskSubmit){
				$data = $taskSubmit->data();
				foreach ($data as $key => $value) {
				$number = $user->find($value->user_id)->data()->username;
				$name = $user->find($value->user_id)->data()->name;

			?>
				<tr>
					<td submitId=<?php echo $value->id?> class="number"><?php echo $number?></td>
					<td class="name"><?php echo $name?></td>
					<td class="file_link"><a href="download.php?path='<?php echo $value->file_link?>"> <?php echo $number."_".$name.".zip"?></a></td>
					<td class="score"> <input class="score" type="text" value=<?php echo $value->score?>></td>
					
				</tr>
				
			<?php  }}?>
			</tbody>
		</table>
	</div>
</div>
<script src="js/jquery.ba-throttle-debounce.min.js"></script>
<script src="js/jquery.stickyheader.js"></script>

<script src="js/workScore.js"></script>
<?php
include "includes/footer.php";
?>
