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
            $teacher = new Teacher();
            try{
                $file = Input::getFile('file');
                if ($file['error']>0) {
                    $res["error"] = "error";
                }
                else {
                    $rs=$teacher->_taskOperation->upfile($file,array(
                        'name'=> $file['name'],
                        'url'=>FileUtils::GetPath()."/".$file['name'],
                        'task_id'=>Input::get('taskId')
                        ));
                    Session::flash("taskdetail","上传成功");
                    $res["msg"] = "ok";
                }
            }catch(Exception $e){
                Session::flash("taskdetail","上传失败");
                $res["error"] = "error:".$e->getMessage();
            }

        }else {
             $errorInfo = '';
            foreach ($validation->errors() as $error) {
                //echo $error;
                $errorInfo.=($error.'<br>');
            }
            Session::flash("taskdetail","上传失败");
            $res["error"] = 'failed:'.$errorInfo;
        }

    }
}
echo json_encode($res);
?>