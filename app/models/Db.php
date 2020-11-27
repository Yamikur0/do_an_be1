<?php
class Db{
    public static $connection = null;
    public function __construct()
    {
        if(!self::$connection){
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
            self::$connection->set_charset('utf8mb4');
        }
        return self::$connection;
    }
    public function select($mysql){
        $item = [];
        $mysql->execute();
        $item = $mysql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}