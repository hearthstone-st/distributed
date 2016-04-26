<?php
require_once "core/init.php";
$user = new User();
$data = Input::get('data');

$res = $user->findLike($data);
if($res > 0){
    $resArray = Array();
    $resData = $user->data();  
    foreach ($resData as $key => $value){       
        $array =Array(
            'username' =>  $value->username,
            'name' => $value->name,
            'joined' => $value->joined,
            'group' => $value->group,
            'id' => $value->id
        ); 
        array_push($resArray, $array);
    }
    $result = $resArray;
    echo json_encode($result);
}
else{
    $result = Array(
        'state' => 'no user');
    echo json_encode($result);
}