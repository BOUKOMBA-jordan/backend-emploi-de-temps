<?php

require_once('lib/database.php');

class Salle
{
    public int $idSalle;
    public string $numeroSalle;
}

class SalleRepository
{
    public DatabaseConnection $connection;

    public function getOneSalle(string $idSalle): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT idSalle, numeroSalle FROM salles WHERE idSalle = ? ORDER BY idSalle ASC"
        );
        $statement->execute([$idSalle]);

        $salle = [];
        while (($row = $statement->fetch())) {
            $salle = new Salle();
            $salle->numeroSalle = $row['numeroSalle'];

            $salle[] = $salle;
        }

        return $salle;
    }

    public function getAllSalle(): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT idSalle, numeroSalle FROM salles ORDER BY idSalle ASC"
        );
        $statement->execute();

        $salleList = [];
        while (($row = $statement->fetch())) {
            $salle = new Salle();
            $salle->idSalle = $row['idSalle'];
            $salle->numeroSalle = $row['numeroSalle'];

            $salleList[] = $salle;
        }

        return $salleList;
    }

    public function createSalle(string $numeroSalle): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO salles(numeroSalle) VALUES(?)'
        );
        $affectedLines = $statement->execute([$numeroSalle]);

        return ($affectedLines > 0);
    }

    public function updateSalle(string $idSalle, string $numeroSalle): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE salles SET numeroSalle = ? WHERE idSalle = ?'
        );
        $affectedLines = $statement->execute([$numeroSalle, $idSalle]);

        return ($affectedLines > 0);
    }

    public function deleteSalle(string $idSalle): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'DELETE FROM salles WHERE idSalle = ?'
        );
        $affectedLines = $statement->execute([$idSalle]);

        return ($affectedLines > 0);
    }

    public function lastIdInsert(): int
    {
        $statement = $this->connection->getConnection()->prepare(
            'SELECT MAX(idSalle)  FROM Salle'
        );
        $statement->execute();
        $row = $statement->fetch();
        $lastIdSalle = $row['MAX(idSalle)'];

        return $lastIdSalle;
    }
}
