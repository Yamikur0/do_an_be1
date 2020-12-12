<?php
class UserModel extends Db
{
    public function checkUser($username, $password)
    {
    }
    public function checkUsername($username, $password)
    {
        $sql = parent::$connection->prepare("SELECT * FROM `users` WHERE `name` = ? AND `password` = ?");
        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $sql->bind_param('ss', $username, $password_hash);
        return empty(parent::select($sql));
    }
}
