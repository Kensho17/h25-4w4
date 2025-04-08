// destination.js - Script pour récupérer les destinations via l'API REST et activer l'accordéon

(function(){
    console.log("vive Javascript");

    // Catégorie par défaut à charger
    let categoryId = 3; // Remplacez par l'ID désiré
    const domaine = window.location.origin;  // Utilise window.location.origin pour le domaine
    let apiUrl = `${domaine}/wp-json/wp/v2/posts?categories=${categoryId}`;

    // Sélectionner tous les boutons de catégories générés par categories_liste()
    const categorieBtns = document.querySelectorAll(".categorie__ul__li");
    console.log("nombre de boutons catégorie :", categorieBtns.length);

    // Ajout d'un écouteur pour chaque bouton
    categorieBtns.forEach(li => {
        li.addEventListener("mousedown", function(e){
            // On empêche le comportement par défaut si nécessaire
            e.preventDefault();
            // Mettre à jour la classe active (optionnel)
            categorieBtns.forEach(btn => btn.classList.remove('active'));
            li.classList.add('active');

            // Récupérer l'ID de la catégorie à partir de data-id
            categoryId = li.dataset.id;
            apiUrl = `${domaine}/wp-json/wp/v2/posts?categories=${categoryId}`;
            console.log("Nouvelle API URL :", apiUrl);
            mon_fetch(apiUrl);
        });
    });

    // Fonction pour récupérer et afficher les articles
    function mon_fetch(apiUrl) {
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const destinationList = document.querySelector('.destination__list');
                if (destinationList) {
                    destinationList.innerHTML = ""; // Réinitialise la liste
                    data.forEach(article => {
                        // Crée un conteneur pour chaque destination
                        const articleElement = document.createElement('div');
                        articleElement.classList.add('destination-article');
                        articleElement.innerHTML = `
                            <h3 class="destination-title">${article.title.rendered}</h3>
                            <div class="accordion-content" style="display: none;">
                                <div>${article.excerpt.rendered}</div>
                                <a href="${article.link}">Lire plus</a>
                            </div>
                        `;
                        destinationList.appendChild(articleElement);

                        // Ajoute l'effet accordéon
                        const titleElement = articleElement.querySelector('.destination-title');
                        const accordionContent = articleElement.querySelector('.accordion-content');
                        titleElement.addEventListener('click', () => {
                            // Bascule l'affichage de l'accordéon
                            if (accordionContent.style.display === 'none' || accordionContent.style.display === '') {
                                accordionContent.style.display = 'block';
                            } else {
                                accordionContent.style.display = 'none';
                            }
                        });
                    });
                } else {
                    console.error("L'élément '.destination__list' est introuvable dans le DOM.");
                }
            })
            .catch(error => console.error('Erreur lors de la récupération des articles:', error));
    }

    // Charger par défaut la catégorie initiale au chargement de la page
    mon_fetch(apiUrl);
})();