<?php
include "includes/header.php";

$post = new Post();
if(Input::exists('get'))
{
	$param = Input::get('key');
	echo "<script>var searchcontent='".$param."'</script>";
	$arr = explode(' ',$param);
	$post = $post->findWhereLikeLimitOrder($arr,'0,10','release_time','DESC');
}
else $post = $post->findLimitOrder('0,10','release_time','DESC');

if($post) $postData = $post->data();

?>
<link rel="stylesheet" type="text/css" href="css/forum.css">
<div class="main">
	<div class="row show-grid">
      <div class="col-md-7 col-md-offset-1">
      	<div class="tools">
      		<a href="#" class="btn btn-success">
      			<i class="fa fa-refresh"></i>
      			刷新
      		</a>
      		<a href="newPost.php" class="btn btn-smaller btn-primary new">
	      		<i class="fa fa-plus"></i>
	      		<span>发帖</span>
	      	</a>
      		
			
      		<div class="btn-group" role="group" aria-label="...">
			  <button type="button" class="btn btn-default">学生发帖</button>
			  <button type="button" class="btn btn-default">教师发帖</button>
			  <button type="button" class="btn btn-default">全部</button>
			</div>	
			<div class="input-group forum-search">
			      <i class="fa fa-search"></i>
			      <input type="text" class="form-control input-sm" placeholder="搜索帖子" id="search" aria-describedby="basic-addon1">
			</div>
      	</div>
      	
		<h6>最新话题
			
		</h6>
      	<table class="table forum-table">
		<tbody>
			
			
		<?php 
			if(isset($postData)&&$postData)foreach ($postData as $key => $value) {
				$sender = $user->find($value->release_people)->data()->name;
				$senderRole = '学';
				$sRolo = $user->find($value->release_people)->data()->group;
				if($sRolo=='M'){
					$senderRole="管";
				}else if($sRolo=='T'){
					$senderRole="师";
				}
				$senderPortrait = $user->find($value->release_people)->data()->portraits;
				//var_dump($value->imgs);
				if($value->imgs!=''){
					$imgArray = explode("|", $value->imgs);
				}else{
					$imgArray = false;
				}


			

		?>
			<tr class="row">
				<td >
					<div class="col-md-2 forum-head-img ">
							
                            <img src=<?php echo Config::get('images/portraits').$senderPortrait;?>>
                            <div  class="clear-both"></div>
                            

                            <span class="teacher"><?php echo $senderRole;?></span><a class="name"><?php echo $sender;?></a>
                             <div class="clear-both"></div>
                            <span class="reply-num">100</span>
                    </div>
                    
                    
                </td>
                
				<td class="col-md-10"><a class='title' href=<?php echo "post.php?postId=".$value->id;?>><?php echo $value->title?></a>
				<p><?php echo $value->context;?> </p>
				<div class="imgs">
					<ul>
						<li>
							<?php
							//var_dump($imgArray);
								if($imgArray)foreach ($imgArray as $key1 => $value1) {
									echo "<img src=".Config::get('images/post').$value1.">";
								}
							?>
					

						</li>
					</ul>
				</div>
				<div>
					
					<span class="pull-left"><?php echo $value->release_time;?></span>
					<span class="pull-right"><a class="delete-post" href=<?php echo "deletePost.php?postId=".$value->id?>>删除本帖</a></span>
				</div>
				
				</td>
				
				
			</tr>
		<?php
			}
		?>
		</tbody>		
		</table>
		<div class="sk-spinner sk-spinner-rotating-plane"></div>
      </div>
      <div class="right col-md-3"  >
      	<div id="affix-right" class="affix">
      		
      	
	      	<div class="section">
	      	<a href="newPost.php" class="btn btn-smaller btn-default new">
	      		<i class="fa fa-plus"></i>
	      		<span>点此创建新话题</span>
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
      	</div>
      </div>
    </div>
</div>
<script type="text/javascript" src="js/forum.js"></script>
<?php
include "includes/footer.php"
?>