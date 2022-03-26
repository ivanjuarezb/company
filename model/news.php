<?php
    require '..\configuration\connection.php';
    class News{
        private $connect;
        function __construct(){
            $this->connect=Connection::connect();
        }
        function show():array{
                $news=$this->connect->query("SELECT * FROM news");
                return $news->fetchAll();
        }
        function delete($id):void{
                $this->connect->query("DELETE FROM news WHERE id=".$id."");
        }
        function create($request):void{
                $this->connect->query("INSERT INTO news (title,text,category,date) VALUES ('".$request['title']."','".$request['text']."','".$request['category']."','".$request['date']."')");
        }
        function find($id):array{
                $news=$this->connect->query("SELECT * FROM news WHERE id='".$id."'");
                return $news->fetchAll();
        }
        function update($request):void{
                $this->connect->query("UPDATE news SET title='".$request['title']."', text='".$request['text']."', category='".$request['category']."', date='".$request['date']."' WHERE id='".$request['id']."'");
        }
    }
?>