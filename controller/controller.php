<?php
    class controller{
        function read($connect){
            try{
                $result = $connect->query("SELECT * FROM noticias");
                $news = $result->fetchAll();
                return $news;
            }catch(PDOException $e){
                echo "There was a mistake in function read: ".$e->getMessage();
            }
        }
        function delete($connect, $id){
            echo $id;
            try{
                $connect->query("DELETE FROM noticias WHERE id=".$id."");
            }catch(PDOException $e){
                echo "There was a mistake in function delete: ".$e->getMessage();
            }
            unset($_GET['function']);
            unset($_GET['id']);
        }
        function create($connect){
            try{
                $connect->query("INSERT INTO noticias (titulo,texto,categoria,fehca) VALUES ('".$_POST['title']."','".$_POST['text']."','".$_POST['category']."','".$_POST['date']."')");
            }catch(PDOException $e){
                echo "There was a mistake in function create: ".$e->getMessage();
            }
            unset($_POST['title']);
            unset($_POST['text']);
            unset($_POST['category']);
            unset($_POST['date']);
        }
        function update($connect){
        }
        
    }
?>