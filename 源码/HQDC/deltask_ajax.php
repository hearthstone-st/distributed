<?php
require_once 'core/init.php';
if (Input::exists('post')) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'taskid' => array(
                'required' => true,
                'name' => 'taskid'
            )
        ));
        Session::delete("course");
        if($validation->passed())
        {

            $teacher = new Teacher();
            $id = Input::get('taskid');
            try{
                $teacher->_taskOperation->taskDelete($id);
                echo 'success';
        	    Session::flash("course","删除成功");
                
            }catch(Exception $e){
                echo 'later';
                Session::flash("course",$e->getMessage());
                
            }
            
        }else {
             $errorInfo = '';
            foreach ($validation->errors() as $error) {
                //echo $error;
                $errorInfo.=($error.'<br>');
            }
            echo 'Verror';
            Session::flash("course",$error);
           
        }
}

?>