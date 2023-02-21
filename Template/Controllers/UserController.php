<?php
    namespace Controllers;
    use DAO\UserPDO;

    class UserController{

        private $userPDO;

        public function __construct(){
            $this->userPDO = new UserPDO();
        }

        public function LogIn($email, $password){

            /* // ESTO ANDA PERFECTO
            $userList = $this->userPDO->GetAll();
            $correct = false;

            foreach($userList as $user){
                if($user->getEmail() == $email && $user->getPassword() == $password){
                    $correct = true;
                }                
            }           
            
            if($correct == true){
                session_start();
                $_SESSION['user'] = $user;
                header("location: ". FRONT_ROOT. "Book/ShowListView");
            }
            else{
                echo "<script> alert('Error al iniciar sesion');</script>";
                header("location: ". FRONT_ROOT. "Home/Index");
            }
            */

            $user = $this->userPDO->GetUserByEmail($email);

            if($user->getEmail() == $email && $user->getPassword() == $password){
                
                session_start();
                $_SESSION['user'] = $user;
                header("location: ". FRONT_ROOT. "Book/ShowListView");
            }
            else{
                echo "<script> alert('Error al iniciar sesion');</script>";
                header("location: ". FRONT_ROOT. "Home/Index");
            }
        }

        public function LogOut(){
            $_SESSION['user'] = null;
            session_destroy();
            header("location:". FRONT_ROOT ."Home/Index");
        }
    }
?>