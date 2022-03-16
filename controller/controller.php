<?php
    include '..\model\news.php';
    class Controller{
        private $news;
        function __construct(){
            $this->news=new News();
        }
        function showController(){
            return $this->news->show();
        }
        function deleteController(){
            if(isset($_GET['id']) && !empty($_GET['id'])){
                if(count($this->news->find())>0){
                    $this->news->delete();
                    unset($_GET['id']);
                    unset($_GET['method']);
                }
            }
        }
        function createController(){
            if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['category']) && isset($_POST['date'])){
                $this->news->create();
                unset($_POST['title']);
                unset($_POST['text']);
                unset($_POST['category']);
                unset($_POST['date']);
                unset($_GET['method']);
            }
        }
        function updateController(){
            if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['text']) && isset($_POST['category']) && isset($_POST['date'])){
                $this->news->update();
                unset($_POST['id']);
                unset($_POST['title']);
                unset($_POST['text']);
                unset($_POST['category']);
                unset($_POST['date']);
                unset($_GET['method']);
            }
        }
    }
?>