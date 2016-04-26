<?php
require_once 'core/init.php';

if (Input::exists('post')) {
    if (Token::check(Input::get('token'))) {
    	Session::delete('home');

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'fileId' => array(
                'required' => true,
                'name' => 'fileId'
            )
        ));
        if($validation->passed())
        {
            $teacher = new Teacher();
            try{
                if($teacher->_taskOperation->deleteFile(Input::get('fileId')))
            	{
                    Session::flash("taskdetail","删除成功");
                    //echo Session::flash("taskdetail");
                }
                else Session::flash("taskdetail","删除失败");
       
            }catch(Exception $e){
                die($e->getMessage());
            }

        }else {
             $errorInfo = '';
            foreach ($validation->errors() as $error) {
                //echo $error;
                $errorInfo.=($error.'<br>');
            }
            Session::flash("taskdetail","删除失败");
        }

    }
}
?>