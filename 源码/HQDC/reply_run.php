<?php
require_once 'core/init.php';
$user = new User();

if(Input::exists('post')&& $user->isLoggedIn()){
	$data = Input::get('data');
	
	

	

	$validate = new Validate();
    $validation = $validate-> check($data,array(
        'receiver' => array(
            'name' =>'receiver' ,           //in the table
            'required' => true
        ),
        'context' => array(
            'name' =>'context' ,
            'required' =>true
        )
    ));
    if($validation->passed()){
        $postId = $data['postId'];
    	$reply = new DBReply();
    	$receiver = $data['receiver'];
		$context = $data['context'];
        if(array_key_exists("imgs",$data)){
            $imgs=implode("|",$data['imgs']);    
        }else{
            $imgs = '';
        }
    	try{
            $reply->create(array(
                'post_id' => $postId,
                'context' => $context,
                'imgs' => $imgs,
                'reply_time' => date('Y-m-d H:i:s'),
                'sender' => $user->data()->id,
                'receiver' => $receiver
            ));
            Session::delete('post');
            //Session::flash('forum','create post successfully');
            Session::flash('post',"回帖成功");
            echo 'success';	
            //Redirect::to('index.php');
        }catch(Exception $e){
            die($e->getMessage());
        }
    }else{
    	echo 'empty';
    }

}else echo 'noLogin';

?>