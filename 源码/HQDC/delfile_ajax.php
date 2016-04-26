<?php
require_once 'core/init.php';

if(Input::exists('post'))
{
	$filepath = Input::get('filepath');
	if(isset($filepath))
	{
		if(FileUtils::Delete($filepath)) echo $filepath;
	}
}
?>