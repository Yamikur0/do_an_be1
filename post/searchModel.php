<?php
require_once '../config/database.php';
spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});
$newsModel = new NewsModel();
$userModel = new UserModel();
if (isset($_POST['search_check'])) {
    $result = 'success';
    $post = $newsModel->searchNewsBySameTag($_POST['key']);
}else {
    $result = 'error';
}
?>
{
    "result":"<?php echo $result?>",
    "title": [
        <?php
            for ($i=0; $i < count($post); $i++) { 
                echo "\"".$post[$i]['header_title']."\"";
                if ($i < count($post)-1) {
                    echo ",\n";
                }
            }    
        ?>
    ],
    "tag":[
        <?php
            for ($i=0; $i < count($post); $i++) { 
                echo "\"".$post[$i]['name']."\"";
                if ($i < count($post)-1) {
                    echo ",\n";
                }
            }    
        ?>
    ],
    "id": [
        <?php
            for ($i=0; $i < count($post); $i++) { 
                echo "\"".$post[$i]['id']."\"";
                if ($i < count($post)-1) {
                    echo ",\n";
                }
            }    
        ?>
    ]
}