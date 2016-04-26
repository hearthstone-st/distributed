<?php
class Homework
{
	private $_dbSubmit;
	function __construct()
	{
		$this->_dbSubmit = new DBTaskSubmit();
	}
	public function submit($file,$fields = array())
	{
		
		$rs=FileUtils::UpLoadNoReplace("upload/homework",$file);
		$this->_dbSubmit->replace($fields);
	}
	public function findSubmitByStudentTaskId($studentId,$taskId)
	{
		return $this->_dbSubmit->findByAnd(array('user_id','task_id'),array('=','='),array($studentId,$taskId));
	}
}
?>