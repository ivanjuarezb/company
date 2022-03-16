<?php
    require '..\configuration\connection.php';
    class News{
        private $connect;
        function __construct(){
            $this->connect=Connection::connect();
        }
        function show(){
            try{
                $result=$this->connect->query("SELECT * FROM news");
                $news=$result->fetchAll();
                return $news;
            }catch(PDOException $e){
                echo "There was a mistake |Class News| |Method show|: ".$e->getMessage();
            }
        }
        function delete(){
            try{
                $this->connect->query("DELETE FROM news WHERE id=".$_GET['id']."");
            }catch(PDOException $e){
                echo "There was a mistake |Class News| |Method delete|: ".$e->getMessage();
            }
        }
        function create(){
            try{
                $this->connect->query("INSERT INTO news (title,text,category,date) VALUES ('".$_POST['title']."','".$_POST['text']."','".$_POST['category']."','".$_POST['date']."')");
            }catch(PDOException $e){
                echo "There was a mistake |Class News| |Method create|: ".$e->getMessage();
            }
        }
        function find(){
            try{
                $result=$this->connect->query("SELECT * FROM news WHERE id='".$_GET['id']."'");
                $news=$result->fetchAll();
                return $news;
            }catch(PDOException $e){
                echo "There was a mistake |Class News| |Method find|: ".$e->getMessage();
            }
        }
        function update(){
            try{
                $this->connect->query("UPDATE news SET title='".$_POST['title']."', text='".$_POST['text']."', category='".$_POST['category']."', date='".$_POST['date']."' WHERE id='".$_POST['id']."'");
            }catch(PDOException $e){
                echo "There was a mistake |Class News| |Method update|: ".$e->getMessage();
            }
        }
    }
?>