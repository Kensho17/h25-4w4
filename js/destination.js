(function() {
    console.log("destination.js adapté pour REST root");

    // 1. Récupère la base REST API (ex. https://monsite.local/.../wp-json/)
    const baseUrl = tpApi && tpApi.root
        ? tpApi.root
        : window.location.origin.replace(/\/$/, '') + '/wp-json/';

    // 2. Sélecteurs
    const listContainer   = document.querySelector('.destination__list');
    const categoryButtons = document.querySelectorAll('.categorie__ul__li');

    /**
     * Récupère les posts via l’API et les affiche.
     * @param {string} apiUrl URL complète de l’endpoint REST.
     */
    function mon_fetch(apiUrl) {
        // Affiche un loader
        listContainer.innerHTML = '<p class="loader">Chargement…</p>';

        fetch(apiUrl, {
            headers: {
                'X-WP-Nonce': tpApi.nonce // utile si vous faites du POST/PATCH
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }
            const contentType = response.headers.get('Content-Type') || '';
            if (!contentType.includes('application/json')) {
                throw new Error('Contenu non JSON : ' + contentType);
            }
            return response.json();
        })
        .then(data => {
            listContainer.innerHTML = '';
            if (!Array.isArray(data) || data.length === 0) {
                listContainer.innerHTML = '<p>Aucune destination trouvée.</p>';
                return;
            }
            data.forEach(post => {
                const item = document.createElement('div');
                item.className = 'destination__item';
                item.innerHTML = `
                  <h3 class="TitreArticleCategorie">${post.title.rendered}</h3>
                  <div class="descriptionArticleCategorie">${post.excerpt.rendered}</div>
                  <a href="${post.link}" class="destination__link">Voir plus</a>
                `;
                listContainer.appendChild(item);
            });
            // Activation de l'accordéon
            document.querySelectorAll('.TitreArticleCategorie').forEach(titre => {
                titre.addEventListener('click', () => {
                    titre.nextElementSibling.classList.toggle('active');
                });
            });
        })
        .catch(err => {
            console.error('Erreur lors de la récupération des articles :', err);
            listContainer.innerHTML = `<p class="error">Erreur de chargement : ${err.message}</p>`;
        });
    }

    // 3. Initialisation : catégorie par défaut (ID 3)
    const defaultCategoryId = 3;
    mon_fetch(`${baseUrl}wp/v2/posts?categories=${defaultCategoryId}`);

    // 4. Écouteurs sur chaque bouton de catégorie
    categoryButtons.forEach(li => {
        li.addEventListener('click', () => {
            const catId = li.dataset.id;
            mon_fetch(`${baseUrl}wp/v2/posts?categories=${catId}`);
        });
    });
})();
