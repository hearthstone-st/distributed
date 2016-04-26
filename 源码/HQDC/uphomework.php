<?php
require_once 'core/init.php';
$res["error"] = "";//错误信息
$res["msg"] = "";//提示信息
if (Input::exists('post')) {
    if (1) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'taskId' => array(
                'required' => true,
                'name' => 'taskId'
            )
        ));
        if($validation->passed())
        {
            $user = new Student();
            try{
                $file = Input::getFile('homework');
                if ($file['error']>0) {
                    $res["error"] = "error";
                }
                else {
                    $rs=$user->_homework->submit($file,array(
                        'task_id'=> Input::get('taskId'),
                        'user_id'=> $user->data()->id,
                        'file_link'=>"upload/homework"."/".$file['name'],
                        ));
                    $res["msg"] = "ok".$rs;
                    Session::flash("taskdetail","上传成功");
                }
            }catch(Exception $e){
                $res["error"] = "error:".$e->getMessage();
            }

        }else {
             $errorInfo = '';
            foreach ($validation->errors() as $error) {
                //echo $error;
                $errorInfo.=($error.'<br>');
            }
            $res["error"] = 'failed:'.$errorInfo;
        }

    }
}
echo json_encode($res);
?>