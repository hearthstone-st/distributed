<?php
	class Privilege{
		private $_db,$_role,$_result;
		public function __construct(){
			
			$this->_db = DB::getInstance();

		}
		public function hasPermission($user,$page){

		}
		public function judge($user){
			$teacher = new teacher();
			$student = new student();
			if($user->isLoggedIn()){
				if($user->data()->group=='M'){
					$this->_result = 'admin';
				}
				// else if($teacher->findByUser($user->data()->id)){
				// 	$this->_result = 'teacher';
				// }else if($student->findByUser($user->data()->id)){
				// 	$this->_result = 'student';
				// }
				else if($user->data()->group=='T'){
					$this->_result = 'teacher';
				}else if($user->data()->group=='S'){
					$this->_result = 'student';
				}else{
					$this->_result = 'user';
				}


			}else{
				$this->_result = 'tourist';
			}
			return $this->_result;
		}
	}
?>


