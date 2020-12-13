<?php
class UserModel extends Db
{
    public function checkUsername($username)
    {
        $sql = parent::$connection->prepare("SELECT * FROM users WHERE users.name=?");
        $sql->bind_param('s',$username);
        return empty(parent::select($sql));
    }
    public function checkUser($username, $password)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `users` WHERE `name` = ? AND `password` = ?");
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $sql->bind_param('ss', $username, $password_hash);
        return empty(parent::select($sql));
    }
    public function createUser($username,$password)
    {
        $sql = parent::$connection->prepare("INSERT INTO `users` VALUES (null,?,?)");
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $sql->bind_param('ss', $username, $password_hash);
        return $sql->execute();
    }
}
