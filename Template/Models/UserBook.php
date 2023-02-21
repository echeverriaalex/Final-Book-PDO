<?php
    namespace Models;

    class UserBook{
        private $userId;
        private $email;
        private $password;

        public function __construct($userId, $email, $password){
            $this->setUserId($userId);
            $this->setEmail($email);
            $this->setPassword($password);
        }

        public function setUserId($userId){$this->userId = $userId;}
        public function setEmail($email){$this->email = $email;}
        public function setPassword($password){$this->password = $password;}

        public function getUserId(){return $this->userId;}
        public function getEmail(){return $this->email;}
        public function getPassword(){return $this->password;}
    }
?>