<?php

require_once('lib/database.php');

class Cours
{
    public int $idCours;
    public string $nomCours;
}

class CoursRepository
{
    public DatabaseConnection $connection;

    public function getOneCours(string $idCours): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT idCours, nomCours FROM cours WHERE idCours = ? ORDER BY idCours ASC"
        );
        $statement->execute([$idCours]);

        $cours = [];
        while (($row = $statement->fetch())) {
            $cours = new Cours();
            $cours->nomCours = $row['nomCours'];

            $cours[] = $cours;
        }

        return $cours;
    }

    public function getAllCours(): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT idCours, nomCours FROM cours ORDER BY idCours ASC"
        );
        $statement->execute();

        $coursList = [];
        while (($row = $statement->fetch())) {
            $cours = new Cours();
            $cours->idCours = $row['idCours'];
            $cours->nomCours = $row['nomCours'];

            $coursList[] = $cours;
        }

        return $coursList;
    }

    public function createCours(string $nomCours): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO cours(nomCours) VALUES(?)'
        );
        $affectedLines = $statement->execute([$nomCours]);

        return ($affectedLines > 0);
    }

    public function updateCours(string $idCours, string $nomCours): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE cours SET nomCours = ? WHERE idCours = ?'
        );
        $affectedLines = $statement->execute([$nomCours, $idCours]);

        return ($affectedLines > 0);
    }

    public function deleteCours(string $idCours): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM cours WHERE idCours = ?'
        );
        $affectedLines = $statement->execute([$idCours]);

        return ($affectedLines > 0);
    }

    public function lastIdInsert(): int
    {
        $statement = $this->connection->getConnection()->prepare(
            'SELECT MAX(idCours)  FROM cours'
        );
        $statement->execute();
        $row = $statement->fetch();
        $lastIdCours = $row['MAX(idCours)'];

        return $lastIdCours;
    }
}
