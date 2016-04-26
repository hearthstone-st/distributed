<?php
require_once 'core/init.php';

if (Input::exists('post')) {
    if (Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'type' => array(
                'required' => true,
                'name' => 'type'
            )
        ));
        if(1)
        {
        	$teacher = new Teacher();
        	try{
        	    $file = Input::getFile('ware');
        	    if ($file['error']>0) {
        	        $res["error"] = "error";
        	    }
        	    else {
                    echo FileUtils::GetWarePath()."/".$file['name'];
                    $rs=$teacher->_materialsOperation->uploadWare($file,array(
                        'title'=> $file['name'],
                        'materialsType'=>Input::get('type'),
                        'linkPDF'=>FileUtils::GetWarePath()."/".$file['name'],
                        'teacher_id'=>$teacher->data()->id
                        ));
        	        $res["msg"] = "ok".$rs;
        	    }
        	    if(Input::get('type')=='C')
        	    {
                Session::flash("courseware","上传成功");
                Redirect::to('courseware.php');
        	    }
        	    else 
        	    {
        	        Session::flash("document","上传成功");
        	        Redirect::to('document.php');
        	    }
        	}catch(Exception $e){
        	    $res["error"] = "error:".$e->getMessage();
                echo $res["error"];
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