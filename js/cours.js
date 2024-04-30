$(document).ready(function(){
	var cours=[];

	// Append table with add row form on add new button click
    $(".add-new-cours").click(function(){
		alert('clik sur le bouton ayant la classe add-new-cours')
		
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
			'<td><button class="form-control" disabled></button></td>' +
            '<td><input type="text" style="height: 50px;" class="form-control"></td>' +
			'<td><a class="ajouter-cours" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a></td>' +
        '</tr>';
    	$("table").append(row);
	});
	//Début de la requette  jQuery
	$(document).on("click", ".ajouter-cours", function(){
		alert('clik sur le bouton ayant la classe ajouter-cours')
		
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
				cours.push($(this).val());
			});	

			alert(cours)
			//FormData est une interface JavaScript qui permet de créer facilement un ensemble de paires clé-valeur représentant les champs et les valeurs du formulaire.

			const formData = new FormData();

			formData.append("action", "Add");
			formData.append("idCours", "0");
			formData.append("nomCours", cours[0]);

			formData.forEach(function(value, key){
				console.log(key + ": " + value);
			});

			//pour effectuer des requêtes HTTP asynchrones depuis une page web.
			const request = new XMLHttpRequest();  
			//permet d'écouter sur si la requette request.open("POST", "index.php?vue=cours"); est entièrement chargée
			//permet de configurer la requette http en précisant  la methode http utilisé(POST) et l'url a laquelle on souhaite envoyé ces données(index.php?vue=cours)

			request.open("POST", "index.php?vue=cours");
			//Elle permet d'envoyer les données encapsuler dans formadata grace a la méthode .sent 
			request.send(formData);

			// Ce qui se produit lorsque les données sont envoyées avec succès
			request.addEventListener("load", (event) => {
				window.location.href = "index.php?vue=cours";
			});

			// Ce qui se produit en cas d'erreur
			request.addEventListener("error", (event) => {
				alert("Une erreur est survenue.");
			});
		}
	});




	// Cela écoute le clic sur tout élément avec la classe .editCours dans le document.
	$(document).on("click", ".editCours", function(){
		//il parcourt charque élément td du parent tr
		$(this).parents("tr").find("td:not(:first-child):not(:last-child)").each(function(){
			//Cela remplace le contenu HTML de chaque cellule par un champ de saisie (input) de type texte avec la valeur actuelle du texte de la cellule.
			$(this).html('<input type="text" style="height: 50px;" class="form-control" value="' + $(this).text() + '">');
		});	

		/*rechercher les éléments de la classe .deleteCours et .editCours qui sont des descendants de l'élément parent <tr> (ligne du tableau) de l'élément actuel cliqué (this).
		 Ensuite, il utilise la méthode .toggle() pour alterner la visibilité de ces éléments entre affiché et caché.*/
		$(this).parents("tr").find(".deleteCours, .editCours").toggle(); 

		//Cette ligne de code crée un nouvel élément <a> (lien) dans le DOM. Cet élément est créé en utilisant la méthode document.createElement("a").
		var nouveauLien = document.createElement("a");

		//Cette ligne de code ajoute la classe CSS "add-update-cours" à l'élément <a> précédemment créé.
		nouveauLien.classList.add("add-update-cours");

		//Cette ligne de code crée un nouvel élément <i> dans le DOM. Ensuite, cet élément est stocké dans la variable nouveauIcone.
		var nouveauIcone = document.createElement("i");

		//Cette ligne de code affecte le texte "" à la propriété textContent de l'élément <i>, ce qui détermine le contenu textuel de cet élément.
		nouveauIcone.textContent = "";

		/*Cette ligne ajoute la classe CSS "material-icons" à l'élément <i>.
		La classe "material-icons" est souvent utilisée avec des icônes de la bibliothèque de conception Google Material Icons.*/
		nouveauIcone.classList.add("material-icons");

		//Cette ligne ajoute l'élément <i> (contenant l'icône) comme enfant de l'élément <a> (le lien nouvellement créé).
		nouveauLien.appendChild(nouveauIcone);

		//La variable cours est un tableau JavaScript qui est utilisé pour stocker des données sur les cours.
        var cours=[];

		//Cette ligne de code sélectionne tous les éléments de type <input> de type "text" qui se trouvent dans la même ligne
		var input = $(this).parents("tr").find('input[type="text"]');

		//Cette ligne parcourt chaque élément input sélectionné et exécute la fonction fournie pour chaque élément.
		input.each(function(){

			//Cette ligne ajoute la valeur de l'élément input actuel à un tableau nommé "cours".
			cours.push($(this).val());
		});	

		//Cette ligne crée un identifiant en concaténant la chaîne "bouton-action-cours-" avec le premier élément du tableau "cours".
        var elementID = "bouton-action-cours-"+cours[0];

		var boutonAction = document.getElementById(elementID);

		boutonAction.appendChild(nouveauLien);


		var closeLien = document.createElement("a");
		closeLien.classList.add("annule-update-cours");

		var nouvelleIcone = document.createElement("i");
		nouvelleIcone.classList.add("fa");
		nouvelleIcone.classList.add("fa-window-close");

		closeLien.appendChild(nouvelleIcone);

		boutonAction.appendChild(closeLien);

		$(".add-new-cours").attr("disabled", "disabled"); // désactivation du bouton Add-new
    });


	// Cela écoute le clic sur tout élément avec la classe .add-update-cours dans le document.
	$(document).on("click", ".add-update-cours", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
				cours.push($(this).val());
			});	

			//FormData est une interface JavaScript qui permet de créer facilement un ensemble de paires clé-valeur représentant les champs et les valeurs du formulaire.
			const formData = new FormData();

			formData.append("action", "update");
			formData.append("idCours", cours[0]);
			formData.append("nomCours", cours[1]);

			formData.forEach(function(value, key){
				console.log(key + ": " + value);
			});

			//pour effectuer des requêtes HTTP asynchrones depuis une page web.
			const request = new XMLHttpRequest();

			//permet d'écouter sur si la requette request.open("POST", "index.php?vue=cours"); est entièrement chargée
			//permet de configurer la requette http en précisant  la methode http utilisé(POST) et l'url a laquelle on souhaite envoyé ces données(index.php?vue=cours)

			request.open("POST", "index.php?vue=cours");

			//Elle permet d'envoyer les données encapsuler dans formadata grace a la méthode .sent 
			request.send(formData);

			// Ce qui se produit lorsque les données sont envoyées avec succès
			request.addEventListener("load", (event) => {
				window.location.href = "index.php?vue=cours";
				alert("Les données ont bien été envoyées à la base de données.");
			});

			request.addEventListener("error", (event) => {
				alert("Une erreur est survenue.");
			});
		}
	});

	$(document).on("click", ".annule-update-cours", function(){
		window.location.href = "index.php?vue=cours";
	});

	// Delete row on delete button click
	$(document).on("click", ".deleteCours", function(){
		var input = $(this).parents("tr").find('input[type="text"]');
		input.each(function(){
			cours.push($(this).val());
		});

		var textCours = document.getElementById('coursSupprimer');
		textCours.textContent = cours[1];

        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
				cours.push($(this).val());
			});	

			$(this).parents("tr").find(".addCours, .editCours").toggle();
			$(".add-new-cours").removeAttr("disabled");
		}	
    });

	$(document).on("click", ".validerSuppressionCours", function(){
		alert(cours)
		const formData = new FormData();
		formData.append("action", "delete");
		formData.append("idCours", cours[0]);
		formData.append("nomCours", cours[1]);
		
		const request = new XMLHttpRequest();

		request.open("POST", "index.php?vue=cours");
		request.send(formData);

		request.addEventListener("load", (event) => {
			window.location.href = "index.php?vue=cours";
		});

		request.addEventListener("error", (event) => {
			alert("Une erreur est survenue.");
		});
	});
});
