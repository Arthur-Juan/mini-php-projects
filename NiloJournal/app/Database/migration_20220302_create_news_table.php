<?php

use App\Database\Connection;
require_once "./app/Database/Connection.php";

$conn = Connection::connection();

$query = "CREATE TABLE IF NOT EXISTS News (
    id INT NOT NULL AUTO_INCREMENT,
    UserId INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255),
    content TEXT,
    poster VARCHAR(255),
    PRIMARY KEY  (id),
    FOREIGN KEY (UserId) REFERENCES Users(id)                        
)";

$stmt = $conn->prepare($query);

if($stmt->execute()) {
    echo "News created\n";
}
else {
    echo "error\n";
}
