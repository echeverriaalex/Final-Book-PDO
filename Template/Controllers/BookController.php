<?php
    namespace Controllers;
    use DAO\BookPDO;
    use Models\Book;

    class BookController{

        private $bookPDO;

        public function __construct(){
            
            $this->bookPDO = new BookPDO();
        }

        public function ShowListView(){
            $bookList = $this->bookPDO->GetAll();
            
            if($_SESSION['user']){
                $bookList = $this->bookPDO->GetAll();
                require_once(VIEWS_PATH.'book-list.php');
            }
            else{
                echo "<script> alert('Debes iniciar sesion');</script>";
                header("location: ". FRONT_ROOT. "Home/Index");
            }            
        }

        public function ShowAddView(){
            if($_SESSION['user'] != null ){
                require_once(VIEWS_PATH.'book-add.php');
            }
            else{
                echo "<script> alert('Debes iniciar sesion');  </script>";
                header("location: ". FRONT_ROOT. "Home/Index");
            }            
        }

        public function Add($code, $title, $price){
            $exist = $this->bookPDO->CheckExist($code);

            if($exist == null){
                $book = new Book($code, $title, $price);
                $this->bookPDO->Add($book);
            }else{
                echo "<script> alert('El libro tiene un codigo repetido. Cambialo');</script>";
            }

            $this->ShowListView();
        }

        public function Delete($code){
            $this->bookPDO->Delete($code);
            $this->ShowListView();
        }
    }
?>