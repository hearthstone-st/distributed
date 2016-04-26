<?php
require_once "core/init.php";
$taskSubmit = new TaskSubmit();
$data = Input::get('data');
$success = Array("info"=>"success");
$fail = Array("info"=>"fail");
//echo json_encode($data);

if ($taskSubmit->update($data)) {
    echo json_encode($success);
}
else {
    echo json_encode($fail);
}