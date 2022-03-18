<?php

namespace App\Repository;

use App\Database\Connection;

require_once __DIR__."/../Database/Connection.php";
require_once __DIR__."/../Model/News.php";
class NewsRepositoryPDO
{
    private \PDO $conn;
    public function __construct()
    {
        $this->conn = Connection::connection();
    }

    public function create($news): bool|string
    {
        $query = "INSERT INTO News (UserId, title, subtitle, content, poster) VALUES (:UserId, :title, :subtitle, :content, :poster)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":UserId", $news->userId);
        $stmt->bindValue(":title", $news->title);
        $stmt->bindValue(":subtitle", $news->subtitle);
        $stmt->bindValue(":content", $news->content);
        $stmt->bindValue(":poster", $news->poster);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function listAll(): bool|\PDOStatement
    {
        $query = "SELECT * FROM News";

        return $this->conn->query($query);


    }

    public function listMy($id): bool|\PDOStatement
    {
        $query = "SELECT * FROM News WHERE UserId=".$id;

        return $this->conn->query($query);
    }

}