<?php

namespace App\Database;

use PDO;

class Connection
{

    private static $host = '127.0.0.1';
    private static $dbname = 'nilonews';
    private static $login = 'dev';
    private static $pass = 'rootroot';

    public static function connection() {
        $conn =  new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$login, self::$pass );
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;

    }

}