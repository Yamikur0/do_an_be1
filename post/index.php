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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?php echo BASE_URL ?>/public/css/style.css">
    <link rel="stylesheet" href="/<?php echo BASE_URL ?>/public/css/prism.css">
    <link rel="stylesheet" href="../public/css/comment.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <?php echo Navbar::createNavbar() ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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

        </div>

    </div>
    <div class="content-item" id="comments" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <form action="index.php" method="post">
                        <h3 class="pull-left">New Comment</h3>
                        <button type="submit" class="btn btn-normal pull-right" name="submmit" onclick="<?php if(isset($_POST['message'])){$newModel->createComment($_POST['message'],$id,1);header('location:./');}?>">Submit</button>
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                    <textarea class="form-control" id="message" placeholder="Your message" required="" name="message"></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </form>

                    <h3>4 Comments</h3>

                    <!-- COMMENT 1 - START -->
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">John Doe</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
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
                    </div>
                    <!-- COMMENT 1 - END -->

                    <!-- COMMENT 2 - START -->
                    <div class="media">
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
                    </div>
                    <!-- COMMENT 2 - END -->

                    <!-- COMMENT 3 - START -->
                    <div class="media">
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
                    </div>
                    <!-- COMMENT 3 - END -->

                    <!-- COMMENT 4 - START -->
                    <div class="media">
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
                    </div>
                    <!-- COMMENT 4 - END -->
                </div>
            </div>
        </div>
    </div>
    <script src="/<?php echo BASE_URL ?>/public/js/prism.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>