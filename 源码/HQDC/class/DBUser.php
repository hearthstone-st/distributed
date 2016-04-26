<?php
class DBUser extends DBTable
{
	
	function __construct()
	{
		parent::__construct();
		$this->_tablename='user';
	}
}
?>