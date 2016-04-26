<?php
class CourseInfo {
    private $_courseIntroduce;
    private $_teachingEnvironment;
    private $_teachingProgram;
    private $_db;
    private $_tableName;
    public function __construct() {
        $this->_tableName = 'course_info';
        $this->_db = DB::getInstance();
    }
    public function update($choose, $context) {
        $field = array(
            $choose => $context
            
        );
        $this->_db->get($this->_tableName);
        
        if ($this->_db->count() == 0) {
            try {
                $this->_db->insert($this->_tableName, $field);
            } catch (Exception $e) {
                return $this->_db->error();
            }
            return $this->_db->count();
        }
        else {
            try {
                $this->_db->update($this->_tableName, 1, $field);
            } catch (Exception $e) {
                return $this->_db->error();
            }
            return $this->_db->count();
        }	        	
    }
    
    public function get(){
        $res = $this->_db->get($this->_tableName);
        if ($this->_db->count() == 0) {
            return false;
        }
        $res = $res->first();
        
        $this->_courseIntroduce = $res->course_introduce;
        $this->_teachingEnvironment = $res->teaching_environment;
        $this->_teachingProgram = $res->teaching_program;
        return true;
       // echo  $this->_teachingProgram;
    }
    
    public function getCourseIntroduce() {
        if ($this->get()) {
             return $this->_courseIntroduce;
        }
        else {
            return '(＞﹏＜)管理员还没有写';
        }
       
    }
    
    public function getTeachingEnvironment() {
        if ($this->get()) {
            return $this->_teachingEnvironment;
        }
        else {
            return '(＞﹏＜)管理员还没有写';
        }
    }
    
    public function getTeachingProgram() {
        if ($this->get()) {
            return $this->_teachingProgram;
        }
        else {
            return '(＞﹏＜)管理员还没有写';
        }
    }
}