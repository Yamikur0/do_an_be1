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
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    public function getNewsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM news LIMIT ?,?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    public function getTotalRow()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(id) FROM news");
        return parent::select($sql)[0]['COUNT(id)'];
    }
    public function getNewsByTags($tag)
    {
        $sql = parent::$connection->prepare("SELECT * FROM news JOIN news_tags ON news_tags.new_id = news.id JOIN tags ON tags.id = news_tags.tag_id WHERE tags.name = ?");
        $sql->bind_param('s', $tag);
        return parent::select($sql);
    }
    public function getNewsByTagPage($tag, $page, $perPage)
    {   
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM `news` JOIN `news_tags` ON news_tags.new_id = news.id JOIN `tags` ON tags.id = news_tags.tag_id WHERE tags.name = ? LIMIT ?,?");
        $sql->bind_param('sii', $tag, $start, $perPage);
        return parent::select($sql);
    }
    public function getTagById($id)
    {
        $sql = parent::$connection->prepare("SELECT tags.name FROM `news` JOIN news_tags ON news_tags.new_id = news.id JOIN tags ON tags.id = news_tags.tag_id WHERE news.id=?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
}
