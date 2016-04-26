<?php
require_once 'core/init.php';
$user = new User();
$result = array(
    'state' => 'success',
    'message' => ''
);
if (!$user->isLoggedIn()) {
    Redirect::to(login.php);
}
else if (Input::exists('post')) {
     $admin_password = Input::get('admin_password');
     $flag = $user->adminLogin($user->data()->id, $admin_password);
     if ($flag=='success') {
         $result['state'] = 'success';
         $result['message'] = "验证成功";
         
     }
     else if($flag=='roleFalse'){
         $result['state'] = 'failed';
         $result['message'] = "验证失败，你不是管理员！";
         
     }else if($flag=="loginFalse"){
        $result['state'] = 'failed';
        $result['message'] = "验证失败，请确认密码！";
     }
     
     echo json_encode($result);
}
