<?php
require_once 'core/init.php';
$user = new User();
$user->logout();
Session::flash('index',"注销成功");
Redirect::to('index.php');