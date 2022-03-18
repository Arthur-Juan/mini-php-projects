<?php


class Connection
{

     public static function conn(string $database): PDO
     {

        return new PDO("sqlite:".$database.'.db');

    }

}