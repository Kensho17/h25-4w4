(function() {
    // Sélection des éléments de filtre de catégorie
    const categoryItems = document.querySelectorAll('.categorie__ul__li');
    let categoryId = 3; // ID de catégorie par défaut
    const domain = window.location.origin;
    let apiUrl = `${domain}/wp-json/wp/v2/posts?categories=${categoryId}`;

    console.log('Éléments de catégorie trouvés :', categoryItems.length);

    // Initialisation du filtre
    categoryItems.forEach(item => {
        item.addEventListener('click', () => {
            // Mise à jour de l'état "actif"
            categoryItems.forEach(el => el.classList.remove('active'));
            item.classList.add('active');

            // Récupère l'ID et refait l'URL
            categoryId = item.dataset.id;
            apiUrl = `${domain}/wp-json/wp/v2/posts?categories=${categoryId}`;

            // Charge les articles pour cette catégorie
            fetchPosts(apiUrl);
        });
    });

    /**
     * Récupère les posts via l'API WP et les injecte dans le DOM
     * @param {string} url 
     */
    function fetchPosts(url) {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const list = document.querySelector('.destination__list');
                list.innerHTML = ''; // Vide la liste

                data.forEach(post => {
                    const postEl = document.createElement('div');
                    postEl.innerHTML = `
                        <h3 class="TitreArticleCategorie">${post.title.rendered}</h3>
                        <div class="descriptionArticleCategorie">${post.excerpt.rendered}</div>
                        <a class="descriptionArticleCategorie" href="${post.link}">Lire plus</a>
                    `;
                    list.appendChild(postEl);
                });

                // Ajoute le toggle sur chaque titre pour afficher/masquer la description
                document.querySelectorAll('.TitreArticleCategorie').forEach(title => {
                    title.addEventListener('click', () => {
                        const descriptions = title
                            .parentElement
                            .querySelectorAll('.descriptionArticleCategorie');
                        descriptions.forEach(desc => desc.classList.toggle('active'));
                    });
                });
            })
            .catch(error => console.error('Erreur lors de la récupération des articles :', error));
    }

    // Chargement initial des articles
    fetchPosts(apiUrl);
})();
