<?php
class News extends Info{
    
    public function __construct() {
        $this->_db = DB::getInstance();
        $this->setTableName("news");
    }
}