<?php
    namespace DAO;
    use Models\Book;
use PDO;
use PDOException;

    class BookPDO{

        private $connection;
        private $tableName = "books";

        public function GetAll(){

            try{
                $bookList = array();
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $bookResult = $this->connection->Execute($query);

                foreach($bookResult as $row){
                    $book = new Book($row['code'], $row['title'],$row['price']);
                    array_push($bookList, $book);
                }
                return $bookList;
                
            }catch(PDOException $ex){
                throw $ex;
            }
        }

        public function Add(Book $book){
            try{
                $query = "insert into $this->tableName (code, title, price) values (:code, :title, :price);";
                $parameters['code'] = $book->getCode();
                $parameters['title'] = $book->getTitle();
                $parameters['price'] = $book->getPrice();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function CheckExist($code){
            try{
                $query = "select * from $this->tableName where(code = :code);";
                $parameter['code'] = $code;
                $this->connection = Connection::GetInstance();
                $result = $this->connection->ExecuteNonQuery($query, $parameter);
                return $result;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function Delete($code){
            try{
                $query = "delete from $this->tableName where(code=:code);";
                $parameters['code'] = $code;
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }
     }
?>