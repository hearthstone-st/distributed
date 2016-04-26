<?php
/**
* 
*/
class Student extends User
{
	private $_info;
	public $_homework;
	function __construct($user = null)
	{
		parent::__construct($user);
		$this->_tableName = "student";
		if(parent::isLoggedIn()){
			$this->_homework = new Homework();
			if($this->findInfo($this->_data->id))
			{
				$this->_isLoggedIn = true;
			}
			else
			{ 
				// echo "<script>alert('权限不足');location.href='admin.php';</script>";
			}	
		}
		
	}

	function findInfo($user)
	{
		if ($user) {
		    $field = 'teacher_id';
		    $data = $this->_db->get('student', array($field, '=', $user));
		    if ($data!=null&&$data->count()) {
		        $this->_info = $data->first();
		        return true;
		    }
		}
		return false;
	}
	function findByUser($userId){
		if ($userId) {
		    $field = 'user_id';
		    $data = $this->_db->get('student', array($field, '=', $userId));
		    if ($data!=null&&$data->count()) {
		        $this->_info = $data->first();
		        return $this;
		    }
		}
		return false;

	}	
	function getInfo()
	{
		return $this->_info;
	}
}
?>