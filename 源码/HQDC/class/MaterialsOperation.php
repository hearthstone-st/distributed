<?php
class MaterialsOperation
{
	private $_dbmaterials;
	function __construct()
	{
		$this->_dbmaterials = new DBMaterials();
	}
	public function taskFindAll()
	{
		return $this->_dbmaterials->findAll();
	}
	function uploadWare($file,$fields)
	{
		$rs=FileUtils::UpWare($file,true);
		if($rs != false) $fields['title']=$rs;
		$this->_dbmaterials->create($fields);
	}
}
?>