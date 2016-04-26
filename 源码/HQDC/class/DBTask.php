<?php
/**
* 
*/
class DBTask extends DBTable
{
	
	function __construct()
	{
		parent::__construct();
		$this->_tablename='task';
	}

	public function findWithDateBetween($date1,$date2){
		$data = $this->_db->action('select *',$this->_tablename,array('end_time','>',$date1,'and','end_time','<=',$date2));
		if($data->count()){
			return $data->results();
		}
		else return false;
	}
}
?>