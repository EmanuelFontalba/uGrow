
<?php 

	class User
    {
		private $_id;
		private $_name;
        private $_lastname;
		private $_user;
		private $_password;
		private $_email;
        private $_birthdate;
        private $_trades;
        private $_rating;
        private $_picture;
        private $_description;
        private $_location;
        private $_register;
        private $_city;
		private $_conexion;
        
		public function __construct()
		{
			$this->_conexion = new Conexion();
		}
		
        public function register($name, $lastname, $user, $password, $email, $birthdate, $description, $location, $city)
        {
            $users = $this->getAllUsers();
            foreach ($users as $value) {
                if($value['user']==$user){return false;}
            }
            mkdir("users/".$user);//crea directorio para cada usuario
            $this->set_name($name);
            $this->set_lastname($lastname);
            $this->set_user($user);
            $this->set_password(md5($password));
            $this->set_email($email);
            $this->set_birthdate($birthdate);
            $this->set_trades(0);
            $this->set_rating(0);
            $this->set_picture("");
            $this->set_description($description);
            $this->set_location($location);
            $this->_city = $city;
            $this->set_register();
            $this->setUserBD();
            return true;
        }

        public function login($user, $password){
            $userBD = $this->getUser_forUserName($user);
            if(!empty($userBD)){
                if ($userBD[0]['pass']==md5($password)) {
                    return true;
                }
            }
            return false;
        }

        public function modify($user, $name="", $lastname="", $new_user="", $password="", $email="", $birthdate="", $description="", $location="")
        {
            $user_obj = new User();
            $user_obj = $user_obj->getUser_forUserName($user);

            if(empty($user_obj)){
                return false;
            }

            if($name==""){ $name=$user_obj['name'];}
            if($lastname==""){ $lastname=$user_obj['lastname'];}
            if($new_user==""){ $new_user=$user_obj['user'];}
            if($password==""){ $password=$user_obj['password'];}
            else{
                $password=md5($password);
            }
            if($email==""){ $email=$user_obj['email'];}
            if($birthdate==""){ $birthdate=$user_obj['birthdate'];}
            if($description==""){ $description=$user_obj[0]['description'];}
            if($location==""){ $location=$user_obj['location'];}

            $this->_conexion->query(MODIFY_USER, array(":name" => $name, ":lastname" => $lastname, ":new_user" => $new_user, ":password" => $password, ":email" => $email, ":birthdate" => $birthdate, ":description" => $description, ":location" => $location, ":user" => $user));

            return true;
        }

        private function setUserBD()
        {
            $this->_conexion->query(INSERTAR_USUARIO, array(":user" => $this->get_user(), ":password" => $this->get_password(),":name" => $this->get_name(), "lastname" => $this->get_lastname(),
                 ":email" => $this->get_email(), ":birthdate" => $this->get_birthdate(),
                ":trades" => $this->get_trades(), ":rating" => $this->get_rating(), ":picture" => $this->get_picture(),
                ":description" => $this->get_description(), ":location" => $this->get_location(), ":register" => $this->get_register(), ":city" => $this->_city));
        }

        private function getAllUsers()
        {
            return  $this->_conexion->query(TODOS_USUARIOS_USER, array());
        }

        public function getUser_forUserName($user)
        {
            return $this->_conexion->query(GET_USER_USERNAME, array(":user"=>$user));
        }

        public function getUser_forId($id)
        {
            return $this->_conexion->query(GET_USER_ID, array(":id"=>$id));
        }

        public function close_account($id)
        {
            return $this->_conexion->query(CLOSE_ACCOUNT, array(":id"=>$id));
        }

        public function get_for_location($dir)
        {
            return $this->_conexion->query(GET_USER_ID_FOR_DIR, array(":idCity"=>$dir));
        }

        public function getAllUser_forId($id){
            return $this->_conexion->query(GETALL_USER_ID, array(":id"=>$id));

        }

        

        //setters and getters

        public function get_id()
        {
            return $this->_id;
        }

        private function set_name($value)
        {
            $this->_name = $value;
        }
        public function get_name()
        {
            return $this->_name;
        }

        private function set_lastname($value)
        {
            $this->_lastname = $value;
        }
        public function get_lastname()
        {
            return $this->_lastname;
        }

        private function set_user($value)
        {
            $this->_user = $value;
        }
        public function get_user()
        {
            return $this->_user;
        }

        private function set_password($value)
        {
            $this->_password = $value;
        }
        public function get_password()
        {
            return $this->_password;
        }

        private function set_email($value)
        {
            $this->_email = $value;
        }
        public function get_email()
        {
            return $this->_email;
        }

        private function set_birthdate($value)
        {
            $this->_birthdate = $value;
        }
        public function get_birthdate()
        {
            return $this->_birthdate;
        }

        private function set_trades($value)
        {
            $this->_trades = $value;
        }
        public function get_trades()
        {
            return $this->_trades;
        }

        private function set_rating($value)
        {
            $this->_rating = $value;
        }
        public function get_rating()
        {
            return $this->_rating;
        }

        private function set_picture($value)
        {
            $this->_picture = $value;
        }
        public function get_picture()
        {
            return $this->_picture;
        }

        private function set_description($value)
        {
            $this->_description = $value;
        }
        public function get_description()
        {
            return $this->_description;
        }

        private function set_location($value)
        {
            $this->_location = $value;
        }
        public function get_location()
        {
            return $this->_location;
        }

        private function set_register()
        {
            $this->_register = date('d-m-Y');
        }
        public function get_register()
        {
            return $this->_register;
        }
	}
?>