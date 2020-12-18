<?php
require_once '../config/database.php';
spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});
$newsModel = new NewsModel();
$userModel = new UserModel();
if (isset($_POST['comment_check'])) {
    $message = $_POST['message'];
    $postId = $_POST['postId'];
    $userId = $_POST['userId'];
    if ($newsModel->createComment($message, $postId, $userId)) {
        $result = 'success';
    } else {
        $result = 'error';
    }
}
if (isset($_POST['like_check'])) {
    $commentId = $_POST['comment_id'];
    $userId = $_POST['user_id'];
    if ($newsModel->likeComment($commentId,$userId)) {
        $result = 'success';
    } else {
        $result = 'error';
    }
    $like = $newsModel->getLike($commentId);
}
?>
{
<?php if (isset($_POST['comment_check'])) { ?>
    "result": "<?php echo $result ?>",
    "createAt": "<?php echo date('Y-m-d H:i:s') ?>",
    "countComment": <?php echo count($newsModel->getAllComment($postId)) ?>,
    "username": "<?php echo $userModel->getUsername($userId) ?>"
<?php } ?>
<?php if(isset($_POST['like_check'])){?>
    "result": "<?php echo $result ?>",
    "like": <?php echo $like?>
<?php }?>
}