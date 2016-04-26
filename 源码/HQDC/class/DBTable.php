<?php
class DBTable{
	protected $_db,
	        $_data,
	        $_tablename;

	function __construct() 
	{
	    $this->_db = DB::getInstance();
	}

	public function update($fields = array(), $id = null) 
	{
	    if (!$this->_db->update($this->_tablename, $id, $fields)) {
	        throw new Exception("There was a problem updating in $this->_tablename.");
	    }
	}

	public function create($fields = array()) 
	{
	    if (!$this->_db->insert($this->_tablename, $fields)) {
	        throw new Exception("There was a problem inserting in $this->_tablename");
	    }
	    return true;
	}

	public function replace($fields = array()) 
	{
	    if (!$this->_db->replace($this->_tablename, $fields)) {
	        throw new Exception("There was a problem inserting in $this->_tablename");
	    }
	    return true;
	}

	public function findByID($id) 
	{
        $data = $this->_db->get($this->_tablename, array("id","=",$id));
        if ($data != false && $data->count()) {
            //$this->_data = $data->first();
            return $data->results();
        }
        else return false;	 
	}
	public function findByAnd($fields,$ops,$values)
	{
		$sql="select * from ".$this->_tablename;
		$data = $this->_db->findByAnd($sql, $fields,$ops,$values);
        if ($data && $data->count()) {
            //$this->_data = $data->first();
            return $data->results();
        }
        else return null;	
	}
	public function findAll()
	{
		$sql="select * from ".$this->_tablename;
		$data = $this->_db->query($sql, null);
        if ($data != false && $data->count()) {
            //$this->_data = $data->first();
            return $data->results();
        }
        else return false;	 
	}
	public function delete($ID = null)
	{
		if(!$this->_db->delete($this->_tablename,array('ID','=', $ID))){
			throw new Exception('There was a problem deleting the file.');
			return false;
		}
		return true;

	}
	public function data(){
		return $this->_data;
	}
    public function lastInsert(){
    	if(!$this->_db->query ('SELECT LAST_INSERT_ID() as ID')->error()){
			$result = $this->_db->results();
		}
    	return $result[0]->ID;
    }
}
?>