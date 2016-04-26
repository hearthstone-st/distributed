<?php
require_once 'core/init.php';

if (Input::exists('post')) {
    //取得参数
    $title = $_POST['title'];
    $start_time = date("Y-m-d h:i:s");
    $end_date = Input::get('end_date');
    $end_time=$_POST['end_time'];
    $context = $_POST['context'];
    $type= $_POST['type'];
    $accessory = $_FILES['inputFile'];
    $end_time = $end_date . ' ' . $end_time .':00';
    
    $file_id = '2;3';
    $fields = array(
        'title' => $title,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'type' => $type,
        'context' => $context,
        'file_id' => $file_id
    );
    //验证参数
    $validate = new Validate();
    $validation = $validate-> check($fields,array(
        'title' => array(
            'name' =>'title' ,           //in the table
            'required' => true
        ),
        'context' => array(
            'name' =>'title' ,
            'required' =>true
        ),
        'end_time' => array(
            'name' => 'end_time',
            'required' => true
        )
    ));
    
    //创建任务(插入数据库)
    if ($validation->passed()) {
        $task = new Task();
        $flag = $task->createTask($title, $start_time, $end_time, $type, $context, $accessory);
        if($flag == true) {
            $page = 'newTask.php';
            echo "<script>alert('成功创建任务');window.location = \"".$page."\";</script>";
        }
        else if($flag == false){
            echo "<script>alert('创建任务失败');history.go(-1);</script>";
        }
        else {
            echo "<script>alert('异常错误：'".$flag.");</script>";
        }
    }
    else {
        echo "<script>alert('请检查输入是否正确！');history.go(-1);</script>";
    }
}



