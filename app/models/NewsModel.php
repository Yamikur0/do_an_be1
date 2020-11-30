<?php
class NewsModel extends Db
{
    public function getNews()
    {
        $sql = parent::$connection->prepare("SELECT * FROM news");
        return parent::select($sql);
    }
    public function getNewsById($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM news WHERE news.id =?");
        $sql->bind_param('i',$id);
        return parent::select($sql)[0];
    }
}
