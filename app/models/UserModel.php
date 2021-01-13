<?php
class UserModel extends Db
{
    public function checkUsername($username)
    {
        $sql = parent::$connection->prepare("SELECT * FROM users WHERE users.name=?");
        $sql->bind_param('s',$username);
        return empty(parent::select($sql));
    }
    public function getUsername($id)
    {
        $sql = parent::$connection->prepare("SELECT * FROM users WHERE users.id=?");
        $sql->bind_param('i',$id);
        return parent::select($sql)[0]['name'];
    }
    public function getUserId($username)
    {
        $sql = parent::$connection->prepare("SELECT * FROM users WHERE users.name=?");
        $sql->bind_param('s',$username);
        return parent::select($sql)[0]['id'];
    }
    public function checkUser($username, $password)
    {
        $sql = parent::$connection->prepare("SELECT users.password FROM `users` WHERE `name` = ?");
        $sql->bind_param('s', $username);
        $result = parent::select($sql);
        if (!isset($result[0]['password'])) {
           return false;
        }
        return password_verify($password,parent::select($sql)[0]['password']);
    }
    public function createUser($username,$password)
    {
        $sql = parent::$connection->prepare("INSERT INTO `users` VALUES (null,?,?)");
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $sql->bind_param('ss', $username, $password_hash);
        return $sql->execute();
    }
}
