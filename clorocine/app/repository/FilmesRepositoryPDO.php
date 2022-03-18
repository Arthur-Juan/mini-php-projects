<?php

require_once "./app/repository/Connection.php";

class FilmesRepositoryPDO
{

    private PDO $conn;

    public function __construct(){
        $this->conn = Connection::conn('filmes');
    }
    public function listAll(): array{
        $filmesLista = [];
        $query = "SELECT * FROM filmes";
        $filmes = $this->conn->query($query);

        while($filme = $filmes->fetchObject()){
            $filmesLista[] = $filme;
        }
        return $filmesLista;


    }

    public function save(Filme $filme):bool {


        $query = "INSERT INTO filmes (title, poster, sinopse, nota) 
        VALUES (:title, :poster, :sinopse, :nota)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':title', $filme->title, PDO::PARAM_STR);
        $stmt->bindValue(':poster', $filme->poster, PDO::PARAM_STR);
        $stmt->bindValue(':sinopse', $filme->sinopse, PDO::PARAM_STR);
        $stmt->bindValue(':nota', $filme->nota, PDO::PARAM_STR);

        return $stmt->execute();

    }


    public function favorite(int $id): bool
    {
        $query = "UPDATE filmes SET favorite = NOT favorite WHERE id =:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);

        if( ! $stmt->execute()){
            return false;
        }
        return true;
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM filmes WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);

        if( ! $stmt->execute()){
            return false;
        }
        return true;
    }

}