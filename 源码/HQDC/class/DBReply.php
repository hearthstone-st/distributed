<?php
/**
* 
*/
class DBReply extends DBTable
{
	
	function __construct()
	{
		parent::__construct();
		$this->_tablename='post_reply';
	}
	public function findWithIdNotRead($id){
		$data = $this->_db->action('select *',$this->_tablename,array('receiver','=',$id,'and','is_readed','=','0'));
		if($data&&$data->count()){
			return $data->results();
		}
		else return false;

	}
	public function findWithPost($postId){
		$data = $this->_db->get('post_reply',array('post_id',"=",$postId));
        if ($data->count()) {
            $this->_data = $data->results();
            return $this;
        }else return false; 
	}
	public function deletePost($postId){
		if($this->findWithPost($postId)){
			$results = $this->data();
			foreach ($results as $key => $value) {
				# code...

				if(!$this->delete($value->id)){
					return false;
				}


			}
			return true;
		}
		return true;

	}
}
?>