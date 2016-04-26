<?php
/**
* 
*/
class TaskOperation
{
	private $_dbtask;

	function __construct()
	{
		$this->_dbtask = new DBTask();
	}

	public function taskCreate($fields = array())
	{
		$this->_dbtask->create($fields);
	}
	public function taskUpdate($fields = array(),$id)
	{
		$this->_dbtask->update($fields,$id);
	}
	public function taskDelete($id)
	{
		$this->_dbtask->delete($id);
	}
	public function taskFindByAnd($fields,$ops,$values)
	{
		return $this->_dbtask->findByAnd($fields,$ops,$values);
	}
	public function fileFindById($id)
	{
		$f = new DBFile();
		return $f->findById($id);
	}
	public function deleteFile($id)
	{
		$f = new DBFile();
		$data=$this->fileFindById($id);
		if($data!=null) $filename=$data[0]->url;
		if($f->delete($id))
		{
			if(FileUtils::Delete($filename))
			{
				return true;
			}
		}
		return false;
	}
	public function upfile($file,$fields)
	{
		$rs=FileUtils::upfile($file,true);
		if($rs != false)
		{
			$fields['name'] = $rs;
			$fields['url'] = FileUtils::GetPath()."/".$fields['name'];
		}
		$this->insertFile($fields);
		return $fields;
	}
	public function insertFile($fields)
	{
		$f = new DBFile();
		if(!isset($fields['task_id'])) $fields['task_id']= $this->_dbtask->lastInsert();
		$f->create($fields);
	}
	public function getLastId()
	{
		return $this->_dbtask->lastInsert();
	}
}
?>