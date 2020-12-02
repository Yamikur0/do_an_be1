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
$tag = '';
if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
}

$newModel = new NewsModel();
$newList = $newModel->getNewsByTagPage($tag, $page, $perPage);
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

		.tag-list span a {
			padding: 5px 12px;
			font-size: 12px;
			line-height: 14px;
			display: block;
			color: #898989;
			text-decoration: none;
			background-color: transparent;
		}

		.tag-list span a:hover {
			text-decoration: underline;
		}

		.tag-list span:hover {
			background: #3b3c54;
			border-color: #3b3c54;
			color: #fff;
		}

		.tag-list span {
			display: inline-block;
			margin-bottom: 5px;
			margin-right: 5px;
			border: 1px solid #dcdcdc;
			border-radius: 3px;
			background: #f5f5f5;
			transition: all 300ms;
		}

		.tag-list .tag-scroll {
			white-space: nowrap;
			margin-bottom: 3px;
			overflow-x: hidden;
			overflow-y: hidden;
			padding-left: 0;
			margin-left: 15px;
		}
	</style>
</head>

<body>
	<?php echo Navbar::createNavbar() ?>

	<div class="container">
		<?php foreach ($newList as $value) { ?>
			<div class="list-items">
				<div class="item">
					<div class="row">
						<div class="col-md-4">
							<a href="/<?php echo BASE_URL ?>/post/?id=<?php echo $value['id'] ?>"><img src="/<?php echo BASE_URL ?>/public/img/<?php echo $value['img'] ?>" alt="" class="img-fluid"></a>
						</div>
						<div class="col-md-8">
							<h3 class="header-title"><a href="/<?php echo BASE_URL ?>/post/?id=<?php echo $value['id'] ?>"><?php echo $value['header_title'] ?></a></h3>
							<p class="description"><?php echo $value['description'] ?></p>
							<?php echo Tag::createTag($value['new_id'])?>
							<div class="create-at"><?php echo $value['create_at'] ?></div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<nav aria-label="Page navigation">
		<ul class="pagination justify-content-center">
			<?php echo Pagination::createPageLinks(count($newList), $perPage, $page); ?>
		</ul>
	</nav>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>