<?php


$db = new SqLite3('filmes.db');

$sql = "DROP TABLE IF EXISTS filmes";
$db->exec($sql);

$sql = "CREATE TABLE filmes(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title VARCHAR(200) NOT NULL,
                poster VARCHAR(200),
                sinopse TEXT,
                nota DECIMAL(2,1)               
                 )";

if ($db->exec($sql)) {
    echo "\nCREATED FILMES TABLE!\n";
}
else {
    echo "\n error \n";
}

$filme1 = [
    "title" => "'Vingadores'",
    "poster" => "'https://www.themoviedb.org/t/p/original/or06FN3Dka5tukK1e9sl16pB3iy.jpg'",
    "sinopse" => "'I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.'",
    "nota" => 9.3

];

$values = array_values($filme1);
$values = implode(", ",$values);
print_r($values);
//die();

$sql = "INSERT INTO filmes (title, poster, sinopse, nota) VALUES ($values)";
// echo "\n $sql";
$db->exec($sql);

$sql = "SELECT * FROM filmes";

$rs = $db->query($sql);

while ($filme = $rs->fetchArray()){
    print_r($filme);
}



