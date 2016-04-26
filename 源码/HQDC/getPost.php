<?php
require_once 'core/init.php';
$data = Input::get('data');
$user = new User();
$limitS = $data['total'];
$limitE = $data['total']+$data['num'];
$post = new Post();
$post = $post->findLimitOrder($limitS.','.$limitE,'release_time','DESC');
if($post) $postData = $post->data();

if(!$post){
	echo 'null';
}else foreach ($postData as $key => $value) {
	$sender = $user->find($value->release_people)->data()->name;
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
                    

                    <span class="teacher">师</span><a class="name"><?php echo $sender;?></a>
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
		</div>
		
		</td>
		
		
	</tr>
<?php
	}
?>
