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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/listNews.css">
</head>

<body>
    <div class="container">
        <?php foreach ($newList as $value) { ?>
            <div class="list-items">
                <div class="item">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="./?id=1"><img src="./public/img/<?php echo $value['img'] ?>" alt="" class="img-fluid"></a>
                        </div>
                        <div class="col-md-8">
                            <h3><a title="Operator Overloading Cơ Bản Nhất Trong C#" href="./?id=<?php echo $value['id'] ?>"><?php echo $value['header_title'] ?></a></h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>