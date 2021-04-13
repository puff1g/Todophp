<?php


    class DBcon{

        protected $connection;
        public function __construct() {
            $this->$connection = mysqli_connect("134.209.231.83", "playground_user", "fU5Jib9MF6");
            $this->get_connection();
        }
        public function get_connection(){

            if (!$this->$connection) {
                return "failed con: " . mysqli_connect_error();
            }
            else{
                return true;
            }

        }
        
    }

?>