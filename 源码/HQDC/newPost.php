<?php
	include "includes/header.php";
?>
<link rel="stylesheet" type="text/css" href="css/newPost.css">
<link rel="stylesheet" type="text/css" href="application/simditor-2.3.6/styles/simditor.css" />
        
        <script type="text/javascript" src="application/simditor-2.3.6/scripts/module.js"></script>
        <script type="text/javascript" src="application/simditor-2.3.6/scripts/hotkeys.js"></script>
        <script type="text/javascript" src="application/simditor-2.3.6/scripts/uploader.js"></script>
        <script type="text/javascript" src="application/simditor-2.3.6/scripts/simditor.js"></script>
<div class="main row">
		<div class="center">
			<i class="fa fa-edit fa-animate"></i>
			<h6>发起新帖子</h6>
			<p>填写以完成新建话题</p>
		</div>
	<div class="col-md-10 col-md-offset-1 row padding">
		

		<div class="new-post col-md-6 col-md-offset-3">
			<form>
			  <div class="form-group">
			    <label for="title">帖子标题或简介</label>
			    <input type="text" class="form-control" id="title" placeholder="标题" required>
			  </div>
			  
			  <div class="form-group">
			    <label for="editor">帖子内容</label>
			    <textarea class = "form-control" id="editor" placeholder="" autofocus></textarea><br>
			  </div>
			  <div class="form-group ">
			    <label for="exampleInputFile">添加图片</label>
			    <div class="img-box">
			    	
			    </div>
			    <div class="tools-droparea">
				    <div class="tools-droparea-placeholder">
				    	
				    	<input id="fileUpload" type="file" tabindex="5" name="postPic" data-tools="upload" data-url="upload.php" required>
				    	<span><i class="fa fa-file-image-o"></i></span>
				    </div>
			    </div>
			    
			    <div class="files"></div>
			  	<div id="showfile"></div>

			  </div>

			 	<div class="clear-both"></div>
		
			  <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
			  												
			  <div class="center">
			  	
			  	<button id="submit" class="btn btn-default">发帖</button>
			  </div>
			  
			</form>	
		</div>
		
	</div>


</div>
<script src="js/jquery.form.js"></script>
<script src="js/newPost.js"></script>

<?php
	include "includes/footer.php"
?>