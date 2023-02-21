<?php 
    namespace DAO;
    use Models\User;
    use PDOException;

    class UserPDO{

        private $connection;
        private $tableName = "users";

        public function GetAll(){
            try{
                $userList = array();
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $userResult = $this->connection->Execute($query);                

                foreach($userResult as $row){
                    $user = new User($row['userId'], $row['email'], $row['password']);
                    
                    /*
                    $user->setEmail();
                    $user->setUserId();
                    $user->setPassword();
                    */
                   
                    array_push($userList, $user);
                }
                return $userList;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetUserByEmail($email){
            try{
                $query = "select * from $this->tableName where(email = :email);";
                $parameter['email'] = $email;
                $this->connection = Connection::GetInstance();
                $resultArray = $this->connection->Execute($query, $parameter);

                if($resultArray != null){
                    foreach($resultArray as $result){
                        $user = new User($result['userId'], $result['email'], $result['password']);
                    }                  
                    return $user;
                }
                else{
                    return $resultArray;
                }
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }
    }
?>