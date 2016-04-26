<?php
        class User {
            protected $_db,
                    $_data,
                    $_sessionName,
                    $_cookieName,
                    $_tableName,
                    $_isLoggedIn;

            public function __construct($user = null) {
                $this->_db = DB::getInstance();
                $this->_tableName = 'user';
                $this->_sessionName = Config::get('session/session_name');
                $this->_cookieName = Config::get('remember/cookie_name');

                if (!$user) {
                    if (Session::exists($this->_sessionName)) {
                        $user = Session::get($this->_sessionName);

                        if ($this->find($user)) {
                            $this->_isLoggedIn = true;
                        } else {
                        $this->logout();
                        }
                    }
                } else {
                    $this->find($user);
                }
            }

            public function update($fields = array(), $id = null) {

                if (!$id && $this->isLoggedIn()) {
                    $id = $this->data()->id;
                }

                if (!$this->_db->update($this->_tableName, $id, $fields)) {
                    throw new Exception('There was a problem updating');
                }
            }

            public function create($fields = array()) {
                if (!$this->_db->insert($this->_tableName, $fields)) {
                    throw new Exception('There was a problem creating an account.');
                }
            }
            
            public function lastInsert(){
                if(!$this -> _db->query ('SELECT LAST_INSERT_ID() as id')->error()){
                    $result = $this->_db->results();
                }
                return $result[0]->id;
            }
            

            public function find($user = null) {
                if ($user) {
                    $field = (is_numeric($user)) ? 'id' : 'username';
                    $data = $this->_db->get('user', array($field, '=', $user));

                    if ($data->count()) {
                        $this->_data = $data->first();
                        return $this;
                    }
                }
                return false;
            }
            

            public function findWithUsername($user = null) {
                if ($user) {
                    $field = 'username';
                    $data = $this->_db->get('user', array($field, '=', $user));

                    if ($data->count()) {
                        $this->_data = $data->first();
                        return $this;
                    }
                }
                return false;
            }
            public function findLike($user = null) {
                if ($user) {
                    $field = (is_numeric($user)) ? 'username' : 'name';
                    $data = $this->_db->get('user', array($field, 'like', '%'.$user.'%'));

                    if ($data->count()) {
                        $this->_data = $data->results();
                        return $this->_db->count();
                    }
                }
                return false;
            }
            
            public function adminLogin($adminId, $adminPassword) {
                $user = $this->find($adminId);
                if($user){
                    if ($user->data()->password === Hash::make($adminPassword, $user->data()->salt)){
                        if ($user->data()->group == 'M') {
                            Session::put("adminSession", $user->data()->id);
                            Session::put("loginTime", time());
                            return "success";
                        }else{
                            return "roleFalse";

                        }
                    }   
                }
                return "loginFalse";
            }
            
            public function delete($field) {
                if ($field) {
                    try {
                        $this->_db->delete('user', $field);
                    } catch (Exception $e) {
                        die($e->getMessage());
                        return false;
                    }
                    return $this->_db->count();
                }
                return false;
            }
            
            public function login($username = null, $password = null, $remember = false) {  

                if (!$username && !$password && $this->exists()) {
                    Session::put($this->_sessionName, $this->data()->id);
                } else {
                   
                    $user = $this->findWithUsername($username);
                    if ($user) {
                         //var_dump($this->data()->password );
                       //  var_dump($this->data()->salt );
                        // var_dump(Hash::make($password, $this->data()->salt));
                        // die();
                        if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
                            Session::put($this->_sessionName, $this->data()->id);

                            if ($remember) {
                                $hash = Hash::unique();
                                $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

                                if (!$hashCheck->count()) {
                                    $this->_db->insert('users_session', array(
                                        'user_id' => $this->data()->id,
                                        'hash' => $hash
                                    ));
                                } else {
                                    $hash = $hashCheck->first()->hash;
                                }

                                Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));

                            }

                            return true;        
                        }
                    }
                }

                return false;
            }

            public function hasPermission($key) {
                $group = $this->_db->get('groups', array('id', '=', $this->data()->group));

                if ($group->count()) {
                    $permissions = json_decode($group->first()->permissions, true);
                 
                    
                    if ($permissions[$key] == true) {
                        return true;
                    }
                }
                return false;
            }

            public function exists() {
                return (!empty($this->_data)) ? true : false;
            }

            public function logout() {

                $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));
                Session::delete("adminSession");
                Session::delete("loginTime");

                Session::delete($this->_sessionName);
                Cookie::delete($this->_cookieName);
            }

            public function data() {
                return $this->_data;
            }

            public function isLoggedIn() {
                return $this->_isLoggedIn;
            }
            public function taskFindAll()
            {
                $task=new DBTask();
                return $task->findAll();
            }
            public function taskFindById($id)
            {
                $task=new DBTask();
                return $task->findById($id);
            }
            public function findCreateMan($id)
            {
                $dbuser=new DBUser();
                $data=$dbuser->findByID($id);
                if($data) return $data[0]->name;
            }
            public function taskFindTaskFiles($taskId)
            {
                $f = new DBFile();
                return $f->findFile($taskId);
            }
            public function findCalender()
            {
                $task = new DBTask();
                $data = $task->findAll();
                $array = array();
                for ($i=0; $i < count($data); $i++) { 
                    $date = strtotime($data[$i]->start_time);
                    $date = date('m-d-Y',$date);
                    if(!isset($array[$date])) $array[$date] = "";
                    $array[$date] .= "<a href='taskdetail.php?taskmark=".$data[$i]->id."'>".$data[$i]->title."</a>";
                }
                // var_dump($array);
                return json_encode($array);
            }
            public function wareFindByAnd($fields,$ops,$values)
            {
                $materials = new DBMaterials();
                return $materials->findByAnd($fields,$ops,$values);
            }
            public function findStudent()
            {
                $dbstudent=new DBUser();
                return $dbstudent->findByAnd(array('user.group'),array('='),array('S'));
            }
            public function findMaterailStudent($taskID)
            {
                $db=new DBTaskSubmit();
                return $db->findByAnd(array('task_id'),array('='),array($taskID));
            }
            public function downfile($fileurl)
            {
             ob_start(); 
             $filename=$fileurl;
             $name=substr($filename,strrpos($filename, "/")+1);
             $date=date("Ymd-H:i:m");
             header( "Content-type:  application/octet-stream "); 
             header( "Accept-Ranges:  bytes "); 
             header( "Content-Disposition:  attachment;  filename= $name"); 
             $size=readfile($filename); 
              header( "Accept-Length: " .$size);
            }
        }