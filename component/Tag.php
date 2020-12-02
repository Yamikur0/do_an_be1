<?php
require_once '../config/database.php';
require_once '../config/config.php';
spl_autoload_register(function ($class_name) {
    require '../app/model/' . $class_name . '.php';
});

class Tag
{
    public static function createTag($id)
    {
        $newsModel = new NewsModel();
        $tagList = $newsModel->getTagById($id);

        $result = '<div class="row tag-list">
            <div class="col-md-12 tag-scroll">';
        
        foreach ($tagList as $value) {
            $result .= '<span><a href="/' . BASE_URL . '/tag/?tag='.$value['name'].'">'.$value['name'].'</a></span>';
        }

        $result .= '</div>
        </div>';

        return $result;
    }
}
