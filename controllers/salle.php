<?php

require_once('lib/database.php');
require_once('models/salle.php');


class SalleController
{
    public function execute()
    {
        $connection = new DatabaseConnection();
        $salleRepository = new SalleRepository();
       
        $salleRepository->connection = $connection;
       
        $salle = $salleRepository->getAllSalle();

        
        require('templates/salle.php');
    }
}
