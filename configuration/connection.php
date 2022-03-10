<?php
    
    class connection{
        public static function connect(){
            try{
                $connect = new PDO("mysql:host=localhost;dbname=dbcompany", 'root', '');
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connect;
            } catch(PDOException $e){
                echo "There was a mistake";
            }
        }
    }
?>