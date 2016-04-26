<?php
	class Message{
		private $_messageArray = Array(),
				$_calendarArray = Array() ,
				$_replyArray = Array(),
				$_db,
				$_user;

		public function __construct(){
			$this->_db = DB::getInstance();
			$this->_user = new User();
		}

		public function getMessage(){
			if($this->_user->isLoggedIn()){
				$task = new DBTask();
				$reply = new DBReply();
				$taskSubmit = new TaskSubmit();
				//$date = new Date();
				$date = strtotime('now');
				$date1 = $date+24*3600;
				
				
				$taskArray = $task->findWithDateBetween($date,$date1);	//在task里寻找截止时间在$date和$date+1的；
				if($taskArray)foreach ($taskArray as $key => $value) {

					if(!$taskSubmit->findWithUserAndTask($this->_user->data()->id,$value->id)){//查找数据库里有没有改学生提交作业的记录
						
						array_push($this->_calendarArray, $value); 
						$message = '';
						if($this->_user->data()->group=="S"){
							if($value->type=="H"){
								$message = "您的实验尚未完成，该试验为".$value->title;
							}else if($value->type == "E"){
								$message = "您的作业尚未完成，该作业为".$value->title;
							}	
						$array = Array(
							'type' => 'task',
							'taskId' => $value->id,
							'message' => $message
							);

						array_push($this->_messageArray, $array); 
						}
						


					}
				}

				$replyArray = $reply->findWithIdNotRead($this->_user->data()->id);

				if($replyArray){
					foreach ($replyArray as $key => $value) {
						# code...
						
						$sender = $this->_user->find($value->sender)->data()->name;
						$array = Array(
							'type' => 'post',
							'replyId' => $value->id,
							'postId' => $value->post_id,
							'message' => $sender."在论坛帖子中回复了你"
							);
						array_push($this->_replyArray, $value); 
						array_push($this->_messageArray, $array);
					}
						 
					
				}

			return $this->_messageArray;	
			}else{
				return false;
			}



		}

	
	}
?>