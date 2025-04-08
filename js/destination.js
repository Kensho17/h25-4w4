/*
    destination.js - Script pour récupérer les destinations via l'API REST et activer l'accordéon
*/
(function() {
    console.log("vive Javascript");

    // Catégorie par défaut à charger (remplacez par l'ID désiré)
    let categoryId = 3;

    // Utiliser la variable localisée pour obtenir la base URL correcte
    const domaine = myTheme.baseUrl;  // myTheme.baseUrl est défini dans wp_localize_script()
    
    // Construction de l'URL de l'API REST
    let apiUrl = `${domaine}/wp-json/wp/v2/posts?categories=${categoryId}`;

    // Sélectionne tous les boutons de catégories générés par la fonction PHP 'categories_liste()'
    const categorieBtns = document.querySelectorAll(".categorie__ul__li");
    console.log("Nombre de boutons catégorie :", categorieBtns.length);

    // Ajoute un écouteur pour chaque bouton de catégorie
    categorieBtns.forEach(li => {
        li.addEventListener("mousedown", function(e) {
            e.preventDefault();
            // Supprime la classe 'active' de tous les boutons
            categorieBtns.forEach(btn => btn.classList.remove('active'));
            // Ajoute la classe 'active' sur le bouton cliqué
            li.classList.add('active');

            // Récupère l'ID de la catégorie à partir de l'attribut data-id
            categoryId = li.dataset.id;
            apiUrl = `${domaine}/wp-json/wp/v2/posts?categories=${categoryId}`;
            console.log("Nouvelle API URL :", apiUrl);
            mon_fetch(apiUrl);
        });
    });

    // Fonction pour récupérer et afficher les articles
    function mon_fetch(apiUrl) {
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('La réponse réseau n\'est pas correcte');
                }
                return response.json();
            })
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

                        // Ajoute l'effet accordéon au clic sur le titre
                        const titleElement = articleElement.querySelector('.destination-title');
                        const accordionContent = articleElement.querySelector('.accordion-content');
                        titleElement.addEventListener('click', () => {
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