<?php

class DatabaseConnection
{
    /*public ?\PDO $database = null;

    public function getConnection(): \PDO
    {
        if ($this->database === null) {
            $this->database = new \PDO('mysql:host=localhost;dbname=quiz;charset=utf8', 'root', 'root');
        }

        return $this->database;
    }*/

    public function getConnection(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=emploidetemps1;charset=utf8', 'root', 'root');

        // Configuration des options PDO (facultatif)
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");

        return $pdo;
    }
}
