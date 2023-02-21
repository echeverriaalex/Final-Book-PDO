<?php
    namespace Models;
    
    class Book{

        private $code;
        private $title;
        private $price;

        public function __construct($code, $title, $price){

            $this->setCode($code);
            $this->setTitle($title);
            $this->setPrice($price);            
        }

        public function setCode($code){$this->code = $code;}
        public function setTitle($title){$this->title = $title;}
        public function setPrice($price){$this->price = $price;}

        public function getCode(){return $this->code;}
        public function getTitle(){return $this->title;}
        public function getPrice(){return $this->price;}
    }
?>