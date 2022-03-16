<html>
    <head>
        <title>Update News</title>
    </head>
    <body>
        <h1>UPDATE</h1>
        <form method="post" action="showNews.php?method=update">
        <?php
        include '..\controller\controller.php';
        echo '<label name="id" value="'.$_GET['id'].'"></label>';
        echo '<input type="text" name="title" value="'.$_GET['title'].'"/>Title</br>';
        echo '<input type="text" name="text" value="'.$_GET['text'].'"/>Text</br>';
        echo '<input type="text" name="category" value="'.$_GET['category'].'"/>Category</br>';
        echo '<input type="text" name="date" value="'.$_GET['date'].'"/>Date</br>';
        ?>
            <input type="submit" value="Update"/>
        </form>
    </body>
</html>