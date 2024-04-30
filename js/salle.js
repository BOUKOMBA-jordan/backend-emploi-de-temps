$(document).ready(function(){
	var salle=[];

	// Append table with add row form on add new button click
    $(".add-new-salle").click(function(){
		alert('clik sur le bouton ayant la classe add-new-salle')
		
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
			'<td><button class="form-control" disabled></button></td>' +
            '<td><input type="text" style="height: 50px;" class="form-control"></td>' +
			'<td><a class="ajouter-salle" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a></td>' +
        '</tr>';
    	$("table").append(row);
	});
	//Début de la requette  jQuery
	$(document).on("click", ".ajouter-salle", function(){
		alert('clik sur le bouton ayant la classe ajouter-salle')
		
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
				salle.push($(this).val());
			});	

			alert(salle)
			//FormData est une interface JavaScript qui permet de créer facilement un ensemble de paires clé-valeur représentant les champs et les valeurs du formulaire.

			const formData = new FormData();

			formData.append("action", "Add");
			formData.append("idSalle", "0");
			formData.append("numeroSalle", salle[0]);

			formData.forEach(function(value, key){
				console.log(key + ": " + value);
			});

			//pour effectuer des requêtes HTTP asynchrones depuis une page web.
			const request = new XMLHttpRequest();  
			//permet d'écouter sur si la requette request.open("POST", "index.php?vue=Salle"); est entièrement chargée
			//permet de configurer la requette http en précisant  la methode http utilisé(POST) et l'url a laquelle on souhaite envoyé ces données(index.php?vue=Salle)

			request.open("POST", "index.php?vue=salle");
			//Elle permet d'envoyer les données encapsuler dans formadata grace a la méthode .sent 
			request.send(formData);

			// Ce qui se produit lorsque les données sont envoyées avec succès
			request.addEventListener("load", (event) => {
				window.location.href = "index.php?vue=salle";
			});

			// Ce qui se produit en cas d'erreur
			request.addEventListener("error", (event) => {
				alert("Une erreur est survenue.");
			});
		}
	});




	// Cela écoute le clic sur tout élément avec la classe .editSalle dans le document.
	$(document).on("click", ".editSalle", function(){
		//il parcourt charque élément td du parent tr
		$(this).parents("tr").find("td:not(:first-child):not(:last-child)").each(function(){
			//Cela remplace le contenu HTML de chaque cellule par un champ de saisie (input) de type texte avec la valeur actuelle du texte de la cellule.
			$(this).html('<input type="text" style="height: 50px;" class="form-control" value="' + $(this).text() + '">');
		});	

		/*rechercher les éléments de la classe .deleteSalle et .editSalle qui sont des descendants de l'élément parent <tr> (ligne du tableau) de l'élément actuel cliqué (this).
		 Ensuite, il utilise la méthode .toggle() pour alterner la visibilité de ces éléments entre affiché et caché.*/
		$(this).parents("tr").find(".deleteSalle, .editSalle").toggle(); 

		//Cette ligne de code crée un nouvel élément <a> (lien) dans le DOM. Cet élément est créé en utilisant la méthode document.createElement("a").
		var nouveauLien = document.createElement("a");

		//Cette ligne de code ajoute la classe CSS "add-update-Salle" à l'élément <a> précédemment créé.
		nouveauLien.classList.add("add-update-salle");

		//Cette ligne de code crée un nouvel élément <i> dans le DOM. Ensuite, cet élément est stocké dans la variable nouveauIcone.
		var nouveauIcone = document.createElement("i");

		//Cette ligne de code affecte le texte "" à la propriété textContent de l'élément <i>, ce qui détermine le contenu textuel de cet élément.
		nouveauIcone.textContent = "";

		/*Cette ligne ajoute la classe CSS "material-icons" à l'élément <i>.
		La classe "material-icons" est souvent utilisée avec des icônes de la bibliothèque de conception Google Material Icons.*/
		nouveauIcone.classList.add("material-icons");

		//Cette ligne ajoute l'élément <i> (contenant l'icône) comme enfant de l'élément <a> (le lien nouvellement créé).
		nouveauLien.appendChild(nouveauIcone);

		//La variable Salle est un tableau JavaScript qui est utilisé pour stocker des données sur les Salle.
        var salle=[];

		//Cette ligne de code sélectionne tous les éléments de type <input> de type "text" qui se trouvent dans la même ligne
		var input = $(this).parents("tr").find('input[type="text"]');

		//Cette ligne parcourt chaque élément input sélectionné et exécute la fonction fournie pour chaque élément.
		input.each(function(){

			//Cette ligne ajoute la valeur de l'élément input actuel à un tableau nommé "Salle".
			salle.push($(this).val());
		});	

		//Cette ligne crée un identifiant en concaténant la chaîne "bouton-action-Salle-" avec le premier élément du tableau "Salle".
        var elementID = "bouton-action-salle-"+salle[0];

		var boutonAction = document.getElementById(elementID);

		boutonAction.appendChild(nouveauLien);


		var closeLien = document.createElement("a");
		closeLien.classList.add("annule-update-salle");

		var nouvelleIcone = document.createElement("i");
		nouvelleIcone.classList.add("fa");
		nouvelleIcone.classList.add("fa-window-close");

		closeLien.appendChild(nouvelleIcone);

		boutonAction.appendChild(closeLien);

		$(".add-new-salle").attr("disabled", "disabled"); // désactivation du bouton Add-new
    });


	// Cela écoute le clic sur tout élément avec la classe .add-update-Salle dans le document.
	$(document).on("click", ".add-update-salle", function(){
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
				salle.push($(this).val());
			});	

			//FormData est une interface JavaScript qui permet de créer facilement un ensemble de paires clé-valeur représentant les champs et les valeurs du formulaire.
			const formData = new FormData();

			formData.append("action", "update");
			formData.append("idSalle", salle[0]);
			formData.append("numeroSalle", salle[1]);

			formData.forEach(function(value, key){
				console.log(key + ": " + value);
			});

			//pour effectuer des requêtes HTTP asynchrones depuis une page web.
			const request = new XMLHttpRequest();

			//permet d'écouter sur si la requette request.open("POST", "index.php?vue=Salle"); est entièrement chargée
			//permet de configurer la requette http en précisant  la methode http utilisé(POST) et l'url a laquelle on souhaite envoyé ces données(index.php?vue=Salle)

			request.open("POST", "index.php?vue=salle");

			//Elle permet d'envoyer les données encapsuler dans formadata grace a la méthode .sent 
			request.send(formData);

			// Ce qui se produit lorsque les données sont envoyées avec succès
			request.addEventListener("load", (event) => {
				window.location.href = "index.php?vue=salle";
				alert("Les données ont bien été envoyées à la base de données.");
			});

			request.addEventListener("error", (event) => {
				alert("Une erreur est survenue.");
			});
		}
	});

	$(document).on("click", ".annule-update-salle", function(){
		window.location.href = "index.php?vue=salle";
	});

	// Delete row on delete button click
	$(document).on("click", ".deleteSalle", function(){
		var input = $(this).parents("tr").find('input[type="text"]');
		input.each(function(){
			salle.push($(this).val());
		});

		var textSalle = document.getElementById('salleSupprimer');
		textSalle.textContent = salle[1];

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
				salle.push($(this).val());
			});	

			$(this).parents("tr").find(".addSalle, .editSalle").toggle();
			$(".add-new-salle").removeAttr("disabled");
		}	
    });

	$(document).on("click", ".validerSuppressionSalle", function(){
		alert(salle)
		const formData = new FormData();
		formData.append("action", "delete");
		formData.append("idSalle", salle[0]);
		formData.append("numeroSalle", salle[1]);
		
		const request = new XMLHttpRequest();

		request.open("POST", "index.php?vue=salle");
		request.send(formData);

		request.addEventListener("load", (event) => {
			window.location.href = "index.php?vue=salle";
		});

		request.addEventListener("error", (event) => {
			alert("Une erreur est survenue.");
		});
	});
});
