<?php

$files = array_slice(scandir('./DownloadFiles/'), 2);
//var_dump($files);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список загруженных тестов</title>
</head>
<body>
    <h1>Список загруженных тестов</h1>
<nav>
    <ul>
        <li><a href="admin.php">Загрузить тест</a></li>
        
        <?php foreach ($files as $file) {
            for ($i = 0; $i < count($files); $i++){ 
            
            echo "<pre>";
            echo ("Тест №". $j=$i+1); 
            echo "</pre>";
            
           } break;
       
        } ?>
        
        <form action="" method="post" enctype="multipart/form-data">
        
        <?php /*for ($i = 1; $i <= count($files); $i++){ ?>
        <li><a href="test.php?id=<?=$i;?>">Тест <?=$i;?></a></li>
        <?php } */?>

        <p><b>Введите номер теста:</b><br>
        <input type="text" size="10" name="number">
        </p>
        <button type="submit">Выбрать</button>

        </form>

        <?php if (isset($_POST['number'])) {
                if ($_POST['number'] > $j) {
                    header( "HTTP/1.1 404 Not Found" );
                } else {
                    $id = $_POST['number'];
                    echo $id;
                    header("Location: test.php?id=$id");
                    }
        }?>
    </ul>
</nav>