<?php
require_once 'core/init.php';
include "includes/header.php";
$token = Token::generate();
?>
<link rel="stylesheet" type="text/css" href="css/newTask.css">
<script src="js/ajaxfileupload.js"></script>
<script src="js/newTask.js"></script>
<div class="main row">
		<div class="center">
			<i class="fa fa-edit fa-animate"></i>
			<h6>创建任务</h6>
			<p>填写以完成新建任务</p>
		</div>
	<div class="col-md-10 col-md-offset-1 row padding">
		

		<div class="new-post col-md-6 col-md-offset-3">
			<form action="inserttask_run.php" method="post" enctype ="multipart/form-data">
			<input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
			  <div class="form-group">
			    <label for="title">任务标题</label>
			    <input type="text" class="form-control" id="title" name="title" placeholder="标题" required>
			  </div>
			  <div  class="form-group row">
			     <div class="col-md-4 ">
    			     <label for="end_time">截止日期</label>
    			     <input type="date" class="form-control end-time" id="endtime" name="endtime" required> 
    			     
			     </div>
			     <div class="col-md-3">
			         <label for="end_time">截止时间</label>
			         <input type="time" class="form-control end-time" id="end_time" name="end_time" value="00:00" required>
			     </div>
			     
			     <div class="col-md-5">
    			     <label for="type">任务类型</label>
    			     <select class="form-control" name="type" id="type">
    			         <option value="H">作业</option>
    			         <option value="E">实验</option>
    			     </select>
			     </div>
			     
			  </div>
			  <div class="form-group">
			    <label for="context">任务内容</label>
			    <textarea class="form-control" id="context" name="desc" placeholder="请输入任务内容"></textarea>
			  </div>
<!-- 			  <div class="form-group "> -->
<!-- 			    <label for="exampleInputFile">添加附件</label> -->
<!-- 			    <div class="file-box"> -->
			    	
<!-- 			    </div> -->
<!-- 			    <div class="tools-droparea"> -->
<!-- 				    <div class="tools-droparea-placeholder"> -->
				    	
<!-- 				    	<input id="fileUpload" type="file" tabindex="5" name="postPic" data-tools="upload" data-url="upload.php"> -->
<!-- 				    	<span><i class="fa fa-file-image-o"></i></span> -->
<!-- 				    </div> -->
<!-- 			    </div> -->
			    
<!-- 			    <div class="files"></div> -->
<!-- 			  	<div id="showfile"></div> -->

<!-- 			  </div> -->
			  <div class="form-group">
			     <label for="inputLabel">添加附件</label>
			     <div class="filelist">
			     </div>
			     <input type="file" name="inputFile" id="inputFile">
			  </div>

			 	<div class="clear-both"></div>
		
			  <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
			  												
			  <div class="center">
			  	
			  	<button id="submit" class="btn btn-default" onclick="checkForm()" >创建并添加附件</button>
			  </div>		  
			</form>	
		</div>
		
	</div>


</div>
<!-- <script src="js/jquery.form.js"></script> -->
<!-- <script src="js/newTask.js"></script> -->

<?php
	include "includes/footer.php"
?>