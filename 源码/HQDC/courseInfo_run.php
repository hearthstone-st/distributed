<?php
require_once "core/init.php";

$choose = $_POST['choose'];
$context = $_POST['context'];
$courseInfo = new CourseInfo();
$mes = $courseInfo->update($choose,$context);
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
