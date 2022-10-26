<?php

namespace Models;

use PDO;

require_once './.env';

class Database
{

    private static $pdo;

    private static function setBdd()
    {
        $dns = 'mysql:host=localhost;dbname=' . $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        self::$pdo = new PDO($dns, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
        self::$pdo->exec('SET CHARACTER SET utf8');
    }

    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
