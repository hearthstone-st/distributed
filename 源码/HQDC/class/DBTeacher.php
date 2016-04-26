<?php
/**
* 
*/
class DBTeacher extends DBTable
{
	
	function __construct()
	{
		parent::__construct();
		$this->_tablename='teacher';
	}
	
	function getAllIntroduce() {
	    $sql = "select name, portraits, professional_title, main_job, research_achievements, record_information from user, teacher where (user.group = 'T') and (user.id = teacher.user_id)";
	    $this->_db->query($sql);
        if ($this->_db->count() > 0 ) {
            return $this->_db->results();
        }
        else {
            return false;
        }
	    
	}
}
?>