<?php
require_once 'core/init.php';
$user = new User();

if(Input::exists('post')&& $user->isLoggedIn()){

    if($user->data()->group=="T"){
        $data = Input::get('data');
        //var_dump($data);
        $task = new DBTask();
        $flag = true;

        foreach ($data as $key => $value) {
            # code...
            
            try {
                $task->update(array('importance' => $value['importance'] ),$value['id']);
            } catch (Exception $e) {
               //echo $e.getMessage(); 
               $flag=false; 
            }
        } 
        
        if($flag==true){
            echo 'success';
        }else{
            echo 'later';
        }
    }else echo "noRight";
	

}else echo 'noLogin';

?>