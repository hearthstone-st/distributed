<?php
	class Post{

		private $_db,
				$_data,
				$_postReplys;

		public function __construct(){
			$this->_db = DB::getInstance();
		}
		public function create($fields = array()){
	        if (!$this->_db->insert('post', $fields)) {
	            throw new Exception('There was a problem creating an item.');
	        }        	
		}
//         public function delete($ID = null){
//         	if(!$this->_db->delete('post',array('ID','=', $ID))){

// 	            if (!$this->_db->insert('post', $fields)) {
// 	                throw new Exception('There was a problem creating an item.');
// 	            }        	
// 	        }
        public function delete($id = null){
        	if(!$this->_db->delete('post',array('id','=', $id))){

        		throw new Exception('There was a problem deleting the item.');
        	}
        }
        public function update($id,$fields){
        	if(!$this->_db->update('post',$id,$fields)){
        		throw new Exception('There was a problem updating the item.');
        	}	        	
        }	        
        public function findAll(){
            $data = $this->_db->get('post');
            if ($data->count()) {
                $this->_data = $data->results();
                return $this;
            }else return false;  
        }
        public function findLimitOrder($limit,$orderBy,$orderType){
            $data = $this->_db->getLimitOrderby("post", $limit, $orderBy, $orderType);
            if ($data->count()) {
                $this->_data = $data->results();
                return $this;
            }else return false;  
        }
        public function findWhereLikeLimitOrder($where=array(),$limit,$orderBy,$orderType){
            $data = $this->_db->findWhereLikeLimitOrder("post",$where, $limit, $orderBy, $orderType);
            if ($data->count()) {
                $this->_data = $data->results();
                return $this;
            }else return false;  
        }
        public function find($id = null){
        	$data = $this->_db->get('post', array('id', '=', $id));
            if ($data->count()) {
                $this->_data = $data->first();
                return $this;
            }else return false;	        	
        }
        public function data(){
        	return $this->_data;
        }
        public function lastInsert(){
        	if(!$this -> _db->query ('SELECT LAST_INSERT_ID() as id')->error()){
				$result = $this->_db->results();
			}
      		
      		
        	return $result[0]->id;
        }


	}

?>