<html>
    <head>
        <title>News</title>
    </head>
    <body>
        <h1>News</h1>
        <table border='4'>
        <?php
        include '..\controller\controller.php';
        $controller=new Controller;
        if(isset($_GET['method']) && $_GET['method'] == 'delete'){
            $controller->deleteController();
        }
        if(isset($_GET['method']) && $_GET['method'] == 'create'){
            $controller->createController();
        }
        if(isset($_GET['method']) && $_GET['method'] == 'update'){
            $controller->updateController();
        }  
        foreach($controller->showController() as $news){
            echo '<tr>';
                echo '<td>'.$news['title'].'</td>';
                echo '<td>'.$news['text'].'</td>';
                echo '<td>'.$news['category'].'</td>';
                echo '<td>'.$news['date'].'</td>';
                echo '<td><a href="updateNews.php?method=update&id='.$news['id'].'&title='.$news['title'].'&text='.$news['text'].'&category='.$news['category'].'&date='.$news['date'].'">UPDATE</a></td>';
                echo '<td><a href="showNews.php?method=delete&id='.$news['id'].'">DELETE</a></td>';
            echo '</tr>';
        }
        $controller = null;
        ?>
        </table>
        <a href="createNews.php">Create News</a>
    </body>
</html>