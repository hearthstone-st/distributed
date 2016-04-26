<?php

$action = isset($_GET['act']) ? trim($_GET['act']) : '';
if($action=='delimg'){
	$filename = $_POST['imagename'];
	if(!empty($filename)){
		unlink('upfile/postImages/'.$filename);
		echo '1';
	}else{
		echo '删除失败.';
	}
}else{
	$picname = $_FILES['postPic']['name'];
	$picsize = $_FILES['postPic']['size'];
	if ($picname != "") {
		if ($picsize > 1024000) {
 			echo '图片大小不能超过1M';
			exit;
		}
		$type = strstr($picname, '.');
		if ($type != ".gif" && $type != ".jpg" && $type != ".png") {
 			echo '图片格式不对！';
			exit;
		}
		$rand = rand(100, 999);
		$pics = date("YmdHis") . $rand . $type;
		//上传路径
		$pic_path = "upfile/postImages/". $pics;
		move_uploaded_file($_FILES['postPic']['tmp_name'], $pic_path);
	}
	$size = round($picsize/1024,2);
	$arr = array(
	    'name'=>$picname,
	    'pic'=>$pics,
	    'pic_path' => $pic_path,
	    'size'=>$size
	);
	$arr = json_encode($arr);
	echo $arr;
	
}
?>