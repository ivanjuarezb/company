<?php
    include '..\controller\controller.php';
    $controller=new Controller;

    if(isset($_GET['method']) && $_GET['method'] == 'delete'){
        //Borrar noticia
        $data=$controller->deleteController($_REQUEST['id']);
        unset($_GET['method']);
        unset($_GET['id']);
        var_dump($data);
    }else if(isset($_GET['method']) && $_GET['method'] == 'create'){
        //Crear noticia
        $data=$controller->createController($_REQUEST);
        unset($_POST['title']);
        unset($_POST['text']);
        unset($_POST['category']);
        unset($_POST['date']);
        unset($_GET['method']);
    } else if(isset($_GET['method']) && $_GET['method'] == 'update'){
        //Actualizar noticia
        $data=$controller->updateController($_REQUEST);
        unset($_POST['id']);
        unset($_POST['title']);
        unset($_POST['text']);
        unset($_POST['category']);
        unset($_POST['date']);
        unset($_GET['method']);
    } 
?>
<html>
    <head>
        <title>News</title>
        <meta charset="UTF-8">
        <link href="../bootstrap/node_modules/bootstrap/dist/css/bootstrap.css" rel="Stylesheet"/>
        <script src="../bootstrap/node_modules/bootstrap/dist/js/bootstrap.js"></script>
    </head>
    <body>
        <h1 class="text-dark bg-success p-2 m-5">News</h1>
        <table class="bg-secondary m-auto">
        <?php
            //Mostrar noticias
            $news=$controller->showController();
            if(!isset($news['message'])){
                foreach($news['news'] as $element){
                    echo '<tr>';
                        echo '<td>'.$element['title'].'</td>';
                        echo '<td>'.$element['text'].'</td>';
                        echo '<td>'.$element['category'].'</td>';
                        echo '<td>'.$element['date'].'</td>';
                        echo '<td><a class="text-warning" href="updateNews.php?method=update&id='.$element['id'].'&title='.$element['title'].'&text='.$element['text'].'&category='.$element['category'].'&date='.$element['date'].'">UPDATE</a></td>';
                        echo '<td><a class="text-danger" href="showNews.php?method=delete&id='.$element['id'].'">DELETE</a></td>';
                    echo '</tr>';
                }
            }
            $controller->__destruct();
        ?>
        </table>
        <a href="createNews.php"><button type="button" class="btn btn-success">Create News</button></a>
    </body>
</html>