<?php
require_once 'core/init.php';
$user = new User();

if(Input::exists('post')&& $user->isLoggedIn()){
	$data = Input::get('data');
	
	

	

	$validate = new Validate();
    $validation = $validate-> check($data,array(
        'title' => array(
            'name' =>'title' ,           //in the table
            'required' => true
        ),
        'context' => array(
            'name' =>'title' ,
            'required' =>true
        )
    ));
    if($validation->passed()){
    	$post = new Post();
    	$title = $data['title'];
		$context = $data['context'];
        if(array_key_exists("imgs",$data)){
            $imgs=implode("|",$data['imgs']);    
        }else{
            $imgs = '';
        }
    	try{
            $post->create(array(
                'title' => $title,
                'context' => $context,
                'imgs' => $imgs,
                'release_time' => date('Y-m-d H:i:s'),
                'release_people' => $user->data()->id
            ));
            Session::delete('forum');
            //Session::flash('forum','create post successfully');
            Session::flash('forum',"发帖成功");
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