<?php
class Info {
    protected $_db;
    protected $_tableName;
    function __construct() 
    {
        $this->_db = DB::getInstance();
        
    }
    public function setTableName($tableName) {
        $this->_tableName = $tableName;
    }
    
    public function insertInfo($fields) {
        try {
            if($this->_db->insert($this->_tableName, $fields)) {
                return true;
            }
            else {
                return false;
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
            return $message;
            return false;
        }
    }
    public function find($id) {
        try {
            $this->_db->get($this->_tableName,array('id','=',$id));
        } catch (Exception $e) {
            $e->getMessage();
        }
        
        return $this->_db->first();
    }
    public function getInfo() {
        try {
            $this->_db->get($this->_tableName);
        } catch (Exception $e) {
            $e->getMessage();
        }
        
        return $this->_db->results();
    }
    
    public function getInfoByID($id) {
        try {
            $this->_db->get($this->_tableName,array("id","=",$id));
        } catch (Exception $e) {
            $e->getMessage();
        }
    
        return $this->_db->first();
    }
    
    public function deleteInfo($id) {
        $where = array('id' => $id);
        try {
            if ($this->_db->delete($this->_tableName, $where)) {
                return true;
            }
            else 
                return false;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}