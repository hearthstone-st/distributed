<?php

class TaskSubmit {
    private $_db,
            $_tableName,
            $_data,
            $_result;
    
    
    
    public function __construct() {
        $this->_tableName = 'task_submit';
        $this->_db = DB::getInstance();
    }
    public function findWithTaskId($id = null){
            $data = $this->_db->get('task_submit', array('task_id', '=', $id));
            if ($data->count()) {

                $this->_data = $data->results();
                return $this;
            }else return false;             
        }
    public function findWithUserAndTask($userId,$taskId){
        $data = $this->_db->action('select *','task_submit',array('user_id','=',$userId,'and','task_id','=',$taskId));
        if($data->count()){
            return $data->first();
        }
        else return false;
    }
    
    public function update($data) {
        
        foreach ($data as $key => $value) {
            $id = array_shift($value);
            if(!$this->_db->update($this->_tableName,$id,$value)){
                return false;
            }

        }
        return true;
    }
    public function data(){
            return $this->_data;
        }
    public function get() {
        $data = $this->_db->get($this->_tableName);
        $this->_result = $data->results();
    }
   
    
}
?>