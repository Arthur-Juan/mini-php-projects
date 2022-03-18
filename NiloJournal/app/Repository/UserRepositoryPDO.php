<?php

namespace App\Repository;

use App\Database\Connection;
use App\Model\User;
use Exception;
use PDO;

require_once __DIR__."/../Database/Connection.php";
require_once __DIR__."/../Model/User.php";

class UserRepositoryPDO
{
    private $conn;
    public function __construct()
    {
        $this->conn = Connection::connection();
    }

    /**
     * @throws Exception
     */
    public function create(User $user): false|string
    {


        $query = "INSERT INTO Users (name, email, password) VALUES (:name, :email, :password)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindValue(":name", $user->name, PDO::PARAM_STR);
        $stmt->bindValue(":email", $user->email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $user->password, PDO::PARAM_STR);

        $stmt->execute();

        return $this->conn->lastInsertId();

    }

    public function getUserByEmail($email): false|object
    {

        $query = "SELECT * FROM Users WHERE email = :email";

        $stmt = $this->conn->prepare($query);


        if( $stmt->execute([":email" => $email])) {

         return $stmt->fetchObject();
        }

        throw new Exception("Erro no banco de dados");
    }

}