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
		.result-search {
            padding: 10px;
            position: fixed;
            right: 20px;
            z-index: 100;
            top: 66px;
            width: 500px;
            box-shadow: 0 1px 4px 0 rgb(0, 0, 0 , 26%);
            background: #fff;
            transition: all 1s;
        }

        .search-group{
            padding-bottom: 10px;
        }
	</style>
</head>

<body>
	<?php echo Navbar::createNavbar(false,$_SESSION['username']); ?>
		
	<div class="result-search"></div>

	<div class="container test">
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
	<script src="/<?php echo BASE_URL?>/public/js/search.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>