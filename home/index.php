<?php
require_once '../config/database.php';
require_once '../config/config.php';
require_once '../component/Navbar.php';
require_once '../component/Pagination.php';
require_once '../component/Tag.php';
spl_autoload_register(function ($class_name) {
	require '../app/models/' . $class_name . '.php';
});

$perPage = 6;
$page = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
session_start();
$newModel = new NewsModel();
$newList = $newModel->getNewsByPage($page, $perPage);
$top5 = $newModel->getTop5();
if (!isset($_SESSION['username'])) {
	header('location: http://localhost:81/do_an_be1/login/');
}
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
	<link rel="stylesheet" href="/<?php echo BASE_URL ?>/public/css/listNews.css">
	<link rel="stylesheet" href="/<?php echo BASE_URL ?>/public/css/style.css">
	<style>
		.carousel-caption {
			background-color: rgba(106, 90, 205, 0.9);
			color: white;
			font-weight: bold;
			border: 3px solid #f1f1f1;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			z-index: 2;
			width: 70%;
			text-align: center;
			font-size: 50px;
			padding: 70px 0;
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

		.result-search {
			padding: 10px;
			position: fixed;
			right: 20px;
			z-index: 100;
			top: 66px;
			width: 500px;
			box-shadow: 0 1px 4px 0 rgb(0, 0, 0, 26%);
			background: #fff;
			transition: all 1s;
		}

		.search-group {
			padding-bottom: 10px;
		}

		.img {
			height: 600px;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;

		}

		#hot-post {
			margin-top: 70px;
			font-size: 50px;
			line-height: 120px;
			font-family: "Sacramento", cursive;
			text-align: center;
			animation: blink 8s infinite;
		}

		.carousel-control-prev {
			width: 10%;
		}

		.carousel-control-next {
			width: 10%;
		}

		@keyframes blink {
			20%,
			24%,
			55% {
				color: #111;
				text-shadow: none;
			}
			0%,
			19%,
			21%,
			23%,
			25%,
			54%,
			56%,
			100% {
				text-shadow: 0 0 5px #2b99d6, 0 0 15px #2b99d6, 0 0 20px #2b99d6, 0 0 40px #2b99d6, 0 0 60px #2b99d6, 0 0 10px #2b99d6, 0 0 98px #2b99d6;
				color: #fff;
			}
		}
	</style>
</head>

<body>
	<?php echo Navbar::createNavbar(false, $_SESSION['username']); ?>

	<div class="result-search"></div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 id="hot-post">Hot Post</h1>
				<div id="demo" class="carousel slide" data-ride="carousel" data-interval="3000">
					<ul class="carousel-indicators">
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<li data-target="#demo" data-slide-to="1"></li>
						<li data-target="#demo" data-slide-to="2"></li>
						<li data-target="#demo" data-slide-to="3"></li>
						<li data-target="#demo" data-slide-to="4"></li>
					</ul>

					<div class="carousel-inner">
						<?php for ($i = 0; $i < count($top5); $i++) { ?>
							<?php if ($i == 0) { ?>
								<div class="carousel-item img active" style="background-image: url(<?php echo '/' . BASE_URL . '/public/img/' . $top5[$i]['img'] ?>);">

									<div class="carousel-caption d-none d-md-block">
										<p><?php echo $top5[$i]['header_title'] ?></p>
									</div>
								</div>

							<?php } else { ?>

								<div class="carousel-item img" style="background-image: url(<?php echo '/' . BASE_URL . '/public/img/' . $top5[$i]['img'] ?>);">
									<div class="carousel-caption d-none d-md-block">
										<p><?php echo $top5[$i]['header_title'] ?></p>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>

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

	<div class="container test">
		<h1 id="hot-post">New Post</h1>
		<?php foreach ($newList as $value) {; ?>
			<div class="list-items">
				<div class="item">
					<div class="row">
						<div class="col-md-4">
							<a href="/<?php echo BASE_URL ?>/post/?id=<?php echo $value['id'] ?>"><img src="/<?php echo BASE_URL ?>/public/img/<?php echo $value['img'] ?>" alt="" class="img-fluid"></a>
						</div>
						<div class="col-md-8">
							<h3 class="header-title"><a href="/<?php echo BASE_URL ?>/post/?id=<?php echo $value['id'] ?>"><?php echo $value['header_title'] ?></a></h3>
							<p class="description"><?php echo $value['description'] ?></p>
							<?php echo Tag::createTag($value['id']) ?>
							<div class="create-at"><?php echo $value['create_at'] ?></div>
							<div class="view">Views: <?php echo $value['views'] ?></div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<nav aria-label="Page navigation">
		<ul class="pagination justify-content-center">
			<?php
			$link = '/' . BASE_URL . '/home/?';
			echo Pagination::createPageLinks($newModel->getTotalRow(), $perPage, $page, $link);
			?>
		</ul>
	</nav>
	<script src="/<?php echo BASE_URL ?>/public/js/search.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>