<?php
class UserModel extends Db
{
    public function checkUser($username, $password)
    {
    }
    public function checkUsername($username)
    {
        $sql = parent::$connection->prepare("SELECT `name` FROM `users` WHERE users.name = ?");
        $sql->bind_param('s', $username);
        return empty(parent::select($sql));
    }
}
