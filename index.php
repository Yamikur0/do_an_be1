<?php
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function ($class_name) {
	require './app/models/' . $class_name . '.php';
});
$newModel = new NewsModel();

$id = isset($_GET['id'])?$_GET['id']:7;
$new = $newModel->getNewsById($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="./public/css/style.css">
	<link rel="stylesheet" href="./public/css/prism.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row main-content">
					<div class="col-md-12">
						<div class="main-image">
							<img src="./public/img/<?php echo $new['img'] ?>" alt="test" class="img-fluid">
						</div>
						<div class="blog-content">
							<h1><?php echo $new['header_title'] ?></h1>
							<div class="content">
								<?php echo $new['content'] ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="./public/js/prism.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>