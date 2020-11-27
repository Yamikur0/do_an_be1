<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
  require './app/models/' . $class_name . '.php';
});
$newModel = new NewsModel();
$newList = $newModel->getNews();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    foreach ($newList as $item) {
    ?>
    <tr>
            <td><?php echo $item['id'] ?></td>
            <td><?php echo $item['new_id'] ?></td>
            <td><img src="/<?php echo BASE_URL?>/public/images/<?php echo $item['img'] ?>" style="max-width:120px"></td>
            <td><?php echo $item['header_tilte'] ?></td>
            <td><?php echo $item['header_content'] ?></td>
            <td><?php echo $item['footer_tilte'] ?></td>
            <td><?php echo $item['footer_content'] ?></td>
        </tr>
        <?php
        }
        ?>
</body>
</html>