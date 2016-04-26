<?php
class Notice extends Info{
    public function __construct() {
        $this->_db = DB::getInstance();
        $this->setTableName("notice");
    }
}