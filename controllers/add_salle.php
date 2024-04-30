<?php
require_once('lib/database.php');
require_once('models/Salle.php');

class AddSalle
{
    public function execute(string $action, int $idSalle, string $numeroSalle)
    {
        $connection = new DatabaseConnection();
        $salleRepository = new SalleRepository();
        $salleRepository->connection = $connection;

        
       if ($action == "Add") { 

            $salle = $salleRepository->createSalle($numeroSalle);
            $lastIdSalle = $salleRepository->lastIdInsert();

            /*$reponse = $reponsesRepository->createReponse($bonneReponse);
            $lastIdReponse = $reponsesRepository->lastIdInsert();
            $reponseHasQuestion = $reponsesHasQuestionRepository->createReponsesHasQuestions($lastIdReponse,$lastIdQuestion,"1");
            $reponse = $reponsesRepository->createReponse($option_1);
            $lastIdReponse = $reponsesRepository->lastIdInsert();
            $reponseHasQuestion = $reponsesHasQuestionRepository->createReponsesHasQuestions($lastIdReponse,$lastIdQuestion,"0");
            $reponse = $reponsesRepository->createReponse($option_2);
            $lastIdReponse = $reponsesRepository->lastIdInsert();
            $reponseHasQuestion = $reponsesHasQuestionRepository->createReponsesHasQuestions($lastIdReponse,$lastIdQuestion,"0");
            $reponse = $reponsesRepository->createReponse($option_3);
            $lastIdReponse = $reponsesRepository->lastIdInsert();
            $reponseHasQuestion = $reponsesHasQuestionRepository->createReponsesHasQuestions($lastIdReponse,$lastIdQuestion,"0");*/

        }
        
        if ($action == "update") { 
            $salle = $salleRepository->updateSalle($idSalle, $numeroSalle);
        }

        if ($action == "delete") { 
            $salle = $salleRepository->deleteSalle($idSalle);
        }
    }
}
