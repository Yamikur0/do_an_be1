<?php
class NewsModel extends Db
{
    //get all post in database
    public function getNews()
    {
        $sql = parent::$connection->prepare("SELECT * FROM news");
        return parent::select($sql);
    }
    //get post by id
    public function getNewsById($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM news WHERE news.id =?");
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }
    //get post my page limit perpage
    public function getNewsByPage($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM news LIMIT ?,?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }
    //get total row in database
    public function getTotalRow()
    {
        $sql = parent::$connection->prepare("SELECT COUNT(id) FROM news");
        return parent::select($sql)[0]['COUNT(id)'];
    }
    //get post by tag
    public function getNewsByTags($tag)
    {
        $sql = parent::$connection->prepare("SELECT * FROM news JOIN news_tags ON news_tags.new_id = news.id JOIN tags ON tags.id = news_tags.tag_id WHERE tags.name = ?");
        $sql->bind_param('s', $tag);
        return parent::select($sql);
    }
    //get total row by tag
    public function getTotalRowByTag($tag)
    {
        $sql = parent::$connection->prepare("SELECT COUNT(news.id) FROM news JOIN news_tags ON news_tags.new_id = news.id JOIN tags ON tags.id = news_tags.tag_id WHERE tags.name = ?");
        $sql->bind_param('s', $tag);
        return parent::select($sql)[0]['COUNT(news.id)'];
    }
    //get post in database limit perpage
    public function getNewsByTagPage($tag, $page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$connection->prepare("SELECT * FROM `news` JOIN `news_tags` ON news_tags.new_id = news.id JOIN `tags` ON tags.id = news_tags.tag_id WHERE tags.name = ? LIMIT ?,?");
        $sql->bind_param('sii', $tag, $start, $perPage);
        return parent::select($sql);
    }
    //get tag by id
    public function getTagById($id)
    {
        $sql = parent::$connection->prepare("SELECT tags.name FROM `news` JOIN news_tags ON news_tags.new_id = news.id JOIN tags ON tags.id = news_tags.tag_id WHERE news.id=?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    //add comment
    public function createComment($message, $newsId, $userId)
    {
        $date = date('Y-m-d');
        $sql = parent::$connection->prepare("INSERT INTO `comments`(`description`, `create_at`, `news_id`, `user_id`) VALUES (?,?,?,?)");
        $sql->bind_param('ssii', $message, $date, $newsId, $userId);
        return $sql->execute();
    }
    public function likeComment($commentId, $userId)
    {
        $sql = parent::$connection->prepare("UPDATE `comments` SET `like`=? WHERE `id`=?");
        #check like
        $sql1 = parent::$connection->prepare("SELECT `like_table`.`comment_id`, `like_table`.`user_id` FROM `like_table` JOIN comments ON like_table.comment_id = comments.id JOIN users ON users.id = like_table.user_id WHERE like_table.user_id = ? AND like_table.comment_id = ?");
        $sql1->bind_param('ii', $userId, $commentId);
        $checkLike = empty(parent::select($sql1));
        #count like
        $sql2 = parent::$connection->prepare("SELECT `like` FROM `comments` WHERE comments.id = ?");
        $sql2->bind_param('i', $commentId);
        $like = parent::select($sql2)[0]['like'];

        if ($checkLike) {
            $like += 1;
            #mark
            $sql3 = parent::$connection->prepare("INSERT INTO `like_table` VALUES (?,?)");
        } else {
            $like -= 1;
            #mark
            $sql3 = parent::$connection->prepare("DELETE FROM `like_table` WHERE `comment_id` = ? AND `user_id` = ?");
        }
        $sql->bind_param('ii', $like, $commentId);
        $sql3->bind_param('ii', $commentId, $userId);
        $sql3->execute();
        return $sql->execute();
    }
}
