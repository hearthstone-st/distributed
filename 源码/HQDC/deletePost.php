<?php
require_once 'core/init.php';

$user = new User();
if (!$user->isLoggedIn()) {
	Session::flash('forum',"请先登录");
    Redirect::to('forum.php');
}else if (Input::exists('get')) {
	
	Session::delete('forum');

    $validate = new Validate();
    $validation = $validate->check($_GET, array(
        'postId' => array(
            'required' => true,
            'name' => 'postId'
        )
    ));

    if ($validation->passed()) {
    	Session::delete('forum');
    	$postId = Input::get('postId');
    	$post = new Post();
    	$post  = $post->find($postId);
    	if(!$post){
    		Session::flash('forum',"您要删除的帖子已不存在");
			Redirect::to('forum.php');
    	}else if($post->data()->release_people!=$user->data()->id && $user->data()->group!="M"){
    		Session::flash('forum',"您没有删除的权限");
			Redirect::to('forum.php');

    	}else{
	    	try {
	    		
                $reply = new DBReply();
                if($reply->deletePost($postId)){
                    $post->delete($postId); 
                    Session::flash('forum',"删除成功");
                    Redirect::to('forum.php');  
                }else{
                    Session::flash('forum',"删除失败，请稍后再试");
                    Redirect::to('forum.php');   
                }
	    		
	    	} catch (Exception $e) {
	    		Session::flash('forum',$e->getMessage());
				Redirect::to('forum.php');
	    		//die($e->getMessage());
	    	}	
    	}
    	

    } else {
        foreach ($validation->errors() as $error) {
            	$str.=($error.'<br>');
                Session::flash('forum',$str);

                Redirect::to('forum.php');
        }
    } 


}

?>