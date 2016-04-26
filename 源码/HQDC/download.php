<?php
require_once 'core/init.php';

if(Input::exists('get'))
{
	$user = new User();
	$filepath = Input::get('path');
	$fileName = Input::get('name');
	$user->downfile($filepath);
}
?>