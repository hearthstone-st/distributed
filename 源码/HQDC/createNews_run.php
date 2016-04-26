<?php
require_once "core/init.php";
$user = new User();
$type = $_POST['type'];
$title = $_POST['title'];
$context = $_POST['context'];
$upload_time = date("Y-m-d h:i:s");

//上传人怎么取得
// $upload_people = "chenxiaolei";

$fields = array(
    'title' => $title,
    'context' => $context,
    'upload_time' => $upload_time,
    'type' => $type,
    'upload_people' => $user->data()->name
);

$news = new News();
$mes = $news->insertInfo($fields);

if ($mes == 1) {
    $state = 'success';
    $message = 'Submit Success!';
}
else {
    $state = 'failed';
    $message = 'Submit Failed';
}

$result = array(
    'state' => $state,
    'message' => $message
);

echo json_encode($result);