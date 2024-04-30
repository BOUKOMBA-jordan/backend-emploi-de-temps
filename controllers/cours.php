<?php

require_once('lib/database.php');
require_once('models/cours.php');


class CoursController
{
    public function execute()
    {
        $connection = new DatabaseConnection();
        $coursRepository = new CoursRepository();
       
        $coursRepository->connection = $connection;
       
        $cours = $coursRepository->getAllCours();

        
        require('templates/cours.php');
    }
}
