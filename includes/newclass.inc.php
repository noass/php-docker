<?php
    echo "Hello, world! <br>";

    class Person {
        private $personcode;
        public $name;
        public $gender;

        public function setName($inputname){
            //return "Do nothing";
            $this->name = $inputname;
        }

        public function getName(){
            return $this->name;
        }
    }

    class Employee {
        public $name;
        public $role;
        public $access;

        public function setAccess($inputAccess){
            $this->access = $inputAccess;
        }

        public function getAccess(){
            return $this->access;
        }
    }
    
    class Manager extends Employee {
        public $name;
        public $role;
        public $access;
        public $manager_role;

        public function setAccess($inputAccess){
            $this->access = $inputAccess;
        }

        public function getAccess(){
            return $this->access;
        }
    }
?>