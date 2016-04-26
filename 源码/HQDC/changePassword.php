<?php
require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn()){
	Redirect::to('index.php');
}

if(Input::exists('post')){
	if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'password_current' =>array(
				'name' =>'password',
				'required' => 'true',
				'min' => 6
				),
			'password_new' =>array(
				'name' => 'new password',
				'required' => 'true',
				'min' => 6
				),
			'password_agan' =>array(
				'name' => 'password agan',
				'required' => 'true',
				'min' => 6,
				'matches' =>'password_new'
				),			
			));
		if($validation->passed()){
			Session::delete('info');
			if(Hash::make(Input::get('password_current'), $user->data()->salt)!== $user ->data()->password){
				echo 'you password is wrong';
			}else{
				$salt = Hash::salt(32);
				$user ->update(array(
					'password' =>Hash::make(Input::get('password_new'),$salt),
					'salt' => $salt
					));
				Session::flash('info', "修改密码成功");
				Redirect::to('info.php');
			}

		}else{
			foreach ($validation->errors() as $error) {
                $str.=($error.'<br>');
                
            }
            Session::flash('info',$str);
            Redirect::to('info.php');
		}
	}
}


?>
         