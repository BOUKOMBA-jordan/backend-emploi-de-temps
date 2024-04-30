<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
    <link rel="stylesheet" href="styles/cours.css">
  
    <link rel="stylesheet" href="styles/menu.css">
    <link rel="stylesheet" href="styles/salle.css">

    <title>BackOffice gestion des emploies de temps</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="style/quiz.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>


 
    <script src="js/cours.js"></script>
    <script src="js/salle.js"></script>
 

  
   

    
  </head>
    <body>

    <?php 
    require_once('templates/menu.php');


      

      require_once('controllers/cours.php');
      require_once('controllers/add_cours.php');
      require_once('controllers/salle.php');
      require_once('controllers/add_salle.php');
 

      require_once('lib/database.php');
      require_once('models/cours.php');
      require_once('models/salle.php');

     

      


      if ($_GET['vue'] == 'cours') { 
        //Cette ligne de code vérifie si le paramètre GET nommé "vue" est défini à la valeur "cours" dans l'URL de la requête HTTP entrante.
        // Cela peut être utilisé pour diriger le flux du programme en fonction de la vue demandée par l'utilisateur.

        (new CoursController())->execute();

        //Cette ligne de code vérifie si une variable POST appelée "action" est définie dans la requête HTTP entrante.
        
        if (isset($_POST['action'])) {
        
          (new AddCours())->execute($_POST['action'],$_POST['idCours'],$_POST['nomCours']);
        }


      } elseif ($_GET['vue'] == 'salle') {

        (new SalleController())->execute();
          
        if (isset($_POST['action'])) {
        
          (new AddSalle())->execute($_POST['action'],$_POST['idSalle'],$_POST['numeroSalle']);
        } 

      }  else {
        include("templates/cours.php") ;
      }
     
      
    ?>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  </body>
</html>