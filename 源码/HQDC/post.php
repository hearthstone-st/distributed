<?php
include "includes/header.php";
$post = new Post();

$postId = Input::get('postId');
if(!$postId){
	Session::flash('forum',"帖子不存在");

echo "<script type='text/javascript'>

	
		window.location.href = 'forum.php';
		
		</script>";
}else{
	$post = $post->find($postId);
	if(!$post){
Session::flash('forum',"帖子不存在");

echo "<script type='text/javascript'>

	
		window.location.href = 'forum.php';
		
		</script>";
	}else{

		$postData=$post->data();
	}
	$userN = new User();
	$reply = new DBReply();
	$reply = $reply->findWithPost($postId);
	$replyData = false;
	if($reply){
		$replyData = $reply->findWithPost($postId)->data();	
	}


	$sender = new User();
	$senderData = $sender->find($postData->release_people)->data();	
	echo "<script type='text/javascript'>
	
		var postId = $postId;
		
		</script>";
}
?>
<link rel="stylesheet" type="text/css" href="css/post.css">
<link rel="stylesheet" type="text/css" href="application/simditor-2.3.6/styles/simditor.css" />
        
        <script type="text/javascript" src="application/simditor-2.3.6/scripts/module.js"></script>
        <script type="text/javascript" src="application/simditor-2.3.6/scripts/hotkeys.js"></script>
        <script type="text/javascript" src="application/simditor-2.3.6/scripts/uploader.js"></script>
        <script type="text/javascript" src="application/simditor-2.3.6/scripts/simditor.js"></script>
	<div id="modal" class="modal fade" role="dialog" aria-labelledby="newEventModal">
	  <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	          <h4 class="modal-title" id="gridModalLabel">回复帖子</h4>
	        </div>
	        <div class="modal-body">
	          <form>
					 
					  <div class="editor-box">
					  	<textarea class = "form-control" id="editor" placeholder="" autofocus required></textarea>	
					  </div>
					  
					  <div class="form-group ">
					    <label for="exampleInputFile">添加图片</label>
					    <div class="img-box">
					    	
					    </div>
					    <div class="tools-droparea">
						    <div class="tools-droparea-placeholder">
						    	
						    	<input id="fileUpload" type="file" tabindex="5" name="postPic" data-tools="upload" data-url="upload.php">
						    	<span><i class="fa fa-file-image-o"></i></span>
						    </div>
					    </div>
					    
					    <div class="files"></div>
					  	<div id="showfile"></div>

					  </div>
					  <div class="clear-both"></div>
				</form>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	          <button type="button" id="reply" class="btn btn-primary reply">确认</button>
	        </div>
	      </div><!-- /.modal-content -->
	    </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<div class="main row">
	<div class="row show-grid col-md-10 col-md-offset-1">
    	<div class="col-md-7 col-md-offset-1">
	    	<div class="content-head">
	    		<h1><?php echo $postData->title;?></h1>
	    		<p><?php echo $senderData->name.'在'.$postData->release_time.'发起';?></p><span class="reply-num"><i class="fa fa-comment-o"></i>100回复</span>
	    		<span class="last-reply">最后回复：陈晓磊 2015年3月4日12:00</span>
	    	</div>
	    	<div class="content-box">
		    	
	    		<div class="content-body">
		    		<div class="head-box">
			    		<img src="images/portraits/hp3.jpg">
			    		<span class="type">楼主</span>
			    	</div>
					<a><?php echo $senderData->name;?></a> 
	    			<p><?php echo $postData->context;?></p>
					
					<div class="imgs">

					
						<?php

							if($postData->imgs!=''){
						?>
							<div>
								<a class="show" href="#">展开图片</a>
							</div>

							<?php
								$imgArray = explode("|", $postData->imgs);
							}else{
								$imgArray = false;
							}
							
								if($imgArray)foreach ($imgArray as $key1 => $value1) {
									echo "<img src=".Config::get('images/post').$value1.">";
								}
							?>		
						
					
					</div>
					<span><?php echo '发布于'.$postData->release_time;?></span>
					<a href="#" ref=<?php echo $postData->release_people;?> class="pull-right new-event" data-toggle="modal" data-target="#gridSystemModal"><span><i class="fa fa-comment-o"></i> 回复</span></a>
	    		</div>

	    		<?php

	    			if($replyData){
	    				
	    				foreach ($replyData as $key => $value) {
	    				
	    				$sender = $userN->find($value->sender)->data();
	    				$receiver = $userN->find($value->receiver)->data();
	    				if($receiver->id == $user->data()->id){
	    					
	    					try {
	    						$reply->update( array('is_readed' => '1'),$value->id);	
	    					} catch (Exception $e) {
	    						echo $e->getMessage();  
	    					}
	    					
	    				}

	    		?>
	    		<div class="content-body">
	    			<div class="head-box">
			    		<?php echo "<img src=".Config::get('images/portraits').$sender->portraits.">";?>
						
			    	</div>
					<a><?php echo $sender->name;?></a><span>回复</span><a href="#"><?php echo $receiver->name;?></a> 
	    			<p> <?php echo $value->context;?> </p>
					<div class="imgs">

					
						<?php

							if($value->imgs!=''){?>
							<div>
								<a class="show" href="#">展开图片</a>
							</div>

							<?php
								$imgArray = explode("|", $value->imgs);
							}else{
								$imgArray = false;
							}
							
								if($imgArray)foreach ($imgArray as $key1 => $value1) {
									echo "<img src=".Config::get('images/post').$value1.">";
								}
							?>		
						
					</div>
					<span>发布于 <?php echo $value->reply_time;?></span>
					<a href="#" ref=<?php echo $sender->id;?> class="pull-right new-event"  data-toggle="modal" data-target="#gridSystemModal"><span><i class="fa fa-comment-o"></i> 回复</span></a>
					
						
	    		</div>
	    		<?php
	    			}}
	    		?>
	    	</div>
    		
    	</div>
    	<div class="right col-md-3"  >
	      	<div id="affix-right" class="affix">
	      		
	      	
		      	<div class="section">
		      	<a href="newPost.php" class="btn btn-smaller btn-success new">
		      		<i class="fa fa-plus"></i>
		      		点此创建新话题
		      	</a>	
		      	</div>
		      	<div class="section">
		      		<b>最新帖子</b>
		      		<ul class="new-post">
		      		<?php
						$newPost = $post->findLimitOrder('0,10','release_time','DESC');

						if($newPost) $newPostData = $newPost->data();

						if($newPostData)foreach ($newPostData as $key => $value) {
		      		?>
		      			<li><a class='title' href=<?php echo "post.php?postId=".$value->id;?>><?php echo $value->title?></a></li>
		      		<?php
		      		}
		      		?>
		      		</ul>
		      	</div>
		      	<div class="section">
		      	<a href="forum.php" class="btn btn-smaller btn-primary new">
		      		<i class="fa fa-arrow-left"></i>
		      		返回论坛
		      	</a>	
		      	</div>
	      	</div>
      	</div>
    </div>
</div>
<script src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/post.js"></script>
<?php
include "includes/footer.php"
?>      