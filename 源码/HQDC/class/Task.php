<?php
class Task{
    protected $_db;
    protected $_tableName;
    
    public function __construct() {
        $this->_db = DB::getInstance();
        $this->_tableName = 'task';
    }

    public function createTask($fields) {
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
    
}