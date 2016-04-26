<?php
require_once 'core/init.php';
if (Input::exists('post')) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'taskid' => array(
                'required' => true,
                'name' => 'taskid'
            )
        ));
        if($validation->passed())
        {
            $teacher = new Teacher();
            $id = Input::get('taskid');
            try{
                $teacher->_taskOperation->taskDelete($id);
                Session::flash("course","删除成功");
            	Redirect::to('course.php');
            }catch(Exception $e){
                die('error'.$e->getMessage());
                Session::flash("course","删除失败");
                Redirect::to('course.php');
            }

        }else {
             $errorInfo = '';
            foreach ($validation->errors() as $error) {
                //echo $error;
                $errorInfo.=($error.'<br>');
            }
            Session::flash("course","删除失败");
            Redirect::to('course.php');
        }
    }
}

?>