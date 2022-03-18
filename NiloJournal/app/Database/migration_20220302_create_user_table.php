<?php

use App\Database\Connection;

require_once "./app/Database/Connection.php";

$conn = Connection::connection();

$query = "CREATE TABLE IF NOT EXISTS Users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE ,
    password VARCHAR(255),
    PRIMARY KEY  (id)
)";

$stmt = $conn->prepare($query);

if($stmt->execute()) {
    echo "Users created\n";
}
else {
    echo "error\n";
}
