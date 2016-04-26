<?php 
require_once 'core/init.php';

$type = Input::get('type');

if ($type == 'fromhand') {
    
    $validate = new Validate();
    $validation = $validate->check($_POST,array(
        'username' => array(
            'name' =>'username',         
            'required' => true,
            'min' => 10,
            'max' => 10,
            'unique' => 'users',
        ),
        'name' => array(
            'name' =>'name' ,
            'required' =>false,
            'min' => 2,
            'max' => 50,
        ),
        'password' => array(
            'name' =>'password' ,
            'required' =>true,
            'min' => 6,
        ),
    ));
    
    if ($validation->passed()) {
        $salt = Hash::salt(32);
        if (Input::get('sex') == 'F' && Input::get('group') == 'T') {
            $portraits = 'hp_defalut_tea_female.png';
        }
        if (Input::get('sex') == 'F' && Input::get('group') == 'S') {
            $portraits = 'hp_defalut_stu_female.png';
        }
        if (Input::get('sex') == 'M' && Input::get('group') == 'T') {
            $portraits = 'hp_defalut_tea_male.png';
        }
        if (Input::get('sex') == 'M' && Input::get('group') == 'S') {
            $portraits = 'hp_defalut_stu_male.png';
        }
        $record = array(
            'username' => Input::get('username'),
            'name' => Input::get('name'),
            'sex' => Input::get('sex'),
            'salt'=>$salt,
            'password' => Hash::make(Input::get('password'),$salt),
            'joined'=>date('Y-m-d H:i:s'),
            'portraits' => $portraits,
            'group' => Input::get('group')
        );
        $user = new User();
        $count = $user->findWithUsername($record['username']);
        if ($count == false) {
            try{
                
                $user->create($record);
                $user_id = $user->lastInsert();
                $group = $record['group'];
                if ($group == 'S') {
                    try {
                        $student = new Student();
                        $student->create(array('user_id' => $user_id));
                    } catch (Exception $e) {
                        $e->getMessage();
                    };
                }
                else if ($group == 'T') {
                    try {
                        $teacher = new Teacher();
                        $teacher->create(array('user_id' => $user_id));
                    } catch (Exception $e) {
                        $e->getMessage();
                    };
                }
                
                $state = 'success';
                $stateNum = '100';
                $message = '成功创建账号';
            }catch(Exception $e){
                $state = 'failed';
                $stateNum = '101';
                $message = $e->getMessage();
            }
        }
        else {
            $state = 'failed';
            $stateNum = '102';
            $message = '重复创建账号';
        }
        
    }
    else {
        $message = null;
        foreach ($validation->errors() as $error) {
            $message .=  $error;
      
        }
        $state = 'failed';
        $stateNum = '103';
    }
    
    $result = array(
        'state' => $state,
        'stateNum' => $stateNum,
        'context' => $message
    );
    echo json_encode($result);
}

elseif ($type == 'fromExcel') {
    $fileID = 'file_stu';
//     echo json_encode($_FILES);
//     echo json_encode($_REQUEST);
    $excel = new Excel();
    $resultArr = array();
    $resultArr = $excel->importExcel($fileID);
    array_shift($resultArr);
//     echo $resultArr;
    $result = array(
        'state' => 'success',
        'successNum' => 0,
        'failedNum' => 0,
        'message' => array(),
    );
    if ($resultArr != false) {
        foreach ($resultArr as $value) {
            $salt = Hash::salt(32);
            $salt = Hash::salt(32);
            if ($value['C'] == 'F' && $value['D'] == 'T') {
                $portraits = 'hp_defalut_tea_female.png';
            }
            if ($value['C'] == 'F' && $value['D'] == 'S') {
                $portraits = 'hp_defalut_stu_female.png';
            }
            if ($value['C'] == 'M' && $value['D'] == 'T') {
                $portraits = 'hp_defalut_tea_male.png';
            }
            if ($value['C'] == 'M' && $value['D'] == 'S') {
                $portraits = 'hp_defalut_stu_male.png';
            }
            if (Input::get('passwordType') == 'default_password') {
                $record = array(
                    'username' => $value['A'],
                    'password' => Hash::make($value['A'],$salt),
                    'salt' => $salt,
                    'name' => $value['B'],
                    'sex' => $value['C'],
                    'joined' => date('Y-m-d H:i:s'),
                    'portraits' => $portraits,
                    'group' => $value['D']
                );
            }
            else {
                $record = array(
                    'username' => $value['A'],
                    'password' => Hash::make(Input::get('defined_password'),$salt),
                    'salt' => $salt,
                    'name' => $value['B'],
                    'sex' => $value['C'],
                    'joined' => date('Y-m-d H:i:s'),
                    'portraits' => $portraits,
                    'group' => $value['D']
                );
            }
            
            $user = new User();
            $count = $user->findWithUsername($record['username']);
            if ($count == false) {
                try{
                    $user->create($record);

                    $u = new User();
                    $newU = $u->findWithUsername($record['username']);
                    $user_id = $newU->data()->id;
                    $group = $u->find($user_id)->data()->group;
                    if ($group == 'S') {
                        try {
                            $student = new Student();
                            $student->create(array('user_id' => $user_id));
                        } catch (Exception $e) {
                            $e->getMessage();
                        };
                    }
                    else if ($group == 'T') {
                        try {
                            $teacher = new Teacher();
                            $teacher->create(array('user_id' => $user_id));
                        } catch (Exception $e) {
                            $e->getMessage();
                        };
                    }
                    $result['successNum'] += 1;
                }catch(Exception $e){
                    $result['failedNum'] += 1;
                    $result['message'][] = $record['username'] . ' : 重复创建账号';
                }
            }
            else {
                $result['failedNum'] += 1;
                $result['message'][] = $record['username'] . ' : 重复创建账号';
            }
            
        }
    }
    else {
        $result['state'] = 'failed';
        $result['message'] = $excel->getError();
    }
    
    echo json_encode($result);
}

else if($type == 'exportExcelModel') {
    $model = array(
        array('学号','姓名','性别（F表示女，M表示男）','身份（S表示学生，T表示老师）')
    );
    $excel = new Excel();
    $excel->exportExcel($model,"账号表模板");
}
// $result = array(
//     'state' => 'success',
//     'context' => 'success'
// );

// echo json_encode($result);
// if(Input::exists('post')){
//     if (Input::get('token')){
// 	    if ($_POST['submitreg'] == "createAccount")
// 	    {
// 	        $validate = new Validate();
// 	        $validation = $validate-> check($_POST,array(
// 	            'userreg' => array(
// 	                'name' =>'username' ,           //in the table
// 	                'required' => true,
// 	                'min' => 10,
// 	                'max' => 10,
// 	                'unique' => 'users',
// 	            ),
// 	            'name' => array(
// 	                'name' =>'name' ,
// 	                'required' =>false,
// 	                'min' => 2,
// 	                'max' => 50,
// 	            ),
// 	            'password_reg' => array(
// 	                'name' =>'password' ,
// 	                'required' =>true,
// 	                'min' => 6,
// 	            ),
// 	            'password_confirm' => array(
// 	                'name' =>'password_agan' ,
// 	                'required' => true,
// 	                'matches' => 'password_reg'
	            
// 	            ),
// 	        ));
// 	        if($validation->passed()){
// 	            $user = new User();
// 	            $salt = Hash::salt(32);
// 	            try{
// 	                $user->create(array(
// 	                    'username'=> Input::get('userreg'),
// 	                    'password'=>Hash::make(Input::get('password_reg'),$salt),
// 	                    'salt'=>$salt,
// 	                    'name'=>Input::get('name'),
// 	                    'joined'=>date('Y-m-d H:i:s'),
// 	                    'group'=> Input::get('group')
// 	                ));
// 	                Session::flash('home'  ,  'create account successfully');
// 	                echo "成功创建账号";
// 	                //Redirect::to('index.php');
// 	            }catch(Exception $e){
// 	                die($e->getMessage());
// 	            }
	        
// 	        } else {
// 	            foreach ($validation->errors() as $error) {
// 	                echo $error.'<br/>';
// 	            }
// 	        }
// 	    }
// 	    // 	        首先调用文件类将上传文件存储到服务器端，并返回存储路径和文件名
// 	    // 	        然后调用excel类读取出excel表格中的信息并返回一个数组
// 	    // 	        之后调用user中的create函数循环创建账号
// 	    //    显示不能创建的账号。
// 	    if ($_POST["submitreg"] == 'fromExcel') {
// 	        $excel = new Excel();
// 	        //可以设置保存文件的路径默认为 $path = './upfile/Excel';
// 	        // $excel->setPath($path);
//             $fileID = 'file_stu';
// 	        $resultArr = $excel->importExcel($fileID);
// 	        array_shift($resultArr);
// 	        $user = new User();
// 	        $salt = Hash::salt(32);

// 	       print_r($resultArr) ;
// 	        foreach ($resultArr as $value) {
// 	            if (Input::get('password') == 'default_password') {
// 	                $record = array(
// 	                    'username' => $value['A'],
// 	                    'password' => Hash::make($value['A'],$salt),
// 	                    'salt' => $salt,
// 	                    'name' => $value['B'],
// 	                    'joined' => date('Y-m-d H:i:s'),
// 	                    'group' => $value['C']
// 	                );
// 	            }
// 	            else {
// 	                $record = array(
// 	                    'username' => $value['A'],
// 	                    'password' => Hash::make(Input::get('defined_password'),$salt),
// 	                    'salt' => $salt,
// 	                    'name' => $value['B'],
// 	                    'joined' => date('Y-m-d H:i:s'),
// 	                    'group' => $value['C']
// 	                );
// 	            }
	            
// // 	            $validate = new Validate();
// // 	            $validation = $validate-> check($_POST,array(
// // 	                'userreg' => array(
// // 	                    'name' =>'username' ,           //in the table
// // 	                    'required' => true,
// // 	                    'min' => 10,
// // 	                    'max' => 10,
// // 	                    'unique' => 'users',
// // 	                ),
// // 	                'name' => array(
// // 	                    'name' =>'name' ,
// // 	                    'required' =>false,
// // 	                    'min' => 2,
// // 	                    'max' => 50,
// // 	                ),
// // 	                'password_reg' => array(
// // 	                    'name' =>'password' ,
// // 	                    'required' =>true,
// // 	                    'min' => 6,
// // 	                ),
// // 	                'password_confirm' => array(
// // 	                    'name' =>'password_agan' ,
// // 	                    'required' => true,
// // 	                    'matches' => 'password_reg'
	      
// // 	                ),
// // 	            ));
	            
// 	        	try{
// 	        		$user->create($record);
// 	        		Session::flash('home' , "create {$record['username']} account successfully");
// 	        		echo Session::get('home');
// 	        	}catch(Exception $e) {
// 	        		die($e->getMessage());
// 	        	}
// 	        }

// 	    }
// 	}
// }
