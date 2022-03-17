<?php
    class Conectar{
        protected $dbh;

        protected function conexion(){
            try {
                //code...
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=crud2", "root", "Zabdiel61");
                return $conectar;
            } catch (Exception $e) {
                //throw $th;
                print "Error BD" . $e->getMessage() . "<br/>";
                die(); //terminanos conexion
            }
        }

        //para reconocer las ñ, mayuscu y Minus
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>