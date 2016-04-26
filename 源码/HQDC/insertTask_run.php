<?php
require_once 'core/init.php';

if (Input::exists('post')) {
    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'title' => array(
                'required' => true,
                'name' => 'title'
            ),
            'type' => array(
                'required' => true,
                'name' => 'title'
            ),
            'endtime' => array(
                'required' => true,
                'name' => 'endtime'
            ),
            'desc' => array(
                'required' => true,
                'name' => 'desc'
            )
        ));
        if($validation->passed())
        {
            $teacher = new Teacher();

            try{
                $teacher->_taskOperation->taskCreate(array(
                    'title'=> Input::get('title'),
                    'teacher_id'=>$teacher->data()->id,
                    'type'=>Input::get('type'),
                    'end_time'=>strtotime(Input::get('endtime')),
                    'context'=> Input::get('desc')
                    ));
                $validate->check($_POST, array(
                            'uploadfile' => array(
                                'required' => true,
                                'name' => 'uploadfile'
                            ),
                        ));
                if($validation->passed())
                {
                    $arr=Input::get('uploadfile');
                    $taskID=$teacher->_taskOperation->getLastId();
                    foreach ($arr as $file) {
                        echo $file;
                        $teacher->_taskOperation->insertFile(array(
                            'name'=>$file,
                            'teacher_id'=>$teacher->data()->id,
                            'url'=>FileUtils::GetPath()."/".$file,
                            'task_id'=>$taskID,
                            ));
                    }
                }
                    Redirect::to('taskdetail.php?taskmark='.$taskID);
                // Redirect::to('course.php');
            }catch(Exception $e){
                die($e->getMessage());
            }

        }else {
             $errorInfo = '';
            foreach ($validation->errors() as $error) {
                //echo $error;
                $errorInfo.=($error.'<br>');
            }
            echo $errorInfo;
        }

    }
}

?>