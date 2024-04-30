<?php
require_once('lib/database.php');
require_once('models/cours.php');

class AddCours
{
    public function execute(string $action, int $idCours, string $nomCours)
    {
        $connection = new DatabaseConnection();
        $coursRepository = new CoursRepository();
        $coursRepository->connection = $connection;

        
       if ($action == "Add") { 

            $cours = $coursRepository->createCours($nomCours);
            $lastIdCours = $coursRepository->lastIdInsert();

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
            $cours = $coursRepository->updateCours($idCours, $nomCours);
        }

        if ($action == "delete") { 
            $cours = $coursRepository->deleteCours($idCours);
        }
    }
}
