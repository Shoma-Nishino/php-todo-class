<?php

class Database
{
    private static $pdo;

    /**
    * データベースインスタンスを取得する
    * @return obj pdo
    */
    public static function getPdo()
    {
        try {
            if (!isset(self::$pdo)) {
            self::$pdo = new PDO(
                DSN,
                DB_USER,
                DB_PASS,
                [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
            }

            return self::$pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
