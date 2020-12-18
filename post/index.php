<?php
require_once '../config/database.php';
require_once '../config/config.php';
require_once '../component/Navbar.php';
require_once '../component/Tag.php';

spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});
$newModel = new NewsModel();

$id = isset($_GET['id']) ? $_GET['id'] : 7;
$new = $newModel->getNewsById($id);
session_start();
if (isset($_SESSION['username'])) {
    $user = false;
    $username = $_SESSION['username'];
} else {
    $user = true;
    $username = 'login';
}
$comments = $newModel->getAllComment($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?php echo BASE_URL ?>/public/css/style.css">
    <link rel="stylesheet" href="/<?php echo BASE_URL ?>/public/css/prism.css">
    <link rel="stylesheet" href="../public/css/comment.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .main-image {
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <?php echo Navbar::createNavbar($user, $username) ?>
    <input type="hidden" id="user_id" value="<?php echo $_SESSION['userId'] ?>">
    <input type="hidden" id="post_id" value="<?php echo $id ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row main-content">
                    <div class="col-md-12">
                        <div class="main-image">
                            <img src="/<?php echo BASE_URL ?>/public/img/<?php echo $new['img'] ?>" alt="test" class="img-fluid">
                        </div>
                        <div class="blog-content">
                            <h1><?php echo $new['header_title'] ?></h1>
                            <div class="content">
                                <?php echo $new['content'] ?>
                                <?php echo Tag::createTag($new['id']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/do_an_be1/public/img/to-stay-motivated-when-learning-to-code-63725540369.4944.jpg" class="img-fluid" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="/do_an_be1/public/img/quick-interview-python-p1-63739029184.5009.jpg"class="img-fluid" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="/do_an_be1/public/img/xu-ly-va-cham-trong-game-voi-pygame-63740756684.5608.jpg" class="img-fluid" alt="New York">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>

                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <?php if ($user) {
        echo '<div class="container"><div class="alert alert-danger" style="display: block; margin-top: 20px;"><span>Đăng nhập để bình luận</span></div></div>';
    } ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="content-item" id="comments" style="margin-top: 50px;">

                    <form action="" method="post" id="comment-form" onsubmit="return false;">
                        <h3 class="pull-left">New Comment</h3>
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                    <textarea class="form-control" id="message" placeholder="Your message" required="" name="message"></textarea>
                                </div>
                            </div>
                            <button type="submit" id="submit-comment" class="btn btn-outline-primary pull-right" name="submmit">Submit</button>
                        </fieldset>
                    </form>

                    <h3 id="countComment"><?php echo count($comments) ?> Comments</h3>
                    <div class="test" style="display: none;"></div>
                    <?php foreach ($comments as $value) { ?>
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $value['name'] ?></h4>
                                <p><?php echo $value['description'] ?></p>
                                <ul class="list-unstyled list-inline media-detail pull-left">
                                    <li><i class="fa fa-calendar"></i><?php echo $value['create_at'] ?></li>
                                    <li><i class="fa fa-thumbs-up"></i><span comment_id="<?php echo $value['id'] ?>"><?php echo $value['like'] ?></span></li>
                                </ul>
                                <ul class="list-unstyled list-inline media-detail pull-right">
                                    <li class=""><span style="color: #007bff;user-select: none;" class="like" commentId="<?php echo $value['id']?>">Like</span></li>
                                    <li class=""><span style="color: #007bff;user-select: none;">Reply</span></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- COMMENT 2 - START -->
                    <!-- <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">John Doe</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                            <ul class="list-unstyled list-inline media-detail pull-left">
                                <li><i class="fa fa-calendar"></i>27/02/2014</li>
                                <li><i class="fa fa-thumbs-up"></i>13</li>
                            </ul>
                            <ul class="list-unstyled list-inline media-detail pull-right">
                                <li class=""><a href="">Like</a></li>
                                <li class=""><a href="">Reply</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- COMMENT 2 - END -->
                </div>
            </div>
        </div>
    </div>
    <?php if ($user) {
        echo '<script>$("#comments").hide();</script>';
    } ?>
    <script src="/<?php echo BASE_URL ?>/public/js/comment.js"></script>
    <script src="/<?php echo BASE_URL ?>/public/js/prism.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>