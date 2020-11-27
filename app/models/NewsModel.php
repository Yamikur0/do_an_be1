<?php
class NewsModel extends Db
{
    public function getNews()
    {
        $sql = parent::$connection->prepare("SELECT * FROM news JOIN body ON news.id = body.new_id");
        return parent::select($sql);
    }
    public function getNewsById($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM news JOIN body ON news.id = body.new_id WHERE news.id =?");
        $sql->bind_param('i',$id);
        return parent::select($sql)[0];
    }
}
