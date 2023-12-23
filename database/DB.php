<?php

include_once('.env.php');

class DB
{
    public static function conn()
    {
        $host = SERVER;
        $db = DATABASE;
        $user = USER;
        $pass = PASS;

        $dsn = "mysql:host=$host;dbname=$db";

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}

?>