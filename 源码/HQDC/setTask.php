<?php
require_once 'core/init.php';
include "includes/header.php";
$token = Token::generate();
$teacher = new teacher();
if(Input::exists('get')&&$teacher->data()->id)
{
      $id = Input::get('taskmark');
      $data = $teacher->_taskOperation->taskFindById($id);
      $title = $data[0]->title;
      $type = $data[0]->type;
      $start = $data[0]->start_time;
      $end = $data[0]->end_time;
      $desc = $data[0]->context;
      $files = $teacher->_taskOperation->taskFindTaskFiles($id);
}
?>
<script src="js/ajaxfileupload.js"></script>
<script src="js/settask.js"></script>
<div class="main row">
    <div class="col-md-6 col-md-offset-3">
      	<form class="form-horizontal" role="form" method="post" action="<?php if(!Input::exists('get')) echo 'insertTask_run.php'; else echo 'updateTask_run.php';?>"
      	enctype="multipart/form-data" >
        <input type="hidden" id="taskId" name="taskId" value="<?php echo $id; ?>">
        <input type="hidden" id="action" name="action" value="<?php if(Input::exists('get')) echo 'isget'; ?>">
      	   <div class="form-group">
      	      <label  class="col-sm-2 ">题目</label>
      	      <div class="col-sm-10">
      	         <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
      	      </div>
      	   </div>
      	   <div class="form-group">
      	      <label  class="col-sm-2 ">类型</label>
      	      <div class="col-sm-10">
      	         <input type="radio" name="type" value="H" <?php if($type==='H') echo "checked='true'"?>/> 作业
      	         <input type="radio" name="type" value="E" <?php if($type==='E') echo "checked='true'"?>/> 实验
      	      </div>
      	   </div>
      	   <div class="form-group">
      	      <label  class="col-sm-2 ">开始时间</label>
      	      <div class="col-sm-4">
      	         <input type="date"  name="begintime" value="<?php echo date("Y-m-d",$start); ?>">
      	      </div>
      	   </div>
      	   <div class="form-group">
      	      <label  class="col-sm-2 ">结束时间</label>
      	      <div class="col-sm-4">
      	         <input type="date" name="endtime" value="<?php echo date("Y-m-d",$end); ?>">
      	      </div>
      	   </div>
      	   <div class="form-group">
      	      <label  class="col-sm-2 ">描述</label>
      	      <div class="col-sm-10">
      	         <textarea class="form-control" rows="3" name="desc" ><?php echo $desc; ?></textarea>
      	      </div>
      	   </div>
      	   <div class="form-group">
      	      <div class="col-sm-offset-1">
      	      	<input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
      	         <button type="submit" class="btn btn-default">
                  <?php 
                    if(!Input::exists('get')) echo '创建并提交附件'; 
                    else echo "完成";
                    ?>
                </button>
      	      </div>
      	   </div>
      	</form>
             <div class="form-group">
                   <?php
                   if(Input::exists('get'))
                   {
                      echo '<label  class="col-sm-2 ">附件</label>';
                      echo '<div class="col-sm-10">';
                       count($files);
                       for ($i=0; $i < count($files); $i++) { 
                          echo "<span id=".$files[$i]->id." style='float:left;'>";
                          echo "<a href='".$files[$i]->url."'>".$files[$i]->name."</a>";
                          echo "<span class='fileDel'>[删除]</span>";
                          echo "</span>";
                          echo "\r\n";
                       }
                      echo '<input id="fileToUpload" type="file" style="float:left;" name="file" class="input">';
                      echo '<button id="buttonUpload">上传</button>';
                      echo '</div>';
                  }
                  ?>
               </div>
    </div>
</div>
<?php
include "includes/footer.php";
?>