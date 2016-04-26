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
			'name' => array(
				'name'=>'name',
				'reqired' =>true,
				'min'=> 2,
				'max' => 50
				)

			));
		if($validation->passed()){
			echo 'sdfsdf';
			try{
				$user->update(array(
					'name' => Input::get('name'),
					'portraits' => Input::get('portrait')
					));
				Session::flash('info', '信息更改成功.');
				Redirect::to('info.php');
			}catch(Exception $e){
				die($e->getMessage());
			}
		}else{
			foreach ($validation->errors() as $error) {
				echo $error,'<br>';

			}
		}
	}
}

?>

