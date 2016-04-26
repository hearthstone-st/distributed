<?php
require_once 'core/init.php';
$res["error"] = "";//错误信息
$res["msg"] = "";//提示信息
$teacher = new Teacher();
try{
    $file = Input::getFile('inputFile');
    if ($file['error']>0) {
        $res["error"] = "error";
    }
    else {
        $rs=FileUtils::upfile($file,true);
        if($rs != false)
		{
        	$res["msg"] = $rs;
        	$res["url"] = FileUtils::GetPath()."/".$file['name'];
        }
    }
}catch(Exception $e){
    $res["error"] = "error:".$e->getMessage();
}
echo json_encode($res);
?>