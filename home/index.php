<?php
require_once '../config/database.php';
require_once '../config/config.php';
spl_autoload_register(function ($class_name) {
	require '../app/models/' . $class_name . '.php';
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
	<link rel="stylesheet" href="/<?php echo BASE_URL ?>/public/css/listNews.css">
	<style>
		.bg-white {
			box-shadow: 0 2px 10px 0 rgba(0, 0, 0, .1);
		}

		.header-title a,
		.header-title a:hover {
			color: black;
			text-decoration: none;
		}

		.header-title {
			margin: 15px 0 18px 0;
		}

		.navbar {
			margin-bottom: 50px;
		}

		.description {
			color: #898989;
			font-size: 16px;
			line-height: 22px;
		}
	</style>
</head>

<body>
	<?php include '../component/navbar.php'; ?>

	<div class="container">
		<?php foreach ($newList as $value) { ?>
			<div class="list-items">
				<div class="item">
					<div class="row">
						<div class="col-md-4">
							<a href="/<?php echo BASE_URL?>/post/?id=<?php echo $value['id']?>"><img src="/<?php echo BASE_URL ?>/public/img/<?php echo $value['img'] ?>" alt="" class="img-fluid"></a>
						</div>
						<div class="col-md-8">
							<h3 class="header-title"><a href="./?id=<?php echo $value['id'] ?>"><?php echo $value['header_title'] ?></a></h3>
							<p class="description"><?php echo $value['description'] ?></p>
							<p class="create-at"><?php echo $value['create_at']?></p>
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