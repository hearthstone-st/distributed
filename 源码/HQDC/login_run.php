<?php
require_once 'core/init.php';

// $user = new User();
// if ($user->isLoggedIn()) {
//     Redirect::to('index.php');
// }

if (Input::exists('post')) {
    if (Token::check(Input::get('token'))) {
    	Session::delete('index');

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'name' => 'username'
            ),
            'password' => array(
                'required' => true,
                'name' => 'password'
            )
        ));

        if ($validation->passed()) {

           
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if ($login) {

            	Session::flash('index',"您已经成功登陆");

                Redirect::to('index.php');
            } else {
                Session::flash('login',"用户和密码不匹配");

                Redirect::to('login.php');
                
            }

        } else {
            foreach ($validation->errors() as $error) {
                $str.=($error.'<br>');
                
            }
            Session::flash('login',$str);
            Redirect::to('login.php');
        } 

    }
}

?>