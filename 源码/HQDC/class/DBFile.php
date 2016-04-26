<?php
/**
* 
*/
class DBFile extends DBTable
{
	
	function __construct()
	{
		parent::__construct();
		$this->_tablename='file';
	}
	public function getTime()
	{
		
	}
	public function findFile($taskId)
	{
		$data = $this->_db->get($this->_tablename, array("task_id","=",$taskId));
        if ($data != false && $data->count()) {
            //$this->_data = $data->first();
            return $data->results();
        }
	}
}
?>