<?php

$db = new SQLite3(filename: "filmes.db");

$query = "ALTER TABLE filmes ADD COLUMN favorite INT DEFAULT 0";

if($db->exec($query)) {
    echo "[*] SUCCESS\n";
}

else echo "[*] ERROR\n";