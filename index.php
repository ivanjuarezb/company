<?php

    require 'connection.php';
    include 'controller.php';

   
    $connect =  connection::connect();
    $controller = new controller();
    if(isset($_GET['function']) && $_GET['function']=="delete"  ){
        $controller->delete($connect, $_GET['id']);
        
    }
    if(isset($_POST['function']) && $_POST['function']=='create'){
        $controller->create($connect);
    }
?>

<html>
    <head>
        <title>Noticias</title>
    </head>
    <body>
        <h1>News</h1>
        <table border='4'>


        <?php 
            foreach($controller->read($connect) as $news){
                echo '<tr>';
                    echo '<td>'.$news['id'].'</td>';
                    echo '<td>'.$news['titulo'].'</td>';
                    echo '<td>'.$news['texto'].'</td>';
                    echo '<td>'.$news['categoria'].'</td>';
                    echo '<td>'.$news['fehca'].'</td>';
                    echo '<td><a href="index.php?function=delete&id='.$news['id'].'">DELETE</a></td>';
                    echo '<td><a href="index.php?function=update&id='.$news['id'].'">UPDATE</a></td>';
                echo '</tr>';
            }
            $connect = null;
            $controller = null;
        ?>


        </table>
        <br/><br/>
        <?php
            if(false){
                echo 'FORM NEWS';
                echo '<form action="index.php" method="post">';
                    echo '<input type="text" name="title"/>Title New';
                    echo '<br/>';
                    echo '<input type="text" name="text"/>Text New';
                    echo '<br/>';
                    echo '<input type="text" name="category"/>Category New';
                    echo '<br/>';
                    echo '<input type="text" name="date"/>Date New';
                    echo '<br/>';
                    echo '<input type="submit" name="function" value="create"/>';
                echo '</form>';
            }else{
                echo 'FORM UPDATE NEWS';
                echo '<form action="index.php" method="post">';
                    echo '<input type="text" name="title"/>Title New';
                    echo '<br/>';
                    echo '<input type="text" name="text"/>Text New';
                    echo '<br/>';
                    echo '<input type="text" name="category"/>Category New';
                    echo '<br/>';
                    echo '<input type="text" name="date"/>Date New';
                    echo '<br/>';
                    echo '<input type="submit" name="function" value="update"/>';
                echo '</form>';
            }
        ?>
    </body>
</html>