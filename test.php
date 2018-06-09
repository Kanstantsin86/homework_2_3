<?php

$test_dir = "./DownloadFiles/test";
$test_id = $test_dir.$_GET["id"].".json";
if (file_exists($test_id)) {
    $json_file = file_get_contents($test_id);
    $json_array = json_decode($json_file, true);
} else {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
</head>
<body>
<nav>
    <ul>
        <li><a href="list.php">Список тестов</a></li>
    </ul>
</nav>

<form action="result.php" method="POST" enctype="multipart/form-data">
<?php foreach ($json_array as $elem) { ?>
        <?php for ($i = 0; $i < count($elem); $i++){ ?>
        <fieldset>
            <h1><?php echo $json_array[$i]['question']?></h1>
            <?php foreach ($json_array[$i]['answers'] as $values) { ?>
           <?php for ($j = 0; $j < count($json_array[$i]['answers']); $j++){ ?>
            <label>
                <input type="radio" name="answer<?=$i;?>[]"> <?php echo $values; break;?>
                <input type="hidden" name="correct_answer<?=$i;?>[]">
            </label>
            <?php } ?>
            
        <?php } ?>
        </fieldset> 
        <?php }  break;?>
    <?php } ?>
    <p><b>Ваше имя (на английском):</b><br>
    <input type="text" size="40" name="name">
    </p>
<button type="submit">Результат</button>

</form>

</body>
</html>