<?php
require_once "core/init.php";
$user = new User();
$id = Input::get('id');

if (is_numeric($id)) {
    $field = array('id', '=', $id);
}
else {
    $arr = array(
        'message' => '无法删除'
    );
    echo json_encode($arr);
}
$flag = $user->delete($field);

$arr = array(
    'message'=>'删除成功'
);
echo json_encode($arr);